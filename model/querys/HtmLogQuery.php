<?php
namespace model\querys;

use \model\models\HtmLog;
use \lib\mysql\Mysql;

/**
 * Description of HtmLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class HtmLogQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmLogQuery(new \model\models\HtmLog(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmLogQuery(new \model\models\HtmLog());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmLogQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmLog objects
     *
     * @return \model\models\HtmLog[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmLog
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmLog
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectId() {
        $this->setSelect(HtmLog::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmLog::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupById() {
        $this->groupBy(HtmLog::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmLog::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmLog::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmLog::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectUserId() {
        $this->setSelect(HtmLog::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmLog::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupByUserId() {
        $this->groupBy(HtmLog::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectEvent() {
        $this->setSelect(HtmLog::FIELD_EVENT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterByEvent($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmLog::FIELD_EVENT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderByEvent($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_EVENT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupByEvent() {
        $this->groupBy(HtmLog::FIELD_EVENT);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectDescription() {
        $this->setSelect(HtmLog::FIELD_DESCRIPTION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterByDescription($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmLog::FIELD_DESCRIPTION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderByDescription($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_DESCRIPTION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupByDescription() {
        $this->groupBy(HtmLog::FIELD_DESCRIPTION);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function selectUpdatedAt() {
        $this->setSelect(HtmLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function filterByUpdatedAt($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(HtmLog::FIELD_UPDATED_AT, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function orderByUpdatedAt($order = Mysql::ASC) {
        $this->orderBy(HtmLog::FIELD_UPDATED_AT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmLogQuery
     */
    public function groupByUpdatedAt() {
        $this->groupBy(HtmLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmLog::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserBaseQuery
     */
    function joinUserBase($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserBase::TABLE, $join, [HtmLog::FIELD_USER_ID, \model\models\UserBase::FIELD_ID]);
        return \model\querys\UserBaseQuery::useModel($this);
    }
    
    
}