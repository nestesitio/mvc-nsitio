<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \apps\Core\model\PagesQuery;
use \apps\Core\model\PagesForm;
use \apps\Core\model\HtmForm;
use \model\models\HtmPage;
use \lib\page\MediaQuery;
use \lib\session\SessionConfig;

/**
 * Description of NewsActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class NewsActions extends \apps\Core\control\PagesActions {
    
    private $app_slug = 'news';
    
    protected $txt_action = 'admin/txt_news';
    protected $bindtxt_action = 'admin/bindtxt_news';

    public function newsAction(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/news');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('news');
    }
    
    
    public function listNewsAction(){
        SessionConfig::setXml('apps/Admin/config/news');
        $this->query = $this->queryPages($this->app_slug);
        $this->listAction('news');
    }
    
    
    public function imagesNewsAction(){
        $query = MediaQuery::getListForPage(Vars::getId())->filterByGenre('img');
        $this->listMediaActions($query, '/admin/choiceimage_news');
        $this->addInputMedia('/admin/uploadimage_news');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_news');
    }
    
    public function uploadimageNewsAction(){
        $upload = $this->bindImageAction(['folder'=>'/uploads', 'width'=>500, 'height'=>500]);
        if($upload != false){
            $this->json['id'] = $this->saveMedia($upload);
        }
        
        echo json_encode($this->json);
    }
    
    public function choiceimageNewsAction(){
        $this->choiceMediaAction();
    }
    
    
    public function txtNewsAction(){
        $form = $this->geTxtForm();
        $form = $form->setTypeValue('txt');
        
        $this->txtAction($form, 'hometxt');
    }
    
    public function bindtxtNewsAction() {
        $form = $this->geTxtForm();
        $form = $form->validate();
        
        $this->bindTxtAction($form, 'hometxt');
    }
    
    
    public function editNewsAction() {
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = PagesForm::initialize($this->app_slug)->setQueryValues($query);
        
        $this->renderForm($form, 'news');
    }
    
    
    public function newNewsAction() {
        $form = PagesForm::initialize($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, 'news');
    }
    
    public function bindNewsAction() {
        $form = PagesForm::initialize($this->app_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'news');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showNewsAction();
        }
    }
    
    public function showNewsAction(){
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $this->renderValues($model, 'news');
    }
    
    
    /**
     *
     */
    public function statusNewsAction(){
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps/Core/config/htmvars', 'bindstatus_news');
    }
    
    /**
     *
     */
    public function bindstatusNewsAction() {
        
        $form = HtmForm::initialize($this->app_slug);
        $form->validate();
        $model = $this->buildProcess($form, 'apps/Core/config/htmvars');
        if($model !== false){
            $this->showNewsAction();
        }
    }
    
    public function delNewsAction() {
        $model = \model\querys\HtmQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportNewsAction(){
        $query = PagesQuery::getList($this->app_slug);
        $this->buildCsvExport($query, 'news', 'news');
    }

}
