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
use Framework\Core\FileUploader;
use App\Models\Adres;

class AdminController extends Controller
{
    function __construct()
    {

        if (empty($_SESSION['user']['role']) || empty($_SESSION['user']['role'])) {
            exit('Отказано в доступе!');
        }

        $this->model = new Product();
        $this->view = new View();
    }

    /**
     * Генерация страницы админки
     */

    public function action_index()
    {
        $this->view->generate('admin/admin.php', 'admin/adminlayout.php');
    }

    /**
     * Добавление сотрудника
     * @param $params
     */

    public function action_addAdminSubmit($params){

        $this->model = new User();
        $this->model->update();
        $this->model->set('role','admin');
        $this->model->query = trim($this->model->query ,',');
        $this->model->whereTest('idUser','=',$params['path']);
        $this->model->save();
        $_SESSION['success']['addadmin']='Пользователь № '.$params['path'] .' назначен сотрудником';
        return header('Location: http://localhost:8888/admin/employees');

    }

    public function action_product()
    {
        $this->model = new Categories();
        $this->model->select();
        $data = $this->model->get();

        $this->model = new Manufacturer();
        $this->model->select();
        $data2 = $this->model->get();

        $this->view->generate('admin/addproduct.php', 'admin/adminlayout.php', $data, $data2);
    }

    public function action_category()
    {
        $this->model = new Categories();
        $this->model->select();
        $data = $this->model->get();
        $this->view->generate('admin/addcategory.php', 'admin/adminlayout.php', $data);
    }

    /**
     * Удаление категории
     * @param $params
     */

    public function action_categorydel($params)
    {
        $this->model = new Categories();
        $this->model->delete();
        $this->model->whereTest('idCategory','=',$params['path']);
        $this->model->save();
        $_SESSION['success']['category'] = 'Категория id=' . $params['path'] . ' успешно удалена!';
        return header('Location:/admin/category');
    }

    /**
     * Генерация страницы сотрудников
     */

    public function action_employees()
    {
        $this->model = new User();
        $this->model->select();
        $this->model->whereTest('role', '=', 'admin');
        $data = $this->model->get();
        $this->view->generate('admin/addadmin.php', 'admin/adminlayout.php', $data);
    }

    /**
     * Удаление сотрудника
     * @param $params
     */

    //Переписать

    public function action_deleteEmployee($params)
    {
        $this->model = new User();
        $this->model->update();
        $this->model->set('role','user');
        $this->model->query = trim($this->model->query ,',');
        $this->model->whereTest('idUser','=',$params['path']);
        $this->model->save();
        $_SESSION['success']['addadmin'] = 'Пользователь № ' . $params['path'] . ' больше не сотрудник';
        return header('Location: /admin/employees');
    }

    /**
     * Получение всех товаров
     */

    public function action_allProducts()
    {
        $this->model->select();
        $data = $this->model->get();
        $this->view->generate('admin/productlist.php', 'admin/adminlayout.php', $data);
    }

    /**
     * Получение подробной информации о товаре;
     * @param $params
     */

    public function action_showinfo($params)
    {
        $this->model->select();
        $this->model->whereTest('idProduct', '=', $params['path']);
        $product =$this->model->get();
        $product = json_encode($product[0]);
        echo $product;
    }

    /**
     * Получение категории и производителя по индексам
     * @param $params
     */

    public function action_showCatAndMan($params)
    {
         $this->model = new Categories();
         $this->model->select();
         $this->model->whereTest('idCategory', '=', $params['get']['cat']);
         $cat = $this->model->get();
         $this->model = new Manufacturer();
         $this->model->select();
         $this->model->whereTest('idmanufacturer', '=', $params['get']['man']);
         $man = $this->model->get();
         $data = [
            $cat[0]['cat_name'],
            $man[0]['name'],
         ];
         $data = json_encode($data);
         echo $data;
    }

    /**
     * Удаление товара
     * @param $params
     */

    function action_deleteItem($params)
    {
        $this->model->delete();
        $this->model->whereTest('idProduct','=',$params['path']);
        $this->model->save();
        $_SESSION['success']['delete'] = 'Товар успешно удалён';
        return header('Location:/admin/allProducts');
    }

    /**
     * Генерация страницы изменения товара
     * @param $params
     */

