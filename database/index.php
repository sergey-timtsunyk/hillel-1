<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Serves\ConnectDb;
use PHPRouter\Route;
use PHPRouter\RouteCollection;
use PHPRouter\Router;

try {
    $collection = new RouteCollection();
    $collection->attachRoute(new Route('/users/show', array(
        '_controller' => 'App\Controller\UserController::showAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/countries/show', array(
        '_controller' => 'App\Controller\CountryController::showAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/countries/edit', array(
        '_controller' => 'App\Controller\CountryController::editAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/countries/edit', array(
        '_controller' => 'App\Controller\CountryController::editAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/countries/delete', array(
        '_controller' => 'App\Controller\CountryController::deleteAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/', array(
        '_controller' => 'App\Controller\MainController::indexAction',
        'methods' => 'GET'
    )));

    $router = new Router($collection);
    $route = $router->matchCurrentRequest();

} catch (\LogicException $e) {
    echo ($e->getMessage());
}
