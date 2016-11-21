<?php

namespace apps\Admin\control;

use \lib\register\Vars;
use \apps\Vendor\model\PagesQuery;
use \apps\Vendor\model\PageTextForm;
use \apps\Vendor\model\HtmForm;
use \model\models\HtmPage;
use \apps\Vendor\model\MediaQuery;
use \lib\session\SessionConfig;
use \lib\form\input\WysihtmlInput;

/**
 * Description of ServicesActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class ServicesActions extends \apps\Vendor\control\PagesActions {

    private $app_slug = 'services';
    protected $txt_action = 'admin/txt_services';
    protected $bindtxt_action = 'admin/bindtxt_services';
    
    
    public function servicesAction(){
        $this->set('heading', Vars::getHeading());

        SessionConfig::setXml('apps/Admin/config/services');
        $this->query = $this->queryPages($this->app_slug);
        $this->mainAction('services');
    }

    public function listServicesAction() {
        SessionConfig::setXml('apps/Admin/config/services');
        $this->query = $this->queryPages($this->app_slug);
        $this->listAction('services');
    }

    public function imagesServicesAction() {
        $query = MediaQuery::getMediaOfPage(Vars::getId())->filterByGenre('img');
        $this->listMediaActions($query, '/admin/choiceimage_services');
        $this->addInputMedia('/admin/uploadimage_services/' . Vars::getId());
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_services');
    }

    public function uploadimageServicesAction() {
        $upload = $this->bindImageAction(['folder' => '/userfiles/images', 'width' => 500, 'height' => 500]);
        if ($upload != false) {
            $media_id = $this->saveMedia($upload);
            $this->choiceMedia(Vars::getId(), $media_id);
            $this->json['id'] = $media_id;
        }

        echo json_encode($this->json);
    }

    public function choiceimageServicesAction() {
        $this->choiceMediaAction();
    }

    public function txtServicesAction() {
        $form = $this->geTxtForm(WysihtmlInput::TOOLBAR_RICHTEXT);

        $this->txtAction($form, 'txt');
    }

    public function bindtxtServicesAction() {
        $form = $this->geTxtForm();
        $form = $form->validate();

        $this->bindTxtAction($form, 'txt');
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
        if ($model !== false) {
            #$result is a model
            if ($model->getAction() == HtmPage::ACTION_INSERT) {
                #operations after inserted
            } elseif ($model->getAction() == HtmPage::ACTION_UPDATE) {
                #operations after updated
            }

            $this->showServicesAction();
        }
    }

    public function showServicesAction() {
        $model = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $this->renderValues($model, 'services');
    }

    /**
     *
     */
    public function statusServicesAction() {
        $query = PagesQuery::getList($this->app_slug)->filterByHtmId(Vars::getId())->findOne();
        $form = HtmForm::initialize($this->app_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'htmservices', 'bindstatus_services');
    }

    /**
     *
     */
    public function bindstatusServicesAction() {

        $form = HtmForm::initialize($this->app_slug);
        $form->validate();
        $model = $this->buildProcess($form, 'htmservices');
        if ($model !== false) {
            $this->showServicesAction();
        }
    }

    public function delServicesAction() {
        $model = \model\querys\HtmQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    public function exportServicesAction() {
        $query = PagesQuery::getList($this->app_slug);
        $this->buildCsvExport($query, 'services', 'services');
    }

}
