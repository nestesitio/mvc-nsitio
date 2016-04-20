<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib\view;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\view\ParseString;
use \lib\view\ParseInclude;

/**
 * Description of Template 
 * created in 15/nov/2014
 * @author Luís Pinto - luis.nestesitio@gmail.com
 */
class Template {

    protected $fileview;
    protected $output;
    private $strview;
    private $extends;
    private $extendfile;
    
    protected $vars = [];
    
    protected $tags = [];
    protected $portions = [];
    protected $args = [];
    
    private $patternExtends = "/\{% extends '[^%]+' %\}/";
    private $cssExtend = "/\{% cssextension '[^%]+' %\}/";
    private $jsExtend = "/\{% jsextension '[^%]+' %\}/";

    function __construct($file = null) {
        if (file_exists(ROOT . DS . $file)) {
            $this->fileview = $file;
            Registry::setMonitor(Monitor::TPL, $file);
            ob_start(); // start output buffer
            include (ROOT . DS . $file);
            $this->output = ob_get_contents(); // get contents of buffer
            ob_end_clean();
            
            $this->extensions();
            
        } elseif(null != $file) {
            Registry::setErrorMessages(null, 'Error: Template file ' . $file . ' not found');
        }
    }
    


    private function extensions() {
        //$this->output = file_get_contents(ROOT . DS . $file);
        $this->setIncludes();

        //we keep the original template before extend it
        $this->strview = $this->output;
        //now we extend the template
        $this->extends = $this->getExtend();
        //{% cssextension '/file.css' %}
        $this->cssExtend();
        //{% jsextension '/file.js' %}
        $this->jsExtend();
        //<script> ...
        $this->scriptExtend();
        $this->setIncludes();
    }

    /**
     * Extend the template to a main template file if there is a tag:
     * {% extends 'main.htm' %}
     * 
     *
     * @return String $this->output
     */
    private function getExtend() {
        $matches = [];
        if (strpos($this->output, "% extends '") && preg_match($this->patternExtends, $this->output, $matches)) {
            //the original template
            $view = str_replace($matches[0], '', $this->output);
            if (preg_match("/'[^%]+'/", $matches[0], $matches)) {
                $extended = str_replace("'", '', $matches[0]);

                if (file_exists(ROOT . DS . $extended)) {
                    $this->output = file_get_contents(ROOT . DS . $extended);
                    $this->extendfile = $extended;
                    //now the template is extended with main file
                    $this->output = str_replace("{{ include('main') }}", $view, $this->output);
                    Registry::setMonitor(Monitor::TPL, '<b>extended</b> - ' . $extended);
                } else {
                    Registry::setErrorMessages(null, 'Error: Layout file ' . $extended . ' not found');
                }
            }
        }
        return $this->output;
    }
    
    /**
     * Process the includes inside the template
     * The template completed with the includes
     *
     * @return void
     */
    public function setIncludes() {
        $parse = new ParseString($this->output);
        //identify the tags include
        $parse->find('include');
        //we get the array of tags
        $includes = $parse->getPortion();
        //we have the array of included portions
        foreach($includes as $include){
            //the tag to be replaced
            $inc = new ParseInclude($include);
            //replace the tag for the included content with other recursive includes
            $this->output = str_replace($include, $inc->getString(), $this->output);
        }
    }
    
    /**
     * Build the array of pairs tag => data
     * @param String $tag The tag to be replaced {{ tag }}
     * @param mixed $data The data to replace tag
     *
     * @return void
     */
    public function set($tag, $data = '') {
        
        $this->vars[$tag] = $data;
    }

    public function getOutput() {
        $str = $this->output;
        $this->output = '';
        $str = str_replace(["\n", "\r", "\t", "</li>    <li", "</li>                <li"], ['', '', '', '</li><li', '</li><li'], $str);
        $pattern = '/(li>)[\s].(<li)/i';
        $replacement = '</li><li';
        $str = preg_replace($pattern, $replacement, $str);
        return $str;
    }
    
    public function setOutput($html) {
        Registry::setMonitor(Monitor::BOOKMARK, 'All Template: ' . strlen($html) . ' chars in html; ');
        $this->output = $html;
    }
    
    public function getExtends() {
        return $this->extendfile;
    }
    
    
    private function cssExtend() {
        /*
         * extend css stylesheet to dynamic loading 
         */
        $matches = [];
        $data = '';
        if (strpos($this->output, "% cssextension '") && preg_match_all($this->cssExtend, $this->output, $matches, PREG_PATTERN_ORDER)) {
            foreach($matches[0] as $match){
                $sub = [];
                if (preg_match("/'[^%]+'/", $match, $sub)) {
                    $file = str_replace("'", '', $sub[0]);
                     if (file_exists(HTMROOT . $file)) {
                         $data .= '<link href="' . $file . '" rel="stylesheet">' . "\n";
                     }
                }
                $this->output = str_replace($match, '', $this->output);
            }
        }
        $this->output = str_replace('<link href="{{ dynamiccss }}"  rel="stylesheet">', $data, $this->output);
    }
    
    private function jsExtend() {
        /*
         * extend js to dynamic loading 
         */
        $matches = [];
        $data = '';
        $files = 0;
        if (strpos($this->output, "% jsextension '") && preg_match_all($this->jsExtend, $this->output, $matches, PREG_PATTERN_ORDER)) {
            foreach($matches[0] as $match){
                $sub = [];
                if (preg_match("/'[^%]+'/", $match, $sub)) {
                    $file = str_replace("'", '', $sub[0]);
                     if (file_exists(HTMROOT . $file) || strpos($file, 'http') === 0) {
                         $data .= '<script src="' . $file . '"></script>' . "\n";
                         $files++;
                     
                     }
                }
                $this->output = str_replace($match, '', $this->output);
            }
        }
        Registry::setMonitor(Monitor::VIEW, 'Rendering ' . $files . ' js links');
        $this->output = str_replace('<script src="{{ dynamicjs }}"></script>', $data, $this->output);
    }
    
    private function scriptExtend(){
        /*transfer custom scripts to main template */
        $pattern = "/(<script>){1}?(.|\n)+(<\/script>)/";
        $matches = [];
        $data = [];
        if (strpos($this->strview, "<script>")) {
            preg_match_all($pattern, $this->strview, $matches, PREG_PATTERN_ORDER);
            foreach ($matches[0] as $match) {
                $data[] = $match;
            }

            foreach ($data as $str) {
                $this->output = str_replace($str, '', $this->output);
            }
            $this->output = str_replace('<script>{{}}</script>', implode("\n", $data) . '<script>{{}}</script>', $this->output);
        }
        Registry::setMonitor(Monitor::VIEW, 'Rendering ' . count($data) . ' scripts');
    }
    
    
    protected function testIssetVars($variables, $vars) {
        if (count($variables) == 1) {
            if (isset($vars[$variables[0]])) {
                return $vars[$variables[0]] ;
            }
        } else {
            if (isset($vars[$variables[0]][$variables[1]])) {              
                return $vars[$variables[0]][$variables[1]];
            }elseif(isset($vars[$variables[1]])){
                return $vars[$variables[1]];
            }
        }
        return false;
    }

}
