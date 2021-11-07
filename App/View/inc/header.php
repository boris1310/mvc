<nav class="navbar navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand mx-2" href="#">
            My Store
        </a>

        <nav class="nav nav-masthead justify-content-center __web-inspector-hide-shortcut__">
            <a class="nav-link text-dark active" href="http://localhost:8888/">Главная</a>
            <a class="nav-link text-dark" href="http://localhost:8888/Catalog">Каталог</a>

        </nav>

        <div class="navbar-nav">
            <a class="nav-link p-0" href="#">

                <!-- CartButton component -->
                <cart-button :count="count"></cart-button>

            </a>
        </div>
    </div>
</nav>