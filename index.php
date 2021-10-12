<?php

ini_set('error_reporting',E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/App/bootstrap.php';

//Работа моего логера;
Logger::setWarning("test","log/current.log");

