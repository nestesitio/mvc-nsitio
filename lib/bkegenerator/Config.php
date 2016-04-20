<?php

namespace lib\bkegenerator;

/**
 * Description of Config
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 7, 2015
 */
class Config {

    private $configs = [];
    private $indexes = [];
    private $current = 0;
    private $identification;

    function __construct() {}
    
    public function getNum(){
        return count($this->configs);
    }
    
    public function setIdentification($identification) {
        $this->identification = $identification;
    }
    
    public function getIdentification() {
        return $this->identification;
    }
    
    
    public function setIndex($index) {
        $this->indexes[$index] = $index;
        $this->current = $index;
        return $this;
    }
    
    public function setConfigValue($attr, $value){
        $this->configs[$this->current][$attr] = $value;
        return $this;
    }
    
    public function getConfigValue($index){
        return (isset($this->configs[$this->current][$index]))? $this->configs[$this->current][$index] :null;
    }
    
    public function getIndexes() {
        return $this->indexes;
    }
    
    public function getIndexedValue($index, $key) {
        $this->setIndex($index);
        return $this->getConfigValue($key);
    }
    

}
