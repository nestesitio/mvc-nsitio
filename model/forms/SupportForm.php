<?php
namespace model\forms;

use \model\models\Support;

/**
 * Description of SupportForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class SupportForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new SupportForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = Support::TABLE;
        $this->models[Support::TABLE] = new Support();
        
        $this->setIdInput();
	$this->setUserIdInput();
	$this->setSourceInput();
	$this->setStatusInput();
	$this->setTypeInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateUserIdInput();
	$this->validateSourceInput();
	$this->validateStatusInput();
	$this->validateTypeInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(Support::FIELD_ID);
        }else{
            $input->setElementId(Support::FIELD_ID); 
        }
        
        $this->setFieldLabel(Support::TABLE, Support::FIELD_ID, 'Id');
        $this->setFieldInput(Support::TABLE, Support::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(Support::TABLE, Support::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(Support::TABLE, Support::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[Support::TABLE][Support::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(Support::TABLE, Support::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(Support::TABLE, Support::FIELD_ID, \model\querys\SupportQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setUserIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Support::FIELD_USER_ID);
            $input->setRequired(true);$input->setMaxlength('6');
        }else{
            $input->setElementId(Support::FIELD_USER_ID); 
        }
        
        $this->setFieldLabel(Support::TABLE, Support::FIELD_USER_ID, 'User Id');
        $this->setFieldInput(Support::TABLE, Support::FIELD_USER_ID, $input);
        
        return $input;
    }
    
    public function setUserIdDefault($value) {
        $this->setDefault(Support::TABLE, Support::FIELD_USER_ID, $value);
    }
    
    public function unsetUserIdInput() {
        $this->unsetFieldInput(Support::TABLE, Support::FIELD_USER_ID);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getUserIdInput(){
        return $this->forminputs[Support::TABLE][Support::FIELD_USER_ID];
    }
    
    public function getUserIdValue(){
        return $this->getInputValue(Support::TABLE, Support::FIELD_USER_ID);
    }
    
    public function validateUserIdInput() {
        $value = $this->validateInt(Support::TABLE, Support::FIELD_USER_ID, true, 6);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setSourceInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Support::FIELD_SOURCE);
	$input->setValuesList(\model\models\Support::$sources);
	$input->setDefault('mail');
        }else{
            $input->setElementId(Support::FIELD_SOURCE); 
        }
        
        $this->setFieldLabel(Support::TABLE, Support::FIELD_SOURCE, 'Source');
        $this->setFieldInput(Support::TABLE, Support::FIELD_SOURCE, $input);
        
        return $input;
    }
    
    public function setSourceDefault($value) {
        $this->setDefault(Support::TABLE, Support::FIELD_SOURCE, $value);
    }
    
    public function unsetSourceInput() {
        $this->unsetFieldInput(Support::TABLE, Support::FIELD_SOURCE);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getSourceInput(){
        return $this->forminputs[Support::TABLE][Support::FIELD_SOURCE];
    }
    
    public function getSourceValue(){
        return $this->getInputValue(Support::TABLE, Support::FIELD_SOURCE);
    }
    
    public function validateSourceInput() {
        $value = $this->validateValues(Support::TABLE, Support::FIELD_SOURCE, \model\models\Support::$sources, false, 'mail');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setStatusInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Support::FIELD_STATUS);
	$input->setValuesList(\model\models\Support::$statuss);
	$input->setDefault('open');
        }else{
            $input->setElementId(Support::FIELD_STATUS); 
        }
        
        $this->setFieldLabel(Support::TABLE, Support::FIELD_STATUS, 'Status');
        $this->setFieldInput(Support::TABLE, Support::FIELD_STATUS, $input);
        
        return $input;
    }
    
    public function setStatusDefault($value) {
        $this->setDefault(Support::TABLE, Support::FIELD_STATUS, $value);
    }
    
    public function unsetStatusInput() {
        $this->unsetFieldInput(Support::TABLE, Support::FIELD_STATUS);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getStatusInput(){
        return $this->forminputs[Support::TABLE][Support::FIELD_STATUS];
    }
    
    public function getStatusValue(){
        return $this->getInputValue(Support::TABLE, Support::FIELD_STATUS);
    }
    
    public function validateStatusInput() {
        $value = $this->validateValues(Support::TABLE, Support::FIELD_STATUS, \model\models\Support::$statuss, false, 'open');
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setTypeInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(Support::FIELD_TYPE);
	$input->setValuesList(\model\models\Support::$types);
	$input->setDefault('query');
        }else{
            $input->setElementId(Support::FIELD_TYPE); 
        }
        
        $this->setFieldLabel(Support::TABLE, Support::FIELD_TYPE, 'Type');
        $this->setFieldInput(Support::TABLE, Support::FIELD_TYPE, $input);
        
        return $input;
    }
    
    public function setTypeDefault($value) {
        $this->setDefault(Support::TABLE, Support::FIELD_TYPE, $value);
    }
    
    public function unsetTypeInput() {
        $this->unsetFieldInput(Support::TABLE, Support::FIELD_TYPE);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getTypeInput(){
        return $this->forminputs[Support::TABLE][Support::FIELD_TYPE];
    }
    
    public function getTypeValue(){
        return $this->getInputValue(Support::TABLE, Support::FIELD_TYPE);
    }
    
    public function validateTypeInput() {
        $value = $this->validateValues(Support::TABLE, Support::FIELD_TYPE, \model\models\Support::$types, false, 'query');
        return $value;
    }
    


}