<?php

namespace lib\model;

use \lib\register\Registry;
use \lib\register\Monitor;
use \lib\db\PdoMysql as PdoMysql;
use PDO;
use \lib\mysql\Mysql as Mysql;

/**
 * Description of Query
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 25, 2014
 */
class Query {

    protected $count = 0;
    protected $pdo;
    protected $model;
    protected $query_statement;
    protected $query_string = '';
    
    protected $columns;
    protected $pdostmt;
    
    protected $querytime = 0;
    protected $string;
    
    
    function __construct($class = null, $merge = ALL) {
        if (null != $class) {
            $this->model = $class;
            //if($merge == ALL){$this->columns = $this->model->getMergedColumns();
            if($merge == ONLY){
                $this->columns = $this->model->getOnlyModelColumns(false);
            }else{
                $this->columns = $this->model->getOnlyModelColumns(ALL);
            }
            
        }
        //Start PDO connection
        $this->pdo = PdoMysql::getConn();
        
    }
    
    public $copy;
    
    function __clone(){
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->copy = clone $this;
    }
    
    public static function exec($query){
        $obj = new Query();
        return $obj->execute($query);
    }
    
    public function querySimple($query, $fetch = PDO::FETCH_ASSOC) {
        $sth = $this->pdo->prepare($query);
        $sth->execute();
        return $sth->fetchAll($fetch);
    }

    public static function query($query, $fetch = PDO::FETCH_ASSOC) {
        $obj = new Query();
        return $obj->querySimple($query, $fetch);
    }

    protected function executeQuery($query, $params, $values = null){
        $start_time = microtime(true);
        $this->pdostmt = $this->pdo->prepare($query);
        if(null != $values){
            $this->bindValues($values);
        }else{
            $this->bindValues($params);
        }
        if ($this->pdostmt->execute() == false) {
            echo 'QUERY FATAL ERROR Nº '.$this->pdostmt->errorCode().':<br />';
            echo $this->writeQueryMessage($query, $params) . '<br />';
            echo $this->pdostmt->errorInfo()[2] . '<hr />';
            die();
        }
        $this->querytime = number_format(microtime(true) - $start_time, 9);
    }
    
