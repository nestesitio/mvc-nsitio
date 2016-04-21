<?php

namespace lib\loader;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\register\VarsRegister;
use \lib\tools\StringTools;
use \lib\session\Session;
use \lib\session\SessionUser;
use \apps\Core\model\PageQuery;
use \lib\loader\Configurator;
use \apps\User\model\UserGroupModel;

/**
 * Description of Router
 * created in 7/Nov/2014
 * @author $luispinto@nestesitio.net
 */
class Router
{
    /**
     * @var string
     */
    protected $app;
    /**
     * @var string
     */
    protected $appslug;
    /**
     * @var string
     */
    protected $controller;
    /**
     * @var string
     */
    protected $action;
    /**
     * @var string
     */
    protected $canonical;
    /**
     * @var bool
     */
    protected $id;
    /**
     * @var
     */
    protected $slugvar;
    /**
     * @var bool
     */
    protected $view;
    /**
     * @var array
     */
    protected $params;
    /**
     * @var String
     */
    protected $route;
    /**
     * @var string
     */
    protected $namespace = '\apps\\';
    /**
     * @var
     */
    protected $folder;

    /**
     * @var string
     */
    private $police = 'ok';
    /**
     * @var int
     */
    private $page;

    /**
     *
     */
    const ERROR_CONTROLLER = '\\apps\\Core\\control\\ErrorActions';
    /**
     *
     */
    const HOME_CONTROLLER = '\\apps\\Home\\control\\HomeActions';

    /**
     * Instantiate the class
     *
     * @param String $route The sanitized url
     */
    public function __construct($route)
    {
        $this->route = $route;
        Registry::setMonitor(Monitor::ROUTE, $route);
        $this->app = 'Home';
        $this->appslug = 'home';
        $this->controller = 'Home';
        $this->action = 'default';
        $this->canonical = 'index';
        $this->page = 0;
        $this->id = false;
        $this->params = [];
        $this->view = false; // the initial view
    }

    /**
     * Outputs the whole thing
     *
     */
    public function dispatch()
    {
        // call to parse routes
        $params = $this->parseRoute();
        $this->parseCanonical();
        $this->view = $this->action;
        $this->controller = StringTools::getStringAfterLastChar($this->action, '_');

        $this->processParams($params);
        $this->registVars();

        //prepare controller and action
        $class = $classname = $this->getClassName();

        if($class == false){
            Registry::setErrorMessages(null, 'Invalid controller "' . $class . '"');
            return $this->processError(true);
        }

        $controller = new $class();

        $action = $this->getAction($classname);
        if($action == false){
            Registry::setErrorMessages(null, 'Invalid controller "' . $action . '" for "'.$class.'"');
            return $this->processError(true);
        }
        $controller->$action();

        //prepare View
        //if action defines view ($this->setView())
        $template = $controller->getTemplate();

        if(null == $template && $controller->layout == true){
            $template = 'apps' . DS . $this->folder . DS . 'view' . DS . $this->view;
            //else here we define view
            $controller->setView($template);
        }
        $extend = $this->aboutExtended($controller->getExtended());
        //output
        $this->output($controller, $extend);

    }

    /**
     * @param $controller
     * @param $extend
     */
    private function output($controller, $extend)
    {
        $output = $controller->dispatch();

        if ($this->police == 'ok') {
            if ($controller->messages == false) {
                echo $output;
            } elseif ($controller->layout == false) {
                exit;
            } elseif (empty($output)) {
                echo $this->displayError();
            } elseif ($controller->messages == true) {
                echo \lib\control\ControlMessages::write($output, $extend);
            }
        } else {

            $this->processError(true, ' <br />(<b>' . $this->police . '</b>)');
        }
    }

    /**
     * @param $extend
     * @param string $message
     */
    private function processError($extend, $message = '')
    {
        $class = self::ERROR_CONTROLLER;
        $controller = new $class();
        if(VarsRegister::getRequests('js') == false){
            $controller->pageAction();
        }else{
            $controller->ajaxAction();
        }
        $msg = '';
        if($this->page === false){
            if (\lib\session\SessionUserTools::haveAccess($this->app) == false) {
                $msg = ' This url does not exists or you don`t have access to ' . $this->route . '. <a href="/user/login">Please login.</a> or <a href="/">go home.</a> ';
            }else{
                $msg = ' This url in "' . $this->app. '" is not valid or does not exists. <a href="/">Please go home.</a> or <a href="#" onClick="history.go(-1)">back</a>';
            }
        }elseif($this->page === 0){
            $msg = ' You don`t have access to ' . $this->route . '. <a href="/user/login">Please login.</a> or <a href="/">go home.</a> ';
            if(SessionUser::getIsRegisterd() == false){
                if(VarsRegister::getRequests('js') == 1){
                    $url = \lib\url\UrlHref::renderUrl(['app' => 'user', 'canonical' => 'login']);
                    echo "<script>goPage('$url')</script>";
                    return;
                }
                return \lib\url\Redirect::redirectLogin();
            }
        }
        $msg .= '<br /> ->' . $message;
        $controller->haveError('error', $msg);
        $output = $controller->dispatch();
        echo \lib\control\ControlMessages::write($output, $extend);
        if (SessionUser::getUserGroup() == UserGroupModel::GROUP_DEVELOPER ||
                Configurator::getDeveloperMode() == true) {
            echo '<hr />' . $this->app . '/' . $this->controller . '/' . $this->action . ' - ' . SessionUser::getUserGroup() . '<br />';
            echo '<br />View: ' . ($this->view);
        }
    }

