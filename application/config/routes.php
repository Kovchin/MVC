<?php
/*
Маршруты имеющихся страниц на сайте
В этом файле задается соответствие controller и action
*/
return [
    //Главная страница
    '' => [
        //application\controllers
        'controller' => 'main',
        //application\views
        'action' => 'index'
    ],
    //Первый уровень вложения страниц
    'contact' => [
        'controller' => 'main',
        'action' => 'contact'
    ],

    'db' => [
        'controller' => 'main',
        'action' => 'db'
    ],

    //Второй уровень вложения страниц в нем содержится явное указание action и controller
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ],

    'news/show' => [
        'controller' => 'news',
        'action' => 'show'
    ],

];
