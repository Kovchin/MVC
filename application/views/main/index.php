<p><?= $title ?></p>

<!--
Данные переменные что используются в виде берутся из application\controllers\MainController.php 
разбором массива $vars в application\core\View.php 
-->


<!--Массив $news берется из application\controllers\MainController.php
метод indexAction-->
<?php foreach ($news as $value) : ?>
    <h3><?= $value['title']; ?></h3>
    <p><?= $value['description']; ?> </p>
    <hr>
<?php endforeach; ?>
<h2>Доступные страницы</h2>


<p><a href="./news/show" target="blanc">Страница новостей</a></p>
<p><a href="./account/register" target="blanc">Страница регистрации</a></p>
<p><a href="./account/login" target="blanc">Страница пользователя</a></p>
<p><a href="./contact" target="blanc">Страница контактов</a></p>
<p><a href="./db" target="blanc">Страница базы данных</a></p>
<h3>Просто внешняя ссылка</h3>
<p><a href="http:\\www.mail.ru" target="blanc">Почта</a></p>