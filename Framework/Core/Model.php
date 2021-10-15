<?php

namespace Framework\Core;

use Framework\Databases\Db;
use PDO;
use PDOStatement;

class Model
{
    /**
     * Model constructor.
     */

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
        $items = $prod->db->query("SELECT * FROM `Items` ");
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
        $data = $prod->db->query("
        SELECT * FROM `Items`  WHERE `{$column}`{$operator}'{$params}'");
        return $data;
    }

    /**
     * @param string $name
     * @param string $description
     * @param int $price
     */

    public function set(string $name, string $description, int $price)
    {
        $item = new Db();
        $item->connect();
        $item->db->query("
        INSERT INTO `items` (`name`,`description`,`price`) 
        VALUES ('{$name}','{$description}','{$price}')");
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
        UPDATE `items` 
        SET " . $string . "
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
        $item->db->query("DELETE FROM `Items` WHERE `{$column}`{$operator}'{$params}'");
    }
}