<?php

namespace lib\filter;

use \lib\register\VarsRegister;
use \lib\session\Session;
use \lib\register\Registry;
use \lib\register\Monitor;

use \lib\mysql\Mysql;
use \lib\bkegenerator\Config;
use \lib\form\PostTool;

/**
 * Description of SessionFilter
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 31, 2015
 */
class SessionFilter {

    private static $pagings = [];
    private static $sorts = [];
    private static $filters = [];
    private static $columns = [];
    

    public static function getFilters($app, Config $config){
        self::$columns = $config->getIndexes();
        $posts = PostTool::getFilterFields(self::$columns, $config->getIdentification() . '_filter');
        $filters = Session::getSessionFilter($app, 'filter');
        foreach(array_keys(self::$columns) as $field){
            $config->setIndex($field);
            if(isset($posts[$field])){
                
                if($posts[$field] === '0' || !empty($posts[$field])){
                    Session::setSessionFilter($app, 'filter', $posts[$field], $field);
                    self::$filters[$app][$field] = $posts[$field];
                }else{
                    Session::unsetFilter($app, 'filter', $field);
                }
            }elseif(isset($filters[$field])){
                self::$filters[$app][$field] = $filters[$field];
                Registry::setMonitor(Monitor::SESSION, ' Filters:[' . $app . ']' . $field . '=' . $filters[$field]);
            }elseif($config->getConfigValue('default') != null){
                self::$filters[$app][$field] = $config->getConfigValue('default');
            }
        }
        return (isset(self::$filters[$app]))? self::$filters[$app] : [];
    }
    
    
    public static function getFilter($app, $field){
        if(isset(self::$filters[$app][$field])){
            return self::$filters[$app][$field];
        }
        return false;
    }
    

    public static function getSorts($app){
        $getfield = VarsRegister::getRequests('sort');
        $filters = Session::getSessionFilter($app, 'sort');
        $i = 0;
                
        if($getfield != false){
            $value = Mysql::ASC;
            if(isset($filters[$getfield])){
                $prevalue = $filters[$getfield];
                $value = ($prevalue == Mysql::ASC)? Mysql::DESC : Mysql::ASC;
            }
            self::$sorts[$app][$getfield] = $value;
            $i++;
        }
        if ($filters != false) {
            foreach ($filters as $field => $value) {
                if($field != $getfield && $i++ < 3){
                    self::$sorts[$app][$field] = $value;
                }
            }
        }
        return self::getControllerSort($app);
    }
    
    private static function getControllerSort($app){
        if(isset(self::$sorts[$app])){
            Session::removeSessionFilter($app, 'sort');
            foreach(self::$sorts[$app] as $field => $value){
                Session::setSessionFilter($app, 'sort', $value, $field);
                //echo $app.'+' . $field . '=' . $value . '; ';
            }
            return self::$sorts[$app];
        }else{
            return [];
        }
    }

    public static function setControllerLimit($app, $paging){
        self::$pagings[$app]['limit'] = $paging;
    }
    
    public static function getControllerLimit($app){
        return (isset(self::$pagings[$app]['limit']))? self::$pagings[$app]['limit'] : null;
    }
    
    public static function getControllerPaging($app){
        if (!isset(self::$pagings[$app]['paging'])) {
            $value = VarsRegister::getRequests('paging');
            if ($value == false) {
                $value = Session::getSessionFilter($app, 'paging');
                if ($value == false) {
                    $value = 1;
                }
            }
            Session::setSessionFilter($app, 'paging', $value);
            self::$pagings[$app]['paging'] = $value;
        } else {
            $value = self::$pagings[$app]['paging'];
        }
        
        return $value;

    }
    

}
