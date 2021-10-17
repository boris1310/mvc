<?php

use Framework\Core\Controller;
use Framework\Core\View;
use App\Requests\RegisterRequest;


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

    public function action_submitRegister($params)
    {
        RegisterRequest::validate($params);
        if (!empty($_SESSION['message'])) {
            return header('Location: http://' . $_SERVER["HTTP_HOST"] . '/User/register');
        } else {
            return header('Location:http://localhost:8888/Catalog');
        }
    }

    public function action_submitLogin($params)
    {
        print_r($params['post']);
        //return header('Location:http://localhost:8888/Catalog');
    }

}