<?php


namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class Adres extends Model
{
    public function setAdres($userId,$country,$city,$street,$home,$flat,$zip){

        $adres = new Db();
        $adres->connect();
        $adres->db->query(
            "INSERT INTO `Adres`
            SET `userId`='{$userId}',
            `country`='{$country}',
            `city`='{$city}',
            `street`='{$street}',
            `home`='{$home}',
            `flat`='{$flat}',
            `zip`='{$zip}'"
        );
    }
}