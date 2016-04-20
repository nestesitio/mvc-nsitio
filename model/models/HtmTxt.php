<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmTxt
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class HtmTxt extends \lib\model\Model 
{

    const FIELD_ID = 'htm_txt.id';
    const FIELD_HTM_PAGE_ID = 'htm_txt.htm_page_id';
    const FIELD_TYPE = 'htm_txt.type';
    const FIELD_TXT = 'htm_txt.txt';
    
    const TABLE = 'htm_txt';
    
    
    protected function setModel(){
        $this->columnNames['htm_txt'] = ['id', 'htm_page_id', 'type', 'txt'];
            
        $this->tableName = 'htm_txt';
        
        $this->primaryKey = ['id'];
        $this->fk[HtmTxt::FIELD_HTM_PAGE_ID] = ['table'=>'htm_page', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmTxt::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmTxt::FIELD_ID);
    }  
    

    public function setHtmPageId($value) {
        $this->setColumnValue(HtmTxt::FIELD_HTM_PAGE_ID, $value);
    }

    public function getHtmPageId() {
        return $this->getColumnValue(HtmTxt::FIELD_HTM_PAGE_ID);
    }  
    


    const TYPE_DESC = 'desc';
    const TYPE_LEAD = 'lead';
    const TYPE_TXT = 'txt';
    const TYPE_OTHER = 'other';
    public static $types = ['desc', 'lead', 'txt', 'other'];

    public function setType($value) {
        $this->setColumnValue(HtmTxt::FIELD_TYPE, $value);
    }

    public function getType() {
        return $this->getColumnValue(HtmTxt::FIELD_TYPE);
    }  
    

    public function setTxt($value) {
        $this->setColumnValue(HtmTxt::FIELD_TXT, $value);
    }

    public function getTxt() {
        return $this->getColumnValue(HtmTxt::FIELD_TXT);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\HtmPage;
    */
    public function getHtmPage() {
        $obj = new \model\models\HtmPage();
        $obj->merge($this);
        return $obj;
    }  
    

}