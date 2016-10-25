<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of MediaInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class MediaInfo extends \lib\model\Model 
{

    const FIELD_ID = 'media_info.id';
    const FIELD_MEDIA_ID = 'media_info.media_id';
    const FIELD_MEDIA_COLLECTION_ID = 'media_info.media_collection_id';
    const FIELD_LANGS_TLD = 'media_info.langs_tld';
    const FIELD_TITLE = 'media_info.title';
    const FIELD_AUTHOR = 'media_info.author';
    const FIELD_SUMMARY = 'media_info.summary';
    
    const TABLE = 'media_info';
    
    
    protected function setModel(){
        $this->columnNames['media_info'] = ['id', 'media_id', 'media_collection_id', 'langs_tld', 'title', 'author', 'summary'];
            
        $this->tableName = 'media_info';
        
        $this->primaryKey = ['id'];
        $this->fk[MediaInfo::FIELD_LANGS_TLD] = ['table'=>'langs', 'field'=>'tld'];
	$this->fk[MediaInfo::FIELD_MEDIA_COLLECTION_ID] = ['table'=>'media_collection', 'field'=>'id'];
	$this->fk[MediaInfo::FIELD_MEDIA_ID] = ['table'=>'media', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getTitle();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(MediaInfo::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(MediaInfo::FIELD_ID);
    }  
    

    public function setMediaId($value) {
        $this->setColumnValue(MediaInfo::FIELD_MEDIA_ID, $value);
    }

    public function getMediaId() {
        return $this->getColumnValue(MediaInfo::FIELD_MEDIA_ID);
    }  
    

    public function setMediaCollectionId($value) {
        $this->setColumnValue(MediaInfo::FIELD_MEDIA_COLLECTION_ID, $value);
    }

    public function getMediaCollectionId() {
        return $this->getColumnValue(MediaInfo::FIELD_MEDIA_COLLECTION_ID);
    }  
    

    public function setLangsTld($value) {
        $this->setColumnValue(MediaInfo::FIELD_LANGS_TLD, $value);
    }

    public function getLangsTld() {
        return $this->getColumnValue(MediaInfo::FIELD_LANGS_TLD);
    }  
    

    public function setTitle($value) {
        $this->setColumnValue(MediaInfo::FIELD_TITLE, $value);
    }

    public function getTitle() {
        return $this->getColumnValue(MediaInfo::FIELD_TITLE);
    }  
    

    public function setAuthor($value) {
        $this->setColumnValue(MediaInfo::FIELD_AUTHOR, $value);
    }

    public function getAuthor() {
        return $this->getColumnValue(MediaInfo::FIELD_AUTHOR);
    }  
    

    public function setSummary($value) {
        $this->setColumnValue(MediaInfo::FIELD_SUMMARY, $value);
    }

    public function getSummary() {
        return $this->getColumnValue(MediaInfo::FIELD_SUMMARY);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\Langs;
    */
    public function getLangs() {
        $obj = new \model\models\Langs();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\MediaCollection;
    */
    public function getMediaCollection() {
        $obj = new \model\models\MediaCollection();
        $obj->merge($this);
        return $obj;
    }  
    

    /**
    * Return model object
    * 
    * @return new \model\models\Media;
    */
    public function getMedia() {
        $obj = new \model\models\Media();
        $obj->merge($this);
        return $obj;
    }  
    

}