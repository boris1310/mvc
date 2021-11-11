<?php

use Framework\Core\Controller;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Manufacturer;
use Framework\Core\View;
use App\Models\User;
use Framework\Router\ErrorRedirect;
use Framework\Databases\Db;
use App\Models\Order;
use App\Models\Adres;

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

        return header('Location:/admin/category');
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

        return header('Location: /admin/employees');

    }

    public function action_allProducts(){
        $products = new Product();
        $data = $products->getAll();
        $this->view->generate('admin/productlist.php', 'admin/adminlayout.php', $data);
    }

    public function action_showinfo($params){
        $data = $this->model = new Product();
        $data = $this->model->where('idProduct', '=', $params['path']);
        $product = [];
        foreach ($data as $products){
            $product =$products;
        }
        $product = json_encode($product);
        echo $product;
    }

    public function action_showCatAndMan($params){
        $cat = $this->model = new Categories();
        $cat = $this->model->where('idCategory','=',$params['get']['cat']);
        $man = $this->model = new Manufacturer();
        $man = $this->model->where('idmanufacturer','=',$params['get']['man']);
        $data=[
            $cat[0]['cat_name'],
            $man[0]['name'],
        ];
        $data=json_encode($data);
        echo $data;
    }

    function action_deleteItem($params){
        $data = $this->model= new Product();
        $product = $data->where('idProduct','=',$params['path']);
        $data->delete('idProduct','=',$params['path']);

        foreach ($product as $item){
            $itemName = $item['name'];
        }

        $_SESSION['success']['delete']='Товар &laquo;'.$itemName.'&raquo; успешно удалён';

        return header('Location:/admin/allProducts');
    }

    function action_editItem($params){
        if(!isset($params['path'])){
            ErrorRedirect::ErrorPage404();
        }
        $item= $this->model=new Product();
        $data=$item->where('idProduct','=',$params['path']);
        $cat = $this->model=new Categories();
        $data2=$cat->getAll();
        $man = $this->model=new Manufacturer();
        $data3=$man->getAll();
        $this->view->generate('admin/editItem.php', 'admin/adminlayout.php', $data, $data2, $data3);
    }

    public function action_editSubmit($params){
        $item= $this->model=new Product();
        $item->updateProduct(
            $params['post']['name'],
            $params['post']['description'],
            $params['post']['price'],
            $params['post']['manufacturer'],
            $params['post']['category'],
            $params['post']['idProduct']
        );
        $_SESSION['success']['edit']='Товар '.$params['post']['name'].' успешно изменён!';
        return header('Location:/admin/allProducts');
    }

    public function action_orders($params){
        $order = new Order();
        $data = $order->getOrderForAdmin($params['path']);
        $this->view->generate('admin/orders.php', 'admin/adminlayout.php', $data);
    }

    public function action_getOrderById($params){
        $order = new Order();
        $data = $order->where('idOrder','=',$params['path']);
        $data = json_encode($data);
        echo $data;
    }

    public function action_getUserByUserId($params){
        $user = new User();
        $data = $user->where('idUser','=',$params['path']);
        $data = json_encode($data);
        echo $data;
    }

    public function action_getProductsByOrderId($params){
        $order = new Order();
        $data = $order -> where('idOrder','=',$params['path']);
        $data= json_decode($data[0]['Products']);
        $product = new Product();
        $products = $product->whereIn('idProduct',$data);
        $products = json_encode($products);
        echo $products;
    }

    public function action_getAddressById($params){
        $address = new Adres();
        $data = $address->where('id','=',$params['path']);
        $data = json_encode($data[0]);
        echo $data;
    }

    public function action_getOrderPagination($params){
        $order = new Order();
        $orders = $order->getPaginationOrder();
        echo (int) $orders;
    }

}

