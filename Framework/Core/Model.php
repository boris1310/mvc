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
     * Получение всех товаров из бд;
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

    /**
     * @param int $skip
     * @param int $limit
     * @return array
     */

    public function getAllWithLimit($skip = 0, $limit = 8)
    {
        $skip = $skip * $limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` LIMIT $limit OFFSET $skip");
        $data = [];
        foreach ($items as $row) {
            $data[] = $row;
        }
        return $data;
    }


    /**
     * Получение товара из файла по параметру;
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
        SET " . trim($string, ',') . "
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

//    /**
//     * Получение товаров в корзине;
//     * @return mixed
//     */
//    public function getBasket()
//    {
//        $item = new Db;
//        $item->connect();
//        $in = '';
//        $in = implode(',', $_SESSION['basket']);
//        $data = $item->db->query("SELECT * FROM `{$this->modelname}` WHERE `idProduct` IN ($in)");
//        return $data;
//    }

    /**
     * @param string $column
     * @param array $array
     * @return array
     */

    public function whereIn(string $column, array $array)
    {
        $item = new Db;
        $item->connect();
        $in = '';
        foreach ($array as $id) {
            $in = $in . "," . $id;
        }
        $in = trim($in, ',');
        $data = $item->db->query("SELECT * FROM `{$this->modelname}` WHERE $column IN ($in)");
        $products = [];
        foreach ($data as $el) {
            $products[] = $el;
        }
        return $products;
    }


}