<?php

if (session_id() === '') {
  session_start();
}
define('ALL','ALL');
define('ONLY', 'STRICT');
define('CRUD',true);
require_once (ROOT . DS . 'lib' . DS . 'register' . DS . 'Registry.php');
require_once (ROOT . DS . 'lib' . DS . 'loader' . DS . 'SplClassLoader.php');

//register and load classes
$loader = new \lib\loader\SplClassLoader;
$loader->registerDir('lib');
$loader->registerDir('model');
$loader->registerDir('apps');
$loader->register();

// start some static core classes
// initiate configs
new \lib\loader\Configurator;
//initiate pdo
\lib\db\PdoMysql::getConn();

$fp = fopen(ROOT . DS . 'logs' . DS . 'task_log.txt', 'a');
\apps\Taskings\tasks\Task::execute(getopt("t:a:n:m:f:"), $fp);

fclose($fp);


session_write_close();