<?php

namespace lib\coreutils;

/**
 * Description of ModelTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jan 14, 2015
 */
class ModelTools {

    public static function buildModelName($name) {
        $name = str_replace('_', ' ', $name);
        $name = ucwords($name);
        return str_replace(' ', '', $name);
    }
    
    public static function buildModelQuery($table){
        $class = '\\model\\querys\\' . self::buildModelName($table) . 'Query';
        return $class::create();
    }
    
    public static function buildModelForm($table){
        $class = '\\model\\forms\\' . self::buildModelName($table) . 'Form';
        return new $class();
    }
    
    public static function buildModel($table){
        $class = '\\model\\models\\' . self::buildModelName($table);
        return new $class();
    }
    
    

}
