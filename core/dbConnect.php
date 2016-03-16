<?php
class dbConnect
{

    public static function getConnection()
    {
//connect database

            $DBH = new PDO('mysql:host=localhost;dbname=shop_db', 'root', '411826403',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));

        return $DBH;
}
}