<?php
error_reporting(E_ALL);
ini_set('display_errors', "1");

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('HTMROOT', getcwd());

if (!is_link(HTMROOT . DS . 'images')) {
    $dirs = ['css', 'js', 'images', 'userfiles', 'themes', 'plugins', 'fonts', 'font-awesome'];
    foreach($dirs as $dir){
        symlink(ROOT . DS . 'public_html' . DS . $dir, HTMROOT . DS . $dir);
    }
}


require_once (ROOT . DS . 'config' . DS . 'boot.php');
