<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Htm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class Htm extends \lib\model\Model 
{

    const FIELD_ID = 'htm.id';
    const FIELD_HTM_APP_ID = 'htm.htm_app_id';
    const FIELD_STAT = 'htm.stat';
    const FIELD_ORD = 'htm.ord';
    const FIELD_CONTROLLER = 'htm.controller';
    
    const TABLE = 'htm';
    
    
    protected function setModel(){
        $this->columnNames['htm'] = ['id', 'htm_app_id', 'stat', 'ord', 'controller'];
            
        $this->tableName = 'htm';
        
        $this->primaryKey = ['id'];
        $this->fk[Htm::FIELD_HTM_APP_ID] = ['table'=>'htm_app', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getController();
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
    

    public function setController($value) {
        $this->setColumnValue(Htm::FIELD_CONTROLLER, $value);
    }

    public function getController() {
        return $this->getColumnValue(Htm::FIELD_CONTROLLER);
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
    * @return new \model\models\HtmHasMedia;
    */
    public function getHtmHasMedia() {
        $obj = new \model\models\HtmHasMedia();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\HtmHasVars;
    */
    public function getHtmHasVars() {
        $obj = new \model\models\HtmHasVars();
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
    * @return new \model\models\HtmPage;
    */
    public function getHtmPage() {
        $obj = new \model\models\HtmPage();
        $obj->merge($this);
        return $obj;
    }  
    

}