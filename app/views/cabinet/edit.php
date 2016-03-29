<?php
include ROOT . '/app/views/layouts/header.php';

?>

<?php
include ROOT . '/app/views/layouts/cabinet_menu.php';
?>

<div id="cabinet_content"><?php if ($result): ?>
        <p>Данные отредактированы.</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="signup-form"><!--sign up form-->
            <h2>Редактирование данных</h2>

            <form action="#" method="post">
                <p>Имя:</p>
                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>

                <p>Пароль:</p>
                <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                <br/>
                <input type="submit" name="submit" class="btn btn-default" value="Сохранить"/>
            </form>
        </div><!--/sign up form-->

    <?php endif; ?>

</div>

<?php include ROOT . '/app/views/layouts/footer.php'; ?>
