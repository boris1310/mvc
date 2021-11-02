<?php

use Framework\Core\Controller;
use Framework\Core\View;
use App\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Adres;


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
            return header('Location:http://localhost:8888/user/login');
        }

    }

    public function action_submitLogin($params)
    {
        if(!empty($params['post'])){
            if(filter_var($params['post']['email'], FILTER_VALIDATE_EMAIL)){

                $user_mail=new User();
                $check_mail=$user_mail->where('email','=',$params['post']['email']);
                var_dump($check_mail);

                if(!empty($check_mail)){
                    if($check_mail['0']['password']===md5($params['post']['password'])){
                        $_SESSION['name']=$check_mail['0']['name'];
                        $_SESSION['role']=$check_mail['0']['role'];
                        $_SESSION['id']=$check_mail['0']['idUser'];
                        $_SESSION['success']['login']="Добро пожаловать, ".$_SESSION['name']."!<br>Вы успешно вошли.";
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

    public function action_getUserByEmail($params){
        $user = new User();
        $data = $user->where('email','=',$params['path']);
        if(empty($data)){
                $result='{}';
        }else {
            foreach ($data as $item) {
                $result = json_encode($item);
            }
        }

        print_r($result);
    }

    public function action_addAdminSubmit($params){

        $user = new User();
        $columns = ['role'];
        $values = ['admin'];
        $user->update($columns, $values, 'idUser', '=' , $params['path']);

        $_SESSION['success']['addadmin']='Пользователь № '.$params['path'] .' назначен сотрудником';

        return header('Location: http://localhost:8888/admin/employees');
    }

    public function action_savePhone($params){
        $user = new User();
        $columns = [
            'phone'
        ];
        $values = [
            $params['path']
        ];
        $user->update($columns,$values,'idUser','=',$_SESSION['id']);
        $answer = ['success'];
        $answer = json_encode($answer);
        print_r($answer);
    }

    public function action_saveAdres($params){
        $adres = new Adres();
        $adres->setAdres(
            $_SESSION['id'],
            $params['get']['country'],
            $params['get']['city'],
            $params['get']['street'],
            $params['get']['home'],
            $params['get']['flat'],
            $params['get']['zip']
        );

        $answer = ['success'];
        $answer = json_encode($answer);
        print_r($answer);
    }


}