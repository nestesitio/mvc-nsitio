<?php

namespace lib\form;

use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of Input
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 9, 2015
 */
class Input {
    
    const TYPE_SELECT = 'select';
    const TYPE_HIDDEN = 'hidden';
    const TYPE_TEXT = 'text';
    const TYPE_CHECKBOX = 'checkbox';
    
    const ADDON_L = 'L';
    const ADDON_R = 'R';
    
    protected $input;
    protected $attributes = [];
    
    protected $type = self::TYPE_TEXT;
    protected $name = null;
    protected $elemid = null;
    
    protected $value = null;
    protected $default = null;
    
    protected $placeholder = null;
    protected $disabledvalue = '';
    protected $class = 'form-control';
    
    protected $addon_l = '';
    protected $addon_r = '';
    
    protected $required = false;
    protected $range = null;
    

    function __construct($name = null, $elemid = null) {
        self::setElementId($name, $elemid);
    }
    
    public function __clone() {}
    
    public function setElementId($name = null, $elemid = null){
        if(null != $name){
            $this->name = $name;
        }
        if(null != $elemid){
            $this->elemid = $elemid;
        }
    }
    
    public function emptyValue() {
        $this->setValue();
        $type = $this->getInputType();
        if($type == self::TYPE_SELECT){
            $this->addEmpty();
        }
        return $this;
    }
    
    public function isMultiple(){
        return (isset($this->attributes['multiple']))? true : false;
    }
    
    public function setMultiple(){
        return $this;
    }
    
    public function setValue($value = ''){
        $this->value = $value;
        if($this->disabledvalue == ''){
            $this->disabledvalue = $value;
        }
        if(!empty($value)){
            Registry::setMonitor(Monitor::FORM, 'Set value for ' . $this->name . ' = ' . 
                    (is_array($value))? $value: 'Array: ' . implode("&",$value));
        }
        return $this;
    }
    
    public function setArray($values){
        $this->value = implode('&&', $values);
        Registry::setMonitor(Monitor::FORM, 'Set value for ' . $this->name . ' = ' . implode('&&', $values));
        return $this;
    }
    
    public function getValue(){
        return $this->value;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getId(){
        return $this->elemid;
    }
    
    public function setName($value){
        $this->name = $value;
        return $this;
    }
    
    public function setId($value){
        $this->elemid = $value;
        return $this;
    }
    
    
    public function setDefault($value){
        if(null == $this->value){
            $this->value = $value;
            $this->default = $value;
            Registry::setMonitor(Monitor::FORM, 'Set default value for ' . $this->name . ' = ' . $value);
        }
        return $this;
    }
    
    
    public function setRequired($bool, $force = false) {
        if($force == true){
            $this->required = true;
        }
        if($bool == true){
            $this->attributes['required'] = 'required';
        }elseif($this->required == false && $bool == false && isset($this->attributes['required'])){
            unset($this->attributes['required']);
        }
        return $this;
    }
    
    
    public function setInputType($type){
        $this->type=$type;
    }
    
    public function getInputType(){
        return $this->type;
    }
    
    public function setPlaceHolder($placeholder){
        $this->placeholder=$placeholder;
    }
    
    public function getInput(){
        return $this->input;
    }
    
    public function setMaxlength($length){
        $this->attributes['maxlength'] = 'maxlength="' . $length . '"';
        return $this;
    }
    
    public function setDataAttribute($attribute, $value) {
        $this->attributes[$attribute] = $attribute . '="' . $value . '"';
        return $this;
    }


    protected function attributes() {
        $this->elemid = str_replace('.', '_', $this->elemid);
        $this->name = str_replace('.', '_', $this->name);
        $this->attributes['type'] = 'type="' . $this->type . '"';
        $this->attributes['name'] = 'name="' . $this->name . '"';
        $this->attributes['id'] = 'id="' . $this->elemid . '"';
        $this->attributes['value'] = 'value="' . $this->value . '"';
        $this->attributes['class'] = 'class="' . $this->class . '"';
        if (null != $this->placeholder) {
            $this->attributes['placeholder'] = 'placeholder="' . $this->placeholder . '"';
        }
    }
    
    protected function buildAddon($char, $class){
        return '<span class="' . $class . '">' . $char . '</span>';
    }
    
    public function setAddon($char, $pos = self::ADDON_L) {
        if($pos == self::ADDON_R){
            $this->addon_r = $this->buildAddon($char, 'input-addon addon-right');
            $this->class .= ' with-add-right';
        }else{
            $this->addon_l = $this->buildAddon($char, 'input-addon addon-left');
            $this->class .= ' with-add-left';
        }
        return $this;
    }
    
    public function addClass($class){
        $this->class .= ' ' . $class;
    }
    
    public function setRange($range){
        $this->range = $range;
    }
    
    public function getRange(){
        return $this->range;
    }

}
