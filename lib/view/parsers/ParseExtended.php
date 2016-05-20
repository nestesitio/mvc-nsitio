<?php

namespace lib\view\parsers;

use \lib\view\Tags;
use \lib\register\Monitor;
use \lib\view\TemplateTools;

/**
 * Description of ParseExtended
 * Merge page template with main template thru the tag extends
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class ParseExtended
{
    private static $layout;


    /**
     * Extend the template to a main template file if there is a tag:
     * {extends 'layout/freelancer/home.htm'}
     * Get the HTML with the main template
     * 
     * @param string $output
     * @return string
     */
    public static function parse($output)
    {
        $matches = [];
        if (strpos($output, Tags::TAG_EXTENDS) !== false
                && preg_match(Tags::PATTERN_EXTENDS, $output, $matches)) {
            $view = str_replace($matches[0], '', $output);

            $extended = TemplateTools::getTagArgument($matches[0], Tags::TAG_EXTENDS);
            if (file_exists(ROOT . DS . $extended)) {

                $output = file_get_contents(ROOT . DS . $extended);
                self::$layout = $extended;
                //now the template is extended with main file
                $output = str_replace(Tags::TAG_CONTENT, $view, $output);
                Monitor::setMonitor(Monitor::TPL, '<b>extended</b> - ' . $extended);
            } else {
                Monitor::setErrorMessages(null, 'Error: Extended file ' . $extended . ' not found');
            }
        }
        return $output;
    }
    
    /**
     * Get the path for the mai template
     * 
     * @return string
     */
    public static function getExtended() {
        return self::$layout;
    }



}
