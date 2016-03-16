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



            <table border="1">
                <caption>Ваши роботы</caption>
                <tr>
                    <th>Наименование</th>
                    <th>Продажи</th>
                    <th>Стоимость</th>
                    <th>Команда</th>
                </tr>
                <?php
                $work_list = array();
                $work_list = Cabinet::getWorkViews();
                foreach ($work_list as $row)

                      echo"  <tr><td>$row[theme_file]</td><td>$row[count_sell]</td><td>$row[price_work]</td><td><a href='/work/delete'>Удалить</a>/<a href='/work/edit'>Редактировать</a></td></tr>";
                ?>


            </table>
            <p style="text-align:justify;">Обращаем Ваше внимание, что согласно действующему договору-оферте, биржа, сайт биржи, компания-оператор биржи и аффилированные физические лица не являются продавцами работ. Биржа является организатором продаж, предоставляющим технические
                услуги по представлению материалов продавцов на своих страницах, а также услуги технического сопровождения платежей и обеспечения качества сделок в соотстветствии с правилами биржи. Средства зачисляются на счет продавца по истечении периода моратория (3-5 дней) для рассмотрения возможных обращений со стороны покупателей. В случае признания информации о проданном материале недостоверной и наличии грубых дефектов, представители биржи принимают решение о частичном или полном зачислении средств на счет продавца и (или) возврате средств покупателю. Решения администрации биржи (т.н. "Арбитраж") являются окончательными и пересмотру не подлежат.  </p>



    </div>
<?php include ROOT . '/app/views/layouts/footer.php'; ?>