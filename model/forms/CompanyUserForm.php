<?php
namespace model\forms;

use \model\models\CompanyUser;

/**
 * Description of CompanyUserForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class CompanyUserForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new CompanyUserForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = CompanyUser::TABLE;
        $this->models[CompanyUser::TABLE] = new CompanyUser();
        
        $this->setIdInput();
	$this->setCompanyIdInput();
	$this->setUserIdInput();
	$this->setUserFunctionsIdInput();
	$this->setCodeInput();
	$this->setActiveInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateCompanyIdInput();
	$this->validateUserIdInput();
	$this->validateUserFunctionsIdInput();
	$this->validateCodeInput();
	$this->validateActiveInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(CompanyUser::FIELD_ID);
        }else{
            $input->setElementId(CompanyUser::FIELD_ID); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_ID, 'Id');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(CompanyUser::TABLE, CompanyUser::FIELD_ID, \model\querys\CompanyUserQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setCompanyIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyUser::FIELD_COMPANY_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Company::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\CompanyQuery::start());
        }else{
            $input->setElementId(CompanyUser::FIELD_COMPANY_ID); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID, 'Company Id');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID, $input);
        
        return $input;
    }
    
    public function setCompanyIdDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID, $value);
    }
    
    public function unsetCompanyIdInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getCompanyIdInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_COMPANY_ID];
    }
    
    public function getCompanyIdValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID);
    }
    
    public function validateCompanyIdInput() {
        $value = $this->validateModel(CompanyUser::TABLE, CompanyUser::FIELD_COMPANY_ID, \model\querys\CompanyQuery::start(), 'company.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyUser::FIELD_USER_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserBase::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserBaseQuery::start());
        }else{
            $input->setElementId(CompanyUser::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserIdInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateModel(CompanyUser::TABLE, CompanyUser::FIELD_USER_ID, \model\querys\UserBaseQuery::start(), 'user_base.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserFunctionsIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyUser::FIELD_USER_FUNCTIONS_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserFunctions::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserFunctionsQuery::start());
        }else{
            $input->setElementId(CompanyUser::FIELD_USER_FUNCTIONS_ID); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID, 'User Functions Id');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID, $input);
        
        return $input;
    }
    
    public function setUserFunctionsIdDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID, $value);
    }
    
    public function unsetUserFunctionsIdInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserFunctionsIdInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_USER_FUNCTIONS_ID];
    }
    
    public function getUserFunctionsIdValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID);
    }
    
    public function validateUserFunctionsIdInput() {
        $value = $this->validateModel(CompanyUser::TABLE, CompanyUser::FIELD_USER_FUNCTIONS_ID, \model\querys\UserFunctionsQuery::start(), 'user_functions.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setCodeInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyUser::FIELD_CODE);$input->setMaxlength('50');
        }else{
            $input->setElementId(CompanyUser::FIELD_CODE); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_CODE, 'Code');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_CODE, $input);
        
        return $input;
    }
    
    public function setCodeDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_CODE, $value);
    }
    
    public function unsetCodeInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_CODE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getCodeInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_CODE];
    }
    
    public function getCodeValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_CODE);
    }
    
    public function validateCodeInput() {
        $value = $this->validateString(CompanyUser::TABLE, CompanyUser::FIELD_CODE, false, 50);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\BooleanInput;
    */
    public function setActiveInput($input = null) {
        if($input == null){
            $input = \lib\form\input\BooleanInput::create(CompanyUser::FIELD_ACTIVE);
        }else{
            $input->setElementId(CompanyUser::FIELD_ACTIVE); 
        }
        
        $this->setFieldLabel(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE, 'Active');
        $this->setFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE, $input);
        
        return $input;
    }
    
    public function setActiveDefault($value) {
        $this->setDefault(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE, $value);
    }
    
    public function unsetActiveInput() {
        $this->unsetFieldInput(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE);
    }
    
    /**
    * @return \lib\form\input\BooleanInput;
    */
    public function getActiveInput(){
        return $this->forminputs[CompanyUser::TABLE][CompanyUser::FIELD_ACTIVE];
    }
    
    public function getActiveValue(){
        return $this->getInputValue(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE);
    }
    
    public function validateActiveInput() {
        $value = $this->validateBool(CompanyUser::TABLE, CompanyUser::FIELD_ACTIVE);
        return $value;
    }
    


}