<?php

namespace lib\view\parsers;

use \lib\view\Tags;

/**
 * Description of ParseBlock
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 30, 2016
 */
class ParseBlock {

    private static $blocks = [];
    
    
    public static function parse($output){
        $matches = [];
        if (preg_match(Tags::PATTERN_BLOCKS, $output)) {
            preg_match_all(Tags::PATTERN_BLOCKS, $output, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                
                $id = $match[1];
                self::$blocks[$id] = $match[2];
                
                $output = str_replace($match[0], '', $output);
            }
            
        }
        return $output;
    }
    
    
    
    public static function put($output){
        foreach(self::$blocks as $key => $content){
            if($key == 'css'){
                $output = str_replace(Tags::TAG_BLOCK_CSS, $content, $output);
            }else if($key == 'js'){
                $output = str_replace(Tags::TAG_BLOCK_JS, $content, $output);
            }  else {
                $tag = str_replace('name', $key, Tags::TAG_PUTBLOCK);
                //function preg_replace ($pattern, $replacement, $subject, $limit = -1, &$count = null) {}
                $output = str_replace($tag, $content, $output);
            }
        }
        
       
        $output = str_replace(Tags::TAG_BLOCK_CSS, '', $output);
        $output = str_replace(Tags::TAG_BLOCK_JS, '', $output);
        if (preg_match(Tags::PATTERN_PUTBLOCK, $output)) {
            $output = preg_replace(Tags::PATTERN_PUTBLOCK, '', $output);
        }
        
        
        return $output;
    }

}
