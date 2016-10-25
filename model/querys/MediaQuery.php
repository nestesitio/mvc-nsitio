<?php
namespace model\querys;

use \model\models\Media;
use \lib\mysql\Mysql;

/**
 * Description of Media
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class MediaQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new MediaQuery(new \model\models\Media(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new MediaQuery(new \model\models\Media());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\MediaQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of Media objects
     *
     * @return \model\models\Media[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\Media
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\Media
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectId() {
        $this->setSelect(Media::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Media::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupById() {
        $this->groupBy(Media::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectGenre() {
        $this->setSelect(Media::FIELD_GENRE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterByGenre($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Media::FIELD_GENRE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderByGenre($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_GENRE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupByGenre() {
        $this->groupBy(Media::FIELD_GENRE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectSource() {
        $this->setSelect(Media::FIELD_SOURCE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterBySource($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Media::FIELD_SOURCE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderBySource($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_SOURCE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupBySource() {
        $this->groupBy(Media::FIELD_SOURCE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectLink() {
        $this->setSelect(Media::FIELD_LINK);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterByLink($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Media::FIELD_LINK, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderByLink($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_LINK, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupByLink() {
        $this->groupBy(Media::FIELD_LINK);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectDate() {
        $this->setSelect(Media::FIELD_DATE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterByDate($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(Media::FIELD_DATE, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderByDate($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_DATE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupByDate() {
        $this->groupBy(Media::FIELD_DATE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function selectCreated() {
        $this->setSelect(Media::FIELD_CREATED);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function filterByCreated($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(Media::FIELD_CREATED, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function orderByCreated($order = Mysql::ASC) {
        $this->orderBy(Media::FIELD_CREATED, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaQuery
     */
    public function groupByCreated() {
        $this->groupBy(Media::FIELD_CREATED);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmHasMediaQuery
     */
    function joinHtmHasMedia($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmHasMedia::TABLE, $join, [Media::FIELD_ID, \model\models\HtmHasMedia::FIELD_MEDIA_ID]);
        return \model\querys\HtmHasMediaQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\MediaInfoQuery
     */
    function joinMediaInfo($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\MediaInfo::TABLE, $join, [Media::FIELD_ID, \model\models\MediaInfo::FIELD_MEDIA_ID]);
        return \model\querys\MediaInfoQuery::useModel($this);
    }
    
    
}