<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of SupportLog
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class SupportLog extends \lib\model\Model 
{

    const FIELD_ID = 'support_log.id';
    const FIELD_SUPPORT_ID = 'support_log.support_id';
    const FIELD_USER_ID = 'support_log.user_id';
    const FIELD_EVENT = 'support_log.event';
    const FIELD_NOTES = 'support_log.notes';
    const FIELD_UPDATED_AT = 'support_log.updated_at';
    
    const TABLE = 'support_log';
    
    
    protected function setModel(){
        $this->columnNames['support_log'] = ['id', 'support_id', 'user_id', 'event', 'notes', 'updated_at'];
            
        $this->tableName = 'support_log';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getNotes();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(SupportLog::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(SupportLog::FIELD_ID);
    }  
    

    public function setSupportId($value) {
        $this->setColumnValue(SupportLog::FIELD_SUPPORT_ID, $value);
    }

    public function getSupportId() {
        return $this->getColumnValue(SupportLog::FIELD_SUPPORT_ID);
    }  
    

    public function setUserId($value) {
        $this->setColumnValue(SupportLog::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(SupportLog::FIELD_USER_ID);
    }  
    


    const EVENT_CREATION = 'creation';
    const EVENT_ASSIGN = 'assign';
    const EVENT_REPLY = 'reply';
    const EVENT_TASK = 'task';
    const EVENT_CLOSED = 'closed';
    public static $events = ['creation', 'assign', 'reply', 'task', 'closed'];

    public function setEvent($value) {
        $this->setColumnValue(SupportLog::FIELD_EVENT, $value);
    }

    public function getEvent() {
        return $this->getColumnValue(SupportLog::FIELD_EVENT);
    }  
    

    public function setNotes($value) {
        $this->setColumnValue(SupportLog::FIELD_NOTES, $value);
    }

    public function getNotes() {
        return $this->getColumnValue(SupportLog::FIELD_NOTES);
    }  
    

    public function setUpdatedAt($value) {
        $this->setColumnDate(SupportLog::FIELD_UPDATED_AT, $value);
    }

    public function getUpdatedAt() {
        return $this->getColumnValue(SupportLog::FIELD_UPDATED_AT);
    }  
    


}