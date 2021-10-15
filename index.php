<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once './vendor/autoload.php';
require_once 'App/Controllers/CatalogController.php';
require_once 'Framework/RenderApp/App.php';

use boris1310\my_logger\Logger;




//Работа моего логера;
//Logger::setWarning("test","log/current.log");

