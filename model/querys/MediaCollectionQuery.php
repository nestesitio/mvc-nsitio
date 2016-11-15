<?php
namespace model\querys;

use \model\models\MediaCollection;
use \lib\mysql\Mysql;

/**
 * Description of MediaCollection
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class MediaCollectionQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new MediaCollectionQuery(new \model\models\MediaCollection(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new MediaCollectionQuery(new \model\models\MediaCollection());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\MediaCollectionQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of MediaCollection objects
     *
     * @return \model\models\MediaCollection[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\MediaCollection
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\MediaCollection
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function selectId() {
        $this->setSelect(MediaCollection::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaCollection::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(MediaCollection::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function groupById() {
        $this->groupBy(MediaCollection::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function selectSlug() {
        $this->setSelect(MediaCollection::FIELD_SLUG);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function filterBySlug($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaCollection::FIELD_SLUG, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function orderBySlug($order = Mysql::ASC) {
        $this->orderBy(MediaCollection::FIELD_SLUG, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function groupBySlug() {
        $this->groupBy(MediaCollection::FIELD_SLUG);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function selectName() {
        $this->setSelect(MediaCollection::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(MediaCollection::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(MediaCollection::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\MediaCollectionQuery
     */
    public function groupByName() {
        $this->groupBy(MediaCollection::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\MediaInfoQuery
     */
    function joinMediaInfo($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\MediaInfo::TABLE, $join, [MediaCollection::FIELD_ID, \model\models\MediaInfo::FIELD_MEDIA_COLLECTION_ID]);
        return \model\querys\MediaInfoQuery::useModel($this);
    }
    
    
}