<?php

namespace lib\view;

/**
 * Description of EvalCode
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 18, 2014
 */
class EvalCode
{
    /**
     * @var string
     */
    private $code = '';
    /**
     * @var
     */
    private $lenght;
    /**
     * @var
     */
    private $string;


    /**
     * EvalCode constructor.
     * @param $string
     */
    public function __construct($string)
    {
        $this->lenght = strpos($string, '%}') + 2;
        $this->string = $string;
        $this->code = str_replace(
                ['{% ', ' elseif ', '('], ['', '', '($'], strstr($string, ' %}', true));
    }

    /**
     * @param $value
     * @param $operator
     * @param int $teste
     * @return bool
     */
    public function compareTest($value, $operator, $teste = 0)
    {
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

    /**
     * @param $var
     * @return array
     */
    public function formatVar($var)
    {
        if(strpos($var, '.')){
            $parent = strstr($var, '.', true);
            $child = substr(strstr($var, '.'),1);
            return [0=>str_replace('$','',$parent), 1=>$child];
        }else{
            return [0=>str_replace('$','',$var)];
        }
    }

    /**
     * @return mixed
     */
    public function getLenght()
    {
        return $this->lenght;
    }


    /**
     * @return mixed
     */
    public function getCode()
    {
        return str_replace(['elseif','))'],['if',')'],$this->code);
    }

    /**
     * @return bool|string
     */
    public function getVar()
    {
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
        if(empty($var) && $this->code=='else') {
            return 'else';
        }elseif(empty($var)){
            return false;
        }else{
            $this->code = $format_var;
            return $function;
        }
    }

}
