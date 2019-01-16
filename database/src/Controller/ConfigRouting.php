<?php

declare(strict_types=1);

namespace App\Controller;

use PHPRouter\Route;
use PHPRouter\RouteCollection;
use PHPRouter\Router;

class ConfigRouting
{
    public static function setting()
    {
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
            'methods' => ['GET', 'POST']
        )));

        $collection->attachRoute(new Route('/countries/add', array(
            '_controller' => 'App\Controller\CountryController::addAction',
            'methods' => ['GET', 'POST']
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
        $router->matchCurrentRequest();
    }
}
