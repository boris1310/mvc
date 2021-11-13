<?php


namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class Order extends Model
{
    public function __constuct(){

    }

    //переписать и убрать

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


}