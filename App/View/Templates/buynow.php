
<script src="https://unpkg.com/imask"></script>
<div class="container alert alert-primary">
    <h5 class="my-3 text-center">Оформление заказа</h5>

    <form class="w-75 mx-auto" action="http://localhost:8888/Order/buy">
        <div class="my-3">
            <label for="name" class="my-1">Введите имя получателя:</label>
            <input type="Контактное лицо" class="form-control " id="name" name="name" placeholder="Иванов Иван">
            <div class="text-danger" id="error_name"></div>
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите email:</label>
            <input type="Контактное лицо" class="form-control " id="email" name="email" placeholder="example@example.com">
            <div class="text-danger" id="error_email"></div>
        </div>
        <div class="my-3">
            <label for="name" class="my-1">Введите номер телефона:</label>
            <input type="Контактное лицо" class="form-control " id="phone" name="phone"
                   placeholder="+380-66-666-66-66">
            <div class="text-danger" id="phone_error"></div>
        </div>
        <div class="my-3">
           <h6 class="text-center mt-5 mb-3">Адресс доставки</h6>
            
            <div class="row">
                <div class="col-3 my-3">
                <label for="country" class="my-1">Страна</label>
                    <select class="form-control" id="country" name="country">
                        <option value="Украина">Украина</option>
                        <option value="Россия">Россия</option>
                        <option value="Беларусь">Беларусь</option>
                    </select>
                </div>

                <div class="col-6 my-3">
                    <label for="cities" class="my-1">Город</label>
                    <select class="form-control" id="cities" name="city">

                    </select>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Индекс</label>
                    <input type="text" class="form-control" name="zip" id="zip" placeholder="00000">
                    <div class="text-danger" id="zip_error"></div>
                </div>

                <div class="col-6 my-3">
                    <label for="adres" class="my-1">Адрес</label>
                    <input type="text" class="form-control" name="adres" id="adres" placeholder="ул. Иванова">
                    <div id="adres_error" class="text-danger"></div>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Дом №</label>
                    <input type="text" class="form-control" name="home" id="home" placeholder="11">
                    <div class="text-danger" id="home_error"></div>
                </div>

                <div class="col-3 my-3">
                    <label for="home" class="my-1">Квартира</label>
                    <input type="text" class="form-control" name="home" id="flat" placeholder="11">
                    <div class="text-danger" id="flat_error"></div>
                </div>

                <div class="my-3 mx-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Сделать адрессом по умолчанию</label>
                </div>
            </div>
            
        </div>
    </form>

</div>

