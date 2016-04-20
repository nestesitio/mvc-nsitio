<?php

namespace apps\Admin\control;

use \lib\register\VarsRegister;

use \apps\Admin\model\UsersQuery;
use \model\models\User;
use \model\forms\UserForm;

/**
 * Description of UsersActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersActions extends \lib\control\ControllerAdmin {

    public function usersAction(){
        $this->set('h1', VarsRegister::getHeading());
        $query = UsersQuery::get();
        $results = $this->buildDataGrid('users', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = UserForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'users');
    }
    
    
    public function listUsersAction(){
        $query = UsersQuery::get();
        $results = $this->buildDataList('users', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    
    public function editUsersAction() {
        $query = UsersQuery::get()->filterById(VarsRegister::getId())->findOne();
        $form = UserForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'users');
    }
    
    
    public function newUsersAction() {
        $form = UserForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'users');
    }
    
    public function bindUsersAction() {
        $form = UserForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'users');
        if($model !== false){
            #$result is a model
            if($model->getAction() == User::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == User::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showUsersAction();
        }
    }
    
    public function showUsersAction(){
        $model = UsersQuery::get()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'users');
    }
    
    public function delUsersAction() {
        $model = \model\querys\UserQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportUsersAction(){
        $query = UsersQuery::get();
        $this->buildDataExport($query);
    }

}
