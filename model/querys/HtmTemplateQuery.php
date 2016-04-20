<?php
namespace model\querys;

use \model\models\HtmTemplate;
use \lib\mysql\Mysql;

/**
 * Description of HtmTemplate
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class HtmTemplateQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmTemplateQuery(new \model\models\HtmTemplate(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmTemplateQuery(new \model\models\HtmTemplate());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmTemplateQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmTemplate objects
     *
     * @return \model\models\HtmTemplate[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmTemplate
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmTemplate
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function selectId() {
        $this->setSelect(HtmTemplate::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTemplate::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmTemplate::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function groupById() {
        $this->groupBy(HtmTemplate::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function selectName() {
        $this->setSelect(HtmTemplate::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTemplate::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(HtmTemplate::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function groupByName() {
        $this->groupBy(HtmTemplate::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function selectPath() {
        $this->setSelect(HtmTemplate::FIELD_PATH);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function filterByPath($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmTemplate::FIELD_PATH, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function orderByPath($order = Mysql::ASC) {
        $this->orderBy(HtmTemplate::FIELD_PATH, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmTemplateQuery
     */
    public function groupByPath() {
        $this->groupBy(HtmTemplate::FIELD_PATH);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmTemplate::FIELD_ID, \model\models\Htm::FIELD_HTM_TEMPLATE_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
}