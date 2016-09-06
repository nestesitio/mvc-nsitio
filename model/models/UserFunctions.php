<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserFunctions
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-09-06 12:59
 * Updated @2016-09-06 12:59
 */
class UserFunctions extends \lib\model\Model 
{

    const FIELD_ID = 'user_functions.id';
    const FIELD_FUNCTION = 'user_functions.function';
    const FIELD_DESCRIPTION = 'user_functions.description';
    const FIELD_PUBLIC = 'user_functions.public';
    
    const TABLE = 'user_functions';
    
    
    protected function setModel(){
        $this->columnNames['user_functions'] = ['id', 'function', 'description', 'public'];
            
        $this->tableName = 'user_functions';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        $this->uniqueKey = ['function'];
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getFunction();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(UserFunctions::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(UserFunctions::FIELD_ID);
    }  
    

    public function setFunction($value) {
        $this->setColumnValue(UserFunctions::FIELD_FUNCTION, $value);
    }

    public function getFunction() {
        return $this->getColumnValue(UserFunctions::FIELD_FUNCTION);
    }  
    

    public function setDescription($value) {
        $this->setColumnValue(UserFunctions::FIELD_DESCRIPTION, $value);
    }

    public function getDescription() {
        return $this->getColumnValue(UserFunctions::FIELD_DESCRIPTION);
    }  
    

    public function setPublic($value) {
        $this->setColumnValue(UserFunctions::FIELD_PUBLIC, $value);
    }

    public function getPublic() {
        return $this->getColumnValue(UserFunctions::FIELD_PUBLIC);
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