<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \apps\Core\model\PageTextForm;
use \model\models\HtmPage;
use \apps\Core\model\PagesQuery;
use \lib\session\SessionConfig;
use \apps\Core\model\HtmForm;

/**
 * Description of HomecontentActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class HomecontentActions extends \apps\Core\control\PagesActions {
    
    private $app_slug = 'home';
    
    protected $txt_action = 'admin/txt_homecontent';
    protected $bindtxt_action = 'admin/bindtxt_homecontent';
    
    private $homelocal = ['home-quem-somos', 'home-services'];

    /**
     * 
     */
    public function homecontentAction(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/homecontent');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('homecontent');
        

    }
    
    /**
     * 
     */
    public function listHomecontentAction(){
        SessionConfig::setXml('apps/Admin/config/homecontent');
        $this->query = $this->queryPages($this->app_slug);
        $this->filterByLocal($this->homelocal);
        $this->listAction('homecontent');
    }
    
    
    public function txtHomecontentAction(){
        $form = $this->geTxtForm();
        $form = $form->setTypeValue('txt');
        
        $this->txtAction($form, 'hometxt');
    }
    
    public function bindtxtHomecontentAction() {
        $form = $this->geTxtForm();
        $form = $form->validate();
        
        $this->bindTxtAction($form, 'hometxt');
    }


    
    public function editHomecontentAction() {
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = PageTextForm::initialize($this->app_slug)->setQueryValues($query);
        
        $this->renderForm($form, 'homecontent');
    }
    
    public function newHomecontentAction() {
        $form = PageTextForm::initialize($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, 'homecontent');
        
    }
    
    public function bindHomecontentAction() {
        $form = PageTextForm::initialize($this->app_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'homecontent');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showHomecontentAction();
        }
    }
    
    
    public function showHomecontentAction(){
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $this->renderValues($model, 'homecontent');
    }
    
    
    /**
     *
     */
    public function statusHomecontentAction(){
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->addHtmVars('local')->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps/Core/config/htmvars', 'bindstatus_homecontent');
    }
    
    /**
     *
     */
    public function bindstatusHomecontentAction() {
        
        $form = HtmForm::initialize($this->app_slug)->addHtmVars('local');
        $form->validate();
        $model = $this->buildProcess($form, 'apps/Core/config/htmvars');
        if($model !== false){
            $this->showHomecontentAction();
        }
    }
    
    public function delHomecontentAction() {
        $model = \model\querys\HtmQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportHomecontentAction(){
        $query = HomecontentQuery::get();
        $this->buildCsvExport($query, 'homecontent', 'homecontent');
    }

}
