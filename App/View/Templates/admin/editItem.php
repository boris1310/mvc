<h5 class="my-5">Редактирование товара</h5>

<?php
if(isset($_SESSION['success']['addproduct'])){
    echo '<div class="alert alert-success">'.$_SESSION['success']['addproduct'].'</div>';
    unset($_SESSION['success']['addproduct']);
}
?>


<form action="http://localhost:8888/admin/editSubmit" enctype="multipart/form-data" class="text-center center-block" method="post">
    <div class="my-3">
        <input type="hidden" name="idProduct" value="<?= $data[0]['idProduct'] ?>">
        <label for="name" class="form-label">Наименование</label>
        <input type="text" name="name" id="name" placeholder="Наименование" value="<?= $data[0]['name']?>" class="form-control w-50 mx-auto" required>
        <br>
        <label for="description">Описание</label>
        <textarea name="description" id="description"  class="form-control w-50 mx-auto" required><?= $data[0]['description']?></textarea>
        <br>
        <label for="price">Цена</label>
        <input type="number" id="price" step="0.01" value="<?= $data[0]['price']?>" name="price" class="form-control w-50 mx-auto" required>
        <br>
        <label for="category">Категория</label>
        <select name="category" id="category" class="form-control w-50 mx-auto" required>

            <?php

            foreach ($data2 as $cat) {

                if($data[0]['CategoryId']==$cat['idCategory']){
                    echo "<option value='" . $cat['idCategory'] . "' selected>" . $cat['cat_name'] . "</option>";
                }else {
                    echo "<option value='" . $cat['idCategory'] . "'>" . $cat['cat_name'] . "</option>";
                }
            }

            ?>

        </select>
        <br>
        <label for="manufacturer">Производитель</label>
        <select name="manufacturer" id="manufacturer" class="form-control w-50 mx-auto" required>

            <?php

            foreach ($data3 as $man) {

                if($data[0]['ManufacturerId']==$man['idmanufacturer']){
                    echo "<option value='" . $man['idmanufacturer'] . "' selected>" . $man['name'] . "</option>";
                }else{
                    echo "<option value='" . $man['idmanufacturer'] . "'>" . $man['name'] . "</option>";
                }

            }

            ?>

        </select>
        <br>

        <button type="button" class="form-control w-50 btn btn-success" id="showCurentImg">Посмотреть текущее фото</button><br>
        <div id="photo" class="my-3 w-50 mx-auto" style="display: none;">
            Текущее изображение <button class="btn-close float-end" type="button" id="hideCurentImg"></button><br>
            <img width="100%" src="http://localhost:8888/<?= $data[0]['photo'] ?>" alt="current image">
        </div>
        <br>
        <label for="photo">Загрузить изображение</label>

        <input type="file" id="photo" name="photo" class="form-control w-50 mx-auto">

        <br>
        <input type="submit" class="form-control btn btn-primary w-50 mx-auto" value="Добавить товар">
    </div>
</form>

<script>
    showCurentImg.onclick=()=>{
       document.getElementById('photo').style.display = "block";
    }

    hideCurentImg.onclick=()=>{
        document.getElementById('photo').style.display = "none";
    }
</script>