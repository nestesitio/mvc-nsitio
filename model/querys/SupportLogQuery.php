<?php
namespace model\querys;

use \model\models\SupportLog;
use \lib\mysql\Mysql;

/**
 * Description of SupportLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class SupportLogQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new SupportLogQuery(new \model\models\SupportLog(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new SupportLogQuery(new \model\models\SupportLog());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\SupportLogQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of SupportLog objects
     *
     * @return \model\models\SupportLog[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\SupportLog
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\SupportLog
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectId() {
        $this->setSelect(SupportLog::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(SupportLog::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupById() {
        $this->groupBy(SupportLog::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectSupportId() {
        $this->setSelect(SupportLog::FIELD_SUPPORT_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterBySupportId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(SupportLog::FIELD_SUPPORT_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderBySupportId($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_SUPPORT_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupBySupportId() {
        $this->groupBy(SupportLog::FIELD_SUPPORT_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectUserId() {
        $this->setSelect(SupportLog::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(SupportLog::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupByUserId() {
        $this->groupBy(SupportLog::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectEvent() {
        $this->setSelect(SupportLog::FIELD_EVENT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterByEvent($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(SupportLog::FIELD_EVENT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderByEvent($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_EVENT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupByEvent() {
        $this->groupBy(SupportLog::FIELD_EVENT);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectNotes() {
        $this->setSelect(SupportLog::FIELD_NOTES);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterByNotes($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(SupportLog::FIELD_NOTES, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderByNotes($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_NOTES, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupByNotes() {
        $this->groupBy(SupportLog::FIELD_NOTES);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function selectUpdatedAt() {
        $this->setSelect(SupportLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function filterByUpdatedAt($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(SupportLog::FIELD_UPDATED_AT, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function orderByUpdatedAt($order = Mysql::ASC) {
        $this->orderBy(SupportLog::FIELD_UPDATED_AT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportLogQuery
     */
    public function groupByUpdatedAt() {
        $this->groupBy(SupportLog::FIELD_UPDATED_AT);
        return $this;
    }
    
    
}