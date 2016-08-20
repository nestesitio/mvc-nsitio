<?php
namespace apps\Core\model;

use \model\models\Htm;
use \model\models\HtmPage;
use \lib\form\input\HiddenInput;
#use \lib\register\Vars;

/**
 * Description of PagesForm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 24, 2015
 */
class PagesForm extends \lib\form\FormMerged {

    /**
     * @var
     */
    private $app;

    /**
     * @param $app
     * @return PagesForm
     */
    public static function initialize($app) {
        $form = new PagesForm();
        $form->declaration($app);
        
        return $form;
    }

    /**
     * @param $app
     * @return $this
     */
    public function declaration($app) {
        $this->app = $app;
        
        $this->queue = [Htm::TABLE, HtmPage::TABLE];
        
        $this->models[Htm::TABLE] = new Htm();
        $this->models[HtmPage::TABLE] = new HtmPage();
        
        $this->forms[Htm::TABLE] = $this->declareHtmForm();
        $this->forms[HtmPage::TABLE] = $this->declareHtmPageForm();
	
        $this->merge();
        
        return $this;
    }


    /**
     * @return \model\forms\HtmForm
     */
    private function declareHtmForm(){
        $form = \model\forms\HtmForm::initialize();
        $query = \model\querys\HtmAppQuery::start(ONLY)->filterBySlug($this->app)->findOne();
        $input = HiddenInput::create(Htm::FIELD_HTM_APP_ID)->setValue($query->getId());
        $form->setHtmAppIdInput($input);
        
        $form->setStatInput()->setDefault(Htm::STAT_PRIVATE);
        $form->setOrdInput()->setDefault(1);
        
        return $form;
    }

    /**
     * @return \model\forms\HtmPageForm
     */
    private function declareHtmPageForm(){
        $form = \model\forms\HtmPageForm::initialize();
        $input = HiddenInput::create(HtmPage::FIELD_HTM_ID)->setDefault(0);
	$form->setHtmIdInput($input);
        $input = HiddenInput::create(HtmPage::FIELD_SLUG)->setValue('index');
	$form->setSlugInput($input);
        return $form;
    }
    
    
    public function getHtmForm(){
        return $this->forms[Htm::TABLE];
    }
    
    
    public function getHtmPageForm(){
        return $this->forms[HtmPage::TABLE];
    }
    
     /**
     * 
     * @param string $var
     * @return \apps\Core\model\PagesForm
     */
    public function addHtmVars($var){
        $this->queue = array_push($this->queue, HtmPageHasVars::TABLE);
        $this->models[HtmPageHasVars::TABLE] = new HtmPageHasVars();
        $this->forms[HtmPageHasVars::TABLE] = $this->declareHtmVarsForm($var);
        
        $this->merge();
        return $this;
    }
    
    /**
     * @param string $var
     * 
     * @return HtmPageHasVarsForm
     */
    private function declareHtmVarsForm($var){
        $form = HtmPageHasVarsForm::initialize();
        /*
        $input = HiddenInput::create(HtmPageHasVars::FIELD_HTM_ID)->setDefault(0);
	$form->setHtmIdInput($input);
         * 
         */
        
        $input = $form->getHtmVarsIdInput();
        $query = \model\querys\HtmVarsQuery::start()->filterByVar($var)->orderByValue();
        
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
     *
     */
    protected function customValidate() {
        $title = $this->getValidatedValue(HtmPage::TABLE, HtmPage::FIELD_TITLE);
        $slug = $this->getValidatedValue(HtmPage::TABLE, HtmPage::FIELD_SLUG);
        
        if($slug == false || $slug == 'index'){
            $slug = \lib\tools\StringTools::slugify($title);
            $this->rePostValue(HtmPage::TABLE, HtmPage::FIELD_SLUG, $slug);
        }
    }

}
