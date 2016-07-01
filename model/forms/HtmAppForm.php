<?php
namespace model\forms;

use \model\models\HtmApp;

/**
 * Description of HtmAppForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-06-30 15:54
 * Updated @2016-06-30 15:54
 */
class HtmAppForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmAppForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmApp::TABLE;
        $this->models[HtmApp::TABLE] = new HtmApp();
        
        $this->setIdInput();
	$this->setSlugInput();
	$this->setNameInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateSlugInput();
	$this->validateNameInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(HtmApp::FIELD_ID);
        }else{
            $input->setElementId(HtmApp::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmApp::TABLE, HtmApp::FIELD_ID, 'Id');
        $this->setFieldInput(HtmApp::TABLE, HtmApp::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmApp::TABLE, HtmApp::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmApp::TABLE, HtmApp::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmApp::TABLE][HtmApp::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmApp::TABLE, HtmApp::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmApp::TABLE, HtmApp::FIELD_ID, \model\querys\HtmAppQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSlugInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmApp::FIELD_SLUG);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmApp::FIELD_SLUG); 
        }
        
        $this->setFieldLabel(HtmApp::TABLE, HtmApp::FIELD_SLUG, 'Slug');
        $this->setFieldInput(HtmApp::TABLE, HtmApp::FIELD_SLUG, $input);
        
        return $input;
    }
    
    public function setSlugDefault($value) {
        $this->setDefault(HtmApp::TABLE, HtmApp::FIELD_SLUG, $value);
    }
    
    public function unsetSlugInput() {
        $this->unsetFieldInput(HtmApp::TABLE, HtmApp::FIELD_SLUG);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSlugInput(){
        return $this->forminputs[HtmApp::TABLE][HtmApp::FIELD_SLUG];
    }
    
    public function getSlugValue(){
        return $this->getInputValue(HtmApp::TABLE, HtmApp::FIELD_SLUG);
    }
    
    public function validateSlugInput() {
        $value = $this->validateString(HtmApp::TABLE, HtmApp::FIELD_SLUG, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmApp::FIELD_NAME);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmApp::FIELD_NAME); 
        }
        
        $this->setFieldLabel(HtmApp::TABLE, HtmApp::FIELD_NAME, 'Name');
        $this->setFieldInput(HtmApp::TABLE, HtmApp::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(HtmApp::TABLE, HtmApp::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(HtmApp::TABLE, HtmApp::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[HtmApp::TABLE][HtmApp::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(HtmApp::TABLE, HtmApp::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(HtmApp::TABLE, HtmApp::FIELD_NAME, true, 100);
        return $value;
    }
    


}