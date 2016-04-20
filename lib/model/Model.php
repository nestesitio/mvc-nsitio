<?php

namespace lib\model;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\session\SessionUser;

/**
 * Description of Model
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 21, 2014
 */
class Model {
    
    const ACTION_INSERT = 'insert';
    const ACTION_UPDATE = 'update';
    const ACTION_NONE = 'update';
    const ACTION_SHOW = 'show';

    protected $tableName = '';
    protected $columnNames = [];
    
    protected $tableJoins = [];
    protected $primaryKey = [];
    protected $fk = [];
    
    protected $uniqueKey = [];
    protected $autoincrement = null;
    
    protected $tableAlias = '';
    
    #columns in query select
    protected $columns = [];
    protected $virtualColumns = [];
    
    protected $queue = [];
    
    protected $inserted = 0;
    protected $action = Model::ACTION_SHOW;
    

    function __construct() {
        //these methods are allways in child \model\models\...
        $this->setModel();
        #$this->columnNames['table_name'] = ['id', 'constrain_field' 'field1'];
        #$this->columnNames['referenced_table'] = ['htm_app_id', 'stat'];
        #$this->tableName = 'table_name';
        #$this->tableJoins['referenced_table'] = ['join' => 'INNER JOIN', 'left'=>'table_name.constrain_field', 'right'=>'referenced_table.id'];
        #$this->primaryKey = ['id'];
        #$this->uniqueKey = ['field'];
        #the queued for processing insert / update
        $this->queue = [$this->tableName];
    }
    
    public function merge(\lib\model\Model $parent_model){
        $this->columns = $parent_model->getColumnValues();
    }


    
    public function getQueue() {
        return $this->queue;
    }
    
     /**
     * Convert query result to array, called from Controller
     *
     * @return array
     */
    public function getToArray() {
        $row = [];
        foreach (array_keys($this->columns) as $column) {
            $row[$column] = trim($this->getColumnValue($column));
        }
        return $row;
    }
    
    public function mergeToAlias($column) {
        return $this->tableName . '.' . $column;
    }
    
    /*
    public function saveMerged(){
        $queue = array_reverse($this->columnNames, true);
        foreach($queue as $table => $columns){
            
        }
    }
     */
    
     /**
     * Save the object.
     *
     * @return \lib\model\Model $this
     */
    public function save() {
        if(SessionUser::getAuthUser() == false){
            //return null;
        }
        Registry::setMonitor(Monitor::BOOKMARK, 'Save model ' . get_class($this) . ' to ' . $this->tableName);
        $query = new \lib\model\QueryWrite($this);
        $query->save();
        $lastid = $query->getLastId();
        if(null != $this->autoincrement){
            $this->setColumnValue($this->mergeToAlias($this->autoincrement), $lastid);
            $this->inserted = $query->getInsertId();
            if($query->getRowsChanged() == 1){
                $this->action = Model::ACTION_UPDATE;
            }elseif($this->inserted == 0){
                $this->action = Model::ACTION_NONE;
            }else{
                $this->action = Model::ACTION_INSERT;
            }
        }
        return $this;
        
    }
    
    public function getInsertId() {
        return $this->inserted;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function delete() {
        if(SessionUser::getAuthUser() == false){
            //return null;
        }
        $query = new \lib\model\QueryWrite($this);
        $result = $query->delete();
        if($result == 0){
            Registry::setMonitor(Monitor::QUERY, 'row was not deleted from ' . $this->tableName);
            Registry::setUserMessages(null, 'row not deleted');
        }else{
            Registry::setMonitor(Monitor::QUERY, $result . ' row deleted from ' . $this->tableName);
            Registry::setUserMessages(null, $result . ' row deleted');
        }
        return $result;
    }
    
    
    public function getModelValues() {
        #used by QueryWrite
        $values =[];

        foreach($this->columnNames[$this->tableName] as $col){
            $virtual_col = $this->tableName . '.' . $col;
            if(isset($this->columns[$virtual_col])){
                $values[$col] = $this->columns[$virtual_col];
            }elseif(in_array($col, $this->primaryKey)){
                $values[$col] = 'NULL';
            }
        }
        return $values;
    }
    
    
    public function addColumn($column) {
        $this->columns = array_merge($this->columns, [$column]);
    }
    
    public function addColumnName($table, $column){
        if(isset($this->columnNames[$table])){
            $this->columnNames[$table] = array_merge($this->columnNames[$table], [$column]);
        }else{
            $this->columnNames[$table] = [$column];
        }
    }
    
    public function setColumnValue($column, $value){
        $this->columns[$column] = $value;
    }
    
    public function setColumnDate($column, $value){
        $this->columns[$column] = \lib\tools\DateTools::convertToSqlDate($value);
    }
    
    public function getColumnValue($column){
        if(isset($this->columns[$column])){
            return $this->columns[$column];
        }else{
            Registry::setMonitor(Monitor::DATA, 'Invalid column ' . $column);
            return null;
        }
    }
    
    public function getColumnValues(){
        return $this->columns;
    }
    
    public function setVirtualColumnValue($column,$value){
        $this->virtualColumns[$column] = $value;
    }
    
    protected function getVirtualColumnValue($column){
        return $this->virtualColumns[$column];
    }
    /* merge all columns from joins to query 
     * called from new Query()
     */
    public function getMergedColumns(){
        $columns = [];
        foreach($this->columnNames as $table=>$cols){
            foreach($cols as $col){
                $columns[] = $table . '.' . $col;
            }
        }
        return $columns;
    }
    
    public function getOnlyModelColumns($all = ALL) {
        $columns = [];
        foreach($this->columnNames[$this->tableName] as $col){
            $columns[] = $this->tableName . '.' . $col;
            if ($all == false) {
                return $columns;
            }
        }
        return $columns;
    }
    
    
    
    public function getTableName(){
        return $this::TABLE;
    }
    
    public function getColumns($table = null){
        if($table == null){
            return $this->columnNames;
        }else{
            return $this->columnNames[$table];
        }
    }
    
    public function getFields(){
        return $this->columns;
    }
    
    public function isField($field){
        if(isset($this->columns[$field])){
            return true;
        }
        return false;
    }
    
    public function convertToFields(){
        //used by QuerySelect::findOneOrCreate()
        foreach($this->columnNames[$this->tableName] as $column){
            $key = $this->tableName . '.' . $column;
            if(isset($this->virtualColumns[$key])){
                $this->columns[$key] = $this->virtualColumns[$key];
            }
        }
    }

    public function getPrimaryKey(){
        return $this->primaryKey;
    }
    
    public function getUniqueKey(){
        return $this->uniqueKey;
    }
    
    public function getAutoIncrement(){
        return $this->autoincrement;
    }
    public function getForeignKeys(){
        return $this->fk;
    }
    
    public function getTableJoins(){
        return $this->tableJoins;
    }
    
    public function getTableAlias(){
        return $this->tableAlias;
    }
    

}
