<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
           <h1>LOGO</h1>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
            <li><a href="../../../catalog" class="nav-link px-2 link-dark">Каталог</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">О Нас</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php
            if ($_GET['url']=='User/login'){
                echo '<a href="http://localhost:8888/User/register"><button type="button"  class="btn btn-primary">Регистрация</button></a>';
            }else {
                echo '<a href="http://localhost:8888/User/login"><button type="button"  class="btn btn-primary">Вход</button></a>';
            }
            ?>
        </div>
    </header>
</div>