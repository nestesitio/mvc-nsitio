<?php

namespace lib\page;

use \model\querys\HtmQuery;
use \model\models\HtmPage;
use \model\models\HtmApp;
use \lib\page\Page;

/**
 * Description of HtmQuery
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Aug 17, 2016
 */
class HtmQuerie {

    private $query;
    
   /**
    * 
    * @return \lib\page\HtmQuery
    */
    public static function startQuery(){
        $obj = new HtmQuerie();
        return $obj;
    }
    
    function __construct() {
        $this->query = HtmQuery::start(ONLY)->selectStat()->selectOrd()->groupById();
        $this->query->joinHtmApp()->selectName()->endUse();
        $this->query->joinHtmPage()->endUse();
    }
    
    /**
     * 
     * @param string $app
     * @param string $slug
     * 
     * @return \lib\page\HtmQuery
     */
    public function filterBySlug($app, $slug){
        $this->query->filterByColumn(HtmApp::FIELD_SLUG, $app);
        $this->query->filterByColumn(HtmPage::FIELD_SLUG, $slug);
        return $this;
    }
    
    /**
     * 
     * @param integer $id
     * @return \lib\page\HtmQuery
     */
    public function filterById($id){
        $this->query->filterById($id);
        return $this;
    }
    
    /**
     * 
     * @param string $var
     * @param string $value
     * @return \lib\page\HtmQuerie
     */
    public function filterByVar($var, $value){
        $this->query->joinHtmPageHasVars()
                ->joinHtmVars()->filterByVar($var)->filterByValue($value)->endUse()
                ->endUse();
        return $this;
    }
    
    /**
     * 
     * @return \lib\page\HtmQuerie
     */
    public function orderByOrd(){
        $this->query->orderByOrd();
        return $this;
    }


    /**
     * 
     * @return \lib\page\Page[]
     */
    public function getPages(){
        $pages = [];
        $results = $this->query->find();
        foreach($results as $result){
            $pages[] = Page::initialize($result);
        }
        return $pages;
    }
    
    /**
     * 
     * @return \lib\page\Page
     */
    public function getPage(){
        $result = $this->query->findOne();
        return Page::initialize($result);
    }

}