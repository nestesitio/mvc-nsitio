<?php
namespace model\forms;

use \model\models\UserFunctions;

/**
 * Description of UserFunctionsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class UserFunctionsForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserFunctionsForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserFunctions::TABLE;
        $this->models[UserFunctions::TABLE] = new UserFunctions();
        
        $this->setIdInput();
	$this->setFunctionInput();
	$this->setDescriptionInput();
	$this->setPublicInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateFunctionInput();
	$this->validateDescriptionInput();
	$this->validatePublicInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(UserFunctions::FIELD_ID);
        }else{
            $input->setElementId(UserFunctions::FIELD_ID); 
        }
        
        $this->setFieldLabel(UserFunctions::TABLE, UserFunctions::FIELD_ID, 'Id');
        $this->setFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(UserFunctions::TABLE, UserFunctions::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[UserFunctions::TABLE][UserFunctions::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(UserFunctions::TABLE, UserFunctions::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(UserFunctions::TABLE, UserFunctions::FIELD_ID, \model\querys\UserFunctionsQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setFunctionInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserFunctions::FIELD_FUNCTION);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserFunctions::FIELD_FUNCTION); 
        }
        
        $this->setFieldLabel(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION, 'Function');
        $this->setFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION, $input);
        
        return $input;
    }
    
    public function setFunctionDefault($value) {
        $this->setDefault(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION, $value);
    }
    
    public function unsetFunctionInput() {
        $this->unsetFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getFunctionInput(){
        return $this->forminputs[UserFunctions::TABLE][UserFunctions::FIELD_FUNCTION];
    }
    
    public function getFunctionValue(){
        return $this->getInputValue(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION);
    }
    
    public function validateFunctionInput() {
        $value = $this->validateString(UserFunctions::TABLE, UserFunctions::FIELD_FUNCTION, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setDescriptionInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserFunctions::FIELD_DESCRIPTION);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserFunctions::FIELD_DESCRIPTION); 
        }
        
        $this->setFieldLabel(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION, 'Description');
        $this->setFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION, $input);
        
        return $input;
    }
    
    public function setDescriptionDefault($value) {
        $this->setDefault(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION, $value);
    }
    
    public function unsetDescriptionInput() {
        $this->unsetFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getDescriptionInput(){
        return $this->forminputs[UserFunctions::TABLE][UserFunctions::FIELD_DESCRIPTION];
    }
    
    public function getDescriptionValue(){
        return $this->getInputValue(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION);
    }
    
    public function validateDescriptionInput() {
        $value = $this->validateString(UserFunctions::TABLE, UserFunctions::FIELD_DESCRIPTION, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\BooleanInput;
    */
    public function setPublicInput($input = null) {
        if($input == null){
            $input = \lib\form\input\BooleanInput::create(UserFunctions::FIELD_PUBLIC);
        }else{
            $input->setElementId(UserFunctions::FIELD_PUBLIC); 
        }
        
        $this->setFieldLabel(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC, 'Public');
        $this->setFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC, $input);
        
        return $input;
    }
    
    public function setPublicDefault($value) {
        $this->setDefault(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC, $value);
    }
    
    public function unsetPublicInput() {
        $this->unsetFieldInput(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC);
    }
    
    /**
    * @return \lib\form\input\BooleanInput;
    */
    public function getPublicInput(){
        return $this->forminputs[UserFunctions::TABLE][UserFunctions::FIELD_PUBLIC];
    }
    
    public function getPublicValue(){
        return $this->getInputValue(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC);
    }
    
    public function validatePublicInput() {
        $value = $this->validateBool(UserFunctions::TABLE, UserFunctions::FIELD_PUBLIC);
        return $value;
    }
    


}