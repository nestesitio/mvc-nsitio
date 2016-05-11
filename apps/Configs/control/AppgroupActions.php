<?php

namespace apps\Configs\control;

use \lib\register\Vars;

use \model\models\UserGroupHasHtmApp;
use \model\querys\UserGroupHasHtmAppQuery;
use \model\forms\UserGroupHasHtmAppForm;

use \model\querys\UserGroupQuery;
use \model\models\UserGroup;


/**
 * Description of AppgroupActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class AppgroupActions extends \lib\control\ControllerAdmin {

    /**
     * @return mixed
     */
    private function query(){
        return UserGroupHasHtmAppQuery::start()
                ->joinUserGroup()->selectName()->selectDescription()->endUse()
                ->joinHtmApp()->selectName()->endUse()
                ->filterByHtmAppId(Vars::getId());
    }

    /**
     *
     */
    public function appgroupAction(){
        $query = $this->query();
        $results = $this->buildDataGrid('appgroup', $query, '/layout/core/datasublist.htm');
        $this->renderList($results);
    }


    /**
     *
     */
    public function listAppgroupAction(){
        $query =  $this->query();
        $results = $this->buildDataList('appgroup', $query);
        $this->renderList($results);
    }


    /**
     *
     */
    public function newAppgroupAction() {
        $form = UserGroupHasHtmAppForm::initialize();
        $table = UserGroupHasHtmApp::TABLE;
        $input = \lib\form\input\HiddenInput::create()->setValue(Vars::getId());
        //$input->setValue(Vars::getId());
        $form->setHtmAppIdInput($input);

        $form->setMultipleField($table, UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
        $query = UserGroupQuery::start()
                ->leftJoin(UserGroupHasHtmApp::TABLE, [UserGroup::FIELD_ID, UserGroupHasHtmApp::FIELD_USER_GROUP_ID])
                ->addJoinCondition(UserGroupHasHtmApp::TABLE, UserGroupHasHtmApp::FIELD_HTM_APP_ID, Vars::getId())
                ->filterByColumnIsNull(UserGroupHasHtmApp::FIELD_HTM_APP_ID)->groupById();
        $form->setQuery($table, UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $query);
        
        $this->renderForm($form, 'appgroup');
    }

    /**
     *
     */
    public function bindAppgroupAction() {
        $table = UserGroupHasHtmApp::TABLE;
        $form = UserGroupHasHtmAppForm::initialize()
                ->setMultipleField($table, UserGroupHasHtmApp::FIELD_USER_GROUP_ID)
                ->validate();
        $result = $this->buildMultipleProcess($form);
        if($result == false){
            $this->renderForm($form, 'appgroup');
        }
        
    }

    /**
     *
     */
    public function delAppgroupAction() {
        $app = Vars::getRequests('app');
        $group = Vars::getRequests('group');
        $model = UserGroupHasHtmAppQuery::start()->filterByHtmAppId($app)->filterByUserGroupId($group)->findOne();
        $this->deleteObject($model);
        
    }
    

}
