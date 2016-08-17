<?php

namespace lib\routing;

use \lib\page\HtmPageQueries;
use \lib\register\Vars;
use \lib\session\Session;
use \lib\register\Monitor;



/**
 * Description of DBRouting
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 3, 2016
 */
class DBRouting
{
    /**
     *
     * @param array $params
     * @return boolean
     */
    public static function check($params)
    {
        $page = HtmPageQueries::getPageRoute($params['appslug'] ,$params['canonical']);
        if($page == false){
            $page = HtmPageQueries::getPageExists($params['appslug'] ,$params['canonical']);
            if($page == false){
                $page = false;
            }else{
                \lib\session\SessionUser::warningUser('You don\'t have access to the page<br />' . Vars::getRoute() . '.<br />Please login');
                Monitor::setErrorMessages(null, ['message' => 'You don\'t have access to this page, please login']);
                if (Vars::getRequests('js') == false) {
                    Session::setPageReturn(Vars::getRoute());
                    \lib\url\Redirect::redirectToUrl('/user/login');
                }else{
                    echo 'ERROR-PAGE-REDIRECT:/user/login';
                    die();
                }

                return false;
            }
        }else{
            Vars::setTitle($page->getTitle());
            Vars::setHeadin($page->getHeading());
            Vars::setPage($page->getHtmId());

            self::$controller = Vars::getApp() . '/' . Vars::getAction();

            return true;
        }
        return false;

    }

    private static $controller = null;

    public static function getApp()
    {
        return self::$controller;
    }

    private function __construct() {}


}
