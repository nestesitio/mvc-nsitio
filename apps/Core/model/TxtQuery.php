<?php

namespace apps\Core\model;

use \model\querys\HtmPageQuery;

/**
 * Description of TxtQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class TxtQuery extends \model\querys\HtmPageQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmPageQuery;
    */
    public static function get(){
        $query = HtmPageQuery::start();
        $query->joinHtm()->selectId()->selectHtmAppId()->selectStat()->selectOrd()->endUse();
	$query->joinHtmLayout()->selectId()->selectName()->endUse();
	$query->joinLangs()->selectTld()->endUse();
	$query->joinHtmTxt()->selectId()->selectHtmPageId()->selectType()->selectTxt()->endUse();
	
        
        return $query;
    }

    

}
