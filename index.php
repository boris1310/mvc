<?php

session_start();


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once './vendor/autoload.php';

use Framework\Router\Router;

$router = new Router;
$router->start();

require_once 'Framework/RenderApp/App.php';


