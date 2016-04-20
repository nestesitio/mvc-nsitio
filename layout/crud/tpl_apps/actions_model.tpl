<?php

namespace apps\%$nameApp%\model;

use \model\querys\%$modelName%Query;

/**
 * Description of %$className%Query
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class %$className%Queries {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\%$modelName%Query;
    */
    public static function get(){
        $query = %$modelName%Query::start();
        #$query->join->endUse();
        
        return $query;
    }

    

}
