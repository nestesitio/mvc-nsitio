<?php
namespace model\querys;

use \model\models\CompanyUser;
use \lib\mysql\Mysql;

/**
 * Description of CompanyUser
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class CompanyUserQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new CompanyUserQuery(new \model\models\CompanyUser(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new CompanyUserQuery(new \model\models\CompanyUser());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\CompanyUserQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of CompanyUser objects
     *
     * @return \model\models\CompanyUser[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\CompanyUser
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\CompanyUser
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectId() {
        $this->setSelect(CompanyUser::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupById() {
        $this->groupBy(CompanyUser::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectCompanyId() {
        $this->setSelect(CompanyUser::FIELD_COMPANY_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterByCompanyId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_COMPANY_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderByCompanyId($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_COMPANY_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupByCompanyId() {
        $this->groupBy(CompanyUser::FIELD_COMPANY_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectUserId() {
        $this->setSelect(CompanyUser::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupByUserId() {
        $this->groupBy(CompanyUser::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectUserFunctionsId() {
        $this->setSelect(CompanyUser::FIELD_USER_FUNCTIONS_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterByUserFunctionsId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_USER_FUNCTIONS_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderByUserFunctionsId($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_USER_FUNCTIONS_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupByUserFunctionsId() {
        $this->groupBy(CompanyUser::FIELD_USER_FUNCTIONS_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectCode() {
        $this->setSelect(CompanyUser::FIELD_CODE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterByCode($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_CODE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderByCode($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_CODE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupByCode() {
        $this->groupBy(CompanyUser::FIELD_CODE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function selectActive() {
        $this->setSelect(CompanyUser::FIELD_ACTIVE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function filterByActive($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyUser::FIELD_ACTIVE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function orderByActive($order = Mysql::ASC) {
        $this->orderBy(CompanyUser::FIELD_ACTIVE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyUserQuery
     */
    public function groupByActive() {
        $this->groupBy(CompanyUser::FIELD_ACTIVE);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyQuery
     */
    function joinCompany($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Company::TABLE, $join, [CompanyUser::FIELD_COMPANY_ID, \model\models\Company::FIELD_ID]);
        return \model\querys\CompanyQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserFunctionsQuery
     */
    function joinUserFunctions($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserFunctions::TABLE, $join, [CompanyUser::FIELD_USER_FUNCTIONS_ID, \model\models\UserFunctions::FIELD_ID]);
        return \model\querys\UserFunctionsQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserBaseQuery
     */
    function joinUserBase($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserBase::TABLE, $join, [CompanyUser::FIELD_USER_ID, \model\models\UserBase::FIELD_ID]);
        return \model\querys\UserBaseQuery::useModel($this);
    }
    
    
}