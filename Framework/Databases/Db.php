<?php

namespace Framework\Databases;

use PDO;

class Db
{
   public $db;

   public function __constuct(){

   }

    public function connect()
    {
        require_once 'define.php';

        $this->db = new PDO(
            'mysql:host='.DB_HOST.'; dbname=mydb',
            DB_USER,
            DB_PASS
        );

        return $this;
    }

}