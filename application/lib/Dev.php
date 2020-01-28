<?php

//Включаем отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Красивый вывод массивов
function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit;
}
