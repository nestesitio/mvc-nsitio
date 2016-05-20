<?php

namespace lib\view;

use \lib\register\Monitor;
use \lib\view\Parse;
use \lib\view\parsers\ParseExtended;

/**
 * Description of Template
 * Templating engine
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 18, 2016
 */
class Template
{
    /**
     * Stores the location of the template file
     * @var string
     */
    private $page_template;
    /**
     * Stores the location of the main file extenting template
     * @var string
     */
    private $extended_template;

    /**
     * Stores the entries to be parsed in the template
     * @var array
     */
    private static $data = [];

    /**
     * Stores the contents of the template file
     * @var string
     */
    private $output = null;


    /**
     * Template constructor.
     * @param $file
     */
    public function __construct($file = null)
    {
        $this->load($file);
    }

    /**
     * Loads a template file
     * @param string $file
     */
    public function load($file)
    {
        if (file_exists(ROOT . DS . $file)) {
            $this->page_template = $file;
            Monitor::setMonitor(Monitor::TPL, $file);
            ob_start(); // start output buffer
            include (ROOT . DS . $file);
            $this->output = ob_get_contents(); // get contents of buffer
            ob_end_clean();
            //parse extension {extends 'file.htm'}
            $this->output = ParseExtended::parse($this->output);
            //regist the path for main template
            $this->extended_template = ParseExtended::getExtended();
        } elseif (null != $file) {
            Monitor::setErrorMessages(null, 'Error: Template file ' . $file . ' not found');
        }
    }

    /**
     * Get the path to main template
     * @return string
     */
    public function getExtends()
    {
        return $this->extended_template;
    }

    /**
     * Build the array of pairs tag => data
     * @param String $tag The tag to be replaced {$tag}
     * @param mixed $data The data to replace tag
     *
     * @return void
     */
    public function addData($tag, $data = '')
    {
        self::$data[$tag] = $data;
    }

    /**
     *
     * @param string $tag
     *
     * @return mixed
     */
    public static function getData($tag)
    {
        return self::$data[$tag];
    }



    /**
     * Method to parse the template
     */
    public function parseTemplate()
    {
        //parse some other tags
        $parse = new Parse($this->output);
        //parse extension {include 'file.htm'}
        $this->output = $parse->parseInclude();

    }

    
    /**
     * @return mixed
     */
    public function getOutput()
    {
        $str = $this->output;
        $this->output = '';
        $str = str_replace(["\n", "\r", "\t", "</li>    <li", "</li>                <li"], ['', '', '', '</li><li', '</li><li'], $str);
        $pattern = '/(li>)[\s].(<li)/i';
        $replacement = '</li><li';
        $str = preg_replace($pattern, $replacement, $str);
        return $str;
    }
}
