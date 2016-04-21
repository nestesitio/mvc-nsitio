<?php
namespace lib\db;
use PDO;
use \lib\register\Registry;

/**
 * Description of PdoMysql
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 21, 2014
 */
class PdoMysql
{
    private static $conn;

    /* Class Constructor - Create a new database connection if one doesn't exist
     * Set to private so no-one can create a new instance via ' = new DB();' */
    private function __construct() {}

    /* Like the constructor, we make __clone private so nobody can clone the instance  */
    private function __clone() {}

    /*
     * Returns DB instance or create initial connection
     * @return PDO
     */
     public static function getConn()
     {
        if (!self::$conn) {
            $args = \lib\loader\Configurator::getDbConf();
            try {
                $dsn = 'mysql:dbname=' . $args['db'] . ';host=' . $args['host'];
                self::$conn = new PDO($dsn, $args['user'], $args['password']);
                //self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            } catch (PDOException $err) {
                Registry::setErrorMessages(null, $err->getMessage());
                Registry::setUserMessages(null, 'ERRO: Ligação à base de dados não disponível');
            }
        }

        return self::$conn;
    }

}
