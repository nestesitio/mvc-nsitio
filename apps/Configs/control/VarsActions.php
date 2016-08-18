<?php

namespace apps\Configs\control;

use \lib\register\Vars;

use \apps\Configs\model\VarsQueries;
use \model\models\HtmVars;
use \apps\Configs\model\VarsForm;

/**
 * Description of VarsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class VarsActions extends \lib\control\ControllerAdmin {

    public function varsAction(){
        $this->set('heading', Vars::getHeading());
        $query = VarsQueries::get();
        $results = $this->buildDataGrid('vars', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = VarsForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'vars');
    }
    
    
    public function listVarsAction(){
        $query = VarsQueries::get();
        $results = $this->buildDataList('vars', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    
    public function editVarsAction() {
        $query = VarsQueries::get()->filterById(Vars::getId())->findOne();
        $form = VarsForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'vars');
    }
    
    
    public function newVarsAction() {
        $form = VarsForm::initialize()->setSomeDefaults();
        #more code about $form and $query
        $this->renderForm($form, 'vars');
    }
    
    public function bindVarsAction() {
        $form = VarsForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'vars');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmVars::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmVars::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showVarsAction();
        }
    }
    
    public function showVarsAction(){
        $model = VarsQueries::get()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'vars');
    }
    
    public function delVarsAction() {
        $model = \model\querys\HtmVarsQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportVarsAction(){
        $query = VarsQuery::get();
        $this->buildCsvExport($query, 'vars', 'vars');
    }

}
