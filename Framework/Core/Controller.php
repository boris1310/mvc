<?php

namespace Framework\Core;
use Framework\Core\View;

class Controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->model=new Model();
        $this->view = new View();
    }

}