<?php

//Подключение библиотеки дебаггинга
require_once './application/lib/Dev.php';

//Объявление пространства имен
use application\core\Router;
use application\lib\Db;

//автозагрузка классов
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', './' . $class . '.php');
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo 'Запрашиваемый класс <b>' . $path . '</b> не найден и как следствие не подключен. С любовью index.php <br>';
    }
});

//Запуск сессии
session_start();

//Присваиваем переменной router экземпляр класса Router 
$router = new Router;
$router->run();

//Присваиваем переменной db экземпляр класса Db
$db = new Db;
