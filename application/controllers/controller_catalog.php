<?php

class Controller_Catalog extends Controller
{

    function __construct()
    {
        $this->model = new Model_Catalog();
        $this->view = new View();
    }

    function action_product($params){
        $data = $this->model->getProduct($params);
        $this->view->generate('product_view.php','template_view.php',$data);
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('catalog_view.php', 'template_view.php', $data);
    }
}