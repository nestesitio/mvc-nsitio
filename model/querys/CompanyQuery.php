<?php
namespace model\querys;

use \model\models\Company;
use \lib\mysql\Mysql;

/**
 * Description of Company
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class CompanyQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new CompanyQuery(new \model\models\Company(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new CompanyQuery(new \model\models\Company());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\CompanyQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of Company objects
     *
     * @return \model\models\Company[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\Company
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\Company
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectId() {
        $this->setSelect(Company::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupById() {
        $this->groupBy(Company::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectName() {
        $this->setSelect(Company::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupByName() {
        $this->groupBy(Company::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectCode() {
        $this->setSelect(Company::FIELD_CODE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterByCode($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_CODE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderByCode($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_CODE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupByCode() {
        $this->groupBy(Company::FIELD_CODE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectFolder() {
        $this->setSelect(Company::FIELD_FOLDER);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterByFolder($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_FOLDER, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderByFolder($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_FOLDER, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupByFolder() {
        $this->groupBy(Company::FIELD_FOLDER);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectActive() {
        $this->setSelect(Company::FIELD_ACTIVE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterByActive($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_ACTIVE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderByActive($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_ACTIVE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupByActive() {
        $this->groupBy(Company::FIELD_ACTIVE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function selectDistributor() {
        $this->setSelect(Company::FIELD_DISTRIBUTOR);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function filterByDistributor($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Company::FIELD_DISTRIBUTOR, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function orderByDistributor($order = Mysql::ASC) {
        $this->orderBy(Company::FIELD_DISTRIBUTOR, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyQuery
     */
    public function groupByDistributor() {
        $this->groupBy(Company::FIELD_DISTRIBUTOR);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyHtmQuery
     */
    function joinCompanyHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyHtm::TABLE, $join, [Company::FIELD_ID, \model\models\CompanyHtm::FIELD_COMPANY_ID]);
        return \model\querys\CompanyHtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyInfoQuery
     */
    function joinCompanyInfo($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyInfo::TABLE, $join, [Company::FIELD_ID, \model\models\CompanyInfo::FIELD_COMPANY_ID]);
        return \model\querys\CompanyInfoQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyUserQuery
     */
    function joinCompanyUser($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyUser::TABLE, $join, [Company::FIELD_ID, \model\models\CompanyUser::FIELD_COMPANY_ID]);
        return \model\querys\CompanyUserQuery::useModel($this);
    }
    
    
}