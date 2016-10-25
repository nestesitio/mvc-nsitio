<?php
namespace model\forms;

use \model\models\MediaCollection;

/**
 * Description of MediaCollectionForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class MediaCollectionForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new MediaCollectionForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = MediaCollection::TABLE;
        $this->models[MediaCollection::TABLE] = new MediaCollection();
        
        $this->setIdInput();
	$this->setSlugInput();
	$this->setNameInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateSlugInput();
	$this->validateNameInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(MediaCollection::FIELD_ID);
        }else{
            $input->setElementId(MediaCollection::FIELD_ID); 
        }
        
        $this->setFieldLabel(MediaCollection::TABLE, MediaCollection::FIELD_ID, 'Id');
        $this->setFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(MediaCollection::TABLE, MediaCollection::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[MediaCollection::TABLE][MediaCollection::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(MediaCollection::TABLE, MediaCollection::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(MediaCollection::TABLE, MediaCollection::FIELD_ID, \model\querys\MediaCollectionQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSlugInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(MediaCollection::FIELD_SLUG);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(MediaCollection::FIELD_SLUG); 
        }
        
        $this->setFieldLabel(MediaCollection::TABLE, MediaCollection::FIELD_SLUG, 'Slug');
        $this->setFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_SLUG, $input);
        
        return $input;
    }
    
    public function setSlugDefault($value) {
        $this->setDefault(MediaCollection::TABLE, MediaCollection::FIELD_SLUG, $value);
    }
    
    public function unsetSlugInput() {
        $this->unsetFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_SLUG);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSlugInput(){
        return $this->forminputs[MediaCollection::TABLE][MediaCollection::FIELD_SLUG];
    }
    
    public function getSlugValue(){
        return $this->getInputValue(MediaCollection::TABLE, MediaCollection::FIELD_SLUG);
    }
    
    public function validateSlugInput() {
        $value = $this->validateString(MediaCollection::TABLE, MediaCollection::FIELD_SLUG, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setNameInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(MediaCollection::FIELD_NAME);
            $input->setRequired(true);$input->setMaxlength('100');
        }else{
            $input->setElementId(MediaCollection::FIELD_NAME); 
        }
        
        $this->setFieldLabel(MediaCollection::TABLE, MediaCollection::FIELD_NAME, 'Name');
        $this->setFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_NAME, $input);
        
        return $input;
    }
    
    public function setNameDefault($value) {
        $this->setDefault(MediaCollection::TABLE, MediaCollection::FIELD_NAME, $value);
    }
    
    public function unsetNameInput() {
        $this->unsetFieldInput(MediaCollection::TABLE, MediaCollection::FIELD_NAME);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getNameInput(){
        return $this->forminputs[MediaCollection::TABLE][MediaCollection::FIELD_NAME];
    }
    
    public function getNameValue(){
        return $this->getInputValue(MediaCollection::TABLE, MediaCollection::FIELD_NAME);
    }
    
    public function validateNameInput() {
        $value = $this->validateString(MediaCollection::TABLE, MediaCollection::FIELD_NAME, true, 100);
        return $value;
    }
    


}