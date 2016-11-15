<?php
namespace model\querys;

use \model\models\UserLog;
use \lib\mysql\Mysql;

/**
 * Description of UserLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:03
 * Updated @2016-11-15 17:03
 */
class UserLogQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserLogQuery(new \model\models\UserLog(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserLogQuery(new \model\models\UserLog());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserLogQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserLog objects
     *
     * @return \model\models\UserLog[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserLog
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserLog
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function selectId() {
        $this->setSelect(UserLog::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserLog::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(UserLog::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function groupById() {
        $this->groupBy(UserLog::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function selectUserId() {
        $this->setSelect(UserLog::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserLog::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(UserLog::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function groupByUserId() {
        $this->groupBy(UserLog::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function selectEvent() {
        $this->setSelect(UserLog::FIELD_EVENT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function filterByEvent($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserLog::FIELD_EVENT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function orderByEvent($order = Mysql::ASC) {
        $this->orderBy(UserLog::FIELD_EVENT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function groupByEvent() {
        $this->groupBy(UserLog::FIELD_EVENT);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function selectUpdatedAt() {
        $this->setSelect(UserLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function filterByUpdatedAt($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(UserLog::FIELD_UPDATED_AT, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function orderByUpdatedAt($order = Mysql::ASC) {
        $this->orderBy(UserLog::FIELD_UPDATED_AT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserLogQuery
     */
    public function groupByUpdatedAt() {
        $this->groupBy(UserLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserBaseQuery
     */
    function joinUserBase($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserBase::TABLE, $join, [UserLog::FIELD_USER_ID, \model\models\UserBase::FIELD_ID]);
        return \model\querys\UserBaseQuery::useModel($this);
    }
    
    
}