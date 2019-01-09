<?php

require_once 'src/ConnectDb.php';
require_once 'src/Controller/UserController.php';
require_once 'src/Controller/CountryController.php';
require_once 'src/Controller/CitiesController.php';
require_once 'src/Controller/MainController.php';

$pdo = ConnectDb::get();

$controllers = [
    'users' => new UserController($pdo),
    'countries' => new CountryController($pdo),
    'cities' => new CitiesController($pdo),
    'main' => new MainController(),
];

if (array_key_exists('PATH_INFO', $_SERVER)) {
    $pathInfo = ltrim($_SERVER['PATH_INFO'], '/');
} else {
    $pathInfo = 'main/index';
}

list($controllerKey, $actionKey) = explode('/', $pathInfo);

$controller = $controllers[$controllerKey];

$action = $actionKey . 'Action';
$result = $controller->$action();

$data = $result['data'];
$template = 'templates/'.$result['view'].'.php';

require_once $template;