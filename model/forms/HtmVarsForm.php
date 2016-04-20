<?php
namespace model\forms;

use \model\models\HtmVars;

/**
 * Description of HtmVarsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
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
	$this->setHtmIdInput();
	$this->setVarInput();
	$this->setValueInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateHtmIdInput();
	$this->validateVarInput();
	$this->validateValueInput();
	
        
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
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmVars::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmVars::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmVars::TABLE, HtmVars::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmVars::TABLE, HtmVars::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmVars::TABLE, HtmVars::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmVars::TABLE, HtmVars::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmVars::TABLE][HtmVars::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmVars::TABLE, HtmVars::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmVars::TABLE, HtmVars::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setVarInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmVars::FIELD_VAR);$input->setMaxlength('50');
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
        $value = $this->validateString(HtmVars::TABLE, HtmVars::FIELD_VAR, false, 50);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setValueInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmVars::FIELD_VALUE);$input->setMaxlength('150');
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
        $value = $this->validateString(HtmVars::TABLE, HtmVars::FIELD_VALUE, false, 150);
        return $value;
    }
    


}