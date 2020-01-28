<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        $this->view->layout = 'custom';
        //Возможно подключать вид из другого места        $this->view->path = 'test/test';
        $this->view->render('Регистрация');
    }
}
