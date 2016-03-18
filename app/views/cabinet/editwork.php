<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 09.03.2016
 * Time: 2:06
 */
include ROOT.'/app/views/layouts/header.php';
?>

<?php
include ROOT.'/app/views/layouts/cabinet_menu.php';
?>
    <script src="/app/views/JavaScript/calendar.js"></script>
    <link href="/app/views/CSS/cal.css" rel="stylesheet" type="text/css" />
    <div id="cabinet_content">
        <div>
<?php 
$name=Cabinet::getViewsEdit($_SESSION['workid']);
echo
    '
          Редактировать
         <form action="/cabinet/editwork/'.$_SESSION['workid'].'" method="post" enctype="multipart/form-data">
                Тема/названия работы<br>
                <input type="text" value="'.$name['0']['theme_file'].'" required="required" name="theme"/><br>
                <label for="pages">Кол-во страниц:</label><br>
                <input type="number" min="0" max="1000" step="1" name="page" value="'.$name['0']['count_page'].'"/><br>
                 <textarea maxlength
                              ="4098" cols="25" rows="10" name="description">'.$name['0']['desc_work'].'</textarea><br>
                Цена работи(руб.)(10% комисия)<br>
                 <input value="'.$name['0']['price_work'].'" type="number" min="0" max="100000" name="price" step="1"/><br>
                <input type="reset" value="сброс"/><input type="submit" value="Редактировать"/>

            </form>


';
?>
        </div>

    </div>
<?php include ROOT . '/app/views/layouts/footer.php'; ?>
