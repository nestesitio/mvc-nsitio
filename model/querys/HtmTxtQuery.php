<?php
namespace model\querys;

use \model\models\HtmTxt;
use \lib\mysql\Mysql;

/**
 * Description of HtmTxt
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class HtmTxtQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmTxtQuery(new \model\models\HtmTxt(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmTxtQuery(new \model\models\HtmTxt());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmTxtQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmTxt objects
     *
     * @return \model\models\HtmTxt[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmTxt
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmTxt
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function selectId() {
        $this->setSelect(HtmTxt::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTxt::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmTxt::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function groupById() {
        $this->groupBy(HtmTxt::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function selectHtmPageId() {
        $this->setSelect(HtmTxt::FIELD_HTM_PAGE_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function filterByHtmPageId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTxt::FIELD_HTM_PAGE_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function orderByHtmPageId($order = Mysql::ASC) {
        $this->orderBy(HtmTxt::FIELD_HTM_PAGE_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function groupByHtmPageId() {
        $this->groupBy(HtmTxt::FIELD_HTM_PAGE_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function selectTxt() {
        $this->setSelect(HtmTxt::FIELD_TXT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function filterByTxt($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTxt::FIELD_TXT, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function orderByTxt($order = Mysql::ASC) {
        $this->orderBy(HtmTxt::FIELD_TXT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTxtQuery
     */
    public function groupByTxt() {
        $this->groupBy(HtmTxt::FIELD_TXT);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmPageQuery
     */
    function joinHtmPage($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmPage::TABLE, $join, [HtmTxt::FIELD_HTM_PAGE_ID, \model\models\HtmPage::FIELD_ID]);
        return \model\querys\HtmPageQuery::useModel($this);
    }
    
    
}