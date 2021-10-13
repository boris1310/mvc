<div class="container">
    <div class="row">
<<<<<<< HEAD
        <h2 align="center" class="my-3 "><?= $data['name'] ?></h2>

        <div class="col-lg-6 col-sm-12  mx-3">
            <img style="border:1px solid black;"
                 src="https://baigenews.kz/upload/iblock/29a/Elektronnaya-tekhnika-mozhet-podorozhat-v-Kazakhstane-_-BaigeNews.kz.jpg"
                 alt="product <?= $data['name'] ?>">
        </div>

        <div class="col-lg-5 col-sm-12  mx-3">
            <h3>Название:</h3>
            <p><?= $data['name'] ?></p>
            <h3>Описание:</h3>
            <p><?= $data['description'] ?></p>
            <h3>Цена:</h3>
            <p><?= $data['price'] ?></p>
            <br>
            <a href="#" class="btn btn-success p-1 w-50">Купить</a>
        </div>
=======

        <div class="col">
            <img style="border:1px solid black;"
                 src="https://baigenews.kz/upload/iblock/29a/Elektronnaya-tekhnika-mozhet-podorozhat-v-Kazakhstane-_-BaigeNews.kz.jpg"
                 alt="product">
        </div>

        <div class="col">
            <h3>Название:</h3>
            <p><?= $data->name ?></p>
            <h3>Описание:</h3>
            <p><?= $data->description ?></p>
            <h3>Цена:</h3>
            <p><?= $data->price ?></p>
            <br>
            <a href="#" class="btn btn-success p-1 w-50">Купить</a>
        </div>

>>>>>>> 9f324c3a63a19c8fcd8ea8e79e712b93c27e34bd
    </div>
</div>