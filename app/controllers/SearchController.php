<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:42
 */
class SearchController
{
public static function actionSearch()
{
    var_dump($_POST['string']);
    var_dump($_POST['logic']);
    var_dump($_POST['type']);
    var_dump($_POST['subject']);
    var_dump($_POST['attribute']);
    var_dump($_POST['count']);
    var_dump($_POST['age']);
    var_dump($_POST['count']);
}
}