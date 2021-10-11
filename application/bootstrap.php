<?php

require_once("vendor/autoload.php");

function classAutoload($clasname)
{
    $filename = 'application/core/' . $clasname . ".php";

    include_once($filename);
}

spl_autoload_register('classAutoload');

Route::start();