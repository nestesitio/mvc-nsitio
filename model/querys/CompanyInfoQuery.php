<?php
namespace model\querys;

use \model\models\CompanyInfo;
use \lib\mysql\Mysql;

/**
 * Description of CompanyInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class CompanyInfoQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new CompanyInfoQuery(new \model\models\CompanyInfo(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new CompanyInfoQuery(new \model\models\CompanyInfo());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\CompanyInfoQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of CompanyInfo objects
     *
     * @return \model\models\CompanyInfo[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\CompanyInfo
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\CompanyInfo
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectCompanyId() {
        $this->setSelect(CompanyInfo::FIELD_COMPANY_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByCompanyId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_COMPANY_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByCompanyId($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_COMPANY_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByCompanyId() {
        $this->groupBy(CompanyInfo::FIELD_COMPANY_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectAddress() {
        $this->setSelect(CompanyInfo::FIELD_ADDRESS);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByAddress($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_ADDRESS, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByAddress($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_ADDRESS, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByAddress() {
        $this->groupBy(CompanyInfo::FIELD_ADDRESS);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectZip() {
        $this->setSelect(CompanyInfo::FIELD_ZIP);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByZip($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_ZIP, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByZip($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_ZIP, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByZip() {
        $this->groupBy(CompanyInfo::FIELD_ZIP);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectLocal() {
        $this->setSelect(CompanyInfo::FIELD_LOCAL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByLocal($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_LOCAL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByLocal($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_LOCAL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByLocal() {
        $this->groupBy(CompanyInfo::FIELD_LOCAL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectNif() {
        $this->setSelect(CompanyInfo::FIELD_NIF);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByNif($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_NIF, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByNif($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_NIF, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByNif() {
        $this->groupBy(CompanyInfo::FIELD_NIF);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectTlf() {
        $this->setSelect(CompanyInfo::FIELD_TLF);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByTlf($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_TLF, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByTlf($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_TLF, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByTlf() {
        $this->groupBy(CompanyInfo::FIELD_TLF);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectTlm() {
        $this->setSelect(CompanyInfo::FIELD_TLM);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByTlm($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_TLM, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByTlm($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_TLM, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByTlm() {
        $this->groupBy(CompanyInfo::FIELD_TLM);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectWeb() {
        $this->setSelect(CompanyInfo::FIELD_WEB);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByWeb($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_WEB, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByWeb($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_WEB, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByWeb() {
        $this->groupBy(CompanyInfo::FIELD_WEB);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectMail() {
        $this->setSelect(CompanyInfo::FIELD_MAIL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByMail($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_MAIL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByMail($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_MAIL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByMail() {
        $this->groupBy(CompanyInfo::FIELD_MAIL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function selectNotes() {
        $this->setSelect(CompanyInfo::FIELD_NOTES);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function filterByNotes($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(CompanyInfo::FIELD_NOTES, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function orderByNotes($order = Mysql::ASC) {
        $this->orderBy(CompanyInfo::FIELD_NOTES, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\CompanyInfoQuery
     */
    public function groupByNotes() {
        $this->groupBy(CompanyInfo::FIELD_NOTES);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\CompanyQuery
     */
    function joinCompany($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Company::TABLE, $join, [CompanyInfo::FIELD_COMPANY_ID, \model\models\Company::FIELD_ID]);
        return \model\querys\CompanyQuery::useModel($this);
    }
    
    
}