    /**
     * @return bool|string
     */
    private function getClassName()
    {
        VarsRegister::setApp($this->app);
        $this->namespace .= ucfirst($this->app) . '\\';
        $this->folder = ucfirst($this->app);
        // assign controller full name
        $class = $this->getControlClass();
        // if we have extended controller
        if (!class_exists($class)) {
            return false;
        }
        return $class;
    }

    /**
     * @return string
     */
    private function getControlClass()
    {
        $actions_class = $this->controller;
        if(strpos($actions_class, '_')){
            $actions_class = substr(strrchr($actions_class, '_'), 1 );
        }elseif($actions_class == 'default'){
            $actions_class = $this->app;
        }
        $class = $this->namespace . 'control\\' . ucfirst($actions_class) . 'Actions';
        return $class;
    }


    /**
     * @param $class
     * @return bool|string
     */
    private function getAction($class)
    {
        if($class == self::ERROR_CONTROLLER){
            return false;
        }
        // prepare Action
        VarsRegister::setAction($this->action);
        $str = 'x' . str_replace('_', ' ', $this->action);
        $action = str_replace(' ', '', substr(ucwords($str), 1));


        $hasActionFunction = (int) method_exists($class, $action . 'Action');
        if ($hasActionFunction == 0) {

            Registry::setErrorMessages(null, 'Method "' . $action . '" for ' . $this->controller . ' not found by Router');
            return false;
        } else {
            $method = $action . 'Action';
        }
        $method = $hasActionFunction ? $action . 'Action' : $this->controller . 'Action';
        Registry::setMonitor(Monitor::ACTION, $method);
        return $method;
    }

    /**
     * @param $extend
     * @return bool
     */
    private function aboutExtended($extend)
    {
        if(!empty($extend)){
            Registry::setMonitor(Monitor::TPL, $extend);
            /* if is not a ajax call,
             * update SessionPage
             * else
             * this var is already refreshed
             */
            Session::setSessionPage($this->page);
            Registry::setMonitor(Monitor::PAGID, $this->page);
            return true;
        }else{
            return false;
        }
    }


    /**
     *
     */
    private function displayError()
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

    /* get the HtmPage according to canonical url
     * and set page id
     */
    /**
     *
     */
    private function parseCanonical()
    {
        $this->canonical = str_replace('.htm', '', $this->canonical);
        $this->canonical = StringTools::getStringAfterLastChar($this->canonical, '_');
        $this->canonical = StringTools::getStringUntilLastChar($this->canonical, '/');
        $page = PageQuery::getPageRoute($this->appslug ,$this->canonical);
        if($page == false){
            $page = PageQuery::getPageExists($this->appslug ,$this->canonical);
            $this->police = "(wrong url " . $this->appslug . '/' . $this->canonical . ')';
            if($page == false){
                $this->page = false;
            }else{
                $this->police = 'you don\'t have access to this page';
                Session::setPageReturn($page->getId());
                $this->page = false;
            }

        }else{
            VarsRegister::setTitle($page->getTitle());
            VarsRegister::setHeadin($page->getHeading());
            $this->page = $page->getHtmId();
        }

    }

    /* process url query string after ?, but ? was allready deleted by htaccess */
    /**
     * @param $querystring
     */
    private function processParams($querystring)
    {
        $params = explode('&', substr($querystring, 1));
        if (count($params) > 1) {
            foreach ($params as $param) {
                list($key, $value) = explode('=', $param);
                VarsRegister::setVars($key, $value);
            }
        }
    }

    /**
     *
     */
    private function registVars()
    {
         //regist all post variables
        VarsRegister::registPosts();
        VarsRegister::registRequests();
        VarsRegister::setId($this->id);
        VarsRegister::setSlugVar($this->slugvar);
        VarsRegister::setCanonical($this->canonical);
    }

    /**
     * @return string
     */
    private function parseRoute()
    {
        // parse path info according to url query string
        $params = '';
        if (isset($this->route)) {
            // the request path
            $path = $this->route;
            if (strpos($path, '&')) {
                $pos = strpos($path, '&');
                $path = substr($path, 0, $pos);
                $params = substr($this->route, $pos);
            }

            $this->parseRoutePortions($path);
        }
        return $params;
    }

    /**
     * @param $path
     */
    private function parseRoutePortions($path)
    {
        $pieces = explode('/', $path);
        if (count($pieces) > 1) {
            foreach ($pieces as $x => $piece) {
                if (!empty($piece)) {
                    if ($x == 1 && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $this->app = $piece;
                        $this->appslug = $piece;
                    } elseif ($x == 1 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $this->app = str_replace('.htm', '', $piece);
                    } elseif ($x == 2 && $this->id == false && preg_match('/^[a-z]{3}[a-z_]+$/', $piece)) {
                        $this->canonical = $this->action = $piece;
                    } elseif ($x == 2 && preg_match('/^[a-z]{3}[a-z-]+[a-z](\.htm){1}$/', $piece)) {
                        $this->canonical = $piece;
                    } elseif ($x > 2 && $this->id == false && preg_match('/^[0-9]{1,11}$/', $piece)) {
                        $this->id = $piece;
                    } elseif ($x > 2 && $this->id == false && preg_match('/^[a-z]+$/', $piece)) {
                        $this->slugvar = $piece;
                    }
                }
            }
        }

    }

}
