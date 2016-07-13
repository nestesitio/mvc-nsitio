<?php
namespace model\querys;

use \model\models\HtmApp;
use \lib\mysql\Mysql;

/**
 * Description of HtmApp
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class HtmAppQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmAppQuery(new \model\models\HtmApp(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmAppQuery(new \model\models\HtmApp());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmAppQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmApp objects
     *
     * @return \model\models\HtmApp[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmApp
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmApp
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function selectId() {
        $this->setSelect(HtmApp::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmApp::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmApp::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function groupById() {
        $this->groupBy(HtmApp::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function selectSlug() {
        $this->setSelect(HtmApp::FIELD_SLUG);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function filterBySlug($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmApp::FIELD_SLUG, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function orderBySlug($order = Mysql::ASC) {
        $this->orderBy(HtmApp::FIELD_SLUG, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function groupBySlug() {
        $this->groupBy(HtmApp::FIELD_SLUG);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function selectName() {
        $this->setSelect(HtmApp::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmApp::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(HtmApp::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmAppQuery
     */
    public function groupByName() {
        $this->groupBy(HtmApp::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmApp::FIELD_ID, \model\models\Htm::FIELD_HTM_APP_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserGroupHasHtmAppQuery
     */
    function joinUserGroupHasHtmApp($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserGroupHasHtmApp::TABLE, $join, [HtmApp::FIELD_ID, \model\models\UserGroupHasHtmApp::FIELD_HTM_APP_ID]);
        return \model\querys\UserGroupHasHtmAppQuery::useModel($this);
    }
    
    
}