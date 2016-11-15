<?php
namespace model\forms;

use \model\models\HtmTxt;

/**
 * Description of HtmTxtForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class HtmTxtForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmTxtForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmTxt::TABLE;
        $this->models[HtmTxt::TABLE] = new HtmTxt();
        
        $this->setIdInput();
	$this->setHtmPageIdInput();
	$this->setTxtInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateHtmPageIdInput();
	$this->validateTxtInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(HtmTxt::FIELD_ID);
        }else{
            $input->setElementId(HtmTxt::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmTxt::TABLE, HtmTxt::FIELD_ID, 'Id');
        $this->setFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmTxt::TABLE, HtmTxt::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmTxt::TABLE][HtmTxt::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmTxt::TABLE, HtmTxt::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmTxt::TABLE, HtmTxt::FIELD_ID, \model\querys\HtmTxtQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmPageIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmTxt::FIELD_HTM_PAGE_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmPage::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmPageQuery::start());
        }else{
            $input->setElementId(HtmTxt::FIELD_HTM_PAGE_ID); 
        }
        
        $this->setFieldLabel(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID, 'Htm Page Id');
        $this->setFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID, $input);
        
        return $input;
    }
    
    public function setHtmPageIdDefault($value) {
        $this->setDefault(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID, $value);
    }
    
    public function unsetHtmPageIdInput() {
        $this->unsetFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmPageIdInput(){
        return $this->forminputs[HtmTxt::TABLE][HtmTxt::FIELD_HTM_PAGE_ID];
    }
    
    public function getHtmPageIdValue(){
        return $this->getInputValue(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID);
    }
    
    public function validateHtmPageIdInput() {
        $value = $this->validateModel(HtmTxt::TABLE, HtmTxt::FIELD_HTM_PAGE_ID, \model\querys\HtmPageQuery::start(), 'htm_page.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\TextAreaInput;
    */
    public function setTxtInput($input = null) {
        if($input == null){
            $input = \lib\form\input\TextAreaInput::create(HtmTxt::FIELD_TXT);
        }else{
            $input->setElementId(HtmTxt::FIELD_TXT); 
        }
        
        $this->setFieldLabel(HtmTxt::TABLE, HtmTxt::FIELD_TXT, 'Txt');
        $this->setFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_TXT, $input);
        
        return $input;
    }
    
    public function setTxtDefault($value) {
        $this->setDefault(HtmTxt::TABLE, HtmTxt::FIELD_TXT, $value);
    }
    
    public function unsetTxtInput() {
        $this->unsetFieldInput(HtmTxt::TABLE, HtmTxt::FIELD_TXT);
    }
    
    /**
    * @return \lib\form\input\TextAreaInput;
    */
    public function getTxtInput(){
        return $this->forminputs[HtmTxt::TABLE][HtmTxt::FIELD_TXT];
    }
    
    public function getTxtValue(){
        return $this->getInputValue(HtmTxt::TABLE, HtmTxt::FIELD_TXT);
    }
    
    public function validateTxtInput() {
        $value = $this->validateText(HtmTxt::TABLE, HtmTxt::FIELD_TXT);
        return $value;
    }
    


}