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

    function action_category($params)
    {
        $data = $this->model->where('CategoryId', '=', $params['path']);
        $this->model= new Categories();
        $categories=$this->model->getAll();
        $this->model= new Manufacturer();
        $manufactures=$this->model->getAll();
        $this->view->generate('catalog.php', 'layout.php', $data,$categories,$manufactures);
    }

    function action_product($params)
    {
        $data = $this->model->where('idProduct', '=', $params['path']);
        $this->view->generate('product.php', 'layout.php', $data);
    }

    function action_index($params)
    {
        if (!isset($params['get']['page'])){
            $params['get']['page']=0;
        }

        $data = $this->model->getAllWithLimit($params['get']['page']-1,6);
        $this->model= new Categories();
        $categories=$this->model->getAll();
        $this->model= new Manufacturer();
        $manufactures=$this->model->getAll();
        $this->view->generate('catalog.php', 'layout.php', $data,$categories,$manufactures);
    }

    function getCategories(){


    }

//    function action_set()
//    {
//        $data = $this->model->set('test', 'testest', 1230);
//        $this->view->generate('catalog.php', 'layout.php');
//    }

}