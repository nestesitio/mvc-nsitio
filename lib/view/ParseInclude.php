<?php

namespace lib\view;

use \lib\register\Registry;
use \lib\view\ParseString;

/**
 * Description of ParseInclude
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 19, 2014
 *
 * {% include ('include.htm' with @includes) %}
 */
class ParseInclude
{
    /**
     * @var String
     */
    private $string;
    /**
     * @var
     */
    private $include;

    /**
     * Process the tag include and find and prepare the included file
     * @param String $string The tag of include {% include ('include.htm') %}
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
        $this->setIncludeFile();
        $this->string = $this->getInclude();
    }

    /**
     * Return the string to replace tag
     * This method is recursive
     *
     * @return String $this->string
     */
    public function getString()
    {
        $parse = new ParseString($this->string);
        $parse->find('include');
        $includes = $parse->getPortion();
        foreach($includes as $include){
            $inc = new ParseInclude($include);
            $this->string = str_replace($include, $inc->getString(), $this->string);
        }
        return $this->string;
    }

    /**
     * Find and prepare the file to be included
     *
     * @return void
     */
    private function setIncludeFile()
    {
        $matches = [];
        $pattern = "/('){1}[^']+(\.htm){1}('){1}/";
        //-> {% include ('layout/core/datalist') %}
        preg_match_all($pattern, $this->string, $matches, PREG_PATTERN_ORDER);
        if(!empty($matches[0])){
            $file = str_replace("'", '', $matches[0][0]);
            if(is_file(ROOT . DS . $file)){
                $this->include = DS . $file;
            }elseif (is_file(ROOT . DS . 'apps' . DS . $file)) {
                $this->include = 'apps' . DS . $file;
            }elseif(is_file(ROOT . DS . 'layout' . DS . $file)){
                $this->include = 'layout' . DS . $file;
            }else{
                $this->include = '';
                Registry::setErrorMessages(null, 'Wrong path or unknow file for ' . ROOT . DS . 'layout|apps' . DS . $file);
            }
        }else{
            $this->include = '';
            Registry::setErrorMessages(null, 'Empty file.htm value for include');
        }
    }
    /**
     * Include and get the file content
     *
     * @return String $content The conten of included file
     */
    public function getInclude()
    {
        if (is_file(ROOT . DS . $this->include)) {
            ob_start();
            include(ROOT . DS . $this->include);
            $content = ob_get_contents();
            ob_end_clean();
            $content = str_replace(["\n", "\r"], '', $content);
            return $content;
        }
    }

}
