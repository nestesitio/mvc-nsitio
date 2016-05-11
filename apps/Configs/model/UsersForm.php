<?php

namespace apps\Configs\model;

use \model\models\UserBase;
use \model\models\CompanyUser;
use \model\models\TeamPlayer;
use \lib\form\form\FormRender;
use \lib\register\Vars;


/**
 * Description of UsersForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersForm extends \lib\form\FormMerged {

    /**
    * Create and return the common query to this class
    *
    * @return \apps\Configs\model\UsersForm;
    */
    public static function initialize(){
        $form = new UsersForm();
        $form->setQueue();
        return $form;
    }
    
    public function setQueue() {
        $this->queue = [UserBase::TABLE];
        
        $this->models[UserBase::TABLE] = new UserBase();
        $this->models[CompanyUser::TABLE] = new CompanyUser();
        
        $this->forms[UserBase::TABLE] = $this->declareUserBaseForm();
        $this->forms[CompanyUser::TABLE] = $this->declareCompanyUserForm();
        
        $this->merge();
        
        return $this;
    }
    
    private function declareUserBaseForm(){
        $form = \model\forms\UserBaseForm::initialize();
        
        return $form;
    }
    
    private function declareCompanyUserForm(){
        $form = \model\forms\CompanyUserForm::initialize();
        
        $query = \model\querys\CompanyQuery::start()->orderByName();
        $input = $form->getCompanyIdInput();
        $input_to_export = FormRender::renderName('filter_' . TeamPlayer::FIELD_COMPANY_TEAM_ID, Vars::getCanonical());
        $input->setDataAttribute('data-export', $input_to_export);
        $input->setDataAttribute('data-function', 'exportOptions');
        $input->setDataAttribute('data-action', '/salesforce/select_teams');
        $input->setModel($query);
        $form->setCompanyIdInput($input);
        
        $query = \model\querys\UserFunctionsQuery::start()->filterByPublic(1)->orderByFunction();
        $input = $form->getUserFunctionsIdInput();
        $input->setModel($query);
        $form->setUserFunctionsIdInput($input);
        
        
        
        return $form;
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \model\forms\UserBaseForm;
    */
    public function getUserBaseForm(){
    
        return $this->forms[UserBase::TABLE];
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \apps\Configs\model\UsersForm;
    */
    public function setSomeDefaults(){
        $form = $this->getUserBaseForm();
        
        return $this;
    }

    protected function customValidate() {
        
    }

}
