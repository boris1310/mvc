<?php

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
        $data = $this->model->getProduct($params);
        $this->view->generate('product.php', 'layout.php', $data);
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('catalog.php', 'layout.php', $data);
    }
}