<?php

namespace Framework\Core;

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

    public function getAll(): mixed
    {
        $products = require_once('App/Models/storage/storage.php');
        $data = json_decode(json_encode($products), FALSE);
        return $data;
    }

    /**
     * Получение товара из файла по параметру (наименованию);
     * @param $params
     * @return array|mixed
     */

    public function getOne($params)
    {

        $data = new Model();
        $items = require_once('App/Models/storage/storage.php');
        foreach ($items as $key => $item) {
            if ($item['name'] == "$params") {
                $data->id = $items[$key]['id'];
                $data->name = $items[$key]['name'];
                $data->description = $items[$key]['description'];
                $data->price = $items[$key]['price'];
            }
        }

        return $data;
    }

    /**
     * Получение товаров из БД;
     * @return false|PDOStatement
     */

    public function getAll_db()
    {

        require_once '../../define.php';

        $dbh = new PDO(
            'mysql:host=localhost; dbname=my_project',
            DB_USER,
            DB_PASS
        );

        $data = $dbh->query("SELECT * FROM `Items`");

        //Закрытие подключения;
        $dbh = null;

        return $data;

    }

    /**
     * @param $params
     * @return false|PDOStatement
     */

    public function getOne_db($params)
    {

        require_once '../../define.php';

        $dbh = new PDO(
            'mysql:host=localhost; dbname=my_project',
            DB_USER,
            DB_PASS
        );

        $data = $dbh->query("SELECT * FROM `Items` WHERE `id`='$params'");

        //Закрытие подключения;
        $dbh = null;

        return $data;

    }
}