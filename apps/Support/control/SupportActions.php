<?php

namespace apps\Support\control;

use \lib\register\Vars;
use \lib\session\SessionUser;

use \model\querys\SupportQuery;
use \model\models\Support;
use \model\querys\SupportLogQuery;
use \model\forms\SupportForm;
use \apps\Support\model\SupportUserForm;

/**
 * Description of SupportActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class SupportActions extends \lib\control\ControllerAdmin {

    /**
     *
     */
    public function menuAction(){
        if(SessionUser::haveUser() == true){
            $this->set('support', 1);
        }
        return $this->dispatch();
    }

    /**
     *
     */
    public function supportAction(){
        
    }


    /**
     *
     */
    public function editSupportAction() {
        $query = SupportQuery::start()->filterById(Vars::getId())->findOne();
        $form = SupportForm::initialize()->setQueryValues($query);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'support');
    }


    /**
     *
     */
    public function newSupportAction() {
        $form = SupportUserForm::init();
        #more code about $form and $query
        $this->renderForm($form, 'support', 'new_support');
        $slug = Vars::getSlugVar();
        if($slug == 'suggestion'){
            $title = "Dás-nos a tua sugestão";
        }elseif($slug == 'issue'){
            $title = "Descreve o problema";
        }elseif($slug == 'query'){
            $title = "Descreve a tua dúvida";
            
        }
        
        $this->set('title', $title);
    }

    /**
     *
     */
    public function bindSupportAction() {
        $form = SupportUserForm::init()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'support');
        if($model !== false){
            if($model->getAction() == Support::ACTION_INSERT){
                Vars::setId($model->getInsertId());
                $this->feedbackSupportAction();
            }
        }
    }

    /**
     *
     */
    public function feedbackSupportAction(){
        $model = SupportLogQuery::start()->filterBySupportId(Vars::getId())->findOne();
        $this->renderValues($model, 'support', 'process_support');
    }

    /**
     *
     */
    public function delSupportAction() {
        $model = SupportQuery::start()->filterById(Vars::getId())->findOne();
        $this->deleteObject($model);
        
    }

    /**
     *
     */
    public function csvSupportAction(){
        $query = SupportQuery::start();
        $this->buildCsvExport($query);
    }

}
