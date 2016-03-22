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
        $subject = Subject::getSubject();//выбирем все категории и предметы
        foreach ($categories as $row_cat) {
            echo" <p><a class='category' href='/categories/$row_cat[type_id]'>$row_cat[type]</a></p>";
                foreach ($subject as $categories) {
                    if ($categories['type_id'] == $row_cat['type_id'])
                    {
                        if (!$categories['count_work'])//если нет работ в этой категие то выводим текст,есть - ссылку
                        {echo" $categories[subject_name]";}
                        else {
                            echo" <a href='/subject/$categories[id_subject]'>$categories[subject_name][$categories[count_work]]</a>";}}

                    }

        }
        ?>
    </div>
<?php
include ROOT.'/app/views/layouts/footer.php';
?>
