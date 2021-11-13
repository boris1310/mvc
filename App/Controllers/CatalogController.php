<?php

//namespace App\Controllers;

use Framework\Core\Controller;
use Framework\Core\View;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Manufacturer;


class CatalogController extends Controller
{

    /**
     * CatalogController constructor.
     */

    public function __construct()
    {
        $this->model = new Product();
        $this->view = new View();
    }

    /**
     * TEST FUNCTIONS
     * @param $params
     */

    public function action_select($params)
    {
        $product = new Product();
        $product->select();
        $product->whereTest('idProduct', '=', '33');
        $data = $product->get();
        var_dump($data);
    }

    /**
     * Получение категорий
     */

    public function action_getCategories()
    {
        $cat = new Categories();
        $data = $cat->select();
        $data = $cat->get();
        $data = json_encode($data);
        echo $data;
    }

    /**
     * Получение производителей
     */

    public function action_getManufacturers()
    {
        $man = new Manufacturer();
        $man->select();
        $man->get();
        $data = json_encode($man->subject);
        echo $data;
    }

    /**
     *
     * Получение товаров с постраничным выводом;
     * @param $params
     *
     */

    public function action_getAll($params)
    {
        if (!empty($params['get']['page'])) {
            $page = $params['get']['page'] - 1;
        } else {
            $page = 0;
        }
        $url = $params['path'];
        $url = explode('_', $url);

        if ($url[0] == "all") {

            $this->model->select();
            $this->model->limit(8);
            $this->model->offset($page);

        } elseif ($url[0] == "cat") {

            $this->model->select();
            $this->model->whereTest('CategoryId', '=', $url[1]);
            $this->model->limit(8);
            $this->model->offset($page);

        } elseif ($url[0] == "man") {

            $this->model->select();
            $this->model->whereTest('ManufacturerId', '=', $url[1]);
            $this->model->limit(8);
            $this->model->offset($page);

        }
        $data = json_encode($this->model->get());
        echo $data;
    }

    /**
     * Генерация страницы каталога
     */

    public function action_index()
    {
        $this->view->generate('vue-catalog.php', 'vue-layout.php');
    }

    /**
     * Добавление товара
     * @param $params
     */

    //переписать!!!!!

    public function action_setProduct($params)
    {
        $data = $this->model->setProduct(
            $params['post']['name'],
            $params['post']['description'],
            $params['post']['price'],
            $params['post']['manufacturer'],
            $params['post']['category']
        );
        $_SESSION['success']['addproduct'] = "Товар " . $params['post']['name'] . " успешно добавлен в базу";
        return header('Location:/admin/product');
    }

    /**
     * Добавление категорий
     * @param $params
     */

    //ПЕРЕПИСАТЬ !!!

    public function action_setCategory($params)
    {
        $this->model = new Categories();
        $this->model->setCategory($params['post']['cat_name']);
        $_SESSION['success']['category'] = "Категория " . $params['post']['cat_name'] . " успешно добавлена в базу";
        return header('/admin/category');
    }

    /**
     * Подсчет товаров в категории (Для вывода количества возле ссылки на категорию)
     */

    public function action_countItemInCategory()
    {

        $this->model = new Categories();
        $this->model->select('idCategory');
        $data = $this->model->get();
        $idCategory = [];
        $countItems = [];
        foreach ($data as $key => $a) {
            $this->model = new Product();
            $idCategory[] = $data[$key]['idCategory'];
            $this->model->counter('idProduct');
            $this->model->whereTest('CategoryId', '=', $data[$key]['idCategory']);
            $item = $this->model->get();
            $countItems[] = $item[0][0];
        }
        $result = array_combine($idCategory, $countItems);
        $result = json_encode($result);
        echo $result;
    }

    /**
     * Получение пагинации
     * @param $params
     */

    public function action_pagination($params)
    {
        $url = $params['path'];
        $url = explode('_', $url);
        if ($url[0] == "all") {
            $this->model->counter();
            $data = $this->model->get();
            $count = $data[0][0];
        } elseif ($url[0] == "cat") {
            $this->model->counter();
            $this->model->whereTest('CategoryId', '=', $url[1]);
            $data = $this->model->get();
            $count = $data[0][0];
        } elseif ($url[0] == "man") {
            $this->model->counter();
            $this->model->whereTest('ManufacturerId', '=', $url[1]);
            $data = $this->model->get();
            $count = $data[0][0];
        }
        $data = json_encode($count);
        echo $data;
    }

    /**
     * Получение товара по id
     * @param $params
     */

    public function action_getProductById($params)
    {
        $this->model->select();
        $this->model->whereTest('idProduct', '=', $params['path']);
        $data = $this->model->get();
        $data = json_encode($data[0]);
        echo $data;
    }


    /**
     * Подсчет товаров у производителя (Для вывода количества возле ссылки на производителя)
     */

    public function action_countItemInManufacturer()
    {
        $this->model = new Manufacturer();
        $this->model->select('idmanufacturer');
        $data = $this->model->get();
        $idmanufacturer = [];
        $countItems = [];
        foreach ($data as $key => $a) {
            $this->model = new Product();
            $idmanufacturer[] = $data[$key]['idmanufacturer'];
            $this->model->counter('idProduct');
            $this->model->whereTest('ManufacturerId', '=', $data[$key]['idmanufacturer']);
            $item = $this->model->get();
            $countItems[] = $item[0][0];
        }
        $result = array_combine($idmanufacturer, $countItems);
        $result = json_encode($result);
        echo $result;
    }

}

