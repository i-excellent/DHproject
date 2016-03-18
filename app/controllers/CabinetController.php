<?php

/**
 * Created by PhpStorm.
 * User: losso
 * Date: 05.03.2016
 * Time: 14:36
 */
class  CabinetController
{

    /**
     * Action для страницы "Кабинет пользователя"
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Подключаем вид
        require_once(ROOT . '/app/views/cabinet/index.php');
        return true;
    }

    /**
     * Action для страницы "Редактирование данных пользователя"
     */
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password);
            }
        }

        // Подключаем вид
        require_once(ROOT . '/app/views/cabinet/edit.php');
        return true;
    }
public function actionSell()
{

    // Подключаем вид

    // Получаем идентификатор пользователя из сессии
    $userId = User::checkLogged();

    // Получаем информацию о пользователе из БД
    $user = User::getUserById($userId);
    require_once(ROOT . '/app/views/cabinet/sell.php');
    return true;
}
    public function actionBuy()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        require_once(ROOT . '/app/views/cabinet/buy.php');
        return true;
    }

public function actionRecall()
{
    // Получаем идентификатор пользователя из сессии
    $userId = User::checkLogged();

    // Получаем информацию о пользователе из БД
    $user = User::getUserById($userId);
    require_once(ROOT . '/app/views/cabinet/recall.php');
    return true;
}

public function actionBill()
{
    // Получаем идентификатор пользователя из сессии
    $userId = User::checkLogged();

    // Получаем информацию о пользователе из БД
    $user = User::getUserById($userId);
    require_once(ROOT . '/app/views/cabinet/bill.php');
    return true;
}
    public function actionUpload()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        if(isset($_FILES['uploadfile']['name'])){
            $name_file = $_FILES['uploadfile']['name'];
            $mime_type = $_FILES['uploadfile']['type'];
            $size_file = $_FILES['uploadfile']['size'];
            $temporal_name = $_FILES['uploadfile']['tmp_name'];
            $theme_file = $_POST['theme'];
            $type_work = $_POST['type'];
            $subject_work = $_POST['subject'];
            $count_page = $_POST['page'];
            $date_work = $_POST['date'];
            $lang_work = $_POST['language'];
            $desc_work = $_POST['description'];
            $price_work = $_POST['price'];
            $name_file = $this->translitName($name_file);

            $patch_user = ROOT. "/upload/$userId/";
            if (!file_exists($patch_user)) {
                mkdir($patch_user, 0700, true);// проверяем если у пользователя папка если нет создем
            }
            $uploadfile = $patch_user . basename($name_file);// Каталог, в который мы будем принимать файл:
            if (copy($temporal_name , $uploadfile))// Копируем файл из каталога для временного хранения файлов:
            {
                echo "<h3>Файл успешно загружен на сервер</h3>";
                $result = Cabinet::workUpload($name_file,  $size_file, $theme_file,
                    $type_work, $subject_work, $count_page,
                    $date_work, $lang_work, $desc_work, $price_work,$userId);
                header("Location: /cabinet/sell");
            }
            else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit;
               }}
        require_once(ROOT . '/app/views/cabinet/upload.php');

        return true;

    }
    private  function translitName($t_name_file,$coder='utf-8')
    {
        $t_name_file = mb_strtolower($t_name_file, $coder);
        $t_name_file = str_replace(array(
            'а','б','в','г','д','е','ё','з','и','й','к',
            'л','м','н','о','п','р','с','т','у','ф','х',
            'ъ','ы','э',' ','ж','ц','ч','ш','щ','ь','ю','я'
        ), array(
            'a','b','v','g','d','e','e','z','i','y','k',
            'l','m','n','o','p','r','s','t','u','f','h',
            'j','i','e','_','zh','ts','ch','sh','shch',
            '','yu','ya'
        ), $t_name_file);
        $t_name_file = trim($t_name_file, '_');
        $name_file = preg_replace("/_{2,}/", "_", $t_name_file);
        return $name_file;
    }
    public function actionDelete($id)
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $row = Cabinet::getCheckNameFile($id);//кто владелец работы узнаем
        if($user['id']===$row[0]['user_id'])//если владелиц и авторизованый пользаватель совпадают - удаляем
       {
        $delete=Cabinet::getWorkDelete($id);
        header("Location: /cabinet/sell");}
        else
        {
            header("Location: /error");
        }
        return true;
    }
    public function actionEditwork($id)
    {   $_SESSION['workid']=$id;
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $row = Cabinet::getCheckNameFile($id);//кто владелец работы узнаем
        if($user['id']===$row[0]['user_id'])//если владелиц и авторизованый пользаватель совпадают - удаляем
       {
           if(isset($_POST['theme'])){

               $theme_file = $_POST['theme'];
               $count_page = $_POST['page'];
               $desc_work = $_POST['description'];
               $price_work = $_POST['price'];
               $result = Cabinet::workEdit($theme_file,
                     $count_page,$desc_work, $price_work,$id);
               header("Location: /cabinet/sell");
           }
        require_once(ROOT . '/app/views/cabinet/editwork.php');}
        else
        {
            header("Location: /error");
        }
        return true;
    }

}
