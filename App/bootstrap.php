<?php

include_once("vendor/autoload.php");
include_once("Framework/Router/Route.php");
//require_once("Framework/Core/Controller.php");
//require_once("Framework/Core/View.php");
//require_once ("Framework/Core/Model.php");


function classAutoload($clasname)
{
    $filename = 'Framework/Core/' . $clasname . ".php";

    include_once($filename);
}

spl_autoload_register('classAutoload');

Route::start();