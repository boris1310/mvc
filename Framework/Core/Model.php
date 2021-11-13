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

    public function whereTest(string $column, string $operator, $value)
    {
            if($operator == 'IN'){
                $str = implode(',',$value);
                $this->query = $this->query . "WHERE `$column` IN ($str)";
            }else{
                $this->query = $this->query . " WHERE `$column` $operator '$value'";
            }

    }


    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function andWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " AND  `$column` $operator '$value'";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function orWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " OR  `$column` $operator '$value'";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param string $value
     */

    public function notWhere(string $column, string $operator, string $value)
    {
        $this->query = $this->query . " WHERE NOT `$column` $operator '$value'";
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
     * @param array $columns
     * @param array $values
     * @param string $whereColumn
     * @param string $operator
     * @param string $whereParams
     */

    public function update()
    {
        $this->query = " UPDATE `$this->modelname` SET  ";
    }

    /**
     * @param string $column
     * @param string $operator
     * @param $params
     */

    public function delete()
    {
        $this->query = " DELETE FROM `$this->modelname` ";
    }


    /**
     * @param string $column
     * @param array $array
     * @return array
     */



    public function insert(){
        $this->query=" INSERT INTO `$this->modelname` SET ";
    }

    public function set($column,$value){
        $this->query= $this->query. " `$column` = '$value' ,";
    }

    public function save()
    {
        $item = new Db;
        $item->connect();
        $item->db->query(trim($this->query,','));
        return $this->subject;
    }


}