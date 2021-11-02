<script src="https://unpkg.com/imask"></script>

<div class="container alert alert-primary">
    <h5 class="my-3 text-center">Оформление заказа</h5>
    <?php

    if (!empty($data2[0]['name'])) {
        $name = $data2[0]['name'];
    } else {
        $name = '';
    }
    if (!empty($data2[0]['email'])) {
        $email = $data2[0]['email'];
    } else {
        $email = '';
    }

    if (!empty($data2[0]['phone'])) {
        $phone = $data2[0]['phone'];
    } else {
        $phone = '';
    }

    if (!empty($data3[0]['country'])) {
        $country = $data3[0]['country'];
    } else {
        $country = 'Выберите страну';
    }

    if (!empty($data3[0]['city'])) {
        $city = $data3[0]['city'];
    } else {
        $city = 'Выберите город';
    }

    if (!empty($data3[0]['street'])) {
        $street = $data3[0]['street'];
    } else {
        $street = '';
    }

    if (!empty($data3[0]['home'])) {
        $home = $data3[0]['home'];
    } else {
        $home = '';
    }

    if (!empty($data3[0]['flat'])) {
        $flat = $data3[0]['flat'];
    } else {
        $flat = '';
    }

    if (!empty($data3[0]['zip'])) {
        $zip = $data3[0]['zip'];
    } else {
        $zip = '';
    }


    ?>

    <form class="w-75 mx-auto" id="user-info" action="http://localhost:8888/Order/buy">
        <div class="my-3">
            <label for="name" class="my-1">Введите имя получателя:</label>
            <input type="Контактное лицо" class="form-control " id="name" name="name" placeholder="Иванов Иван"
                   value="<?= $name ?>">
            <div class="text-danger" id="error_name"></div>
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите email:</label>
            <input type="Контактное лицо" class="form-control " id="email" name="email"
                   value="<?= $email ?>"
                   placeholder="example@example.com">
            <div class="text-danger" id="error_email"></div>
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите номер телефона:</label>
            <input type="Контактное лицо" class="form-control " id="phone" name="phone"
                   value="<?= $phone ?>"
                   placeholder="+380-66-666-66-66">
            <div class="text-danger" id="phone_error"></div>
        </div>
        <div class="my-3">
            <h6 class="text-center mt-5 mb-3">Адресс доставки</h6>

            <div class="row">
                <div class="col-3 my-3">
                    <label for="country" class="my-1">Страна</label>
                    <select class="form-control" id="country" name="country">
                        <option value="<?= $country ?>"><?= $country ?></option>
                        <option value="Украина">Украина</option>
                        <option value="Россия">Россия</option>
                        <option value="Беларусь">Беларусь</option>
                    </select>
                </div>

                <div class="col-6 my-3">
                    <label for="cities" class="my-1">Город</label>
                    <select class="form-control" id="cities" name="city">
                        <option value="<?= $city ?>"><?= $city ?></option>
                    </select>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Индекс</label>
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="00000"
                           value="<?= $zip ?>"
                    >
                    <div class="text-danger" id="zip_error"></div>
                </div>

                <div class="col-6 my-3">
                    <label for="adres" class="my-1">Адрес</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="ул. Иванова"
                           value="<?= $street ?>">
                    <div id="adres_error" class="text-danger"></div>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Дом №</label>
                    <input type="text" class="form-control" name="home" id="home" placeholder="11" value="<?= $home ?>">
                    <div class="text-danger" id="home_error"></div>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Квартира</label>
                    <input type="text" class="form-control" name="home" id="flat" placeholder="11" value="<?= $flat ?>">
                    <div class="text-danger" id="flat_error"></div>
                </div>

                <div class="my-3 mx-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="save">
                    <label class="form-check-label" for="save">Сделать адрессом по умолчанию</label>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-success mx-auto col-12 my-5" id="success">Добавить адрес</button>
    </form>

</div>

