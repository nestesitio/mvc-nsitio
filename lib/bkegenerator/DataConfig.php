<?php
namespace lib\bkegenerator;

use \lib\xml\XmlFile as XmlFile;
use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\register\VarsRegister;


/**
 * Description of DataConfig
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 18, 2014
 */
class DataConfig {

    protected $x_conf;
    protected $html;
    protected $extended = null;
    protected $tag;
    protected $identification = null;
    protected $var = null;
    protected $querystring = [];
    protected $condition = [];

    function __construct($xmlfile, $obj = null) {
        $file = \lib\control\ControlTools::validateFile($obj, $xmlfile, 'config', 'xml');
        $this->x_conf = new XmlFile($file);
        $this->identification = $this->x_conf->queryXPath('grid', 'atr', 'identification');
    }
    
    public function setCondition($index){
        $this->condition[$index] = true;
    }
    
    protected function getCondition($path){
        $index = $this->x_conf->queryXPath($path, 'atr', 'condition');
        if(!empty($index) && !isset($this->condition[$index])){
            return false;
        }
        return true;
    }


    protected function getnodes($query) {
        $nodes = $this->x_conf->arrayXPath($query);
        return $nodes;
    }
    
    public function setHtml($html) {
        $this->html = $html;
        return $this;
    }
    
    
    public function getContentsFile($file, $id){
        $this->var = $id;
        $this->tag = '{% build ('.$id.') %}';
        if (file_exists(ROOT . $file)) {
            $this->html =  file_get_contents(ROOT . $file); // get contents of buffer
            
        }
    }
    
    public function getHtml($extended = null) {
        Registry::setMonitor(Monitor::BOOKMARK, ' DataConfig return HTML');
        if($extended != null){
            $this->html = str_replace($this->tag, $this->html, $extended);
        }
        return $this->html;
    }
    
    public function setQueryString($querystring){
        $this->querystring = $querystring;
    }
    
    protected function findVars($path){
        $str = '';
        $arr = $this->x_conf->nodeXPath($path . '/vars', ['var','value','get','id','str']);
        foreach($arr as $line){
            if(!empty($line['get']) && VarsRegister::getRequests($line['get']) != false){
                $str .= ' data-' . $line['var'] . '="' .  VarsRegister::getRequests($line['get']) . '"';
            }elseif(!empty($line['id']) && VarsRegister::getId() != false){
                $str .= ' data-' . $line['var'] . '="' .  VarsRegister::getId() . '"';
            }elseif(!empty($line['value'])){
                $str .= ' data-' . $line['var'] . '="{{ item.' . $line['value'] . ' }}"';
            }elseif(!empty($line['str'])){
                $str .= ' data-' . $line['var'] . '="' . $line['str'] . '"';
            }
        }
        return $str;
    }
    
    public function getParams($path) {
        $values = [];
        $nodes = $this->x_conf->nodeXPath($path, ['var', 'str']);
        foreach($nodes as $node){
            $values[$node['var']] = $node['str'];
        }
        return $values;
    }
    
    protected function findLabel($path) {
        $value = $this->x_conf->queryXPath($path . "/label[@lang='" . 'pt' . "']");
        if (empty($value)) {
            $value = $this->xmdl->queryXPath($path . "/label[@lang='" . 'en' . "']");
        }
        if (empty($value)) {
            $value = $this->xmdl->queryXPath($path . "/label[@lang='" . 'pt' . "']");
        }
        return $value;
    }
    

}
