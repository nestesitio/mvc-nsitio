<?php

namespace lib\routing;

use \apps\Core\model\PageQuery;
use \lib\register\VarsRegister;
use \lib\session\Session;
use \lib\register\Registry;

/**
 * Description of DBRouting
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 3, 2016
 */
class DBRouting {
    
    /**
     * 
     * @param array $params
     * @return boolean
     */
    public static function check($params){
        $page = PageQuery::getPageRoute($params['appslug'] ,$params['canonical']);
        if($page == false){
            $page = PageQuery::getPageExists($params['appslug'] ,$params['canonical']);
            if($page == false){
                $page = false;
            }else{
                Registry::setErrorMessages(null, ['message'=>'You don\'t have access to this page, please login']);
                Session::setPageReturn(VarsRegister::getRoute());
                \lib\session\SessionUser::warningUser('You don\'t have access to the page ' . VarsRegister::getRoute() . '.<br />Please login');
                \lib\url\Redirect::redirectToUrl('/user/login');
                //VarsRegister::setRedirect('/user/login');
                return false;
            }
        }else{
            VarsRegister::setTitle($page->getTitle());
            VarsRegister::setHeadin($page->getHeading());
            VarsRegister::setPage($page->getHtmId());
            
            self::$controller = VarsRegister::getApp() . '/' . VarsRegister::getAction();
            
            return true;
        }
        return false;
        
    }

    private static $controller = null;
    
    public static function getApp(){
        return self::$controller;
    }

    private function __construct() {}
    

}
