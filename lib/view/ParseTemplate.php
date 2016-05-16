<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib\view;


use \lib\view\ParseString;
use \lib\view\ParseInclude;
use \lib\view\ParseEmbed;
use \lib\view\EvalCode;
use \lib\register\Monitor;



/**
 * Description of ParseTemplate
 * created in 15/nov/2014
 * @author Luís Pinto - luis.nestesitio@gmail.com
 */
class ParseTemplate extends \lib\view\Template
{
    /**
     * @var int
     */
    private $dev = 0;

     /**
     * Parse and look for tags in all the template
      * $this->tags -> The array tags
      * $this->portions -> The array of strings to be processed
      * $this->args The array of arguments for each tag
     * @param String $tag The tag to be find
     *
     * @return void
     */
    public function findTag($tag)
    {
        $parse = new ParseString($this->output);
        $parse->find($tag);

        $this->output = $parse->getString();

        $this->tags = array_merge($this->tags, $parse->getTag());
        Monitor::setMonitor(Monitor::BOOKMARK, '<b>View parseAll</b> - ' . $tag . ' | ' . count($this->tags));
        $this->portions = array_merge($this->portions, $parse->getPortion());
        $this->args = array_merge($this->args, $parse->getArgs());
        //var_dump($this->tags);
        //echo '<hr />';

    }

    /**
     * @param $string
     * @param $portions
     * @param $tags
     * @param $args
     * @return string
     */
    public function parseAllPortions($string = null, $portions = null, $tags = null, $args = null)
    {
        $parent = false;
        if(null == $portions){
            $portions = $this->portions;
            $tags = $this->tags;
            $args = $this->args;
            $parent = true;
        }
        foreach($tags as $key=>$tag){
            if($tag == 'while'){
                $html = $this->parseWhilePortion($portions[$key], $args[$key]);
            }elseif($tag == 'if'){
                $html = $this->parseIfPortion($portions[$key]);
            }elseif($tag == 'block'){
                $html = $this->parseBlockPortion($portions[$key]);
            }elseif($tag == 'include'){
                $html = $this->parseInclude($portions[$key]);
            }elseif($tag == 'embed'){
                $html = $this->parseEmbed($portions[$key]);
            }else{
                $html = '';
            }
            if ($parent == true) {
                $this->output = str_replace(trim($portions[$key]), trim($html), trim($this->output));
                unset($this->portions[$key]);
            }else{
                $string = str_replace(trim($portions[$key]), trim($html), trim($string));
            }
        }
        return $string;
    }

     /**
     * Process the portion to include
     * % include ('Home/view/include.htm' [with @includes, another_var]) %}
     * @param String $string The portion of the template to be processed
     *
     * @return string
     */
    private function parseInclude($string)
    {
        $parse = new ParseInclude($string);
        $include_string = $parse->getInclude();

        if (strpos($include_string, '{')) {
           $subparse = new ParseString($include_string);
           $subparse->find('for|if|attr|include|while');
           $include_string = $this->parseAllPortions(
                            $include_string, $subparse->getPortion(), $subparse->getTag(), $subparse->getArgs());

        }
        return $include_string;
    }

    /** process the
     * {% embed ('Home::teste') %}
     * or
     * {% embed ('Home::teste' with @list_title) %}
     * 
     * @param string $string
     * @return object
     */
    private function parseEmbed($string)
    {
        $parse = new ParseEmbed($string);

        $class = $parse->getClass(); 
        if($class === null){
            return 'NO CLASS';
        }
        $controller = new $class();

        $view = $parse->getView();
        if($view === null){
            return 'NO TEMPLATE FILE';
        }
        $controller->setView($view);
        
        $action = $parse->getAction();
        if($action === null){
            return 'NO METHOD';
        }
        Monitor::setMonitor(Monitor::TPL, '<b>parse Embed</b> - ' . $class . ' / ' . $action . '/');
        //output
        return $controller->$action();
    }

    /** process the tag {% while (list as item) %} ... {% endwhile %}
     * replacing tags for data
     * 
     * @param String $piece The string to repeat inside
     * @param String $args The arguments of the loop
     */
    private function parseWhilePortion($piece, $args, $vars = null)
    {
        if(null == $vars){
            $vars = $this->vars;
        }
        $html = '';
        $string_original = preg_replace(
                ["/\{% while \([^\)]+\) %\}/", "/(\{% endwhile %\})/"], '', $piece);

        $string_original = $this->cleanString($string_original);

        //find the data to replace tag
        list($arr, $vector) = explode(' in ', $args);

        if (isset($vars[$vector]) && is_array($vars[$vector])) {
            foreach ($vars[$vector] as $row) {
                $string = $string_original;
                foreach ($row as $k => $value) {
                    $string = str_replace('{{ ' . $arr . '.' . $k . ' }}', $value, (string) $string);
                }
                //$html .= $string;
                $html .= $this->reparse($string, 'if|attr|include', $row);
            }
        }
        return $html;
    }

