<?php


namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class Adres extends Model
{
    public function setBillingInfo($city,$username,$address,$email,$phone,$userId=null){

        $adres = new Db();
        $adres->connect();
        $adres->db->query("INSERT INTO `Adres`
                            SET `userId`='{$userId}',
                            `city`='{$city}',
                            `userName`='{$username}',		
                            `address`='{$address}',	
                            `email`='{$email}',
                            `phone`='{$phone}'");
    }
}