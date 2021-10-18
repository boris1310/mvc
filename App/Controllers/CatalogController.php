<?php

//namespace App\Controllers;

use Framework\Core\Controller;
use Framework\Core\View;
use App\Models\Product;

class CatalogController extends Controller
{

    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function action_product($params)
    {
        $data = $this->model->where('idProduct', '=', $params['path']);
        $this->view->generate('product.php', 'layout.php', $data);
    }

    function action_index($params)
    {
        $data = $this->model->getAllWithLimit($params['get']['page']-1,6);
        $this->view->generate('catalog.php', 'layout.php', $data);
    }

//    function action_set()
//    {
//        $data = $this->model->set('test', 'testest', 1230);
//        $this->view->generate('catalog.php', 'layout.php');
//    }

}