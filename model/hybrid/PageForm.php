<?php

namespace model\hybrid;

use \model\models\Htm;
use \model\forms\HtmForm;
use \model\models\HtmPage;
use \model\forms\HtmPageForm;

use \model\hybrid\PageQuery;
use \lib\register\VarsRegister;


/**
 * Description of PageForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 16, 2015
 */
class PageForm extends \lib\form\FormMerged {
    
    
    public static function initialize(){
        $form = new PageForm();
        $form->setQueue();
        return $form;
    }
    
    public function setQueue() {
        $this->queue = [Htm::TABLE, HtmPage::TABLE];
        
        $this->models[Htm::TABLE] = new Htm();
        $this->models[HtmPage::TABLE] = new HtmPage();
        
        $this->forms[Htm::TABLE] = HtmForm::initialize();
        $this->forms[HtmPage::TABLE] = HtmPageForm::initialize();
        
        $this->merge();
        #$this->setFieldLabel(Htm::TABLE, HtmPage::FIELD_LANGS_TLD, 'Idioma');
        #$this->setDefault(Htm::TABLE, Htm::HTM_STAT, 'public');
        
        return $this;
    }
    
    protected function customValidate() {
        $id = VarsRegister::getId();
        if(!empty($id)){
            $tld = $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD);
            $htm = PageQuery::getPageFromAnotherLang($id, $tld);
            if($htm != false){
                $id = $htm->getColumnValue(HtmPage::FIELD_HTM_ID);
            }
        }
    }
    
    
    
    
    

}
