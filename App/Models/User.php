<?php

namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class User extends Model
{

    /**
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $role
     */


    public function setUser(string $name, string $email, string $password, $phone = null, string $role = 'user')
    {
        $item = new Db();
        $item->connect();
        $item->db->query("
        INSERT INTO `User` (`name`,`email`,`password`,`role`,`phone`) 
        VALUES ('{$name}','{$email}','{$password}','{$role}','{$phone}')");
    }

}