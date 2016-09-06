<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmHasVars
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-29 16:42
 * Updated @2016-08-29 16:42
 */
class HtmHasVars extends \lib\model\Model 
{

    const FIELD_HTM_VARS_ID = 'htm_has_vars.htm_vars_id';
    const FIELD_HTM_ID = 'htm_has_vars.htm_id';
    
    const TABLE = 'htm_has_vars';
    
    
    protected function setModel(){
        $this->columnNames['htm_has_vars'] = ['htm_vars_id', 'htm_id'];
            
        $this->tableName = 'htm_has_vars';
        
        $this->primaryKey = ['htm_vars_id', 'htm_id'];
        $this->fk[HtmHasVars::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	$this->fk[HtmHasVars::FIELD_HTM_VARS_ID] = ['table'=>'htm_vars', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setHtmVarsId($value) {
        $this->setColumnValue(HtmHasVars::FIELD_HTM_VARS_ID, $value);
    }

    public function getHtmVarsId() {
        return $this->getColumnValue(HtmHasVars::FIELD_HTM_VARS_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmHasVars::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmHasVars::FIELD_HTM_ID);
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
    * @return new \model\models\HtmVars;
    */
    public function getHtmVars() {
        $obj = new \model\models\HtmVars();
        $obj->merge($this);
        return $obj;
    }  
    

}