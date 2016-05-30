<?php

namespace lib\view;

use \lib\register\Monitor;
use \lib\view\parsers\ParseExtended;
use \lib\view\Parse;
use \lib\view\parsers\ParseCondition;
use \lib\view\parsers\ParseBlock;

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
     *
     * @var array
     */
    private $blocks = [];


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
            $this->output = Parse::obFile($file);// get contents of buffer
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
        return (isset(self::$data[$tag]))? self::$data[$tag] : null;
    }



    /**
     * Method to parse the template
     */
    public function parseTemplate()
    {
        
        //parse if statements
        $this->output = ParseCondition::parse($this->output);
        //parse included files {@include 'file.htm'}
        $this->output = \lib\view\parsers\ParseInclude::parse($this->output);
        //parse blocks
        $this->output = ParseBlock::parse($this->output);
        
        $this->output = ParseBlock::put($this->output);
        
        

    }

    
    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }
}
