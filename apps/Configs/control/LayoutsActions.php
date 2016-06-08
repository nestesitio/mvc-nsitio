<?php

namespace apps\Configs\control;

use \lib\register\Vars;

use \apps\Configs\model\LayoutsQuery;
use \model\models\HtmLayout;
use \model\forms\HtmLayoutForm;

/**
 * Description of LayoutsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class LayoutsActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function layoutsAction(){
        $this->set('heading', Vars::getHeading());
        $query = LayoutsQuery::get();
        $results = $this->buildDataGrid('layouts', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = HtmLayoutForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'layouts');
    }


    /**
     *
     */
    public function listLayoutsAction(){
        $query = LayoutsQuery::get();
        $results = $this->buildDataList('layouts', $query);
        #here you can process the results
        $this->renderList($results);
    }


    /**
     *
     */
    public function editLayoutsAction() {
        $query = LayoutsQuery::get()->filterById(Vars::getId())->findOne();
        $form = HtmLayoutForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'layouts');
    }


    /**
     *
     */
    public function newLayoutsAction() {
        $form = HtmLayoutForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'layouts');
    }

    /**
     *
     */
    public function bindLayoutsAction() {
        $form = HtmLayoutForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'layouts');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmLayout::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmLayout::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showLayoutsAction();
        }
    }

    /**
     *
     */
    public function showLayoutsAction(){
        $model = LayoutsQuery::get()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'layouts');
    }

    /**
     *
     */
    public function delLayoutsAction() {
        $model = \model\querys\HtmLayoutQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportLayoutsAction(){
        $query = LayoutsQuery::get();
        $this->buildDataExport($query);
    }

}
