<div class="row">
    <div class="col-6 text-center m-1">
        <img src="https://st4.depositphotos.com/16122460/i/600/depositphotos_303689174-stock-photo-christmas-gift-box-decorated-with.jpg"
             width="200px" alt="Present">
        <p>После регистрации Вы получите скидку <span class="text-success">10% </span>на первую покупку</p>
    </div>
    <div class="col-4">
        <form action="http://localhost:8888/User/submitLogin" class="text-center" method="post">

            <?php
            if(isset($_SESSION['logmessage'])){
                echo "<div class='text-danger mb-1'>".$_SESSION['logmessage']." 
            </div>";
             unset($_SESSION['logmessage']);
            }
            ?>

            <label for="email" class="mb-1">Введите вашу почту</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Эл. почта" required>
            <br>
            <label for="password" class="mb-1">Введите пароль</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Пароль" required>
            <br>
            <input type="submit" value="Войти" class="text-center w-50 form-control btn btn-primary">

        </form>
    </div>
</div>