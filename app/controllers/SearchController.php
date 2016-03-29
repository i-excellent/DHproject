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

    public function actionSearch()
    {
        $strSearch = $_POST['string'];
        $type = (int)($_POST['type']);
        $subject = (int)$_POST['subject'];
        $attribute = (int)$_POST['attribute'];
        $count = (int)$_POST['count'];
        $age = (int)$_POST['age'];
        $max = 10; // максимальное количество слов во фразе
        $min_length = 3; // минимальная длина искомого слова
        $word = explode(" ", $this->getCleanString($_POST['string']));
        $words = $this->clean_array_to_search($word, $max, $min_length);
        $Search = new Search();
        $sql_string = $this->get_construct_sql_string($words, $type, $subject, $attribute, $count, $age);
        echo $sql_string;
        $results = $Search->get_results($sql_string);
        $result = $this->get_matches($results, $words);
        require_once(ROOT . '/app/views/MainSearch.php');

    }

    protected function getCleanString($strSearch)
    {
        $strSearch = strip_tags($strSearch);
        $strSearch = strtolower($strSearch);//Чистим строку
        $cleanString = preg_replace('~[^a-z0-9 \x80-\xFF]~i', "", $strSearch);
        return $cleanString;
    }

    function clean_array_to_search($words = array(), $max = 0, $min_length)
    {
        $result = array();
        $i = 0;
        foreach ($words as $key => $value) {
            if (strlen(trim($value)) >= $min_length) {
                $i++;
                if ($i <= $max) {
                    $result[] = trim($value);
                }
            }
        }
        return $result;
    }

    function get_matches($content, $word = array())
    {
        if (!empty($content)) {
            $matches = array();
            foreach ($content as $p) {
                $res[$p->id_work] = $p;
                foreach ($word as $w) {
                    if (trim($w) != "") {
                        $w = trim($w); // удаляем пробелы
                        $matches[$p->id_work] = null;
                        $matches[$p->id_work] = $matches[$p->id_work] + count(explode($w, $p->theme_file));
                        $matches[$p->id_work] = $matches[$p->id_work] + count(explode($w, $p->desc_work));
                    }
                }
            }
            var_dump($matches);
            arsort($matches); //Сортирует массив в обратном порядке, сохраняя ключи
            var_dump($matches);
            $i = 0;
            foreach ($matches as $k => $v) {
                $result[$i] = $res[$k];
                $result[$i]->matches = $v;
                $i++;
            }
            return $result;
        } else {
            $result_search = 'Ничего не найдено';
            return $result_search;
        }
    }

    function get_construct_sql_string($words, $type = 0, $subject = 0, $attribute = 0, $count = 0, $age = 0)
    {
        $sql = "SELECT * FROM (`work_user`) WHERE ";
        $i = 0;
        if (!$type == 0 & is_int($type)) {               //параметры поска
            $sql_and = ' AND type_work = ' . $type . '';
        }
        if (!$subject == 0 & is_int($subject)) {
            $sql_and .= ' AND subject_work = ' . $subject . '';
        }
        if (!$attribute == 0 & is_int($attribute)) {
            $sql_and .= ' AND atr_work = ' . $attribute . '';
        }
        if (!$count === 0 & is_int($count)) {
            $sql_and .= ' AND count_page = ' . $count . '';
        }
        if (!$age === 0 & is_int($age)) {
            $sql_and .= ' AND date_work = ' . $age . '';
        }
        if (!empty($words)) {                                        // если строка поиска не заполнена
            if (isset($sql_and)) {
                foreach ($words as $key => $value) {
                    $i++;
                    $sql = $sql . " `theme_file` LIKE '%" . $value . "%' $sql_and OR `desc_work` LIKE '%" . $value . "%' $sql_and" . ($i == count($words) ? "" : " OR");
                }
            } else {
                foreach ($words as $key => $value) {
                    $i++;
                    $sql = $sql . " `theme_file` LIKE '%" . $value . "%' OR `desc_work` LIKE '%" . $value . "%'" . ($i == count($words) ? "" : " OR");
                }
            }
        } else {
            if (isset($sql_and)) {                                   //строка поиска не заполнена ,но указаны параметры
                $sql_and = preg_replace("/ AND/", '', $sql_and, 1);//удаляем первое слово "END"}
                $sql .= $sql_and;
            } else                                              //нет ни параметров и пустая строка
            {
                $sql = preg_replace("/WHERE/", '', $sql);//удаляем первое слово "where"}
            }


        }
        $sql .= " ORDER BY `date_work` DESC";
        return $sql;
    }
}