<?php

namespace apps\Configs\control;

use \lib\register\VarsRegister as VarsRegister;

use \model\hybrid\PageQuery;
use \model\models\Htm as Htm;
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


    /**
     *
     */
    public function pagesAction(){
        $this->set('h1', VarsRegister::getHeading());
        $query = $this->query();
        $results = $this->buildDataGrid('pages', $query);
        $this->renderList($results);
        
        $form = \model\hybrid\PageForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'pages');
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
        $query = $this->query()->filterById(VarsRegister::getId())->findOne();
        $form = \model\hybrid\PageForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'pages');
    }

    /**
     *
     */
    public function newPagesAction() {
        $form = \model\hybrid\PageForm::initialize();
        $form->setDefault(Htm::TABLE, Htm::FIELD_STAT, 'public');
        #more code about $form and $query
        $this->renderForm($form, 'pages');
    }

    /**
     *
     */
    public function bindPagesAction() {
        $form = \model\hybrid\PageForm::initialize()->validate();
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
        $model = $this->query()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'pages');
    }

    /**
     *
     */
    public function delPagesAction() {
        $htmpage = HtmPageQuery::start(ONLY)->filterByHtmId(VarsRegister::getId())->findOne();
        $this->deleteObject($htmpage);
        $htm = HtmQuery::start(ONLY)->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($htm);
        
    }

}
