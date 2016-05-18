<?php

namespace lib\routing;

use \lib\xml\XmlFile;
use \lib\session\SessionUser;
use \lib\url\Redirect;

/**
 * Description of XmlRouting
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 27, 2016
 */
class XmlRouting
{
    private static $controller = null;

    private function __construct() {}

    /**
     * Check if routing is provided by file config/routing.xml
     * @param array $params
     * @return boolean
     */
    public static function check($params)
    {
        $url = self::getRoute($params);
        $xml = XmlFile::getXmlSimpleFromFile('config/routing.xml');
        foreach ($xml->route as $route) {
            if ($route['url'] == $url) {
                self::$controller = $route->controller['class'];
                $controller_auth = $route->access['group'];
                if($controller_auth == 'all' || $controller_auth == SessionUser::getPlayerGroup()){
                    return true;
                }elseif(SessionUser::isValidGroup($controller_auth) == true){
                    return true;
                }elseif($route->access['redirect'] != null){
                    Redirect::redirectToUrl($route->access['redirect']);
                }
            }
        }

        return false;
    }

    public static function getApp()
    {
        return self::$controller;
    }

    /**
     *
     * @param array $params
     * @return string
     */
    private static function getRoute($params)
    {
        if($params['controller'] == 'index'){
            $url = $params['appslug'];
        }else{
            $url = $params['appslug'] . '/' . $params['controller'];
        }
        return $url;
    }

}
