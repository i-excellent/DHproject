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
    public function actionCatalog()
    {

        require_once(ROOT . '/app/views/Catalog.php');
        return true;

    }
}