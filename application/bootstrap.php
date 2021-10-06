<?php

//require_once 'core/model.php';
//require_once 'core/view.php';
//require_once 'core/controller.php';
//require_once 'core/route.php';


function classAutoload($clasname)
{
    $filename = 'application/core/' . $clasname . ".php";
    include_once($filename);
}

spl_autoload_register('classAutoload');

Route::start();