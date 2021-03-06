<?php

namespace apps\User\control;

use \lib\session\SessionUser;
use \lib\loader\Configurator;
use \model\querys\UserBaseQuery;
use \lib\url\Redirect;
use \lib\session\Session;
use \lib\register\Vars;
use \lib\mysql\Mysql;

/**
 * Description of UserActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 18, 2015
 */
class UserActions extends \lib\control\Controller {


    /**
     *
     */
    public function logoutUserAction(){
        SessionUser::unsetUser();
        header('Location:' . Configurator::getUrlLogoutExit());
    }

    /**
     *
     */
    public function resetUserAction(){
        if (SessionUser::getPlayer() != SessionUser::getUserId()) {
            $user = UserBaseQuery::start()->joinUserGroup()->selectName()->endUse()->filterById(SessionUser::getUserId())->findOne();
            SessionUser::registPlayer($user);
        }
        Redirect::redirectByRoute(Session::getPageReturn());
    }

    /**
     *
     */
    public function usernameUserAction(){
        $this->setEmptyView();
        $user = UserBaseQuery::start()
                ->filterById(Vars::getId(), Mysql::NOT_EQUAL) 
                ->filterByUsername(Vars::getRequests('value'))->findOne();
        if($user == false){
            echo 0;
        }else{
            echo 1;
        }
        
    }
    
    

}
