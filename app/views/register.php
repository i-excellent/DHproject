<?php include ROOT . '/app/views/layouts/header.php';
include ROOT . '/app/views/layouts/left_menu.php'; ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div id="block_content">
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if ($result): ?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Регистрация на сайте</h2>

                            <form action="#" method="post">
                                <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/><br>
                                <input type="email" name="email" placeholder="E-mail"
                                       value="<?php echo $email; ?>"/><br>
                                <input type="password" name="password" placeholder="Пароль"
                                       value="<?php echo $password; ?>"/><br>
                                <input type="password" name="password_repeat" placeholder="Повторите Пароль"
                                       value="<?php echo $password_repeat; ?>"/><br>

                                <div class="g-recaptcha" data-sitekey="6LdzQxoTAAAAAPBWEn_CwuriciInb6svw6wPyctx"></div>
                                <br>
                                <input type="submit" name="submit" class="btn btn-default" value="Регистрация"/>
                            </form>
                        </div><!--/sign up form-->

                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>

    </div>
<?php include ROOT . '/app/views/layouts/footer.php'; ?>