<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of CompanyHtm
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-05 17:19
 * Updated @2016-08-05 17:19
 */
class CompanyHtm extends \lib\model\Model 
{

    const FIELD_ID = 'company_htm.id';
    const FIELD_COMPANY_ID = 'company_htm.company_id';
    const FIELD_HTM_ID = 'company_htm.htm_id';
    const FIELD_HTM_TYPE_ID = 'company_htm.htm_type_id';
    
    const TABLE = 'company_htm';
    
    
    protected function setModel(){
        $this->columnNames['company_htm'] = ['id', 'company_id', 'htm_id', 'htm_type_id'];
            
        $this->tableName = 'company_htm';
        
        $this->primaryKey = ['id'];
        $this->fk[CompanyHtm::FIELD_COMPANY_ID] = ['table'=>'company', 'field'=>'id'];
	$this->fk[CompanyHtm::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return "";
    }
    
    
    public function setId($value) {
        $this->setColumnValue(CompanyHtm::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(CompanyHtm::FIELD_ID);
    }  
    

    public function setCompanyId($value) {
        $this->setColumnValue(CompanyHtm::FIELD_COMPANY_ID, $value);
    }

    public function getCompanyId() {
        return $this->getColumnValue(CompanyHtm::FIELD_COMPANY_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(CompanyHtm::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(CompanyHtm::FIELD_HTM_ID);
    }  
    

    public function setHtmTypeId($value) {
        $this->setColumnValue(CompanyHtm::FIELD_HTM_TYPE_ID, $value);
    }

    public function getHtmTypeId() {
        return $this->getColumnValue(CompanyHtm::FIELD_HTM_TYPE_ID);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\Company;
    */
    public function getCompany() {
        $obj = new \model\models\Company();
        $obj->merge($this);
        return $obj;
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