<?php

namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;

class Product extends Model
{

    public function updateProduct(string $name, string $description, int $price,int $manufacturer,int $category,int $id)
    {
        $uploaddir = 'public/img/products/';
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
        var_dump($_FILES);
        $query = '';
        if (empty($_FILES['photo']['name'])) {
            $query = "UPDATE `Product` SET `name`='{$name}',`description`='{$description}',`price`='{$price}',`CategoryId`='{$category}',`ManufacturerId`='{$manufacturer}' WHERE `idProduct`='{$id}'";
        } else {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                //echo "Файл корректен и был успешно загружен.\n";
                $query = "UPDATE `Product` SET `name`='{$name}',`description`='{$description}',`price`='{$price}',`CategoryId`='{$category}',`ManufacturerId`='{$manufacturer}',`photo`='{$uploadfile}' WHERE `idProduct`='{$id}'";
            } else {
                $query = "UPDATE `Product` SET `name`='{$name}',`description`='{$description}',`price`='{$price}',`CategoryId`='{$category}',`ManufacturerId`='{$manufacturer}' WHERE `idProduct`='{$id}'";
            }

        }
        $item = new Db();
        $item->connect();

        $item->db->query($query);

    }

    /**
     * Получение товаров производителей
     * @param int $skip
     * @param int $limit
     * @param $manufacturer
     * @return array
     */

    public function getAllWithLimitManufacturer($skip = 0, $limit = 8, $manufacturer)
    {
        $skip = $skip * $limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` WHERE `ManufacturerId`='{$manufacturer}' LIMIT $limit OFFSET $skip");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Получение товаров категорий
     * @param int $skip
     * @param int $limit
     * @param $category
     * @return array
     */

    public function getAllWithLimitCategory($skip = 0, $limit = 8, $category)
    {
        $skip = $skip * $limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` WHERE `CategoryId`='{$category}' LIMIT $limit OFFSET $skip");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Добавление товара и загрузка изображения товара
     * @param string $name
     * @param string $description
     * @param int $price
     */

    public function setProduct(string $name, string $description, int $price, int $manufacturer, int $category)
    {

        if (empty($_FILES['photo']['name'])) {
            $uploadfile = null;
            $_FILES['photo']['name'] = null;
            $_FILES['photo']['tmp_name'] = null;
        }
        $uploaddir = 'public/img/products/';
        $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }

        $item = new Db();
        $item->connect();
        $item->db->query("
        INSERT INTO `{$this->modelname}` (`name`,`description`,`price`,`ManufacturerId`,`CategoryId`,`photo`)
        VALUES ('{$name}','{$description}','{$price}','{$manufacturer}','{$category}','{$uploadfile}')");

    }

}

