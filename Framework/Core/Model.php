<?php

namespace Framework\Core;

use Framework\Databases\Db;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use ReflectionClass;

class Model
{
    public $subject;
    public string $modelname;
    public string $query;

    /**
     * Model constructor.
     */

    public function __construct()
    {
        $this->subject = [];
        $this->query = '';
        $classname = (new \ReflectionClass($this))->getShortName();
        $this->modelname = $classname;
    }

    /**
     * TEST FUNCTIONS
     */

    /**
     * @param string $params
     */

    public function select($params = "*")
    {
        $this->query = "SELECT $params FROM `$this->modelname` ";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function whereTest(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " WHERE `$column` $operator '$value'";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function andWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " AND  `$column` $operator $value";
        echo "<br>";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function orWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " OR  `$column` $operator $value";
        echo "<br>";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function notWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " WHERE NOT `$column` $operator $value";
        echo "<br>";
    }

    /**
     * @param string $column
     * @param string $descOrAsc
     */

    public function orderBy(string $column, string $descOrAsc = "DESC")
    {
        $this->query = $this->query . " ORDER BY `$column` $descOrAsc";
    }

    public function limit( $limit = 8 ){
        $this->query = $this->query . " LIMIT $limit";
    }

    public function offset( $offset = 0 ){
        $this->query = $this->query . " OFFSET $offset";
    }

    public function counter(){
        $this->query = "SELECT COUNT(*) FROM `$this->modelname`";
    }


    public function get()
    {
        $item = new Db;
        $item->connect();
        $data = $item->db->query($this->query);
        foreach ($data as $item) {
            $this->subject[] = $item;
        }
        return $this->subject;
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

    public function save()
    {

    }


}