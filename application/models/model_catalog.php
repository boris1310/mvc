<?php


class Model_Catalog extends Model
{
    public function get_data()
    {
        require_once 'application/storage/storage.php';
        $patern = [
            0 => '/Наименование:/',
            1 => '/Описание:/',
            2 => '/Цена:/',
            3 => '/\n/'
        ];

        $products_string = preg_replace($patern, "", $products);
        $products_array = explode(',', $products_string);
        for ($i = 0; $i < count($products_array) - 2; $i = $i + 3) {
            $data[$i] = [
                'name' => $products_array[$i],
                'description' => $products_array[$i + 1],
                'price' => $products_array[$i + 2]
            ];
        }
        return $data;
    }

    public function getProduct($params)
    {
        $products = new Model_Catalog();
        $items = $products->get_data();
        $data = [];
        foreach ($items as $key => $item) {
            if ($item['name'] == "$params") {
                $data=$items[$key];
            }
        }

        return $data;
    }

}