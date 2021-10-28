<div class="container alert alert-primary">
    <h5 class="my-3 text-center">Оформление заказа</h5>

    <form class="w-75 mx-auto" action="http://localhost:8888/Order/buy">
        <div class="my-3">
            <label for="name" class="my-1">Введите имя получателя:</label>
            <input type="Контактное лицо" class="form-control " id="name" name="name" placeholder="Иванов Иван">
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите email:</label>
            <input type="Контактное лицо" class="form-control " id="name" name="name" placeholder="example@example.com">
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите номер телефона:</label>
            <input type="Контактное лицо" class="form-control " id="name" name="name"
                   placeholder="+380-66-666-66-66">
        </div>
        <div class="my-3">
           <h6 class="text-center mt-5 mb-3">Адресс доставки</h6>
            
            <div class="row">
                <div class="col-3 my-3">
                <label for="country" class="my-1">Страна</label>
                    <select class="form-control" name="country">
                        <option value="Украина">Украина</option>
                        <option value="Россия">Россия</option>
                        <option value="Беларусь">Беларусь</option>
                    </select>
                </div>

                <div class="col-6 my-3">
                    <label for="country" class="my-1">Город</label>
                    <select class="form-control" name="country">
                        <option value="">Города будут из массива</option>
                    </select>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Индекс</label>
                    <input type="text" class="form-control" name="home" id="home" placeholder="11">
                </div>

                <div class="col-6 my-3">
                    <label for="adres" class="my-1">Адрес</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="ул. Иванова">
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Дом №</label>
                    <input type="text" class="form-control" name="home" id="home" placeholder="11">
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Квартира</label>
                    <input type="text" class="form-control" name="home" id="home" placeholder="11">
                </div>

                <div class="my-3 mx-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Сделать адрессом по умолчанию</label>
                </div>
            </div>
            
        </div>
    </form>

</div>