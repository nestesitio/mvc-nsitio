<?php
namespace model\querys;

use \model\models\CompanyHtm;
use \lib\mysql\Mysql;

/**
 * Description of CompanyHtm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class CompanyHtmQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new CompanyHtmQuery(new \model\models\CompanyHtm(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new CompanyHtmQuery(new \model\models\CompanyHtm());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\CompanyHtmQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of CompanyHtm objects
     *
     * @return \model\models\CompanyHtm[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\CompanyHtm
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\CompanyHtm
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function selectId() {
        $this->setSelect(CompanyHtm::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyHtm::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(CompanyHtm::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function groupById() {
        $this->groupBy(CompanyHtm::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function selectCompanyId() {
        $this->setSelect(CompanyHtm::FIELD_COMPANY_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function filterByCompanyId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyHtm::FIELD_COMPANY_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function orderByCompanyId($order = Mysql::ASC) {
        $this->orderBy(CompanyHtm::FIELD_COMPANY_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function groupByCompanyId() {
        $this->groupBy(CompanyHtm::FIELD_COMPANY_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function selectHtmId() {
        $this->setSelect(CompanyHtm::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyHtm::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(CompanyHtm::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function groupByHtmId() {
        $this->groupBy(CompanyHtm::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function selectHtmTypeId() {
        $this->setSelect(CompanyHtm::FIELD_HTM_TYPE_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function filterByHtmTypeId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyHtm::FIELD_HTM_TYPE_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function orderByHtmTypeId($order = Mysql::ASC) {
        $this->orderBy(CompanyHtm::FIELD_HTM_TYPE_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyHtmQuery
     */
    public function groupByHtmTypeId() {
        $this->groupBy(CompanyHtm::FIELD_HTM_TYPE_ID);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyQuery
     */
    function joinCompany($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Company::TABLE, $join, [CompanyHtm::FIELD_COMPANY_ID, \model\models\Company::FIELD_ID]);
        return \model\querys\CompanyQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [CompanyHtm::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
}