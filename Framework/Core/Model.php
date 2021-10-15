<?php

namespace Framework\Core;
use Framework\Databases\Db;
use PDO;
use PDOStatement;

class Model
{
    public function __construct()
    {

    }

    public $id;
    public $name;
    public $description;
    public $price;


    /**
     * Получение всех товаров из файла;
     * @return mixed
     */

    public function getAll()
    {
        $prod = new Db();
        $prod->connect();
        $items = $prod -> db->query("SELECT * FROM `Items` ");
        $data = [];
        foreach ($items as $row){
            $data[]=$row;
        }
        return $data;
    }

    /**
     * Получение товара из файла по параметру (наименованию);
     * @param $params
     * @return array|mixed
     */

    public function getOne($params)
    {
        $prod = new Db();
        $prod->connect();
        $data = $prod->db->query("SELECT * FROM `Items`  WHERE `id`='{$params}'");
        return $data;
    }
}