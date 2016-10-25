<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of HtmHasMedia
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-10-18 13:37
 * Updated @2016-10-18 13:37
 */
class HtmHasMedia extends \lib\model\Model 
{

    const FIELD_MEDIA_ID = 'htm_has_media.media_id';
    const FIELD_HTM_ID = 'htm_has_media.htm_id';
    const FIELD_TITLE = 'htm_has_media.title';
    const FIELD_ORD = 'htm_has_media.ord';
    const FIELD_NOTES = 'htm_has_media.notes';
    
    const TABLE = 'htm_has_media';
    
    
    protected function setModel(){
        $this->columnNames['htm_has_media'] = ['media_id', 'htm_id', 'title', 'ord', 'notes'];
            
        $this->tableName = 'htm_has_media';
        
        $this->primaryKey = ['media_id', 'htm_id'];
        $this->fk[HtmHasMedia::FIELD_HTM_ID] = ['table'=>'htm', 'field'=>'id'];
	$this->fk[HtmHasMedia::FIELD_MEDIA_ID] = ['table'=>'media', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return $this->getTitle();
    }
    
    
    public function setMediaId($value) {
        $this->setColumnValue(HtmHasMedia::FIELD_MEDIA_ID, $value);
    }

    public function getMediaId() {
        return $this->getColumnValue(HtmHasMedia::FIELD_MEDIA_ID);
    }  
    

    public function setHtmId($value) {
        $this->setColumnValue(HtmHasMedia::FIELD_HTM_ID, $value);
    }

    public function getHtmId() {
        return $this->getColumnValue(HtmHasMedia::FIELD_HTM_ID);
    }  
    

    public function setTitle($value) {
        $this->setColumnValue(HtmHasMedia::FIELD_TITLE, $value);
    }

    public function getTitle() {
        return $this->getColumnValue(HtmHasMedia::FIELD_TITLE);
    }  
    

    public function setOrd($value) {
        $this->setColumnValue(HtmHasMedia::FIELD_ORD, $value);
    }

    public function getOrd() {
        return $this->getColumnValue(HtmHasMedia::FIELD_ORD);
    }  
    

    public function setNotes($value) {
        $this->setColumnValue(HtmHasMedia::FIELD_NOTES, $value);
    }

    public function getNotes() {
        return $this->getColumnValue(HtmHasMedia::FIELD_NOTES);
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