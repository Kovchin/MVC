<?php

//обозначаем пространство имен
namespace application\lib;

use PDO;

//объявляем класс базы данных
class Db
{
    //Подключаемые данные из application\config\db.php
    //Для инициализации подключения к базе данных
    protected $db;

    public function __construct()
    {
        //Получаем базу данных 
        $config = require './application/config/db.php';
        /* 
//Данные для отладки подключения к базе данных
        echo 'db: ' . $config['dbname'] . '<br>';
        echo 'user: ' . $config['user'] . '<br>';
        echo 'password: ' . $config['password'] . '<br>';
*/
        $this->db = new PDO('mysql:host=MVC;dbname=' . $config['dbname'] . '', $config['user'], $config['password']);
    }

    public function query($sql, $params = [])
    {
        $res = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $res->bindValue(':' . $key, $value);
            }
        }
        $res->execute();
        return $res;
    }
    //отображает запись из базы данных
    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //отображает набор 
    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
};
