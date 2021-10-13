<?php

ini_set('error_reporting',E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);

require_once __DIR__.'/vendor/autoload.php';
<<<<<<< HEAD
require_once __DIR__.'/App/bootstrap.php';
=======

use Framework\Router\Route;
use boris1310\my_logger\Logger;

Route::start();
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd

//Работа моего логера;
Logger::setWarning("test","log/current.log");

