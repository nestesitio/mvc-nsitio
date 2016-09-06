<?php
namespace model\forms;

use \model\models\HtmVars;

/**
 * Description of HtmVarsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-29 16:42
 * Updated @2016-08-29 16:42
 */
class HtmVarsForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmVarsForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmVars::TABLE;
        $this->models[HtmVars::TABLE] = new HtmVars();
        
        $this->setIdInput();
	$this->setVarInput();
	$this->setValueInput();
	$this->setStatusInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateVarInput();
	$this->validateValueInput();
	$this->validateStatusInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(HtmVars::FIELD_ID);
        }else{
            $input->setElementId(HtmVars::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmVars::TABLE, HtmVars::FIELD_ID, 'Id');
        $this->setFieldInput(HtmVars::TABLE, HtmVars::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmVars::TABLE, HtmVars::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmVars::TABLE, HtmVars::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmVars::TABLE][HtmVars::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmVars::TABLE, HtmVars::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmVars::TABLE, HtmVars::FIELD_ID, \model\querys\HtmVarsQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setVarInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmVars::FIELD_VAR);
            $input->setDefault('tag');$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmVars::FIELD_VAR); 
        }
        
        $this->setFieldLabel(HtmVars::TABLE, HtmVars::FIELD_VAR, 'Var');
        $this->setFieldInput(HtmVars::TABLE, HtmVars::FIELD_VAR, $input);
        
        return $input;
    }
    
    public function setVarDefault($value) {
        $this->setDefault(HtmVars::TABLE, HtmVars::FIELD_VAR, $value);
    }
    
    public function unsetVarInput() {
        $this->unsetFieldInput(HtmVars::TABLE, HtmVars::FIELD_VAR);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getVarInput(){
        return $this->forminputs[HtmVars::TABLE][HtmVars::FIELD_VAR];
    }
    
    public function getVarValue(){
        return $this->getInputValue(HtmVars::TABLE, HtmVars::FIELD_VAR);
    }
    
    public function validateVarInput() {
        $value = $this->validateString(HtmVars::TABLE, HtmVars::FIELD_VAR, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setValueInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmVars::FIELD_VALUE);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmVars::FIELD_VALUE); 
        }
        
        $this->setFieldLabel(HtmVars::TABLE, HtmVars::FIELD_VALUE, 'Value');
        $this->setFieldInput(HtmVars::TABLE, HtmVars::FIELD_VALUE, $input);
        
        return $input;
    }
    
    public function setValueDefault($value) {
        $this->setDefault(HtmVars::TABLE, HtmVars::FIELD_VALUE, $value);
    }
    
    public function unsetValueInput() {
        $this->unsetFieldInput(HtmVars::TABLE, HtmVars::FIELD_VALUE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getValueInput(){
        return $this->forminputs[HtmVars::TABLE][HtmVars::FIELD_VALUE];
    }
    
    public function getValueValue(){
        return $this->getInputValue(HtmVars::TABLE, HtmVars::FIELD_VALUE);
    }
    
    public function validateValueInput() {
        $value = $this->validateString(HtmVars::TABLE, HtmVars::FIELD_VALUE, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setStatusInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmVars::FIELD_STATUS);
	$input->setValuesList(\model\models\HtmVars::$statuss);
        }else{
            $input->setElementId(HtmVars::FIELD_STATUS); 
        }
        
        $this->setFieldLabel(HtmVars::TABLE, HtmVars::FIELD_STATUS, 'Status');
        $this->setFieldInput(HtmVars::TABLE, HtmVars::FIELD_STATUS, $input);
        
        return $input;
    }
    
    public function setStatusDefault($value) {
        $this->setDefault(HtmVars::TABLE, HtmVars::FIELD_STATUS, $value);
    }
    
    public function unsetStatusInput() {
        $this->unsetFieldInput(HtmVars::TABLE, HtmVars::FIELD_STATUS);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getStatusInput(){
        return $this->forminputs[HtmVars::TABLE][HtmVars::FIELD_STATUS];
    }
    
    public function getStatusValue(){
        return $this->getInputValue(HtmVars::TABLE, HtmVars::FIELD_STATUS);
    }
    
    public function validateStatusInput() {
        $value = $this->validateValues(HtmVars::TABLE, HtmVars::FIELD_STATUS, \model\models\HtmVars::$statuss, false);
        return $value;
    }
    


}