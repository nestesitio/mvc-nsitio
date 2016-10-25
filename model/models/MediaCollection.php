<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of MediaCollection
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class MediaCollection extends \lib\model\Model 
{

    const FIELD_ID = 'media_collection.id';
    const FIELD_SLUG = 'media_collection.slug';
    const FIELD_NAME = 'media_collection.name';
    
    const TABLE = 'media_collection';
    
    
    protected function setModel(){
        $this->columnNames['media_collection'] = ['id', 'slug', 'name'];
            
        $this->tableName = 'media_collection';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getSlug();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(MediaCollection::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(MediaCollection::FIELD_ID);
    }  
    

    public function setSlug($value) {
        $this->setColumnValue(MediaCollection::FIELD_SLUG, $value);
    }

    public function getSlug() {
        return $this->getColumnValue(MediaCollection::FIELD_SLUG);
    }  
    

    public function setName($value) {
        $this->setColumnValue(MediaCollection::FIELD_NAME, $value);
    }

    public function getName() {
        return $this->getColumnValue(MediaCollection::FIELD_NAME);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\MediaInfo;
    */
    public function getMediaInfo() {
        $obj = new \model\models\MediaInfo();
        $obj->merge($this);
        return $obj;
    }  
    

}