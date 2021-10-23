<?php

use App\Models\Product;


echo '<h3 class="text-center">Категории</h3>';

foreach ($data2 as $category) {

    $quant = new Product;
    $quant_item = $quant->where('CategoryId', '=', $category['idCategory']);
    echo "<div  class='col-12 my-1'>";
    echo "<a class='text-black text-decoration-none' href='http://localhost:8888/catalog/category/{$category['idCategory']}/'><b>";

        $str = $category['cat_name'];
        while (strlen($str)<21){
            $str=$str.".";
        }

        echo $str;

    echo "</b></a><span class='badge bg-danger mx-1'>".count($quant_item)."</span>";
    echo "</div>";
}


   echo '<h3 class="text-center my-3 row">Производители</h3>';


foreach ($data3 as $manufacturer) {
    $quant = new Product;
    $quant_item = $quant->where('ManufacturerId', '=', $manufacturer['idmanufacturer']);
    echo "<div class='col-12 my-1'>";
    echo "<a class='text-black text-decoration-none' href='http://localhost:8888/catalog/manufacturer/{$manufacturer['idmanufacturer']}/'><b>";

    $strman = $manufacturer['name'];
    while (strlen($strman)<15){
        $strman=$strman.".";
    }
    echo $strman;

    echo "</b></a><span class='badge bg-danger mx-1'>".count($quant_item)."</span>";
    echo "</div>";
}
