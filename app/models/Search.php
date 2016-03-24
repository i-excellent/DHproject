<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:43
 */
class Search {
public static function getSearchWork($strSearch)
{
// Соединение с БД
    $DBH = dbConnect::getConnection();

    // Текст запроса к БД
    $sql = "SELECT * FROM  work_user WHERE (theme_file,desc_work) LIKE '%маба%'";

    // Получение результатов. Используется подготовленный запрос
    $result = $DBH->prepare($sql);
    if ($result->rowCount() > 0) ;
    {
        $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row1;
    }
}
}