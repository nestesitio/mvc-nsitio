<?php
namespace model\models;

use \lib\mysql\Mysql;


/**
 * Description of %$className%
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @%$dateCreated%
 * Updated @%$dateUpdated% *
 */
class %$className% extends \lib\model\Model 
{

    #%$fieldconstant%
    
    protected function setModel(){
        $this->columnNames['%$tableName%'] = [%$tableColumns%];
        #$this->columnNames['%$tableJoinName%'] = [%$tableJoinColumns%];    
        $this->tableName = '%$tableName%';
        
        $this->primaryKey = [%$primaryKeys%];
        #$this->fk[%$fkField%] = ['table'=>'%$consTable%', 'field'=>'%$consField%'];
        #unique keys
        $this->uniqueKey = [%$uniqueKeys%];
        #auto increment field
        $this->autoincrement = '%$incrementKey%';
    }
    
    public function __toString (){
        return $this->get%$toString%();
    }
    
    

}
