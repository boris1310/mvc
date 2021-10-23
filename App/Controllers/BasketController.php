<?php

use Framework\Core\Controller;
use App\Models\Product;
use Framework\Core\View;


class BasketController extends Controller
{

    function __construct()
    {
        //$this->model = new Product();
        $this->view = new View();
    }

    public function action_index($params)
    {


        $flag = array();

        if(!empty($_SESSION['basket'])){

            foreach ($_SESSION['basket'] as $key => $value){

                if($value==$params['path']){
                    $flag[]=1;
                    $unset=$key;
                }else{
                    $flag[]=0;
                }

            }

            if(max($flag)==0){
                $_SESSION['basket'][]=$params['path'];
            }else{
                unset($_SESSION['basket'][$unset]);
            }

        }else{
            $_SESSION['basket'][]=$params['path'];
        }

        $data = json_encode($_SESSION['basket']);
        print_r($data);

    }
}