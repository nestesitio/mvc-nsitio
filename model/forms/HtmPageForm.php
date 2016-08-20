<?php
namespace model\forms;

use \model\models\HtmPage;

/**
 * Description of HtmPageForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class HtmPageForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new HtmPageForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = HtmPage::TABLE;
        $this->models[HtmPage::TABLE] = new HtmPage();
        
        $this->setIdInput();
	$this->setHtmIdInput();
	$this->setLangsTldInput();
	$this->setTitleInput();
	$this->setSlugInput();
	$this->setMenuInput();
	$this->setHeadingInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateIdInput();
	$this->validateHtmIdInput();
	$this->validateLangsTldInput();
	$this->validateTitleInput();
	$this->validateSlugInput();
	$this->validateMenuInput();
	$this->validateHeadingInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\HiddenInput;
    */
    public function setIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\HiddenInput::create(HtmPage::FIELD_ID);
        }else{
            $input->setElementId(HtmPage::FIELD_ID); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_ID, 'Id');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_ID, $input);
        
        return $input;
    }
    
    public function setIdDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_ID, $value);
    }
    
    public function unsetIdInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_ID);
    }
    
    /**
    * @return \lib\form\input\HiddenInput;
    */
    public function getIdInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_ID];
    }
    
    public function getIdValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_ID);
    }
    
    public function validateIdInput() {
        $value = $this->validatePrimaryKey(HtmPage::TABLE, HtmPage::FIELD_ID, \model\querys\HtmPageQuery::start());
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmPage::FIELD_HTM_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Htm::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmQuery::start());
        }else{
            $input->setElementId(HtmPage::FIELD_HTM_ID); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_HTM_ID, 'Htm Id');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_HTM_ID, $input);
        
        return $input;
    }
    
    public function setHtmIdDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_HTM_ID, $value);
    }
    
    public function unsetHtmIdInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_HTM_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmIdInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_HTM_ID];
    }
    
    public function getHtmIdValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_HTM_ID);
    }
    
    public function validateHtmIdInput() {
        $value = $this->validateModel(HtmPage::TABLE, HtmPage::FIELD_HTM_ID, \model\querys\HtmQuery::start(), 'htm.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setLangsTldInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(HtmPage::FIELD_LANGS_TLD);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\Langs::FIELD_TLD);
            $input->addEmpty();
            $input->setModel(\model\querys\LangsQuery::start());
            $input->setDefault('pt');
        }else{
            $input->setElementId(HtmPage::FIELD_LANGS_TLD); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD, 'Langs Tld');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD, $input);
        
        return $input;
    }
    
    public function setLangsTldDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD, $value);
    }
    
    public function unsetLangsTldInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getLangsTldInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_LANGS_TLD];
    }
    
    public function getLangsTldValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD);
    }
    
    public function validateLangsTldInput() {
        $value = $this->validateModel(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD, \model\querys\LangsQuery::start(), 'langs.tld', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setTitleInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmPage::FIELD_TITLE);
            $input->setRequired(true);
            $input->setDefault('Home');$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmPage::FIELD_TITLE); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_TITLE, 'Title');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_TITLE, $input);
        
        return $input;
    }
    
    public function setTitleDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_TITLE, $value);
    }
    
    public function unsetTitleInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_TITLE);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getTitleInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_TITLE];
    }
    
    public function getTitleValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_TITLE);
    }
    
    public function validateTitleInput() {
        $value = $this->validateString(HtmPage::TABLE, HtmPage::FIELD_TITLE, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setSlugInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmPage::FIELD_SLUG);
            $input->setRequired(true);
            $input->setDefault('index');$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmPage::FIELD_SLUG); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_SLUG, 'Slug');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_SLUG, $input);
        
        return $input;
    }
    
    public function setSlugDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_SLUG, $value);
    }
    
    public function unsetSlugInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_SLUG);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getSlugInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_SLUG];
    }
    
    public function getSlugValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_SLUG);
    }
    
    public function validateSlugInput() {
        $value = $this->validateString(HtmPage::TABLE, HtmPage::FIELD_SLUG, true, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setMenuInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmPage::FIELD_MENU);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmPage::FIELD_MENU); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_MENU, 'Menu');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_MENU, $input);
        
        return $input;
    }
    
    public function setMenuDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_MENU, $value);
    }
    
    public function unsetMenuInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_MENU);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getMenuInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_MENU];
    }
    
    public function getMenuValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_MENU);
    }
    
    public function validateMenuInput() {
        $value = $this->validateString(HtmPage::TABLE, HtmPage::FIELD_MENU, false, 100);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\InputText;
    */
    public function setHeadingInput($input = null) {
        if($input == null){
            $input = \lib\form\input\InputText::create(HtmPage::FIELD_HEADING);$input->setMaxlength('100');
        }else{
            $input->setElementId(HtmPage::FIELD_HEADING); 
        }
        
        $this->setFieldLabel(HtmPage::TABLE, HtmPage::FIELD_HEADING, 'Heading');
        $this->setFieldInput(HtmPage::TABLE, HtmPage::FIELD_HEADING, $input);
        
        return $input;
    }
    
    public function setHeadingDefault($value) {
        $this->setDefault(HtmPage::TABLE, HtmPage::FIELD_HEADING, $value);
    }
    
    public function unsetHeadingInput() {
        $this->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_HEADING);
    }
    
    /**
    * @return \lib\form\input\InputText;
    */
    public function getHeadingInput(){
        return $this->forminputs[HtmPage::TABLE][HtmPage::FIELD_HEADING];
    }
    
    public function getHeadingValue(){
        return $this->getInputValue(HtmPage::TABLE, HtmPage::FIELD_HEADING);
    }
    
    public function validateHeadingInput() {
        $value = $this->validateString(HtmPage::TABLE, HtmPage::FIELD_HEADING, false, 100);
        return $value;
    }
    


}