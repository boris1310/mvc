<?php
if (!empty($_SESSION['success'])) {
    echo "<div class='container alert alert-success text-center'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
?>


<div class="container mx-auto row">

    <div class="col-2 p-3 border-right mx-auto">
        <div class="sidebar">
            <?php require_once 'App/View/inc/sidebar.php' ?>
        </div>

    </div>

    <div class="col-9 border border-top-0 border-bottom-0 mx-auto">
        <h3 class="text-center">Каталог</h3>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 my-3">
            <?php

            foreach ($data as $row) {
                echo '<div  class="col">
          <div class="card shadow-sm">
            <img src="https://images.ua.prom.st/365684822_w340_h255_novyj-tovar.jpg" alt="">
            <div class="card-body">
              <h5 class="card-text fs-6 lh-1">' . $row["name"] . '</h5>
              
              <h5 class="my-3">Цена: <span class="text-success ">' . $row["price"] . '</span></h5>       
                <div class="mt-3 my-3 text-center">
                    <div class="btn-group" role="group">
                    
                      <button type="button"  class="btn btn-outline-primary btn-sm basket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" value='.$row['idProduct'].'>
                      <img src="../../../public/img/basket.png" width="24px"/>
                      </button>
                      
                      <button type="button"  class="btn btn-outline-primary btn-sm " value='.$row['idProduct'].'>
                      <img src="../../../public/img/buynow.png" width="24px"/>
                      </button>
                      
                      <a class="btn btn-outline-primary btn-sm" href="http://localhost:8888/catalog/product/'.$row["idProduct"].'">
                      <img src="https://img.icons8.com/material-outlined/24/000000/more.png" width="24px"/>
                      </a>
                      
                    </div>
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

