<template>

  <div class="btn-group my-3 w-100" role="group" aria-label="Basic radio toggle button group">
    <input :disabled="submitSuccess" type="radio" class="btn-check" @click="billingForm" name="btnradio" id="btnradio11" autocomplete="off" checked>
    <label class="btn btn-outline-success" for="btnradio11">Оформление заказа</label>
    <input :disabled="!submitSuccess" type="radio" class="btn-check" @click="pay" name="btnradio" id="btnradio33" autocomplete="off">
    <label class="btn btn-outline-success" for="btnradio33">Оплата</label>
  </div>

    <form @submit="onSubmit" v-show="action=='billingForm'" class="row g-3 mb-3" id="form">
        <h5>Оформление заказа</h5>
        <div class="col-md-6">
            <label for="firstName" class="form-label">Имя</label>
            <input type="text" v-model="firstName" v-on:change="validateFn" class="form-control" id="firstName" placeholder="Имя">
            <div v-if="validFn"></div>
            <div class="text-danger my-1" v-else>Имя должно содержать 3-20 символов</div>
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Фамилия</label>
            <input type="text" v-model="lastName" v-on:change="validateLn" class="form-control" id="lastName" placeholder="Фамилия">
          <div v-if="validLn"></div>
          <div class="text-danger my-1" v-else>Поле должно содержать 3-20 символов</div>
        </div>
        <div class="col-12">
            <label for="city" class="form-label">Город</label>
            <input type="text" v-model="city" v-on:change="validateCity" class="form-control" id="city" placeholder="Город">
          <div v-if="validCity"></div>
          <div class="text-danger my-1" v-else>Введите коректное название города</div>
        </div>
        <div class="col-12">
            <label for="address" class="form-label">Адрес</label>
            <input type="text" v-model="address" class="form-control" v-on:change="validateAdr"  id="address" placeholder="Адрес">
            <div v-if="validAdr"></div>
            <div class="text-danger my-1" v-else>Введите коректный адрес</div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" v-model="email" class="form-control" v-on:change="validateEmail" id="email" placeholder="Email">
            <div v-if="validEmail"></div>
            <div class="text-danger my-1" v-else>Введите корректный email</div>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Номер телефона</label>
            <input type="text" v-model="phone" class="form-control" id="phone" v-on:change="validatePhone" placeholder="+38(099) 999-99-99">
            <div v-if="validPhone"></div>
            <div class="text-danger my-1" v-else>Введите корректный телефон</div>
        </div>
      <div v-if="submitError" class="alert alert-danger w-100">Заполните все поля</div>
        <div class="col-12 d-flex justify-content-end">
            <button v-if="buttonSubmit" type="submit" class="btn btn-success">
            Оформить заказ
            </button>
          <button v-else type="submit" class="btn btn-success" disabled>
            Оформить заказ
          </button>
        </div>
        </form>

  <form @submit="onSubmitPay" v-show="action=='pay'" class="row g-3 mb-3" id="formPay">
    <h5>Оплата</h5>

    <div class="col-12">
      <label for="cart" class="form-label">Номер карты</label>
      <input type="text" v-model="cart"  class="form-control" id="cart" placeholder="0000 0000 0000 0000" required>
      <div v-if="validCart"></div>
      <div class="text-danger my-1" v-else>Введите коректные данные</div>
    </div>

    <div class="col-12">
      <label for="owner" class="form-label">Имя</label>
      <input type="text" v-model="owner"  class="form-control" id="owner" placeholder="ФИО" required>
      <div v-if="validFIO"></div>
      <div class="text-danger my-1" v-else>Введите коректные данные</div>
    </div>

    <div class="col-4 float-start">
      <label for="period" class="form-label">Срок действия</label>
      <input type="text" v-model="period"  class="form-control" id="period" placeholder="00/00" required>
      <div v-if="validPeriod"></div>
      <div class="text-danger my-1" v-else>Введите корректные данные</div>
    </div>
    <div class="col-4"></div>
    <div class="col-4 float-end">
      <label for="cvv" class="form-label">CVV</label>
      <input type="text" v-model="cvv"  class="form-control" id="cvv" placeholder="cvv" required>
      <div v-if="validCvv"></div>
      <div class="text-danger my-1" v-else>Введите коректные данные</div>
    </div>

    <div class="col-12 d-flex justify-content-end">

      <button v-if="buttonSubmit" type="submit" class="btn btn-success">
        Оплатить
      </button>

      <button v-else type="submit" class="btn btn-success" disabled>
        Оплатить
      </button>
    </div>
  </form>

