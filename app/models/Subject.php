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
    public static function getSubject($idSubject=null)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT subject_name,id_subject,type,count_work,type_id FROM subject");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        if(isset($idSubject))
        {
            $result = $DBH->query("SELECT theme_file,desc_work,price_work,name FROM (work_user,user) WHERE subject_work=$idSubject AND user_id=id ");
            if($result->rowCount() > 0);{
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
        }
            return $row;
        }
        return $row2;
    }
    }
    public static function getCategoryesWork($category)
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT theme_file,price_work,desc_work,subject_work,name FROM (work_user,user) WHERE type_work=$category AND user_id=id");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row2;
    }
    }
    public static function getSubjectForAjax($category)
    {
        $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT subject_name,id_subject FROM subject WHERE type_id=$category");
        if($result->rowCount() > 0)
        {
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;}
    }


}