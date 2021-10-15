<?php

use Framework\Router\Route;
use Framework\Router\ErrorRedirect;

$router = new Route;
$router->start();

if (class_exists($router->controller)) {
    require_once("App/Controllers/" . $router->controller . ".php");
} else {
    ErrorRedirect::errorPage404();
}

$controller = new $router->controller;
$action = $router->action;

if (method_exists($controller, $action)) {

    if (!empty($router->params)) {
        $controller->$action($router->params);
    } else {
        $controller->$action();
    }

} else {
    ErrorRedirect::ErrorPage404();
}

