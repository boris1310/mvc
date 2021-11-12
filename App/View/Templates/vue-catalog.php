<div id="app">

        <header class="p-3 mb-3 border-bottom bg-white  border-bottom sticky-top">
            <div class="container container-sm container-md">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h3>ElectroStore</h3>
                    </a>

                    <ul class="nav col-12 col-lg-auto mx-5 me-lg-auto mb-2 justify-content-center mb-md-0">


                        <li><a href="/Catalog" class="nav-link px-2 link-dark">Каталог</a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#orders"  class="nav-link px-2 link-dark">Ваши заказы <span class="badge bg-danger">{{history}}</span></a></li>
                    </ul>

                    <ul class="translate mx-3">

                        <li class="mt-3 list">
                            <a onclick="doGTranslate('ru|en');">
                                <img    class="flag"
                                        src="https://www.megaflag.ru/sites/default/files/styles/h_100/public/images/shop/products/flag_velikobritanija_new.jpg?itok=WpoIClkv"
                                        alt="russian"
                                />
                            </a>
                            |
                            <a  onclick="doGTranslate('en|ru');">
                                <img    class="flag"
                                        src="https://www.megaflag.ru/sites/default/files/styles/h_100/public/images/shop/products/flag_rf_enl.jpg?itok=ULSeepRk"
                                        alt="russian"
                                />
                            </a>
                        </li>

                    </ul>

                    <!-- CartButton component -->
                    <cart-button :count="count"></cart-button>

                    <div v-if="UserId==null" class="mx-1">
                        <button type="button" class="btn btn-outline-success mr-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">Вход | Регистрация</button>
                    </div>

                    <div v-else class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://yt3.ggpht.com/ytc/AKedOLT7zW6EwRuZRD5dNs8CJCsxghs2rW8BspuQ0aSn=s900-c-k-c0x00ffffff-no-rj" alt="your avatar" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                            <li><a class="dropdown-item" :disabled="true">{{ UserName }}<br>{{ UserMail }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/catalog">Каталог</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orders">Ваши заказы</a></li>
                            <li><a class="dropdown-item" v-if="UserRole=='admin'" href="http://localhost:8888/Admin">Админка</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" @click="logout" href="#">Выход</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>




    <main>

        <!-- ProductsList component -->
        <div class="row mx-auto">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2">

                <catalog-sidebar
                    :categories="categories"
                    :manufacturers="manufacturers"
                />

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">

                <product-list :products="products" />

            </div>
        </div>
    </main>
    <div class="mx-auto mt-0 mb-3">

        <pagination-block :count = "countPages" />

    </div>
    <!-- CartModal component -->
    <cart-modal>
    </cart-modal>

    <sign-up>
    </sign-up>

    <!-- Orders -->
    <order-history />

</div>
