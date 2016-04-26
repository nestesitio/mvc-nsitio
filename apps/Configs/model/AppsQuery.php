<?php

namespace apps\Configs\model;

use \lib\session\SessionUser;

/**
 * Description of AppsQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 17, 2014
 */
class AppsQuery extends \model\querys\HtmAppQuery {


    /**
     * @return \model\querys\HtmAppQuery
     */
    public static function getApps(){
        return self::start()->orderByName();
    }

    /**
     * @return mixed
     */
    public static function getAppsAccess(){
        return self::start()
                ->joinUserGroupHasHtmApp()
                ->joinUserGroup()
                ->joinUserBase()->filterById(SessionUser::getPlayer())->endUse()
                ->endUse()->endUse()
            ->find();
    }

}
