<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of CompanyUser
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-08-20 19:50
 * Updated @2016-08-20 19:50
 */
class CompanyUser extends \lib\model\Model 
{

    const FIELD_ID = 'company_user.id';
    const FIELD_COMPANY_ID = 'company_user.company_id';
    const FIELD_USER_ID = 'company_user.user_id';
    const FIELD_USER_FUNCTIONS_ID = 'company_user.user_functions_id';
    const FIELD_CODE = 'company_user.code';
    const FIELD_ACTIVE = 'company_user.active';
    
    const TABLE = 'company_user';
    
    
    protected function setModel(){
        $this->columnNames['company_user'] = ['id', 'company_id', 'user_id', 'user_functions_id', 'code', 'active'];
            
        $this->tableName = 'company_user';
        
        $this->primaryKey = ['id'];
        $this->fk[CompanyUser::FIELD_COMPANY_ID] = ['table'=>'company', 'field'=>'id'];
	$this->fk[CompanyUser::FIELD_USER_FUNCTIONS_ID] = ['table'=>'user_functions', 'field'=>'id'];
	$this->fk[CompanyUser::FIELD_USER_ID] = ['table'=>'user_base', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getCode();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(CompanyUser::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(CompanyUser::FIELD_ID);
    }  
    

    public function setCompanyId($value) {
        $this->setColumnValue(CompanyUser::FIELD_COMPANY_ID, $value);
    }

    public function getCompanyId() {
        return $this->getColumnValue(CompanyUser::FIELD_COMPANY_ID);
    }  
    

    public function setUserId($value) {
        $this->setColumnValue(CompanyUser::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(CompanyUser::FIELD_USER_ID);
    }  
    

    public function setUserFunctionsId($value) {
        $this->setColumnValue(CompanyUser::FIELD_USER_FUNCTIONS_ID, $value);
    }

    public function getUserFunctionsId() {
        return $this->getColumnValue(CompanyUser::FIELD_USER_FUNCTIONS_ID);
    }  
    

    public function setCode($value) {
        $this->setColumnValue(CompanyUser::FIELD_CODE, $value);
    }

    public function getCode() {
        return $this->getColumnValue(CompanyUser::FIELD_CODE);
    }  
    

    public function setActive($value) {
        $this->setColumnValue(CompanyUser::FIELD_ACTIVE, $value);
    }

    public function getActive() {
        return $this->getColumnValue(CompanyUser::FIELD_ACTIVE);
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
    * @return new \model\models\UserFunctions;
    */
    public function getUserFunctions() {
        $obj = new \model\models\UserFunctions();
        $obj->merge($this);
        return $obj;
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
    

}