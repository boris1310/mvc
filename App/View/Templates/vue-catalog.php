<div id="app">

        <header class="p-3 mb-3 border-bottom bg-white  border-bottom sticky-top">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h3>My Store</h3>
                    </a>

                    <ul class="nav col-12 col-lg-auto mx-5 me-lg-auto mb-2 justify-content-center mb-md-0">

                        <li><a href="/" class="nav-link px-2 link-dark">Главная</a></li>
                        <li><a href="/Catalog" class="nav-link px-2 link-dark">Каталог</a></li>
                        <li><a href="/Orders" class="nav-link px-2 link-dark">Ваши заказы</a></li>
                    </ul>

                    <!-- CartButton component -->
                    <cart-button :count="count"></cart-button>

                    <div  class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                            <li><a class="dropdown-item" href="#">Главная</a></li>
                            <li><a class="dropdown-item" href="#">Каталог</a></li>
                            <li><a class="dropdown-item" href="http://localhost:8888/Admin">Админка</a></li>
                            <li><a class="dropdown-item" href="#">Ваши заказы</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Выход</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>




    <main>

        <!-- ProductsList component -->
        <div class="row mx-auto">
            <div class="col-2">

                <catalog-sidebar
                    :categories="categories"
                    :manufacturers="manufacturers"
                />

            </div>
            <div class="col-10">

                <product-list :products="products" />

            </div>
        </div>
    </main>
    <div class="mx-auto mt-0 mb-3">
        <pagination-block
                :count = "countPages"
        />
    </div>
    <!-- CartModal component -->
    <cart-modal>
    </cart-modal>
</div>