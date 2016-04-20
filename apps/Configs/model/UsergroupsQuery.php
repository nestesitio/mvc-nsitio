<?php

namespace apps\Configs\model;

use \model\querys\UserGroupQuery;

/**
 * Description of UsergroupsQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsergroupsQuery extends \model\querys\UserGroupQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\UserGroupQuery;
    */
    public static function get(){
        $query = UserGroupQuery::start();
	
        
        return $query;
    }

    

}
