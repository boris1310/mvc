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

    public function action_signUp()
    {
        $data=json_decode(file_get_contents('php://input'), true);
        $whoami = new User();
        if(!empty($data)){
            $user = $whoami->where('email','=',$data['email']);
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


    public function action_register($params)
    {
        $data=json_decode(file_get_contents('php://input'), true);
        $user = new User();
        $user->setUser($data['name'],$data['email'],md5($data['password']),$data['phone'],'user');

        $data=$user->where('email','=',$data['email']);

        $_SESSION['user']['id']=$data[0]['idUser'];
        $_SESSION['user']['name']=$data[0]['name'];
        $_SESSION['user']['email']=$data[0]['email'];
        $_SESSION['user']['phone']=$data[0]['phone'];
        $_SESSION['user']['role']=$data[0]['role'];

        $data=json_encode($_SESSION['user']);
        echo $data;
    }

   public function action_checkSession(){
        if(!empty($_SESSION['user'])){
            echo json_encode($_SESSION['user']);
        }else{
            echo '{"message":"error"}';
        }
   }



    public function action_logout(){
        $_SESSION=[];
        setcookie('PHPSESSID','',time()-100);
        echo '{"logout":"success"}';
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



}