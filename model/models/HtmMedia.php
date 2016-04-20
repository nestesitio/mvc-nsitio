<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmMedia
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class HtmMedia extends \lib\model\Model 
{

    const FIELD_ID = 'htm_media.id';
    const FIELD_HTM_ID = 'htm_media.htm_id';
    const FIELD_GENRE = 'htm_media.genre';
    const FIELD_URL = 'htm_media.url';
    const FIELD_POSITION = 'htm_media.position';
    const FIELD_TITLE = 'htm_media.title';
    const FIELD_AUTHOR = 'htm_media.author';
    const FIELD_DATE = 'htm_media.date';
    const FIELD_CREATED = 'htm_media.created';
    const FIELD_DESCRIPTION = 'htm_media.description';
    
    const TABLE = 'htm_media';
    
    
    protected function setModel(){
        $this->columnNames['htm_media'] = ['id', 'htm_id', 'genre', 'url', 'position', 'title', 'author', 'date', 'created', 'description'];
            
        $this->tableName = 'htm_media';
        
        $this->primaryKey = ['id'];
        $this->fk[HtmMedia::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        $this->autoincrement = 'id';
    }
    
    public function __toString (){
        return $this->getUrl();
    }
    
    
    public function setId($value) {
        $this->setColumnValue(HtmMedia::FIELD_ID, $value);
    }

    public function getId() {
        return $this->getColumnValue(HtmMedia::FIELD_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmMedia::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmMedia::FIELD_HTM_ID);
    }  
    


    const GENRE_IMG = 'img';
    const GENRE_FILE = 'file';
    const GENRE_EMBED = 'embed';
    const GENRE_PDF = 'pdf';
    public static $genres = ['img', 'file', 'embed', 'pdf'];

    public function setGenre($value) {
        $this->setColumnValue(HtmMedia::FIELD_GENRE, $value);
    }

    public function getGenre() {
        return $this->getColumnValue(HtmMedia::FIELD_GENRE);
    }  
    

    public function setUrl($value) {
        $this->setColumnValue(HtmMedia::FIELD_URL, $value);
    }

    public function getUrl() {
        return $this->getColumnValue(HtmMedia::FIELD_URL);
    }  
    

    public function setPosition($value) {
        $this->setColumnValue(HtmMedia::FIELD_POSITION, $value);
    }

    public function getPosition() {
        return $this->getColumnValue(HtmMedia::FIELD_POSITION);
    }  
    

    public function setTitle($value) {
        $this->setColumnValue(HtmMedia::FIELD_TITLE, $value);
    }

    public function getTitle() {
        return $this->getColumnValue(HtmMedia::FIELD_TITLE);
    }  
    

    public function setAuthor($value) {
        $this->setColumnValue(HtmMedia::FIELD_AUTHOR, $value);
    }

    public function getAuthor() {
        return $this->getColumnValue(HtmMedia::FIELD_AUTHOR);
    }  
    

    public function setDate($value) {
        $this->setColumnDate(HtmMedia::FIELD_DATE, $value);
    }

    public function getDate() {
        return $this->getColumnValue(HtmMedia::FIELD_DATE);
    }  
    

    public function setCreated($value) {
        $this->setColumnDate(HtmMedia::FIELD_CREATED, $value);
    }

    public function getCreated() {
        return $this->getColumnValue(HtmMedia::FIELD_CREATED);
    }  
    

    public function setDescription($value) {
        $this->setColumnValue(HtmMedia::FIELD_DESCRIPTION, $value);
    }

    public function getDescription() {
        return $this->getColumnValue(HtmMedia::FIELD_DESCRIPTION);
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