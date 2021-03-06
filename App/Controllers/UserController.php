<?php

use Framework\Core\Controller;
use Framework\Core\View;
use App\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Adres;

class UserController extends Controller
{
    public function __construct()
    {
        $this->model = new User();
        $this->view = new View();
    }


    public function action_index()
    {
       // $this->view->generate('login.php', 'layout.php');
    }

    /**
     * Вход
     */

    public function action_signUp()
    {
        $data=json_decode(file_get_contents('php://input'), true);
        $this->model = new User();
        if(!empty($data)){
            $this->model->select();
            $this->model->whereTest('email','=',$data['email']);
            $user = $this->model->get();
            if(empty($user)){
                echo '{"error":"Пользователя с таким email не существует"}';
            }else{
                if(md5($data['password'])==$user[0]['password']){
                    $_SESSION['user']['id']=$user[0]['idUser'];
                    $_SESSION['user']['name']=$user[0]['name'];
                    $_SESSION['user']['email']=$user[0]['email'];
                    $_SESSION['user']['phone']=$user[0]['phone'];
                    $_SESSION['user']['role']=$user[0]['role'];
                    $data=json_encode($_SESSION['user']);
                    echo $data;
                }else{
                    echo '{"error":"Неверный пароль"}';
                }
            }
        }else{
            echo '{"error":"Введите корректные данные"}';
        }
    }

    /**
     * Регистрация
     * @param $params
     */

    public function action_register($params)
    {
        $data=json_decode(file_get_contents('php://input'), true);

        $this->model->insert();
        $this->model->set('name',$data['name']);
        $this->model->set('email',$data['email']);
        $this->model->set('password',md5($data['password']));
        $this->model->set('role','user');
        $this->model->set('phone',$data['phone']);
        $this->model->save();

        $this->model->select();
        $this->model->whereTest('email','=',$data['email']);
        $data = $this->model->get();

        $_SESSION['user']['id']=$data[0]['idUser'];
        $_SESSION['user']['name']=$data[0]['name'];
        $_SESSION['user']['email']=$data[0]['email'];
        $_SESSION['user']['phone']=$data[0]['phone'];
        $_SESSION['user']['role']=$data[0]['role'];

        $data=json_encode($_SESSION['user']);
        echo $data;
    }

    /**
     * Проверка вошёл ли пользователь
     */

   public function action_checkSession(){
        if(!empty($_SESSION['user'])){
            echo json_encode($_SESSION['user']);
        }else{
            echo '{"message":"error"}';
        }
   }

    /**
     * Выход
     */

    public function action_logout(){
        $_SESSION=[];
        setcookie('PHPSESSID','',time()-100);
        echo '{"logout":"success"}';
    }

    /**
     * Получение пользователя по email
     * @param $params
     */

    public function action_getUserByEmail($params){
        $this->model = new User();
        $this->model->select();
        $this->model->whereTest('email','=',$params['path']);
        $data = $this->model->get();
        if(empty($data)){
                $result='{}';
        }else {
            foreach ($data as $item) {
                $result = json_encode($item);
            }
        }
        echo $result;
    }



}

