<?php
namespace model\forms;

use \model\models\HtmTemplate;

/**
 * Description of HtmTemplateForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-06-30 15:54
 * Updated @2016-06-30 15:54
 */
class HtmTemplateForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmTemplateForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmTemplate::TABLE;
        $this->models[HtmTemplate::TABLE] = new HtmTemplate();
        
        $this->setIdInput();
	$this->setNameInput();
	$this->setPathInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateNameInput();
	$this->validatePathInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(HtmTemplate::FIELD_ID);
        }else{
            $input->setElementId(HtmTemplate::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmTemplate::TABLE, HtmTemplate::FIELD_ID, 'Id');
        $this->setFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmTemplate::TABLE, HtmTemplate::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmTemplate::TABLE][HtmTemplate::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmTemplate::TABLE, HtmTemplate::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmTemplate::TABLE, HtmTemplate::FIELD_ID, \model\querys\HtmTemplateQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmTemplate::FIELD_NAME);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmTemplate::FIELD_NAME); 
        }
        
        $this->setFieldLabel(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME, 'Name');
        $this->setFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[HtmTemplate::TABLE][HtmTemplate::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(HtmTemplate::TABLE, HtmTemplate::FIELD_NAME, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setPathInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmTemplate::FIELD_PATH);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmTemplate::FIELD_PATH); 
        }
        
        $this->setFieldLabel(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH, 'Path');
        $this->setFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH, $input);
        
        return $input;
    }
    
    public function setPathDefault($value) {
        $this->setDefault(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH, $value);
    }
    
    public function unsetPathInput() {
        $this->unsetFieldInput(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getPathInput(){
        return $this->forminputs[HtmTemplate::TABLE][HtmTemplate::FIELD_PATH];
    }
    
    public function getPathValue(){
        return $this->getInputValue(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH);
    }
    
    public function validatePathInput() {
        $value = $this->validateString(HtmTemplate::TABLE, HtmTemplate::FIELD_PATH, false, 100);
        return $value;
    }
    


}