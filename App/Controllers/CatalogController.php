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
        if (!isset($params['get']['page'])) {
            $params['get']['page'] = 1;
        }

        $data = $this->model->getAllWithLimitCategory($params['get']['page'] - 1, 8,$params['path']);
        $this->model = new Categories();
        $categories = $this->model->getAll();
        $this->model = new Manufacturer();
        $manufactures = $this->model->getAll();
        $this->view->generate('catalog.php', 'layout.php', $data, $categories, $manufactures);
    }

    function action_manufacturer($params)
    {
        if (!isset($params['get']['page'])) {
            $params['get']['page'] = 1;
        }

        $data = $this->model->getAllWithLimitManufacturer($params['get']['page'] - 1, 8,$params['path']);
        $this->model = new Categories();
        $categories = $this->model->getAll();
        $this->model = new Manufacturer();
        $manufactures = $this->model->getAll();
        $this->view->generate('catalog.php', 'layout.php', $data, $categories, $manufactures);
    }

    function action_product($params)
    {
        $data = $this->model->where('idProduct', '=', $params['path']);
        $this->view->generate('product.php', 'layout.php', $data);
    }

    function action_index($params)
    {
        if (!isset($params['get']['page'])) {
            $params['get']['page'] = 1;
        }

        $data = $this->model->getAllWithLimit($params['get']['page']-1, 8);
        $this->model = new Categories();
        $categories = $this->model->getAll();
        $this->model = new Manufacturer();
        $manufactures = $this->model->getAll();
        $this->view->generate('catalog.php', 'layout.php', $data, $categories, $manufactures);
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

}