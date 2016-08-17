<?php
namespace model\querys;

use \model\models\HtmMedia;
use \lib\mysql\Mysql;

/**
 * Description of HtmMedia
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class HtmMediaQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmMediaQuery(new \model\models\HtmMedia(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmMediaQuery(new \model\models\HtmMedia());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmMediaQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmMedia objects
     *
     * @return \model\models\HtmMedia[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmMedia
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmMedia
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectId() {
        $this->setSelect(HtmMedia::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupById() {
        $this->groupBy(HtmMedia::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmMedia::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmMedia::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectGenre() {
        $this->setSelect(HtmMedia::FIELD_GENRE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByGenre($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_GENRE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByGenre($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_GENRE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByGenre() {
        $this->groupBy(HtmMedia::FIELD_GENRE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectUrl() {
        $this->setSelect(HtmMedia::FIELD_URL);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByUrl($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_URL, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByUrl($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_URL, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByUrl() {
        $this->groupBy(HtmMedia::FIELD_URL);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectPosition() {
        $this->setSelect(HtmMedia::FIELD_POSITION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByPosition($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_POSITION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByPosition($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_POSITION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByPosition() {
        $this->groupBy(HtmMedia::FIELD_POSITION);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectTitle() {
        $this->setSelect(HtmMedia::FIELD_TITLE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByTitle($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_TITLE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByTitle($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_TITLE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByTitle() {
        $this->groupBy(HtmMedia::FIELD_TITLE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectAuthor() {
        $this->setSelect(HtmMedia::FIELD_AUTHOR);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByAuthor($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_AUTHOR, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByAuthor($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_AUTHOR, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByAuthor() {
        $this->groupBy(HtmMedia::FIELD_AUTHOR);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectDate() {
        $this->setSelect(HtmMedia::FIELD_DATE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByDate($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(HtmMedia::FIELD_DATE, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByDate($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_DATE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByDate() {
        $this->groupBy(HtmMedia::FIELD_DATE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectCreated() {
        $this->setSelect(HtmMedia::FIELD_CREATED);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByCreated($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(HtmMedia::FIELD_CREATED, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByCreated($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_CREATED, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByCreated() {
        $this->groupBy(HtmMedia::FIELD_CREATED);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function selectDescription() {
        $this->setSelect(HtmMedia::FIELD_DESCRIPTION);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function filterByDescription($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmMedia::FIELD_DESCRIPTION, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function orderByDescription($order = Mysql::ASC) {
        $this->orderBy(HtmMedia::FIELD_DESCRIPTION, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmMediaQuery
     */
    public function groupByDescription() {
        $this->groupBy(HtmMedia::FIELD_DESCRIPTION);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmMedia::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
}