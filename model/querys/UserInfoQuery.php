<?php
namespace model\querys;

use \model\models\UserInfo;
use \lib\mysql\Mysql;

/**
 * Description of UserInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class UserInfoQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new UserInfoQuery(new \model\models\UserInfo(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new UserInfoQuery(new \model\models\UserInfo());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\UserInfoQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of UserInfo objects
     *
     * @return \model\models\UserInfo[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\UserInfo
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\UserInfo
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectUserId() {
        $this->setSelect(UserInfo::FIELD_USER_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByUserId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_USER_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByUserId($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_USER_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByUserId() {
        $this->groupBy(UserInfo::FIELD_USER_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectAddress() {
        $this->setSelect(UserInfo::FIELD_ADDRESS);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByAddress($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_ADDRESS, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByAddress($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_ADDRESS, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByAddress() {
        $this->groupBy(UserInfo::FIELD_ADDRESS);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectZip() {
        $this->setSelect(UserInfo::FIELD_ZIP);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByZip($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_ZIP, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByZip($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_ZIP, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByZip() {
        $this->groupBy(UserInfo::FIELD_ZIP);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectLocal() {
        $this->setSelect(UserInfo::FIELD_LOCAL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByLocal($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_LOCAL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByLocal($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_LOCAL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByLocal() {
        $this->groupBy(UserInfo::FIELD_LOCAL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectTlf() {
        $this->setSelect(UserInfo::FIELD_TLF);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByTlf($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_TLF, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByTlf($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_TLF, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByTlf() {
        $this->groupBy(UserInfo::FIELD_TLF);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectTlm() {
        $this->setSelect(UserInfo::FIELD_TLM);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByTlm($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_TLM, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByTlm($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_TLM, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByTlm() {
        $this->groupBy(UserInfo::FIELD_TLM);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectNif() {
        $this->setSelect(UserInfo::FIELD_NIF);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByNif($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_NIF, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByNif($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_NIF, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByNif() {
        $this->groupBy(UserInfo::FIELD_NIF);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectBic() {
        $this->setSelect(UserInfo::FIELD_BIC);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByBic($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_BIC, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByBic($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_BIC, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByBic() {
        $this->groupBy(UserInfo::FIELD_BIC);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectBorn() {
        $this->setSelect(UserInfo::FIELD_BORN);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByBorn($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(UserInfo::FIELD_BORN, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByBorn($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_BORN, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByBorn() {
        $this->groupBy(UserInfo::FIELD_BORN);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectCivil() {
        $this->setSelect(UserInfo::FIELD_CIVIL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByCivil($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_CIVIL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByCivil($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_CIVIL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByCivil() {
        $this->groupBy(UserInfo::FIELD_CIVIL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectGenre() {
        $this->setSelect(UserInfo::FIELD_GENRE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByGenre($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_GENRE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByGenre($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_GENRE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByGenre() {
        $this->groupBy(UserInfo::FIELD_GENRE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function selectNotes() {
        $this->setSelect(UserInfo::FIELD_NOTES);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function filterByNotes($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(UserInfo::FIELD_NOTES, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function orderByNotes($order = Mysql::ASC) {
        $this->orderBy(UserInfo::FIELD_NOTES, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\UserInfoQuery
     */
    public function groupByNotes() {
        $this->groupBy(UserInfo::FIELD_NOTES);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\UserBaseQuery
     */
    function joinUserBase($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\UserBase::TABLE, $join, [UserInfo::FIELD_USER_ID, \model\models\UserBase::FIELD_ID]);
        return \model\querys\UserBaseQuery::useModel($this);
    }
    
    
}