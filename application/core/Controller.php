<?php

namespace application\core;

use application\core\View;

abstract class Controller
{

    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->checkAcl();
        $this->view = new View($route);
        $this->model = $this->LoadModel($route['controller']);
    }

    public function LoadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl()
    {
        $acl = require 'application\acl\\' . $this->route['controller'] . '.php';
        debug($acl);
    }
};
