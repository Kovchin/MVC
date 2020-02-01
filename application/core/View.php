<?php

namespace application\core;

class View
{
    //Путь до расположения файла вида application\views\ и далее наш путь
    public $path;
    //Массив маршрутизации из файла \application\config\routes.php
    public $route;
    //Шаблон страницы application\views\layouts\default.php
    public $layout = 'default';

    /*
    Конструктор класса в нем определяем $route и $path
    */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /*
    Метод render отрисовывает страницу

    $title - заголовок страницы
    $vars - массив с переменными для отображения в виде
    */
    public function render($title, $vars = [])
    {
        //разбираем ассоциативный массив на переменные
        extract($vars);
        //отображаем страницу если найден вид
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $content = ob_get_clean();
            require_once './application/views/layouts/' . $this->layout . '.php';
        }
        exit;
    }

    /*Перенаправляет на новую страницу*/
    public function redirect($url)
    {
        header('location: ' . $url);
        exit;
    }

    /*
    Метод errorCode перенаправляет на страницу ошибки
    $code - код ошибки 
    от задается при вызове этого метода в частности в application\core\Router.php
    */
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = './application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require_once $path;
        }
        exit;
    }
};
