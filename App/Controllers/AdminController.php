<?php

use Framework\Core\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Manufacturer;
use Framework\Core\View;

class AdminController extends Controller
{

    function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('admin/admin.php', 'admin/adminlayout.php');
    }

    public function action_product()
    {
        $data=$this->model=new Categories();
        $data=$this->model->getAll();
        $data2=$this->model=new Manufacturer();
        $data2=$this->model->getAll();
        $this->view->generate('admin/addproduct.php', 'admin/adminlayout.php',$data,$data2);
    }



}