<?php

use Framework\Core\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Manufacturer;
use Framework\Core\View;
use App\Models\User;

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
        $data = $this->model = new Categories();
        $data = $this->model->getAll();
        $data2 = $this->model = new Manufacturer();
        $data2 = $this->model->getAll();
        $this->view->generate('admin/addproduct.php', 'admin/adminlayout.php', $data, $data2);
    }

    public function action_category()
    {
        $data = $this->model = new Categories();
        $data = $this->model->getAll();
        $this->view->generate('admin/addcategory.php', 'admin/adminlayout.php', $data);
    }

    public function action_categorydel($params)
    {
        $data = $this->model = new Categories();
        $data = $this->model->categoryDelete($params['path']);
        $_SESSION['success']['category'] = 'Категория id=' . $params['path'] . ' успешно удалена!';

        return header('Location:http://localhost:8888/admin/category');
    }

    public function action_employees()
    {
        $data = $this->model = new User();
        $data = $this->model->where('role', '=', 'admin');
        $this->view->generate('admin/addadmin.php', 'admin/adminlayout.php', $data);
    }

    public function action_deleteEmployee($params)
    {


        $user = new User();
        $columns = ['role'];
        $values = ['user'];
        $user->update($columns, $values, 'idUser', '=', $params['path']);

        $_SESSION['success']['addadmin'] = 'Пользователь № ' . $params['path'] . ' больше не сотрудник';

        return header('Location: http://localhost:8888/admin/employees');


    }
}

