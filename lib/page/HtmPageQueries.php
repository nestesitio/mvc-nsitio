<?php

namespace lib\page;

use \lib\mysql\Mysql;
use \lib\session\SessionUser;

/**
 * Description of HtmPageQueries
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 17, 2016
 */
class HtmPageQueries extends \model\querys\HtmPageQuery {

    /**
     * used in DBRouting
     * @param string $htmapp
     * @param string $canonical
     * 
     * @return \model\models\HtmPage
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
     * used in DBRouting
     * @param string $htmapp
     * @param string $canonical
     * 
     * @return \model\models\HtmPage
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
     * used by BackendMenuActions
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
     * used by lib\url\Redirect
     * @param int $id
     * @return \model\models\HtmPage
     */
    public static function getPageById($id){
        return self::start()
                ->joinHtm()->joinHtmApp()->selectSlug()->endUse()->endUse()
                ->filterByHtmId($id)->findOne();
    }


    /**
     * used by apps\Core\model\PageForm
     * @param int $id
     * @param string $tld
     * @return \model\models\HtmPage
     */
    public static function getPageFromAnotherLang($id, $tld){
        return self::start()
                ->joinHtm()->joinHtmApp()->selectSlug()->endUse()->endUse()
                ->filterByHtmId($id)->filterByLangsTld($tld, Mysql::NOT_EQUAL)->findOne();
    }

}
