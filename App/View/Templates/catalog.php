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
            foreach ($data2 as $category) {
                echo "<div class='col-12 my-1 text-center'>";
                echo "<a href='http://localhost:8888/catalog/category/" . $category['idCategory'] . "/'>" . $category['cat_name'] . "</a>";
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
                    echo $pages;
                }
            }

        } elseif ($cat['1'] == 'category') {

            echo "Категории";
            $pagination=new Product();

            $items=$pagination->where('CategotyId','=',(int) $cat['2']);



        } else {

        }

        ?>

    </div>


</div>