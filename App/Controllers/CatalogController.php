<?php

use Framework\Core\Controller;
use Framework\Core\View;

class CatalogController extends Controller
{

    function __construct()
    {
        $this->model = new Catalog();
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