<h1 class="text-center">Каталог</h1>

<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3">
        <?php

        foreach ($data as $row) {
            echo '<div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <h3 class="card-text">' . $row["name"] .'</h3>
              <p>' . $row["description"]  . '</p>
              <h3>Цена: <span class="text-success">' . $row["price"]  . '</span></h3>
              
                
                <div class="mt-3">
                  <button type="button" class="btn btn-success">Купить</button>
                  <a class="btn btn-primary" href="/catalog/product/' . $row["idProduct"]  . '">Подробнее</a>
                </div>
                
             
            </div>
          </div>
          
        </div>';

        }



        ?>
    </div>
    <?php

    echo "<div class='mx-auto w-50 my-5 text-center'>
          <div id='paggination' class='row text-center'>";
    use App\Models\Product;
    $data= new Product();
    $data=$data->getAll();
    $pages=count($data)/6;

    for ( (int) $page=1;$page<=$pages; (int) $page++){
        echo "<a href='http://localhost:8888/catalog/index/?page=".$page."' class='col-1 col-sm-1 mx-1 alert alert-dark p-1'>".$page."</a>";
    }
    if($pages%6!==0){
        echo "<a href='http://localhost:8888/catalog/index/?page=".$page."' class='col-1 col-sm-1 mx-1  alert alert-dark p-1'>".$page++."</a>";
    }
    echo "</div>
          </div>";

    ?>


</div>