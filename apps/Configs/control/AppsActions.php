<?php

namespace apps\Configs\control;

use \lib\register\Vars as Vars;

/**
 * Description of appsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 26, 2015
 */
class AppsActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function appsAction(){
        $this->set('heading', Vars::getHeading());
        $query = \apps\Configs\model\AppsQuery::getApps();
        $results = $this->buildDataGrid('apps', $query);
        $this->renderList($results);
        
        $form = \apps\Vendor\model\PageForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'apps');
    }

    /**
     *
     */
    public function listAppsAction(){
        $query = \apps\Configs\model\AppsQuery::getApps();
        $results = $this->buildDataList('apps', $query);
        $this->renderList($results);
    }

    /**
     *
     */
    public function editAppsAction() {
        $query = \apps\Configs\model\AppsQuery::getApps()->filterById(Vars::getId())->findOne();
        $form = \model\forms\HtmAppForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps');
    }

    /**
     *
     */
    public function newAppsAction() {
        $form = \model\forms\HtmAppForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'apps');
    }

    /**
     *
     */
    public function bindAppsAction() {
        $form = \model\forms\HtmAppForm::initialize()->validate();
        $model = $this->buildProcess($form, 'apps');
        if($model !== false){
            $this->showAppsAction();
        }
    }

    /**
     *
     */
    public function showAppsAction(){
        $model = \apps\Configs\model\AppsQuery::getApps()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'apps');
    }

    /**
     *
     */
    public function delAppsAction() {
        $model = \apps\Configs\model\AppsQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model, 'apps');
        
    }

}
