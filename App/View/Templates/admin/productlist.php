<?php

        if(isset($_SESSION['success']['edit'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']['edit']."</div>";
            unset($_SESSION['success']['edit']);
        }

        if(isset($_SESSION['success']['delete'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']['delete']."</div>";
            unset($_SESSION['success']['delete']);
        }

?>

<h5 class="my-5">Список товаров</h5>

<table class="table table-bordered table-striped table-hover table-sm">

    <tr>
        <td>№</td>
        <td>Наименование</td>
        <td>Цена</td>
        <td>Производитель</td>
        <td>Категория</td>
        <td>Дата добавления</td>
        <td>Информация</td>
    </tr>

    <?php

    foreach ($data as $product){
        echo "
        <tr title='Нажмите, чтобы посмотреть подробнее'>
        <td>".$product['idProduct']."</td>
        <td>".$product['name']."</td>
        
        <td>".$product['price']."</td>
        <td>".$product['ManufacturerId']."</td>
        <td>".$product['CategoryId']."</td>
        <td>".$product['created_at']."</td>
        
        <td>
        <button class='btn btn-sm btn-primary showinfo' onclick='showinfo(".$product['idProduct'].")'  value='".$product['idProduct']."'>Подробнее</button>
        </td>
        
        </tr>
        
        <tr style='display: none;' class='info' id='".$product['idProduct']."'>         
        </tr>";
    }

    ?>
</table>

<script>

   function showinfo(id){

       const fetchInfo =async (id) =>{
           let response = await fetch('http://localhost:8888/admin/showinfo/'+id);
           let info = await response.json();
           let catAndMan = await fetch('http://localhost:8888/admin/showCatAndMan/?cat='+info['CategoryId']+'&man='+info['ManufacturerId']);
           let cAndMArr = await catAndMan.json();

           document.getElementById(id).style.display='table-row';
           document.getElementById(id).innerHTML='<td colspan="2" >' +
               '<div class="my-3">Изображение</div><img src="http://localhost:8888/'+info['photo']+'" width="200px"></td>' +
               '<td colspan="3"><div class="my-3">Описание</div><div class="w-75 mx-auto text-start overflow-auto">'+info['description']+'</div>' +
               '<br><div class=" my-1 w-75 mx-auto text-start">Категория: '+cAndMArr[0]+'</div>' +
               '<div class=" my-1 w-75 mx-auto text-start">Производитель: '+cAndMArr[1]+'</div>'+
               '</td>' +

               '<td><div class="my-3">Действия</div>' +
               '<a href="http://localhost:8888/Admin/deleteItem/'+info['idProduct']+'"><button class="btn btn-sm btn-warning w-75 my-1">Удалить</button></a><br>' +
               '<a href="http://localhost:8888/Admin/editItem/'+info['idProduct']+'"><button class="btn btn-sm btn-warning w-75 my-1">Изменить</button></a>' +
               '</td>' +

               '<td><button class="my-3 btn btn-danger btn-sm" onclick="this.parentElement.parentElement.style.display=`none`">Cкрыть</button></td>';


       }



       fetchInfo(id);


   }

</script>