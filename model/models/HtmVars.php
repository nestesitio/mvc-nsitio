<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class HtmVars extends \lib\model\Model 
{

    const FIELD_ID = 'htm_vars.id';
    const FIELD_VAR = 'htm_vars.var';
    const FIELD_VALUE = 'htm_vars.value';
    const FIELD_STATUS = 'htm_vars.status';
    
    const TABLE = 'htm_vars';
    
    
    protected function setModel(){
        $this->columnNames['htm_vars'] = ['id', 'var', 'value', 'status'];
            
        $this->tableName = 'htm_vars';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getVar();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmVars::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmVars::FIELD_ID);
    }  
    

    public function setVar($value) {
        $this->setColumnValue(HtmVars::FIELD_VAR, $value);
    }

    public function getVar() {
        return $this->getColumnValue(HtmVars::FIELD_VAR);
    }  
    

    public function setValue($value) {
        $this->setColumnValue(HtmVars::FIELD_VALUE, $value);
    }

    public function getValue() {
        return $this->getColumnValue(HtmVars::FIELD_VALUE);
    }  
    


    const STATUS_PUBLIC = 'public';
    const STATUS_PRIVATE = 'private';
    public static $statuss = ['public', 'private'];

    public function setStatus($value) {
        $this->setColumnValue(HtmVars::FIELD_STATUS, $value);
    }

    public function getStatus() {
        return $this->getColumnValue(HtmVars::FIELD_STATUS);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\HtmPageHasVars;
    */
    public function getHtmPageHasVars() {
        $obj = new \model\models\HtmPageHasVars();
        $obj->merge($this);
        return $obj;
    }  
    

}