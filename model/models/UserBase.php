<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserBase
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class UserBase extends \lib\model\Model 
{

    const FIELD_ID = 'user_base.id';
    const FIELD_USER_GROUP_ID = 'user_base.user_group_id';
    const FIELD_NAME = 'user_base.name';
    const FIELD_MAIL = 'user_base.mail';
    const FIELD_USERNAME = 'user_base.username';
    const FIELD_PASSWORD = 'user_base.password';
    const FIELD_STATUS = 'user_base.status';
    const FIELD_CONFIRMED = 'user_base.confirmed';
    const FIELD_SALT = 'user_base.salt';
    const FIELD_USERKEY = 'user_base.userkey';
    
    const TABLE = 'user_base';
    
    
    protected function setModel(){
        $this->columnNames['user_base'] = ['id', 'user_group_id', 'name', 'mail', 'username', 'password', 'status', 'confirmed', 'salt', 'userkey'];
            
        $this->tableName = 'user_base';
        
        $this->primaryKey = ['id'];
        $this->fk[UserBase::FIELD_USER_GROUP_ID] = ['table'=>'user_group', 'field'=>'id'];
	
        #unique keys
        $this->uniqueKey = ['username'];
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getName();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(UserBase::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(UserBase::FIELD_ID);
    }  
    

    public function setUserGroupId($value) {
        $this->setColumnValue(UserBase::FIELD_USER_GROUP_ID, $value);
    }

    public function getUserGroupId() {
        return $this->getColumnValue(UserBase::FIELD_USER_GROUP_ID);
    }  
    

    public function setName($value) {
        $this->setColumnValue(UserBase::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(UserBase::FIELD_NAME);
    }  
    

    public function setMail($value) {
        $this->setColumnValue(UserBase::FIELD_MAIL, $value);
    }

    public function getMail() {
        return $this->getColumnValue(UserBase::FIELD_MAIL);
    }  
    

    public function setUsername($value) {
        $this->setColumnValue(UserBase::FIELD_USERNAME, $value);
    }

    public function getUsername() {
        return $this->getColumnValue(UserBase::FIELD_USERNAME);
    }  
    

    public function setPassword($value) {
        $this->setColumnValue(UserBase::FIELD_PASSWORD, $value);
    }

    public function getPassword() {
        return $this->getColumnValue(UserBase::FIELD_PASSWORD);
    }  
    


    const STATUS_ACTIVE = 'active';
    const STATUS_BLOCKED = 'blocked';
    const STATUS_DISABLED = 'disabled';
    const STATUS_VIRTUAL = 'virtual';
    public static $statuss = ['active', 'blocked', 'disabled', 'virtual'];

    public function setStatus($value) {
        $this->setColumnValue(UserBase::FIELD_STATUS, $value);
    }

    public function getStatus() {
        return $this->getColumnValue(UserBase::FIELD_STATUS);
    }  
    

    public function setConfirmed($value) {
        $this->setColumnValue(UserBase::FIELD_CONFIRMED, $value);
    }

    public function getConfirmed() {
        return $this->getColumnValue(UserBase::FIELD_CONFIRMED);
    }  
    

    public function setSalt($value) {
        $this->setColumnValue(UserBase::FIELD_SALT, $value);
    }

    public function getSalt() {
        return $this->getColumnValue(UserBase::FIELD_SALT);
    }  
    

    public function setUserkey($value) {
        $this->setColumnValue(UserBase::FIELD_USERKEY, $value);
    }

    public function getUserkey() {
        return $this->getColumnValue(UserBase::FIELD_USERKEY);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\CompanyUser;
    */
    public function getCompanyUser() {
        $obj = new \model\models\CompanyUser();
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
    * @return new \model\models\UserGroup;
    */
    public function getUserGroup() {
        $obj = new \model\models\UserGroup();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\UserInfo;
    */
    public function getUserInfo() {
        $obj = new \model\models\UserInfo();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\UserLog;
    */
    public function getUserLog() {
        $obj = new \model\models\UserLog();
        $obj->merge($this);
        return $obj;
    }  
    

}