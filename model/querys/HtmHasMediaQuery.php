<?php
namespace model\querys;

use \model\models\HtmHasMedia;
use \lib\mysql\Mysql;

/**
 * Description of HtmHasMedia
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class HtmHasMediaQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmHasMediaQuery(new \model\models\HtmHasMedia(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmHasMediaQuery(new \model\models\HtmHasMedia());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmHasMediaQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmHasMedia objects
     *
     * @return \model\models\HtmHasMedia[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmHasMedia
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmHasMedia
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function selectMediaId() {
        $this->setSelect(HtmHasMedia::FIELD_MEDIA_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function filterByMediaId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasMedia::FIELD_MEDIA_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function orderByMediaId($order = Mysql::ASC) {
        $this->orderBy(HtmHasMedia::FIELD_MEDIA_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function groupByMediaId() {
        $this->groupBy(HtmHasMedia::FIELD_MEDIA_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmHasMedia::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasMedia::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmHasMedia::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmHasMedia::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function selectTitle() {
        $this->setSelect(HtmHasMedia::FIELD_TITLE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function filterByTitle($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasMedia::FIELD_TITLE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function orderByTitle($order = Mysql::ASC) {
        $this->orderBy(HtmHasMedia::FIELD_TITLE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function groupByTitle() {
        $this->groupBy(HtmHasMedia::FIELD_TITLE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function selectOrd() {
        $this->setSelect(HtmHasMedia::FIELD_ORD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function filterByOrd($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasMedia::FIELD_ORD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function orderByOrd($order = Mysql::ASC) {
        $this->orderBy(HtmHasMedia::FIELD_ORD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function groupByOrd() {
        $this->groupBy(HtmHasMedia::FIELD_ORD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function selectNotes() {
        $this->setSelect(HtmHasMedia::FIELD_NOTES);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function filterByNotes($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmHasMedia::FIELD_NOTES, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function orderByNotes($order = Mysql::ASC) {
        $this->orderBy(HtmHasMedia::FIELD_NOTES, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmHasMediaQuery
     */
    public function groupByNotes() {
        $this->groupBy(HtmHasMedia::FIELD_NOTES);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmHasMedia::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\MediaQuery
     */
    function joinMedia($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Media::TABLE, $join, [HtmHasMedia::FIELD_MEDIA_ID, \model\models\Media::FIELD_ID]);
        return \model\querys\MediaQuery::useModel($this);
    }
    
    
}