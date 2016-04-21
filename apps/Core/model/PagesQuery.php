<?php

namespace apps\Core\model;

use \model\querys\HtmPageQuery;
use \lib\mysql\Mysql;
use \model\querys\LangsQuery;
use \model\models\HtmPage;

/**
 * Description of PagesQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Jul 27, 2015
 */
class PagesQuery extends \model\querys\HtmPageQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmPageQuery;
    */
    public static function get($app_slug){
        $query = HtmPageQuery::start()->filterBySlug('index', Mysql::NOT_EQUAL);
        $query->joinHtm()
                ->joinHtmApp()->filterBySlug($app_slug)->endUse()
                ->selectId()->selectHtmAppId()->selectStat()->selectOrd()->endUse();
	$query->joinHtmLayout()->selectName()->endUse();
	$query->joinHtmTxt(Mysql::LEFT_JOIN)->selectId()->selectType()->selectTxt()->endUse();
	$query->orderByTitle();
        
        return $query;
    }
    
    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\HtmPageQuery;
    */
    public static function getPageByLang($htm_id, $lang){
        $query = HtmPageQuery::start()
                ->filterByHtmId($htm_id)->filterByLangsTld($lang)->groupById();
	$query->joinHtmTxt(Mysql::LEFT_JOIN)
                ->selectId()->selectHtmPageId()->selectType()->selectTxt()->endUse();
        
        return $query;
    }


    /**
     * @param $htm_id
     * @return HtmPageQuery
     */
    public static function getLangs($htm_id){
        return LangsQuery::start()
                ->joinHtmPage(Mysql::LEFT_JOIN)
                ->addJoinCondition(HtmPage::TABLE, HtmPage::FIELD_HTM_ID, $htm_id)
                ->selectLangsTld()->endUse();
    }
    
    

}
