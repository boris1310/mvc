<?php

session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once './vendor/autoload.php';
require_once 'App/Controllers/CatalogController.php';

use Framework\Router\Router;
use boris1310\my_logger\Logger;

$router = new Router;
$router->start();

require_once 'Framework/RenderApp/App.php';

//Работа моего логера;
//Logger::setWarning("test","log/current.log");

