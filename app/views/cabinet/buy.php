<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 09.03.2016
 * Time: 2:13
 */


include ROOT . '/app/views/layouts/header.php';

?>

<?php
include ROOT . '/app/views/layouts/cabinet_menu.php';
?>

    <div id="cabinet_content">
        <div class="description" style="background:none;">
            <div style="line-height:1;">
                <small>
                    <p>Все материалы, которые вы приобретали на страницах биржи, опубликованы в этом перечне. Нажмите на
                        ссылку "загрузить" напротив указанного файла и откройте или сохраните на свой компьютер архивный
                        файл в формате ZIP с купленными материалами.
                        Чтобы открыть файл-архив ZIP вам потребуется пароль, <a
                            href="http://yandex.ru/yandsearch?text=%D0%BA%D0%B0%D0%BA%20%D0%BE%D1%82%D0%BA%D1%80%D1%8B%D1%82%D1%8C%20%D1%84%D0%B0%D0%B9%D0%BB%20zip&amp;lr=2"
                            target="_blank" style="color:#000000;text-decoration:underline;">программа WinZip или
                            7zip</a>.</p>

                    <p>Внутри архива вы найдете файл с материалом в формате Microsoft Word 2007 и старше, а также
                        дополнительный файл, содержащий пофразный отчет о проверке работы на плагиат через интернет. В
                        архиве также могут находиться и другие файлы с приложениями к приобретенному вами
                        материалу. </p>
                    <br><br></small>
            </div>
            <table width="100%" style="border:1px solid #ef8400; font-size:10px;padding:5px;" class="table1">
                <tbody>
                <tr style="background-color:#ef8400;color:#ffffff;">
                    <td width="20%"> Дата</td>
                    <td width="60%"> Наименование</td>
                    <td width="20%"> Ссылка</td>
                </tr>
                <tr class="trr1">
                    <td colspan="3" align="center">операций не зарегистрировано.</td>
                </tr>
                </tbody>
            </table>

        </div>


    </div>
<?php include ROOT . '/app/views/layouts/footer.php'; ?>