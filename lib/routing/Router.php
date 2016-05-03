<?php

namespace lib\routing;

use \lib\register\VarsRegister;
use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\session\Session;

/**
 * Description of Router
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Apr 27, 2016
 */
class Router {
    
    private function __construct() {}
    
    private static $folder;
    
    /**
     * 
     * @param string $controller
     * 
     * @return boolean | string
     */
    public static function getClass($controller)
    {
        
        list($app, $control) = explode('/', $controller);
        VarsRegister::setApp($app);
        
        self::$folder = ucfirst($app);
        $namespace = '\apps\\' . self::$folder . '\\';
        
        // assign controller full name
        $class = self::getControlClass($app, $control, $namespace);
        // if we have extended controller
        if (!class_exists($class)) {
            return false;
        }
        return $class;
    }
    
    /**
     * 
     * @param string $app
     * @param string $control
     * @param string $namespace
     * 
     * @return string
     */
    private static function getControlClass($app, $control, $namespace)
    {
        $actions_class = $control;
        if(strpos($actions_class, '_')){
            $actions_class = substr(strrchr($actions_class, '_'), 1 );
        }elseif($actions_class == 'default'){
            $actions_class = $app;
        }
        $class = $namespace . 'control\\' . ucfirst($actions_class) . 'Actions';
        $class = str_replace('ActionsActions', 'Actions', $class);
        return $class;
    }
    
    
    /**
     * @param $class
     * @return bool|string
     */
    public static function getAction($class, $params = [])
    {
        // prepare Action
        $str = 'x' . str_replace('_', ' ', $params['action']);
        $action = str_replace(' ', '', substr(ucwords($str), 1));
        VarsRegister::setAction($action);


        $hasActionFunction = (int) method_exists($class, $action . 'Action');
        if ($hasActionFunction == 0) {
            return false;
        } 
            
        $method = $action . 'Action';
        
        Registry::setMonitor(Monitor::ACTION, $method);
        return $method;
    }
    
    public static function getFolder(){
        return self::$folder;
    }
    
    /**
     * @param object $controller
     * @return bool
     */
    public static function aboutExtended($controller, $page = '0')
    {
        $extend = $controller->getExtended();
        if(!empty($extend)){
            Registry::setMonitor(Monitor::TPL, $extend);
            /* if is not a ajax call,
             * update SessionPage
             * else
             * this var is already refreshed
             */
            Session::setSessionPage($page);
            Registry::setMonitor(Monitor::PAGID, $page);
            return true;
        }else{
            return false;
        }
    }
    

}
