<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class UserLog extends \lib\model\Model 
{

    const FIELD_ID = 'user_log.id';
    const FIELD_USER_ID = 'user_log.user_id';
    const FIELD_EVENT = 'user_log.event';
    const FIELD_UPDATED_AT = 'user_log.updated_at';
    
    const TABLE = 'user_log';
    
    
    protected function setModel(){
        $this->columnNames['user_log'] = ['id', 'user_id', 'event', 'updated_at'];
            
        $this->tableName = 'user_log';
        
        $this->primaryKey = ['id'];
        $this->fk[UserLog::FIELD_USER_ID] = ['table'=>'user_base', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setId($value) {
        $this->setColumnValue(UserLog::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(UserLog::FIELD_ID);
    }  
    

    public function setUserId($value) {
        $this->setColumnValue(UserLog::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(UserLog::FIELD_USER_ID);
    }  
    


    const EVENT_CREATED = 'created';
    const EVENT_LOGIN = 'login';
    const EVENT_CONFIRMATION = 'confirmation';
    const EVENT_UPDATED = 'updated';
    const EVENT_SHOPPING = 'shopping';
    const EVENT_BANNED = 'banned';
    const EVENT_APPROVAL = 'approval';
    public static $events = ['created', 'login', 'confirmation', 'updated', 'shopping', 'banned', 'approval'];

    public function setEvent($value) {
        $this->setColumnValue(UserLog::FIELD_EVENT, $value);
    }

    public function getEvent() {
        return $this->getColumnValue(UserLog::FIELD_EVENT);
    }  
    

    public function setUpdatedAt($value) {
        $this->setColumnDate(UserLog::FIELD_UPDATED_AT, $value);
    }

    public function getUpdatedAt() {
        return $this->getColumnValue(UserLog::FIELD_UPDATED_AT);
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