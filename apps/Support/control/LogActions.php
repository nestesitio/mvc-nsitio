<?php

namespace apps\Support\control;

use \lib\register\Vars;

use \model\models\SupportLog;
use \model\querys\SupportLogQuery;
use \model\forms\SupportLogForm;

/**
 * Description of LogActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class LogActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function logAction(){
        $this->set('heading', Vars::getHeading());
        $query = SupportLogQuery::start();
        $this->buildDataGrid('log', $query);
        $form = SupportLogForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'log');
    }


    /**
     *
     */
    public function listLogAction(){
        $query = SupportLogQuery::start();
        $this->buildDataList('log', $query);
    }


    /**
     *
     */
    public function editLogAction() {
        $query = SupportLogQuery::start()->filterById(Vars::getId())->findOne();
        $form = SupportLogForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'log');
    }


    /**
     *
     */
    public function newLogAction() {
        $form = SupportLogForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'log');
    }

    /**
     *
     */
    public function bindLogAction() {
        $form = SupportLogForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'log');
        if($model !== false){
            #result is the model
            if($model->getAction() == SupportLog::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == SupportLog::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showLogAction();
        }
    }

    /**
     *
     */
    public function showLogAction(){
        $model = SupportLogQuery::start()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'log');
    }

    /**
     *
     */
    public function delLogAction() {
        $model = SupportLogQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function csvLogAction(){
        $query = SupportLogQuery::start();
        $this->buildCsvExport($query);
    }

}
