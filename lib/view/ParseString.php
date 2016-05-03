<?php

namespace lib\view;

use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of ParseTag
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @ Nov 17, 2014
 */
class ParseString
{
    /**
     * @var String
     */
    private $string;
    /**
     * @var array
     */
    private $tags = [];
    /**
     * @var array
     */
    private $portions = [];
    /**
     * @var array
     */
    private $args = [];

    /**
     * Declare the string to be processed
     * @param String $string The string to be processed
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Find the tags to be processed
     *
     * @return void
     */
    public function find($tag)
    {
        //Registry::setMonitor(Monitor::TPL, $tag);
        $matches = [];
        $matches_b = [];
        $p_functions = '('.$tag.')';
        $pattern = "/(\{% ){1}" . $p_functions . "{1}[\s](\()[^)]*(\)\s%\})/";

        preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);
        //PREG_SET_ORDER, PREG_OFFSET_CAPTURE
        $i = 0;
        foreach ($matches[0] as $match) {
            $this->tags[$i] = $tag;
            $this->args[$i] = str_replace(["{% $tag (",") %}"], '', $match[0]);
            $endtag = "{% end" . $tag . " %}";
            if (strpos($this->string, $endtag)) {
                if ($tag == 'while') {
                    $this->portions[$i] = $this->findTagWhile($match[0], $endtag, $match[1]);
                } elseif ($tag == 'block') {
                    $this->portions[$i] = $this->findBlock($match[0], $endtag, $match[1]);
                } elseif ($tag == 'if') {
                    $this->portions[$i] = $this->findTagIf($match[0], $endtag, $match[1]);
                }else{
                    preg_match_all(
                            //"/" . "(" . preg_quote($match[0]) . "){1}" . "?(.|\n)+" .
                            "/" . "(" . preg_quote($match[0]) . "){1}" . "?(.)+" .
                            "(" . preg_quote($endtag) . "){1}" .
                            "/", $this->string, $matches_b, PREG_PATTERN_ORDER);

                    $this->portions[$i] = substr($matches_b[0][0], 0, strpos($matches_b[0][0], $endtag) + strlen($endtag));
                }
            }else{
                $this->portions[$i] = $match[0];
            }

            $i++;
        }
    }

    /**
     * @param $start_tag
     * @param $end_tag
     * @param $pos
     * @return string
     */
    private function findBlock($start_tag, $end_tag, $pos)
    {
        $string = substr($this->string, $pos);
        $portion = str_replace($start_tag, '', $string);
        $p1 = strpos($portion, $end_tag);
        $p2 = strpos($portion, '{% block');
        if($p1 > $p2 && $p2 !== false){
            //block inside block
            return '';
        }else{
            return $start_tag . substr($portion, 0, $p1) . $end_tag;
        }
    }

    /**
     * @param $start_tag
     * @param $end_tag
     * @param $pos
     * @return string
     */
    private function findTagIf($start_tag, $end_tag, $pos)
    {
        $string = substr($this->string, $pos);
        $portion = str_replace($start_tag, '', $string);
        $p1 = strpos($portion, $end_tag);
        $p2 = strpos($portion, '{% if');
        if($p1 > $p2 && $p2 !== false){
            //if inside if
            return '';
        }else{
            return $start_tag . substr($portion, 0, $p1) . $end_tag;
        }
    }

    /**
     * @param $start_tag
     * @param $end_tag
     * @param $pos
     * @return string
     */
    private function findTagWhile($start_tag, $end_tag, $pos)
    {
         $string = substr($this->string, $pos);
        $portion = str_replace($start_tag, '', $string);
        $p1 = strpos($portion, $end_tag);
        $p2 = strpos($portion, '{% while');
        if($p1 > $p2 && $p2 !== false){
            //while inside while
            return '';
        }else{
            return $start_tag . substr($portion, 0, $p1) . $end_tag;
        }
    }

    /**
     * @return String
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Return the portion of string
     * @param String $k The key of the array
     *
     * @return String $this->portions[$k]
     */
    public function getPortion($k = null)
    {
        return (null == $k)? $this->portions : $this->portions[$k];
    }

    /**
     * @param $k
     * @return array|mixed
     */
    public function getArgs($k = null)
    {
        return (null == $k)? $this->args : $this->args[$k];
    }

    /**
     * @param $k
     * @return array|mixed
     */
    public function getTag($k = null)
    {
        return (null == $k)? $this->tags : $this->tags[$k];
    }


}
