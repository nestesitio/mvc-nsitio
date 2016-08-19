<?php
namespace model\forms;

use \model\models\HtmPageHasVars;

/**
 * Description of HtmPageHasVarsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class HtmPageHasVarsForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmPageHasVarsForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmPageHasVars::TABLE;
        $this->models[HtmPageHasVars::TABLE] = new HtmPageHasVars();
        
        $this->setHtmVarsIdInput();
	$this->setHtmIdInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateHtmVarsIdInput();
	$this->validateHtmIdInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmVarsIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmPageHasVars::FIELD_HTM_VARS_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmVars::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmVarsQuery::start());
        }else{
            $input->setElementId(HtmPageHasVars::FIELD_HTM_VARS_ID); 
        }
        
        $this->setFieldLabel(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID, 'Htm Vars Id');
        $this->setFieldInput(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID, $input);
        
        return $input;
    }
    
    public function setHtmVarsIdDefault($value) {
        $this->setDefault(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID, $value);
    }
    
    public function unsetHtmVarsIdInput() {
        $this->unsetFieldInput(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmVarsIdInput(){
        return $this->forminputs[HtmPageHasVars::TABLE][HtmPageHasVars::FIELD_HTM_VARS_ID];
    }
    
    public function getHtmVarsIdValue(){
        return $this->getInputValue(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID);
    }
    
    public function validateHtmVarsIdInput() {
        $value = $this->validateModel(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_VARS_ID, \model\querys\HtmVarsQuery::start(), 'htm_vars.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmPageHasVars::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmPageHasVars::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmPageHasVars::TABLE][HtmPageHasVars::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmPageHasVars::TABLE, HtmPageHasVars::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    


}