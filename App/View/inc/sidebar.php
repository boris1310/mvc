<?php

use App\Models\Product;


echo '<h3 class="text-center">Категории</h3>';

foreach ($data2 as $category) {

    $quant = new Product;
    $quant_item = $quant->where('CategoryId', '=', $category['idCategory']);
    echo "<div  class='col-12 my-1'>";
    echo "<a class='text-black text-decoration-none' href='http://localhost:8888/catalog/category/{$category['idCategory']}/'><b>
 ".$category['cat_name']."</b></a><span class='badge bg-danger mx-1 float-end'>".count($quant_item)."</span>";
    echo "</div>";
}


echo '<h3 class="text-center my-3 row">Производители</h3>';


foreach ($data3 as $manufacturer) {
    $quant = new Product;
    $quant_item = $quant->where('ManufacturerId', '=', $manufacturer['idmanufacturer']);
    echo "<div class='col-12 my-1'>";
    echo "<a class='text-black text-decoration-none' href='http://localhost:8888/catalog/manufacturer/{$manufacturer['idmanufacturer']}/'><b>".
        $manufacturer['name']."</b></a><span class='badge bg-danger mx-1 float-end'>".count($quant_item)."</span>";
    echo "</div>";
}
