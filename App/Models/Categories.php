<?php


namespace App\Models;

use Framework\Core\Model;
use Framework\Databases\Db;


class Categories extends Model
{
    /**
     * Добавление категорий
     * @param $cat_name
     */

  public function setCategory($cat_name){
      $item = new Db();
      $item->connect();
      $item->db->query("
        INSERT INTO `{$this->modelname}` (`cat_name`)
        VALUES ('{$cat_name}')");
  }

    /**
     * Удаление категорий
     * @param $id
     */

    public function categoryDelete($id){
        $item = new Db();
        $item->connect();
        $item->db->query("DELETE FROM `Categories` WHERE `idCategory`='{$id}'");
    }

}