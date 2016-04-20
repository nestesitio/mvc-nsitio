<?php
namespace model\forms;

use \model\models\Langs;

/**
 * Description of LangsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class LangsForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new LangsForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = Langs::TABLE;
        $this->models[Langs::TABLE] = new Langs();
        
        $this->setTldInput();
	$this->setNameInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateTldInput();
	$this->validateNameInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTldInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Langs::FIELD_TLD);
        }else{
            $input->setElementId(Langs::FIELD_TLD); 
        }
        
        $this->setFieldLabel(Langs::TABLE, Langs::FIELD_TLD, 'Tld');
        $this->setFieldInput(Langs::TABLE, Langs::FIELD_TLD, $input);
        
        return $input;
    }
    
    public function setTldDefault($value) {
        $this->setDefault(Langs::TABLE, Langs::FIELD_TLD, $value);
    }
    
    public function unsetTldInput() {
        $this->unsetFieldInput(Langs::TABLE, Langs::FIELD_TLD);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTldInput(){
        return $this->forminputs[Langs::TABLE][Langs::FIELD_TLD];
    }
    
    public function getTldValue(){
        return $this->getInputValue(Langs::TABLE, Langs::FIELD_TLD);
    }
    
    public function validateTldInput() {
        $value = $this->validatePrimaryKey(Langs::TABLE, Langs::FIELD_TLD, \model\querys\LangsQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(Langs::FIELD_NAME);$input->setMaxlength('100');
        }else{
            $input->setElementId(Langs::FIELD_NAME); 
        }
        
        $this->setFieldLabel(Langs::TABLE, Langs::FIELD_NAME, 'Name');
        $this->setFieldInput(Langs::TABLE, Langs::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(Langs::TABLE, Langs::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(Langs::TABLE, Langs::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[Langs::TABLE][Langs::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(Langs::TABLE, Langs::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(Langs::TABLE, Langs::FIELD_NAME, false, 100);
        return $value;
    }
    


}