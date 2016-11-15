<?php
namespace model\forms;

use \model\models\MediaInfo;

/**
 * Description of MediaInfoForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class MediaInfoForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new MediaInfoForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = MediaInfo::TABLE;
        $this->models[MediaInfo::TABLE] = new MediaInfo();
        
        $this->setIdInput();
	$this->setMediaIdInput();
	$this->setMediaCollectionIdInput();
	$this->setLangsTldInput();
	$this->setTitleInput();
	$this->setAuthorInput();
	$this->setSummaryInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateMediaIdInput();
	$this->validateMediaCollectionIdInput();
	$this->validateLangsTldInput();
	$this->validateTitleInput();
	$this->validateAuthorInput();
	$this->validateSummaryInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(MediaInfo::FIELD_ID);
        }else{
            $input->setElementId(MediaInfo::FIELD_ID); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_ID, 'Id');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(MediaInfo::TABLE, MediaInfo::FIELD_ID, \model\querys\MediaInfoQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setMediaIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(MediaInfo::FIELD_MEDIA_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Media::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\MediaQuery::start());
        }else{
            $input->setElementId(MediaInfo::FIELD_MEDIA_ID); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID, 'Media Id');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID, $input);
        
        return $input;
    }
    
    public function setMediaIdDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID, $value);
    }
    
    public function unsetMediaIdInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getMediaIdInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_MEDIA_ID];
    }
    
    public function getMediaIdValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID);
    }
    
    public function validateMediaIdInput() {
        $value = $this->validateModel(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_ID, \model\querys\MediaQuery::start(), 'media.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setMediaCollectionIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(MediaInfo::FIELD_MEDIA_COLLECTION_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\MediaCollection::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\MediaCollectionQuery::start());
            $input->setDefault('1');
        }else{
            $input->setElementId(MediaInfo::FIELD_MEDIA_COLLECTION_ID); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID, 'Media Collection Id');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID, $input);
        
        return $input;
    }
    
    public function setMediaCollectionIdDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID, $value);
    }
    
    public function unsetMediaCollectionIdInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getMediaCollectionIdInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_MEDIA_COLLECTION_ID];
    }
    
    public function getMediaCollectionIdValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID);
    }
    
    public function validateMediaCollectionIdInput() {
        $value = $this->validateModel(MediaInfo::TABLE, MediaInfo::FIELD_MEDIA_COLLECTION_ID, \model\querys\MediaCollectionQuery::start(), 'media_collection.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setLangsTldInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(MediaInfo::FIELD_LANGS_TLD);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Langs::FIELD_TLD);
            $input->addEmpty();
            $input->setModel(\model\querys\LangsQuery::start());
            $input->setDefault('pt');
        }else{
            $input->setElementId(MediaInfo::FIELD_LANGS_TLD); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD, 'Langs Tld');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD, $input);
        
        return $input;
    }
    
    public function setLangsTldDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD, $value);
    }
    
    public function unsetLangsTldInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getLangsTldInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_LANGS_TLD];
    }
    
    public function getLangsTldValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD);
    }
    
    public function validateLangsTldInput() {
        $value = $this->validateModel(MediaInfo::TABLE, MediaInfo::FIELD_LANGS_TLD, \model\querys\LangsQuery::start(), 'langs.tld', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTitleInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(MediaInfo::FIELD_TITLE);$input->setMaxlength('100');
        }else{
            $input->setElementId(MediaInfo::FIELD_TITLE); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_TITLE, 'Title');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_TITLE, $input);
        
        return $input;
    }
    
    public function setTitleDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_TITLE, $value);
    }
    
    public function unsetTitleInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_TITLE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTitleInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_TITLE];
    }
    
    public function getTitleValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_TITLE);
    }
    
    public function validateTitleInput() {
        $value = $this->validateString(MediaInfo::TABLE, MediaInfo::FIELD_TITLE, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setAuthorInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(MediaInfo::FIELD_AUTHOR);$input->setMaxlength('100');
        }else{
            $input->setElementId(MediaInfo::FIELD_AUTHOR); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR, 'Author');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR, $input);
        
        return $input;
    }
    
    public function setAuthorDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR, $value);
    }
    
    public function unsetAuthorInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getAuthorInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_AUTHOR];
    }
    
    public function getAuthorValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR);
    }
    
    public function validateAuthorInput() {
        $value = $this->validateString(MediaInfo::TABLE, MediaInfo::FIELD_AUTHOR, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSummaryInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(MediaInfo::FIELD_SUMMARY);$input->setMaxlength('250');
        }else{
            $input->setElementId(MediaInfo::FIELD_SUMMARY); 
        }
        
        $this->setFieldLabel(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY, 'Summary');
        $this->setFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY, $input);
        
        return $input;
    }
    
    public function setSummaryDefault($value) {
        $this->setDefault(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY, $value);
    }
    
    public function unsetSummaryInput() {
        $this->unsetFieldInput(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSummaryInput(){
        return $this->forminputs[MediaInfo::TABLE][MediaInfo::FIELD_SUMMARY];
    }
    
    public function getSummaryValue(){
        return $this->getInputValue(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY);
    }
    
    public function validateSummaryInput() {
        $value = $this->validateString(MediaInfo::TABLE, MediaInfo::FIELD_SUMMARY, false, 250);
        return $value;
    }
    


}