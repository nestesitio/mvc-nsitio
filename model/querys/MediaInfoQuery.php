<?php
namespace model\querys;

use \model\models\MediaInfo;
use \lib\mysql\Mysql;

/**
 * Description of MediaInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class MediaInfoQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new MediaInfoQuery(new \model\models\MediaInfo(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new MediaInfoQuery(new \model\models\MediaInfo());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\MediaInfoQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of MediaInfo objects
     *
     * @return \model\models\MediaInfo[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\MediaInfo
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\MediaInfo
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectId() {
        $this->setSelect(MediaInfo::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupById() {
        $this->groupBy(MediaInfo::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectMediaId() {
        $this->setSelect(MediaInfo::FIELD_MEDIA_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterByMediaId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_MEDIA_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderByMediaId($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_MEDIA_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupByMediaId() {
        $this->groupBy(MediaInfo::FIELD_MEDIA_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectMediaCollectionId() {
        $this->setSelect(MediaInfo::FIELD_MEDIA_COLLECTION_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterByMediaCollectionId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_MEDIA_COLLECTION_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderByMediaCollectionId($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_MEDIA_COLLECTION_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupByMediaCollectionId() {
        $this->groupBy(MediaInfo::FIELD_MEDIA_COLLECTION_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectLangsTld() {
        $this->setSelect(MediaInfo::FIELD_LANGS_TLD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterByLangsTld($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_LANGS_TLD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderByLangsTld($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_LANGS_TLD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupByLangsTld() {
        $this->groupBy(MediaInfo::FIELD_LANGS_TLD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectTitle() {
        $this->setSelect(MediaInfo::FIELD_TITLE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterByTitle($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_TITLE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderByTitle($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_TITLE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupByTitle() {
        $this->groupBy(MediaInfo::FIELD_TITLE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectAuthor() {
        $this->setSelect(MediaInfo::FIELD_AUTHOR);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterByAuthor($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_AUTHOR, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderByAuthor($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_AUTHOR, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupByAuthor() {
        $this->groupBy(MediaInfo::FIELD_AUTHOR);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function selectSummary() {
        $this->setSelect(MediaInfo::FIELD_SUMMARY);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function filterBySummary($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaInfo::FIELD_SUMMARY, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function orderBySummary($order = Mysql::ASC) {
        $this->orderBy(MediaInfo::FIELD_SUMMARY, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaInfoQuery
     */
    public function groupBySummary() {
        $this->groupBy(MediaInfo::FIELD_SUMMARY);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\LangsQuery
     */
    function joinLangs($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Langs::TABLE, $join, [MediaInfo::FIELD_LANGS_TLD, \model\models\Langs::FIELD_TLD]);
        return \model\querys\LangsQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\MediaCollectionQuery
     */
    function joinMediaCollection($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\MediaCollection::TABLE, $join, [MediaInfo::FIELD_MEDIA_COLLECTION_ID, \model\models\MediaCollection::FIELD_ID]);
        return \model\querys\MediaCollectionQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\MediaQuery
     */
    function joinMedia($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Media::TABLE, $join, [MediaInfo::FIELD_MEDIA_ID, \model\models\Media::FIELD_ID]);
        return \model\querys\MediaQuery::useModel($this);
    }
    
    
}