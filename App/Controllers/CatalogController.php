<?php

<<<<<<< HEAD
=======
//namespace App\Controllers;

>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
use Framework\Core\Controller;
use Framework\Core\View;
use App\Models\Product;

<<<<<<< HEAD

=======
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
class CatalogController extends Controller
{

    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    function action_product($params)
    {
<<<<<<< HEAD
        $data = $this->model->getProduct($params);
=======
        $data = $this->model->getOne($params);
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
        $this->view->generate('product.php', 'layout.php', $data);
    }

    function action_index()
    {
<<<<<<< HEAD
        $data = $this->model->get_data();
=======
        $data = $this->model->getAll();
>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
        $this->view->generate('catalog.php', 'layout.php', $data);
    }
}