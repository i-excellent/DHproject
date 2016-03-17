<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 16.03.2016
 * Time: 13:49
 */

include ROOT.'/app/views/layouts/header.php';
include ROOT.'/app/views/layouts/left_menu.php';
?>
    <div id="block_content">
        <?php
        foreach ($categories as $row_cat){
            echo" <p><a class='category' href='/categories/$row_cat[type_id]'>$row_cat[type]</a></p>";
              $subject = array();
        $subject = Subject::getSubject($row_cat['type_id']);
        foreach ($subject as $row_sub){
            if (!$row_sub['count_work'])//если нет работ в этой категие то выводим текст,есть - ссылку
            {echo" $row_sub[subject_name]";}
            else {
            echo" <a href='$row_sub[id_subject]'>$row_sub[subject_name][$row_sub[count_work]]</a>";}}}
        ?>
    </div>
<?php
include ROOT.'/app/views/layouts/footer.php';
?>