<?php

namespace apps\Configs\control;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\register\VarsRegister as VarsRegister;

use \model\models\User as User;
use \model\querys\UserQuery as UserQuery;
use \model\forms\UserForm as UserForm;
use \model\querys\UserGroupQuery;
use \apps\User\model\UserGroupModel;

/**
 * Description of UsersActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersActions extends \lib\control\ControllerAdmin {
    
    private function query(){
        return UserQuery::start()
                ->joinUserGroup()->selectName()->selectDescription()->endUse();
    }

    public function usersAction(){
        $this->set('h1', VarsRegister::getHeading());
        $query = $this->query();
        $results = $this->buildDataGrid('users', $query);
        $this->renderList($results);
        $form = UserForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'users');
    }
    
    
    public function listUsersAction(){
        $query = $this->query();
        $results = $this->buildDataList('users', $query);
        $this->renderList($results);
    }
    
    
    public function editUsersAction() {
        $query = $this->query()->filterById(VarsRegister::getId())->findOne();
        $form = UserForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'users');
    }
    
    
    public function newUsersAction() {
        $form = UserForm::initialize();
        $group = UserGroupQuery::start()->filterByName(UserGroupModel::GROUP_USER)->findOne();
        $form->setUserGroupIdDefault($group->getId());
        $form->setNameDefault('Anonymous');
        $form->setUsernameDefault('anonymous@mail.com');
        #more code about $form and $query
        $this->renderForm($form, 'users');
    }
    
    public function bindUsersAction() {
        $form = UserForm::initialize()->validate();
        $model = $this->buildProcess($form, 'users');
        if($model !== false){
            Registry::setMonitor(Monitor::BOOKMARK, 'Result is true in ' . $model->getAction());
            if($model->getAction() == User::ACTION_INSERT){
                #operations after inserted
                Registry::setMonitor(Monitor::BOOKMARK, 'Created');
                $log = new \model\models\UserLog();
                $log->setUserId($model->getColumnValue(User::FIELD_ID));
                $log->setEvent('created');
                $log->save();
                Registry::setMonitor(Monitor::BOOKMARK, 'Log ' . $log->getId());
                
                $info = new \model\models\UserInfo();
                $info->setUserId($model->getId());
                $info->save();
            }
            Registry::setMonitor(Monitor::BOOKMARK, 'Let\'s show');
            $this->showUsersAction();
        }
    }
    
    public function showUsersAction(){
        $model = $this->query()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'users');
    }
    
    public function delUsersAction() {
        $model = UserQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function csvUsersAction(){
        $query = $this->query();
        $this->buildCsvExport($query);
    }

}
