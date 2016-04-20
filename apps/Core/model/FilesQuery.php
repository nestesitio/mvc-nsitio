<?php

namespace apps\Core\model;

use \model\querys\HtmMediaQuery;

/**
 * Description of FilesQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class FilesQuery extends \model\querys\HtmMediaQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmMediaQuery;
    */
    public static function get(){
        $query = HtmMediaQuery::start();
        $query->joinHtm()->selectId()->selectHtmAppId()->selectStat()->selectOrd()->endUse();
	
        
        return $query;
    }

    

}
