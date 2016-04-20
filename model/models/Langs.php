<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Langs
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class Langs extends \lib\model\Model 
{

    const FIELD_TLD = 'langs.tld';
    const FIELD_NAME = 'langs.name';
    
    const TABLE = 'langs';
    
    
    protected function setModel(){
        $this->columnNames['langs'] = ['tld', 'name'];
            
        $this->tableName = 'langs';
        
        $this->primaryKey = ['tld'];
        
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return $this->getTld();
    }
    
    
    public function setTld($value) {
        $this->setColumnValue(Langs::FIELD_TLD, $value);
    }

    public function getTld() {
        return $this->getColumnValue(Langs::FIELD_TLD);
    }  
    

    public function setName($value) {
        $this->setColumnValue(Langs::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(Langs::FIELD_NAME);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\HtmPage;
    */
    public function getHtmPage() {
        $obj = new \model\models\HtmPage();
        $obj->merge($this);
        return $obj;
    }  
    

}