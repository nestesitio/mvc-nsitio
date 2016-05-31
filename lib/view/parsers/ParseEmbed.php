<?php

namespace lib\view\parsers;

/**
 * Description of ParseEmbed
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @May 31, 2016
 */
class ParseEmbed {

    /**
     * Pattern for include tag
     * @var string
     */
    const PATTERN_EMBED = "/\{@embed ([^}]+)\}/";
    /**
     * @var string
     */
    const TAG_EMBED = "{@embed";
    
    public static function parse($output){
        $matches = [];
        if (strpos($output, self::TAG_EMBED) !== false) {
            preg_match_all(self::PATTERN_EMBED, $output, $matches, PREG_SET_ORDER);
            foreach ($matches as $match) {
                $output = str_replace($match[0], self::getEmbed($match[1]), $output);
            }
        }
        return $output;
    }
    
    private static function getEmbed($argument){
        $args = self::getArgs($argument);
        
        if(null != $args['control']){
            return \lib\loader\Boot::embed($args['control'], $args['action'], $args['view']);
        }elseif(null != $args['view']  && null != $args['vars']){
            $template = new \lib\view\Template($args['view']);
            /*
            foreach($args['vars'] as $tag){
                $template->addData($tag, $vars);
            }
             * 
             */
            $template->parseTemplate();
            return $template->getOutput();
        }
        
    }
    
    
    
    private static function getArgs($argument){
        $arr = ['control'=>null, 'action'=>null, 'view'=>null, 'vars'=>null];
        // control:'Home\Home' action:'homenav'; view:'controls/Home/view/nav.htm'; vars:$var
        $args = explode(';', $argument);
        foreach($args as $arg){
            list($key, $value) = explode(':', trim($arg));
            $value = str_replace(['"', "'"], "", $value);
            
            if($key == 'control'){
                $arr['control'] = $value;
            }
            if($key == 'action'){
                $arr['action'] = $value;
            }
            if($key == 'view'){
                $arr['view'] = $value;
            }
            if($key == 'vars'){
                $arr['vars'] = explode(',', $value);
            }
        }
        return $arr;
        
    }

}
