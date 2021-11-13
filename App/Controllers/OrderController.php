<?php

use Framework\Core\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Adres;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * OrderController constructor.
     */

    public function __construct()
    {
        $this->model = new Order();
    }

    /**
     *
     */
    public function action_index()
    {

    }

    /**
     * Очистка корзины
     */
    public function action_clearCart()
    {
        unset($_SESSION['basket']);
        echo '{
        "status":true
        }';
    }

    /**
     * Добавление товара в корзину
     * @param $params
     */

    public function action_setItemToCart($params)
    {
        $flag = 0;

        foreach ($_SESSION['basket'] as $item) {
            if ($item['idProduct'] == $params['get']['idProduct']) {
                $flag = 1;
            }
        }

        if ($flag == 0) {
            $_SESSION['basket'][] = [
                "idProduct" => (int)$params['get']['idProduct'],
                "name" => $params['get']['name'],
                "image" => $params['get']['image'],
                "price" => (int)$params['get']['price'],
                "count" => (int)$params['get']['count'],
            ];

            echo '{
            "status":"success"
            }';

        } else {

            echo '{
            "status":"error"
            }';

        }
    }

    /**
     * Удаление тавара из корзины
     * @param $params
     */

    public function action_unsetItemToCart($params)
    {
        foreach ($_SESSION['basket'] as $key => $item) {
            if ($item['idProduct'] == $params['get']['idProduct']) {
                unset($_SESSION['basket'][$key]);
                echo '{
                    "status":"success",
                    "message":"success"
                    }';
            }
        }
    }

    /**
     * Получение товаров в корзине
     */

    public function action_getCartProducts()
    {
        $data = json_encode($_SESSION['basket']);
        echo $data;
    }

    /**
     * Покупка
     */

    public function action_setCartProduct()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $products = json_encode($data['products']);
        if ($data['status']) {
            $statusPayment = 'Оплачен';
        } else {
            $statusPayment = 'Ждет оплаты';
        }
        if (empty($_SESSION['user']['id'])) {
            $userId = null;
        } else {
            $userId = $_SESSION['user']['id'];
        }
        $this->model = new Adres();
        $this->model->select();
        $this->model->whereTest('userId', '=', $_SESSION['user']['id']);
        $user_address = $this->model->get();
        $addressId = $user_address[0]['id'];
        $statusOrder = 'Добавлен';
        $this->model = new Order();
        $this->model->insert();
        $this->model->set('userId',$userId);
        $this->model->set('Products',$products);
        $this->model->set('addressId',$addressId);
        $this->model->set('statusOrder',$statusOrder);
        $this->model->set('statusPayment',$statusPayment);
        $this->model->save();

        if ($statusPayment == "Оплачен") {
            echo '{
            "status":"success",
            "messagge":true
            }';
        } else {
            echo '{
            "status":"success",
            "messagge":true
            }';
        }
    }

    /**
     * Установка информации о доставке
     */

    public function action_setBillingInfo()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($_SESSION['user'])) {
            $userId = null;
        } else {
            $userId = $_SESSION['user']['id'];
        }

        $this->model = new Adres();
        $this->model->insert();
        $this->model->set('userId',$userId);
        $this->model->set('city',$data['city']);
        $this->model->set('userName',$data['name']);
        $this->model->set('address', $data['address']);
        $this->model->set('email',$data['email']);
        $this->model->set('phone',$data['phone']);
        $this->model->save();

        echo '{
        "status":"success",
        "message":"success"
        }';

    }

    /**
     * Получение истории заказов
     * @param $params
     */

    public function action_getOrderForUser($params)
    {
        $this->model = new Order();
        $this->model->select();
        $this->model->whereTest('userId', '=', $params['path']);
        $orders = json_encode($this->model->get());
        echo $orders;
    }

    /**
     * Получение продукта
     * @param $params
     */

    public function action_getProductsById($params)
    {
        $this->model = new Product();
        $this->model->select();
        $this->model->whereTest('idProduct', '=', $params['path']);
        $product = json_encode($this->model->get());
        echo $product;
    }

}

