<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class HtmLog extends \lib\model\Model 
{

    const FIELD_ID = 'htm_log.id';
    const FIELD_HTM_ID = 'htm_log.htm_id';
    const FIELD_USER_ID = 'htm_log.user_id';
    const FIELD_EVENT = 'htm_log.event';
    const FIELD_DESCRIPTION = 'htm_log.description';
    const FIELD_UPDATED_AT = 'htm_log.updated_at';
    
    const TABLE = 'htm_log';
    
    
    protected function setModel(){
        $this->columnNames['htm_log'] = ['id', 'htm_id', 'user_id', 'event', 'description', 'updated_at'];
            
        $this->tableName = 'htm_log';
        
        $this->primaryKey = ['id'];
        $this->fk[HtmLog::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	$this->fk[HtmLog::FIELD_USER_ID] = ['table'=>'user_base', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getEvent();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmLog::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmLog::FIELD_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmLog::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmLog::FIELD_HTM_ID);
    }  
    

    public function setUserId($value) {
        $this->setColumnValue(HtmLog::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(HtmLog::FIELD_USER_ID);
    }  
    

    public function setEvent($value) {
        $this->setColumnValue(HtmLog::FIELD_EVENT, $value);
    }

    public function getEvent() {
        return $this->getColumnValue(HtmLog::FIELD_EVENT);
    }  
    

    public function setDescription($value) {
        $this->setColumnValue(HtmLog::FIELD_DESCRIPTION, $value);
    }

    public function getDescription() {
        return $this->getColumnValue(HtmLog::FIELD_DESCRIPTION);
    }  
    

    public function setUpdatedAt($value) {
        $this->setColumnDate(HtmLog::FIELD_UPDATED_AT, $value);
    }

    public function getUpdatedAt() {
        return $this->getColumnValue(HtmLog::FIELD_UPDATED_AT);
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
    * @return new \model\models\UserBase;
    */
    public function getUserBase() {
        $obj = new \model\models\UserBase();
        $obj->merge($this);
        return $obj;
    }  
    

}