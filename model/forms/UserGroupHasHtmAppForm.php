<?php
namespace model\forms;

use \model\models\UserGroupHasHtmApp;

/**
 * Description of UserGroupHasHtmAppForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class UserGroupHasHtmAppForm extends \lib\form\Form {

    public static function initialize($declare = true){
        $form = new UserGroupHasHtmAppForm();
        if($declare == true){
            $form->declareInputs();
        }
        return $form;
    }
    
    
    public function declareInputs(){
        $this->queue[] = UserGroupHasHtmApp::TABLE;
        $this->models[UserGroupHasHtmApp::TABLE] = new UserGroupHasHtmApp();
        
        $this->setUserGroupIdInput();
	$this->setHtmAppIdInput();
	
        return $this;
    }
    
    public function validate(){
        
        $this->validateUserGroupIdInput();
	$this->validateHtmAppIdInput();
	
        
        return $this;
    }
    
    
    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setUserGroupIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\UserGroup::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\UserGroupQuery::start());
        }else{
            $input->setElementId(UserGroupHasHtmApp::FIELD_USER_GROUP_ID); 
        }
        
        $this->setFieldLabel(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID, 'User Group Id');
        $this->setFieldInput(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $input);
        
        return $input;
    }
    
    public function setUserGroupIdDefault($value) {
        $this->setDefault(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $value);
    }
    
    public function unsetUserGroupIdInput() {
        $this->unsetFieldInput(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getUserGroupIdInput(){
        return $this->forminputs[UserGroupHasHtmApp::TABLE][UserGroupHasHtmApp::FIELD_USER_GROUP_ID];
    }
    
    public function getUserGroupIdValue(){
        return $this->getInputValue(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
    }
    
    public function validateUserGroupIdInput() {
        $value = $this->validateModel(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_USER_GROUP_ID, \model\querys\UserGroupQuery::start(), 'user_group.id', true);
        return $value;
    }
    

    /**
    * Create and return the input associeted with field
    * 
    * @return \lib\form\input\SelectInput;
    */
    public function setHtmAppIdInput($input = null) {
        if($input == null){
            $input = \lib\form\input\SelectInput::create(UserGroupHasHtmApp::FIELD_HTM_APP_ID);
            $input->setRequired(true);
            $input->setOptionIndex(\model\models\HtmApp::FIELD_ID);
            $input->addEmpty();
            $input->setModel(\model\querys\HtmAppQuery::start());
        }else{
            $input->setElementId(UserGroupHasHtmApp::FIELD_HTM_APP_ID); 
        }
        
        $this->setFieldLabel(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID, 'Htm App Id');
        $this->setFieldInput(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID, $input);
        
        return $input;
    }
    
    public function setHtmAppIdDefault($value) {
        $this->setDefault(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID, $value);
    }
    
    public function unsetHtmAppIdInput() {
        $this->unsetFieldInput(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID);
    }
    
    /**
    * @return \lib\form\input\SelectInput;
    */
    public function getHtmAppIdInput(){
        return $this->forminputs[UserGroupHasHtmApp::TABLE][UserGroupHasHtmApp::FIELD_HTM_APP_ID];
    }
    
    public function getHtmAppIdValue(){
        return $this->getInputValue(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID);
    }
    
    public function validateHtmAppIdInput() {
        $value = $this->validateModel(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID, \model\querys\HtmAppQuery::start(), 'htm_app.id', true);
        return $value;
    }
    


}