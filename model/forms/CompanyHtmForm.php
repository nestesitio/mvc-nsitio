<?php
namespace model\forms;

use \model\models\CompanyHtm;

/**
 * Description of CompanyHtmForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-06-30 15:54
 * Updated @2016-06-30 15:54
 */
class CompanyHtmForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new CompanyHtmForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = CompanyHtm::TABLE;
        $this->models[CompanyHtm::TABLE] = new CompanyHtm();
        
        $this->setIdInput();
	$this->setCompanyIdInput();
	$this->setHtmIdInput();
	$this->setHtmTypeIdInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateCompanyIdInput();
	$this->validateHtmIdInput();
	$this->validateHtmTypeIdInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(CompanyHtm::FIELD_ID);
        }else{
            $input->setElementId(CompanyHtm::FIELD_ID); 
        }
        
        $this->setFieldLabel(CompanyHtm::TABLE, CompanyHtm::FIELD_ID, 'Id');
        $this->setFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(CompanyHtm::TABLE, CompanyHtm::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[CompanyHtm::TABLE][CompanyHtm::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(CompanyHtm::TABLE, CompanyHtm::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(CompanyHtm::TABLE, CompanyHtm::FIELD_ID, \model\querys\CompanyHtmQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setCompanyIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyHtm::FIELD_COMPANY_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Company::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\CompanyQuery::start());
        }else{
            $input->setElementId(CompanyHtm::FIELD_COMPANY_ID); 
        }
        
        $this->setFieldLabel(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID, 'Company Id');
        $this->setFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID, $input);
        
        return $input;
    }
    
    public function setCompanyIdDefault($value) {
        $this->setDefault(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID, $value);
    }
    
    public function unsetCompanyIdInput() {
        $this->unsetFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getCompanyIdInput(){
        return $this->forminputs[CompanyHtm::TABLE][CompanyHtm::FIELD_COMPANY_ID];
    }
    
    public function getCompanyIdValue(){
        return $this->getInputValue(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID);
    }
    
    public function validateCompanyIdInput() {
        $value = $this->validateModel(CompanyHtm::TABLE, CompanyHtm::FIELD_COMPANY_ID, \model\querys\CompanyQuery::start(), 'company.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(CompanyHtm::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(CompanyHtm::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[CompanyHtm::TABLE][CompanyHtm::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setHtmTypeIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(CompanyHtm::FIELD_HTM_TYPE_ID);
            $input->setRequired(true);$input->setMaxlength('9');
        }else{
            $input->setElementId(CompanyHtm::FIELD_HTM_TYPE_ID); 
        }
        
        $this->setFieldLabel(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID, 'Htm Type Id');
        $this->setFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID, $input);
        
        return $input;
    }
    
    public function setHtmTypeIdDefault($value) {
        $this->setDefault(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID, $value);
    }
    
    public function unsetHtmTypeIdInput() {
        $this->unsetFieldInput(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getHtmTypeIdInput(){
        return $this->forminputs[CompanyHtm::TABLE][CompanyHtm::FIELD_HTM_TYPE_ID];
    }
    
    public function getHtmTypeIdValue(){
        return $this->getInputValue(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID);
    }
    
    public function validateHtmTypeIdInput() {
        $value = $this->validateInt(CompanyHtm::TABLE, CompanyHtm::FIELD_HTM_TYPE_ID, true, 9);
        return $value;
    }
    


}