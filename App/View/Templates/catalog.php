<?php
if (!empty($_SESSION['success'])) {
    echo "<div class='container alert alert-success text-center'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
?>


<div class="container mx-auto row">

    <div class="col-2 p-3 border-right mx-auto">
        <div class="sidebar">
            <h3 class="text-center">Категории</h3>



            <?php
use App\Models\Product;
            foreach ($data2 as $category) {

                $quant=new Product;
                $quant_item=$quant->where('CategoryId','=',$category['idCategory']);
                echo "<div class='col-12 my-1 text-center'>";
                echo "<a href='http://localhost:8888/catalog/category/" . $category['idCategory'] . "/'>" .
                    $category['cat_name']
                    . "</a> <span class='alert alert-primary p-0'> ".count($quant_item)." </span>";
                echo "</div>";
            }
            ?>

            <h3 class="text-center my-3 row">Производители</h3>
            <?php
            foreach ($data3 as $manufacturer) {
                echo "<div class='col-12 my-1 text-center'>";
                echo "<a href='http://localhost:8888/catalog/manufacturer/" . $manufacturer['idmanufacturer'] . "/'>" . $manufacturer['name'] . "</a>";
                echo "</div>";
            }
            ?>
        </div>

    </div>

    <div class="col-9 border border-top-0 border-bottom-0 mx-auto">
        <h3 class="text-center">Каталог</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">
            <?php

            foreach ($data as $row) {
                echo '<div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <h4 class="card-text">' . $row["name"] . '</h4>
              <p class="description">' . $row["description"] . '</p>
              <h4>Цена: <span class="text-success">' . $row["price"] . '</span></h4>
              
                
                <div class="mt-3">
                  <button type="button" class="btn btn-success">Купить</button>
                  <a class="btn btn-primary" href="/catalog/product/' . $row["idProduct"] . '">Подробнее</a>
                </div>
                
             
            </div>
          </div>
          
        </div>';

            }


            ?>
        </div>

        <div class="mx-auto text-center">
        <?php
        require_once 'App/View/inc/pagination.php';
        ?>
        </div>

    </div>


</div>