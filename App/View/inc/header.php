<header class="p-3 mb-3 border-bottom bg-white  border-bottom sticky-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <h3>My Store</h3>
            </a>

            <ul class="nav col-12 col-lg-auto mx-5 me-lg-auto mb-2 justify-content-center mb-md-0">


                <li><a href="/Catalog" class="nav-link px-2 link-dark">Каталог</a></li>
                <li><a href="/Order" class="nav-link px-2 link-dark">Ваши заказы</a></li>
            </ul>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://yt3.ggpht.com/ytc/AKedOLT7zW6EwRuZRD5dNs8CJCsxghs2rW8BspuQ0aSn=s900-c-k-c0x00ffffff-no-rj" alt="your avatar" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item"><?= $_SESSION['user']['name'] ?><br><?= $_SESSION['user']['email'] ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/catalog">Каталог</a></li>
                    <li><a class="dropdown-item" href="/order">Ваши заказы</a></li>

                    <?php
                    if($_SESSION['user']['role']=='admin'){
                        echo '<li><a class="dropdown-item" href="http://localhost:8888/Admin">Админка</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</header>