</template>

<script>

export default ({
    name: 'CartBillingForm',
    data: () => ({
        cart:'',
        owner:'',
        cvv:'',
        period:'',
        firstName: '',
        lastName: '',
        city: '',
        address: '',
        email: '',
        phone: '',
        action:'billingForm',
        validCart:true,
        validFIO:true,
        validPeriod:true,
        validCvv:true,
        validFn: true,
        validLn: true,
        validCity: true,
        validAdr:true,
        validEmail: true,
        validPhone: true,
        submitError:false,
        submitSuccess:false,
        buttonSubmit: false,
    }),
    methods: {
       async onSubmit(e) {
         e.preventDefault()
          this.submitError = false;
          this.submitSuccess = false;
            if( this.phone && this.firstName && this.lastName && this.email && this.address && this.city){

              const response = await fetch('http://localhost:8888/Order/setBillingInfo',{
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  name: this.firstName+' '+this.lastName,
                  city: this.city,
                  address: this.address,
                  email: this.email,
                  phone: this.phone,
                }),
              });
              const data = await response.json();

              if(data.status == "success"){
                this.submitError = false;
                this.submitSuccess = true;
                this.action="pay"
              }

              console.log(data);
            }else{
              this.submitError = true;
              this.submitSuccess = false;
            }
        },
      billingForm(){
        this.action='billingForm';
      },
      pay(){
        this.action='pay';
      },
    },
  watch:{
      cart(newValue){
        this.validCart = true;
        if(newValue.length<19){
          this.validCart = false;
        }else{
          this.validCart = true;
        }
      },
      owner(newValue){
        this.validFIO = true;
        if(newValue.length<5 ){
          this.validFIO = false;
        }else{
          this.validFIO = true;
        }
      },
      period(newValue){
        this.validPeriod = true;
        if(newValue.length<4){
          this.validPeriod = false;
        }else{
          this.validPeriod = true;
        }
      },
      cvv(newValue){
        this.validCvv = true;
        if(newValue.length<2){
          this.validCvv = false;
        }else{
          this.validCvv = true;
        }
      },
    firstName(newValue){
      this.validFn = true;
      if(newValue.length<3){
        this.validFn=false;
        this.buttonSubmit=false;
      }else if(newValue.length>10){
        this.validFn=false;
        this.buttonSubmit=false;
      }else{
        this.buttonSubmit=true;
      }
    },
    lastName(newValue){
      this.validLn = true;
      if(newValue.length<3){
        this.validLn=false;
        this.buttonSubmit=false;
      }else if(newValue.length>10){
        this.validLn=false;
        this.buttonSubmit=false;
      }else{
        this.buttonSubmit=true;
      }
    },
    city(newValue){
      this.validCity= true;
      if(newValue.length < 3){
        this.validCity= false;
        this.buttonSubmit=false;
      }else if(newValue.length>20){
        this.validCity= false;
        this.buttonSubmit=false;
      }else{
        this.buttonSubmit=true;
      }
    },
    address(newValue){
      this.validAdr= true;
      this.buttonSubmit=false;
      if(newValue.length<5){
        this.validAdr= false;
        this.buttonSubmit=false;
      }else if(newValue.length>30){
        this.validAdr=false;
        this.buttonSubmit=false;
      }else{
        this.buttonSubmit=true;
      }
    },
    email(newValue){
      this.validEmail= true;
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      if(re.test(String(newValue).toLowerCase())){
        this.validEmail = true;
        this.buttonSubmit=true;
      }else{
        this.validEmail = false;
        this.buttonSubmit=false;
      }
    },
    phone(newValue){
      this.validPhone = true;
      this.buttonSubmit=false;
      const re = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
      if(re.test(String(newValue))){
        this.validPhone = true;
        this.buttonSubmit=true;
      }else{
        this.validPhone = false;
        this.buttonSubmit=false;
      }
    },

  }
})

</script>
