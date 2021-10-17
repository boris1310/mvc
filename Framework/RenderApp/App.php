<?php

use Framework\Router\ErrorRedirect;
var_dump($router);
if (class_exists($router->controller)) {
    require_once("App/Controllers/" . $router->controller . ".php");
} else {
   // ErrorRedirect::errorPage404();
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
   // ErrorRedirect::ErrorPage404();
}

