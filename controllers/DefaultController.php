<?php
/**
 * Created by PhpStorm.
 * User: krcasasg
 * Date: 21/11/2018
 * Time: 6:56 PM
 */

class DefaultController
{
    public function render($template, $data = [])
    {
        $data_val = $data;
        include_once __DIR__ . '/../templates/header.php';
        include_once __DIR__ . '/../views/default/'. $template. '.html.php';
        include_once __DIR__ . '/../templates/footer.php';
    }

    public function index()
    {
        $data_array = ['title' => 'Inicio CRUD MVC'];
        $this->render('index', $data_array);
    }
}