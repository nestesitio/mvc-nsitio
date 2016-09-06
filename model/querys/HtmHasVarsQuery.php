<?php
namespace model\querys;

use \model\models\HtmHasVars;
use \lib\mysql\Mysql;

/**
 * Description of HtmHasVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class HtmHasVarsQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmHasVarsQuery(new \model\models\HtmHasVars(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmHasVarsQuery(new \model\models\HtmHasVars());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmHasVarsQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmHasVars objects
     *
     * @return \model\models\HtmHasVars[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmHasVars
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmHasVars
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function selectHtmVarsId() {
        $this->setSelect(HtmHasVars::FIELD_HTM_VARS_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function filterByHtmVarsId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasVars::FIELD_HTM_VARS_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function orderByHtmVarsId($order = Mysql::ASC) {
        $this->orderBy(HtmHasVars::FIELD_HTM_VARS_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function groupByHtmVarsId() {
        $this->groupBy(HtmHasVars::FIELD_HTM_VARS_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmHasVars::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasVars::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmHasVars::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasVarsQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmHasVars::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmHasVars::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmVarsQuery
     */
    function joinHtmVars($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmVars::TABLE, $join, [HtmHasVars::FIELD_HTM_VARS_ID, \model\models\HtmVars::FIELD_ID]);
        return \model\querys\HtmVarsQuery::useModel($this);
    }
    
    
}