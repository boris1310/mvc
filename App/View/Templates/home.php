
<div class="container">

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="https://s2.eshoper.ru/FrontSite/Blog/1b346a4fa7e44813bba6648707a6944f.png">

                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="https://s2.eshoper.ru/FrontSite/Blog/1b346a4fa7e44813bba6648707a6944f.png" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://s2.eshoper.ru/FrontSite/Blog/1b346a4fa7e44813bba6648707a6944f.png" alt="">

                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

<div class="my-5 container mx-auto row">
    <h1 class="text-center my-3">Популярное</h1>
    <?php
    use App\Models\Product;
    use App\Models\Categories;
    use App\Models\Manufacturer;
    $items = new Product();
    $data=$items->getAllWithLimit(0, 6);
    foreach ($data as $row) {

        echo '<div  class="col-2 my-3 ">
          <div class="card shadow-sm float-center hover-card">';
        if ( strlen($row['photo'])!==0) {
            echo '<img height="120px" width="150px" class="float-center mx-auto p-1" width="350px" src="../../../' . $row['photo'] . '" alt="item">';
        } else {
            echo '<img height="100%" class="float-center mx-auto p-1" width="350px" src="https://brilliant24.ru/files/cat/template_01.png" alt="item">';
        }
            echo '<div class="card-body">
              <h4 class="card-text h-25 fs-5 lh-1">' . $row["name"] . '</h4>
              <h4>Цена: <span class="text-success">' . $row["price"] . '</span></h4>       
                <div class="mt-3 my-3 text-center">
                    <div class="btn-group" role="group">
                    
                      <button type="button"   class="btn btn-outline-primary basket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top" value='.$row['idProduct'].'>
                      <img src="../../../public/img/basket.png" width="24px"/>
                      </button>
                      
                      <button type="button"  class="btn btn-outline-primary" value='.$row['idProduct'].'>
                      <img src="../../../public/img/buynow.png" width="24px"/>
                      </button>
                      
                      <a class="btn btn-outline-primary" href="http://localhost:8888/catalog/product/'.$row["idProduct"].'">
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

<div class="my-5">

    <?php

    if(empty($_SESSION['name'])){
        echo '<hr>';
        require_once 'App/View/Templates/register.php';
    }
    ?>

</div>