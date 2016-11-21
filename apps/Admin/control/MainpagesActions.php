<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \apps\Vendor\model\PagesQuery;
use \apps\Vendor\model\PageTextForm;
use \apps\Vendor\model\HtmForm;
use \model\models\HtmPage;
use \apps\Vendor\model\MediaQuery;
use \lib\session\SessionConfig;
use \lib\register\Monitor;
use \lib\form\input\WysihtmlInput;

/**
 * Description of MainpagesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class MainpagesActions extends \apps\Vendor\control\PagesActions {
    
    private $app_slug = 'home';
    
    protected $txt_action = 'admin/txt_mainpages';
    protected $bindtxt_action = 'admin/bindtxt_mainpages';
    
    //private $local = ['home'];

    /**
     *
     */
    public function mainpagesAction(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/mainpages');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('mainpages');
        
    }


    /**
     *
     */
    public function listMainpagesAction(){
        SessionConfig::setXml('apps/Admin/config/mainpages');
        $this->query = $this->queryPages($this->app_slug);
        //$this->filterByLocal($this->local);
        $this->listAction('mainpages');
    }
    
    
    
    public function imagesMainpagesAction(){
        $query = MediaQuery::getListForPage(Vars::getId())->filterByGenre('img');
        $this->listMediaActions($query, '/admin/choiceimage_mainpages');
        $this->addInputMedia('/admin/uploadimage_mainpages');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_mainpages');
    }
    
    public function uploadimageMainpagesAction(){
        $upload = $this->bindImageAction(['folder'=>'/userfiles/images', 'width'=>500, 'height'=>500]);
        if($upload != false){
            $this->json['id'] = $this->saveMedia($upload);
        }
        
        echo json_encode($this->json);
    }
    
    public function choiceimageMainpagesAction(){
        $this->choiceMediaAction();
    }
    
    
    public function txtMainpagesAction(){
        $form = $this->geTxtForm(WysihtmlInput::TOOLBAR_RICHTEXT);
        
        $this->txtAction($form, 'txtwithmenu');
    }
    
    public function bindtxtMainpagesAction() {
        $form = $this->geTxtForm();
        $form = $form->validate();
        
        $this->bindTxtAction($form, 'txtwithmenu');
    }


    /**
     *
     */
    public function editMainpagesAction() {
        $query = PagesQuery::getList($this->app_slug)->filterById(Vars::getId())->findOne();
        $form = PageTextForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'mainpages');
    }


    /**
     *
     */
    public function newMainpagesAction() {
        $form = PageTextForm::initialize($this->app_slug)->addHtmVars('anchor');
        #more code about $form and $query
        $this->renderForm($form, 'mainpages');
    }

    /**
     *
     */
    public function statusMainPagesAction(){
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->addHtmVars('anchor')->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps/Vendor/config/htmvars', 'bindstatus_mainpages');
    }

    /**
     *
     */
    public function bindstatusMainpagesAction() {
        $form = HtmForm::initialize($this->app_slug)->addHtmVars('anchor');
        $form->validate();
        
        Monitor::setMonitor(Monitor::BOOKMARK, 'Form has been validated');
        
        $model = $this->buildProcess($form, 'apps/Vendor/config/htmvars');
        if($model !== false){
            $this->showMainpagesAction();
        }
            
    }


    /**
     *
     */
    public function bindMainpagesAction() {
        $form = PageTextForm::initialize($this->app_slug)->addHtmVars('anchor')->validate();
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
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
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
