<?php

namespace apps\Core\control;

use \lib\register\VarsRegister;

use \apps\Core\model\PagesQuery;
use \model\forms\HtmPageForm;
use \apps\Core\model\PagesForm;
use \model\querys\LangsQuery;

/**
 * Description of PagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class PagesActions extends \lib\control\ControllerAdmin {

    /**
     * @param $app_slug
     * @return \model\querys\HtmPageQuery
     */
    private function query($app_slug){
         $query = PagesQuery::get($app_slug)
                ->setSelect('GROUP_CONCAT(DISTINCT htm_page.langs_tld ORDER BY htm_page.langs_tld DESC SEPARATOR ", ")', 'langs')
                 ->groupByHtmId();
         return $query;
    }

    /**
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
     * @param $langs
     */
    private function renderLangsTemplate($langs){
        $str = '';
        foreach($langs as $lang){
            $tool = new \lib\bkegenerator\DataTool();
            $tool->setLangAction('core/lang_txt', 0);
            $tool->setFlag($lang);
            $tool->haveNoLang();
            $str .= $tool->getUl();
        }
        $this->set('langs', $str);
    }

    /**
     * @param $results
     * @param $langs
     * @return mixed
     */
    private function renderLangTools($results, $langs){
        foreach($results as $row){
            $result = $row->getColumnValue('langs');
            $str = '';
            foreach($langs as $lang){
                $tool = new \lib\bkegenerator\DataTool();
                $tool->setLangAction('core/lang_txt', $row->getId());
                $tool->setFlag($lang);
                if(strpos($result, $lang) === false){
                    $tool->haveNoLang();
                }
                $str .= $tool->getUl();
            }
            $row->setColumnValue('langs', $str);
        }
        return $results;
    }

    /**
     * @param $app_slug
     * @param $xml_file
     */
    protected function mainAction($app_slug, $xml_file){
        $this->setView('/apps/Core/view/datagrid-cms.htm');
        $langs = $this->queryLangs();
        $query = $this->query($app_slug);
        $results = $this->buildDataGrid($xml_file, $query);
        $this->renderLangsTemplate($langs);
        #here you can process the results
        $this->renderLangTools($results, $langs);
        $this->renderList($results);
        
        $form = HtmPageForm::initialize()->prepareFilters();
        $this->renderFilters($form, $xml_file);
    }


    /**
     * @param $app_slug
     * @param $xml_file
     */
    protected function listAction($app_slug, $xml_file){
        $query = $this->query($app_slug);
        $results = $this->buildDataList($xml_file, $query);
        #here you can process the results
        $this->renderList($results);
    }


    /**
     *
     */
    public function editPagesAction() {
        $query = PagesQuery::get()->filterById(VarsRegister::getId())->findOne();
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
        $model = PagesQuery::get()->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'pages');
    }

    /**
     *
     */
    public function delPagesAction() {
        $model = \model\querys\HtmPageQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportPagesAction(){
        $query = PagesQuery::get();
        $this->buildCsvExport($query);
    }

}
