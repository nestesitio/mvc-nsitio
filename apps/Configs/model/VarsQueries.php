<?php

namespace apps\Configs\model;

use \model\querys\HtmVarsQuery;
use \lib\mysql\Mysql;

/**
 * Description of VarsQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class VarsQueries {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmVarsQuery;
    */
    public static function get(){
        $query = HtmVarsQuery::start()->groupById();
        $query->joinHtmHasVars(Mysql::LEFT_JOIN)->selectHtmVarsId()->selectHtmId()->endUse();
	
        
        return $query;
    }

    

}
