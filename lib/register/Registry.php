<?php
/**
 * Description of Registry 
 * created in 7/Nov/2014
 * @author $luispinto@nestesitio.net
 */
namespace lib\register;

use \lib\register\Monitor;
use \lib\session\SessionUser;
use \apps\User\model\UserGroupModel;
use \lib\loader\Configurator;

class Registry {
  
  private static $error_messages = [];
  private static $user_messages = [];
  private static $custom_messages = [];
  private static $dev_messages = [];
  private static $memory_ini = [];
  
  private static $key;



  private function __construct() {}
  private function __clone() {}
  
  public static function setMemoryInitial(){
      self::$memory_ini['mem'] = \lib\tools\MemoryTools::getMemory();
      self::$memory_ini['time'] = microtime(true);
  }
  
  public static function getMemoryInitial(){
      return self::$memory_ini;
  }

  

  public static function setErrorMessages($key, $value) {
        if (SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true) {
            if (null == $key) {
                $key = count(self::$error_messages);
            }
            self::$error_messages [$key] = $value;
        }
    }
  
  public static function getErrorMessages($key = null) {
        if (SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true) {
            if (null == $key) {
                return self::$error_messages;
            } else {
                return (isset(self::$error_messages [$key])) ? self::$error_messages [$key] : false;
            }
        }
    }
    
    public static function setMessage($value) {
        self::$user_messages = [];
        self::$user_messages [0]['msg'] = $value;
    }

    public static function setUserMessages($key, $value) {
        if (null == $key) {
            $key = count(self::$user_messages);
        }
        self::$user_messages [$key]['msg'] = $value;
    }

    public static function getUserMessages($key = null) {
    if (null == $key){
      return self::$user_messages;
    }else{
      return (isset(self::$user_messages [$key])) ? self::$user_messages [$key] : false;
    }
  }
  
  public static function setCustomMessages($key, $value) {
        if (null == $key) {
            $key = count(self::$custom_messages);
        }
        self::$custom_messages [$key]['msg'] = $value;
    }

  
  public static function getCustomMessages($key = null) {
    if (null == $key){
      return self::$custom_messages;
    }else{
      return (isset(self::$custom_messages [$key])) ? self::$custom_messages [$key] : false;
    }
  }
  
  public static function setMonitor($type, $value, $key = null) {
    if (null == $key){
      $key = count(self::$dev_messages);
    }
    self::$dev_messages [$key] = Monitor::create($type, $value);
  }
  
  public static function getMonitor($type = null) {
    if (null == $type){
      return self::$dev_messages;
    }else{
      return (isset(self::$dev_messages [$key])) ? self::$dev_messages [$key] : false;
    }
  }
  
  public static function setDataDevMessage($tag, $data){
      if(is_array($data)){
          Registry::setMonitor(Monitor::DATA, $tag . ' = Array (' . count($data) . ')');
      }else{
          Registry::setMonitor(Monitor::DATA, $tag . ' = '. gettype($data) .'(' . count($data) . ')');
      }
      
  }
  
  public function setToken() {
      self::$key = md5(uniqid(mt_rand($time), true));
  }
  
}

