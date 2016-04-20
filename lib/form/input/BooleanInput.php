<?php

namespace lib\form\input;

use \lib\form\Input;

/**
 * Description of CheckInput
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 11, 2015
 */
class BooleanInput extends \lib\form\Input {

    public static function create($field = null){
        $obj = new BooleanInput($field, $field);
        $obj->setInputType(Input::TYPE_CHECKBOX);
        return $obj;
    }
    
    public function parseInput($label) {
        $this->class = '';
        $this->attributes();
        unset($this->attributes['value']);

        $checked = ($this->value == 1)? 'checked="checked"' : '';
        $this->input = '<label>';
        $this->input .= '<input ' . $checked . implode(' ', $this->attributes) . '> ' . $label;
        $this->input .= '</label>';
        return $this->input;
    }

}
