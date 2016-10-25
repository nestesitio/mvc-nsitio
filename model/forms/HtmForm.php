<?php
namespace model\forms;

use \model\models\Htm;

/**
 * Description of HtmForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class HtmForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = Htm::TABLE;
        $this->models[Htm::TABLE] = new Htm();
        
        $this->setIdInput();
	$this->setHtmAppIdInput();
	$this->setStatInput();
	$this->setOrdInput();
	$this->setControllerInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateHtmAppIdInput();
	$this->validateStatInput();
	$this->validateOrdInput();
	$this->validateControllerInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(Htm::FIELD_ID);
        }else{
            $input->setElementId(Htm::FIELD_ID); 
        }
        
        $this->setFieldLabel(Htm::TABLE, Htm::FIELD_ID, 'Id');
        $this->setFieldInput(Htm::TABLE, Htm::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(Htm::TABLE, Htm::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(Htm::TABLE, Htm::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[Htm::TABLE][Htm::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(Htm::TABLE, Htm::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(Htm::TABLE, Htm::FIELD_ID, \model\querys\HtmQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmAppIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Htm::FIELD_HTM_APP_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmApp::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmAppQuery::start());
        }else{
            $input->setElementId(Htm::FIELD_HTM_APP_ID); 
        }
        
        $this->setFieldLabel(Htm::TABLE, Htm::FIELD_HTM_APP_ID, 'Htm App Id');
        $this->setFieldInput(Htm::TABLE, Htm::FIELD_HTM_APP_ID, $input);
        
        return $input;
    }
    
    public function setHtmAppIdDefault($value) {
        $this->setDefault(Htm::TABLE, Htm::FIELD_HTM_APP_ID, $value);
    }
    
    public function unsetHtmAppIdInput() {
        $this->unsetFieldInput(Htm::TABLE, Htm::FIELD_HTM_APP_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmAppIdInput(){
        return $this->forminputs[Htm::TABLE][Htm::FIELD_HTM_APP_ID];
    }
    
    public function getHtmAppIdValue(){
        return $this->getInputValue(Htm::TABLE, Htm::FIELD_HTM_APP_ID);
    }
    
    public function validateHtmAppIdInput() {
        $value = $this->validateModel(Htm::TABLE, Htm::FIELD_HTM_APP_ID, \model\querys\HtmAppQuery::start(), 'htm_app.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setStatInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Htm::FIELD_STAT);
	
            $input->setRequired(true);$input->setValuesList(\model\models\Htm::$stats);
	$input->setDefault('private');
        }else{
            $input->setElementId(Htm::FIELD_STAT); 
        }
        
        $this->setFieldLabel(Htm::TABLE, Htm::FIELD_STAT, 'Stat');
        $this->setFieldInput(Htm::TABLE, Htm::FIELD_STAT, $input);
        
        return $input;
    }
    
    public function setStatDefault($value) {
        $this->setDefault(Htm::TABLE, Htm::FIELD_STAT, $value);
    }
    
    public function unsetStatInput() {
        $this->unsetFieldInput(Htm::TABLE, Htm::FIELD_STAT);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getStatInput(){
        return $this->forminputs[Htm::TABLE][Htm::FIELD_STAT];
    }
    
    public function getStatValue(){
        return $this->getInputValue(Htm::TABLE, Htm::FIELD_STAT);
    }
    
    public function validateStatInput() {
        $value = $this->validateValues(Htm::TABLE, Htm::FIELD_STAT, \model\models\Htm::$stats, true, 'private');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setOrdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Htm::FIELD_ORD);
            $input->setRequired(true);
            $input->setDefault('1');$input->setMaxlength('3');
        }else{
            $input->setElementId(Htm::FIELD_ORD); 
        }
        
        $this->setFieldLabel(Htm::TABLE, Htm::FIELD_ORD, 'Ord');
        $this->setFieldInput(Htm::TABLE, Htm::FIELD_ORD, $input);
        
        return $input;
    }
    
    public function setOrdDefault($value) {
        $this->setDefault(Htm::TABLE, Htm::FIELD_ORD, $value);
    }
    
    public function unsetOrdInput() {
        $this->unsetFieldInput(Htm::TABLE, Htm::FIELD_ORD);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getOrdInput(){
        return $this->forminputs[Htm::TABLE][Htm::FIELD_ORD];
    }
    
    public function getOrdValue(){
        return $this->getInputValue(Htm::TABLE, Htm::FIELD_ORD);
    }
    
    public function validateOrdInput() {
        $value = $this->validateInt(Htm::TABLE, Htm::FIELD_ORD, true, 3);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setControllerInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Htm::FIELD_CONTROLLER);$input->setMaxlength('100');
        }else{
            $input->setElementId(Htm::FIELD_CONTROLLER); 
        }
        
        $this->setFieldLabel(Htm::TABLE, Htm::FIELD_CONTROLLER, 'Controller');
        $this->setFieldInput(Htm::TABLE, Htm::FIELD_CONTROLLER, $input);
        
        return $input;
    }
    
    public function setControllerDefault($value) {
        $this->setDefault(Htm::TABLE, Htm::FIELD_CONTROLLER, $value);
    }
    
    public function unsetControllerInput() {
        $this->unsetFieldInput(Htm::TABLE, Htm::FIELD_CONTROLLER);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getControllerInput(){
        return $this->forminputs[Htm::TABLE][Htm::FIELD_CONTROLLER];
    }
    
    public function getControllerValue(){
        return $this->getInputValue(Htm::TABLE, Htm::FIELD_CONTROLLER);
    }
    
    public function validateControllerInput() {
        $value = $this->validateString(Htm::TABLE, Htm::FIELD_CONTROLLER, false, 100);
        return $value;
    }
    


}