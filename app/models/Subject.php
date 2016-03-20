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
    public static function getSubject()
    {
        $DBH = dbConnect::getConnection();
        $result = $DBH->query("SELECT subject_name,id_subject,type,count_work,type_id FROM subject");
        if($result->rowCount() > 0);{
        $row2 = $result->fetchAll(PDO::FETCH_ASSOC);
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
    public static function countWork()
    {   $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT subject_name FROM subject");
        if($result->rowCount() > 0);{
        $row1 = $result->fetchAll(PDO::FETCH_ASSOC);//Узнаемы темы записаных робот без повторений
        $count=count($row1);
        $out_array=array();
        for ($x=0; $x<$count; $x++){
            array_push($out_array,$row1[$x]['subject_name'] );}
    }
        foreach($out_array as $subject)
            {
                $result1 = $DBH->query("SELECT count(subject_work) FROM work_user WHERE subject_work='$subject'");
                if($result1->rowCount() > 0);
                {$row2 = $result1->fetchAll();}
                $row2= array_pop ($row2[0]); //Сколько загруженых работ на определеную тему
                  $sql = "UPDATE subject
                  SET count_work = $row2
                  WHERE subject_name = '$subject'";
                  // Получение и возврат результатов. Используется подготовленный запрос
                  $result = $DBH->prepare($sql);
                $result->bindParam(':count_work', $row2, PDO::PARAM_INT);
                $result->execute();
              }
        return true;
    }

}