    protected function getIncrementId($table, $col){
        $query = "SELECT $col + 1 FROM $table ORDER BY $col DESC LIMIT 1";

        $pdostmt = $this->pdo->prepare($query);
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_NUM);
        $id = ($result == false)? 1 : $result[0][0];
        //echo $id . '+';
        return $id;
        
    }
    
    public static function getNextIdFromTable($table){
        $pdo = PdoMysql::getConn();
         #SELECT c.id + 1 AS FirstAvailableId FROM product_code c LEFT JOIN product_code c1 ON c1.id = c.id + 1 
         #WHERE c1.id IS NULL ORDER BY c.id LIMIT 0, 1 
        $query = "SELECT a.id + 1 FROM $table a "
                . "LEFT JOIN $table b ON a.id = b.id + 1 "
                . "WHERE b.id IS NULL ORDER BY a.id LIMIT 1";

        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_NUM);
        $id = ($result == false)? 1 : $result[0][0];
        //echo $id . '+';
        return $id;
    }


    public function getColumns(){
        return $this->columns;
    }
    
    public function addColumns($columns){
        $this->columns = array_merge($this->columns, $columns);
    }
    
    protected function execute($query){
        $this->count = $this->pdo->exec($query);
        return $this->count;
    }
    
    public function getCount(){
        return $this->count;
    }
    
    protected function bindValues($params = []) {
        /*
         * $sex = 'male';
         * $s = $dbh->prepare('SELECT name FROM students WHERE sex = :sex');
         * $s->bindParam(':sex', $sex); // use bindParam to bind the variable
         * $sex = 'female';
         * $s->execute(); // executed with WHERE sex = 'female'
         * or
         * $sex = 'male';
         * $s = $dbh->prepare('SELECT name FROM students WHERE sex = :sex');
         * $s->bindValue(':sex', $sex); // use bindValue to bind the variable's value
         * $sex = 'female';
         * $s->execute(); // executed with WHERE sex = 'male'
         */
        foreach ($params as $field => $value) {
            $value = utf8_decode($value);
            
            $res = $this->pdostmt->bindValue(':' . $field, $value);
            if($res == false){
                Registry::setMonitor(Monitor::FORMERROR, 'Bind :' . $field . ' => ' . $value);
            }
        }
    }
    
    public function setCondition($column, $values, $operator = Mysql::EQUAL, $wildcard= null){
        if($operator == Mysql::BETWEEN){
            if($values['max'] == null && $values['min'] == null){
               return $this; 
            }elseif($values['max'] == null){
                if($operator == Mysql::BETWEEN){
                    $this->query_statement->setCondition($column, Mysql::GREATER_EQUAL, $values['min']);
                }else{
                    $this->query_statement->setCondition($column, $operator, $values['min']);
                }  
            }elseif($values['min'] == null){
                if($operator == Mysql::BETWEEN){
                    $this->query_statement->setCondition($column, Mysql::LESS_EQUAL, $values['max']);
                }else{
                    $this->query_statement->setCondition($column, $operator, $values['max']);
                } 
            }else{
                $this->query_statement->setArrayCondition($column, $values, Mysql::BETWEEN);
            }
        }elseif(is_array($values)){
            if($operator == Mysql::EQUAL){
                $operator = Mysql::IN;
            }
            $this->query_statement->setArrayCondition($column, $values, $operator);
        }else{
            $this->query_statement->setCondition($column, $operator, $values, $wildcard);
            $this->model->setVirtualColumnValue($column, $values);
        }
        
        return $this;
    }
    
    public function where($expression){
        $this->query_statement->where($expression);
        return $this;
    }
    
    public function getAndPopLastCondition(){
        return $this->query_statement->getAndPopLastWhere();
    }
    
    public function joinFilter($operator = Mysql::LOGICAL_OR){
        $expression = $this->getAndPopLastCondition();
        $this->query_statement->joinWhere($expression, $operator);
        return $this;
    }
    
    public function filterByColumnIsNull($column, $null = null){
        $this->query_statement->whereIsNullOrNot($column, $null);
        return $this;
    }
    
    public function filterByColumn($column, $values, $operator = Mysql::EQUAL, $wildcard= null){
        if($values === Mysql::ISNULL || $values === Mysql::ISNOTNULL){
            $this->filterByColumnIsNull($column, $values);
        }else{
            $this->setCondition($column, $values, $operator, $wildcard);
        }
        
        return $this;
    }
    
    public function filterByConcat($expression, $alias, $value = null){
        $this->query_statement->setConcatCondition($expression, $alias, $value);
        $this->fetch_assoc = array_merge($this->fetch_assoc, [$alias]);
        return $this;
    }
    
    public function whereOr($array){
        $this->query_statement->whereOr($array);
        return $this;
    }
    
    public function filterByDateColumn($column, $min, $max, $operator = Mysql::BETWEEN){
        if($max == Mysql::EQUAL || $operator == Mysql::EQUAL){
            $value = \lib\tools\DateTools::convertToSqlDate($min);
            $this->setCondition($column, $value, Mysql::EQUAL);
        }else{
            $this->setCondition($column, ['min'=>$min, 'max'=>$max], $operator);
        }
        return $this;
    }
    
    
    public function filterByPrimaryKeys($values) {
        $keys = $this->model->getPrimaryKey();
        $table = $this->model->getTableName();
        foreach($keys as $column){
            $k = $table . '.' . $column;
            $this->filterByColumn($k, $values[$k]);
        }
        return $this;
    }

    
    protected function writeQueryMessage($query, $params = [], $count = null) {
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $query = str_replace(':' . $key, "'" . $value . "'", $query);
            }
        }

        $numrows = (null != $count) ? $count : $this->count;
        $query .= '<br /><i>Query took ' . $this->querytime . ' sec</i> for ' . $numrows . ' results';
        $this->string = $query;
        Registry::setMonitor(Monitor::QUERY, $query);
        return $query;
    }
    
    function handleErrors($query, $params, $error_message) {
        echo '<pre>';
        echo $this->writeQueryMessage($query, $params);
        echo '</pre>';
        echo $error_message;
        die;
    }
    
    public function getStatement(){
        return $this->query_statement;
    }
    
    public function __toString() {
        return $this->writeQueryMessage($this->query_statement->getStatementString(), $this->query_statement->getParams());
    }
    
    
    

}
