<h5 class="my-5">Действующие сотрудники</h5>

<?php

echo '<table class="mx-auto table table-sm table-striped table-bordered w-75">
<tr>
<td>№</td>
<td>Имя</td>
<td>Email</td>
<td>Дата регистрации</td>
<td>Удалить</td>
</tr>';
foreach ($data as $employee){
   echo '<tr>
<td>'.$employee['idUser'].'</td>
<td>'.$employee['name'].'</td>
<td>'.$employee['email'].'</td>
<td>'.$employee['created_at'].'</td>
<td><a href="http://localhost:8888/admin/deleteEmployee/'.$employee['idUser'].'" class="btn-close"></a></td>
</tr>';
}
echo '</table>';
?>


<h5 class="mb-1 mt-5">Добавить сотрудника</h5>

<?php

if(isset($_SESSION['success']['addadmin'])){
    echo "<div class='alert alert-success my-3 w-75 mx-auto'>".$_SESSION['success']['addadmin']."</div>";
    unset($_SESSION['success']['addadmin']);
}

?>


<div class="w-75 mx-auto" id="errors"></div>

<div class="input-group w-75 mx-auto my-5">

        <input type="text" class="form-control" id="email" placeholder="Email сотрудника" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" id="check" type="button">Найти</button>
        </div>
    </div>

<div id="user">

</div>

    <script>


        function validateEmail(email) {
            const re = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(!re.test(email)){
                throw new Error('Некоректный email');
            }
            if(email.trim().length=='0'){
                throw new Error('Вы ничего не ввели');
            }
            return email;
        }

        const fetchuser =async (email) =>{
            const response = await fetch('http://localhost:8888/user/getUserByEmail/'+email);
            const data = await response.json();

            if(Object.entries(data).length === 0 && data.constructor === Object){
                throw new Error('Такого пользователя не существует');
            }

            document.getElementById('user').innerHTML = `
            <div  class="alert alert-primary mx-auto my-3  w-75">
            <div class="text-start">
            Информация о пользователе:<br>
            Имя: ${data.name}<br>
            Email: ${data.email}<br>
            Дата регистрации: ${data.created_at}<br>
            </div>
            <div class="mt-5 float-center">
            <a href="http://localhost:8888/user/addAdminSubmit/${data.idUser}"><button class="btn btn-success">Назначить сотрудником</button></a>
            </div>
            </div>`;


        }

        check.onclick = () => {
            document.getElementById("errors").innerHTML="";
            try{
                const emailStr = validateEmail(email.value)
                var user = fetchuser(emailStr)
                    .catch(e=>document.getElementById("errors").innerHTML="<div class='alert alert-danger'>"+e.message+"</div>")
                    .then(


                    );

            }catch (e){
                email.classList.add('is-invalid');
                document.getElementById("errors").innerHTML="<div class='alert alert-danger'>"+e.message+"</div>";
            }
        }


    </script>