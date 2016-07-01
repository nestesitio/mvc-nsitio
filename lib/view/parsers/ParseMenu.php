<?php

namespace lib\view\parsers;

use \lib\view\Tags;
use \lib\menu\Menu;

/**
 * Description of ParseMenu
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jun 30, 2016
 */
class ParseMenu {

    /**
     * 
     * @param string $output
     * @return string
     */
    public static function parse($output){
        $matches = [];
        if (strpos($output, Tags::TAG_MENU) !== false) {
            preg_match_all(Tags::PATTERN_MENU, $output, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $output = str_replace($match[0], self::setObject($match[1]), $output);
            }
        }
        return $output;
    }
    
    private static function setObject($argument){
        $args = self::getArgs($argument);
        
        $output = '';
        
        
        return $output;
        
    }
    
    
    private static function getArgs($argument){
        $arr = ['template'=>null, 'pos'=>null, 'vars'=>null];
        
        $args = explode(';', $argument);
        foreach($args as $arg){
            list($key, $value) = explode(':', trim($arg));
            $value = str_replace(['"', "'"], "", $value);
            
            if($key == 'template'){
                $arr['template'] = $value;
            }
            if($key == 'pos'){
                $arr['pos'] = $value;
            }
            if($key == 'vars'){
                $arr['vars'] = explode(',', $value);
            }
        }
        return $arr;
        
    }

}
