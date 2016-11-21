<?php

namespace apps\%$nameApp%\control;

use \lib\register\Vars;

use \apps\Vendor\model\PagesQuery;
use \apps\Vendor\model\PagesForm;
use \apps\Vendor\model\HtmForm;
use \model\models\HtmPage;
use \apps\Vendor\model\MediaQuery;
use \lib\session\SessionConfig;

/**
 * Description of %$className%Actions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-26 11:10
 * Updated @%$dateUpdated% *
 */
class %$className%Actions extends \apps\Vendor\control\PagesActions {

    private $app_slug = '%$slugApp%';
    
    protected $txt_action = '%$slugApp%/txt_%$fileName%';
    protected $bindtxt_action = '%$slugApp%/bindtxt_%$fileName%';
    
    
    /**
     * Begining
     */
    public function %$fileName%Action(){
        $this->set('heading', Vars::getHeading());
        
        SessionConfig::setXml('apps/Admin/config/%$fileName%');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('%$fileName%');
    }
    
    
    public function list%$className%Action(){
        SessionConfig::setXml('apps/Admin/config/%$fileName%');
        $this->query = $this->queryPages($this->app_slug);
        $this->listAction('%$fileName%');
    }
    
    
    public function images%$className%Action(){
        $query = MediaQuery::getListForPage(Vars::getId())->filterByGenre('img');
        $this->listMediaActions($query, '/admin/choiceimage_%$fileName%');
        $this->addInputMedia('/admin/uploadimage_%$fileName%');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_%$fileName%');
    }
    
    public function uploadimage%$className%Action(){
        $upload = $this->bindImageAction(['folder'=>'/uploads', 'width'=>500, 'height'=>500]);
        if($upload != false){
            $this->json['id'] = $this->saveMedia($upload);
        }
        
        echo json_encode($this->json);
    }
    
    public function choiceimage%$className%Action(){
        $this->choiceMediaAction();
    }
    
    
    public function txt%$className%Action(){
        $form = $this->geTxtForm();
        $form = $form->setTypeValue('txt');
        
        $this->txtAction($form, 'hometxt');
    }
    
    public function bindtxt%$className%Action() {
        $form = $this->geTxtForm();
        $form = $form->validate();
        
        $this->bindTxtAction($form, 'hometxt');
    }

    
    
    public function edit%$className%Action() {
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = PagesForm::initialize($this->app_slug)->setQueryValues($query);
        
        $this->renderForm($form, '%$fileName%');
    }
    
    
    public function new%$className%Action() {
        $form = PagesForm::initialize($this->app_slug);
        #more code about $form and $query
        $this->renderForm($form, '%$fileName%');
    }
    
    public function bind%$className%Action() {
        $form = PagesForm::initialize($this->app_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, '%$fileName%');
        if($model !== false){
            #$result is a model
            if($model->getAction() == HtmPage::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == HtmPage::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->show%$className%Action();
        }
    }
    
    public function show%$className%Action(){
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $this->renderValues($model, '%$fileName%');
    }
    
    
    /**
     *
     */
    public function status%$className%Action(){
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'apps/Vendor/config/htmvars', 'bindstatus_%$fileName%');
    }
    
    /**
     *
     */
    public function bindstatus%$className%Action() {
        
        $form = HtmForm::initialize($this->app_slug);
        $form->validate();
        $model = $this->buildProcess($form, 'apps/Vendor/config/htmvars');
        if($model !== false){
            $this->show%$className%Action();
        }
    }
    
    public function del%$className%Action() {
        $model = \model\querys\HtmQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function export%$className%Action(){
        $query = PagesQuery::getList($this->app_slug);
        $this->buildCsvExport($query, '%$fileName%', '%$fileName%');
    }

}
