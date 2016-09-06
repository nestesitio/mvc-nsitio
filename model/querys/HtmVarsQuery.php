<?php
namespace model\querys;

use \model\models\HtmVars;
use \lib\mysql\Mysql;

/**
 * Description of HtmVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-29 16:42
 * Updated @2016-08-29 16:42
 */
class HtmVarsQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmVarsQuery(new \model\models\HtmVars(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmVarsQuery(new \model\models\HtmVars());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmVarsQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmVars objects
     *
     * @return \model\models\HtmVars[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmVars
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmVars
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function selectId() {
        $this->setSelect(HtmVars::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmVars::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmVars::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function groupById() {
        $this->groupBy(HtmVars::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function selectVar() {
        $this->setSelect(HtmVars::FIELD_VAR);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function filterByVar($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmVars::FIELD_VAR, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function orderByVar($order = Mysql::ASC) {
        $this->orderBy(HtmVars::FIELD_VAR, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function groupByVar() {
        $this->groupBy(HtmVars::FIELD_VAR);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function selectValue() {
        $this->setSelect(HtmVars::FIELD_VALUE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function filterByValue($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmVars::FIELD_VALUE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function orderByValue($order = Mysql::ASC) {
        $this->orderBy(HtmVars::FIELD_VALUE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function groupByValue() {
        $this->groupBy(HtmVars::FIELD_VALUE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function selectStatus() {
        $this->setSelect(HtmVars::FIELD_STATUS);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function filterByStatus($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmVars::FIELD_STATUS, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function orderByStatus($order = Mysql::ASC) {
        $this->orderBy(HtmVars::FIELD_STATUS, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmVarsQuery
     */
    public function groupByStatus() {
        $this->groupBy(HtmVars::FIELD_STATUS);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmHasVarsQuery
     */
    function joinHtmHasVars($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmHasVars::TABLE, $join, [HtmVars::FIELD_ID, \model\models\HtmHasVars::FIELD_HTM_VARS_ID]);
        return \model\querys\HtmHasVarsQuery::useModel($this);
    }
    
    
}