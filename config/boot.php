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

//let's fire the thing
\lib\loader\Boot::run();

