<?php

namespace lib\loader;

use \lib\xml\XmlFile;

/**
 * Description of Configurator
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 25, 2014
 */
class Configurator
{
    /**
     * @var string
     */
    private $localhost = '127.0.1.1';
    /**
     * @var
     */
    private $host;
    /**
     * @var
     */
    private $xmlc;
    /**
     * @var array
     */
    private static $dbconf = [];
    /**
     * @var array
     */
    private static $googleconf = [];

    /**
     * @var bool
     */
    private static $developer_mode = false;
    /**
     * @var
     */
    private static $logout_exit;


    /**
     * Configurator constructor.
     */
    public function __construct()
    {
        $this->loadConf();

        self::$logout_exit = $this->xmlc->queryXPath('redir/noaccess', null, 'url');
        $mode = $this->xmlc->queryXPath('redir/noaccess', null, 'developer');
        if($mode == 'true'){
            self::$developer_mode = true;
        }

        $this->setDbConf();
        $this->setGoogleConf();

    }

    /**
     *
     */
    private function loadConf()
    {
        $this->xmlc = new XmlFile('config/config.xml');
        $this->host = gethostbyname(gethostname());

    }

    /**
     *
     */
    private function setDbConf()
    {
        $path = ($this->host == $this->localhost)? 'dbconn/dev' : 'dbconn/prod';
        self::$dbconf['db'] = $this->xmlc->queryXPath($path, null, 'db');
        self::$dbconf['user'] = $this->xmlc->queryXPath($path, null, 'user');
        self::$dbconf['password'] = $this->xmlc->queryXPath($path, null, 'password');
        $host = $this->xmlc->queryXPath($path, null, 'host');
        if(empty($host)){
            $host = 'localhost';
        }
        self::$dbconf['host'] = $host;
    }

    /**
     *
     */
    private function setGoogleConf()
    {
        $path = 'apis/google';
        self::$googleconf['appname'] = $this->xmlc->queryXPath($path, null, 'appname');
        self::$googleconf['appid'] = $this->xmlc->queryXPath($path, null, 'appid');
        self::$googleconf['key'] = $this->xmlc->queryXPath($path, null, 'key');
        self::$googleconf['redir'] = $this->xmlc->queryXPath($path, null, 'redir');

        self::$googleconf['devkey'] = $this->xmlc->queryXPath($path, null, 'devkey');
    }

    /**
     * @return array
     */
    public static function getDbConf()
    {
        return self::$dbconf;
    }

    /**
     * @return array
     */
    public static function getGoogleConf()
    {
        return self::$googleconf;
    }

    /**
     * @return bool
     */
    public static function getDeveloperMode()
    {
        return self::$developer_mode;
    }

    /**
     * @return mixed
     */
    public static function getUrlLogoutExit()
    {
        return self::$logout_exit;
    }

}
