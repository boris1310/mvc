<?php

//namespace App\Controllers;

use Framework\Core\Controller;
use Framework\Core\View;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Manufacturer;


class CatalogController extends Controller
{

    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function action_getCategories(){
        $cat = new Categories();
        $data=$cat->getAll();
        $data = json_encode($data);
        print_r($data);
    }

    function action_getManufacturers(){
        $man = new Manufacturer();
        $data=$man->getAll();
        $data = json_encode($data);
        print_r($data);
    }

    function action_getAll($params){

        if(!empty($params['get']['page'])){
            $page=$params['get']['page']-1;
        }else{
            $page=0;
        }

        $url = $params['path'];
        $url = explode('_',$url);

        if($url[0]=="all"){
           $data = $this->model->getAllWithLimit($page, 8);
        }elseif($url[0]=="cat"){
           $data = $this->model->getAllWithLimitCategory($page, 8,$url[1]);
        }elseif ($url[0]=="man"){
           $data = $this->model->getAllWithLimitManufacturer($page, 8,$url[1]);
        }

        $data=json_encode($data);
        print_r($data);

    }

    function action_product($params)
    {
        $data = $this->model->where('idProduct', '=', $params['path']);
        $this->view->generate('product.php', 'layout.php', $data);
    }


    function action_getPagination($params){
        $data=$this->model->getAll();
        $data=count($data);
        $data=json_encode($data);
        print_r($data);
    }

    function action_index(){
        $this->view->generate('vue-catalog.php','vue-layout.php');
    }


    function action_setProduct($params)
    {

        $data = $this->model->setProduct(
            $params['post']['name'],
            $params['post']['description'],
            $params['post']['price'],
            $params['post']['manufacturer'],
            $params['post']['category']
        );

        $_SESSION['success']['addproduct'] = "Товар " . $params['post']['name'] . " успешно добавлен в базу";
        return header('Location:http://localhost:8888/admin/product');

    }

    function action_setCategory($params){
        $data = $this->model= new Categories();
        $data = $this->model->setCategory($params['post']['cat_name']);

        $_SESSION['success']['category'] = "Категория " . $params['post']['cat_name'] . " успешно добавлена в базу";

        return header('Location:http://localhost:8888/admin/category');
    }

    function action_countItemInCategory(){
        $this->model= new Categories();
        $data = $this->model->getAll();
        $idxs = [];
        foreach ($data as $catId){
            $idxs[] = $catId['idCategory'];
        }
        $countItems = [];

        foreach ($idxs as $a){
            $count = $this->model=new Product();
            $productInThisCategory = $count->where('CategoryId','=',$a);
            $countItems[$a]=count($productInThisCategory);
        }

        $result = json_encode($countItems);

        print_r($result);

    }

    function action_pagination($params){

        $url = $params['path'];
        $url = explode('_',$url);

        if($url[0]=="all"){
            $data = $this->model->getAll();
            $count = count($data);
        }elseif($url[0]=="cat"){
            $data = $this->model->where( 'CategoryId','=',$url[1]);
            $count = count($data);
        }elseif ($url[0]=="man"){
            $data = $this->model->where( 'ManufacturerId','=',$url[1]);
            $count = count($data);
        }

        $data=json_encode($count);
        print_r($data);
    }

    function action_countItemInManufacturer(){

        $this->model= new Manufacturer();
        $data = $this->model->getAll();
        $idxs = [];

        foreach ($data as $manId){
            $idxs[] = $manId['idmanufacturer'];
        }

        $countItems = [];

        foreach ($idxs as $a){
            $count = $this->model=new Product();
            $productInThisManufacturer = $count->where('ManufacturerId','=',$a);
            $countItems[$a]=count($productInThisManufacturer);
        }

        $result = json_encode($countItems);

        print_r($result);

    }



}