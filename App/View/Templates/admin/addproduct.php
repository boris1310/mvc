<?php
if(isset($_SESSION['success']['addproduct'])){
    echo '<div class="alert alert-success">'.$_SESSION['success']['addproduct'].'</div>';
    unset($_SESSION['success']['addproduct']);
}
?>

<h3>Страница добавления товара</h3>

<form action="http://localhost:8888/catalog/setProduct" enctype="multipart/form-data" class="text-center center-block" method="post">
    <div class="my-3">
        <label for="name" class="form-label">Наименование</label>
        <input type="text" name="name" id="name" placeholder="Наименование" class="form-control w-50 mx-auto" required>
        <br>
        <label for="description">Описание</label>
        <textarea name="description" id="description" class="form-control w-50 mx-auto" required></textarea>
        <br>
        <label for="price">Цена</label>
        <input type="number" id="price" step="0.01" name="price" class="form-control w-50 mx-auto" required>
        <br>
        <label for="category">Категория</label>
        <select name="category" id="category" class="form-control w-50 mx-auto" required>
            <?php
            echo "<option value=''>Выберите категорию...</option>";
            foreach ($data as $cat) {
                echo "<option value='" . $cat['idCategory'] . "'>" . $cat['cat_name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="manufacturer">Производитель</label>
        <select name="manufacturer" id="manufacturer" class="form-control w-50 mx-auto" required>
            <?php
            echo "<option value=''>Выберите производителя...</option>";
            foreach ($data2 as $man) {
                echo "<option value='" . $man['idmanufacturer'] . "'>" . $man['name'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label for="photo">Загрузить изображение</label>
        <input type="file" id="photo" name="photo" class="form-control w-50 mx-auto">
        <br>
        <input type="submit" class="form-control btn btn-primary w-50 mx-auto" value="Добавить товар">
    </div>
</form>