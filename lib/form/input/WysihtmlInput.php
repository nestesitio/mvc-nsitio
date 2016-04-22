<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib\form\input;

/**
 * Description of WysihtmlInput
 * https://github.com/Waxolunist/bootstrap3-wysihtml5-bower/
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 27, 2015
 */
class WysihtmlInput extends \lib\form\input\TextAreaInput
{
    /**
     * @param String $field The db table field name for reerence to input
     * @return WysihtmlInput
     */
    public static function create($field = null)
    {
        $obj = new WysihtmlInput($field, $field);
        return $obj;
    }

    /**
     * @return string
     */
    public function parseInput()
    {
        $this->class = 'wysihtml';
        $this->attributes();


        $this->input = '<textarea style="width:100%" ' . implode(' ', $this->attributes) . '>' . $this->value . '</textarea>';
        $this->input .= '<a class="clear-input" data-id="'.$this->elemid.'"><span class="glyphicon glyphicon-refresh"></span></a>';
        return $this->input;
    }

}
