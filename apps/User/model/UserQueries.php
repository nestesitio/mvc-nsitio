<?php

namespace apps\User\model;

use \model\querys\UserBaseQuery;
use \model\models\PrpPremiation;
use \lib\mysql\Mysql;

/**
 * Description of UserQueries
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 16, 2016
 */
class UserQueries {
    
    /**
    * Get the user data
    *
    * @return \model\querys\UserBaseQuery;
    */
    public static function getUserData($id){
        $query = UserBaseQuery::start(ONLY)
                ->filterById($id)->selectName()->selectMail()
                ->joinCompanyUser(Mysql::LEFT_JOIN)->selectActive()->selectCode()
                    ->joinCompany(Mysql::LEFT_JOIN)->selectId()->selectName()->endUse()
                ->endUse()
                ->joinUserGroup()->selectId()->selectName()->endUse();
        
        return $query;
    }
    
    /**
    * Get the user data
    *
    * @return \model\querys\UserBaseQuery;
    */
    public static function getUserGroup($id){
        $query = UserBaseQuery::start(ONLY)->filterById($id)
                ->joinUserGroup()->selectId()->selectName()->endUse();
        
        return $query;
    }

}
