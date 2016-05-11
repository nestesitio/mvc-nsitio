<?php

namespace apps\Admin\model;

use \model\querys\UserBaseQuery;
use \apps\User\model\UserGroupModel;
use \lib\mysql\Mysql;

/**
 * Description of UsersQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersQueries {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\UserBaseQuery;
    */
    public static function get(){
        $groups = [UserGroupModel::GROUP_OWNER, UserGroupModel::GROUP_ADMIN, UserGroupModel::GROUP_ACNT];
        $query = UserBaseQuery::start()->groupById();
        $query->joinUserGroup()->selectName()->filterByName($groups)->endUse();
        $query->joinCompanyUser(Mysql::LEFT_JOIN)
                ->joinUserFunctions(Mysql::LEFT_JOIN)->selectFunction()->endUse()
                ->joinCompany(Mysql::LEFT_JOIN)->selectName()->endUse()
                ->selectId()->selectCompanyId()->selectUserId()->selectUserFunctionsId()->selectCode()->endUse();
	
	$query->joinUserInfo(Mysql::LEFT_JOIN)->selectUserId()->selectAddress()->selectZip()->selectLocal()->selectTlf()->selectTlm()->selectNif()->selectBic()->selectBorn()->selectCivil()->selectGenre()->selectNotes()->endUse();
	$query->joinUserLog(Mysql::LEFT_JOIN)->selectId()->selectUserId()->selectEvent()->selectUpdatedAt()->endUse();
	
        
        return $query;
    }

    

}
