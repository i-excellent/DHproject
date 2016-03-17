<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 16.03.2016
 * Time: 20:48
 */
//получаем данные через $_POST
if (isset($_POST['search'])) {
    $word = $_POST['search'];
    // подключаемся к базе
    $DBH = new PDO('mysql:host=sql8.freemysqlhosting.net;dbname=sql8111036', 'sql8111036', '1GAk7bbrgd',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));
    // Строим запрос
    $result = $DBH->query("SELECT theme_file FROM work_user WHERE theme_file LIKE '%".$word."%' OR desc_work LIKE '%".$word."%'");
    if($result->rowCount() > 0)
    {
        $row1 = $result->fetchAll(PDO::FETCH_ASSOC);
    if(count($row1)) {
        $end_result = '';
        foreach($row1 as $r) {
            $result         = $r['theme_file'];
            $bold           = '<span class="found">' . $word . '</span>';
            $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';
        }
        echo $end_result;
    } else {
        echo '<li>По вашему запросу ничего не найдено</li>';
    }
}
else {echo 1;}
}

?>