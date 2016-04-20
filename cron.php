<?php
error_reporting(E_ALL);
ini_set('display_errors', "1");

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

 //php cron.php -t importdata -f garcias
require_once (ROOT . DS . 'config' . DS . 'cron.php');