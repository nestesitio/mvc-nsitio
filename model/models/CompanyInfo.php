<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of CompanyInfo
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @2016-04-15 18:50
 * Updated @2016-04-15 18:50
 */
class CompanyInfo extends \lib\model\Model 
{

    const FIELD_COMPANY_ID = 'company_info.company_id';
    const FIELD_ADDRESS = 'company_info.address';
    const FIELD_ZIP = 'company_info.zip';
    const FIELD_LOCAL = 'company_info.local';
    const FIELD_NIF = 'company_info.nif';
    const FIELD_TLF = 'company_info.tlf';
    const FIELD_TLM = 'company_info.tlm';
    const FIELD_WEB = 'company_info.web';
    const FIELD_MAIL = 'company_info.mail';
    const FIELD_NOTES = 'company_info.notes';
    
    const TABLE = 'company_info';
    
    
    protected function setModel(){
        $this->columnNames['company_info'] = ['company_id', 'address', 'zip', 'local', 'nif', 'tlf', 'tlm', 'web', 'mail', 'notes'];
            
        $this->tableName = 'company_info';
        
        $this->primaryKey = ['company_id'];
        $this->fk[CompanyInfo::FIELD_COMPANY_ID] = ['table'=>'company', 'field'=>'id'];
	
        #unique keys
        
        #auto increment field
        
    }
    
    public function __toString (){
        return $this->getAddress();
    }
    
    
    public function setCompanyId($value) {
        $this->setColumnValue(CompanyInfo::FIELD_COMPANY_ID, $value);
    }

    public function getCompanyId() {
        return $this->getColumnValue(CompanyInfo::FIELD_COMPANY_ID);
    }  
    

    public function setAddress($value) {
        $this->setColumnValue(CompanyInfo::FIELD_ADDRESS, $value);
    }

    public function getAddress() {
        return $this->getColumnValue(CompanyInfo::FIELD_ADDRESS);
    }  
    

    public function setZip($value) {
        $this->setColumnValue(CompanyInfo::FIELD_ZIP, $value);
    }

    public function getZip() {
        return $this->getColumnValue(CompanyInfo::FIELD_ZIP);
    }  
    

    public function setLocal($value) {
        $this->setColumnValue(CompanyInfo::FIELD_LOCAL, $value);
    }

    public function getLocal() {
        return $this->getColumnValue(CompanyInfo::FIELD_LOCAL);
    }  
    

    public function setNif($value) {
        $this->setColumnValue(CompanyInfo::FIELD_NIF, $value);
    }

    public function getNif() {
        return $this->getColumnValue(CompanyInfo::FIELD_NIF);
    }  
    

    public function setTlf($value) {
        $this->setColumnValue(CompanyInfo::FIELD_TLF, $value);
    }

    public function getTlf() {
        return $this->getColumnValue(CompanyInfo::FIELD_TLF);
    }  
    

    public function setTlm($value) {
        $this->setColumnValue(CompanyInfo::FIELD_TLM, $value);
    }

    public function getTlm() {
        return $this->getColumnValue(CompanyInfo::FIELD_TLM);
    }  
    

    public function setWeb($value) {
        $this->setColumnValue(CompanyInfo::FIELD_WEB, $value);
    }

    public function getWeb() {
        return $this->getColumnValue(CompanyInfo::FIELD_WEB);
    }  
    

    public function setMail($value) {
        $this->setColumnValue(CompanyInfo::FIELD_MAIL, $value);
    }

    public function getMail() {
        return $this->getColumnValue(CompanyInfo::FIELD_MAIL);
    }  
    

    public function setNotes($value) {
        $this->setColumnValue(CompanyInfo::FIELD_NOTES, $value);
    }

    public function getNotes() {
        return $this->getColumnValue(CompanyInfo::FIELD_NOTES);
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
    

}