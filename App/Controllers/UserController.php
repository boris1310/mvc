<?php

use Framework\Core\Controller;
use Framework\Core\View;
use App\Requests\RegisterRequest;
use App\Models\User;


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
            $register=new User();
            $register->setUser($params['post']['name'],$params['post']['email'],md5($params['post']['password1']),$role='user');
            $_SESSION['name']=$params['post']['name'];
            $_SESSION['role']='user';
            $_SESSION['success']="Добро пожаловать, ".$_SESSION['name']."!<br>Вы успешно зарегистрировались.";
            return header('Location:http://localhost:8888/Catalog');
        }

    }

    public function action_submitLogin($params)
    {
        print_r($params['post']);
        //ТУТ Я БУДУ ПРОВЕРЯТЬ ПОЛЬЗОВАТЕЛЯ НА СУЩЕСТВОВАНИЕ И СООТВЕТСВТИЕ ПАРОЛЯ;
        return header('Location:http://localhost:8888/Catalog');
    }

}