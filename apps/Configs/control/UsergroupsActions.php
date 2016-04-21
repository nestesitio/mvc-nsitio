<?php

namespace apps\Configs\control;

use \lib\register\VarsRegister;

use \apps\Configs\model\UsergroupsQuery;
use \model\models\UserGroup;
use \model\forms\UserGroupForm;

/**
 * Description of UsergroupsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsergroupsActions extends \lib\control\ControllerAdmin {


    /**
     *
     */
    public function usergroupsAction(){
        $this->set('h1', VarsRegister::getHeading());
        $query = UsergroupsQuery::get();
        $results = $this->buildDataGrid('usergroups', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = UserGroupForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'usergroups');
    }


    /**
     *
     */
    public function listUsergroupsAction(){
        $query = UsergroupsQuery::get();
        $results = $this->buildDataList('usergroups', $query);
        #here you can process the results
        $this->renderList($results);
    }


    /**
     *
     */
    public function editUsergroupsAction() {
        $query = UsergroupsQuery::get()->filterById(VarsRegister::getId())->findOne();
        $form = UserGroupForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'usergroups');
    }


    /**
     *
     */
    public function newUsergroupsAction() {
        $form = UserGroupForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'usergroups');
    }

    /**
     *
     */
    public function bindUsergroupsAction() {
        $form = UserGroupForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'usergroups');
        if($model !== false){
            #$result is a model
            if($model->getAction() == UserGroup::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == UserGroup::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showUsergroupsAction();
        }
    }

    /**
     *
     */
    public function showUsergroupsAction(){
        $model = UsergroupsQuery::get()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'usergroups');
    }

    /**
     *
     */
    public function delUsergroupsAction() {
        $model = \model\querys\UserGroupQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportUsergroupsAction(){
        $query = UsergroupsQuery::get();
        $this->buildDataExport($query);
    }

}
