<?php

namespace lib\view\parsers;

use \lib\view\Template;

/**
 * Description of ParseLoop
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 30, 2016
 */
class ParseLoop {
    
    const PATTERN_WHILE = "/{@while \(([^\)]*)\):}(.*){@endwhile;}/m";
    
    const PATTERN_ENDWHILE = "{@endwhile;}";

    public static function parseForeach($output){
        $matches = [];
        if (preg_match(self::PATTERN_WHILE, $output)) {
            preg_match_all(self::PATTERN_WHILE, $output, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                list($vector, $tag) = explode(' in ', $match[1]);
                $html = self::buildPieces($tag, $vector, $match[2]);

                $output = str_replace($match[0], $html, $output);
            }
        }
        
        return $output;
    }
    
    
    private static function buildPieces($tag, $vector, $piece){
        $var = Template::getData($tag);
        $html = '';
        if ($var != null && is_array($var)) {
            foreach ($var as $row) {
                $string = $piece;
                foreach ($row as $k => $value) {
                    $string = str_replace('{' . $vector . '.' . $k . '}', $value, $string);
                }
                $html .= $string;
            }
        }
        return $html;
    }

}
