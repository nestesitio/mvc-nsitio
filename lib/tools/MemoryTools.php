<?php

namespace lib\tools;

use \lib\register\Registry;

/**
 * Description of MemoryTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Feb 4, 2015
 */
class MemoryTools {

    public static function getMemoryUsage(){
        return ((memory_get_peak_usage() - Registry::getMemoryInitial()['mem'])/1024);
    }
    
    public static function getMemory(){
        return memory_get_usage();
    }

    public static function getTimeExecution() {
        $t = ((microtime(true) - Registry::getMemoryInitial()['time']) / 1000000 );
        return number_format($t, 10, '.', ' ');
    }

}