<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 22.03.2016
 * Time: 2:15
 */
class SlowQuery
{
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