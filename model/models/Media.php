<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of Media
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class Media extends \lib\model\Model 
{

    const FIELD_ID = 'media.id';
    const FIELD_GENRE = 'media.genre';
    const FIELD_SOURCE = 'media.source';
    const FIELD_LINK = 'media.link';
    const FIELD_DATE = 'media.date';
    const FIELD_CREATED = 'media.created';
    
    const TABLE = 'media';
    
    
    protected function setModel(){
        $this->columnNames['media'] = ['id', 'genre', 'source', 'link', 'date', 'created'];
            
        $this->tableName = 'media';
        
        $this->primaryKey = ['id'];
        
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getSource();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(Media::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(Media::FIELD_ID);
    }  
    


    const GENRE_IMG = 'img';
    const GENRE_FILE = 'file';
    const GENRE_EMBED = 'embed';
    const GENRE_PDF = 'pdf';
    const GENRE_BANNER = 'banner';
    public static $genres = ['img', 'file', 'embed', 'pdf', 'banner'];

    public function setGenre($value) {
        $this->setColumnValue(Media::FIELD_GENRE, $value);
    }

    public function getGenre() {
        return $this->getColumnValue(Media::FIELD_GENRE);
    }  
    

    public function setSource($value) {
        $this->setColumnValue(Media::FIELD_SOURCE, $value);
    }

    public function getSource() {
        return $this->getColumnValue(Media::FIELD_SOURCE);
    }  
    

    public function setLink($value) {
        $this->setColumnValue(Media::FIELD_LINK, $value);
    }

    public function getLink() {
        return $this->getColumnValue(Media::FIELD_LINK);
    }  
    

    public function setDate($value) {
        $this->setColumnDate(Media::FIELD_DATE, $value);
    }

    public function getDate() {
        return $this->getColumnValue(Media::FIELD_DATE);
    }  
    

    public function setCreated($value) {
        $this->setColumnDate(Media::FIELD_CREATED, $value);
    }

    public function getCreated() {
        return $this->getColumnValue(Media::FIELD_CREATED);
    }  
    


    /**
    * Return model object
    * 
    * @return new \model\models\HtmHasMedia;
    */
    public function getHtmHasMedia() {
        $obj = new \model\models\HtmHasMedia();
        $obj->merge($this);
        return $obj;
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