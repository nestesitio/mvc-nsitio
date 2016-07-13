<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Htm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class Htm extends \lib\model\Model 
{

    const FIELD_ID = 'htm.id';
    const FIELD_HTM_APP_ID = 'htm.htm_app_id';
    const FIELD_STAT = 'htm.stat';
    const FIELD_ORD = 'htm.ord';
    
    const TABLE = 'htm';
    
    
    protected function setModel(){
        $this->columnNames['htm'] = ['id', 'htm_app_id', 'stat', 'ord'];
            
        $this->tableName = 'htm';
        
        $this->primaryKey = ['id'];
        $this->fk[Htm::FIELD_HTM_APP_ID] = ['table'=>'htm_app', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setId($value) {
        $this->setColumnValue(Htm::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(Htm::FIELD_ID);
    }  
    

    public function setHtmAppId($value) {
        $this->setColumnValue(Htm::FIELD_HTM_APP_ID, $value);
    }

    public function getHtmAppId() {
        return $this->getColumnValue(Htm::FIELD_HTM_APP_ID);
    }  
    


    const STAT_PRIVATE = 'private';
    const STAT_BACKEND = 'backend';
    const STAT_PUBLIC = 'public';
    public static $stats = ['private', 'backend', 'public'];

    public function setStat($value) {
        $this->setColumnValue(Htm::FIELD_STAT, $value);
    }

    public function getStat() {
        return $this->getColumnValue(Htm::FIELD_STAT);
    }  
    

    public function setOrd($value) {
        $this->setColumnValue(Htm::FIELD_ORD, $value);
    }

    public function getOrd() {
        return $this->getColumnValue(Htm::FIELD_ORD);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\CompanyHtm;
    */
    public function getCompanyHtm() {
        $obj = new \model\models\CompanyHtm();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmApp;
    */
    public function getHtmApp() {
        $obj = new \model\models\HtmApp();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmLog;
    */
    public function getHtmLog() {
        $obj = new \model\models\HtmLog();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmMedia;
    */
    public function getHtmMedia() {
        $obj = new \model\models\HtmMedia();
        $obj->merge($this);
        return $obj;
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
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmPageHasVars;
    */
    public function getHtmPageHasVars() {
        $obj = new \model\models\HtmPageHasVars();
        $obj->merge($this);
        return $obj;
    }  
    

}