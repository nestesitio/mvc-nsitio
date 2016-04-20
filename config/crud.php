<?php

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

$options = getopt("b:a:n:t:");
if(isset($options['b'])){
    echo "Building \n";
    $exec = new \lib\crud\Generate();
    if($options['b'] == 'model'){
        # php task.php -b model
        $exec->buildModel();
    }elseif($options['b'] == 'admin' || $options['b'] == 'app'){
        # php task.php -b admin -a app -n control -t model
        if($options['a'] && $options['n'] && $options['t']){
            $exec->buildApp($options['a'], $options['n'], $options['t'], $options['b']);
        }else{
            echo "no arguments to build app -n appname, -t table_name ... \n";
        }
        
    }
}else{
    echo "Task arguments: \n";
    echo "-b [model, admin, app] \n";
    echo "-b model \n";
    echo "-b admin -a app -n (control_name) -t (table_name) \n";
    echo "-b app -n (app_name) -t (table_name) \n";
}
