<?php
namespace model\querys;

use \model\models\Support;
use \lib\mysql\Mysql;

/**
 * Description of Support
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class SupportQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new SupportQuery(new \model\models\Support(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new SupportQuery(new \model\models\Support());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\SupportQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of Support objects
     *
     * @return \model\models\Support[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\Support
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\Support
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function selectId() {
        $this->setSelect(Support::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Support::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(Support::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function groupById() {
        $this->groupBy(Support::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function selectUserId() {
        $this->setSelect(Support::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Support::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(Support::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function groupByUserId() {
        $this->groupBy(Support::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function selectSource() {
        $this->setSelect(Support::FIELD_SOURCE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function filterBySource($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Support::FIELD_SOURCE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function orderBySource($order = Mysql::ASC) {
        $this->orderBy(Support::FIELD_SOURCE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function groupBySource() {
        $this->groupBy(Support::FIELD_SOURCE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function selectStatus() {
        $this->setSelect(Support::FIELD_STATUS);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function filterByStatus($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Support::FIELD_STATUS, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function orderByStatus($order = Mysql::ASC) {
        $this->orderBy(Support::FIELD_STATUS, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function groupByStatus() {
        $this->groupBy(Support::FIELD_STATUS);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function selectType() {
        $this->setSelect(Support::FIELD_TYPE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function filterByType($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Support::FIELD_TYPE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function orderByType($order = Mysql::ASC) {
        $this->orderBy(Support::FIELD_TYPE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\SupportQuery
     */
    public function groupByType() {
        $this->groupBy(Support::FIELD_TYPE);
        return $this;
    }
    
    
}