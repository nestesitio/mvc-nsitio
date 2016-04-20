<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmTemplate
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class HtmTemplate extends \lib\model\Model 
{

    const FIELD_ID = 'htm_template.id';
    const FIELD_NAME = 'htm_template.name';
    const FIELD_PATH = 'htm_template.path';
    
    const TABLE = 'htm_template';
    
    
    protected function setModel(){
        $this->columnNames['htm_template'] = ['id', 'name', 'path'];
            
        $this->tableName = 'htm_template';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getName();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmTemplate::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmTemplate::FIELD_ID);
    }  
    

    public function setName($value) {
        $this->setColumnValue(HtmTemplate::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(HtmTemplate::FIELD_NAME);
    }  
    

    public function setPath($value) {
        $this->setColumnValue(HtmTemplate::FIELD_PATH, $value);
    }

    public function getPath() {
        return $this->getColumnValue(HtmTemplate::FIELD_PATH);
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
    

}