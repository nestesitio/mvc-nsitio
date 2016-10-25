<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserGroupHasHtmApp
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class UserGroupHasHtmApp extends \lib\model\Model 
{

    const FIELD_USER_GROUP_ID = 'user_group_has_htm_app.user_group_id';
    const FIELD_HTM_APP_ID = 'user_group_has_htm_app.htm_app_id';
    
    const TABLE = 'user_group_has_htm_app';
    
    
    protected function setModel(){
        $this->columnNames['user_group_has_htm_app'] = ['user_group_id', 'htm_app_id'];
            
        $this->tableName = 'user_group_has_htm_app';
        
        $this->primaryKey = ['user_group_id', 'htm_app_id'];
        $this->fk[UserGroupHasHtmApp::FIELD_HTM_APP_ID] = ['table'=>'htm_app', 'field'=>'id'];
	$this->fk[UserGroupHasHtmApp::FIELD_USER_GROUP_ID] = ['table'=>'user_group', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setUserGroupId($value) {
        $this->setColumnValue(UserGroupHasHtmApp::FIELD_USER_GROUP_ID, $value);
    }

    public function getUserGroupId() {
        return $this->getColumnValue(UserGroupHasHtmApp::FIELD_USER_GROUP_ID);
    }  
    

    public function setHtmAppId($value) {
        $this->setColumnValue(UserGroupHasHtmApp::FIELD_HTM_APP_ID, $value);
    }

    public function getHtmAppId() {
        return $this->getColumnValue(UserGroupHasHtmApp::FIELD_HTM_APP_ID);
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
    * @return new \model\models\UserGroup;
    */
    public function getUserGroup() {
        $obj = new \model\models\UserGroup();
        $obj->merge($this);
        return $obj;
    }  
    

}