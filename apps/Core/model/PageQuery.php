<?php

namespace apps\Core\model;

use \lib\mysql\Mysql;
use \lib\session\SessionUser;

/**
 * Description of PageQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 15, 2014
 */
class PageQuery extends \model\querys\HtmPageQuery {

    /**
     * @param string $merge
     * @return \model\querys\HtmPageQuery
     */
    public static function start($merge = ALL){
        /*
        $model = new \apps\Core\model\HtmPage();
        $model->initialize();
        echo '+++++';
        $obj = new PageQuery($model, $merge);
        echo '*******';
        return $obj;
         * 
         */
        return parent::start();
    }

    /**
     * @param $htmapp
     * @param $canonical
     * @return mixed
     */
    public static function getPageRoute($htmapp, $canonical){
        $result = self::start()
                ->joinHtm()->joinHtmApp()->filterBySlug($htmapp)->joinUserGroupHasHtmApp()->joinUserGroup()
                ->joinUserBase()->filterById(SessionUser::getPlayer())->endUse()->endUse()->endUse()->endUse()->endUse()
                ->filterBySlug($canonical)->findOne();
        //filterById(SELECT hp.id FROM htm_page hp WHERE hp.htm_id=ht_page.htm_id ORDER BY CASE WHEN hp.langs_tld = '".Regist::vars('lg')."' THEN 1 WHEN hp.langs_tld = '".Regist::vars('lgInt')."' THEN 2 WHEN hp.langs_tld = '".Regist::vars('lgDef')."' THEN 3 END LIMIT 1))
        return $result;
    }

    /**
     * @param $htmapp
     * @param $canonical
     * @return \model\models\HtmApp
     */
    public static function getPageExists($htmapp, $canonical){
        $result = self::start()
                ->joinHtm()->joinHtmApp()->filterBySlug($htmapp)->endUse()->endUse()
                ->filterBySlug($canonical)->findOne();
        //filterById(SELECT hp.id FROM htm_page hp WHERE hp.htm_id=ht_page.htm_id ORDER BY CASE WHEN hp.langs_tld = '".Regist::vars('lg')."' THEN 1 WHEN hp.langs_tld = '".Regist::vars('lgInt')."' THEN 2 WHEN hp.langs_tld = '".Regist::vars('lgDef')."' THEN 3 END LIMIT 1))
        return $result;
    }
    
    /**
     * Completes query and return a collection of HtmPage objects
     *
     * @return \model\models\HtmPage[]
     */
    public static function getBackendPages(){
        return self::start()->joinHtm()->filterByStat('backend')->filterByOrd(0, Mysql::ALT_NOT_EQUAL)->orderByOrd()
                ->joinHtmApp()->selectSlug()
                ->joinUserGroupHasHtmApp()->joinUserGroup()
                ->joinUserBase()->filterById(SessionUser::getPlayer())->endUse()
                ->endUse()->endUse()->endUse()->endUse()
                ->orderByTitle();
        //filterById(SELECT hp.id FROM htm_page hp WHERE hp.htm_id=ht_page.htm_id ORDER BY CASE WHEN hp.langs_tld = '".Regist::vars('lg')."' THEN 1 WHEN hp.langs_tld = '".Regist::vars('lgInt')."' THEN 2 WHEN hp.langs_tld = '".Regist::vars('lgDef')."' THEN 3 END LIMIT 1))
    }
    


    /**
     * @param $id
     * @return mixed
     */
    public static function getPageById($id){
        return self::start()
                ->joinHtm()->joinHtmApp()->selectSlug()->endUse()->endUse()
                ->filterByHtmId($id)->findOne();
    }

    /**
     * @return \model\querys\HtmPageQuery
     */
    public static function getPages(){
        return self::start();
    }

    /**
     * @param $id
     * @param $tld
     * @return mixed
     */
    public static function getPageFromAnotherLang($id, $tld){
        return self::start()
                ->joinHtm()->joinHtmApp()->selectSlug()->endUse()->endUse()
                ->filterByHtmId($id)->filterByLangsTld($tld, Mysql::NOT_EQUAL)->findOne();
    }
            

}
