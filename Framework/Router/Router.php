<?php

namespace Framework\Router;

class Router
{
    public string $controller;
    public string $action;
    public array $params;

    /**
     * Router constructor.
     */

    public function __construct()
    {
        $this->controller = 'catalog';
        $this->action = 'index';
        $this->params['path']['1'] = 'category';
        $this->params['path']['2'] = 'all';

    }

    /**
     * Получение нужного контроллера и его метода, получение параметров;
     * @return $this
     */

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
            $this->params['path'] = $routes[3];
        }
        if (!empty($_GET)) {
            $this->params['get'] = $_GET;
        }
        if (!empty($_POST)) {
            $this->params['post'] = $_POST;
        }

        $this->controller = ucfirst($this->controller) . "Controller";
        $this->action = 'action_' . $this->action;
        return $this;
    }

}