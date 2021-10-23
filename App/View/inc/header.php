<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="../../../public/img/logo.png" width="100px" height="auto" alt="">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
            <li><a href="../../../catalog" class="nav-link px-2 link-dark">Каталог</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">О Нас</a></li>
        </ul>
        <div class="d-flex align-items-center">
            <form class="w-100 me-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>



            <button type="button" class="showBasket btn btn-primary me-4 position-relative">
                <img src="http://localhost:8888/public/img/basket-btn.png" alt="basket" />
                <span  class="basket-length position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                <span class="visually-hidden">unread messages</span>
                </span>
            </button>

            <div class="col-md-3 text-end">
                <?php
                if (!empty($_SESSION['name'])) {


                    echo '<div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
            <li><a class="dropdown-item" href="#">' . $_SESSION['name'] . '</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Заказы</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a  class="dropdown-item position-relative showBasket">
                Корзина
                <span class="basket-length position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                <span class="visually-hidden">unread messages</span>
                </span>
            </a></li>
            <li><hr class="dropdown-divider"></li>';

                    if(!empty($_SESSION['role'] AND $_SESSION['role']==='admin')){
                        echo '<li><a class="dropdown-item" href="http://localhost:8888/admin">Админка</a></li>';
                    }

                    echo '<li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://localhost:8888/user/logout">Выйти</a></li>
          </ul>
        </div>
      </div>';
                } else {
                    if ($_GET['url'] == 'User/login') {
                        echo '<a href="http://localhost:8888/User/register"><button type="button"  class="btn btn-primary">Регистрация</button></a>';
                    } else {
                        echo '<a href="http://localhost:8888/User/login"><button type="button"  class="btn btn-primary">Вход</button></a>';
                    }
                }
                ?>
            </div>
    </header>

    <div class="modal fade show" style="display: none;" id="basket-modal" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Ваша корзина</h5>
                    <button type="button" class="btn-close closeBasket" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary closeBasket" data-bs-dismiss="modal">Скрыть</button>

                </div>
            </div>
        </div>
    </div>

</div>