    function action_editItem($params)
    {
        $this->model->select();
        $this->model->whereTest('idProduct', '=', $params['path']);
        $data = $this->model->get();

        $this->model = new Categories();
        $this->model->select();
        $data2 = $this->model->get();

        $this->model = new Manufacturer();
        $this->model->select();
        $data3 = $this->model->get();

        $this->view->generate('admin/editItem.php', 'admin/adminlayout.php', $data, $data2, $data3);
    }

    /**
     * Изменение товара
     * @param $params
     */


    public function action_editSubmit($params)
    {
        $upload = new FileUploader();
        $upload->upload();

        $this->model->update();
        $this->model->set('name',$params['post']['name']);
        $this->model->set('description',$params['post']['description']);
        $this->model->set('price',$params['post']['price']);
        $this->model->set('ManufacturerId',$params['post']['manufacturer']);
        $this->model->set('CategoryId',$params['post']['category']);
        if($upload->status){
          $this->model->set('photo',$upload->file);
        }
        $this->model->query = trim($this->model->query,',');
        $this->model->whereTest('idProduct','=',$params['post']['idProduct']);
        $this->model->save();

        $_SESSION['success']['edit'] = 'Товар ' . $params['post']['name'] . ' успешно изменён!';
        return header('Location:/admin/allProducts');
    }

    /**
     * Добавление товара
     * @param $params
     */

    public function action_setProduct($params)
    {
            $upload = new FileUploader();
            $upload->upload();

            $this->model->insert();
            $this->model->set('name',$params['post']['name']);
            $this->model->set('description',$params['post']['description']);
            $this->model->set('price',$params['post']['price']);
            $this->model->set('ManufacturerId', $params['post']['manufacturer']);
            $this->model->set('CategoryId',$params['post']['category']);

            if($upload->status){
                $this->model->set('photo',$upload->file);
            }

            $this->model->save();

        $_SESSION['success']['addproduct'] = "Товар " . $params['post']['name'] . " успешно добавлен в базу";
        return header('Location:/admin/product');
    }



    /**
     * Добавление категорий
     * @param $params
     */

    public function action_setCategory($params)
    {
        $this->model = new Categories();
        $this->model->insert();
        $this->model->set('cat_name',$params['post']['cat_name']);
        $this->model->save();
        $_SESSION['success']['category'] = "Категория " . $params['post']['cat_name'] . " успешно добавлена в базу";
        return header('Location:/admin/category');
    }

    /**
     * Генерация страницы заказов
     * @param $params
     */


    public function action_orders($params)
    {
        $this->model = new Order();
        $this->model->select();
        $this->model->orderBy('created_at');
        $this->model->limit(20);
        $this->model->offset(($params['path']-1)*20);
        $data = $this->model->get();
        $this->view->generate('admin/orders.php', 'admin/adminlayout.php', $data);
    }

    /**
     * Получение заказа по id
     * @param $params
     */

    public function action_getOrderById($params)
    {
        $this->model = new Order();
        $this->model->select();
        $this->model->whereTest('idOrder', '=', $params['path']);
        $data = $this->model->get();
        $data = json_encode($data);
        echo $data;
    }

    /**
     * Получение пользователя по id
     * @param $params
     */

    public function action_getUserByUserId($params)
    {
        $this->model = new User();
        $this->model->select();
        $this->model->whereTest('idUser', '=', $params['path']);
        $data = $this->model->get();
        $data = json_encode($data);
        echo $data;
    }

    /**
     * Получение товара по id
     * @param $params
     */

    public function action_getProductsByOrderId($params)
    {
        $this->model = new Order();
        $this->model->select('Products');
        $this->model->whereTest('idOrder', '=', $params['path']);
        $data = $this->model->get();
        $data = json_decode($data[0]['Products']);
        $this->model = new Product();
        $this->model->select();
        $this->model->whereTest('idProduct', 'IN', $data);
        $products = json_encode($this->model->get());
        echo $products;
    }

    /**
     * Получение информации о доставке
     * @param $params
     */

    public function action_getAddressById($params)
    {
        $this->model = new Adres();
        $this->model->select();
        $this->model->whereTest('id', '=', $params['path']);
        $data = $this->model->get();
        $data = json_encode($data[0]);
        echo $data;
    }

    /**
     * Получение пагинации заказов в админке
     * @param $params
     */



    public function action_getOrderPagination($params)
    {
        $this->model = new Order();
        $this->model->counter();
        $data = $this->model->get();
        echo (int) $data[0][0];
    }


    /**
     * Выход
     */

    public function action_logout()
    {
        $_SESSION = [];
        setcookie('PHPSESSID', '', time() - 100);
        return header('Location:/');
    }

}

