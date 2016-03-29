<?php

/**
 * Контроллер UserController
 */
class UserController
{
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegister()
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $result = false;
        $password_repeat = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_repeat = $_POST['password_repeat'];
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';

            }
            if ($password !== $password_repeat) {
                $errors[] = 'Пароли несовпадают';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['g-recaptcha-response'])) {
                    $errors[] = 'Пройдите проверку на робота';
                }
                $recaptcha = $_POST['g-recaptcha-response'];
                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $secret = '6LdzQxoTAAAAAKXlmVtV2OrLPz5U_zQ_uEudl12n';
                $ip = $_SERVER['REMOTE_ADDR'];
                $url_data = $url . '?secret=' . $secret . '&response=' . $recaptcha . '&remoteip=' . $ip;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url_data);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//отмена проверки сертификата
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//ответ гугла
                $res = curl_exec($curl);
                curl_close($curl);//закрыть соидинение
                $res = json_decode($res);
                if (!$res->success) {
                    $errors[] = 'Ты не прошол проверку';
                }
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/app/views/register.php');
        return true;
    }

    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];


            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId['id'] == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId['id'], $userId['name']);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/index");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/app/views/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Стартуем сессию
        //session_start();

        // Удаляем информацию о пользователе из сессии
        session_destroy();
        unset($userId);
        header("Location: /");

        // Перенаправляем пользователя на главную страницу

        return true;
    }

}
