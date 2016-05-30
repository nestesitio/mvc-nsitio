<?php

namespace lib\view\parsers;

use \lib\view\Tags;
use \lib\view\TemplateTools;
use \lib\view\Parse;

/**
 * Description of ParseInclude
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class ParseInclude {

    /**
     * Parse the HTML string looking for tag {include 'include'}
     * and replace it for file content.
     * This function is recursive.
     * 
     * @param string $output The HTML to be parsed
     * @return string The HTML to output
     */
    public static function parse($output){
        $matches = [];
        if (strpos($output, Tags::TAG_INCLUDE) !== false) {
            preg_match(Tags::PATTERN_INCLUDE, $output, $matches);
            foreach ($matches as $match) {
                $file = TemplateTools::getTagArgument($match, Tags::TAG_INCLUDE);
                $file = TemplateTools::lookForTemplate($file);
                if (null != $file) {
                    $content = Parse::obFile($file);
                    $content = self::parse($content);
                    $content = \lib\view\parsers\ParseInclude::parse($content);
                    $output = str_replace($match, $content, $output);
                }
            }
        }
        return $output;
    }
    

}
