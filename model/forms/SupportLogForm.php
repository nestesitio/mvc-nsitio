<?php
namespace model\forms;

use \model\models\SupportLog;

/**
 * Description of SupportLogForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class SupportLogForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new SupportLogForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = SupportLog::TABLE;
        $this->models[SupportLog::TABLE] = new SupportLog();
        
        $this->setIdInput();
	$this->setSupportIdInput();
	$this->setUserIdInput();
	$this->setEventInput();
	$this->setNotesInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateSupportIdInput();
	$this->validateUserIdInput();
	$this->validateEventInput();
	$this->validateNotesInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(SupportLog::FIELD_ID);
        }else{
            $input->setElementId(SupportLog::FIELD_ID); 
        }
        
        $this->setFieldLabel(SupportLog::TABLE, SupportLog::FIELD_ID, 'Id');
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(SupportLog::TABLE, SupportLog::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(SupportLog::TABLE, SupportLog::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[SupportLog::TABLE][SupportLog::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(SupportLog::TABLE, SupportLog::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(SupportLog::TABLE, SupportLog::FIELD_ID, \model\querys\SupportLogQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSupportIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(SupportLog::FIELD_SUPPORT_ID);
            $input->setRequired(true);$input->setMaxlength('9');
        }else{
            $input->setElementId(SupportLog::FIELD_SUPPORT_ID); 
        }
        
        $this->setFieldLabel(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID, 'Support Id');
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID, $input);
        
        return $input;
    }
    
    public function setSupportIdDefault($value) {
        $this->setDefault(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID, $value);
    }
    
    public function unsetSupportIdInput() {
        $this->unsetFieldInput(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSupportIdInput(){
        return $this->forminputs[SupportLog::TABLE][SupportLog::FIELD_SUPPORT_ID];
    }
    
    public function getSupportIdValue(){
        return $this->getInputValue(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID);
    }
    
    public function validateSupportIdInput() {
        $value = $this->validateInt(SupportLog::TABLE, SupportLog::FIELD_SUPPORT_ID, true, 9);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(SupportLog::FIELD_USER_ID);
            $input->setRequired(true);$input->setMaxlength('6');
        }else{
            $input->setElementId(SupportLog::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(SupportLog::TABLE, SupportLog::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(SupportLog::TABLE, SupportLog::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(SupportLog::TABLE, SupportLog::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getUserIdInput(){
        return $this->forminputs[SupportLog::TABLE][SupportLog::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(SupportLog::TABLE, SupportLog::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateInt(SupportLog::TABLE, SupportLog::FIELD_USER_ID, true, 6);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setEventInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(SupportLog::FIELD_EVENT);
	
            $input->setRequired(true);$input->setValuesList(\model\models\SupportLog::$events);
	$input->setDefault('creation');
        }else{
            $input->setElementId(SupportLog::FIELD_EVENT); 
        }
        
        $this->setFieldLabel(SupportLog::TABLE, SupportLog::FIELD_EVENT, 'Event');
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_EVENT, $input);
        
        return $input;
    }
    
    public function setEventDefault($value) {
        $this->setDefault(SupportLog::TABLE, SupportLog::FIELD_EVENT, $value);
    }
    
    public function unsetEventInput() {
        $this->unsetFieldInput(SupportLog::TABLE, SupportLog::FIELD_EVENT);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getEventInput(){
        return $this->forminputs[SupportLog::TABLE][SupportLog::FIELD_EVENT];
    }
    
    public function getEventValue(){
        return $this->getInputValue(SupportLog::TABLE, SupportLog::FIELD_EVENT);
    }
    
    public function validateEventInput() {
        $value = $this->validateValues(SupportLog::TABLE, SupportLog::FIELD_EVENT, \model\models\SupportLog::$events, true, 'creation');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setNotesInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(SupportLog::FIELD_NOTES);
        }else{
            $input->setElementId(SupportLog::FIELD_NOTES); 
        }
        
        $this->setFieldLabel(SupportLog::TABLE, SupportLog::FIELD_NOTES, 'Notes');
        $this->setFieldInput(SupportLog::TABLE, SupportLog::FIELD_NOTES, $input);
        
        return $input;
    }
    
    public function setNotesDefault($value) {
        $this->setDefault(SupportLog::TABLE, SupportLog::FIELD_NOTES, $value);
    }
    
    public function unsetNotesInput() {
        $this->unsetFieldInput(SupportLog::TABLE, SupportLog::FIELD_NOTES);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getNotesInput(){
        return $this->forminputs[SupportLog::TABLE][SupportLog::FIELD_NOTES];
    }
    
    public function getNotesValue(){
        return $this->getInputValue(SupportLog::TABLE, SupportLog::FIELD_NOTES);
    }
    
    public function validateNotesInput() {
        $value = $this->validateText(SupportLog::TABLE, SupportLog::FIELD_NOTES);
        return $value;
    }
    


}