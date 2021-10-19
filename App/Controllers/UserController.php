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
        if(!empty($params['post'])){
            if(filter_var($params['post']['email'], FILTER_VALIDATE_EMAIL)){

                $user_mail=new User();
                $check_mail=$user_mail->where('email','=',$params['post']['email']);

                if(!empty($check_mail)){
                    print_r($params['post']);
                    var_dump($check_mail['0']['password']);
                    var_dump(md5($params['post']['password']));

                    if($check_mail['0']['password']===md5($params['post']['password'])){
                        $_SESSION['name']=$check_mail['0']['name'];
                        $_SESSION['role']=$check_mail['0']['role'];
                        $_SESSION['success']="Добро пожаловать, ".$_SESSION['name']."!<br>Вы успешно вошли.";
                        return header('Location:http://localhost:8888/Catalog');
                    }else{
                        $_SESSION['logmessage']="Неверный пароль!";
                        return header('Location:http://localhost:8888/User/login');
                    }

                }else{
                    $_SESSION['logmessage']="Такого пользователя не существует!";
                    return header('Location:http://localhost:8888/User/login');
                }

            }else{
                $_SESSION['logmessage']="Введите корректный email!";
                return header('Location:http://localhost:8888/User/login');
            }
        }else{
            $_SESSION['logmessage']="Введите коректные данные!";
            return header('Location:http://localhost:8888/User/login');
        }

        return header('Location:http://localhost:8888/Catalog');
    }

    public function action_logout($params){
        $_SESSION=[];
        setcookie('PHPSESSID','',time()-100);
        return header('Location: http://localhost:8888/catalog');
    }

}