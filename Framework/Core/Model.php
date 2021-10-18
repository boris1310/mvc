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

    public function getAllWithLimit( $skip=0,$limit=6)
    {
        $skip=$skip*$limit;
        $prod = new Db();
        $prod->connect();
        $items = $prod->db->query("SELECT * FROM `{$this->modelname}` WHERE idProduct > '{$skip}' LIMIT $limit");
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
        SELECT * FROM `{$this->modelname}` WHERE `{$column}`{$operator}'{$params}'");
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
        INSERT INTO `{$this->modelname}` (`name`,`description`,`price`) 
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
        UPDATE `{$this->modelname}` 
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
        $item->db->query("DELETE FROM `{$this->modelname}` WHERE `{$column}`{$operator}'{$params}'");
    }
}