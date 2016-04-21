<?php

namespace lib\view;
use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of ParseEmbed
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 19, 2014
 */
class ParseEmbed
{
    /**
     * @var
     */
    private $string;
    /**
     * @var
     */
    private $class;
    /**
     * @var
     */
    private $app;
    /**
     * @var
     */
    private $action;
    /**
     * @var
     */
    private $template;

    /**
     * ParseEmbed constructor.
     * @param $string
     */
    public function __construct($string)
    {
        $this->string = $string;
        $this->setEmbed();
        //$this->string = $this->getInclude();
    }

    /**
     * @return mixed
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action . 'Action';
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->template;
    }

    /**
     * @param $matches
     * @param $folder
     * @return mixed
     */
    private function getFileTemplate($matches, $folder)
    {
        if(isset($matches[1]) && !empty($matches[1])){
            $view = str_replace("'", '', $matches[1]);
            if(is_file(ROOT . DS . $view)){
                $this->template = $view;
                return $this->template;
            }

        }
        $this->template = ROOT . DS . 'apps' . DS . $folder . DS . 'view' . DS . $this->action . '.htm';

    }


    /**
     *
     */
    private function setEmbed()
    {
        $matches = [];
        $pattern = "/('){1}[^']+('){1}/";
        preg_match_all($pattern, $this->string, $matches, PREG_PATTERN_ORDER);
        if (!empty($matches[0])) {
            $route = str_replace("'", '', $matches[0][0]);
            $this->app = strstr($route, '\\', true);
            $route = substr(strstr($route, '\\'), 1);
            $controller = strstr($route, '::', true) . 'Actions';
            $this->class = '\\apps\\' . ucfirst($this->app) . '\\control\\' . ucfirst($controller);
            $folder = ucfirst($this->app);
            $this->action = substr(strstr($route, '::'),2);

            // assign controller full name
            // if we have extended controller
            if (!class_exists($this->class)) {
                Registry::setErrorMessages(null, $this->class . ' does not exist');
                $this->class = '\\apps\\Core\\control\\ErrorActions';
                $this->action = 'embed';
            } else {
                $hasActionFunction = (int) method_exists($this->class, $this->action . 'Action');
                if ($hasActionFunction == 0) {
                    Registry::setErrorMessages(null, 'Method "' . $this->action . '" not found');
                } else {
                    Registry::setMonitor(Monitor::ACTION, $this->action . 'Action');
                }
                $this->getFileTemplate($matches[0], $folder);
            }
        } else {
            $this->class = '';
            Registry::setErrorMessages(null, 'Empty class value for embed');
        }
    }

}
