<h1 class="text-center">Каталог</h1>

<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-3">
        <?php

        foreach ($data as $row) {
            echo '<div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <h3 class="card-text">' . $row['name'] . '</h3>
              <p>' . $row['description'] . '</p>
              <h3>Цена: <span class="text-success">' . $row['price'] . '</span></h3>
              
                
                <div class="mt-3">
                  <button type="button" class="btn btn-success">Купить</button>
                  <a class="btn btn-primary" href="/catalog/product/' . $row['name'] . '">Подробнее</a>
                </div>
                
             
            </div>
          </div>
        </div>';

        }

        ?>
    </div>

</div>