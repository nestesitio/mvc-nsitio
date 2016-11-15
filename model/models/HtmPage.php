<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmPage
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:02
 */
class HtmPage extends \lib\model\Model 
{

    const FIELD_ID = 'htm_page.id';
    const FIELD_HTM_ID = 'htm_page.htm_id';
    const FIELD_LANGS_TLD = 'htm_page.langs_tld';
    const FIELD_TITLE = 'htm_page.title';
    const FIELD_SLUG = 'htm_page.slug';
    const FIELD_MENU = 'htm_page.menu';
    const FIELD_HEADING = 'htm_page.heading';
    const FIELD_SUMMARY = 'htm_page.summary';
    const FIELD_PUBLICATION_DATE = 'htm_page.publication_date';
    const FIELD_UPDATED_AT = 'htm_page.updated_at';
    
    const TABLE = 'htm_page';
    
    
    protected function setModel(){
        $this->columnNames['htm_page'] = ['id', 'htm_id', 'langs_tld', 'title', 'slug', 'menu', 'heading', 'summary', 'publication_date', 'updated_at'];
            
        $this->tableName = 'htm_page';
        
        $this->primaryKey = ['id'];
        $this->fk[HtmPage::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	$this->fk[HtmPage::FIELD_LANGS_TLD] = ['table'=>'langs', 'field'=>'tld'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getTitle();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmPage::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmPage::FIELD_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmPage::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmPage::FIELD_HTM_ID);
    }  
    

    public function setLangsTld($value) {
        $this->setColumnValue(HtmPage::FIELD_LANGS_TLD, $value);
    }

    public function getLangsTld() {
        return $this->getColumnValue(HtmPage::FIELD_LANGS_TLD);
    }  
    

    public function setTitle($value) {
        $this->setColumnValue(HtmPage::FIELD_TITLE, $value);
    }

    public function getTitle() {
        return $this->getColumnValue(HtmPage::FIELD_TITLE);
    }  
    

    public function setSlug($value) {
        $this->setColumnValue(HtmPage::FIELD_SLUG, $value);
    }

    public function getSlug() {
        return $this->getColumnValue(HtmPage::FIELD_SLUG);
    }  
    

    public function setMenu($value) {
        $this->setColumnValue(HtmPage::FIELD_MENU, $value);
    }

    public function getMenu() {
        return $this->getColumnValue(HtmPage::FIELD_MENU);
    }  
    

    public function setHeading($value) {
        $this->setColumnValue(HtmPage::FIELD_HEADING, $value);
    }

    public function getHeading() {
        return $this->getColumnValue(HtmPage::FIELD_HEADING);
    }  
    

    public function setSummary($value) {
        $this->setColumnValue(HtmPage::FIELD_SUMMARY, $value);
    }

    public function getSummary() {
        return $this->getColumnValue(HtmPage::FIELD_SUMMARY);
    }  
    

    public function setPublicationDate($value) {
        $this->setColumnDate(HtmPage::FIELD_PUBLICATION_DATE, $value);
    }

    public function getPublicationDate() {
        return $this->getColumnValue(HtmPage::FIELD_PUBLICATION_DATE);
    }  
    

    public function setUpdatedAt($value) {
        $this->setColumnDate(HtmPage::FIELD_UPDATED_AT, $value);
    }

    public function getUpdatedAt() {
        return $this->getColumnValue(HtmPage::FIELD_UPDATED_AT);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\Htm;
    */
    public function getHtm() {
        $obj = new \model\models\Htm();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\Langs;
    */
    public function getLangs() {
        $obj = new \model\models\Langs();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmTxt;
    */
    public function getHtmTxt() {
        $obj = new \model\models\HtmTxt();
        $obj->merge($this);
        return $obj;
    }  
    

}