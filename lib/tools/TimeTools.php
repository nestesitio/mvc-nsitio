<?php

namespace lib\tools;

/**
 * Description of TimeTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 17, 2015
 */
class TimeTools {
    
    public static function serializeDate($datetime){
        $datetime = trim($datetime);
        $date = [];
        if(strpos($datetime, ' ')){
            list($date['date'], $date['time']) = explode(' ', $datetime);
        }else{
            $date['date'] = $datetime;
            $date['time'] = '00:00:00';
        }
        list($y, $m, $d) = explode('-', $date['date']);
        $date['date'] = ['y'=>$y, 'm'=>$m, 'd'=>$d];
        list($h, $i, $s) = explode(':', $date['time']);
        $date['time'] = ['h'=>$h, 'i'=>$i, 's'=>$s];
        return $date;
    }

    public static function modify($datetime, $y = null, $m = null, $d = null, $h = null, $i = null, $s = null){
        $date = self::serializeDate($datetime);
        if($y === null){
            $y = $date['date']['y'];
        }
        if($m === null){
            $m = $date['date']['m'];
        }
        if($d === null){
            $d = $date['date']['d'];
        }
        if($h === null){
            $h = $date['time']['h'];
        }
        if($i === null){
            $i = $date['time']['i'];
        }
        if($s === null){
            $s = $date['time']['s'];
        }
        return date("Y-m-d H:i:s", mktime($h, $i, $s, $m, $d, $y));
    }

}
