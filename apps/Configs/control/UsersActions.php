<?php

namespace apps\Configs\control;


use \lib\register\Monitor;
use \lib\register\Vars;

use \model\models\UserBase;
use \model\querys\UserBaseQuery;
use \model\forms\UserBaseForm;
use \apps\Configs\model\UsersForm;
use \model\querys\UserGroupQuery;
use \apps\User\model\UserGroupModel;
use \lib\mysql\Mysql;
use \lib\guard\Guard;
use \apps\User\model\UserComponents;
use \lib\session\SessionUser;

/**
 * Description of UsersActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersActions extends \lib\control\ControllerAdmin {

    /**
     * @return mixed
     */
    private function query(){
        $query = UserBaseQuery::start(ONLY)->selectUsername()->selectName()->selectUserGroupId();
        $query->joinUserGroup()->selectDescription()
                ->selectId()->selectName()->endUse();
        $query->joinCompanyUser(Mysql::LEFT_JOIN)->selectUserId()
                ->joinUserFunctions(Mysql::LEFT_JOIN)->selectFunction()->endUse()
                ->joinCompany(Mysql::LEFT_JOIN)->selectName()->selectCode()->endUse()
                ->selectId()->selectCompanyId()->selectUserFunctionsId()->selectCode()
                ->endUse();
        return $query;
    }

    /**
     *
     */
    public function usersAction(){
        $this->set('heading', Vars::getHeading());
        $query = $this->query();
        $results = $this->buildDataGrid('users', $query);
        $this->renderList($results);
        $form = UsersForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'users');
    }


    /**
     *
     */
    public function listUsersAction(){
        $query = $this->query();
        $results = $this->buildDataList('users', $query);
        $this->renderList($results);
    }


    /**
     *
     */
    public function editUsersAction() {
        $query = $this->query()->filterById(Vars::getId())->findOne();
        $form = UserBaseForm::initialize();
        $form = Guard::prepareForm($form);
        $form->setQueryValues($query);
        
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'users');
    }


    /**
     *
     */
    public function newUsersAction() {
        $form = UserBaseForm::initialize();
        $form = Guard::prepareForm($form);
        $group = UserGroupQuery::start()->filterByName(UserGroupModel::GROUP_USER)->findOne();
        $form->setUserGroupIdDefault($group->getId());
        $form->setNameDefault('Anonymous');
        $form->setUsernameDefault('anonymous@mail.com');
        #more code about $form and $query
        $this->renderForm($form, 'users');
    }

    /**
     *
     */
    public function bindUsersAction() {
        $form = UserBaseForm::initialize();
        $form = Guard::prepareForm($form);
        $password = $form->getPasswordValue();
        $form->unsetPasswordInput();
        $form = $form->validate();
        
        $model = $this->buildProcess($form, 'users');
        if($model !== false){
            Monitor::setMonitor(Monitor::BOOKMARK, 'Result is true in ' . $model->getAction());
            if($model->getAction() == UserBase::ACTION_INSERT){
                #operations after inserted
                UserComponents::createUser($model->getId());
                UserComponents::createInfo($model->getId());
            }
            if($password != false){
                $model->setPassword($password);
                Guard::setKeys($model);
            }
            $this->showUsersAction();
        }
    }

    /**
     *
     */
    public function showUsersAction(){
        $model = $this->query()->filterById(Vars::getId())->findOne();
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
        $query = $this->query();
        $this->buildCsvExport($query, 'Utilizadores', 'users');
    }
    
    public function playUsersAction(){
        $user = UserBaseQuery::start()->joinUserGroup()->selectName()->endUse()->filterById(Vars::getId())->findOne();
        SessionUser::registPlayer($user);
        $this->setEmptyView();
        echo 'you are playing now as ' . $user->getName();
    }
    

}
