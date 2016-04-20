<?php

namespace lib\form\input;

use \lib\form\Input;

/**
 * Description of InputInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 5, 2015
 */
class InputInfo extends \lib\form\Input {
    
    private $selectedcolumn = null;
    private $model = null;
    private $description = null;

    public static function create($field = null){
        $obj = new InputInfo($field, $field);
        $obj->setInputType(Input::TYPE_TEXT);
        return $obj;
    }
    
    
    public function setModel($model, $selectedcolumn) {
        unset($this->options);
        $this->model = $model;
        $this->selectedcolumn = $selectedcolumn;
        //asort($this->options);

    }
    
    public function setColumnsDescription($columns = []){
        $this->description = $columns;
    }
    
    private function parseModel(){
        if ($this->description != null) {
            foreach (array_keys($this->description) as $col) {
                $this->model->setSelect($col);
            }
        }
        $result = $this->model->filterByColumn($this->selectedcolumn, $this->value)->findOne();
        if ($this->description == null) {
            return (string) $result;
        } else {
            $string = '';
            foreach ($this->description as $col => $glue) {
                $string .= $glue . $result->getColumnValue($col);
            }
            return $string;
        }
    }
    
    private $convertedvalues = [];
    
    public function convertValuesByXml($file){
        if(!empty($file)){
            $this->convertedvalues = \lib\xml\XmlSimple::getConvertedList($file);
        }
    }

    public function parseInput() {
        $this->attributes();
        //<input type="text" name="country" value="Norway" readonly>
        
        $value = ($this->model !=  null)? $this->parseModel() : $this->value;
        if(isset($this->convertedvalues[$value])){
            $value = $this->convertedvalues[$value];
        }

        $this->input = '<input ' . $this->attributes['class'] . ' value="' . $value . '" readonly>';
        unset($this->attributes['class']);
        unset($this->attributes['type']);
        $this->input .= '<input type="' . Input::TYPE_HIDDEN . '" ' . implode(' ', $this->attributes) . '>';
        return $this->input;
    }

}
