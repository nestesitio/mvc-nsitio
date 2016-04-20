<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib\form\input;

/**
 * Description of ArrayRadioInput
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 1, 2016
 */
class ArrayRadioInput extends \lib\form\Input {

    private $list = [];
    
    public static function create($field = null){
        $obj = new ArrayRadioInput($field, $field);
        return $obj;
    }

    public function setValuesList($values = []){
        $this->list = $values;
        return $this;
    }
    
    public function parseInput() {
        $this->attributes();
        /* ' <div class="radio-inline">
          <label><input type="radio" name="optradio">Option 1</label>
          </div> ' */
        $this->input = '<fieldset id="' . $this->elemid . '">';
        if(isset($this->attributes['required'])){
            $this->input = '<fieldset id="' . $this->elemid . '" required>';
        }
        $selecteds = explode('&&', $this->value);
        $i = 0;
        foreach($this->list as $value => $label){
            $this->input .= '<input type="radio"'
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
