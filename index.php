<?php
//Front controller11156


//1. Options

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


/**
 * Created by PhpStorm.
 * User: losso
 * Date: 16.03.2016
 * Time: 20:48

//получаем данные через $_POST
$_POST['search']= 'karamba';
if (isset($_POST['search'])) {
    $word = $_POST['search'];
    // подключаемся к базе
    $DBH = new PDO('mysql:host=localhost;dbname=shop_db', 'root', '411826403',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));
    // Строим запрос
    $result = $DBH->query("SELECT theme_file FROM work_user WHERE theme_file LIKE '$word' ORDER BY theme_file LIMIT 10");
    if($result->rowCount() > 0)
    {
        $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($row1)) {
            $end_result = '';
            foreach($row1 as $r) {
                $result         = $r['theme_file'];
                $bold           = '<span class="found">' . $word . '</span>';
                $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';
            }
            echo $end_result;
        } else {
            echo '<li>По вашему запросу ничего не найдено</li>';
        }
    }
    else {echo 1;}
}

?>*/