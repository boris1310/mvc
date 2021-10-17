<?php

use Framework\Core\Controller;
use Framework\Core\View;
//use App\Models\Product;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->model = new User();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('login.php', 'layout.php');
    }

    public function action_login()
    {
        $this->view->generate('login.php', 'layout.php');
    }


    public function action_register()
    {
        $this->view->generate('register.php', 'layout.php');
    }

    //public function

}