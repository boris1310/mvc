<?php

namespace Framework\Router;

class Route
{
    public static function start()
    {

        $controller_name = 'Main';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);


        if (!empty($routes[1])) {
            $controller_name = "$routes[1]";
        }


        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if (!empty($routes[3])) {
            $params = $routes[3];
        }


        $controller_name = $controller_name . "Controller";
        $action_name = 'action_' . $action_name;


        $controller_file = $controller_name . ".php";
        $controller_path = "App/Controllers/" . $controller_file;

        if (!class_exists($controller_name)) {
            require_once $controller_path;
        } else {
            ErrorRedirect::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {

            if (!empty($params)) {
                $controller->$action($params);
            } else {

                $controller->$action();

            }

        } else {

            ErrorRedirect::ErrorPage404();

        }
    }

}