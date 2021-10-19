<div class="container">
    <div class="row">
        <div class="col">
            <img style="border:1px solid black;"
                 src="https://baigenews.kz/upload/iblock/29a/Elektronnaya-tekhnika-mozhet-podorozhat-v-Kazakhstane-_-BaigeNews.kz.jpg"
                 alt="product">
        </div>

        <?php
        foreach ($data as $row){
           echo '<div class="col">
            <h3>Название:</h3>
            <p>'.$row['name'] .'</p>
        <h3>Описание:</h3>
        <p>'.$row['description'].'</p>
        <h3>Цена:</h3>
        <p>'.$row['price'].'</p>
        <br>
        <a href="#" class="btn btn-success p-1 w-50">Купить</a>
    </div>';
        }
        ?>

    </div>
</div>