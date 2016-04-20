<?php

namespace lib\model;

use \lib\register\Registry;
use \lib\register\Monitor;

/**
 * Description of QueryWrite
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 5, 2014
 */
class QueryWrite extends \lib\model\Query implements \lib\model\Write {
    
    protected $lastid = 0;
    protected $rowschanged = 0;
    protected $inserted = 0;
    
    
    public function save(){
        $table = $this->model->getTableName();
        $values = $this->model->getModelValues();
        $keys = $this->model->getPrimaryKey();

        $fields = $data = $params = $udpates = [];
        if(null != $this->model->getAutoIncrement()){
            $updates[] = $this->model->getAutoIncrement() . '= LAST_INSERT_ID('.$this->model->getAutoIncrement().')';
            
        }
        foreach(array_keys($values) as $col){
            $fields[] = $col;
            if(in_array($col, $keys)){
                $id = ($values[$col] == 'NULL')? $this->getIncrementId($table, $col) : $values[$col];
                $params[$col] = $id;
            }else{
                $updates[] = $col . ' = :' . $col;
                $params[$col] = $values[$col];
            }
            $data[] = ':'.$col;
        }
        
        $start_time = microtime(true);
        $query = 'INSERT INTO ' . $table;
        $query .= ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $data) . ')';
        if(isset($updates)){
            $query .= ' ON DUPLICATE KEY UPDATE ' . implode(', ', $updates);
        }
        $this->executeQuery($query, $params);
        $this->register($query, $params, $start_time, $table);
        

        if(null != $this->model->getAutoIncrement()){
            $this->model->setColumnValue($this->model->mergeToAlias($this->model->getAutoIncrement()), $this->getLastId());
        }
        return $this->model;
    }
    
    public function delete() {
        $table = $this->model->getTableName();
        $keys = $this->model->getPrimaryKey();
        $values = $this->model->getModelValues();
        foreach(array_keys($values) as $col){
            if(in_array($col, $keys)){
                $data[] = $col . ' = :'.$col;
                $params[$col] = $values[$col];
            }
        }
        $query = 'DELETE FROM ' . $table . ' WHERE ' . implode(' AND ', $data);
        $this->executeQuery($query, $params);
        return  $this->pdostmt->rowCount();
    }
    
    private function register($query, $params, $start_time, $table = null){
        $this->lastid = $this->pdo->lastInsertId();
        $this->setRowsChanged($this->pdostmt->rowCount());    
        $this->setQueryInfo($query, $params, $start_time);
        Registry::setMonitor(Monitor::QUERY, 'id ' .  $this->lastid . ' inserted');
        Registry::setMonitor(Monitor::QUERY, $this->rowschanged . ' rows changed on ' . $table);
    }
    
    public function getInsertId(){
        return $this->inserted;
    }


    private function setRowsChanged($rows){
        if($rows == 1){
            $this->rowschanged = 0;
            $this->inserted = $this->lastid;
            Registry::setUserMessages(null, '1 row inserted');
        }elseif($rows == 2){
            $this->rowschanged = 1;
            Registry::setUserMessages(null, $this->rowschanged . ' row updated');
        }else{
           $this->rowschanged = $rows; 
           Registry::setUserMessages(null, $this->rowschanged . ' rows changed');
        }
    }
    
    private function setQueryInfo($query, $params, $start_time) {
        $end_time = microtime(true);
        $this->querytime = number_format($end_time - $start_time, 9);
        $this->writeQueryMessage($query, $params);
    }
    
    public function getLastId(){
        return $this->lastid;
    }
    
    public function getRowsChanged() {
        return $this->rowschanged;
    }

    


}
