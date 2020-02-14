<?php

namespace application\controllers;

use application\core\Controller;
//Нужно разобраться и удалить строку ниже так как при формировании страницы происходит двойное подключение к базам данных
//Так же стоит поменять require на require_once в файле application\lib\Db.php 18-я строка
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        //Вызываем метод getNews из модели application\models\Main.php
        $result = $this->model->getNews();
        $vars = [
            'news' => $result,
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function dbAction()
    {
        //Для тестов вызываем класс Db и выводим на экран его свойства
        //Так делать не стоит потому что это все делается в модели
        $db = new Db;

        //Подготовленный зарос к базе данных
        //Параметры запроса
        $params = [
            'id' => 1,
            'name' => 'Вася'
        ];

        //Посылаем запрос с разным результатом
        $data = $db->column('SELECT `name` FROM `users` WHERE `id` = :id AND `name` = :name', $params);
        debug($data);
        $data = $db->row('SELECT `name` FROM `users` WHERE `id` = :id AND `name` = :name', $params);
        debug($data);

        $this->view->render('Db');
    }

    public function contactAction()
    {
        echo 'Cтраница контактов<br>';
    }
}
