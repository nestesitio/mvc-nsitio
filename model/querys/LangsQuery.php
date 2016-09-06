<?php
namespace model\querys;

use \model\models\Langs;
use \lib\mysql\Mysql;

/**
 * Description of Langs
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class LangsQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new LangsQuery(new \model\models\Langs(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new LangsQuery(new \model\models\Langs());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\LangsQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of Langs objects
     *
     * @return \model\models\Langs[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\Langs
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\Langs
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function selectTld() {
        $this->setSelect(Langs::FIELD_TLD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function filterByTld($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Langs::FIELD_TLD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function orderByTld($order = Mysql::ASC) {
        $this->orderBy(Langs::FIELD_TLD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function groupByTld() {
        $this->groupBy(Langs::FIELD_TLD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function selectName() {
        $this->setSelect(Langs::FIELD_NAME);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function filterByName($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Langs::FIELD_NAME, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function orderByName($order = Mysql::ASC) {
        $this->orderBy(Langs::FIELD_NAME, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function groupByName() {
        $this->groupBy(Langs::FIELD_NAME);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function selectLocale() {
        $this->setSelect(Langs::FIELD_LOCALE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function filterByLocale($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(Langs::FIELD_LOCALE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function orderByLocale($order = Mysql::ASC) {
        $this->orderBy(Langs::FIELD_LOCALE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\LangsQuery
     */
    public function groupByLocale() {
        $this->groupBy(Langs::FIELD_LOCALE);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmPageQuery
     */
    function joinHtmPage($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmPage::TABLE, $join, [Langs::FIELD_TLD, \model\models\HtmPage::FIELD_LANGS_TLD]);
        return \model\querys\HtmPageQuery::useModel($this);
    }
    
    
}