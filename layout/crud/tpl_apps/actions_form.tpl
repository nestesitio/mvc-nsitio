<?php

namespace apps\%$nameApp%\model;

use \model\models\%$modelName%;

/**
 * Description of %$className%Form
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class %$className%Form extends \lib\form\FormMerged {

    /**
    * Create and return the common query to this class
    *
    * @return \apps\%$nameApp%\model\%$className%Form;
    */
    public static function initialize(){
        $form = new %$className%Form();
        $form->setQueue();
        return $form;
    }
    
    public function setQueue() {
        $this->queue = [%$modelName%::TABLE];
        $this->models[%$modelName%::TABLE] = new %$modelName%();
        $this->forms[%$modelName%::TABLE] = $this->declare%$modelName%Form();
        
        $this->merge();
        
        return $this;
    }
    
    private function declare%$modelName%Form(){
        $form = \model\forms\%$modelName%Form::initialize();
        
        return $form;
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \model\forms\%$modelName%Form;
    */
    public function get%$modelName%Form(){
        return $this->forms[%$modelName%::TABLE];
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \apps\%$nameApp%\model\%$className%Form;
    */
    public function setSomeDefaults(){
        $form = $this->get%$modelName%Form();
        
        return $this;
    }

    protected function customValidate() {
        
    }
    
    /**
    * Create and return the common query to this class
    *
    * @return \apps\%$nameApp%\model\%$className%Form;
    */
    public function validate(){
        parent::validate();
        return $this;
    }

}
