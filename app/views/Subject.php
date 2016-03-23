<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 22.03.2016
 * Time: 11:49
 */
include ROOT.'/app/views/layouts/header.php';
include ROOT.'/app/views/layouts/left_menu.php';
?>
    <div id="block_content">
        <?php
        $categories = Subject::getSubject($idSubject);
        foreach ($categories as $row_work)
            echo"
            <ul>
            <li>$row_work[theme_file]</li>
            <li>$row_work[name]</li>
            <li>$row_work[price_work]</li>
            <li>$row_work[desc_work]</li>
            </ul>"
        ?>
    </div>
<?php
include ROOT.'/app/views/layouts/footer.php';
?>
