<?php
//Front controller


//1. Option

ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

//2. Connect file system
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/core/Autoload.php');


//3. Connect database




//4. Call router
$start_router=new Router;
$start_router->run();



