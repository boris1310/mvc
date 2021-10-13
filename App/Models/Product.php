<?php

namespace App\Models;

use Framework\Core\Model;

class Product extends Model
{
<<<<<<< HEAD
    /**
     * Получение всех товаров из файла;
     * @return mixed
     */

    public function get_data(): mixed
    {
        require_once 'storage/storage.php';
        $data = $products;
        return $data;
    }

    /**
     * Получение товара из файла по параметру (наименованию);
     * @param $params
     * @return array|mixed
     */

    public function getProduct($params)
    {
        $products = new Product();
        $items = $products->get_data();

        foreach ($items as $key => $item) {
            if ($item['name'] == "$params") {
                $data = $items[$key];
            }
        }

        return $data;
    }

    /**
     * Получение товаров из БД;
     * @return false|PDOStatement
     */

    public function get_data_db()
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

    public function get_product_db($params)
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
=======
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd

}

