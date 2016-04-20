<?php

namespace apps\Admin\model;

use \model\querys\UserQuery;

/**
 * Description of UsersQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersQuery extends \model\querys\UserQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\UserQuery;
    */
    public static function get(){
        $query = UserQuery::start();
        $query->joinCompanyUser()->selectId()->selectCompanyId()->selectUserId()->selectUserFunctionsId()->endUse();
	$query->joinSupport()->selectId()->selectUserId()->selectSource()->selectStatus()->selectType()->endUse();
	$query->joinSupportLog()->selectId()->selectSupportId()->selectUserId()->selectEvent()->selectNotes()->selectUpdatedAt()->endUse();
	$query->joinUserGroup()->selectId()->selectName()->selectDescription()->endUse();
	$query->joinUserInfo()->selectUserId()->selectAddress()->selectZip()->selectLocal()->selectTlf()->selectTlm()->selectPassword()->selectNotes()->endUse();
	$query->joinUserLog()->selectId()->selectUserId()->selectEvent()->selectUpdatedAt()->endUse();
	
        
        return $query;
    }

    

}
