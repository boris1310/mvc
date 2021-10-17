<div class="row">
    <div class="col-6 text-center m-1">
        <img src="https://st4.depositphotos.com/16122460/i/600/depositphotos_303689174-stock-photo-christmas-gift-box-decorated-with.jpg" width="200px" alt="Present">
        <p>После регистрации Вы получите скидку <span class="text-success">10% </span>на первую покупку</p>
    </div>
    <div class="col-4 m-1">
        <form action="http://localhost:8888/User/submitRegister" class="text-center" method="post">

            <label for="name" class="form-label">Введите Ваше имя</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Ваше имя" required>
            <br>
            <label for="email" class="form-label">Введите вашу почту</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Эл. почта" required>
            <br>
            <label for="password1" class="form-label">Введите пароль</label>
            <input type="password" id="password1" class="form-control" name="password1" placeholder="Пароль" required>
            <br>
            <label for="password2" class="form-label">Подтвердите пароль пароль</label>
            <input type="password" id="password2" class="form-control" name="password2" placeholder="Пароль" required>
            <br>
            <input type="submit" value="Зарегистрироваться" class="text-center w-50 form-control btn btn-primary">

        </form>
    </div>
</div>
