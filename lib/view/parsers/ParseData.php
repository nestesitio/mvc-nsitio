<?php

namespace lib\view\parsers;

use \lib\view\Tags;
use \lib\view\Template;

/**
 * Description of ParseData
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 31, 2016
 */
class ParseData {

    public static function parse($output){
        
         $matches = [];
        if (preg_match(Tags::PATTERN_DATA, $output)) {
            preg_match_all(Tags::PATTERN_DATA, $output, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                //array(3) { [0]=> string(12) "{$sitetitle}" [1]=> string(9) "sitetitle" [2]=> string(0) "" } 
                $value = Template::getData($match[1]);
                $output = str_replace($match[0], $value, $output);
            }
        }
        
        return $output;
    }

}
