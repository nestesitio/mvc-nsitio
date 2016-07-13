<?php
namespace model\querys;

use \model\models\UserGroupHasHtmApp;
use \lib\mysql\Mysql;

/**
 * Description of UserGroupHasHtmApp
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class UserGroupHasHtmAppQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserGroupHasHtmAppQuery(new \model\models\UserGroupHasHtmApp(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserGroupHasHtmAppQuery(new \model\models\UserGroupHasHtmApp());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserGroupHasHtmApp objects
     *
     * @return \model\models\UserGroupHasHtmApp[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserGroupHasHtmApp
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserGroupHasHtmApp
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function selectUserGroupId() {
        $this->setSelect(UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function filterByUserGroupId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function orderByUserGroupId($order = Mysql::ASC) {
        $this->orderBy(UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function groupByUserGroupId() {
        $this->groupBy(UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function selectHtmAppId() {
        $this->setSelect(UserGroupHasHtmApp::FIELD_HTM_APP_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function filterByHtmAppId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserGroupHasHtmApp::FIELD_HTM_APP_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function orderByHtmAppId($order = Mysql::ASC) {
        $this->orderBy(UserGroupHasHtmApp::FIELD_HTM_APP_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    public function groupByHtmAppId() {
        $this->groupBy(UserGroupHasHtmApp::FIELD_HTM_APP_ID);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmAppQuery
     */
    function joinHtmApp($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmApp::TABLE, $join, [UserGroupHasHtmApp::FIELD_HTM_APP_ID, \model\models\HtmApp::FIELD_ID]);
        return \model\querys\HtmAppQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserGroupQuery
     */
    function joinUserGroup($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserGroup::TABLE, $join, [UserGroupHasHtmApp::FIELD_USER_GROUP_ID, \model\models\UserGroup::FIELD_ID]);
        return \model\querys\UserGroupQuery::useModel($this);
    }
    
    
}