<?php

use Framework\Core\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Adres;
use App\Models\Order;

class OrderController extends Controller
{
    public function action_index()
    {
        var_dump($_SESSION);
    }

    public function action_clearCart(){
        unset($_SESSION['basket']);
        echo '{"status":true}';
    }

    public function action_setItemToCart($params)
    {
        $flag = 0;
        foreach ($_SESSION['basket'] as $item) {
            if ($item['idProduct'] == $params['get']['idProduct']) {
                $flag = 1;
            }
        }
        if ($flag == 0) {
            $_SESSION['basket'][] = [
                "idProduct" => (int)$params['get']['idProduct'],
                "name" => $params['get']['name'],
                "image" => $params['get']['image'],
                "price" => (int)$params['get']['price'],
                "count" => (int)$params['get']['count'],
            ];
            echo '{"status":"success"}';
        }else{
            echo '{"status":"error"}';
        }
    }

    public function action_unsetItemToCart($params)
    {
        foreach ($_SESSION['basket'] as $key=>$item){
            if($item['idProduct']==$params['get']['idProduct']){
                unset($_SESSION['basket'][$key]);
            }
        }
    }


    public function action_getCartProducts()
    {
        $data = json_encode($_SESSION['basket']);
        print_r($data);
    }

    public function action_setCartProduct(){
        $data=json_decode(file_get_contents('php://input'), true);

        $products = json_encode($data['products']);
        if($data['status']){
            $statusPayment = 'Оплачен';
        }else{
            $statusPayment = 'Ждет оплаты';
        }
        if(empty($_SESSION['user']['id'])){
            $userId = null;
        }else{
            $userId = $_SESSION['user']['id'];
        }
        $address = new Adres();
        $user_address = $address->where('userId','=',$_SESSION['user']['id']);
        $addressId = $user_address[0]['id'];
        $order = new Order();
        $statusOrder = 'Добавлен';


        $order->setOrder($userId, $products, $addressId, $statusOrder, $statusPayment);

        if($statusPayment=="Оплачен"){
            echo '{"status":"success","messagge":true}';
        }else{
            echo '{"status":"success","messagge":true}';
        }


    }

    public function action_setBillingInfo()
    {
        $data=json_decode(file_get_contents('php://input'), true);
        if(empty($_SESSION['user'])){
            $userId=null;
        }else{
            $userId=$_SESSION['user']['id'];
        }
        $billingInfo = new Adres();
        $billingInfo->setBillingInfo(
            $data['city'],
            $data['name'],
            $data['address'],
            $data['email'],
            $data['phone'],
            $userId);

        echo '{"status":"success","message":"success"}';

    }



}