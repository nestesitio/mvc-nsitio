<?php

namespace apps\Configs\model;

use \model\querys\UserBaseQuery;

/**
 * Description of UsersQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2015-01-27 17:17
 * Updated @%$dateUpdated% *
 */
class UsersQuery extends \model\querys\UserBaseQuery {

    /**
    * Create and return the common query to this class
    *
    * @return \model\querys\UserBaseQuery;
    */
    public static function get(){
        $query = UserBaseQuery::start();
        $query->joinClientLog()->selectId()->selectClientId()->selectUserId()->selectEvent()->selectUpdatedAt()->endUse();
	$query->joinTeamPlayer()->selectId()->selectCompanyId()->selectCompanyTeamId()->selectUserId()->selectFunction()->selectDateStart()->selectActive()->endUse();
	$query->joinCompanyUser()->selectId()->selectCompanyId()->selectUserId()->selectUserFunctionsId()->selectCode()->endUse();
	$query->joinPrizeInvoice()->selectId()->selectUserId()->selectInvoiceDate()->selectStatus()->selectAddress()->selectUpdatedAt()->endUse();
	$query->joinPrizeLog()->selectId()->selectPrizeInvoiceId()->selectUserId()->selectEvent()->selectUpdatedAt()->endUse();
	$query->joinSupport()->selectId()->selectUserId()->selectSource()->selectStatus()->selectType()->endUse();
	$query->joinSupportLog()->selectId()->selectSupportId()->selectUserId()->selectEvent()->selectNotes()->selectUpdatedAt()->endUse();
	$query->joinUserGroup()->selectId()->selectName()->selectDescription()->endUse();
	$query->joinUserHasPontuaction()->selectUserId()->selectPontuactionId()->endUse();
	$query->joinUserInfo()->selectUserId()->selectAddress()->selectZip()->selectLocal()->selectTlf()->selectTlm()->selectNif()->selectBic()->selectBorn()->selectCivil()->selectGenre()->selectNotes()->endUse();
	$query->joinUserLog()->selectId()->selectUserId()->selectEvent()->selectUpdatedAt()->endUse();
	
        
        return $query;
    }

    

}
