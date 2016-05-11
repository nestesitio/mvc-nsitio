<?php

namespace apps\User\control;

use \lib\register\Vars;

use \model\models\UserBase;
use \model\models\UserInfo;
use \model\querys\UserBaseQuery;
use \model\querys\UserInfoQuery;
use \model\forms\UserBaseForm;

use \lib\session\SessionUser;
use \lib\guard\Guard;

/**
 * Description of ProfileActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class ProfileActions extends \lib\control\ControllerAdmin {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\UserBaseQuery;
    */
    private function getPlayer(){
        return SessionUser::getPlayerId();
    }

    /**
     * @return UserInfoQuery
     */
    private function getQuery(){
        return UserBaseQuery::start()
                ->filterById($this->getPlayer())
                ->joinUserInfo()
                ->selectAddress()->selectZip()->selectLocal()
                ->selectTlf()->selectTlm()
                ->endUse();
    }

    /**
     * @return UserInfoQuery
     */
    private function getInfoQuery(){
        return UserInfoQuery::start()->filterByUserId($this->getPlayer());
    }

    /**
     *
     */
    public function profileAction(){
        $this->set('h1', Vars::getHeading());
        $this->set('nav_home','/');
        $this->setView('profile');
        $this->showProfileAction();
    }


    /**
     *
     */
    public function editProfileAction() {
        $user = $this->getQuery()->filterById($this->getPlayer())->findOne();
        $form = UserBaseForm::initialize()->setQueryValues($user);
        #more code about $form, $query, defaults and inputs    
        $this->renderForm($form, 'profile');
    }


    /**
     *
     */
    public function bindProfileAction() {
        $form = UserBaseForm::initialize()->validate();
        #more code for processing - example
        #$model = $form->getModels('table')->setColumnValue('field','value');
        #$form->setModel('table', $model);
        $model = $this->buildProcess($form, 'profile');
        if($model !== false){
            #$result is a model
            if($model->getAction() == UserBase::ACTION_INSERT){
                #operations after inserted
                
            }elseif($model->getAction() == UserBase::ACTION_UPDATE){
                 #operations after updated
                
            }
            
            $this->showProfileAction();
        }
    }

    /**
     *
     */
    public function showProfileAction(){
        $model = $this->getQuery()->findOne();
        if ($model != false) {
            $this->set('data-id', $model->getId());
            $this->set('name', $model->getName());
            $this->set('mail', $model->getMail());
            $this->set('tlf', $model->getColumnValue(UserInfo::FIELD_TLF));
            $this->set('tlm', $model->getColumnValue(UserInfo::FIELD_TLM));
            $this->set('address', $model->getColumnValue(UserInfo::FIELD_ADDRESS));
            $this->set('zip', $model->getColumnValue(UserInfo::FIELD_ZIP));
            $this->set('local', $model->getColumnValue(UserInfo::FIELD_LOCAL));
        }else{
            \lib\url\Redirect::redirectToUrl('/user/login');
            return;
        }
    }

    /**
     *
     */
    public function nameProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getQuery()->findOne();
        $model->setName($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function mailProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getQuery()->findOne();
        $model->setMail($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function tlmProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getInfoQuery()->findOne();
        $model->setTlm($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function tlfProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getInfoQuery()->findOne();
        $model->setTlf($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function addressProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getInfoQuery()->findOne();
        $model->setAddress($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function zipProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getInfoQuery()->findOne();
        $model->setZip($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function localProfileAction(){
        $value = $this->getJEditableValue();
        $model = $this->getInfoQuery()->findOne();
        $model->setLocal($value);
        $model->save();
        echo $value;
    }

    /**
     *
     */
    public function passwordProfileAction(){
        $this->setView('password');
    }

    /**
     *
     */
    public function changeProfileAction(){
        $this->setEmptyView();
        $pass1 = Vars::getPosts('pass1');
        $pass2 = Vars::getPosts('pass2');
        if($pass1 == $pass2){
            $user = $this->getQuery()->findOne();
            $user->setPassword($pass2);
            $user->save();
            Guard::setKeys($user);
            echo "<h3>Password alterada com sucesso!</h3>";
        }else{
            echo "<h3>Alteração falhada!</h3>";
        }
    }

}
