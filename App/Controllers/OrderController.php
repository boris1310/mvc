<?php

use Framework\Core\Controller;
use App\Models\Product;

class OrderController extends Controller
{

    public function action_index(){

    }

    public function action_buynow(){

        $item = new Product();
        $data = $item->getBasket();

        $it = [];

        foreach ($data as $row){
            $it[] = $row;
        }

        $this->view->generate('buynow.php', 'layout.php', $it);
    }

}