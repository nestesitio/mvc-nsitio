<?php
namespace model\forms;

use \model\models\Company;

/**
 * Description of CompanyForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class CompanyForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new CompanyForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = Company::TABLE;
        $this->models[Company::TABLE] = new Company();
        
        $this->setIdInput();
	$this->setNameInput();
	$this->setCodeInput();
	$this->setFolderInput();
	$this->setActiveInput();
	$this->setDistributorInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateNameInput();
	$this->validateCodeInput();
	$this->validateFolderInput();
	$this->validateActiveInput();
	$this->validateDistributorInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(Company::FIELD_ID);
        }else{
            $input->setElementId(Company::FIELD_ID); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_ID, 'Id');
        $this->setFieldInput(Company::TABLE, Company::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(Company::TABLE, Company::FIELD_ID, \model\querys\CompanyQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Company::FIELD_NAME);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(Company::FIELD_NAME); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_NAME, 'Name');
        $this->setFieldInput(Company::TABLE, Company::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(Company::TABLE, Company::FIELD_NAME, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setCodeInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Company::FIELD_CODE);$input->setMaxlength('30');
        }else{
            $input->setElementId(Company::FIELD_CODE); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_CODE, 'Code');
        $this->setFieldInput(Company::TABLE, Company::FIELD_CODE, $input);
        
        return $input;
    }
    
    public function setCodeDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_CODE, $value);
    }
    
    public function unsetCodeInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_CODE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getCodeInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_CODE];
    }
    
    public function getCodeValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_CODE);
    }
    
    public function validateCodeInput() {
        $value = $this->validateString(Company::TABLE, Company::FIELD_CODE, false, 30);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setFolderInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Company::FIELD_FOLDER);$input->setMaxlength('20');
        }else{
            $input->setElementId(Company::FIELD_FOLDER); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_FOLDER, 'Folder');
        $this->setFieldInput(Company::TABLE, Company::FIELD_FOLDER, $input);
        
        return $input;
    }
    
    public function setFolderDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_FOLDER, $value);
    }
    
    public function unsetFolderInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_FOLDER);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getFolderInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_FOLDER];
    }
    
    public function getFolderValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_FOLDER);
    }
    
    public function validateFolderInput() {
        $value = $this->validateString(Company::TABLE, Company::FIELD_FOLDER, false, 20);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\BooleanInput;
    */
    public function setActiveInput($input = null) {
        if($input == null){
            $input = \lib\form\input\BooleanInput::create(Company::FIELD_ACTIVE);
        }else{
            $input->setElementId(Company::FIELD_ACTIVE); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_ACTIVE, 'Active');
        $this->setFieldInput(Company::TABLE, Company::FIELD_ACTIVE, $input);
        
        return $input;
    }
    
    public function setActiveDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_ACTIVE, $value);
    }
    
    public function unsetActiveInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_ACTIVE);
    }
    
    /**
    * @return \lib\form\input\BooleanInput;
    */
    public function getActiveInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_ACTIVE];
    }
    
    public function getActiveValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_ACTIVE);
    }
    
    public function validateActiveInput() {
        $value = $this->validateBool(Company::TABLE, Company::FIELD_ACTIVE);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\BooleanInput;
    */
    public function setDistributorInput($input = null) {
        if($input == null){
            $input = \lib\form\input\BooleanInput::create(Company::FIELD_DISTRIBUTOR);
        }else{
            $input->setElementId(Company::FIELD_DISTRIBUTOR); 
        }
        
        $this->setFieldLabel(Company::TABLE, Company::FIELD_DISTRIBUTOR, 'Distributor');
        $this->setFieldInput(Company::TABLE, Company::FIELD_DISTRIBUTOR, $input);
        
        return $input;
    }
    
    public function setDistributorDefault($value) {
        $this->setDefault(Company::TABLE, Company::FIELD_DISTRIBUTOR, $value);
    }
    
    public function unsetDistributorInput() {
        $this->unsetFieldInput(Company::TABLE, Company::FIELD_DISTRIBUTOR);
    }
    
    /**
    * @return \lib\form\input\BooleanInput;
    */
    public function getDistributorInput(){
        return $this->forminputs[Company::TABLE][Company::FIELD_DISTRIBUTOR];
    }
    
    public function getDistributorValue(){
        return $this->getInputValue(Company::TABLE, Company::FIELD_DISTRIBUTOR);
    }
    
    public function validateDistributorInput() {
        $value = $this->validateBool(Company::TABLE, Company::FIELD_DISTRIBUTOR);
        return $value;
    }
    


}