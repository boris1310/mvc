
   <?php
   if(!empty($_SESSION['success'])){
   echo "<div class='container alert alert-success text-center'>".$_SESSION['success']."</div>";
   unset($_SESSION['success']);
   }
   ?>




<div class="container mx-auto row">

    <div class="col-2 p-3 border-right">
        <div class="sidebar">
            <h2 class="text-center">Категории</h2>
            <h4 class="text-center my-3 row">
            <?php
            foreach ($data2 as $category){
                echo "<div class='col-12 my-1'>";
                echo "<a href='http://localhost:8888/catalog/category/".$category['idCategory']."/'>".$category['cat_name']."</a>";
                echo "</div>";
            }
            ?>
            </h4>
        </div>
    </div>

    <div class="col-9 mx-auto">
        <h2 class="text-center">Каталог</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 my-3">
        <?php

        foreach ($data as $row) {
            echo '<div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <h4 class="card-text">' . $row["name"] .'</h4>
              <p class="description">' . $row["description"]  . '</p>
              <h4>Цена: <span class="text-success">' . $row["price"]  . '</span></h4>
              
                
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
        $cat=explode('/',trim($_SERVER['REQUEST_URI'],'/'));

        if(!empty($cat['1'])) {
            $data = $data->where('CategoryID', '=', $cat['2']);
        }else{
            $data=$data->getAll();
        }

        $pages=count($data)/6;
        for ( (int) $page=0;$page<$pages; (int) $page++){
            echo "<a href='http://localhost:8888/catalog/index/?page=".$page++."' class='col-1 col-sm-1 mx-1 btn btn-outline-primary py-3'>".$page."</a>";
        }
        if($pages%6!==0){
            echo "<a href='http://localhost:8888/catalog/index/?page=".$page."' class='col-1 col-sm-1 mx-1  btn btn-outline-primary py-3'>".$page++."</a>";
        }
        echo "</div>
          </div>";

        ?>
    </div>



</div>