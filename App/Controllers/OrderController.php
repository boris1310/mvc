<?php

use Framework\Core\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Adres;

class OrderController extends Controller
{

    public function action_index()
    {
        var_dump($_SESSION);
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
                "idProduct" => $params['get']['idProduct'],
                "name" => $params['get']['name'],
                "image" => $params['get']['image'],
                "price" => (int)$params['get']['price'],
                "count" => (int)$params['get']['count'],
            ];
        }
    }

    public function action_unsetItemToCart($params){
        var_dump($_SESSION['basket']);
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

}