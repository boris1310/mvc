<?php

use Framework\Core\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Adres;

class OrderController extends Controller
{

    public function action_index(){

    }

    public function action_buynow(){

        $item = new Product();
        $data = $item->getBasket();
//        var_dump($data);

        $u = new User();
        $data2 = $u->where('idUser','=',$_SESSION['id']);
        foreach ($data as $row){
            $data2[] = $row;
        }


        $a = new Adres();
        $data3 = $a->where('userId','=',$_SESSION['id']);


        $this->view->generate('buynow.php', 'layout.php', $data,$data2,$data3);
    }

    public function action_pay(){

        $item = new Product();
        $dat = $item->getBasket();
        $data = [];
        foreach ($dat as $row){
            $data[] = $row;
        }

        $this->view->generate('pay.php', 'layout.php', $data);
    }

}