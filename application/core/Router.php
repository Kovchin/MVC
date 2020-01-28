<?php

//обозначаем пространство имен
namespace application\core;

//объявляем класс Router
class Router
{
    protected $routes = [];
    protected $params = [];

    //Подгружаем наши маршруты
    public function __construct()
    {
        $arr = require_once './application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    //Добавление маршрутов
    public function add($route, $params)
    {
        //Превращаем ключи в регулярные выражения
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    //Проверка адреса 
    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'action не найден: ' . $action;
                }
            } else {
                echo 'Не найден controller: ' . $path;
            }
        } else {
            echo 'Маршрут не найден';
        }
    }
}
