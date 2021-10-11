<?php

ini_set('error_reporting',E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);

require_once 'vendor/autoload.php';
require_once 'vendor/boris1310/my_logger/Logger.php';
require_once 'application/bootstrap.php';

//Работа моего логера;
Logger::setWarning("test","current.log");

