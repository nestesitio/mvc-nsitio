<?php

namespace apps\Configs\control;

use \lib\register\Vars as Vars;

use \apps\Core\model\PageQuery;
use \model\querys\HtmPageQuery;
use \model\querys\HtmQuery;

/**
 * Description of pagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 26, 2015
 */
class PagesActions extends \lib\control\ControllerAdmin {

    /**
     * @return mixed
     */
    private function query(){
        return PageQuery::start()
                ->joinHtm()->selectStat()->selectOrd()->selectHtmAppId()
                ->joinHtmApp()->selectSlug()->selectName()->orderByName()->endUse()->endUse()
                ->orderByHtmId();
    }
    
    private function getForm(){
        $form = \apps\Core\model\PageForm::initialize();
        return $form;
    }
    


    /**
     *
     */
    public function pagesAction(){
        $this->set('heading', Vars::getHeading());
        $query = $this->query();
        $results = $this->buildDataGrid('pages', $query);
        $this->renderList($results);
        
        $this->renderFilters($this->getForm()->prepareFilters(), 'pages');
    }

    /**
     *
     */
    public function listPagesAction(){
        $query = $this->query();
        $results = $this->buildDataList('pages', $query);
        $this->renderList($results);
    }

    /**
     *
     */
    public function editPagesAction() {
        $query = $this->query()->filterById(Vars::getId())->findOne();
        $form = $this->getForm()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'pages');
    }

    /**
     *
     */
    public function newPagesAction() {
        #more code about $form and $query
        $this->renderForm($this->getForm(), 'pages');
    }

    /**
     *
     */
    public function bindPagesAction() {
        $form = \apps\Core\model\PageForm::initialize()->validate();
        #$form->setFieldValue($table, $field, $value);
        $model = $form->getModels('htm_page');
        //$model->setColumnValue('htm_page.heading','Teste');
        $form->setModel('htm_page', $model);
        $model = $this->buildProcess($form, 'pages');
        if($model !== false){
            $this->showPagesAction();
        }
    }

    /**
     *
     */
    public function showPagesAction(){
        $model = $this->query()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'pages');
    }

    /**
     *
     */
    public function delPagesAction() {
        $htmpage = HtmPageQuery::start(ONLY)->filterByHtmId(Vars::getId())->findOne();
        $this->deleteObject($htmpage);
        $htm = HtmQuery::start(ONLY)->filterById(Vars::getId())->findOne();
        $this->deleteObject($htm);
        
    }

}
