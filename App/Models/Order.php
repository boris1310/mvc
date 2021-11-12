<?php


namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class Order extends Model
{
    public function __constuct(){

    }

    public function setOrder(int $userId,string $Products,int $addressId,string $statusOrder,string $statusPayment){
        $order = new Db();
        $order->connect();
        $order->db->query("INSERT INTO `Order`
                            SET `userId`='{$userId}',
                            `Products`='{$Products}',
                            `addressId`='{$addressId}',		
                            `statusOrder`='{$statusOrder}',	
                            `statusPayment`='{$statusPayment}'");
    }

    public function getOrderForAdmin($skip){
        $order = new Db();
        $order->connect();
        $skip=($skip-1)*20;
        $orders = $order->db->query("SELECT * FROM `Order` ORDER BY `created_at` DESC LIMIT $skip, 20" );
        return $orders;
    }

    public function getPaginationOrder(){
        $item = new Db();
        $item->connect();
        $data = $item->db->query("SELECT count(*) FROM `Order`");
        $count = [];
        foreach ($data as $el){
            $count[]=$el;
        }

        return $count[0][0];
    }
}