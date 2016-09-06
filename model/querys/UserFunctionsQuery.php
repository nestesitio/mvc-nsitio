<?php
namespace model\querys;

use \model\models\UserFunctions;
use \lib\mysql\Mysql;

/**
 * Description of UserFunctions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class UserFunctionsQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserFunctionsQuery(new \model\models\UserFunctions(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserFunctionsQuery(new \model\models\UserFunctions());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserFunctionsQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserFunctions objects
     *
     * @return \model\models\UserFunctions[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserFunctions
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserFunctions
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function selectId() {
        $this->setSelect(UserFunctions::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserFunctions::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(UserFunctions::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function groupById() {
        $this->groupBy(UserFunctions::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function selectFunction() {
        $this->setSelect(UserFunctions::FIELD_FUNCTION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function filterByFunction($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserFunctions::FIELD_FUNCTION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function orderByFunction($order = Mysql::ASC) {
        $this->orderBy(UserFunctions::FIELD_FUNCTION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function groupByFunction() {
        $this->groupBy(UserFunctions::FIELD_FUNCTION);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function selectDescription() {
        $this->setSelect(UserFunctions::FIELD_DESCRIPTION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function filterByDescription($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserFunctions::FIELD_DESCRIPTION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function orderByDescription($order = Mysql::ASC) {
        $this->orderBy(UserFunctions::FIELD_DESCRIPTION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function groupByDescription() {
        $this->groupBy(UserFunctions::FIELD_DESCRIPTION);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function selectPublic() {
        $this->setSelect(UserFunctions::FIELD_PUBLIC);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function filterByPublic($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserFunctions::FIELD_PUBLIC, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function orderByPublic($order = Mysql::ASC) {
        $this->orderBy(UserFunctions::FIELD_PUBLIC, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserFunctionsQuery
     */
    public function groupByPublic() {
        $this->groupBy(UserFunctions::FIELD_PUBLIC);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyUserQuery
     */
    function joinCompanyUser($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\CompanyUser::TABLE, $join, [UserFunctions::FIELD_ID, \model\models\CompanyUser::FIELD_USER_FUNCTIONS_ID]);
        return \model\querys\CompanyUserQuery::useModel($this);
    }
    
    
}