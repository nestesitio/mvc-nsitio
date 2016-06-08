<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \model\models\UserBase;
use \model\querys\UserBaseQuery;
use \apps\Admin\model\UsersForm;
use \model\forms\UserBaseForm;
use \apps\User\model\UserGroupModel;
use \model\querys\UserGroupQuery;
use \apps\Admin\model\UsersQueries;

/**
 * Description of UsersActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function usersAction(){
        $this->set('heading', Vars::getHeading());
        $query = UsersQueries::get()->orderByName();
        $results = $this->buildDataGrid('users', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = UserForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'users');
    }


    /**
     *
     */
    public function listUsersAction(){
        $query = UsersQueries::get();
        $results = $this->buildDataList('users', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    private function getUserGroupInput(){
        $input = \lib\form\input\HiddenInput::create();
        $group = UserGroupQuery::start()->filterByName(UserGroupModel::GROUP_USER)->findOne();
        $input->setDefault($group->getId());
        return $input;
    }
    
    
    public function editUsersAction() {
        $query = UsersQueries::get()->filterById(Vars::getId())->findOne();
        $form = UsersForm::initialize();
        //$form->setUserGroupIdInput($this->getUserGroupInput());
        $form->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'users');
    }


    /**
     *
     */
    public function newUsersAction() {
        $form = UsersForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'users');
    }
    
    public function bindUsersAction() {
        $form = UsersForm::initialize();
        $password = $form->getPassword();
        $form->unsetPasswordInput();
        $form = $form->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'users');
        if($model !== false){
            #result is the model
            if($model->getAction() == UserBase::ACTION_INSERT){
                #operations after inserted
                Monitor::setMonitor(Monitor::BOOKMARK, 'Created');
                $log = new \model\models\UserLog();
                $log->setUserId($model->getColumnValue(UserBase::FIELD_ID));
                $log->setEvent(\model\models\UserLog::EVENT_CREATED);
                $log->save();
                Monitor::setMonitor(Monitor::BOOKMARK, 'Log ' . $log->getId());
                
                $info = new \model\models\UserInfo();
                $info->setUserId($model->getId());
                $info->save();
                
            }
            
            if($password != false){
                $model->setPassword($password);
                \lib\guard\Guard::setKeys($model);
            }
            
            $this->showUsersAction();
        }
    }

    /**
     *
     */
    public function showUsersAction(){
        $model = UsersQueries::get()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'users');
    }

    /**
     *
     */
    public function delUsersAction() {
        $model = UserBaseQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    /**
     *
     */
    public function csvUsersAction(){
        $query = UsersQueries::get();
        $this->buildCsvExport($query, 'users', 'users');
    }

}
