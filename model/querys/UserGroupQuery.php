<?php
namespace model\querys;

use \model\models\UserGroup;
use \lib\mysql\Mysql;

/**
 * Description of UserGroup
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class UserGroupQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserGroupQuery(new \model\models\UserGroup(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserGroupQuery(new \model\models\UserGroup());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserGroupQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserGroup objects
     *
     * @return \model\models\UserGroup[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserGroup
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserGroup
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function selectId() {
        $this->setSelect(UserGroup::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserGroup::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(UserGroup::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function groupById() {
        $this->groupBy(UserGroup::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function selectName() {
        $this->setSelect(UserGroup::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserGroup::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(UserGroup::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function groupByName() {
        $this->groupBy(UserGroup::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function selectDescription() {
        $this->setSelect(UserGroup::FIELD_DESCRIPTION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function filterByDescription($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserGroup::FIELD_DESCRIPTION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function orderByDescription($order = Mysql::ASC) {
        $this->orderBy(UserGroup::FIELD_DESCRIPTION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserGroupQuery
     */
    public function groupByDescription() {
        $this->groupBy(UserGroup::FIELD_DESCRIPTION);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserBaseQuery
     */
    function joinUserBase($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserBase::TABLE, $join, [UserGroup::FIELD_ID, \model\models\UserBase::FIELD_USER_GROUP_ID]);
        return \model\querys\UserBaseQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    function joinUserGroupHasHtmApp($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserGroupHasHtmApp::TABLE, $join, [UserGroup::FIELD_ID, \model\models\UserGroupHasHtmApp::FIELD_USER_GROUP_ID]);
        return \model\querys\UserGroupHasHtmAppQuery::useModel($this);
    }
    
    
}