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
}

