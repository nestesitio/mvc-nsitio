<?php

namespace apps\User\control;

use \lib\session\Session as Session;

use \lib\url\UrlHref as UrlHref;
use \lib\url\Redirect;
use \model\models\UserLog;
use \lib\guard\Guard;

/**
 * Description of LoginActions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class LoginActions extends \lib\control\ControllerAdmin {
    

    public function loginAction(){
        $this->getPageSession();
        $this->set('h1', 'Área reservada. Faça login p.f.');
        $this->set('h2', 'Ou inicie sessão com: ');
        $message = (Session::getSessionVar('error') == false)? '' : Session::getSessionVar('error');
        Session::unsetSession('error');
        $this->set('user_message', $message);
        $this->set('gOAuth-url', '/gsign.php');
        
    }
    

    public function validationLoginAction(){
        
        if(Guard::validateLogin() == true){
            \lib\session\SessionUserTools::logUser(UserLog::EVENT_LOGIN);
            Redirect::redirectByPageNumber(Session::getPageReturn());
        }else{
            Session::setSession('error', 'O login não é válido');
            header('Location:' . UrlHref::renderUrl(['app'=>'user','canonical'=>'login']));
        }
    }
    
    private function getPageSession() {
        $id = (Session::getSessionPage() == false)? 1 : Session::getSessionPage() ;
        Session::setSessionPage($id);
        return $id;
    }
    

}
