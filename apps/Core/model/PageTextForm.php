<?php
namespace apps\Core\model;

use \lib\register\Vars;
use \model\models\Htm;
use \model\models\HtmPage;
use \lib\form\input\HiddenInput;
use \lib\form\form\FormRender;
#use \lib\register\Vars;

/**
 * Used to edit pages in CMS system,
 * contains rich text editor
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 24, 2015
 */
class PageTextForm extends \lib\form\FormMerged {

    /**
     * @var
     */
    private $app;

    /**
     * @param $app
     * @return PageTextForm
     */
    public static function initialize($app) {
        $form = new PageTextForm();
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
        
        $input = $form->getStatInput();
        $input->setValuesList([Htm::STAT_PUBLIC, Htm::STAT_PRIVATE])->setValue(Htm::STAT_PUBLIC);
        $form->setStatInput($input);
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
       $input = $form->getTitleInput()
                ->setDataAttribute('data-function', 'exportValue')
                ->setDataAttribute('data-export', FormRender::renderName(HtmPage::FIELD_MENU, Vars::getCanonical()));
       $form->setTitleInput($input);
       
       $input = $form->getMenuInput()
                ->setDataAttribute('data-function', 'exportValue')
                ->setDataAttribute('data-export', FormRender::renderName(HtmPage::FIELD_HEADING, Vars::getCanonical()));
       $form->setMenuInput($input);  
       
       $input = $form->getHeadingInput()
                ->setDataAttribute('data-function', 'exportValue')
                ->setDataAttribute('data-export', FormRender::renderName(HtmPage::FIELD_TITLE, Vars::getCanonical()));
       $form->setHeadingInput($input);             
        
        return $form;
    }
    
    /**
     * 
     * @return \model\forms\HtmForm
     */
    public function getHtmForm(){
        return $this->forms[Htm::TABLE];
    }
    
    /**
     * 
     * @param string $controller
     * @return \apps\Core\model\PageTextForm
     */
    public function setHtmController($controller){
        $form = $this->getHtmForm();
        $input = HiddenInput::create()->setValue($controller);
        $form->setControllerInput($input);
        $this->forms[Htm::TABLE] = $form;
        $this->merge();
        return $this;
    }
    
    /**
     * 
     * @return \model\forms\HtmPageForm
     */
    public function getHtmPageForm(){
        return $this->forms[HtmPage::TABLE];
    }
    
     /**
     * 
     * @param string $var
     * @return \apps\Core\model\PageTextForm
     */
    public function addHtmVars($var){
        $this->queue = array_push($this->queue, HtmHasVars::TABLE);
        $this->models[HtmHasVars::TABLE] = new HtmHasVars();
        $this->forms[HtmHasVars::TABLE] = $this->declareHtmVarsForm($var);
        
        $this->merge();
        return $this;
    }
    
    /**
     * @param string $var
     * 
     * @return HtmHasVarsForm
     */
    private function declareHtmVarsForm($var){
        $form = HtmHasVarsForm::initialize();
        /*
        $input = HiddenInput::create(HtmHasVars::FIELD_HTM_ID)->setDefault(0);
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
     * @return HtmHasVarsForm
     */
    public function getHtmHasVarsForm(){
        return $this->forms[HtmHasVars::TABLE];
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
