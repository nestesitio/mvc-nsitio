<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \apps\Core\model\PagesQuery;
use \model\models\HtmPage;
use \model\forms\HtmPageForm;
use \apps\Core\model\PagesForm;
use \lib\session\SessionConfig;

/**
 * Description of MainpagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class MainpagesActions extends \apps\Core\control\PagesActions {
    
    private $app_slug = 'home';
    
    protected $txt_action = 'admin/txt_mainpages';
    protected $bindtxt_action = 'admin/bindtxt_mainpages';
    
    private $local = ['home'];

    /**
     *
     */
    public function mainpagesAction(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/mainpages');
        $this->query = $this->query($this->app_slug);
        $this->filterByLocal($this->local);
        $this->mainAction('mainpages');
        
    }


    /**
     *
     */
    public function listMainpagesAction(){
        SessionConfig::setXml('apps/Admin/config/mainpages');
        $this->query = $this->query($this->app_slug);
        $this->filterByLocal($this->local);
        $this->listAction('mainpages');
    }


    /**
     *
     */
    public function editMainpagesAction() {
        $query = PagesQuery::getList($this->app_slug)->filterById(Vars::getId())->findOne();
        $form = PagesForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'mainpages');
    }


    /**
     *
     */
    public function newMainpagesAction() {
        $form = PagesForm::initialize($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, 'mainpages');
    }

    /**
     *
     */
    public function statusMainPagesAction(){
        $query = PagesQuery::getList($this->app_slug)->filterById(Vars::getId())->findOne();
        $form = HtmPageForm::initialize();
        $form = PagesForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'page', null, 'bindstatus_mainpages');
    }

    /**
     *
     */
    public function bindstatusMainpagesAction() {
        $form = HtmPageForm::initialize();
        $form->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD);
        $form->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_TITLE);
        $form->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_MENU);
        $form->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_SLUG);
        $form->unsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_HEADING);
        $form->validate();
        $model = $this->buildProcess($form, 'mainpages');
        if($model !== false){
            $this->showMainpagesAction();
        }
    }


    /**
     *
     */
    public function bindMainpagesAction() {
        $form = PagesForm::initialize($this->app_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'mainpages');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showMainpagesAction();
        }
    }

    /**
     *
     */
    public function showMainpagesAction(){
        $model = PagesQuery::getList($this->app_slug)->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'mainpages');
    }

    /**
     *
     */
    public function delMainpagesAction() {
        $model = \model\querys\HtmPageQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function exportMainpagesAction(){
        $query = MainpagesQuery::get();
        $this->buildCsvExport($query);
    }

}
