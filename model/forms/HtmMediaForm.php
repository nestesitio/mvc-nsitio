<?php
namespace model\forms;

use \model\models\HtmMedia;

/**
 * Description of HtmMediaForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class HtmMediaForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmMediaForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmMedia::TABLE;
        $this->models[HtmMedia::TABLE] = new HtmMedia();
        
        $this->setIdInput();
	$this->setGenreInput();
	$this->setUrlInput();
	$this->setTitleInput();
	$this->setAuthorInput();
	$this->setDateInput();
	$this->setDescriptionInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateGenreInput();
	$this->validateUrlInput();
	$this->validateTitleInput();
	$this->validateAuthorInput();
	$this->validateDateInput();
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
            $input = \lib\form\input\HiddenInput::create(HtmMedia::FIELD_ID);
        }else{
            $input->setElementId(HtmMedia::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_ID, 'Id');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmMedia::TABLE, HtmMedia::FIELD_ID, \model\querys\HtmMediaQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setGenreInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmMedia::FIELD_GENRE);
	
            $input->setRequired(true);$input->setValuesList(\model\models\HtmMedia::$genres);
	$input->setDefault('img');
        }else{
            $input->setElementId(HtmMedia::FIELD_GENRE); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_GENRE, 'Genre');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_GENRE, $input);
        
        return $input;
    }
    
    public function setGenreDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_GENRE, $value);
    }
    
    public function unsetGenreInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_GENRE);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getGenreInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_GENRE];
    }
    
    public function getGenreValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_GENRE);
    }
    
    public function validateGenreInput() {
        $value = $this->validateValues(HtmMedia::TABLE, HtmMedia::FIELD_GENRE, \model\models\HtmMedia::$genres, true, 'img');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setUrlInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmMedia::FIELD_URL);$input->setMaxlength('150');
        }else{
            $input->setElementId(HtmMedia::FIELD_URL); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_URL, 'Url');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_URL, $input);
        
        return $input;
    }
    
    public function setUrlDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_URL, $value);
    }
    
    public function unsetUrlInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_URL);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getUrlInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_URL];
    }
    
    public function getUrlValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_URL);
    }
    
    public function validateUrlInput() {
        $value = $this->validateString(HtmMedia::TABLE, HtmMedia::FIELD_URL, false, 150);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTitleInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmMedia::FIELD_TITLE);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmMedia::FIELD_TITLE); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_TITLE, 'Title');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_TITLE, $input);
        
        return $input;
    }
    
    public function setTitleDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_TITLE, $value);
    }
    
    public function unsetTitleInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_TITLE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTitleInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_TITLE];
    }
    
    public function getTitleValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_TITLE);
    }
    
    public function validateTitleInput() {
        $value = $this->validateString(HtmMedia::TABLE, HtmMedia::FIELD_TITLE, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setAuthorInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmMedia::FIELD_AUTHOR);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmMedia::FIELD_AUTHOR); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR, 'Author');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR, $input);
        
        return $input;
    }
    
    public function setAuthorDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR, $value);
    }
    
    public function unsetAuthorInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getAuthorInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_AUTHOR];
    }
    
    public function getAuthorValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR);
    }
    
    public function validateAuthorInput() {
        $value = $this->validateString(HtmMedia::TABLE, HtmMedia::FIELD_AUTHOR, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\DateInput;
    */
    public function setDateInput($input = null) {
        if($input == null){
            $input = \lib\form\input\DateInput::create(HtmMedia::FIELD_DATE);
        }else{
            $input->setElementId(HtmMedia::FIELD_DATE); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_DATE, 'Date');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_DATE, $input);
        
        return $input;
    }
    
    public function setDateDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_DATE, $value);
    }
    
    public function unsetDateInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_DATE);
    }
    
    /**
    * @return \lib\form\input\DateInput;
    */
    public function getDateInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_DATE];
    }
    
    public function getDateValue(){
        return $this->getInputDate(HtmMedia::TABLE, HtmMedia::FIELD_DATE);
    }
    
    public function validateDateInput() {
        $value = $this->validateDate(HtmMedia::TABLE, HtmMedia::FIELD_DATE);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setDescriptionInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(HtmMedia::FIELD_DESCRIPTION);
        }else{
            $input->setElementId(HtmMedia::FIELD_DESCRIPTION); 
        }
        
        $this->setFieldLabel(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION, 'Description');
        $this->setFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION, $input);
        
        return $input;
    }
    
    public function setDescriptionDefault($value) {
        $this->setDefault(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION, $value);
    }
    
    public function unsetDescriptionInput() {
        $this->unsetFieldInput(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getDescriptionInput(){
        return $this->forminputs[HtmMedia::TABLE][HtmMedia::FIELD_DESCRIPTION];
    }
    
    public function getDescriptionValue(){
        return $this->getInputValue(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION);
    }
    
    public function validateDescriptionInput() {
        $value = $this->validateText(HtmMedia::TABLE, HtmMedia::FIELD_DESCRIPTION);
        return $value;
    }
    


}