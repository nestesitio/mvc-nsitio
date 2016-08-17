<?php
namespace model\forms;

use \model\models\UserInfo;

/**
 * Description of UserInfoForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class UserInfoForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserInfoForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserInfo::TABLE;
        $this->models[UserInfo::TABLE] = new UserInfo();
        
        $this->setUserIdInput();
	$this->setAddressInput();
	$this->setZipInput();
	$this->setLocalInput();
	$this->setTlfInput();
	$this->setTlmInput();
	$this->setNifInput();
	$this->setBicInput();
	$this->setBornInput();
	$this->setCivilInput();
	$this->setGenreInput();
	$this->setNotesInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateUserIdInput();
	$this->validateAddressInput();
	$this->validateZipInput();
	$this->validateLocalInput();
	$this->validateTlfInput();
	$this->validateTlmInput();
	$this->validateNifInput();
	$this->validateBicInput();
	$this->validateBornInput();
	$this->validateCivilInput();
	$this->validateGenreInput();
	$this->validateNotesInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserInfo::FIELD_USER_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserBase::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserBaseQuery::start());
        }else{
            $input->setElementId(UserInfo::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserIdInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateModel(UserInfo::TABLE, UserInfo::FIELD_USER_ID, \model\querys\UserBaseQuery::start(), 'user_base.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setAddressInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_ADDRESS);$input->setMaxlength('150');
        }else{
            $input->setElementId(UserInfo::FIELD_ADDRESS); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_ADDRESS, 'Address');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_ADDRESS, $input);
        
        return $input;
    }
    
    public function setAddressDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_ADDRESS, $value);
    }
    
    public function unsetAddressInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_ADDRESS);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getAddressInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_ADDRESS];
    }
    
    public function getAddressValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_ADDRESS);
    }
    
    public function validateAddressInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_ADDRESS, false, 150);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setZipInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_ZIP);$input->setMaxlength('10');
        }else{
            $input->setElementId(UserInfo::FIELD_ZIP); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_ZIP, 'Zip');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_ZIP, $input);
        
        return $input;
    }
    
    public function setZipDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_ZIP, $value);
    }
    
    public function unsetZipInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_ZIP);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getZipInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_ZIP];
    }
    
    public function getZipValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_ZIP);
    }
    
    public function validateZipInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_ZIP, false, 10);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setLocalInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_LOCAL);$input->setMaxlength('50');
        }else{
            $input->setElementId(UserInfo::FIELD_LOCAL); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_LOCAL, 'Local');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_LOCAL, $input);
        
        return $input;
    }
    
    public function setLocalDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_LOCAL, $value);
    }
    
    public function unsetLocalInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_LOCAL);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getLocalInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_LOCAL];
    }
    
    public function getLocalValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_LOCAL);
    }
    
    public function validateLocalInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_LOCAL, false, 50);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTlfInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_TLF);$input->setMaxlength('15');
        }else{
            $input->setElementId(UserInfo::FIELD_TLF); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_TLF, 'Tlf');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_TLF, $input);
        
        return $input;
    }
    
    public function setTlfDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_TLF, $value);
    }
    
    public function unsetTlfInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_TLF);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTlfInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_TLF];
    }
    
    public function getTlfValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_TLF);
    }
    
    public function validateTlfInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_TLF, false, 15);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTlmInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_TLM);$input->setMaxlength('15');
        }else{
            $input->setElementId(UserInfo::FIELD_TLM); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_TLM, 'Tlm');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_TLM, $input);
        
        return $input;
    }
    
    public function setTlmDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_TLM, $value);
    }
    
    public function unsetTlmInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_TLM);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTlmInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_TLM];
    }
    
    public function getTlmValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_TLM);
    }
    
    public function validateTlmInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_TLM, false, 15);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNifInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_NIF);$input->setMaxlength('10');
        }else{
            $input->setElementId(UserInfo::FIELD_NIF); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_NIF, 'Nif');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_NIF, $input);
        
        return $input;
    }
    
    public function setNifDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_NIF, $value);
    }
    
    public function unsetNifInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_NIF);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNifInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_NIF];
    }
    
    public function getNifValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_NIF);
    }
    
    public function validateNifInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_NIF, false, 10);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setBicInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(UserInfo::FIELD_BIC);$input->setMaxlength('15');
        }else{
            $input->setElementId(UserInfo::FIELD_BIC); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_BIC, 'Bic');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_BIC, $input);
        
        return $input;
    }
    
    public function setBicDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_BIC, $value);
    }
    
    public function unsetBicInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_BIC);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getBicInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_BIC];
    }
    
    public function getBicValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_BIC);
    }
    
    public function validateBicInput() {
        $value = $this->validateString(UserInfo::TABLE, UserInfo::FIELD_BIC, false, 15);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\DateInput;
    */
    public function setBornInput($input = null) {
        if($input == null){
            $input = \lib\form\input\DateInput::create(UserInfo::FIELD_BORN);
        }else{
            $input->setElementId(UserInfo::FIELD_BORN); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_BORN, 'Born');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_BORN, $input);
        
        return $input;
    }
    
    public function setBornDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_BORN, $value);
    }
    
    public function unsetBornInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_BORN);
    }
    
    /**
    * @return \lib\form\input\DateInput;
    */
    public function getBornInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_BORN];
    }
    
    public function getBornValue(){
        return $this->getInputDate(UserInfo::TABLE, UserInfo::FIELD_BORN);
    }
    
    public function validateBornInput() {
        $value = $this->validateDate(UserInfo::TABLE, UserInfo::FIELD_BORN);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setCivilInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserInfo::FIELD_CIVIL);
	$input->setValuesList(\model\models\UserInfo::$civils);
	$input->setDefault('NA');
        }else{
            $input->setElementId(UserInfo::FIELD_CIVIL); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_CIVIL, 'Civil');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_CIVIL, $input);
        
        return $input;
    }
    
    public function setCivilDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_CIVIL, $value);
    }
    
    public function unsetCivilInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_CIVIL);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getCivilInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_CIVIL];
    }
    
    public function getCivilValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_CIVIL);
    }
    
    public function validateCivilInput() {
        $value = $this->validateValues(UserInfo::TABLE, UserInfo::FIELD_CIVIL, \model\models\UserInfo::$civils, false, 'NA');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setGenreInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserInfo::FIELD_GENRE);
	$input->setValuesList(\model\models\UserInfo::$genres);
	$input->setDefault('M');
        }else{
            $input->setElementId(UserInfo::FIELD_GENRE); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_GENRE, 'Genre');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_GENRE, $input);
        
        return $input;
    }
    
    public function setGenreDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_GENRE, $value);
    }
    
    public function unsetGenreInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_GENRE);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getGenreInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_GENRE];
    }
    
    public function getGenreValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_GENRE);
    }
    
    public function validateGenreInput() {
        $value = $this->validateValues(UserInfo::TABLE, UserInfo::FIELD_GENRE, \model\models\UserInfo::$genres, false, 'M');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setNotesInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(UserInfo::FIELD_NOTES);
        }else{
            $input->setElementId(UserInfo::FIELD_NOTES); 
        }
        
        $this->setFieldLabel(UserInfo::TABLE, UserInfo::FIELD_NOTES, 'Notes');
        $this->setFieldInput(UserInfo::TABLE, UserInfo::FIELD_NOTES, $input);
        
        return $input;
    }
    
    public function setNotesDefault($value) {
        $this->setDefault(UserInfo::TABLE, UserInfo::FIELD_NOTES, $value);
    }
    
    public function unsetNotesInput() {
        $this->unsetFieldInput(UserInfo::TABLE, UserInfo::FIELD_NOTES);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getNotesInput(){
        return $this->forminputs[UserInfo::TABLE][UserInfo::FIELD_NOTES];
    }
    
    public function getNotesValue(){
        return $this->getInputValue(UserInfo::TABLE, UserInfo::FIELD_NOTES);
    }
    
    public function validateNotesInput() {
        $value = $this->validateText(UserInfo::TABLE, UserInfo::FIELD_NOTES);
        return $value;
    }
    


}