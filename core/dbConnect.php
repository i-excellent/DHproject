<?php

class dbConnect
{

    public static function getConnection()
    {
//connect database

            $DBH = new PDO('mysql:host=sql8.freemysqlhosting.net;dbname=sql8111036', 'sql8111036', '1GAk7bbrgd',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));
        return $DBH;
}
}
