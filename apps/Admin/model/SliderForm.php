<?php

namespace apps\Admin\model;

use \model\models\MediaInfo;
use \model\models\Media;
use \lib\form\input\HiddenInput;

/**
 * Description of SliderForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class SliderForm extends \lib\form\FormMerged {

    /**
    * Create and return the common query to this class
    *
    * @return \apps\Admin\model\SliderForm;
    */
    public static function initialize($slug){
        $form = new SliderForm();
        $form->setQueue($slug);
        return $form;
    }
    
    public function setQueue($slug) {
        $this->queue = [Media::TABLE, MediaInfo::TABLE];
        $this->models[Media::TABLE] = new Media();
        $this->forms[Media::TABLE] = $this->declareMediaForm();
        $this->models[MediaInfo::TABLE] = new MediaInfo();
        $this->forms[MediaInfo::TABLE] = $this->declareMediaInfoForm($slug);
        
        $this->merge();
        
        return $this;
    }
    
    private function declareMediaForm(){
        $form = \model\forms\MediaForm::initialize();
        
        $input = HiddenInput::create()->setValue(Media::GENRE_BANNER);
        $form->setGenreInput($input);
        $form->setSourceInput(HiddenInput::create());
        
        $form->setDateInput(HiddenInput::create());
        $form->unsetSourceInput();
        
        return $form;
    }
    
    private function declareMediaInfoForm($slug){
        $form = \model\forms\MediaInfoForm::initialize();
        
        $input = HiddenInput::create()->setDefault(0);
        $form->setMediaIdInput($input);
        
        $form->unsetAuthorInput();
        
        $gallery = \model\querys\MediaCollectionQuery::start()->filterBySlug($slug)->findOne();
        $input = HiddenInput::create()->setValue($gallery->getId());
        $form->setMediaCollectionIdInput($input);
        
        $form->setSummaryInput(\lib\form\input\TextAreaInput::create());
        
        return $form;
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \model\forms\MediaInfoForm;
    */
    public function getMediaInfoForm(){
        return $this->forms[MediaInfo::TABLE];
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \apps\Admin\model\SliderForm;
    */
    public function setSomeDefaults(){
        $form = $this->getMediaInfoForm();
        
        return $this;
    }

    protected function customValidate() {
        
    }
    
    /**
    * Create and return the common query to this class
    *
    * @return \apps\Admin\model\SliderForm;
    */
    public function validate(){
        parent::validate();
        return $this;
    }

}
