<?php
namespace lib\mysql;

/**
 * Description of GeneralStatement
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Dec 2, 2014
 */
class GeneralStatement extends \lib\mysql\MysqlStatement {


    function __construct($action = 'UPDATE') {
        $this->statement[0] = strtoupper($action);
    }

}
