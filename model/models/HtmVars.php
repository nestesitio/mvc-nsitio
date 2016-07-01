<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-06-30 15:54
 * Updated @2016-06-30 15:54
 */
class HtmVars extends \lib\model\Model 
{

    const FIELD_ID = 'htm_vars.id';
    const FIELD_HTM_ID = 'htm_vars.htm_id';
    const FIELD_VAR = 'htm_vars.var';
    const FIELD_VALUE = 'htm_vars.value';
    
    const TABLE = 'htm_vars';
    
    
    protected function setModel(){
        $this->columnNames['htm_vars'] = ['id', 'htm_id', 'var', 'value'];
            
        $this->tableName = 'htm_vars';
        
        $this->primaryKey = ['id'];
        $this->fk[HtmVars::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	
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
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmVars::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmVars::FIELD_HTM_ID);
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