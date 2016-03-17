<?php
class Subject
{

    public static function getCategorySubject(){
        $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT DISTINCT type, type_id FROM subject");
        if($result->rowCount() > 0);{
            $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row1;
            }
    }
    public static function getSubject($category)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT subject_name,id_subject,count_work FROM subject WHERE type_id=$category");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row2;
    }
    }
    public static function getCategoryesWork($category)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT theme_file,price_work,desc_work,subject_work,name FROM (work_user,user) WHERE type_work=$category");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row2;
    }
    }
}