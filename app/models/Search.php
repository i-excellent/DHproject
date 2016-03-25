<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:43
 */
class Search {
    function get_results($words){
        $DBH = dbConnect::getConnection();
        $sql = "SELECT * FROM (`work_user`) WHERE ";
        $i = 0;
        foreach($words as $key => $value){
            $i++;
            $sql = $sql." `theme_file` LIKE '%".$value."%' OR `desc_work` LIKE '%".$value."%'".($i==count($words)?"":" OR");
        }
        $sql .= " ORDER BY `date_work` DESC";
        var_dump($sql);
        $result = $DBH->query($sql);
        if ($result->rowCount() > 0) ;
        {
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}