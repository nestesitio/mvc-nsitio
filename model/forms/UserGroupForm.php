<?php
namespace model\forms;

use \model\models\UserGroup;

/**
 * Description of UserGroupForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class UserGroupForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserGroupForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserGroup::TABLE;
        $this->models[UserGroup::TABLE] = new UserGroup();
        
        $this->setIdInput();
	$this->setNameInput();
	$this->setDescriptionInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateNameInput();
	$this->validateDescriptionInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(UserGroup::FIELD_ID);
        }else{
            $input->setElementId(UserGroup::FIELD_ID); 
        }
        
        $this->setFieldLabel(UserGroup::TABLE, UserGroup::FIELD_ID, 'Id');
        $this->setFieldInput(UserGroup::TABLE, UserGroup::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(UserGroup::TABLE, UserGroup::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[UserGroup::TABLE][UserGroup::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(UserGroup::TABLE, UserGroup::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(UserGroup::TABLE, UserGroup::FIELD_ID, \model\querys\UserGroupQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserGroup::FIELD_NAME);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserGroup::FIELD_NAME); 
        }
        
        $this->setFieldLabel(UserGroup::TABLE, UserGroup::FIELD_NAME, 'Name');
        $this->setFieldInput(UserGroup::TABLE, UserGroup::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(UserGroup::TABLE, UserGroup::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[UserGroup::TABLE][UserGroup::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(UserGroup::TABLE, UserGroup::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(UserGroup::TABLE, UserGroup::FIELD_NAME, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setDescriptionInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserGroup::FIELD_DESCRIPTION);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserGroup::FIELD_DESCRIPTION); 
        }
        
        $this->setFieldLabel(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION, 'Description');
        $this->setFieldInput(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION, $input);
        
        return $input;
    }
    
    public function setDescriptionDefault($value) {
        $this->setDefault(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION, $value);
    }
    
    public function unsetDescriptionInput() {
        $this->unsetFieldInput(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getDescriptionInput(){
        return $this->forminputs[UserGroup::TABLE][UserGroup::FIELD_DESCRIPTION];
    }
    
    public function getDescriptionValue(){
        return $this->getInputValue(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION);
    }
    
    public function validateDescriptionInput() {
        $value = $this->validateString(UserGroup::TABLE, UserGroup::FIELD_DESCRIPTION, false, 100);
        return $value;
    }
    


}