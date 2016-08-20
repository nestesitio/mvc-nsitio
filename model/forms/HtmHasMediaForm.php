<?php
namespace model\forms;

use \model\models\HtmHasMedia;

/**
 * Description of HtmHasMediaForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class HtmHasMediaForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmHasMediaForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmHasMedia::TABLE;
        $this->models[HtmHasMedia::TABLE] = new HtmHasMedia();
        
        $this->setHtmIdInput();
	$this->setHtmMediaIdInput();
	$this->setOrdInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateHtmIdInput();
	$this->validateHtmMediaIdInput();
	$this->validateOrdInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmHasMedia::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmHasMedia::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmMediaIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmHasMedia::FIELD_HTM_MEDIA_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmMedia::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmMediaQuery::start());
        }else{
            $input->setElementId(HtmHasMedia::FIELD_HTM_MEDIA_ID); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, 'Htm Media Id');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, $input);
        
        return $input;
    }
    
    public function setHtmMediaIdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, $value);
    }
    
    public function unsetHtmMediaIdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmMediaIdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_HTM_MEDIA_ID];
    }
    
    public function getHtmMediaIdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID);
    }
    
    public function validateHtmMediaIdInput() {
        $value = $this->validateModel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_HTM_MEDIA_ID, \model\querys\HtmMediaQuery::start(), 'htm_media.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setOrdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmHasMedia::FIELD_ORD);$input->setMaxlength('3');
        }else{
            $input->setElementId(HtmHasMedia::FIELD_ORD); 
        }
        
        $this->setFieldLabel(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, 'Ord');
        $this->setFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, $input);
        
        return $input;
    }
    
    public function setOrdDefault($value) {
        $this->setDefault(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, $value);
    }
    
    public function unsetOrdInput() {
        $this->unsetFieldInput(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getOrdInput(){
        return $this->forminputs[HtmHasMedia::TABLE][HtmHasMedia::FIELD_ORD];
    }
    
    public function getOrdValue(){
        return $this->getInputValue(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD);
    }
    
    public function validateOrdInput() {
        $value = $this->validateInt(HtmHasMedia::TABLE, HtmHasMedia::FIELD_ORD, false, 3);
        return $value;
    }
    


}