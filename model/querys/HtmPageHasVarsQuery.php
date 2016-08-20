<?php
namespace model\querys;

use \model\models\HtmPageHasVars;
use \lib\mysql\Mysql;

/**
 * Description of HtmPageHasVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class HtmPageHasVarsQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmPageHasVarsQuery(new \model\models\HtmPageHasVars(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmPageHasVarsQuery(new \model\models\HtmPageHasVars());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmPageHasVars objects
     *
     * @return \model\models\HtmPageHasVars[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmPageHasVars
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmPageHasVars
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function selectHtmVarsId() {
        $this->setSelect(HtmPageHasVars::FIELD_HTM_VARS_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function filterByHtmVarsId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPageHasVars::FIELD_HTM_VARS_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function orderByHtmVarsId($order = Mysql::ASC) {
        $this->orderBy(HtmPageHasVars::FIELD_HTM_VARS_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function groupByHtmVarsId() {
        $this->groupBy(HtmPageHasVars::FIELD_HTM_VARS_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmPageHasVars::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPageHasVars::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmPageHasVars::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageHasVarsQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmPageHasVars::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmPageHasVars::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmVarsQuery
     */
    function joinHtmVars($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmVars::TABLE, $join, [HtmPageHasVars::FIELD_HTM_VARS_ID, \model\models\HtmVars::FIELD_ID]);
        return \model\querys\HtmVarsQuery::useModel($this);
    }
    
    
}