<?php

namespace lib\form;

use \lib\form\form\FormRender;
use \lib\register\VarsRegister;

/**
 * Description of PostTool
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 13, 2015
 */
class PostTool {
    
    public static function getMultiplePost($keyfield){
        $values = [];
        $posts = VarsRegister::getPosts();
        foreach (array_keys($posts) as $key) {
            if (strpos($key, $keyfield) !== false) {
                if(substr($key, -4) == '_min'){
                    $k = 'min';
                }elseif(substr($key, -4) == '_max'){
                    $k= 'max';
                }else{
                    $k = substr(strrchr($key, "_"), 1) - 1;
                }
                $values[$k] = $posts[$key];
                
            }
        }
        if(count($values)>0 && !isset($values[-1]) ){
            return $values;
            
        }
        return false;

        
        
    }
    
    public static function getFilterFields($columns, $prefix){
        $posts = VarsRegister::getPosts();
        //var_dump($posts);
        $fields = [];
        $groups = [];
        if (null != $columns) {
            
            foreach ($columns as $column) {
                $keyfilter = FormRender::renderName($column, $prefix);
                
                foreach (array_keys($posts) as $key) {
                    if (strpos($key, $keyfilter) !== false) {
                        $groups[$column][$key] = $posts[$key];
                    }
                }
                
                if (isset($groups[$column])) {
                    $fields[$column] = self::getFieldValue($groups, $column);
                }
            }
        }
        
        return $fields;
    }

    public static function getFieldValue($groups, $column){
        if (count($groups[$column]) > 1) {
            $str = implode('&&', $groups[$column]);
            if ($str == '&&') {
                $str = '';
            }
            $fields[$column] = $str;
        } else {
            foreach ($groups[$column] as $value) {
                $fields[$column] = $value;
            }
        }
        return $fields[$column];
    }

}
