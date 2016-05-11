<?php

namespace apps\%$nameApp%\control;

use \lib\register\Vars;

use \apps\%$nameApp%\model\%$className%Queries;
use \model\models\%$modelName%;
use \apps\%$nameApp%\model\%$className%Form;

/**
 * Description of %$className%Actions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class %$className%Actions extends \lib\control\ControllerAdmin {

    public function %$fileName%Action(){
        $this->set('h1', Vars::getHeading());
        $query = %$className%Queries::get();
        $results = $this->buildDataGrid('%$fileName%', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = %$className%Form::initialize()->prepareFilters();
        $this->renderFilters($form, '%$fileName%');
    }
    
    
    public function list%$className%Action(){
        $query = %$className%Queries::get();
        $results = $this->buildDataList('%$fileName%', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    
    public function edit%$className%Action() {
        $query = %$className%Queries::get()->filterById(Vars::getId())->findOne();
        $form = %$className%Form::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, '%$fileName%');
    }
    
    
    public function new%$className%Action() {
        $form = %$className%Form::initialize()->setSomeDefaults();
        #more code about $form and $query
        $this->renderForm($form, '%$fileName%');
    }
    
    public function bind%$className%Action() {
        $form = %$className%Form::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, '%$fileName%');
        if($model !== false){
            #$result is a model
            if($model->getAction() == %$modelName%::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == %$modelName%::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->show%$className%Action();
        }
    }
    
    public function show%$className%Action(){
        $model = %$className%Queries::get()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, '%$fileName%');
    }
    
    public function del%$className%Action() {
        $model = \model\querys\%$modelName%Query::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function export%$className%Action(){
        $query = %$className%Query::get();
        $this->buildCsvExport($query, '%$fileName%', '%$fileName%');
    }

}
