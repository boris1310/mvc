<div class="w-50 my-3 mx-auto">
    <?php
    if(isset($_SESSION['success']['category'])){
        echo "<div class='alert alert-success'>".$_SESSION['success']['category']."</div>";
        unset($_SESSION['success']['category']);
    }
    ?>
    <h4 class="my-5">Администрирование категорий</h4>

    <table class="table table-sm table-bordered table-hover table-striped">
        <tr  class="bg-primary text-light">
            <td>id категории</td>
            <td>Название категории</td>
            <td></td>
        </tr>
        <?php

        foreach ($data as $row){
          echo  "<tr>
            <td>".$row['idCategory']."</td>
            <td>".$row['cat_name']."</td>
            <td><a href='http://localhost:8888/admin/categorydel/".$row['idCategory']."' class='btn-close'></a></td>
            </tr>";
        }
        ?>
    </table>

    <h4 class="my-3">Добавить категорию</h4>

    <form action="http://localhost:8888/catalog/setCategory" method="post">
        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Название категории" required>
        <br>
        <input type="submit" class="form-control btn btn-primary" value="Добавить">
    </form>
</div>