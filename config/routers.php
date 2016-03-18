<?php
/**
 * Created by PhpStorm.
 * User: losso
 * Date: 27.02.2016
 * Time: 0:37
 */
return array(
     'set/catalog'=> 'set/catalog',
    'categories/([0-9]+)' => 'set/catalog/$1', // actionCategory в CatalogController
    // user:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    //cabinet
    'cabinet/index' => 'cabinet/index',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet/buy' => 'cabinet/buy',
    'cabinet/sell' => 'cabinet/sell',
    'cabinet/logout' => 'user/logout',
    'cabinet/bill' => 'cabinet/bill',
     'cabinet/recall' => 'cabinet/recall',
    'cabinet/upload' => 'cabinet/upload',
    'cabinet/delete/([0-9]+)' => 'cabinet/delete/$1',
    'error' => 'set/error'
);