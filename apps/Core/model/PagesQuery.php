<?php

namespace apps\Core\model;

use \model\querys\HtmPageQuery;
use \lib\mysql\Mysql;
use \model\querys\LangsQuery;
use \model\models\HtmPage;
use \model\querys\HtmQuery;

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
    public static function getList($app_slug){
        $query = HtmPageQuery::start()->filterBySlug('index', Mysql::NOT_EQUAL);
        $query->joinHtm()->groupById()
                ->joinHtmPageHasVars(Mysql::LEFT_JOIN)
                ->selectHtmId()->selectHtmVarsId()
                ->joinHtmVars(Mysql::LEFT_JOIN)->endUse()->endUse()
                ->joinHtmApp()->filterBySlug($app_slug)->endUse()
                ->selectId()->selectHtmAppId()->selectStat()->selectOrd()->endUse();
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
    
    /**
     * 
     * @return Htm
     */
    public static function getPages(){
        $query = HtmQuery::start()->groupById();
        $query->joinHtmApp()->selectSlug()->selectName()->endUse();
        $query->joinHtmPage()->selectId()->selectMenu()->selectSlug()->selectTitle()
                ->joinLangs()->selectTld()->endUse()
                ->endUse();
        
        
        return $query;
    }
    
    /**
     * 
     * @param string $app_slug
     * @param type $var
     * @param type $value
     * @param string $txt
     * 
     * @return HtmQuery
     */
    public static function getHtmByOrd($app_slug, $txt, $lang){
        $query = HtmQuery::start()->orderByOrd();
        $query->joinHtmApp()->filterBySlug($app_slug)->endUse();
        $query->joinHtmPage()->filterByLangsTld($lang)
                ->selectSlug()->selectTitle()->selectHeading()
                ->joinHtmTxt(Mysql::LEFT_JOIN)->filterByType($txt)->selectTxt()
                ->endUse()->endUse();
        
        return $query;
    }
    
    public static function getPage($app_slug){
        $query = HtmQuery::start()->orderByOrd();
        $query->joinHtmApp()->filterBySlug($app_slug)->endUse();
    }
    
    

}
