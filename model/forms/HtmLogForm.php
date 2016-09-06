<?php
namespace model\forms;

use \model\models\HtmLog;

/**
 * Description of HtmLogForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class HtmLogForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmLogForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmLog::TABLE;
        $this->models[HtmLog::TABLE] = new HtmLog();
        
        $this->setIdInput();
	$this->setHtmIdInput();
	$this->setUserIdInput();
	$this->setEventInput();
	$this->setDescriptionInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateHtmIdInput();
	$this->validateUserIdInput();
	$this->validateEventInput();
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
            $input = \lib\form\input\HiddenInput::create(HtmLog::FIELD_ID);
        }else{
            $input->setElementId(HtmLog::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmLog::TABLE, HtmLog::FIELD_ID, 'Id');
        $this->setFieldInput(HtmLog::TABLE, HtmLog::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmLog::TABLE, HtmLog::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmLog::TABLE, HtmLog::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmLog::TABLE][HtmLog::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmLog::TABLE, HtmLog::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmLog::TABLE, HtmLog::FIELD_ID, \model\querys\HtmLogQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmLog::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmLog::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmLog::TABLE, HtmLog::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmLog::TABLE, HtmLog::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmLog::TABLE, HtmLog::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmLog::TABLE, HtmLog::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmLog::TABLE][HtmLog::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmLog::TABLE, HtmLog::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmLog::TABLE, HtmLog::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmLog::FIELD_USER_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserBase::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserBaseQuery::start());
        }else{
            $input->setElementId(HtmLog::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(HtmLog::TABLE, HtmLog::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(HtmLog::TABLE, HtmLog::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(HtmLog::TABLE, HtmLog::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(HtmLog::TABLE, HtmLog::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserIdInput(){
        return $this->forminputs[HtmLog::TABLE][HtmLog::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(HtmLog::TABLE, HtmLog::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateModel(HtmLog::TABLE, HtmLog::FIELD_USER_ID, \model\querys\UserBaseQuery::start(), 'user_base.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setEventInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmLog::FIELD_EVENT);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmLog::FIELD_EVENT); 
        }
        
        $this->setFieldLabel(HtmLog::TABLE, HtmLog::FIELD_EVENT, 'Event');
        $this->setFieldInput(HtmLog::TABLE, HtmLog::FIELD_EVENT, $input);
        
        return $input;
    }
    
    public function setEventDefault($value) {
        $this->setDefault(HtmLog::TABLE, HtmLog::FIELD_EVENT, $value);
    }
    
    public function unsetEventInput() {
        $this->unsetFieldInput(HtmLog::TABLE, HtmLog::FIELD_EVENT);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getEventInput(){
        return $this->forminputs[HtmLog::TABLE][HtmLog::FIELD_EVENT];
    }
    
    public function getEventValue(){
        return $this->getInputValue(HtmLog::TABLE, HtmLog::FIELD_EVENT);
    }
    
    public function validateEventInput() {
        $value = $this->validateString(HtmLog::TABLE, HtmLog::FIELD_EVENT, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setDescriptionInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmLog::FIELD_DESCRIPTION);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmLog::FIELD_DESCRIPTION); 
        }
        
        $this->setFieldLabel(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION, 'Description');
        $this->setFieldInput(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION, $input);
        
        return $input;
    }
    
    public function setDescriptionDefault($value) {
        $this->setDefault(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION, $value);
    }
    
    public function unsetDescriptionInput() {
        $this->unsetFieldInput(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getDescriptionInput(){
        return $this->forminputs[HtmLog::TABLE][HtmLog::FIELD_DESCRIPTION];
    }
    
    public function getDescriptionValue(){
        return $this->getInputValue(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION);
    }
    
    public function validateDescriptionInput() {
        $value = $this->validateString(HtmLog::TABLE, HtmLog::FIELD_DESCRIPTION, false, 100);
        return $value;
    }
    


}