<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserGroup
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class UserGroup extends \lib\model\Model 
{

    const FIELD_ID = 'user_group.id';
    const FIELD_NAME = 'user_group.name';
    const FIELD_DESCRIPTION = 'user_group.description';
    
    const TABLE = 'user_group';
    
    
    protected function setModel(){
        $this->columnNames['user_group'] = ['id', 'name', 'description'];
            
        $this->tableName = 'user_group';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getName();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(UserGroup::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(UserGroup::FIELD_ID);
    }  
    

    public function setName($value) {
        $this->setColumnValue(UserGroup::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(UserGroup::FIELD_NAME);
    }  
    

    public function setDescription($value) {
        $this->setColumnValue(UserGroup::FIELD_DESCRIPTION, $value);
    }

    public function getDescription() {
        return $this->getColumnValue(UserGroup::FIELD_DESCRIPTION);
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
    

    /**
    * Return model object
    * 
    * @return new \model\models\UserGroupHasHtmApp;
    */
    public function getUserGroupHasHtmApp() {
        $obj = new \model\models\UserGroupHasHtmApp();
        $obj->merge($this);
        return $obj;
    }  
    

}