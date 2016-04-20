<?php

namespace lib\view;

/**
 * Description of EvalCode
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 18, 2014
 */
class EvalCode {
    
    private $code = '';
    private $lenght;
    private $string;


    function __construct($string) {
        $this->lenght = strpos($string, '%}') + 2;
        $this->string = $string;
        $this->code = str_replace(
                ['{% ', ' elseif ', '('], ['', '', '($'], strstr($string, ' %}', true));
    }
    
    public function compareTest($value, $operator, $teste = 0){
        $compare = str_replace("'",'',strstr(strstr($this->string, "'"), "')",true));
        switch ($operator) {
            case('='):
                if ($compare == $value) {
                    return true;
                }
                break;
            case('<'):
                if ($compare < $value) {
                    return true;
                }
                break;
            case('=<'):
                if ($compare <= $value) {
                    return true;
                }
                break;
            case('>'):
                if ($compare > $value) {
                    return true;
                }
                break;
            case('>='):
                if ($compare >= $value) {
                    return true;
                }
                break;
            default : return true;
        }
    }

    public function formatVar($var){
        if(strpos($var, '.')){
            $parent = strstr($var, '.', true);
            $child = substr(strstr($var, '.'),1);      
            return [0=>str_replace('$','',$parent), 1=>$child];
        }else{
            return [0=>str_replace('$','',$var)];
        }
    }
    
    public function getLenght(){
        return $this->lenght;
    }


    public function getCode(){
        return str_replace(['elseif','))'],['if',')'],$this->code);
    }
    
    public function getVar(){
        $function = '';
        $var = strstr($this->code, '$');
        if (strpos($this->code, '=')) {
            $var = strstr($var, '=', true);
            $function = '=';
        } elseif (strpos($this->code, '<')) {
            $function = '<';
            $var = strstr($var, '<', true);
        } elseif (strpos($this->code, '>')) {
            $function = '>';
            $var = strstr($var, '>', true);
        } elseif (strpos($this->code, ')')) {
            $var = strstr($var, ')', true);
            $function = 'isset';
        }
        $format_var = $this->formatVar($var);
        if(empty($var) && $this->code=='else'){
            return 'else';
        }elseif(empty($var)){
            return false;
        }else{
            $this->code = $format_var;
            return $function;
        }
    }

}
