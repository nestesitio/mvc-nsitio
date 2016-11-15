<?php
namespace model\querys;

use \model\models\Htm;
use \lib\mysql\Mysql;

/**
 * Description of Htm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class HtmQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmQuery(new \model\models\Htm(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmQuery(new \model\models\Htm());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of Htm objects
     *
     * @return \model\models\Htm[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\Htm
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\Htm
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function selectId() {
        $this->setSelect(Htm::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Htm::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(Htm::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function groupById() {
        $this->groupBy(Htm::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function selectHtmAppId() {
        $this->setSelect(Htm::FIELD_HTM_APP_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function filterByHtmAppId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Htm::FIELD_HTM_APP_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function orderByHtmAppId($order = Mysql::ASC) {
        $this->orderBy(Htm::FIELD_HTM_APP_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function groupByHtmAppId() {
        $this->groupBy(Htm::FIELD_HTM_APP_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function selectStat() {
        $this->setSelect(Htm::FIELD_STAT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function filterByStat($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Htm::FIELD_STAT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function orderByStat($order = Mysql::ASC) {
        $this->orderBy(Htm::FIELD_STAT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function groupByStat() {
        $this->groupBy(Htm::FIELD_STAT);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function selectOrd() {
        $this->setSelect(Htm::FIELD_ORD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function filterByOrd($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Htm::FIELD_ORD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function orderByOrd($order = Mysql::ASC) {
        $this->orderBy(Htm::FIELD_ORD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function groupByOrd() {
        $this->groupBy(Htm::FIELD_ORD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function selectController() {
        $this->setSelect(Htm::FIELD_CONTROLLER);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function filterByController($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Htm::FIELD_CONTROLLER, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function orderByController($order = Mysql::ASC) {
        $this->orderBy(Htm::FIELD_CONTROLLER, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmQuery
     */
    public function groupByController() {
        $this->groupBy(Htm::FIELD_CONTROLLER);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyHtmQuery
     */
    function joinCompanyHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyHtm::TABLE, $join, [Htm::FIELD_ID, \model\models\CompanyHtm::FIELD_HTM_ID]);
        return \model\querys\CompanyHtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmAppQuery
     */
    function joinHtmApp($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmApp::TABLE, $join, [Htm::FIELD_HTM_APP_ID, \model\models\HtmApp::FIELD_ID]);
        return \model\querys\HtmAppQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmHasMediaQuery
     */
    function joinHtmHasMedia($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmHasMedia::TABLE, $join, [Htm::FIELD_ID, \model\models\HtmHasMedia::FIELD_HTM_ID]);
        return \model\querys\HtmHasMediaQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmHasVarsQuery
     */
    function joinHtmHasVars($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmHasVars::TABLE, $join, [Htm::FIELD_ID, \model\models\HtmHasVars::FIELD_HTM_ID]);
        return \model\querys\HtmHasVarsQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmLogQuery
     */
    function joinHtmLog($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmLog::TABLE, $join, [Htm::FIELD_ID, \model\models\HtmLog::FIELD_HTM_ID]);
        return \model\querys\HtmLogQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmPageQuery
     */
    function joinHtmPage($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmPage::TABLE, $join, [Htm::FIELD_ID, \model\models\HtmPage::FIELD_HTM_ID]);
        return \model\querys\HtmPageQuery::useModel($this);
    }
    
    
}