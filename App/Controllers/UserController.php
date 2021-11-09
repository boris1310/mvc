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