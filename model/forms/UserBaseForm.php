<?php
namespace model\forms;

use \model\models\UserBase;

/**
 * Description of UserBaseForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class UserBaseForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserBaseForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserBase::TABLE;
        $this->models[UserBase::TABLE] = new UserBase();
        
        $this->setIdInput();
	$this->setUserGroupIdInput();
	$this->setNameInput();
	$this->setMailInput();
	$this->setUsernameInput();
	$this->setPasswordInput();
	$this->setStatusInput();
	$this->setConfirmedInput();
	$this->setSaltInput();
	$this->setUserkeyInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateUserGroupIdInput();
	$this->validateNameInput();
	$this->validateMailInput();
	$this->validateUsernameInput();
	$this->validatePasswordInput();
	$this->validateStatusInput();
	$this->validateConfirmedInput();
	$this->validateSaltInput();
	$this->validateUserkeyInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(UserBase::FIELD_ID);
        }else{
            $input->setElementId(UserBase::FIELD_ID); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_ID, 'Id');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(UserBase::TABLE, UserBase::FIELD_ID, \model\querys\UserBaseQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserGroupIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserBase::FIELD_USER_GROUP_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserGroup::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserGroupQuery::start());
            $input->setDefault('21');
        }else{
            $input->setElementId(UserBase::FIELD_USER_GROUP_ID); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID, 'User Group Id');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID, $input);
        
        return $input;
    }
    
    public function setUserGroupIdDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID, $value);
    }
    
    public function unsetUserGroupIdInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserGroupIdInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_USER_GROUP_ID];
    }
    
    public function getUserGroupIdValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID);
    }
    
    public function validateUserGroupIdInput() {
        $value = $this->validateModel(UserBase::TABLE, UserBase::FIELD_USER_GROUP_ID, \model\querys\UserGroupQuery::start(), 'user_group.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_NAME);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserBase::FIELD_NAME); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_NAME, 'Name');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_NAME, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setMailInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_MAIL);$input->setMaxlength('100');
        }else{
            $input->setElementId(UserBase::FIELD_MAIL); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_MAIL, 'Mail');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_MAIL, $input);
        
        return $input;
    }
    
    public function setMailDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_MAIL, $value);
    }
    
    public function unsetMailInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_MAIL);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getMailInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_MAIL];
    }
    
    public function getMailValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_MAIL);
    }
    
    public function validateMailInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_MAIL, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setUsernameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_USERNAME);
            $input->setRequired(true);$input->setMaxlength('30');
        }else{
            $input->setElementId(UserBase::FIELD_USERNAME); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_USERNAME, 'Username');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_USERNAME, $input);
        
        return $input;
    }
    
    public function setUsernameDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_USERNAME, $value);
    }
    
    public function unsetUsernameInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_USERNAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getUsernameInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_USERNAME];
    }
    
    public function getUsernameValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_USERNAME);
    }
    
    public function validateUsernameInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_USERNAME, true, 30);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setPasswordInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_PASSWORD);$input->setMaxlength('32');
        }else{
            $input->setElementId(UserBase::FIELD_PASSWORD); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_PASSWORD, 'Password');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_PASSWORD, $input);
        
        return $input;
    }
    
    public function setPasswordDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_PASSWORD, $value);
    }
    
    public function unsetPasswordInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_PASSWORD);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getPasswordInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_PASSWORD];
    }
    
    public function getPasswordValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_PASSWORD);
    }
    
    public function validatePasswordInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_PASSWORD, false, 32);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setStatusInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserBase::FIELD_STATUS);
	$input->setValuesList(\model\models\UserBase::$statuss);
	$input->setDefault('active');
        }else{
            $input->setElementId(UserBase::FIELD_STATUS); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_STATUS, 'Status');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_STATUS, $input);
        
        return $input;
    }
    
    public function setStatusDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_STATUS, $value);
    }
    
    public function unsetStatusInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_STATUS);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getStatusInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_STATUS];
    }
    
    public function getStatusValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_STATUS);
    }
    
    public function validateStatusInput() {
        $value = $this->validateValues(UserBase::TABLE, UserBase::FIELD_STATUS, \model\models\UserBase::$statuss, false, 'active');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\BooleanInput;
    */
    public function setConfirmedInput($input = null) {
        if($input == null){
            $input = \lib\form\input\BooleanInput::create(UserBase::FIELD_CONFIRMED);
        }else{
            $input->setElementId(UserBase::FIELD_CONFIRMED); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_CONFIRMED, 'Confirmed');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_CONFIRMED, $input);
        
        return $input;
    }
    
    public function setConfirmedDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_CONFIRMED, $value);
    }
    
    public function unsetConfirmedInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_CONFIRMED);
    }
    
    /**
    * @return \lib\form\input\BooleanInput;
    */
    public function getConfirmedInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_CONFIRMED];
    }
    
    public function getConfirmedValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_CONFIRMED);
    }
    
    public function validateConfirmedInput() {
        $value = $this->validateBool(UserBase::TABLE, UserBase::FIELD_CONFIRMED);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSaltInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_SALT);$input->setMaxlength('128');
        }else{
            $input->setElementId(UserBase::FIELD_SALT); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_SALT, 'Salt');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_SALT, $input);
        
        return $input;
    }
    
    public function setSaltDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_SALT, $value);
    }
    
    public function unsetSaltInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_SALT);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSaltInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_SALT];
    }
    
    public function getSaltValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_SALT);
    }
    
    public function validateSaltInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_SALT, false, 128);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setUserkeyInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserBase::FIELD_USERKEY);$input->setMaxlength('128');
        }else{
            $input->setElementId(UserBase::FIELD_USERKEY); 
        }
        
        $this->setFieldLabel(UserBase::TABLE, UserBase::FIELD_USERKEY, 'Userkey');
        $this->setFieldInput(UserBase::TABLE, UserBase::FIELD_USERKEY, $input);
        
        return $input;
    }
    
    public function setUserkeyDefault($value) {
        $this->setDefault(UserBase::TABLE, UserBase::FIELD_USERKEY, $value);
    }
    
    public function unsetUserkeyInput() {
        $this->unsetFieldInput(UserBase::TABLE, UserBase::FIELD_USERKEY);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getUserkeyInput(){
        return $this->forminputs[UserBase::TABLE][UserBase::FIELD_USERKEY];
    }
    
    public function getUserkeyValue(){
        return $this->getInputValue(UserBase::TABLE, UserBase::FIELD_USERKEY);
    }
    
    public function validateUserkeyInput() {
        $value = $this->validateString(UserBase::TABLE, UserBase::FIELD_USERKEY, false, 128);
        return $value;
    }
    


}