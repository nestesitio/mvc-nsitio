<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \apps\Core\model\PagesQuery;
use \apps\Core\model\PageTextForm;
use \apps\Core\model\HtmForm;
use \model\models\HtmPage;
use \lib\page\MediaQuery;
use \lib\session\SessionConfig;

/**
 * Description of ServicesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class ServicesActions extends \apps\Core\control\PagesActions {

    private $app_slug = 'services';
    
    protected $txt_action = 'admin/txt_services';
    protected $bindtxt_action = 'admin/bindtxt_services';
    
    
    public function servicesAction(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/services');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('services');
    }
    
    
    public function listServicesAction(){
        SessionConfig::setXml('apps/Admin/config/services');
        $this->query = $this->queryPages($this->app_slug);
        $this->listAction('services');
    }
    
    public function imagesServicesAction(){
        $query = MediaQuery::getListForPage(Vars::getId())->filterByGenre('img');
        $this->listMediaActions($query, '/admin/choiceimage_services');
        $this->addInputMedia('/admin/uploadimage_services');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_services');
    }
    
    public function uploadimageServicesAction(){
        $upload = $this->bindImageAction(['folder'=>'/userfiles/images', 'width'=>500, 'height'=>500]);
        if($upload != false){
            $this->json['id'] = $this->saveMedia($upload);
        }
        
        echo json_encode($this->json);
    }
    
    public function choiceimageServicesAction(){
        $this->choiceMediaAction();
    }
    
    
    public function txtServicesAction(){
        $form = $this->geTxtForm('withmedia');
        $form = $form->setTypeValue('txt');
        
        $this->txtAction($form, 'hometxt');
    }
    
    public function bindtxtServicesAction() {
        $form = $this->geTxtForm();
        $form = $form->validate();
        
        $this->bindTxtAction($form, 'hometxt');
    }
    
    
    public function editServicesAction() {
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = PageTextForm::initialize($this->app_slug)->setQueryValues($query);
        
        $this->renderForm($form, 'services');
    }
    
    
    public function newServicesAction() {
        $form = PageTextForm::initialize($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, 'services');
    }
    
    public function bindServicesAction() {
        $form = PageTextForm::initialize($this->app_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'services');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showServicesAction();
        }
    }
    
    public function showServicesAction(){
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $this->renderValues($model, 'services');
    }
    
    
    /**
     *
     */
    public function statusServicesAction(){
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps/Core/config/htmvars', 'bindstatus_services');
    }
    
    /**
     *
     */
    public function bindstatusServicesAction() {
        
        $form = HtmForm::initialize($this->app_slug);
        $form->validate();
        $model = $this->buildProcess($form, 'apps/Core/config/htmvars');
        if($model !== false){
            $this->showServicesAction();
        }
    }
    
    public function delServicesAction() {
        $model = \model\querys\HtmQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportServicesAction(){
        $query = PagesQuery::getList($this->app_slug);
        $this->buildCsvExport($query, 'services', 'services');
    }

}
