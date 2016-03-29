<?php

/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:43
 */
class Search
{
    function get_results($sql)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query($sql);
        if ($result->rowCount() > 0) ;
        {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }
}