<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Company
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-18 11:25
 * Updated @2016-08-18 11:25
 */
class Company extends \lib\model\Model 
{

    const FIELD_ID = 'company.id';
    const FIELD_NAME = 'company.name';
    const FIELD_CODE = 'company.code';
    const FIELD_FOLDER = 'company.folder';
    const FIELD_ACTIVE = 'company.active';
    const FIELD_DISTRIBUTOR = 'company.distributor';
    
    const TABLE = 'company';
    
    
    protected function setModel(){
        $this->columnNames['company'] = ['id', 'name', 'code', 'folder', 'active', 'distributor'];
            
        $this->tableName = 'company';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getName();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(Company::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(Company::FIELD_ID);
    }  
    

    public function setName($value) {
        $this->setColumnValue(Company::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(Company::FIELD_NAME);
    }  
    

    public function setCode($value) {
        $this->setColumnValue(Company::FIELD_CODE, $value);
    }

    public function getCode() {
        return $this->getColumnValue(Company::FIELD_CODE);
    }  
    

    public function setFolder($value) {
        $this->setColumnValue(Company::FIELD_FOLDER, $value);
    }

    public function getFolder() {
        return $this->getColumnValue(Company::FIELD_FOLDER);
    }  
    

    public function setActive($value) {
        $this->setColumnValue(Company::FIELD_ACTIVE, $value);
    }

    public function getActive() {
        return $this->getColumnValue(Company::FIELD_ACTIVE);
    }  
    

    public function setDistributor($value) {
        $this->setColumnValue(Company::FIELD_DISTRIBUTOR, $value);
    }

    public function getDistributor() {
        return $this->getColumnValue(Company::FIELD_DISTRIBUTOR);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\CompanyHtm;
    */
    public function getCompanyHtm() {
        $obj = new \model\models\CompanyHtm();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\CompanyInfo;
    */
    public function getCompanyInfo() {
        $obj = new \model\models\CompanyInfo();
        $obj->merge($this);
        return $obj;
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
    

}