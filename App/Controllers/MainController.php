<?php

//namespace App\Controllers;

use Framework\Core\Controller;

class MainController extends Controller
{
    function action_index()
    {
        $this->view->generate('home.php', 'layout.php');
    }
}