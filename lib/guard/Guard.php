<?php

namespace lib\guard;

use \model\querys\UserBaseQuery;
use \model\models\UserBase;
use \model\forms\UserBaseForm;
use \lib\register\VarsRegister;
use \lib\session\SessionUser;
use \lib\session\Session;

/**
 * Description of Guard
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 27, 2015
 */
class Guard {

    private function __construct() {}
    
    private static $hash;
    
    public static function hashIt($string, $salt){
        self::$hash = sha1($salt.$string);
    }
    
    public static function validate($key){
        if($key == self::$hash){
            return true;
        }
        return false;
    }
    
    public static function validateLogin(){
        $user = UserBaseQuery::start()
                ->filterByUsername(VarsRegister::getPosts('email'))
                ->findOne();
        if($user != false){
            self::hashIt(VarsRegister::getPosts('password'), $user->getSalt());
            if(self::validate($user->getUserkey()) == true){
                SessionUser::setUserVarsSession($user, Session::SESS_USER);
                SessionUser::registPlayer($user);
                return true;
            }
        }
        return false;
    }
    
    public static function setKeys(UserBase $user){
        $user->setSalt(sha1($user->getPassword()));
        $user->setUserkey(sha1($user->getSalt().$user->getPassword()));
        $user->save();
    }
    
    public static function prepareForm(UserBaseForm $form){
        $form->unsetSaltInput();
        $form->unsetUserkeyInput();
        return $form;
    }
    
    const SESS_TOKEN = 'q48pkl';
    
    public static function generateSessToken(){
        if(Session::getSessionVar(self::SESS_TOKEN) != null){
            // to be compared with post
            VarsRegister::setVars(self::SESS_TOKEN, Session::getSessionVar(self::SESS_TOKEN));
        }
        $token = md5(VarsRegister::getIp() . (string) time());
        // used in form
        Session::setSession(self::SESS_TOKEN, $token);
        
    }
    
    

}
