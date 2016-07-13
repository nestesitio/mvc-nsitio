<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Langs
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-07-07 15:01
 * Updated @2016-07-07 15:01
 */
class Langs extends \lib\model\Model 
{

    const FIELD_TLD = 'langs.tld';
    const FIELD_NAME = 'langs.name';
    const FIELD_LOCALE = 'langs.locale';
    
    const TABLE = 'langs';
    
    
    protected function setModel(){
        $this->columnNames['langs'] = ['tld', 'name', 'locale'];
            
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
    

    public function setLocale($value) {
        $this->setColumnValue(Langs::FIELD_LOCALE, $value);
    }

    public function getLocale() {
        return $this->getColumnValue(Langs::FIELD_LOCALE);
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