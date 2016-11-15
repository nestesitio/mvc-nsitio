<?php
namespace model\querys;

use \model\models\HtmPage;
use \lib\mysql\Mysql;

/**
 * Description of HtmPage
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class HtmPageQuery extends \lib\model\QuerySelect {
    
    public static function start($merge = ALL){
        $obj = new HtmPageQuery(new \model\models\HtmPage(), $merge);
        $obj->startPrimary($merge);
        return $obj;
    }
    
    public static function useModel($merge){
        $obj = new HtmPageQuery(new \model\models\HtmPage());
        $obj->startJoin($merge);
        return $obj;
    }
    
    /**
     * Completes the join and return primary query,
     * because Netbeans we put child query on return, the program will get primary class function endUse()
     *
     * @return \model\querys\HtmPageQuery
     */
    public function endUse(){
        return parent::completeMerge();
    }
    
    
    /**
     * Completes query and return a collection of HtmPage objects
     *
     * @return \model\models\HtmPage[]
     */
    public function find() {
        return parent::find();
    }
    
    /**
     * Completes query with limit 1.
     *
     * @return \model\models\HtmPage
     */
    public function findOne(){
        return parent::findOne();
    }
    
    /**
     * Completes query. If result is 0 create object
     *
     * @return \model\models\HtmPage
     */
    public function findOneOrCreate(){
        return parent::findOneOrCreate();
    }
    

    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectId() {
        $this->setSelect(HtmPage::FIELD_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterById($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderById($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupById() {
        $this->groupBy(HtmPage::FIELD_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectHtmId() {
        $this->setSelect(HtmPage::FIELD_HTM_ID);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByHtmId($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_HTM_ID, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByHtmId($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_HTM_ID, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByHtmId() {
        $this->groupBy(HtmPage::FIELD_HTM_ID);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectLangsTld() {
        $this->setSelect(HtmPage::FIELD_LANGS_TLD);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByLangsTld($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_LANGS_TLD, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByLangsTld($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_LANGS_TLD, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByLangsTld() {
        $this->groupBy(HtmPage::FIELD_LANGS_TLD);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectTitle() {
        $this->setSelect(HtmPage::FIELD_TITLE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByTitle($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_TITLE, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByTitle($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_TITLE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByTitle() {
        $this->groupBy(HtmPage::FIELD_TITLE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectSlug() {
        $this->setSelect(HtmPage::FIELD_SLUG);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterBySlug($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_SLUG, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderBySlug($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_SLUG, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupBySlug() {
        $this->groupBy(HtmPage::FIELD_SLUG);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectMenu() {
        $this->setSelect(HtmPage::FIELD_MENU);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByMenu($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_MENU, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByMenu($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_MENU, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByMenu() {
        $this->groupBy(HtmPage::FIELD_MENU);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectHeading() {
        $this->setSelect(HtmPage::FIELD_HEADING);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByHeading($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_HEADING, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByHeading($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_HEADING, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByHeading() {
        $this->groupBy(HtmPage::FIELD_HEADING);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectSummary() {
        $this->setSelect(HtmPage::FIELD_SUMMARY);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterBySummary($values, $operator = Mysql::EQUAL) {
        $this->filterByColumn(HtmPage::FIELD_SUMMARY, $values, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderBySummary($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_SUMMARY, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupBySummary() {
        $this->groupBy(HtmPage::FIELD_SUMMARY);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectPublicationDate() {
        $this->setSelect(HtmPage::FIELD_PUBLICATION_DATE);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByPublicationDate($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(HtmPage::FIELD_PUBLICATION_DATE, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByPublicationDate($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_PUBLICATION_DATE, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByPublicationDate() {
        $this->groupBy(HtmPage::FIELD_PUBLICATION_DATE);
        return $this;
    }
    
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function selectUpdatedAt() {
        $this->setSelect(HtmPage::FIELD_UPDATED_AT);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function filterByUpdatedAt($min = null, $max = null, $operator = Mysql::BETWEEN) {
        $this->filterByDateColumn(HtmPage::FIELD_UPDATED_AT, $min, $max, $operator);
        return $this;
    } 
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function orderByUpdatedAt($order = Mysql::ASC) {
        $this->orderBy(HtmPage::FIELD_UPDATED_AT, $order);
        return $this;
    }
    
    /**
     * 
     * @return \model\querys\HtmPageQuery
     */
    public function groupByUpdatedAt() {
        $this->groupBy(HtmPage::FIELD_UPDATED_AT);
        return $this;
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmQuery
     */
    function joinHtm($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Htm::TABLE, $join, [HtmPage::FIELD_HTM_ID, \model\models\Htm::FIELD_ID]);
        return \model\querys\HtmQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\LangsQuery
     */
    function joinLangs($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\Langs::TABLE, $join, [HtmPage::FIELD_LANGS_TLD, \model\models\Langs::FIELD_TLD]);
        return \model\querys\LangsQuery::useModel($this);
    }
    
    
    /**
     * Makes join
     * @param \lib\mysql\Mysql $join
     *
     * @return \model\querys\HtmTxtQuery
     */
    function joinHtmTxt($join = Mysql::INNER_JOIN) {
        $this->join(\model\models\HtmTxt::TABLE, $join, [HtmPage::FIELD_ID, \model\models\HtmTxt::FIELD_HTM_PAGE_ID]);
        return \model\querys\HtmTxtQuery::useModel($this);
    }
    
    
}