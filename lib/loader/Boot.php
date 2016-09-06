<?php

namespace lib\loader;


use \lib\routing\ParseRoute;
use \lib\session\Session;
use \lib\register\Vars;
use \lib\routing\XmlRouting;
use \lib\routing\DBRouting;
use \lib\routing\Router;
use \lib\register\Monitor;


/**
 * Description of MvcBoot
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 27, 2016
 */
class Boot
{
    /**
     * Start some static core classes
     */
    public static function run()
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
        /*
         * The routing url, we need to use original 'QUERY_STRING'
         * from server parameter because php has parsed the url if we use $_GET
         */
        $url = \lib\url\UrlRegister::getUrlRequest();
        Vars::setRoute($url);

        //parse the url
        $querystring = self::parseUrl($url);
        
        //regist vars GET and POST
        self::registParams(self::$params);
        self::registVars($querystring);
        
        \lib\lang\Language::setlang();

        //set the action for the page
        $controller = false;
        $route = self::checkRoute(self::$params);
        
        //open xml file for translations
        new \lib\lang\Labels();
       

        if($route != false){
            $controller = self::fireController(self::$params, $route);
            $controller = self::fireView($controller);
        }
        

        self::output($controller);

        Session::close();


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

    private static function checkRoute($params)
    {
        $route = null;
        if(XmlRouting::check($params) == true){
            $route = XmlRouting::getApp();
        }elseif(DBRouting::check($params) == true){
            $route = DBRouting::getApp();
            self::$params[ParseRoute::PART_ACTION] = Vars::getAction();
            
        }

        if($route == null){
            Monitor::setErrorMessages(null, ['message'=>'No page found for url ' . Vars::getRoute()]);
            return false;
        }

        return $route;

    }

    private static function fireController($params, $route)
    {
        $class = Router::getClass($route);
        if($class == false){
            Monitor::setMonitor(Monitor::CONTROL, 'There is no class name ' . $class);
            Monitor::setErrorMessages(null, ['message'=>'No class found for url ' . Vars::getRoute()]);
            return FALSE;
        }
        $controller = new $class();

        $action = Router::getAction($class, $params);

        if($action == false){
            Monitor::setMonitor(Monitor::ACTION, 'There is no action name ' . $action);
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
