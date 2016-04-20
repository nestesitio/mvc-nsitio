<?php

namespace apps\Configs\model;

use \model\querys\HtmLayoutQuery;

/**
 * Description of LayoutsQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class LayoutsQuery extends \model\querys\HtmLayoutQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmLayoutQuery;
    */
    public static function get(){
        $query = HtmLayoutQuery::start();
        $query->joinHtmPage()->selectId()->selectHtmId()->selectLangsTld()->selectHtmLayoutId()->selectTitle()->selectSlug()->selectMenu()->selectHeading()->selectUpdatedAt()->endUse();
	
        
        return $query;
    }

    

}
