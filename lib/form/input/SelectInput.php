<?php

namespace lib\form\input;

/**
 * Description of SelectInput
 * https://harvesthq.github.io/chosen/
 * http://harvesthq.github.io/chosen/options.html
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 5, 2014
 */
class SelectInput extends \lib\form\Input {
    
    private $index;
    protected $empty = false;
    protected $options = [];
    protected $model= null;
    protected $width = '100%';

    public static function create($field = null){
        $obj = new SelectInput($field, $field);
        $obj->setInputType(parent::TYPE_SELECT);
        return $obj;
    }
    
    private $select_all = false;
    
    public function setMultiple($select_all = null){
        $this->attributes['multiple'] = 'multiple';
        if($select_all == true){
            $this->select_all = true;
        }
        //$this->empty = false;
        return $this;
    }
    
    public function unsetMultiple(){
        unset($this->attributes['multiple']);
        return $this;
    }
    
    public function parseInput($cleaner = true) {
        if($this->model !=  null){
            $this->parseModel();
        }
        $this->attributes['name'] = 'name="' . $this->name . '"';
        $this->attributes['id'] = 'id="' . $this->elemid . '"';
        $this->attributes['class'] = 'class="chosen-select '.$this->class.'"';
        $this->attributes['placeholder'] = 'placeholder="select"';
        
        
        $selecteds = explode('&&', $this->value);
        $optionoriginal = '<option value="#index" selected>#label</option>';

        $this->input = $this->addon_l . '<select style="width:' . $this->width . '" '
                . implode(' ', $this->attributes) . '>';
        if($this->empty != false){
            if($this->empty !== true){
                $this->input .= str_replace(['#index', 'selected', '#label'], ['', '',$this->empty], $optionoriginal);
            }else{
                $this->input .= str_replace(['#index', 'selected', '#label'], ['', '',''], $optionoriginal); 
            }
           
        }
        if (isset($this->options)) {
            $this->renderOptions($optionoriginal, $selecteds);
        }
        $this->input .= '</select>' . $this->addon_r;
        if($cleaner == true){
            $this->input .= '<a class="clear-input" data-id="'.$this->elemid.'"><span class="glyphicon glyphicon-refresh"></span></a>';
        }
        
        return $this->input;
    }
    
    private function renderOptions($optionoriginal, $selecteds) {
        foreach ($this->options as $i => $label) {
            if ($i === 0) {
                $i = '0';
            }
            $option = str_replace('#label', $label, $optionoriginal);
            $index = ($i === 0) ? '0' : $i;
            if (!in_array($index, $selecteds)) {
                $option = str_replace(' selected', '', $option);
            }
            if ($i === $label) {
                $option = str_replace(' value="#index"', '', $option);
            } else {
                $option = str_replace('#index', $i, $option);
            }
            $this->input .= $option;
        }
    }

    public function setAddValue($url, $function) {
        $this->addon_r = '<a data-function="' . $function . '" data-id="' . $this->elemid . '" data-action="' . $url . '" class="btn-plus-value">'
                . $this->buildAddon('+', 'input-addon addon-chosen') . '</a>';
        $this->class .= ' with-add-right';
        $this->width = '93%';
        return $this;
    }
    
    protected function parseModel(){
        if ($this->index == null) {
            echo 'index is null for Select Input in ' . $this->name . '<br />';
        } else {
            if($this->columnlabels != null){
                foreach(array_keys($this->columnlabels) as $col){
                    $this->model->setSelect($col);
                }
            }
            $list = $this->model->find();
            
            foreach ($list as $item) {
                $index = (string) $item->getColumnValue($this->index);
                
                if($this->columnlabels == null){
                    $string = (string) $item;
                }else{
                    $string = '';
                    if(!is_array($this->columnlabels)){
                        return '';
                    }
                    foreach($this->columnlabels as $col => $glue){
                        $string .= $glue . $item->getColumnValue($col);
                    }
                }
                $this->options[$index] = $string;
            }
            if($this->select_all == true){
                $this->value = implode('&&', array_keys($this->options));
                    
            }
        }
    }
    
    private $columnlabels = null;
    
    public function setArrayLabel($columns = []) {
        $this->columnlabels = $columns;
        return $this;
    }
    
    public function setModel($model) {
        unset($this->options);
        $this->model = $model;
        //asort($this->options);
        return $this;

    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function setOptionIndex($field){
        $this->index = $field;
        return $this;
    }
    
    
    public function setValuesList($values = []){
        $this->options = [];
        foreach($values as $value){
            $this->options[$value] = $value;
        }
        if($this->empty == true){
            $this->addEmpty();
        }
        return $this;
    }
    
    public function convertValuesByXml($file){
        if(!empty($file)){
            $values = \lib\xml\XmlSimple::getConvertedList($file);
            $this->setIndexedValuesList($values);
            
        }
        return $this;
    }
    
    public function setIndexedValuesList($values = []){
        $this->options = [];
        foreach($values as $key => $value){
            $this->options[$key] = $value;
        }
        if($this->empty == true){
            $this->addEmpty();
        }
        return $this;
    }
    
    public function addEmpty($label = null) {
        $this->empty = (null != $label)? $label : true;
        
        return $this;
    }
    
    
    public function removeEmpty(){
        
        $this->empty = false;
        return $this;
    }


}
