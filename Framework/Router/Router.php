<?php

namespace Framework\Router;

class Router
{
    public string $controller;
    public string $action;
    public string $params;

    public function __construct()
    {
        $this->controller = 'Main';
        $this->action = 'index';
    }

    public function start()
    {

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $this->controller = "$routes[1]";
        }

        if (!empty($routes[2])) {
            $this->action = $routes[2];
        }

        if (!empty($routes[3])) {
            $this->params = $routes[3];
        }

        $this->controller = ucfirst($this->controller )."Controller";
        $this->action = 'action_' . $this->action;

        return $this;
    }

}