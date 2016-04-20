<?php

/**
 * Description of Controller 
 * created in 7/Nov/2014
 * @author $luispinto@nestesitio.net
 * Sequence in Router:
 * //prepare controller and action
 * $controller = new $class();
 * $controller->$action();   
 * //prepare View
 * //if Action defined view ->
 *  - $this->setView();
 * $template = $controller->getTemplate();
 * //else here we define view ->
 * $extend = $controller->setView($template);
 *  - $this->view = new View($file);
 * $output = $controller->dispatch();
 *  - $this->view->parse();
 *  - $this->renderData();
 *  - return $this->view->display();
 */

namespace lib\control;

use \lib\control\ControlTools;
use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\view\View;
use \lib\register\VarsRegister;

class Controller {

    private $template = null;
    private $extended = null;
    protected $view = null;
    protected $app;
    protected $content_type = '';
    private $tags = [];
    protected $model;
    protected $id = true;
    public $messages = true;
    public $layout = true;
    
    
    protected function getJEditableValue(){
        $this->layout = false;
        $this->setView('layout/core/empty.htm');
        $value = VarsRegister::getPosts('value');
        return $value;
    }
    
    protected function setUserMessage() {
        $this->set('usermsg', Registry::getUserMessages());
    }
    
    protected function setCustomMessage() {
        $this->set('custommsg', Registry::getCustomMessages());
    }
    
    protected function writeMessage($message) {
        
        Registry::setMessage($message);
        $this->set('usermsg', Registry::getUserMessages());
    }


    public function dispatch() {
        /* parse the tags in view 
         * after eventual generate of template 
         * by class that extends DataConfig*/
        if (true == $this->layout) {
            $this->view->parse();
            //inject data in view
            $this->renderData();
            //display
            return $this->view->display();
        }else{
            return;
        }
    }
    
    protected function getCollection($results){
        $itens = [];
        foreach ($results as $i=>$obj){
            $itens[$i] = $obj->getToArray();
        }
        return $itens;
    }
    
    protected function renderCollection($results, $tag) {
        Registry::setMonitor(Monitor::BOOKMARK, get_class($this) . ' - renderCollection with ' . count($results) . ' row for tag ' . $tag);
        $itens = $this->getCollection($results);
        $this->set($tag, $itens);
    }
    
    protected function set($tag, $data){
        Registry::setDataDevMessage($tag, $data);
        $this->tags[$tag] = $data;
    }
    
    protected function get($tag){
        return $this->tags[$tag];
    }
    
    private function renderData() {
        Registry::setMonitor(Monitor::BOOKMARK, get_class($this) . ' - renderData');
        foreach($this->tags as $tag=>$data){
            $this->view->set($tag, $data);
        }
    }
    
    protected function preRender($html, $results, $var){
        Registry::setMonitor(Monitor::BOOKMARK, 'preRender');
        $view = new View($html, FALSE);
        $itens = $this->getCollection($results);
        $view->set($var, $itens);
        $view->parse();
        return $view->display();
    }

    public function setView($filename) {
        if ($this->template == null) {
            $file = ControlTools::validateFile($this, $filename, 'view', 'htm');
            if($file == null){
                die('"' . $filename . '" is not a valid template file for ' . get_class($this));
            }
            $this->view = new View($file);
            $this->template = $file;
            $this->extended = $this->view->getExtend();
        }
    }
    
    public function resetView($filename){
        $this->template = null;
        $this->setView($filename);
    }
    
    protected function setEmptyView(){
        $this->messages = false;
        $this->setView('/layout/core/empty.htm');
    }
    
    public function getTemplate(){
        return $this->template;
    }
    
    public function getExtended(){
        return $this->extended;
    }
    
    public function setHeaderContentType($mime){
        if(empty($this->content_type)){
            $this->content_type = $mime;
        }
    }
    
    public function setHeader($mime){
        if(empty($this->content_type)){
            $this->content_type = $mime;
        }
        return $this;
    }
    
    public function writeHeader(){
        header($this->content_type);
    }
    
    protected function addMemory($memory = 2512){
        ini_set('memory_limit', $memory . 'M');
        set_time_limit(99640);
    }
    
    
    
    function __construct() {
        Registry::setMonitor(Monitor::CONTROL, get_class($this));
        $this->app = \lib\register\VarsRegister::getApp();
    }
    
    protected function ob() {
        $this->layout = false;
        $this->setEmptyView();
        $this->start_time = \lib\tools\ObTool::obStart();
    }

}
