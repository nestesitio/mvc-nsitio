<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \model\models\MediaInfo;
use \apps\Admin\model\SliderForm;
use \apps\Vendor\model\MediaQueries;
use \model\models\Media;

/**
 * Description of SliderActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class SliderActions extends \apps\Vendor\control\CmsActions {
    
    private $gallery_slug = 'home-slider';

    public function sliderAction(){
        $this->setView('layout/core/datagrid-cms.htm');
        $this->set('heading', Vars::getHeading());
        $query = MediaQueries::getSliders($this->gallery_slug);
        $results = $this->buildDataGrid('slider', $query);
        #here you can process the results
        $this->renderList($results);
        /*
        $form = SliderForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'slider');
         * 
         */
    }
    
    
    public function listSliderAction(){
        $query = MediaQueries::getSliders($this->gallery_slug);
        $results = $this->buildDataList('slider', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    public function imagesSliderAction(){
        $this->setView('layout/core/list_img');
        $medias = MediaQueries::getMediasByGenre(Media::GENRE_BANNER)->filterByMediaInfo(Vars::getId())->get();
                
        $this->renderList($medias);
        $this->addInputMedia('/admin/uploadimage_slider/' . Vars::getId());
        $this->set('data-choice-action', '/admin/uploadimage_slider');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_slider');
    }
    
    public function uploadimageSliderAction(){
        
        $upload = $this->bindImageAction(['folder'=>'/userfiles/home-slider', 'width'=>1400, 'height'=>null]);
        if($upload != false){
            $upload->setBannerGenre();
            $this->json['id'] = $this->saveMedia($upload, Vars::getId());
        }
        
        echo json_encode($this->json);
    }
    
    
    
    public function editSliderAction() {
        $query = MediaQueries::getSliders($this->gallery_slug)->filterById(Vars::getId())->findOne();
        $form = SliderForm::initialize($this->gallery_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'slider');
    }
    
    
    public function newSliderAction() {
        $form = SliderForm::initialize($this->gallery_slug)->setSomeDefaults();
        #more code about $form and $query
        $this->renderForm($form, 'slider');
    }
    
    public function bindSliderAction() {
        $form = SliderForm::initialize($this->gallery_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'slider');
        if($model !== false){
            #$result is a model
            if($model->getAction() == MediaInfo::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == MediaInfo::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showSliderAction();
        }
    }
    
    public function showSliderAction(){
        $model = MediaQueries::getSliders($this->gallery_slug)->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'slider');
    }
    
    public function delSliderAction() {
        $model = \model\querys\MediaInfoQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportSliderAction(){
        $query = MediaQueries::getSliders($this->gallery_slug);
        $this->buildCsvExport($query, 'slider', 'slider');
    }

}
