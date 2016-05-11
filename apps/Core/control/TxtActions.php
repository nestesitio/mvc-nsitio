<?php

namespace apps\Core\control;

use \lib\register\Vars;

use \apps\Admin\model\TxtQuery;
use \model\models\HtmPage;
use \model\forms\HtmPageForm;
use \apps\Core\model\PagesQuery;
use \apps\Core\model\TxtForm;

/**
 * Description of TxtActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class TxtActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function txtAction(){
        $this->set('h1', Vars::getHeading());
        $query = TxtQuery::get();
        $results = $this->buildDataGrid('txt', $query);
        #here you can process the results
        $this->renderList($results);
        
        $form = HtmPageForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'txt');
    }

    /**
     *
     */
    public function langTxtAction(){
        $this->setView('edit_text');
        
        $query = PagesQuery::getLangs(Vars::getId())->find();
        $action = Vars::getApp() . '/lang_txt';
        $this->renderLangActions($query, Vars::getId(), $action, Vars::getRequests('lang'));
        
        $form = TxtForm::init(Vars::getId(), Vars::getRequests('lang'));
        $query = PagesQuery::getPageByLang(Vars::getId(), Vars::getRequests('lang'))->findOne();
        $form->setQueryValues($query);
        $this->renderForm($form, 'txt', 'bind_txt', ['lang'=>Vars::getRequests('lang')]);
    }


    /**
     *
     */
    public function listTxtAction(){
        $query = TxtQuery::get();
        $results = $this->buildDataList('txt', $query);
        #here you can process the results
        $this->renderList($results);
    }


    /**
     *
     */
    public function bindTxtAction() {
        $form = TxtForm::init(Vars::getId(), Vars::getRequests('lang'))->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'txt', '/layout/core/edit_text.htm');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            Vars::setId($model->getHtmId());
            $this->showTxtAction();
        }
    }

    /**
     *
     */
    public function showTxtAction(){
        $this->setView('show_text');
        
        $query = PagesQuery::getLangs(Vars::getId())->find();
        $action = Vars::getApp() . '/lang_txt';
        $this->renderLangActions($query, Vars::getId(), $action, Vars::getRequests('lang'));
        $this->set('datalang', Vars::getRequests('lang'));
        $model = PagesQuery::getPageByLang(Vars::getId(), Vars::getRequests('lang'))->findOne();
        $this->renderValues($model, 'txt');
    }

    /**
     *
     */
    public function delTxtAction() {
        $model = \model\querys\HtmPageQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportTxtAction(){
        $query = TxtQuery::get();
        $this->buildCsvExport($query);
    }

}
