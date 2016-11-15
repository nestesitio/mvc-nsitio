<?php
namespace model\forms;

use \model\models\CompanyInfo;

/**
 * Description of CompanyInfoForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class CompanyInfoForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new CompanyInfoForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = CompanyInfo::TABLE;
        $this->models[CompanyInfo::TABLE] = new CompanyInfo();
        
        $this->setCompanyIdInput();
	$this->setAddressInput();
	$this->setZipInput();
	$this->setLocalInput();
	$this->setNifInput();
	$this->setTlfInput();
	$this->setTlmInput();
	$this->setWebInput();
	$this->setMailInput();
	$this->setNotesInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateCompanyIdInput();
	$this->validateAddressInput();
	$this->validateZipInput();
	$this->validateLocalInput();
	$this->validateNifInput();
	$this->validateTlfInput();
	$this->validateTlmInput();
	$this->validateWebInput();
	$this->validateMailInput();
	$this->validateNotesInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setCompanyIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyInfo::FIELD_COMPANY_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Company::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\CompanyQuery::start());
        }else{
            $input->setElementId(CompanyInfo::FIELD_COMPANY_ID); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID, 'Company Id');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID, $input);
        
        return $input;
    }
    
    public function setCompanyIdDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID, $value);
    }
    
    public function unsetCompanyIdInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getCompanyIdInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_COMPANY_ID];
    }
    
    public function getCompanyIdValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID);
    }
    
    public function validateCompanyIdInput() {
        $value = $this->validateModel(CompanyInfo::TABLE, CompanyInfo::FIELD_COMPANY_ID, \model\querys\CompanyQuery::start(), 'company.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setAddressInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_ADDRESS);$input->setMaxlength('150');
        }else{
            $input->setElementId(CompanyInfo::FIELD_ADDRESS); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS, 'Address');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS, $input);
        
        return $input;
    }
    
    public function setAddressDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS, $value);
    }
    
    public function unsetAddressInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getAddressInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_ADDRESS];
    }
    
    public function getAddressValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS);
    }
    
    public function validateAddressInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_ADDRESS, false, 150);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setZipInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_ZIP);$input->setMaxlength('10');
        }else{
            $input->setElementId(CompanyInfo::FIELD_ZIP); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP, 'Zip');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP, $input);
        
        return $input;
    }
    
    public function setZipDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP, $value);
    }
    
    public function unsetZipInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getZipInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_ZIP];
    }
    
    public function getZipValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP);
    }
    
    public function validateZipInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_ZIP, false, 10);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setLocalInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_LOCAL);$input->setMaxlength('50');
        }else{
            $input->setElementId(CompanyInfo::FIELD_LOCAL); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL, 'Local');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL, $input);
        
        return $input;
    }
    
    public function setLocalDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL, $value);
    }
    
    public function unsetLocalInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getLocalInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_LOCAL];
    }
    
    public function getLocalValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL);
    }
    
    public function validateLocalInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_LOCAL, false, 50);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNifInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_NIF);$input->setMaxlength('10');
        }else{
            $input->setElementId(CompanyInfo::FIELD_NIF); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF, 'Nif');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF, $input);
        
        return $input;
    }
    
    public function setNifDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF, $value);
    }
    
    public function unsetNifInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNifInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_NIF];
    }
    
    public function getNifValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF);
    }
    
    public function validateNifInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_NIF, false, 10);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTlfInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_TLF);$input->setMaxlength('15');
        }else{
            $input->setElementId(CompanyInfo::FIELD_TLF); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF, 'Tlf');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF, $input);
        
        return $input;
    }
    
    public function setTlfDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF, $value);
    }
    
    public function unsetTlfInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTlfInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_TLF];
    }
    
    public function getTlfValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF);
    }
    
    public function validateTlfInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_TLF, false, 15);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTlmInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_TLM);$input->setMaxlength('15');
        }else{
            $input->setElementId(CompanyInfo::FIELD_TLM); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM, 'Tlm');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM, $input);
        
        return $input;
    }
    
    public function setTlmDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM, $value);
    }
    
    public function unsetTlmInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTlmInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_TLM];
    }
    
    public function getTlmValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM);
    }
    
    public function validateTlmInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_TLM, false, 15);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setWebInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_WEB);$input->setMaxlength('100');
        }else{
            $input->setElementId(CompanyInfo::FIELD_WEB); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB, 'Web');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB, $input);
        
        return $input;
    }
    
    public function setWebDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB, $value);
    }
    
    public function unsetWebInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getWebInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_WEB];
    }
    
    public function getWebValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB);
    }
    
    public function validateWebInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_WEB, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setMailInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyInfo::FIELD_MAIL);$input->setMaxlength('120');
        }else{
            $input->setElementId(CompanyInfo::FIELD_MAIL); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL, 'Mail');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL, $input);
        
        return $input;
    }
    
    public function setMailDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL, $value);
    }
    
    public function unsetMailInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getMailInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_MAIL];
    }
    
    public function getMailValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL);
    }
    
    public function validateMailInput() {
        $value = $this->validateString(CompanyInfo::TABLE, CompanyInfo::FIELD_MAIL, false, 120);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setNotesInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(CompanyInfo::FIELD_NOTES);
        }else{
            $input->setElementId(CompanyInfo::FIELD_NOTES); 
        }
        
        $this->setFieldLabel(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES, 'Notes');
        $this->setFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES, $input);
        
        return $input;
    }
    
    public function setNotesDefault($value) {
        $this->setDefault(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES, $value);
    }
    
    public function unsetNotesInput() {
        $this->unsetFieldInput(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getNotesInput(){
        return $this->forminputs[CompanyInfo::TABLE][CompanyInfo::FIELD_NOTES];
    }
    
    public function getNotesValue(){
        return $this->getInputValue(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES);
    }
    
    public function validateNotesInput() {
        $value = $this->validateText(CompanyInfo::TABLE, CompanyInfo::FIELD_NOTES);
        return $value;
    }
    


}