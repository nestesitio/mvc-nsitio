<?php

namespace apps\Configs\model;

use \model\models\HtmVars;

/**
 * Description of VarsForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class VarsForm extends \lib\form\FormMerged {

    /**
    * Create and return the common query to this class
    *
    * @return \apps\Configs\model\VarsForm;
    */
    public static function initialize(){
        $form = new VarsForm();
        $form->setQueue();
        return $form;
    }
    
    public function setQueue() {
        $this->queue = [HtmVars::TABLE];
        $this->models[HtmVars::TABLE] = new HtmVars();
        $this->forms[HtmVars::TABLE] = $this->declareHtmVarsForm();
        
        $this->merge();
        
        return $this;
    }
    
    private function declareHtmVarsForm(){
        $form = \model\forms\HtmVarsForm::initialize();
        
        return $form;
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \model\forms\HtmVarsForm;
    */
    public function getHtmVarsForm(){
        return $this->forms[HtmVars::TABLE];
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \apps\Configs\model\VarsForm;
    */
    public function setSomeDefaults(){
        $form = $this->getHtmVarsForm();
        
        return $this;
    }

    protected function customValidate() {
        
    }
    
    /**
    * Create and return the common query to this class
    *
    * @return \apps\Configs\model\VarsForm;
    */
    public function validate(){
        parent::validate();
        return $this;
    }

}
