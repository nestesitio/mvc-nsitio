<?php
namespace model\forms;

use \model\models\UserLog;

/**
 * Description of UserLogForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class UserLogForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserLogForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserLog::TABLE;
        $this->models[UserLog::TABLE] = new UserLog();
        
        $this->setIdInput();
	$this->setUserIdInput();
	$this->setEventInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateUserIdInput();
	$this->validateEventInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(UserLog::FIELD_ID);
        }else{
            $input->setElementId(UserLog::FIELD_ID); 
        }
        
        $this->setFieldLabel(UserLog::TABLE, UserLog::FIELD_ID, 'Id');
        $this->setFieldInput(UserLog::TABLE, UserLog::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(UserLog::TABLE, UserLog::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(UserLog::TABLE, UserLog::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[UserLog::TABLE][UserLog::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(UserLog::TABLE, UserLog::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(UserLog::TABLE, UserLog::FIELD_ID, \model\querys\UserLogQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserLog::FIELD_USER_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserBase::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserBaseQuery::start());
        }else{
            $input->setElementId(UserLog::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(UserLog::TABLE, UserLog::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(UserLog::TABLE, UserLog::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(UserLog::TABLE, UserLog::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(UserLog::TABLE, UserLog::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserIdInput(){
        return $this->forminputs[UserLog::TABLE][UserLog::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(UserLog::TABLE, UserLog::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateModel(UserLog::TABLE, UserLog::FIELD_USER_ID, \model\querys\UserBaseQuery::start(), 'user_base.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setEventInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserLog::FIELD_EVENT);
	
            $input->setRequired(true);$input->setValuesList(\model\models\UserLog::$events);
	$input->setDefault('login');
        }else{
            $input->setElementId(UserLog::FIELD_EVENT); 
        }
        
        $this->setFieldLabel(UserLog::TABLE, UserLog::FIELD_EVENT, 'Event');
        $this->setFieldInput(UserLog::TABLE, UserLog::FIELD_EVENT, $input);
        
        return $input;
    }
    
    public function setEventDefault($value) {
        $this->setDefault(UserLog::TABLE, UserLog::FIELD_EVENT, $value);
    }
    
    public function unsetEventInput() {
        $this->unsetFieldInput(UserLog::TABLE, UserLog::FIELD_EVENT);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getEventInput(){
        return $this->forminputs[UserLog::TABLE][UserLog::FIELD_EVENT];
    }
    
    public function getEventValue(){
        return $this->getInputValue(UserLog::TABLE, UserLog::FIELD_EVENT);
    }
    
    public function validateEventInput() {
        $value = $this->validateValues(UserLog::TABLE, UserLog::FIELD_EVENT, \model\models\UserLog::$events, true, 'login');
        return $value;
    }
    


}