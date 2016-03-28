<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:43
 */
class Search {
    function get_results($words,$type=0,$subject=0,$attribute=0,$count=0,$age=0){
        $DBH = dbConnect::getConnection();
        $sql = "SELECT * FROM (`work_user`) WHERE ";
        $i = 0;
        foreach($words as $key => $value){
            $i++;
            $sql = $sql." `theme_file` LIKE '%".$value."%' OR `desc_work` LIKE '%".$value."%'".($i==count($words)?"":" OR");
        }
        if(!$type==0)
        {
            $sql .= " AND type_work=$type";
        }
        if(!$subject==0)
        {
            $sql .= " AND subject_work=$subject";
        }
        if(!$attribute==0)
        {
            $sql .= " AND atr_work=$attribute ";
        }
        if(!$count===0)
        {
            $sql .= " AND count_page=$count";
        }
        if(!$age===0)
        {
            $sql .= " AND date_work=$age";
        }


        $sql .= " ORDER BY `date_work` DESC";
        var_dump($sql);
        $result = $DBH->query($sql);
        if ($result->rowCount() > 0) ;
        {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }

}