<script>

    const inputName = document.getElementById('name');
    const nameError = document.getElementById('error_name');

    inputName.onchange=()=>{
      if(inputName.value == ''){
          inputName.classList.remove('is-valid');
          nameError.innerHTML = '';
          inputName.classList.add('is-invalid');
          nameError.innerHTML = 'Введите имя!';
      }else if(inputName.value.length<3 || inputName.value.length>20){
          inputName.classList.remove('is-invalid');
          nameError.innerHTML = '';
          inputName.classList.add('is-invalid');
          nameError.innerHTML = 'Имя должно содержать от 3 до 20 букв!';
      }else{
          inputName.classList.remove('is-invalid');
          nameError.innerHTML = '';
          inputName.classList.add('is-valid');
      }
    }

    const inputEmail = document.getElementById('email');
    const emailError = document.getElementById('error_email');


    inputEmail.onchange=()=>{
        let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let email = inputEmail.value;
        if(reg.test(email) == false) {
            inputEmail.classList.remove('is-valid');
            emailError.innerHTML = '';
            inputEmail.classList.add('is-invalid');
            emailError.innerHTML = 'Введите почту в формате example@test.com';
        }else{
            inputEmail.classList.remove('is-invalid');
            emailError.innerHTML = '';
            inputEmail.classList.add('is-valid');
        }
    }


        var phone = document.getElementById('phone');
        var phoneError = document.getElementById('phone_error');
        new IMask(phone, {
            mask: '+{38}(060)000-00-00'
        });
    phone.onchange=()=>{
        if(phone.value.length==17){
            phone.classList.remove('is-invalid');
            phoneError.innerHTML = '';
            phone.classList.add('is-valid');
        }else{
            phone.classList.remove('is-valid');
            phoneError.innerHTML = '';
            phone.classList.add('is-invalid');
            phoneError.innerHTML = 'Введите коректный номер телефона';
        }
    }

    var ukraineCities = [
        'Киев','Харьков','Одесса','Днепр','Донецк','Запорожье','Львов','Кривой Рог','Севастополь','Николаев','Мариуполь','Луганск','Винница','Симферополь' ,'Макеевка','Чернигов','Херсон','Полтава','Хмельницкий','Черкассы','Черновцы','Житомир','Сумы','Ровно','Горловка','Ивано-Франковск','Каменское','Тернополь','Кропивницкий','Кременчуг','Луцк','Белая Церковь','Керчь','Мелитополь','Краматорск','Ужгород','Бровары','Евпатория','Бердянск','Никополь','Славянск','Алчевск',"Павлоград",'Северодонецк'
    ];
    var russianCities = [
        'Москва','Санкт-Перербург','Новосибирск','Екатеринбург','Казань','Нижний Новгород','Челябинск'
    ];
    var belorussianCities = [
        'Минск','Брест','Гродно','Гомель','Витебск','Могилёв','Бобруйск'
    ];


    var countries = document.getElementById('country');
    var cities = document.getElementById('cities');

    const citiesMapper = () =>{

        if(countries.value == 'Украина'){
            var CitiesArr = ukraineCities;
        }else if(countries.value == 'Россия'){
            var CitiesArr = russianCities;
        }else{
            var CitiesArr = belorussianCities;
        }
        for(let i=0;i<CitiesArr.length;i++){
            let option = document.createElement('option');
            option.innerHTML = CitiesArr[i];
            cities.appendChild(option);
        }
    }

    citiesMapper();

    countries.onchange=()=>{
        cities.innerHTML='';
        citiesMapper();
    }

    const zip = document.getElementById('zip');
    const zipError = document.getElementById('zip_error');

    zip.onchange=()=>{
        if(zip.value.length!==5){
            zip.classList.remove('is-valid');
            zipError.innerHTML = '';
            zip.classList.add('is-invalid');
            zipError.innerHTML = 'Введите коректный почтовый индекс';
        }else{
            zip.classList.remove('is-invalid');
            zipError.innerHTML = '';
            zip.classList.add('is-valid');
        }
    }

    const adres = document.getElementById('adres');
    const adresError = document.getElementById('adres_error');

    adres.onchange=()=>{
        if(adres.value.length<5){
            adres.classList.remove('is-valid');
            adresError.innerHTML = '';
            adres.classList.add('is-invalid');
            adresError.innerHTML = 'Введите коректный адресс';
        }else{
            adres.classList.remove('is-invalid');
            adresError.innerHTML = '';
            adres.classList.add('is-valid');
        }
    }

    const home = document.getElementById('home');
    const homeError = document.getElementById('home_error');

    home.onchange=()=>{
        if(home.value.length>0 && home.value.length<5){
            home.classList.remove('is-invalid');
            homeError.innerHTML = '';
            home.classList.add('is-valid');
        }else{
            home.classList.remove('is-valid');
            homeError.innerHTML = '';
            home.classList.add('is-invalid');
            homeError.innerHTML = 'Номер дома должен содержать 0-5 символов';
        }
    }

    const flat = document.getElementById('flat');
    const flatError = document.getElementById('flat_error');

    flat.onchange=()=>{
        if(flat.value.length>0 && flat.value.length<5){
            flat.classList.remove('is-invalid');
            flatError.innerHTML = '';
            flat.classList.add('is-valid');
        }else{
            flat.classList.remove('is-valid');
            flatError.innerHTML = '';
            flat.classList.add('is-invalid');
            flatError.innerHTML = 'Номер квартиры должен содержать 0-5 символов';
        }
    }


</script>