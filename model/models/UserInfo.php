<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of UserInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-11-15 17:02
 * Updated @2016-11-15 17:03
 */
class UserInfo extends \lib\model\Model 
{

    const FIELD_USER_ID = 'user_info.user_id';
    const FIELD_ADDRESS = 'user_info.address';
    const FIELD_ZIP = 'user_info.zip';
    const FIELD_LOCAL = 'user_info.local';
    const FIELD_TLF = 'user_info.tlf';
    const FIELD_TLM = 'user_info.tlm';
    const FIELD_NIF = 'user_info.nif';
    const FIELD_BIC = 'user_info.bic';
    const FIELD_BORN = 'user_info.born';
    const FIELD_CIVIL = 'user_info.civil';
    const FIELD_GENRE = 'user_info.genre';
    const FIELD_NOTES = 'user_info.notes';
    
    const TABLE = 'user_info';
    
    
    protected function setModel(){
        $this->columnNames['user_info'] = ['user_id', 'address', 'zip', 'local', 'tlf', 'tlm', 'nif', 'bic', 'born', 'civil', 'genre', 'notes'];
            
        $this->tableName = 'user_info';
        
        $this->primaryKey = ['user_id'];
        $this->fk[UserInfo::FIELD_USER_ID] = ['table'=>'user_base', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return $this->getAddress();
    }
    
    
    public function setUserId($value) {
        $this->setColumnValue(UserInfo::FIELD_USER_ID, $value);
    }

    public function getUserId() {
        return $this->getColumnValue(UserInfo::FIELD_USER_ID);
    }  
    

    public function setAddress($value) {
        $this->setColumnValue(UserInfo::FIELD_ADDRESS, $value);
    }

    public function getAddress() {
        return $this->getColumnValue(UserInfo::FIELD_ADDRESS);
    }  
    

    public function setZip($value) {
        $this->setColumnValue(UserInfo::FIELD_ZIP, $value);
    }

    public function getZip() {
        return $this->getColumnValue(UserInfo::FIELD_ZIP);
    }  
    

    public function setLocal($value) {
        $this->setColumnValue(UserInfo::FIELD_LOCAL, $value);
    }

    public function getLocal() {
        return $this->getColumnValue(UserInfo::FIELD_LOCAL);
    }  
    

    public function setTlf($value) {
        $this->setColumnValue(UserInfo::FIELD_TLF, $value);
    }

    public function getTlf() {
        return $this->getColumnValue(UserInfo::FIELD_TLF);
    }  
    

    public function setTlm($value) {
        $this->setColumnValue(UserInfo::FIELD_TLM, $value);
    }

    public function getTlm() {
        return $this->getColumnValue(UserInfo::FIELD_TLM);
    }  
    

    public function setNif($value) {
        $this->setColumnValue(UserInfo::FIELD_NIF, $value);
    }

    public function getNif() {
        return $this->getColumnValue(UserInfo::FIELD_NIF);
    }  
    

    public function setBic($value) {
        $this->setColumnValue(UserInfo::FIELD_BIC, $value);
    }

    public function getBic() {
        return $this->getColumnValue(UserInfo::FIELD_BIC);
    }  
    

    public function setBorn($value) {
        $this->setColumnDate(UserInfo::FIELD_BORN, $value);
    }

    public function getBorn() {
        return $this->getColumnValue(UserInfo::FIELD_BORN);
    }  
    


    const CIVIL_S = 'S';
    const CIVIL_N = 'N';
    const CIVIL_NA = 'NA';
    public static $civils = ['S', 'N', 'NA'];

    public function setCivil($value) {
        $this->setColumnValue(UserInfo::FIELD_CIVIL, $value);
    }

    public function getCivil() {
        return $this->getColumnValue(UserInfo::FIELD_CIVIL);
    }  
    


    const GENRE_M = 'M';
    const GENRE_F = 'F';
    public static $genres = ['M', 'F'];

    public function setGenre($value) {
        $this->setColumnValue(UserInfo::FIELD_GENRE, $value);
    }

    public function getGenre() {
        return $this->getColumnValue(UserInfo::FIELD_GENRE);
    }  
    

    public function setNotes($value) {
        $this->setColumnValue(UserInfo::FIELD_NOTES, $value);
    }

    public function getNotes() {
        return $this->getColumnValue(UserInfo::FIELD_NOTES);
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