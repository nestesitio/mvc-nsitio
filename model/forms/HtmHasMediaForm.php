<?php
namespace model\forms;

use \model\models\HtmHasMedia;

/**
 * Description of HtmHasMediaForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-29 16:42
 * Updated @2016-08-29 16:42
 */
class HtmHasMediaForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmHasMediaForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmHasMedia::TABLE;
        $this->models[HtmHasMedia::TABLE] = new HtmHasMedia();
        
        $this->setHtmMediaIdInput();
	$this->setHtmIdInput();
	$this->setTitleInput();
	$this->setOrdInput();
	$this->setNotesInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateHtmMediaIdInput();
	$this->validateHtmIdInput();
	$this->validateTitleInput();
	$this->validateOrdInput();
	$this->validateNotesInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmMediaIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmHasMedia::FIELD_HTM_MEDIA_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmMedia::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmMediaQuery::start());
        }else{
            $input->setElementId(HtmHasMedia::FIELD_HTM_MEDIA_ID); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, 'Htm Media Id');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, $input);
        
        return $input;
    }
    
    public function setHtmMediaIdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, $value);
    }
    
    public function unsetHtmMediaIdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmMediaIdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_HTM_MEDIA_ID];
    }
    
    public function getHtmMediaIdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID);
    }
    
    public function validateHtmMediaIdInput() {
        $value = $this->validateModel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, \model\querys\HtmMediaQuery::start(), 'htm_media.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmHasMedia::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmHasMedia::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTitleInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmHasMedia::FIELD_TITLE);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmHasMedia::FIELD_TITLE); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE, 'Title');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE, $input);
        
        return $input;
    }
    
    public function setTitleDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE, $value);
    }
    
    public function unsetTitleInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTitleInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_TITLE];
    }
    
    public function getTitleValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE);
    }
    
    public function validateTitleInput() {
        $value = $this->validateString(HtmHasMedia::TABLE, HtmHasMedia::FIELD_TITLE, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setOrdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmHasMedia::FIELD_ORD);
            $input->setRequired(true);
            $input->setDefault('1');$input->setMaxlength('3');
        }else{
            $input->setElementId(HtmHasMedia::FIELD_ORD); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, 'Ord');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, $input);
        
        return $input;
    }
    
    public function setOrdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, $value);
    }
    
    public function unsetOrdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getOrdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_ORD];
    }
    
    public function getOrdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD);
    }
    
    public function validateOrdInput() {
        $value = $this->validateInt(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, true, 3);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setNotesInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(HtmHasMedia::FIELD_NOTES);
        }else{
            $input->setElementId(HtmHasMedia::FIELD_NOTES); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES, 'Notes');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES, $input);
        
        return $input;
    }
    
    public function setNotesDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES, $value);
    }
    
    public function unsetNotesInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getNotesInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_NOTES];
    }
    
    public function getNotesValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES);
    }
    
    public function validateNotesInput() {
        $value = $this->validateText(HtmHasMedia::TABLE, HtmHasMedia::FIELD_NOTES);
        return $value;
    }
    


}