<?php

namespace apps\Core\model;

use \model\models\Htm;
use \model\models\HtmPageHasVars;
use \model\forms\HtmPageHasVarsForm;
use \lib\form\input\HiddenInput;

/**
 * Description of HtmForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class HtmForm extends \lib\form\FormMerged {
    
    private $app;

    /**
    * Create and return the common query to this class
    *
    * @return \apps\Core\model\HtmForm;
    */
    public static function initialize($app){
        $form = new HtmForm();
        $form->setQueue($app);
        return $form;
    }
    
    public function setQueue($app) {
        $this->app = $app;
        
        $this->queue = [Htm::TABLE];
        
        $this->models[Htm::TABLE] = new Htm();
        
        
        $this->forms[Htm::TABLE] = $this->declareHtmForm();
        
        $this->merge();
        
        return $this;
    }
    
    private function declareHtmForm(){
        $form = \model\forms\HtmForm::initialize();
        
        $query = \model\querys\HtmAppQuery::start(ONLY)->filterBySlug($this->app)->findOne();
        $input = HiddenInput::create(Htm::FIELD_HTM_APP_ID)->setValue($query->getId());
        $form->setHtmAppIdInput($input);
        
        return $form;
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \model\forms\HtmForm;
    */
    public function getHtmForm(){
        return $this->forms[Htm::TABLE];
    }
    
    /**
     * 
     * @param string $var
     * @return \apps\Core\model\HtmForm
     */
    public function addHtmVars($var){
        $this->queue = array_merge($this->queue, [HtmPageHasVars::TABLE]);
        $this->models[HtmPageHasVars::TABLE] = new HtmPageHasVars();
        $this->forms[HtmPageHasVars::TABLE] = $this->declareHtmVarsForm($var);
        
        $this->merge();
        return $this;
    }
    
    /**
     * @return HtmForm
     */
    private function declareHtmVarsForm($var){
        $form = HtmPageHasVarsForm::initialize();
        
        $query = \model\querys\HtmVarsQuery::start()->filterByVar($var)->orderByValue();
        $input = $form->getHtmVarsIdInput();
        $input->setModel($query);
        $input->setArrayLabel([\model\models\HtmVars::FIELD_VALUE => '']);
        $form->setHtmVarsIdInput($input);
        
        return $form;
    }
    
    
    /**
     * 
     * @return HtmPageHasVarsForm
     */
    public function getHtmPageHasVarsForm(){
        return $this->forms[HtmPageHasVars::TABLE];
    }
    
    /**
    * Set some defaults on the new form
    *
    * @return \apps\Core\model\HtmForm;
    */
    public function setSomeDefaults(){
        $form = $this->getHtmForm();
        
        return $this;
    }

    protected function customValidate() {
        
    }
    
    /**
    * Create and return the common query to this class
    *
    * @return \apps\Core\model\HtmForm;
    */
    public function validate(){
        parent::validate();
        return $this;
    }

}
