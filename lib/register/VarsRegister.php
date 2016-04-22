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
class VarsRegister
{
    /**
     * @var array
     */
    private static $vars = [];
    /**
     * @var array
     */
    private static $requests = [];
    /**
     * @var array
     */
    private static $posts = [];

    /**
     * @var string
     */
    private static $app = '';
    /**
     * @var string
     */
    private static $action = '';
    /**
     * @var string
     */
    private static $canonical = '';
    /**
     * @var bool
     */
    private static $id = false;
    /**
     * @var bool
     */
    private static $slugvar = false;
    /**
     * @var
     */
    private static $title;
    /**
     * @var
     */
    private static $heading;


    /**
     * VarsRegister constructor.
     */
    private function __construct() {}

    /**
     * @param $key
     * @param $value
     */
    public static function setVars($key, $value)
    {
        self::$vars [$key] = $value;
    }

    /**
     * @param $key
     * @return bool
     */
    public static function getVars($key)
    {
        return (isset(self::$vars [$key])) ? self::$objects [$key] : false;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setRequests($key, $value)
    {
        self::$requests [$key] = $value;
    }

    /**
     *
     */
    public static function registPosts()
    {
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

    /**
     *
     */
    public static function registRequests()
    {
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

    /**
     * @param $token
     */
    public static function parseToken($token)
    {
        $vars = \lib\url\UrlRegister::decUrl($token);
        foreach($vars as $key=>$value){
            self::$vars [$key] = $value;
        }
    }

    /**
     * @param $token
     */
    public static function parseTokenToPost($token)
    {
        $vars = \lib\url\UrlRegister::decUrl($token);
        foreach($vars as $key=>$value){
            self::$posts [$key] = $value;
            Registry::setMonitor(Monitor::FORM, 'POST value: ' . $key . '=' . $value);
        }
    }

    /**
     * @param $key
     * @return array|bool|mixed
     */
    public static function getRequests($key = null)
    {
        if($key == null){
            return self::$requests;
        }
        return (isset(self::$requests [$key])) ? self::$requests [$key] : false;
    }


    /**
     * @param $key
     * @return array|bool|mixed
     */
    public static function getPosts($key = null)
    {
        if($key == null){
            return self::$posts;
        }
        return (isset(self::$posts [$key])) ? self::$posts [$key] : false;
    }


    /**
     * @param $app
     */
    public static function setApp($app)
    {
        self::$app = $app;
    }

    /**
     * @return string
     */
    public static function getApp()
    {
        return self::$app;
    }

    /**
     * @param $a
     */
    public static function setAction($a)
    {
        self::$action = $a;
    }

    /**
     * @return string
     */
    public static function getAction()
    {
        return self::$action;
    }

    /**
     * @return string
     */
    public static function getCanonical()
    {
        return self::$canonical;
    }

    /**
     * @param $a
     */
    public static function setCanonical($a)
    {
        self::$canonical = $a;
    }

    /**
     * @param $id
     */
    public static function setId($id)
    {
        self::$id = $id;
    }

    /**
     * @return bool
     */
    public static function getId()
    {
        return self::$id;
    }


    /**
     * @param $var
     */
    public static function setSlugVar($var)
    {
        self::$slugvar = $var;
    }

    /**
     * @return bool
     */
    public static function getSlugVar()
    {
        return self::$slugvar;
    }


    /**
     * @param $value
     */
    public static function setTitle($value)
    {
        self::$title = $value;
    }

    /**
     * @return mixed
     */
    public static function getTitle()
    {
        return self::$title;
    }


    /**
     * @param $value
     */
    public static function setHeadin($value)
    {
        self::$heading = $value;
    }

    /**
     * @return mixed
     */
    public static function getHeading()
    {
        return self::$heading;
    }

    /**
     * @var
     */
    private static $ip;

    /**
     * @param $ip
     */
    public static function setIp($ip)
    {
        self::$ip = $ip;
    }

    /**
     * @return mixed
     */
    public static function getIp()
    {
        return self::$ip;
    }

}
