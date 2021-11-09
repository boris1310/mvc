<?php

namespace Framework\Core;

use Framework\Databases\Db;
use ReflectionClass;

class Model
{
    public string $modelname;

    /**
     * Model constructor.
     */

    public function __construct()
    {
        $classname = (new \ReflectionClass($this))->getShortName();
        $this->modelname = $classname;
    }

    /**
     * Получение всех товаров из файла;
     * @return mixed
     */

    public function getAll()
    {
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}`");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllWithLimit( $skip=0,$limit=8)
    {
        $skip=$skip*$limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` LIMIT $limit OFFSET $skip");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllWithLimitCategory($skip=0,$limit=8,$category)
    {
        $skip=$skip*$limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` WHERE `CategoryId`='{$category}' LIMIT $limit OFFSET $skip");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAllWithLimitManufacturer($skip=0,$limit=8,$manufacturer)
    {
        $skip=$skip*$limit;
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
     * Получение товара из файла по параметру (наименованию);
     * @param $params
     * @return array|mixed
     */

    public function where($column, $operator, $params)
    {
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("
        SELECT * FROM `{$this->modelname}` WHERE `{$column}`{$operator}'{$params}'");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }



    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $role
     */


    public function setUser(string $name, string $email, string $password,$phone= null,string $role='user')
    {
        $item = new Db();
        $item->connect();
        $item->db->query("
        INSERT INTO `User` (`name`,`email`,`password`,`role`,`phone`) 
        VALUES ('{$name}','{$email}','{$password}','{$role}','{$phone}')");
    }

    /**
     * @param string $name
     * @param string $description
     * @param int $price
     */

    public function setProduct(string $name, string $description, int $price,int $manufacturer,int $category)
    {



        if (empty($_FILES['photo']['name'])){
            $uploadfile=null;
            $_FILES['photo']['name']=null;
            $_FILES['photo']['tmp_name']=null;
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

    /**
     * @param array $columns
     * @param array $values
     * @param string $whereColumn
     * @param string $operator
     * @param string $whereParams
     */

    public function update(array $columns, array $values, string $whereColumn, string $operator, string $whereParams)
    {
        $item = new Db();
        $item->connect();
        $string = '';

        for ($column = 0; $column < count($columns); $column++) {
            $string = $string . " `{$columns[$column]}`='{$values[$column]}',";
        }

        $item->db->query("
        UPDATE `{$this->modelname}` 
        SET " . trim($string,',') . "
        WHERE `{$whereColumn}`{$operator}'{$whereParams}'");
    }

    /**
     * @param string $column
     * @param string $operator
     * @param $params
     */

    public function delete(string $column, string $operator, $params)
    {
        $item = new Db();
        $item->connect();
        $item->db->query("DELETE FROM `{$this->modelname}` WHERE `{$column}`{$operator}'{$params}'");
    }


    public function getBasket(){

        $item = new Db;
        $item -> connect();

        $in = '';

         $in=implode(',',$_SESSION['basket']);


        $data = $item->db->query("SELECT * FROM `{$this->modelname}` WHERE `idProduct` IN ($in)");

        return $data;
    }
}