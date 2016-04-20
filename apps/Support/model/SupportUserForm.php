<?php

namespace apps\Support\model;

use \model\models\Support;
use \model\models\SupportLog;
use \model\forms\SupportForm;
use \model\forms\SupportLogForm;
use \lib\form\input\HiddenInput;
use \lib\session\SessionUser;
use \lib\register\VarsRegister;

/**
 * Description of SupportUserForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 1, 2015
 */
class SupportUserForm extends \lib\form\FormMerged {

    public static function init(){
        $form = new SupportUserForm();
        $form->setQueue();
        return $form;
    }
    
    protected function customValidate() {}
    
    public function setQueue() {
        $this->queue = [Support::TABLE, SupportLog::TABLE];
        
        $this->models[Support::TABLE] = new Support();
        $this->models[SupportLog::TABLE] = new SupportLog();
        
        $this->forms[Support::TABLE] = SupportForm::initialize();
        $this->forms[SupportLog::TABLE] = SupportLogForm::initialize();
        
        $this->merge();
        
        $input = $this->getUserIdInput(Support::FIELD_USER_ID);
        $this->setFieldInput(Support::TABLE, Support::FIELD_USER_ID, $input);
        
        $input = $this->getUserIdInput(SupportLog::FIELD_USER_ID);
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_USER_ID, $input);
        
        $input = $this->getSourceInput();
        $this->setFieldInput(Support::TABLE, Support::FIELD_SOURCE, $input);
        
        $input = $this->getStatusInput();
        $this->setFieldInput(Support::TABLE, Support::FIELD_STATUS, $input);
        
        $input = $this->getTypeInput();
        $this->setFieldInput(Support::TABLE, Support::FIELD_TYPE, $input);
        
        $input = $this->getEventInput();
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_EVENT, $input);
        
        #$this->setFieldLabel(Htm::TABLE, HtmPage::HTM_PAGE_LANGS_TLD, 'Idioma');
        return $this;
    }
    
    
    function getUserIdInput($field) {
        $input = HiddenInput::create($field);
	$input->setValue(SessionUser::getUserId());      
        return $input;
    }
    
    function getSourceInput() {
        $input = HiddenInput::create(Support::FIELD_SOURCE);
	$input->setValue('web');   
        return $input;
    }
    
    function getStatusInput() {
        $input = HiddenInput::create(Support::FIELD_STATUS);
	$input->setValue('open');
        return $input;
    }
    
    function getTypeInput() {
        $input = HiddenInput::create(Support::FIELD_TYPE);
	$input->setValue(VarsRegister::getSlugVar());      
        return $input;
    }
    
    function getEventInput(){
        $input = HiddenInput::create(SupportLog::FIELD_EVENT);
        $input->setValue('creation');
        return $input;
    }

}
