<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 16.03.2016
 * Time: 2:38
 */
class Cabinet {
    public static function workUpload($name_file,  $size_file, $theme_file,
                                      $type_work, $subject_work, $count_page,
                                      $date_work, $lang_work, $desc_work, $price_work,$userId)
    {
        // Соединение с БД
        $DBH = dbConnect::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO work_user (name_file,  size_file, theme_file,
                                  type_work, subject_work, count_page,
                                  date_work, lang_work, desc_work, price_work,user_id) '
            . 'VALUES (:name_file,  :size_file, :theme_file,
                                  :type_work, :subject_work, :count_page,
                                  :date_work, :lang_work, :desc_work, :price_work,:userId)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $DBH->prepare($sql);
        $result->bindParam(':name_file', $name_file, PDO::PARAM_STR);
        $result->bindParam(':size_file', $size_file, PDO::PARAM_STR);
        $result->bindParam(':theme_file', $theme_file, PDO::PARAM_STR);
        $result->bindParam(':type_work', $type_work, PDO::PARAM_STR);
        $result->bindParam(':subject_work', $subject_work, PDO::PARAM_STR);
        $result->bindParam(':count_page', $count_page, PDO::PARAM_STR);
        $result->bindParam(':date_work', $date_work, PDO::PARAM_STR);
        $result->bindParam(':lang_work', $lang_work, PDO::PARAM_STR);
        $result->bindParam(':desc_work', $desc_work, PDO::PARAM_STR);
        $result->bindParam(':price_work', $price_work, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function getWorkViews($userId){
        $DBH = dbConnect::getConnection();

        $result=$DBH->query("SELECT id_work,theme_file,count_sell,price_work FROM work_user WHERE user_id=$userId");
        if($result->rowCount() > 0);{
            $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row1;
        }
    }
    private static function getCheckNameFile($workId){
        $DBH = dbConnect::getConnection();
        $result=$DBH->query("SELECT name_file,user_id FROM work_user WHERE id_work=$workId");
        if($result->rowCount() > 0);{
            $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row1;
        }
        }
    public static function getWorkDelete($id){
        $row = Cabinet::getCheckNameFile($id);
        var_dump($row);
        unlink(ROOT. "/upload/$row[user_id]/$row[name_file]");
        if(isset($row)){
        $DBH = dbConnect::getConnection();
        // Получение и возврат результатов. Используется подготовленный запрос
        $result =  $DBH->prepare("DELETE FROM work_user WHERE id_work=:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();}
            return true;

        }

}