<?php
namespace lib\register;

use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of VarsRegister
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 5, 2014
 */
class VarsRegister {

    private static $vars = [];
    private static $requests = [];
    private static $posts = [];
    
    private static $app = '';
    private static $action = '';
    private static $canonical = '';
    private static $id = false;
    private static $slugvar = false;
    private static $title;
    private static $heading;
    

    private function __construct() {}

    public static function setVars($key, $value) {
        self::$vars [$key] = $value;
    }

    public static function getVars($key) {
        return (isset(self::$vars [$key])) ? self::$objects [$key] : false;
    }

    public static function setRequests($key, $value) {
        self::$requests [$key] = $value;
    }
    
    public static function registPosts() {
        $inputs = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        Registry::setMonitor(Monitor::FORM, 'POST inputs: ' . count($inputs));
        if (!empty($inputs)) {
            foreach ($inputs as $key => $value) {
                self::$posts [$key] = $value;
                Registry::setMonitor(Monitor::FORM, 'POST value: ' . $key . '=' . $value);
            }
        }
        if(isset($inputs['token'])){
            self::parseToken($inputs['token']);
        }
    }
    
    public static function registRequests() {
        $inputs = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        Registry::setMonitor(Monitor::FORM, 'GET inputs: ' . count($inputs));
        if (!empty($inputs)) {
            foreach ($inputs as $key => $value) {
                self::$requests [$key] = $value;
                Registry::setMonitor(Monitor::FORM, 'GET value: ' . $key . '=' . self::$requests [$key]);
            }
        }
        if(isset($inputs['token'])){
            self::parseToken($inputs['token']);
        }
        if(isset($inputs['voken'])){
            self::parseTokenToPost($inputs['voken']);
        }

    }

    public static function parseToken($token){
        $vars = \lib\url\UrlRegister::decUrl($token);
        foreach($vars as $key=>$value){
            self::$vars [$key] = $value;
        }
    }
    
    public static function parseTokenToPost($token){
        $vars = \lib\url\UrlRegister::decUrl($token);
        foreach($vars as $key=>$value){
            self::$posts [$key] = $value;
            Registry::setMonitor(Monitor::FORM, 'POST value: ' . $key . '=' . $value);
        }
    }

    public static function getRequests($key = null) {
        if($key == null){
            return self::$requests;
        }
        return (isset(self::$requests [$key])) ? self::$requests [$key] : false;
    }
   
    
    public static function getPosts($key = null) {
        if($key == null){
            return self::$posts;
        }
        return (isset(self::$posts [$key])) ? self::$posts [$key] : false;
    }
    
    
    public static function setApp($app){
        self::$app = $app;
    }
    
    public static function getApp(){
        return self::$app;
    }
    
    public static function setAction($a){
        self::$action = $a;
    }
    
    public static function getAction(){
        return self::$action;
    }
    
    public static function getCanonical(){
        return self::$canonical;
    }
    
    public static function setCanonical($a){
        self::$canonical = $a;
    }
    
    public static function setId($id){
        self::$id = $id;
    }
    
    public static function getId(){
        return self::$id;
    }
    
    
    public static function setSlugVar($var){
        self::$slugvar = $var;
    }
    
    public static function getSlugVar(){
        return self::$slugvar;
    }
    
    
    public static function setTitle($value){
        self::$title = $value;
    }
    
    public static function getTitle(){
        return self::$title;
    }
    
    
    public static function setHeadin($value){
        self::$heading = $value;
    }
    
    public static function getHeading(){
        return self::$heading;
    }
    
    private static $ip;
    
    public static function setIp($ip) {
        self::$ip = $ip;
    }
    
    public static function getIp(){
        return self::$ip;
    }

}
