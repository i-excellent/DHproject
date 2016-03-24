<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 24.03.2016
 * Time: 0:42
 */
class SearchController
{
    public $strSearch;
    public $logic;
    public $type;
    public $subject;
    public $attribute;
    public $count;
    public $age;

public static function actionSearch()
{    $strSearch=$_POST['string'];
     $logic=$_POST['logic'];
     $type=$_POST['type'];
     $subject=$_POST['subject'];
     $attribute=$_POST['attribute'];
     $count=$_POST['count'];
     $age=$_POST['age'];
    $strSearch = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $strSearch);//чистим от ваты
    if(iconv_strlen($strSearch)>2)//строка поиска больше 2
    {
        $sqlStrQuery=$strSearch;
        echo 1;
        $Search=Search::getSearchWork($strSearch);
        var_dump($Search);
    }
    elseif(iconv_strlen($strSearch)==0)
    {
        $sqlStrQuery='';
        echo 2;
    }
    else
    {
        echo 'Строка поиска долна бить пуста или больше 2 символов';
    }

    var_dump($_POST['string']);
    var_dump($_POST['logic']);
    var_dump($_POST['type']);
    var_dump($_POST['subject']);
    var_dump($_POST['attribute']);
    var_dump($_POST['count']);


}
}