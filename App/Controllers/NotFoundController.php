<?php

<<<<<<< HEAD
=======
//namespace App\Controllers;

>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
use Framework\Core\Controller;

class NotFoundController extends Controller
{
    function action_index()
    {
        $this->view->generate('404.php', 'layout.php');
    }
}