<script>

    const inputName = document.getElementById('name');
    const nameError = document.getElementById('error_name');

    function validateName() {
        if (inputName.value == '') {
            inputName.classList.remove('is-valid');
            nameError.innerHTML = '';
            inputName.classList.add('is-invalid');
            nameError.innerHTML = 'Введите имя!';
            return false;
        } else if (inputName.value.length < 3 || inputName.value.length > 20) {
            inputName.classList.remove('is-invalid');
            nameError.innerHTML = '';
            inputName.classList.add('is-invalid');
            nameError.innerHTML = 'Имя должно содержать от 3 до 20 букв!';
            return false;
        } else {
            inputName.classList.remove('is-invalid');
            nameError.innerHTML = '';
            inputName.classList.add('is-valid');
            return true;
        }
    }

    inputName.onchange = () => {

        validateName();
    }

    function validateEmail() {
        let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let email = inputEmail.value;
        if (reg.test(email) == false) {
            inputEmail.classList.remove('is-valid');
            emailError.innerHTML = '';
            inputEmail.classList.add('is-invalid');
            emailError.innerHTML = 'Введите почту в формате example@test.com';
            return false;
        } else {
            inputEmail.classList.remove('is-invalid');
            emailError.innerHTML = '';
            inputEmail.classList.add('is-valid');
            return true;
        }
    }

    const inputEmail = document.getElementById('email');
    const emailError = document.getElementById('error_email');


    inputEmail.onchange = () => {
        validateEmail();
    }

    function validatePhone() {
        if (phone.value.length == 17) {
            phone.classList.remove('is-invalid');
            phoneError.innerHTML = '';
            phone.classList.add('is-valid');
            return true;
        } else {
            phone.classList.remove('is-valid');
            phoneError.innerHTML = '';
            phone.classList.add('is-invalid');
            phoneError.innerHTML = 'Введите коректный номер телефона';
            return false;
        }
    }

    var phone = document.getElementById('phone');
    var phoneError = document.getElementById('phone_error');

    new IMask(phone, {
        mask: '+{38}(060)000-00-00'
    });

    phone.onchange = () => {
        validatePhone();
    }

    var ukraineCities = [
        'Киев', 'Харьков', 'Одесса', 'Днепр', 'Донецк', 'Запорожье', 'Львов', 'Кривой Рог', 'Севастополь', 'Николаев', 'Мариуполь', 'Луганск', 'Винница', 'Симферополь', 'Макеевка', 'Чернигов', 'Херсон', 'Полтава', 'Хмельницкий', 'Черкассы', 'Черновцы', 'Житомир', 'Сумы', 'Ровно', 'Горловка', 'Ивано-Франковск', 'Каменское', 'Тернополь', 'Кропивницкий', 'Кременчуг', 'Луцк', 'Белая Церковь', 'Керчь', 'Мелитополь', 'Краматорск', 'Ужгород', 'Бровары', 'Евпатория', 'Бердянск', 'Никополь', 'Славянск', 'Алчевск', "Павлоград", 'Северодонецк'
    ];
    var russianCities = [
        'Москва', 'Санкт-Перербург', 'Новосибирск', 'Екатеринбург', 'Казань', 'Нижний Новгород', 'Челябинск'
    ];
    var belorussianCities = [
        'Минск', 'Брест', 'Гродно', 'Гомель', 'Витебск', 'Могилёв', 'Бобруйск'
    ];


    var countries = document.getElementById('country');
    var cities = document.getElementById('cities');

    const citiesMapper = () => {

        if (countries.value == 'Украина') {
            var CitiesArr = ukraineCities;
        } else if (countries.value == 'Россия') {
            var CitiesArr = russianCities;
        } else {
            var CitiesArr = belorussianCities;
        }
        for (let i = 0; i < CitiesArr.length; i++) {
            let option = document.createElement('option');
            option.innerHTML = CitiesArr[i];
            cities.appendChild(option);
        }
    }

    citiesMapper();

    countries.onchange = () => {
        cities.innerHTML = '';
        citiesMapper();
    }

    function validateZip() {
        if (zip.value.length !== 5) {
            zip.classList.remove('is-valid');
            zipError.innerHTML = '';
            zip.classList.add('is-invalid');
            zipError.innerHTML = 'Введите коректный почтовый индекс';
            return false;
        } else {
            zip.classList.remove('is-invalid');
            zipError.innerHTML = '';
            zip.classList.add('is-valid');
            return true;
        }
    }

    const zip = document.getElementById('zip');
    const zipError = document.getElementById('zip_error');

    new IMask(zip, {
        mask: '00000'
    });

    zip.onchange = () => {
        validateZip();
    }

    function validateAdres() {
        if (adres.value.length < 5) {
            adres.classList.remove('is-valid');
            adresError.innerHTML = '';
            adres.classList.add('is-invalid');
            adresError.innerHTML = 'Введите коректный адресс';
            return false;
        } else {
            adres.classList.remove('is-invalid');
            adresError.innerHTML = '';
            adres.classList.add('is-valid');
            return true;
        }
    }


    const adres = document.getElementById('adres');
    const adresError = document.getElementById('adres_error');

    adres.onchange = () => {
        validateAdres();
    }

    function validateHome() {
        if (home.value.length > 0 && home.value.length < 5) {
            home.classList.remove('is-invalid');
            homeError.innerHTML = '';
            home.classList.add('is-valid');
            return true;
        } else {
            home.classList.remove('is-valid');
            homeError.innerHTML = '';
            home.classList.add('is-invalid');
            homeError.innerHTML = 'Номер дома должен содержать 0-5 символов';
            return false;
        }
    }

    const home = document.getElementById('home');
    const homeError = document.getElementById('home_error');

    home.onchange = () => {
        validateHome();
    }

    function validateFlat() {
        if (flat.value.length > 0 && flat.value.length < 5) {
            flat.classList.remove('is-invalid');
            flatError.innerHTML = '';
            flat.classList.add('is-valid');
            return true;
        } else {
            flat.classList.remove('is-valid');
            flatError.innerHTML = '';
            flat.classList.add('is-invalid');
            flatError.innerHTML = 'Номер квартиры должен содержать 0-5 символов';
            return false;
        }
    }

    const flat = document.getElementById('flat');
    const flatError = document.getElementById('flat_error');

    flat.onchange = () => {
        validateFlat();
    }

    const saveCheckbox = document.getElementById('save');

    const saveNumber = async () => {
        const response = await fetch('http://localhost:8888/user/savePhone/' + phone.value);
        const data = await response.json();
        console.log(data);
    }

    const saveAdres = async () => {
        const response = await fetch('http://localhost:8888/user/saveAdres/?country=' + countries.value + '&city=' + cities.value + '&street=' + adres.value + '&home=' + home.value + '&flat=' + flat.value + '&zip=' + zip.value);
        const data = await response.json();
        console.log(data);
    }

    function saveAll(){
        validateName();
        validateEmail()
        validatePhone();
        validateAdres();
        validateHome();
        validateFlat();
        validateZip();
        if (validatePhone()) {
            saveNumber();
        }
        if (validateAdres() && validateHome() && validateFlat() && validateZip()) {
            saveAdres();



        }
    }

    const success = document.getElementById('success');



    saveCheckbox.onchange = () => {
       saveAll();

    }

    success.onclick=()=>{
        saveAll();
        document.location.replace("http://localhost:8888/Order/pay");
    }

//Форма оплаты
    // document.getElementById('user-info').innerHTML =
    //     '<div class="row w-50 mx-auto justify-content-between">'+
    //     '<div class="col-12 my-3">'+
    //     '<label class="text-black my-1" for="card">Номер карты</label>'+
    //     '<input class="form-control" type="text" placeholder="0000 0000 0000 0000" id="card"/>'+
    //     '</div>'+
    //     '<div class="col-4 my-3">'+
    //     '<label class="text-black my-1" for="period">Срок действия</label>'+
    //     '<input class="form-control" type="text" placeholder="00/00" id="period"/>'+
    //     '</div>'+
    //     '<div class="col-4 my-3">'+
    //     '<label class="text-black my-1" for="cvv">CVV</label>'+
    //     '<input class="form-control" type="text" placeholder="000" id="cvv"/>'+
    //     '</div>'+
    //     '<button class="my-5 w-50 btn btn-success mx-auto" type="button" id="btn-pay">Оплатить</button>'+
    //     '</div>';
    //


</script>