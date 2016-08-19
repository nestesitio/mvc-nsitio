<?php
namespace model\querys;

use \model\models\UserBase;
use \lib\mysql\Mysql;

/**
 * Description of UserBase
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class UserBaseQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserBaseQuery(new \model\models\UserBase(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserBaseQuery(new \model\models\UserBase());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserBaseQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserBase objects
     *
     * @return \model\models\UserBase[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserBase
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserBase
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectId() {
        $this->setSelect(UserBase::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupById() {
        $this->groupBy(UserBase::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectUserGroupId() {
        $this->setSelect(UserBase::FIELD_USER_GROUP_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByUserGroupId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_USER_GROUP_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByUserGroupId($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_USER_GROUP_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByUserGroupId() {
        $this->groupBy(UserBase::FIELD_USER_GROUP_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectName() {
        $this->setSelect(UserBase::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByName() {
        $this->groupBy(UserBase::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectMail() {
        $this->setSelect(UserBase::FIELD_MAIL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByMail($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_MAIL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByMail($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_MAIL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByMail() {
        $this->groupBy(UserBase::FIELD_MAIL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectUsername() {
        $this->setSelect(UserBase::FIELD_USERNAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByUsername($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_USERNAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByUsername($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_USERNAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByUsername() {
        $this->groupBy(UserBase::FIELD_USERNAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectPassword() {
        $this->setSelect(UserBase::FIELD_PASSWORD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByPassword($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_PASSWORD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByPassword($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_PASSWORD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByPassword() {
        $this->groupBy(UserBase::FIELD_PASSWORD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectStatus() {
        $this->setSelect(UserBase::FIELD_STATUS);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByStatus($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_STATUS, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByStatus($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_STATUS, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByStatus() {
        $this->groupBy(UserBase::FIELD_STATUS);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectConfirmed() {
        $this->setSelect(UserBase::FIELD_CONFIRMED);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByConfirmed($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_CONFIRMED, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByConfirmed($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_CONFIRMED, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByConfirmed() {
        $this->groupBy(UserBase::FIELD_CONFIRMED);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectSalt() {
        $this->setSelect(UserBase::FIELD_SALT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterBySalt($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_SALT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderBySalt($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_SALT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupBySalt() {
        $this->groupBy(UserBase::FIELD_SALT);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function selectUserkey() {
        $this->setSelect(UserBase::FIELD_USERKEY);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function filterByUserkey($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserBase::FIELD_USERKEY, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function orderByUserkey($order = Mysql::ASC) {
        $this->orderBy(UserBase::FIELD_USERKEY, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserBaseQuery
     */
    public function groupByUserkey() {
        $this->groupBy(UserBase::FIELD_USERKEY);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyUserQuery
     */
    function joinCompanyUser($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyUser::TABLE, $join, [UserBase::FIELD_ID, \model\models\CompanyUser::FIELD_USER_ID]);
        return \model\querys\CompanyUserQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmLogQuery
     */
    function joinHtmLog($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmLog::TABLE, $join, [UserBase::FIELD_ID, \model\models\HtmLog::FIELD_USER_ID]);
        return \model\querys\HtmLogQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserGroupQuery
     */
    function joinUserGroup($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserGroup::TABLE, $join, [UserBase::FIELD_USER_GROUP_ID, \model\models\UserGroup::FIELD_ID]);
        return \model\querys\UserGroupQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserInfoQuery
     */
    function joinUserInfo($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserInfo::TABLE, $join, [UserBase::FIELD_ID, \model\models\UserInfo::FIELD_USER_ID]);
        return \model\querys\UserInfoQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserLogQuery
     */
    function joinUserLog($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserLog::TABLE, $join, [UserBase::FIELD_ID, \model\models\UserLog::FIELD_USER_ID]);
        return \model\querys\UserLogQuery::useModel($this);
    }
    
    
}