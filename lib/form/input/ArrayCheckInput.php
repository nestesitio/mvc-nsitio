<?php

namespace lib\form\input;

/**
 * Description of ArrayCheckInput
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 26, 2015
 */
class ArrayCheckInput extends \lib\form\Input {
    
    private $list = [];

    public static function create($field = null){
        $obj = new ArrayCheckInput($field, $field);
        return $obj;
    }
    
    public function setValuesList($values = []){
        $this->list = $values;
        return $this;
    }
    
    public function parseInput() {
        $this->attributes();
        /*' <input type="checkbox" name="vehicle" value="Bike">I have a bike<br> '*/
        $this->input = '<fieldset id="' . $this->elemid . '">';
        if(isset($this->attributes['required'])){
            $this->input = '<fieldset id="' . $this->elemid . '" required>';
        }
        $selecteds = explode('&&', $this->value);
        $i = 0;
        foreach($this->list as $value => $label){
            $this->input .= '<input type="checkbox"'
                    . ' name="' . $this->name . '"  id="' . $this->elemid . '_' . ++$i . '"'
                    . ' value="' . $value . '"';
            if (in_array($value, $selecteds)) {
                $this->input .= ' checked';
            }
            $this->input .= ' /> ' . $label . '&nbsp;';
        }
        
        $this->input .= '<a class="clear-input" data-id="'.$this->elemid.'"><span class="glyphicon glyphicon-refresh"></span></a>';
        return $this->input;
    }

}
