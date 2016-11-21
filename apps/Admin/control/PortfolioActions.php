<?php

namespace apps\Admin\control;

use \lib\register\Vars;

use \model\models\MediaInfo;
use \apps\Admin\model\SliderForm;
use \apps\Vendor\model\MediaQueries;
use \model\models\Media;

/**
 * Description of PortfolioActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 10, 2016
 */
class PortfolioActions extends \apps\Vendor\control\CmsActions {

    private $gallery_slug = 'portfolio';

    public function portfolioAction(){
        $this->setView('layout/core/datagrid-cms.htm');
        $this->set('heading', Vars::getHeading());
        $query = MediaQueries::getSliders($this->gallery_slug);
        $results = $this->buildDataGrid('portfolio', $query);
        #here you can process the results
        $this->renderList($results);
        /*
        $form = SliderForm::initialize()->prepareFilters();
        $this->renderFilters($form, 'portfolio');
         * 
         */
    }
    
    public function listPortfolioAction(){
        $query = MediaQueries::getSliders($this->gallery_slug);
        $results = $this->buildDataList('portfolio', $query);
        #here you can process the results
        $this->renderList($results);
    }
    
    
    public function imagesPortfolioAction(){
        $this->setView('layout/core/list_img');
        $medias = MediaQueries::getMediasByGenre(Media::GENRE_BANNER)->filterByMediaInfo(Vars::getId())->get();
                
        $this->renderList($medias);
        $this->addInputMedia('/admin/uploadimage_portfolio/' . Vars::getId());
        $this->set('data-choice-action', '/admin/uploadimage_portfolio');
        $this->set('data-page', Vars::getId());
        $this->set('data-insert', 'admin/choiceimages_portfolio');
    }
    
    public function uploadimagePortfolioAction(){
        
        $upload = $this->bindImageAction(['folder'=>'/userfiles/portfolio', 'width'=>1400, 'height'=>null]);
        if($upload != false){
            $upload->setBannerGenre();
            $this->json['id'] = $this->saveMedia($upload, Vars::getId());
        }
        
        echo json_encode($this->json);
    }
    
    
    
    public function editPortfolioAction() {
        $query = MediaQueries::getSliders($this->gallery_slug)->filterById(Vars::getId())->findOne();
        $form = SliderForm::initialize($this->gallery_slug)->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'portfolio');
    }
    
    
    public function newPortfolioAction() {
        $form = SliderForm::initialize($this->gallery_slug)->setSomeDefaults();
        #more code about $form and $query
        $this->renderForm($form, 'portfolio');
    }
    
    public function bindPortfolioAction() {
        $form = SliderForm::initialize($this->gallery_slug)->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'portfolio');
        if($model !== false){
            #$result is a model
            if($model->getAction() == MediaInfo::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == MediaInfo::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showPortfolioAction();
        }
    }
    
    public function showPortfolioAction(){
        $model = MediaQueries::getSliders($this->gallery_slug)->filterById(Vars::getId())->findOne();
        $this->renderValues($model, 'portfolio');
    }
    
    public function delPortfolioAction() {
        $model = \model\querys\MediaInfoQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }
    
    public function exportPortfolioAction(){
        $query = MediaQueries::getSliders($this->gallery_slug);
        $this->buildCsvExport($query, 'portfolio', 'portfolio');
    }

}