    /**
     * @param $string_original
     * @return mixed
     */
    private function cleanString($string_original)
    {
        $string_original = trim(preg_replace('/\s\s+/', ' ', $string_original));
        $string_original = preg_replace("/\t/", '', $string_original);
        $string_original = preg_replace("/ +/", ' ', $string_original);
        $string_original = str_replace(['li> <li'], ['li><li'], $string_original);
        return $string_original;
    }

    /**
     * @param $string
     * @param $tags
     * @param $vars
     * @return mixed
     */
    private function reparse($string, $tags, $vars = null)
    {
        if (strpos($string, '{')) {
            $parse = new ParseString($string);
            $parse->find($tags);
            $tags = $parse->getTag();
            $portions = $parse->getPortion();

            foreach ($tags as $key => $tag) {
                $html = '';
                if ($tag == 'if') {
                    $this->dev = 1;
                    $html = $this->parseIfPortion($portions[$key], $vars);
                }

                $string = str_replace(trim($portions[$key]), trim($html), trim($string));
            }
        }
        $this->dev = 0;
        return $string;
    }

    /* process the
     * {% if (list) %} || {% if (content='something') %}
     * {% elseif (content='something else') %}
     * {% else %}
     * {% endif %}
     * 
     * @param $string
     * @param $vars
     * @return mixed
     */
    private function parseIfPortion($string, $vars = null)
    {
        if(null == $vars){
            $vars = $this->vars;
        }
        $matches = $submatches = $controls = $offsets = [];

        $pattern = "/(\{% )(if|elseif|else|endif)[\s][\(]?/";
        preg_match_all($pattern, $string, $matches, PREG_OFFSET_CAPTURE);

        foreach($matches[0] as $i => $match){
            $controls[$i] = str_replace(['{%','(',' '],'',$match[0]);
            $offsets[$i] = $match[1];
        }

        foreach($offsets as $i=>$offset){
            $lenght = ($controls[$i] != 'endif')? $offsets[$i + 1] - $offset : 0;
            $portion = substr($string, $offset,$lenght);
            $eval_code = new EvalCode($portion, $vars);
            $var = $eval_code->getVar();

            $portion = substr($portion, $eval_code->getLenght());
            if($var == 'else'){
                return $portion;
            }elseif($var == 'isset'){
                if($this->testIssetVars($eval_code->getCode(), $vars) != false){
                    return $portion;
                }
            }elseif($var != false){
                $teste = ($this->dev == 1)? 1 : 0;
                $value = $this->testIssetVars($eval_code->getCode(), $vars, $teste);
                if($value != false && $eval_code->compareTest($value, $var) == true){
                    return $portion;
                }
            }
        }
    }

    /* process the
     * {% block (list) %}
     * {% endblock %}
     * processed before while and if
     * 
     * @param $string
     * @param $vars
     * @return mixed
     */
    private function parseBlockPortion($string, $vars = null)
    {
        if(null == $vars){
            $vars = $this->vars;
        }
        $matches = $submatches = $controls = $offsets = [];

        $pattern = "/(\{% )(block|endblock)[\s][\(]?/";
        preg_match_all($pattern, $string, $matches, PREG_OFFSET_CAPTURE);

        foreach($matches[0] as $i => $match){
            $controls[$i] = str_replace(['{%','(',' '],'',$match[0]);
            $offsets[$i] = $match[1];
        }

        foreach($offsets as $i=>$offset){
            $lenght = ($controls[$i] != 'endblock')? $offsets[$i + 1] - $offset : 0;
            $portion = substr($string, $offset,$lenght);
            $eval_code = new EvalCode($portion, $vars);
            $var = $eval_code->getVar();

            $portion = substr($portion, $eval_code->getLenght());
            if($var != false){
                $teste = ($this->dev == 1)? 1 : 0;
                $value = $this->testIssetVars($eval_code->getCode(), $vars, $teste);
                if($value != false && $eval_code->compareTest($value, $var) == true){
                    return $portion;
                }
            }
        }
    }


     /**
     * Replace the tags for data
     *
     * @return void
     */
    public function parseTags()
    {
        if (count($this->vars) > 0) {
            foreach ($this->vars as $tag => $data) {
                if(!is_array($data)){
                    $this->output = str_replace('{{ ' . $tag . ' }}', $data, $this->output);
                }
                unset($this->vars[$tag]);
            }
        } else {
            Monitor::setMonitor(Monitor::TPL_WARN, 'No tags were provided for replacement in ' . $this->fileview);
        }
    }


}
