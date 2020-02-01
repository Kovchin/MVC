<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        //Для демонстрации метода redirect перенаправим эту страницу на google.com
        $this->view->redirect('https://google.com');
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        //Шаблон страницы
        $this->view->layout = 'custom';
        //Возможно вид подключать вид из другого места        $this->view->path = 'test/test';
        $this->view->render('Регистрация');
    }
}
