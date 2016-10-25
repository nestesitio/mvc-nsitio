<?php
namespace model\forms;

use \model\models\Media;

/**
 * Description of MediaForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class MediaForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new MediaForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = Media::TABLE;
        $this->models[Media::TABLE] = new Media();
        
        $this->setIdInput();
	$this->setGenreInput();
	$this->setSourceInput();
	$this->setLinkInput();
	$this->setDateInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateGenreInput();
	$this->validateSourceInput();
	$this->validateLinkInput();
	$this->validateDateInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(Media::FIELD_ID);
        }else{
            $input->setElementId(Media::FIELD_ID); 
        }
        
        $this->setFieldLabel(Media::TABLE, Media::FIELD_ID, 'Id');
        $this->setFieldInput(Media::TABLE, Media::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(Media::TABLE, Media::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(Media::TABLE, Media::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[Media::TABLE][Media::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(Media::TABLE, Media::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(Media::TABLE, Media::FIELD_ID, \model\querys\MediaQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setGenreInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Media::FIELD_GENRE);
	
            $input->setRequired(true);$input->setValuesList(\model\models\Media::$genres);
	$input->setDefault('img');
        }else{
            $input->setElementId(Media::FIELD_GENRE); 
        }
        
        $this->setFieldLabel(Media::TABLE, Media::FIELD_GENRE, 'Genre');
        $this->setFieldInput(Media::TABLE, Media::FIELD_GENRE, $input);
        
        return $input;
    }
    
    public function setGenreDefault($value) {
        $this->setDefault(Media::TABLE, Media::FIELD_GENRE, $value);
    }
    
    public function unsetGenreInput() {
        $this->unsetFieldInput(Media::TABLE, Media::FIELD_GENRE);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getGenreInput(){
        return $this->forminputs[Media::TABLE][Media::FIELD_GENRE];
    }
    
    public function getGenreValue(){
        return $this->getInputValue(Media::TABLE, Media::FIELD_GENRE);
    }
    
    public function validateGenreInput() {
        $value = $this->validateValues(Media::TABLE, Media::FIELD_GENRE, \model\models\Media::$genres, true, 'img');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSourceInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Media::FIELD_SOURCE);$input->setMaxlength('150');
        }else{
            $input->setElementId(Media::FIELD_SOURCE); 
        }
        
        $this->setFieldLabel(Media::TABLE, Media::FIELD_SOURCE, 'Source');
        $this->setFieldInput(Media::TABLE, Media::FIELD_SOURCE, $input);
        
        return $input;
    }
    
    public function setSourceDefault($value) {
        $this->setDefault(Media::TABLE, Media::FIELD_SOURCE, $value);
    }
    
    public function unsetSourceInput() {
        $this->unsetFieldInput(Media::TABLE, Media::FIELD_SOURCE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSourceInput(){
        return $this->forminputs[Media::TABLE][Media::FIELD_SOURCE];
    }
    
    public function getSourceValue(){
        return $this->getInputValue(Media::TABLE, Media::FIELD_SOURCE);
    }
    
    public function validateSourceInput() {
        $value = $this->validateString(Media::TABLE, Media::FIELD_SOURCE, false, 150);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setLinkInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Media::FIELD_LINK);$input->setMaxlength('100');
        }else{
            $input->setElementId(Media::FIELD_LINK); 
        }
        
        $this->setFieldLabel(Media::TABLE, Media::FIELD_LINK, 'Link');
        $this->setFieldInput(Media::TABLE, Media::FIELD_LINK, $input);
        
        return $input;
    }
    
    public function setLinkDefault($value) {
        $this->setDefault(Media::TABLE, Media::FIELD_LINK, $value);
    }
    
    public function unsetLinkInput() {
        $this->unsetFieldInput(Media::TABLE, Media::FIELD_LINK);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getLinkInput(){
        return $this->forminputs[Media::TABLE][Media::FIELD_LINK];
    }
    
    public function getLinkValue(){
        return $this->getInputValue(Media::TABLE, Media::FIELD_LINK);
    }
    
    public function validateLinkInput() {
        $value = $this->validateString(Media::TABLE, Media::FIELD_LINK, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\DateInput;
    */
    public function setDateInput($input = null) {
        if($input == null){
            $input = \lib\form\input\DateInput::create(Media::FIELD_DATE);
        }else{
            $input->setElementId(Media::FIELD_DATE); 
        }
        
        $this->setFieldLabel(Media::TABLE, Media::FIELD_DATE, 'Date');
        $this->setFieldInput(Media::TABLE, Media::FIELD_DATE, $input);
        
        return $input;
    }
    
    public function setDateDefault($value) {
        $this->setDefault(Media::TABLE, Media::FIELD_DATE, $value);
    }
    
    public function unsetDateInput() {
        $this->unsetFieldInput(Media::TABLE, Media::FIELD_DATE);
    }
    
    /**
    * @return \lib\form\input\DateInput;
    */
    public function getDateInput(){
        return $this->forminputs[Media::TABLE][Media::FIELD_DATE];
    }
    
    public function getDateValue(){
        return $this->getInputDate(Media::TABLE, Media::FIELD_DATE);
    }
    
    public function validateDateInput() {
        $value = $this->validateDate(Media::TABLE, Media::FIELD_DATE);
        return $value;
    }
    


}