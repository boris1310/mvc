<?php

//namespace App\Controllers;

use Framework\Core\Controller;

class NotFoundController extends Controller
{
    /**
     * Генерация страницы 404
     */
    function action_index()
    {
        $this->view->generate('404.php', 'layout.php');
    }
}