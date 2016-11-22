<?php

namespace lib\loader;

use \lib\routing\ParseRoute;
use \lib\register\Vars;
use \lib\routing\XmlRouting;
use \lib\routing\Router;
use \lib\register\Monitor;

/**
 * Description of WPBoot
 * Boot MVC to work with wordpress
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 18, 2016
 */
class BootInFolder {
    
    private static $folder;

    public static function run($folder, $level)
    {
        self::$folder = $folder;
        /*
         * The routing url, we need to use original 'QUERY_STRING'
         * from server parameter because php has parsed the url if we use $_GET
         */
        $url = \lib\url\UrlRegister::getUrlRequest();
        
        Vars::setRoute($url);

        //parse the url and get $params
        $querystring = self::parseUrl($url);
        
        //regist vars GET and POST
        self::registParams(self::$params);
        self::registVars($querystring);
        

        //set the action for the page
        $controller = false;
        $route = self::checkRoute(self::$params, $level);
        
        
        if($route != false){
            $controller = self::fireController(self::$params, $route);
            $controller = self::fireView($controller);
        }
        
        self::output($controller);


    }
    
    
    /**
     *
     * @var array
     */
    private static $params = [];
    
    /**
     * Parse the url and regist GET and POST variables
     * 
     * @param string $url
     * @return string
     */
    private static function parseUrl($url){
        
        //parse the url
        $parse = new ParseRoute($url);
        $querystring = $parse->getQueryString();
        self::$params = $parse->getRoutePortions();
        Vars::setVars('params', self::$params);
        
        
        return $querystring;
        
    }

    /**
     * Regist all the varables from POST and GET
     * @param array $params
     */
    private static function registParams($params)
    {
         //regist all post variables
        Vars::registPosts();
        Vars::registRequests();
        $canonical = (isset($params[ParseRoute::PART_CANONICAL]))? $params[ParseRoute::PART_CANONICAL] : 'index';
        Vars::setApp($params[ParseRoute::PART_APPSLUG]);
        Vars::setCanonical($canonical);
        Vars::setAction($params[ParseRoute::PART_ACTION]);
        Vars::setId($params[ParseRoute::PART_ID]);
        Vars::setLang($params[ParseRoute::PART_LANG]);
        Vars::setSlugVar($params[ParseRoute::PART_VAR]);
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
                Vars::setVars($key, $value);
            }
        }
    }

    private static function checkRoute($params, $level)
    {
        $route = null;
        
        if(XmlRouting::checkInFolder($params, $level, 'routing.xml') == true){
            $route = XmlRouting::getApp();
        }

        if($route == null){
            \lib\url\Redirect::redirectToUrl('/' . self::$folder);
        }
        
        return $route;

    }

    private static function fireController($params, $route)
    {
        
        $class = Router::getClass($route);
        if($class == false){
            die('Class <b>' . Vars::getApp() . '</b> not found for ' . $route);
            Monitor::setMonitor(Monitor::CONTROL, 'There is no class name ' . $class);
            Monitor::setErrorMessages(null, ['message'=>'No class found for url ' . Vars::getRoute()]);
            return FALSE;
        }
        $controller = new $class();

        $action = Router::getMethod($class, $params);

        if($action == false){
            die('Method <b>' . Vars::getAction() . '</b> not found for ' . $route);
            Monitor::setMonitor(Monitor::ACTION, 'There is no action name for ' . $action);
            Monitor::setErrorMessages(null, ['message'=>'No method found for url ' . Vars::getRoute()]);
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
    private static function fireView($controller)
    {
        if ($controller != false) {
            //prepare View
            //if action defines view ($this->setView())
            $template = $controller->getTemplate();

            if (null == $template && $controller->layout == true) {
                $view_file = Vars::getAction();
                $template = 'apps' . DS . Router::getFolder() . DS . 'view' . DS . $view_file;
                //else here we define view
                $result = $controller->setView($template);
                if ($result == false) {
                    return false;
                }
            }
            Vars::setView($template);

            return $controller;
        }
        return false;
    }


    /**
     * 
     * @param object $controller
     */
    private static function output($controller)
    {
        if ($controller != false) {
            
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
            
        } else {
            echo \lib\routing\ErrorPage::execute(true);
        }
    }

    private static function displayError()
    {
        $errors = Monitor::getErrorMessages();
        echo 'EMPTY FILE - '.count($errors).' Errors<hr />';
        foreach ($errors as $error) {
            echo '<br />' . $error;
        }
        $msgs = Monitor::getMonitor();
        foreach ($msgs as $msg) {
            echo $msg->write();
        }
    }
    
    public static function embed($control, $action_name, $view = null){
        
        $class = Router::getEmbed($control);
        if($class == false){
            Monitor::setErrorMessages(null, ['message'=>'No class found for url ' . $control]);
            return FALSE;
        }
        
        $controller = new $class();

        $action = Router::getEmbedAction($class, $action_name);

        if($action == false){
            Monitor::setErrorMessages(null, ['message'=>'No method found as ' . $action_name]);
            return false;
        }
        
        if (null != $view) {
            $controller->setView($view);
        }

        return $controller->$action();
 
    }

}
