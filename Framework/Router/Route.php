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

        //Eсли понадобится передавать несколько параметров - придётся дописывать =(

        $controller_name = $controller_name . "Controller";
        $action_name = 'action_' . $action_name;


        $controller_file = $controller_name . '.php';
        $controller_path = "App/Controllers/" . $controller_file;

        if (file_exists($controller_path)) {
            include "App/Controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
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
            Route::ErrorPage404();

        }

    }

    public static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'NotFound');
    }
}