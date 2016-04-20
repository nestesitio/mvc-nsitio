<?php

namespace apps\Admin\control;

use \lib\register\VarsRegister;

use \model\hybrid\PagesQuery;
use \model\models\HtmPage;
use \model\forms\HtmPageForm;
use \model\hybrid\PagesForm;

/**
 * Description of MainpagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class MainpagesActions extends \apps\Core\control\PagesActions {
    
    private $app_slug = 'home';

    public function mainpagesAction(){
        $this->set('h1', VarsRegister::getHeading());
        
        \lib\session\SessionConfig::setXml('apps/Admin/config/mainpages');
        $this->mainAction($this->app_slug, 'mainpages');
    }
    
    
    public function listMainpagesAction(){
        $this->listAction($this->app_slug, 'mainpages');
    }
    
    
    public function editMainpagesAction() {
        $query = PagesQuery::get($this->app_slug)->filterById(VarsRegister::getId())->findOne();
        $form = PagesForm::init($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'mainpages');
    }
    
    
    public function newMainpagesAction() {
        $form = PagesForm::init($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, 'mainpages');
    }
    
    public function statusMainPagesAction(){
        $query = PagesQuery::get($this->app_slug)->filterById(VarsRegister::getId())->findOne();
        $form = HtmPageForm::initialize();
        $form = PagesForm::init($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'page', null, 'bindstatus_mainpages');
    }
    
    public function bindstatusMainpagesAction() {
        $form = HtmPageForm::initialize();
        $form->unsetsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_LANGS_TLD);
        $form->unsetsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_TITLE);
        $form->unsetsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_MENU);
        $form->unsetsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_SLUG);
        $form->unsetsetFieldInput(HtmPage::TABLE, HtmPage::FIELD_HEADING);
        $form->validate();
        $model = $this->buildProcess($form, 'mainpages');
        if($model !== false){
            $this->showMainpagesAction();
        }
    }


    public function bindMainpagesAction() {
        $form = PagesForm::init($this->app_slug)->validate();
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
    
    public function showMainpagesAction(){
        $model = PagesQuery::get($this->app_slug)->filterById(VarsRegister::getId())->findOne();
        $this->renderValues($model, 'mainpages');
    }
    
    public function delMainpagesAction() {
        $model = \model\querys\HtmPageQuery::start()->filterById(VarsRegister::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportMainpagesAction(){
        $query = MainpagesQuery::get();
        $this->buildDataExport($query);
    }

}
