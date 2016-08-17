<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmApp
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class HtmApp extends \lib\model\Model 
{

    const FIELD_ID = 'htm_app.id';
    const FIELD_SLUG = 'htm_app.slug';
    const FIELD_NAME = 'htm_app.name';
    
    const TABLE = 'htm_app';
    
    
    protected function setModel(){
        $this->columnNames['htm_app'] = ['id', 'slug', 'name'];
            
        $this->tableName = 'htm_app';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        $this->uniqueKey = ['slug'];
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getSlug();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmApp::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmApp::FIELD_ID);
    }  
    

    public function setSlug($value) {
        $this->setColumnValue(HtmApp::FIELD_SLUG, $value);
    }

    public function getSlug() {
        return $this->getColumnValue(HtmApp::FIELD_SLUG);
    }  
    

    public function setName($value) {
        $this->setColumnValue(HtmApp::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(HtmApp::FIELD_NAME);
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
    * @return new \model\models\UserGroupHasHtmApp;
    */
    public function getUserGroupHasHtmApp() {
        $obj = new \model\models\UserGroupHasHtmApp();
        $obj->merge($this);
        return $obj;
    }  
    

}