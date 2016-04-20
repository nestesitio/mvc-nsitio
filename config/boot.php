<?php
define('ALL', 'ALL');
define('ONLY', 'STRICT');
define('CRUD', false);
require_once (ROOT . DS . 'lib' . DS . 'register' . DS . 'Registry.php');
require_once (ROOT . DS . 'lib' . DS . 'tools' . DS . 'MemoryTools.php');
\lib\register\Registry::setMemoryInitial();
require_once (ROOT . DS . 'lib' . DS . 'loader' . DS . 'SplClassLoader.php');
//register and load classes
$loader = new \lib\loader\SplClassLoader;
$loader->registerDir('lib');
$loader->registerDir('model');
$loader->registerDir('apps');
$loader->registerDir('plugins');
$loader->register();
// start some static core classes
// initiate configs
new \lib\loader\Configurator;
//initiate pdo
\lib\db\PdoMysql::getConn();
//start sesson
use \lib\session\Session as Session;
new Session();

// the routing url, we need to use original 'QUERY_STRING' 
// from server paramater because php has parsed the url if we use $_GET
$url = \lib\url\UrlRegister::getUrlRequest();
// register route
$router = new \lib\loader\Router($url);
// finaly we dispatch the output
$router->dispatch();


Session::close();
/*
use \lib\Testes\Teste as Teste;
echo '<hr />' . Teste::execute();
echo '<hr />' . Lib\Testes\Foonix::execute();
 * 
 */