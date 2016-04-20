<?php

namespace apps\Configs\control;

use \lib\register\VarsRegister;

use \model\models\Project;
use \model\querys\ProjectQuery;
use \model\forms\ProjectForm;
use \model\querys\BudgetQuery;

/**
 * Description of TestesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class TestesActions extends \lib\control\ControllerAdmin {

    private function getQuery(){
        return ProjectQuery::start();
    }

    public function testesAction(){
        $this->set('h1', VarsRegister::getHeading());
        $this->setView('testes');
        $itens_projects = [];
        $projects = $this->getQuery()->find();
        foreach($projects as $i=>$project){
            $itens_projects[$i] = $project->getToArray();
            $budgets = BudgetQuery::start()->filterByProjectId($project->getId())->find();
            $itens_budgets = [];
            foreach($budgets as $budget){
                $itens_budgets[$i] = $budget->getToArray();
            }
            $this->set('budgets['.$project->getId().']', $itens_budgets);
        }
        $this->set('projects', $itens_projects);
        $this->renderList($projects);
    }
    
    public function normalTestesAction(){
        $this->set('h1', VarsRegister::getHeading());
        $query = $this->getQuery();
        $this->buildDataGrid('testes', $query);
        $form = ProjectForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'testes');
    }
    
    
    public function listTestesAction(){
        $query = $this->getQuery();
        $this->buildDataList('testes', $query);
    }
    
    
    public function editTestesAction() {
        $query = $this->getQuery()->filterById(VarsRegister::getId())->findOne();
        $form = ProjectForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'testes');
    }
    
    
    public function newTestesAction() {
        $form = ProjectForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'testes');
    }
    
    public function bindTestesAction() {
        $form = ProjectForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'testes');
        if($model !== false){
            #$result is a model
            if($model->getAction() == Project::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == Project::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showTestesAction();
        }
    }
    
    public function showTestesAction(){
        $model = $this->getQuery()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'testes');
    }
    
    public function delTestesAction() {
        $model = $this->getQuery()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportTestesAction(){
        $query = $this->getQuery();
        $this->buildDataExport($query);
    }

}
