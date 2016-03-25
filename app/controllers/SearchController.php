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

public  function actionSearch()
{    $strSearch=$_POST['string'];
     $logic=$_POST['logic'];
     $type=$_POST['type'];
     $subject=$_POST['subject'];
     $attribute=$_POST['attribute'];
     $count=$_POST['count'];
     $age=$_POST['age'];
        $max = 10; // максимальное количество слов во фразе
        $min_length = 3; // минимальная длина искомого слова
        $word = explode(" ", $this->getCleanString($_POST['string']));
        $words = $this->clean_array_to_search($word, $max, $min_length);
    $Search= new Search();
        $results = $Search->get_results($words);
        $result = $this->get_matches($results, $words);;
    var_dump($result);
    var_dump($_POST['string']);
    var_dump($_POST['logic']);
    var_dump($_POST['type']);
    var_dump($_POST['subject']);
    var_dump($_POST['attribute']);
    var_dump($_POST['count']);


}
    protected function getCleanString($strSearch)
{
    $strSearch = strip_tags($strSearch);
    $strSearch = strtolower($strSearch);//Чистим строку
    $cleanString = preg_replace('~[^a-z0-9 \x80-\xFF]~i', "",$strSearch);
    return $cleanString;
}
    function clean_array_to_search($words = array(), $max = 0, $min_length){
        $result = array();
        $i = 0;
        foreach($words as $key => $value){
            if(strlen(trim($value)) >= $min_length){
                $i++;
                if($i <= $max){
                    $result[] = trim($value);
                }
            }
        }
        return $result;
    }

function get_matches($content, $word = array()){
        $matches = array();
        foreach($content as $p){
            $res[$p->id_work] = $p;
            foreach($word as $w){
                if(trim($w) != ""){
                    $w = trim($w);
                    $matches[$p->id_work] = $matches[$p->id_work] + count(explode($w, $p->theme_file));
                    $matches[$p->id_work] = $matches[$p->id_work] + count(explode($w, $p->desc_work));
                }
            }
        }
        arsort($matches);
        $i = 0;
        foreach($matches as $k => $v){
            $result[$i] = $res[$k];
            $result[$i]->matches = $v;
            $i++;
        }
        return $result;
    }
}