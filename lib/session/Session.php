<?php

namespace lib\session;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\session\SessionUser;
use \lib\register\VarsRegister;

/**
 * Description of Session
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 14, 2014
 */
class Session {

    private static $id;
    
    private static $session = [];
    
    private static $sessionFilters = [];
    
    private static $sessionShop = [];
    
    private static $sessionConf = [];
    
    const SESS_USER = 'user';
    const SESS_PLAYER = 'player';
    const SESS_FILTER = 'filters';
    const SESS_SHOP = 'shop';
    const SESS_PAGE = 'page';
    const SESS_PAGERETURN = 'return';
    const SESS_CONFIG = 'config';
    
    

    public function __construct() {
        //var_dump(session_id());
        if (session_id() === '') {
            session_start();
            self::$id = session_id();
            $this->registSessionVars();
            $this->registIp();
            \lib\guard\Guard::generateSessToken();
            #session_unset ();
        }
    }
    
    /* regist specific session vars */
    private function registSessionVars() {
        SessionUser::registSessionUser();
        $this->registSessionFilters();
        $this->registSessionShop();
        $this->registSessionConfig();
    }
    
    public static function getSessionVar($key) {
        if (isset($_SESSION[$key])) {
            if(!isset(self::$session[$key])){
                self::setSession($key, $_SESSION[$key]);
            }
            return $_SESSION[$key];
        }
        return false;
    }
    
    /* regist and refresh session vars */
    public static function setSession($key, $value){
        if(is_array($value)){
            foreach($value as $k => $val){
                self::$session[$key][$k] = $val;
                $_SESSION[$key][$k] = $val;
            }
        }else{
            self::$session[$key] = $value;
            $_SESSION[$key] = $value;
        }
    }
    

    public static function unsetSession($key){
        if (isset(self::$session[$key])) {
            unset(self::$session[$key]);
        }
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }  
    }
    

    
    /* $_SESSION['FILTERS']*/
    private function registSessionFilters() {
        $filters = self::getSessionVar(self::SESS_FILTER);
        if ($filters != false) {
            foreach ($filters as $app => $session) {
                foreach ($session as $type => $values) {
                    self::$sessionFilters[$app][$type] = $values;
                }
            }
            self::setSession(self::SESS_FILTER, $filters);
        }
    }
    
    public static function removeSessionFilter($app, $type){
        if(isset($_SESSION[self::SESS_FILTER][$app][$type])){
            unset($_SESSION[self::SESS_FILTER][$app][$type]);
        }
        
    }
    
    public static function unsetFilter($app, $type, $field = null){
        if($field == null){
            if (isset(self::$sessionFilters[$app][$type])) {
                unset(self::$sessionFilters[$app][$type]);
                unset($_SESSION[self::SESS_FILTER][$app][$type]);
            }
        } else {
            if (isset(self::$sessionFilters[$app][$type][$field])) {
                unset(self::$sessionFilters[$app][$type][$field]);
                unset($_SESSION[self::SESS_FILTER][$app][$type][$field]);
            }
        }
    }

    public static function setSessionFilter($app, $type, $value, $field = null){
        if($field == null){
            $_SESSION[self::SESS_FILTER][$app][$type] = $value;
            self::$sessionFilters[$app][$type] = $value;
            Registry::setMonitor(Monitor::SESSION, self::SESS_FILTER . ': ' . $app . ' - ' . $type . ': ' . $value);
        }else{
            $_SESSION[self::SESS_FILTER][$app][$type][$field] = $value;
            self::$sessionFilters[$app][$type][$field] = $value;
            Registry::setMonitor(Monitor::SESSION, self::SESS_FILTER . ': ' . $app . ' - ' . $type . ': ' . $field . ' = ' . $value);
        }
    }

    public static function getSessionFilter($app, $type){
        if(isset(self::$sessionFilters[$app][$type])){
            return self::$sessionFilters[$app][$type];
        }
        return false;
    }
    
    
    /* $_SESSION['page'] 
     * allows user to return to the same page after 
     * some interaction like logout / login
     */
    public static function setSessionPage($page) {
        self::setSession(self::SESS_PAGE, $page);
    }
    
    public static function getSessionPage() {
        return self::getSessionVar(self::SESS_PAGE);
    }
    
    public static function setPageReturn($page) {
        self::setSession(self::SESS_PAGERETURN, $page);
    }
    
    public static function getPageReturn() {
        return self::getSessionVar(self::SESS_PAGERETURN);
    }
    
    
    /* $_SESSION['SHOP']
     * E-Commerce tool
     */
    private function registSessionShop() {
        $session = self::getSessionVar(self::SESS_SHOP);
        if ($session != false) {
            foreach ($session as $key => $value) {
                self::$sessionShop[$key] = $value;
            }
            self::setSession(self::SESS_SHOP, $session);
        }
    }
    
    /* $_SESSION['CONFIG']
     * Configs
     */
    private function registSessionConfig() {
        $session = self::getSessionVar(self::SESS_CONFIG);
        if ($session != false) {
            foreach ($session as $key => $value) {
                self::$sessionConf[$key] = $value;
            }
            self::setSession(self::SESS_CONFIG, $session);
        }
    }
    
    private function registIp(){
        $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
        $ip = filter_var($ip, FILTER_VALIDATE_IP);
        VarsRegister::setIp($ip);

    }
    
    
    public static function close(){
        session_write_close();
    }
    
    private function __clone() {}
    
    

}
