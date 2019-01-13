<?php

require_once __DIR__ . '/vendor/autoload.php';

#require_once 'autoload_custom.php';

use App\Serves\ConnectDb;

try {
    $pdo = ConnectDb::get();

    $controllers = [
        'users' => new App\Controller\UserController($pdo),
        'countries' => new App\Controller\CountryController($pdo),
        'cities' => new App\Controller\CitiesController($pdo),
        'main' => new App\Controller\MainController(),
    ];

    $pathInfo = current(explode('?', $_SERVER['REQUEST_URI']));
    $pathInfo = ltrim($pathInfo, '/');

    if (empty($pathInfo)) {
        $pathInfo = 'main/index';
    }

    list($controllerKey, $actionKey) = explode('/', $pathInfo);

    $controller = $controllers[$controllerKey];

    $action = $actionKey . 'Action';
    $result = $controller->$action();

    $data = $result['data'];
    $template = 'templates/'.$result['view'].'.php';

    require_once $template;

} catch (\LogicException $e) {
    echo ($e->getMessage());
}
