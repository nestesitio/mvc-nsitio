<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Support
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class Support extends \lib\model\Model 
{

    const FIELD_ID = 'support.id';
    const FIELD_USER_ID = 'support.user_id';
    const FIELD_SOURCE = 'support.source';
    const FIELD_STATUS = 'support.status';
    const FIELD_TYPE = 'support.type';
    
    const TABLE = 'support';
    
    
    protected function setModel(){
        $this->columnNames['support'] = ['id', 'user_id', 'source', 'status', 'type'];
            
        $this->tableName = 'support';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setId($value) {
        $this->setColumnValue(Support::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(Support::FIELD_ID);
    }  
    

    public function setUserId($value) {
        $this->setColumnValue(Support::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(Support::FIELD_USER_ID);
    }  
    


    const SOURCE_PHONE = 'phone';
    const SOURCE_MAIL = 'mail';
    const SOURCE_WEB = 'web';
    public static $sources = ['phone', 'mail', 'web'];

    public function setSource($value) {
        $this->setColumnValue(Support::FIELD_SOURCE, $value);
    }

    public function getSource() {
        return $this->getColumnValue(Support::FIELD_SOURCE);
    }  
    


    const STATUS_OPEN = 'open';
    const STATUS_ASSIGNED = 'assigned';
    const STATUS_CLOSED = 'closed';
    public static $statuss = ['open', 'assigned', 'closed'];

    public function setStatus($value) {
        $this->setColumnValue(Support::FIELD_STATUS, $value);
    }

    public function getStatus() {
        return $this->getColumnValue(Support::FIELD_STATUS);
    }  
    


    const TYPE_QUERY = 'query';
    const TYPE_ISSUE = 'issue';
    const TYPE_SUGGESTION = 'suggestion';
    public static $types = ['query', 'issue', 'suggestion'];

    public function setType($value) {
        $this->setColumnValue(Support::FIELD_TYPE, $value);
    }

    public function getType() {
        return $this->getColumnValue(Support::FIELD_TYPE);
    }  
    


}