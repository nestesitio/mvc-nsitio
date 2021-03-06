<?php

namespace model\hybrid;

use \model\models\HtmPage;
use \model\models\HtmTxt;
use \lib\form\input\HiddenInput;
use \lib\form\input\WysihtmlInput;

/**
 * Description of TxtForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 28, 2015
 */
class TxtForm extends \lib\form\FormMerged {

    public static function init($htm_id, $lang_tld){
        $form = new TxtForm();
        $form->declaration($htm_id, $lang_tld);
        return $form;
    }
    
    public function declaration($htm_id, $lang_tld) {
        
        $this->queue = [HtmPage::TABLE, HtmTxt::TABLE];
        
        $this->models[HtmPage::TABLE] = new HtmPage();
        $this->models[HtmTxt::TABLE] = new HtmTxt();
        
        $this->forms[HtmPage::TABLE] = $this->declareHtmPageForm($htm_id, $lang_tld);
        $this->forms[HtmTxt::TABLE] = $this->declareHtmTxtForm();
	
        $this->merge();
        
        return $this;
    }
    
    private function declareHtmPageForm($htm_id, $lang_tld){
        $form = \model\forms\HtmPageForm::initialize();
        $input = HiddenInput::create(HtmPage::FIELD_HTM_ID)->setValue($htm_id);
	$form->setHtmIdInput($input);
        $input = HiddenInput::create(HtmPage::FIELD_SLUG)->setDefault('index');
	$form->setSlugInput($input);
        $input = HiddenInput::create(HtmPage::FIELD_LANGS_TLD)->setValue($lang_tld);
        $form->setLangsTldInput($input);
        return $form;
    }
    
    private function declareHtmTxtForm(){
        $form = \model\forms\HtmTxtForm::initialize();
        $input = WysihtmlInput::create(HtmTxt::FIELD_TXT);
        $form->setTxtInput($input);
        $input = HiddenInput::create(HtmTxt::FIELD_TYPE)->setValue(HtmTxt::TYPE_TXT);
        $form->setTypeInput($input);
        
        return $form;
    }


    protected function customValidate() {
        $title = $this->getValidatedValue(HtmPage::TABLE, HtmPage::FIELD_TITLE);
        $slug = \lib\tools\StringTools::slugify($title);
        $this->rePostValue(HtmPage::TABLE, HtmPage::FIELD_SLUG, $slug);
    }

}
