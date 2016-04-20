<?php

namespace apps\Taskings\tasks;

use PDO;
use \lib\model\Query;

/**
 * Description of Optimize
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 9, 2015
 */
class Optimize {

    public static function execute() {
        Query::exec("SET FOREIGN_KEY_CHECKS = 0");
        $result = Query::query("SELECT MAX(id) FROM invoice", PDO::FETCH_NUM);
        $max = $result[0][0];
        
        
        
        return;
    }
    
    /*
     public static function execute() {
        Query::exec("SET FOREIGN_KEY_CHECKS = 0");
        $result = Query::query("SELECT MAX(id) FROM invoice_line", PDO::FETCH_NUM);
        $max = $result[0][0];
        
        
        $query_id = "SELECT t.id + 1 FROM invoice_line t LEFT JOIN invoice_line tt ON (tt.id = t.id + 1) "
                    . "WHERE tt.id IS NULL ORDER BY t.id ASC LIMIT 1 ";
        $result = Query::query($query_id, PDO::FETCH_NUM);
        $min = ($result == false)? 1 : $result[0][0];
        echo $min . "--" . $max . "\n";
        if($min < $max){
            $query = InvoiceLineQuery::start(ONLY)
                    ->filterById(['min'=>$min, 'max'=>$max], Mysql::BETWEEN);
            $rows = $query->find();
            //echo $query->toString() . "\n";
            echo count($rows) . "\n";
            $id = $min;
            foreach($rows as $row){
                $result = Query::query($query_id, PDO::FETCH_NUM);
                $id = $result[0][0];
                echo $row->getId() . "->" . $id . "\n";
                Query::exec("UPDATE invoice_line_is_pack SET pack_id = $id WHERE pack_id = " . $row->getId());
                Query::exec("UPDATE invoice_line_is_pack SET line_id = $id WHERE line_id = " . $row->getId());
                Query::exec("UPDATE presence SET invoice_line_id = $id WHERE invoice_line_id = " . $row->getId());
                $row->setId($id);
                $row->save();
            }
            //Query::exec("ALTER TABLE invoice_line AUTO_INCREMENT " . ($id + 1));
        }
        return;
    } 
     */

}
