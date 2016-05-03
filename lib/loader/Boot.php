<?php

namespace lib\loader;

use \lib\register\Registry;
use \lib\routing\ParseRoute;
use \lib\session\Session;
use \lib\register\VarsRegister;
use \lib\routing\XmlRouting;
use \lib\routing\DBRouting;
use \lib\routing\Router;


/**
 * Description of MvcBoot
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 27, 2016
 */
class Boot {

    /**
     * Start some static core classes
     */
    public static function run()
    {
        self::start();
        /*
         * The routing url, we need to use original 'QUERY_STRING' 
         * from server parameter because php has parsed the url if we use $_GET
         */
        $url = \lib\url\UrlRegister::getUrlRequest();
        VarsRegister::setRoute($url);

        //parse the url
        $parse = new ParseRoute($url);
        $querystring = $parse->getQueryString();
        $params = $parse->getRoutePortions();
        //regist vars GET and POST
        self::registParams($params);
        self::registVars($querystring);
        
        //set the action for the page
        $controller = false;
        $route = self::checkRoute($params);
        
        if($route != false){
            $controller = self::fireController($params, $route);
            $controller = self::fireView($controller);
        }
        
        
        if ($controller != false) {
            self::output($controller);
        }else{
            echo \lib\routing\ErrorPage::execute(0, true);
        }


        Session::close();
        
        
    }

    private static function start()
    {
        // initiate configs
        new \lib\loader\Configurator;
        //initiate pdo
        \lib\db\PdoMysql::getConn();
        /*
         * start session and
         * check if user is registered and what user group is
         */
        new Session();
    }
    
    /**
     * Regist all the varables from POST and GET
     * @param array $params
     */
    private static function registParams($params)
    {
         //regist all post variables
        VarsRegister::registPosts();
        VarsRegister::registRequests();
        $canonical = (isset($params['canonical']))? $params['canonical'] : 'index';
        VarsRegister::setApp($params['appslug']);
        VarsRegister::setCanonical($canonical);
        VarsRegister::setAction($params['action']);
        VarsRegister::setId($params['id']);
    }
    
    /** process url query string after ?, but ? was allready deleted by htaccess 
     * @param string $querystring
     */
    private static function registVars($querystring)
    {
        $params = explode('&', substr($querystring, 1));
        if (count($params) > 1) {
            foreach ($params as $param) {
                list($key, $value) = explode('=', $param);
                VarsRegister::setVars($key, $value);
            }
        }
    }
    
    private static function checkRoute($params){
        $route = null;
        if(XmlRouting::check($params) == true){
            $route = XmlRouting::getApp();
        }elseif(DBRouting::check($params) == true){
            $route = DBRouting::getApp();
        }
        
        if($route == null){
            Registry::setErrorMessages(null, ['message'=>'No page found for url ' . VarsRegister::getRoute()]);
            return false;
        }
        
        return $route;
        
    }
    
    private static function fireController($params, $route){
        
        $class = Router::getClass($route);
        if($class == false){
            Registry::setErrorMessages(null, ['message'=>'No class found for url ' . VarsRegister::getRoute()]);
            return FALSE;
        }
        $controller = new $class();
        
        $action = Router::getAction($class, $params);
        
        if($action == false){
            Registry::setErrorMessages(null, ['message'=>'No method found for url ' . VarsRegister::getRoute()]);
            return false;
        }
        
        $controller->$action();
        
        
        return $controller;
        
        
    }
    
    /**
     * 
     * @param object $controller
     * @return boolean|object
     */
    private static function fireView(\lib\control\Controller $controller) 
    {
        if ($controller != false) {
            //prepare View
            //if action defines view ($this->setView())
            $template = $controller->getTemplate();

            if (null == $template && $controller->layout == true) {
                $view_file = VarsRegister::getAction();
                $template = 'apps' . DS . Router::getFolder() . DS . 'view' . DS . $view_file;
                //else here we define view
                $result = $controller->setView($template);
                if ($result == false) {
                    return false;
                }
            }
            VarsRegister::setView($template);

            return $controller;
        }
        return false;
    }
    
    
    private static function output($controller) {
        $extend = Router::aboutExtended($controller);
        //output
        $output = $controller->dispatch();
        if ($controller->messages == false) {
            echo $output;
        } elseif ($controller->layout == false) {
            exit;
        } elseif (empty($output)) {
            echo self::displayError();
        } elseif ($controller->messages == true) {
            echo \lib\control\ControlMessages::write($output, $extend);
        }
    }
    
    private static function displayError()
    {
        $errors = Registry::getErrorMessages();
        echo 'EMPTY FILE - '.count($errors).' Errors<hr />';
        foreach ($errors as $error) {
            echo '<br />' . $error;
        }
        $msgs = Registry::getMonitor();
        foreach ($msgs as $msg) {
            echo $msg->write();
        }
    }
    

}
