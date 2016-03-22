<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 19.02.2016
 * Time: 20:43
 */


class SetController
{
    public function actionIndex()
    {

        require_once(ROOT . '/app/views/MainViews.php');
        return true;

    }
    public function actionCatalog($idCategory=null)
    {
if (!isset($idCategory)){
        require_once(ROOT . '/app/views/Catalog.php');
        return true;}
        else
        {
        require_once(ROOT . '/app/views/idcatalog.php');

        }

    }
    public function actionError()
    {
        require_once(ROOT . '/app/views/layouts/error.php');
    }
    public function actionSubject($idSubject)
    {
       require_once(ROOT . '/app/views/Subject.php');
        return true;
    }
    public function actionAjax()
    {
        if(isset($_POST)){
        $category=$_POST['type'];
        $row = Subject::getSubjectForAjax($category);
            echo  json_encode($row);
       }
    }
}
