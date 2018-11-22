<?php
$controller = isset($_GET['c']) ? $_GET['c'] : 'Default';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controllerRoute = ucwords($controller) . 'Controller';

require __DIR__ . '/controllers/' . $controllerRoute .'.php';

$controllerInstance = new $controllerRoute();

$controllerInstance->$action();
