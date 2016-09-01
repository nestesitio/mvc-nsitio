<?php

namespace apps\Core\model;

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

    /**
     * @param $htm_id
     * @param $lang_tld
     * @return TxtForm
     */
    public static function init($htm_id, $lang_tld){
        $form = new TxtForm();
        $form->declaration($htm_id, $lang_tld);
        return $form;
    }

    /**
     * @param $htm_id
     * @param $lang_tld
     * @return $this
     */
    public function declaration($htm_id, $lang_tld) {
        
        $this->queue = [HtmPage::TABLE, HtmTxt::TABLE];
        
        $this->models[HtmPage::TABLE] = new HtmPage();
        $this->models[HtmTxt::TABLE] = new HtmTxt();
        
        $this->forms[HtmPage::TABLE] = $this->declareHtmPageForm($htm_id, $lang_tld);
        $this->forms[HtmTxt::TABLE] = $this->declareHtmTxtForm();
	
        $this->merge();
        
        return $this;
    }

    /**
     * @param $htm_id
     * @param $lang_tld
     * @return \model\forms\HtmPageForm
     */
    private function declareHtmPageForm($htm_id, $lang_tld){
        $form = \model\forms\HtmPageForm::initialize();
        $input = HiddenInput::create(HtmPage::FIELD_HTM_ID)->setValue($htm_id);
	$form->setHtmIdInput($input);
        /*
        $input = HiddenInput::create(HtmPage::FIELD_SLUG)->setDefault('index');
	$form->setSlugInput($input);
         * 
         */
        $input = HiddenInput::create(HtmPage::FIELD_LANGS_TLD)->setValue($lang_tld);
        $form->setLangsTldInput($input);
        return $form;
    }

    /**
     * @return \model\forms\HtmTxtForm
     */
    private function declareHtmTxtForm(){
        $form = \model\forms\HtmTxtForm::initialize();
        $input = WysihtmlInput::create(HtmTxt::FIELD_TXT);
        $form->setTxtInput($input);
        $input = HiddenInput::create(HtmTxt::FIELD_TYPE)->setValue(HtmTxt::TYPE_TXT);
        $form->setTypeInput($input);
        
        return $form;
    }
    
    
    /**
     * 
     * @return \model\forms\HtmTxtForm
     */
    public function getTxtForm(){
        return $this->forms[HtmTxt::TABLE];
    }
    
    /**
     * 
     * @param string $value
     * @return \apps\Core\model\TxtForm
     */
    public function setTypeValue($value){
        $form = $this->getTxtForm();
        $input = $form->getTypeInput()->setValue($value);
        $form->setTypeInput($input);    
        
        $this->forms[HtmTxt::TABLE] = $form;
        return $this;
    }
    
    /**
     * 
     * @param string $toolbar
     * @return \apps\Core\model\TxtForm
     */
    public function setToolbar($toolbar){
        $form = $this->getTxtForm();
        $input = $form->getTxtInput()->setToolbar($toolbar);
        $form->setTxtInput($input);
        
        $this->forms[HtmTxt::TABLE] = $form;
        return $this;
    }


    /**
     *
     */
    protected function customValidate() {
        $title = $this->getValidatedValue(HtmPage::TABLE, HtmPage::FIELD_TITLE);
        $slug = $this->getValidatedValue(HtmPage::TABLE, HtmPage::FIELD_SLUG);
        
        if($slug == false || $slug == 'index'){
            $slug = \lib\tools\StringTools::slugify($title);
            $this->rePostValue(HtmPage::TABLE, HtmPage::FIELD_SLUG, $slug);
        }
        //we cannot filter this input as others because it has html tags
        $value = $this->getTxtForm()->getTxtInput()->getValue();
        $this->rePostValue(HtmTxt::TABLE, HtmTxt::FIELD_TXT, $value);
    }

}
