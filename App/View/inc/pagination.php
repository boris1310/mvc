<?php

$cat = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if (!isset($cat['1'])) {

    $cat['1'] = 'index';
}

use App\Models\Product;

if ($cat['1'] !== 'category') {
    $pagination = new Product;
    $items = $pagination->getAll();
    $quantity_items = count($items);

    if ($quantity_items % 8 !== 0) {
        $quantity_pages = ($quantity_items - $quantity_items % 8) / 8;

        for ($pages = 1; $pages < $quantity_pages + 1; $pages++) {
            echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/index/?page=" . $pages . "'>" . $pages . "
                            </a>";
        }
        echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/index/?page=" . $pages . "'>" . $pages . "
                            </a>";

    } else {
        $quantity_pages = $quantity_items / 8;
        for ($pages = 1; $pages < $quantity_pages + 1; $pages++) {
            echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/index/?page=" . $pages . "'>" . $pages . "
                            </a>";
        }
    }

} elseif ($cat['1'] == 'category') {

    $pagination=new Product();
    $items=$pagination->where('CategoryId','=',(int) $cat['2']);
    $quantity_items = count($items);
    if(empty($items)){
        echo "<div class='my-3 mx-auto text-center w-50'>
                      <h4 class='mx-auto alert alert-primary'>В этой категории пока нет товаров =(</h4>
                      </div>";
    }

    if ($quantity_items % 8 !== 0) {
        $quantity_pages = ($quantity_items - $quantity_items % 8) / 8;

        for ($pages = 1; $pages < $quantity_pages + 1; $pages++) {
            echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/category/".$cat['2']."/?page=" . $pages . "'>" . $pages . "
                            </a>";
        }
        echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/category/".$cat['2']."/?page=" . $pages . "'>" . $pages . "
                            </a>";

    } else {
        $quantity_pages = $quantity_items / 8;
        for ($pages = 1; $pages < $quantity_pages + 1; $pages++) {
            echo "<a 
                            class='btn btn-outline-primary mx-1'
                            href='http://localhost:8888/catalog/category/".$cat['2']."/?page=" . $pages . "'>" . $pages . "
                            </a>";
        }
    }


} else {

}

