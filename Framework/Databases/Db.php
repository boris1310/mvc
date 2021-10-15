<?php

namespace Framework\Databases;

use PDO;

class Db
{
   public $db;

    public function connect()
    {
        require_once 'define.php';

        $this->db = new PDO(
            'mysql:host=localhost; dbname=my_project',
            DB_USER,
            DB_PASS
        );

        return $this;
    }

}