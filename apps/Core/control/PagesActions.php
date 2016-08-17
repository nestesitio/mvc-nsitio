<?php

namespace apps\Core\control;

use \lib\register\Vars;

use \apps\Core\model\PagesQuery;
use \model\forms\HtmPageForm;
use \apps\Core\model\PagesForm;
use \model\querys\LangsQuery;
use \apps\Core\tools\LangsRowTools;
use \apps\Core\model\TxtForm;
use \model\models\HtmPage;
use \model\models\HtmVars;

/**
 * Description of PagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class PagesActions extends \lib\control\ControllerAdmin {
    
    protected $query;

    /**
     * @param $app_slug
     * @return \model\querys\HtmPageQuery
     */
    protected function query($app_slug){
         $query = PagesQuery::getList($app_slug)
                ->setSelect('GROUP_CONCAT(DISTINCT htm_page.langs_tld ORDER BY htm_page.langs_tld DESC SEPARATOR ", ")', 'langs')
                 ->groupByHtmId();
         return $query;
    }
    
    protected function filterByLocal($value){
        return $this->query->filterByColumn(HtmVars::FIELD_VAR, 'local')->filterByColumn(HtmVars::FIELD_VALUE, $value);
    }
    
    protected function filterBySection($value){
        return $this->query->filterByColumn(HtmVars::FIELD_VAR, 'section')->filterByColumn(HtmVars::FIELD_VALUE, $value);
    }

    /**
     * get all langs used in project
     * 
     * @return array
     */
    private function queryLangs(){
        $results = LangsQuery::start()->find();
        $arr = [];
        foreach($results as $lang){
            $arr[] = $lang->getTld();
        }
        return $arr;
    }



    /**
     * @param $app_slug
     * @param $xml_file
     */
    protected function mainAction($xml_file){
        $this->setView('/apps/Core/view/datagrid-cms.htm');
        $langs = $this->queryLangs();
        
        $results = $this->buildDataGrid($xml_file, $this->query);
        
        $this->set('langs', LangsRowTools::renderLangsTemplate($langs, $this->txt_action));
        
        #here you can process the results
        $results = LangsRowTools::renderLangTools($results, $langs, $this->txt_action);
        $this->renderList($results);
        
        $form = HtmPageForm::initialize()->prepareFilters();
        $this->renderFilters($form, $xml_file);
    }


    /**
     * @param $app_slug
     * @param $xml_file
     */
    protected function listAction($xml_file){
        
        $results = $this->buildDataList($xml_file, $this->query);
        #here you can process the results
        $langs = $this->queryLangs();
        $results = LangsRowTools::renderLangTools($results, $langs, $this->txt_action);
        $this->renderList($results);
    }
    
    /**
     * 
     * @return \apps\Core\model\TxtForm
     */
    protected function geTxtForm(){
        return TxtForm::init(Vars::getId(), Vars::getRequests('lang'));
    }
    
    /**
     * 
     * @param \apps\Core\model\TxtForm $form
     * @param string $xml_file
     */
    protected function txtAction($form, $xml_file = null){
        
        if($xml_file == null){
            $xml_file = 'apps/Core/config/txt';
        }
        
        $this->setView('apps/Core/view/edit_text');
        $query = PagesQuery::getLangs(Vars::getId())->find();
        
        
        $this->renderLangActions($query, Vars::getId(), $this->txt_action, Vars::getRequests('lang'));
        
        $page = PagesQuery::getPageByLang(Vars::getId(), Vars::getRequests('lang'))->findOne();
        
        if($page != false){
            $form->setQueryValues($page);
        }
        $action = str_replace($this->app . '/', '', $this->bindtxt_action);
        
        $this->renderForm($form, $xml_file, $action, ['lang'=>Vars::getRequests('lang')]);
    }
    
    
    /**
     * 
     * @param \apps\Core\model\TxtForm $form
     * @param string $xml_file
     */
    public function bindTxtAction($form, $xml_file = null) {
        if($xml_file == null){
            $xml_file = 'apps/Core/config/txt';
        }
        
        $model = $this->buildProcess($form, $xml_file);
        if($model !== false){
            #$result is a model
            
            Vars::setId($model->getHtmId());
            $this->showTxtAction($xml_file);
        }
    }
    
    public function showTxtAction($xml_file){
        $this->setView('apps/Core/view/show_text');
        
        $query = PagesQuery::getLangs(Vars::getId())->find();
        
        $this->renderLangActions($query, Vars::getId(), $this->txt_action, Vars::getRequests('lang'));
        $this->set('datalang', Vars::getRequests('lang'));
        $model = PagesQuery::getPageByLang(Vars::getId(), Vars::getRequests('lang'))->findOne();
        $this->renderValues($model, $xml_file);
    }


    /**
     *
     */
    public function editPagesAction() {
        $query = PagesQuery::getList()->filterById(Vars::getId())->findOne();
        $form = PagesForm::init('home')->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'pages');
    }


    /**
     *
     */
    public function newPagesAction() {
        $form = HtmPageForm::initialize();
        #more code about $form and $query
        $this->renderForm($form, 'pages');
    }

    /**
     *
     */
    public function bindPagesAction() {
        $form = HtmPageForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'pages');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showPagesAction();
        }
    }

    /**
     *
     */
    public function showPagesAction(){
        $model = PagesQuery::getList()->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'pages');
    }

    /**
     *
     */
    public function delPagesAction() {
        $model = \model\querys\HtmPageQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportPagesAction(){
        $query = PagesQuery::getList();
        $this->buildCsvExport($query);
    }

}
