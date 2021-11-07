<template>
    <form @submit="onSubmit" class="row g-3 mb-3" id="form">
        <h5>Billing details</h5>
        <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" v-model="firstName" v-on:change="validateFn" class="form-control" id="firstName" placeholder="First Name">
            <div v-if="validFn"></div>
            <div class="text-danger my-1" v-else>Имя должно содержать 3-20 символов</div>
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" v-model="lastName" v-on:change="validateLn" class="form-control" id="lastName" placeholder="Last Name">
          <div v-if="validLn"></div>
          <div class="text-danger my-1" v-else>Поле должно содержать 3-20 символов</div>
        </div>
        <div class="col-12">
            <label for="city" class="form-label">City</label>
            <input type="text" v-model="city" v-on:change="validateCity" class="form-control" id="city" placeholder="City">
          <div v-if="validCity"></div>
          <div class="text-danger my-1" v-else>Введите коректное название города</div>
        </div>
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" v-model="address" class="form-control" v-on:change="validateAdr"  id="address" placeholder="Address">
            <div v-if="validAdr"></div>
            <div class="text-danger my-1" v-else>Введите коректный адрес</div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" v-model="email" class="form-control" v-on:change="validateEmail" id="email" placeholder="Email Address">
            <div v-if="validEmail"></div>
            <div class="text-danger my-1" v-else>Введите корректный email</div>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" v-model="phone" class="form-control" id="phone" v-on:change="validatePhone" placeholder="+38(099) 999-99-99">
            <div v-if="validPhone"></div>
            <div class="text-danger my-1" v-else>Введите корректный телефон</div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button v-if="buttonSubmit" type="submit" class="btn btn-success">
            Place Order
            </button>
          <button v-else type="submit" class="btn btn-success" disabled>
            Place Order
          </button>
        </div>
        </form>
</template>

<script>

export default ({
    name: 'CartBillingForm',
    data: () => ({
        firstName: '',
        lastName: '',
        city: '',
        address: '',
        email: '',
        phone: '',
        validFn: true,
        validLn: true,
        validCity: true,
        validAdr:true,
        validEmail: true,
        validPhone: true,
        buttonSubmit: false,
    }),
    methods: {
        onSubmit(e) {
            e.preventDefault()
            console.log('firstName: '+this.firstName)
            console.log('lastName: '+this.lastName)
            console.log('city: '+this.city)
            console.log('address: '+this.address)
            console.log('email: '+this.email)
            console.log('phone: '+this.phone)
            form.reset()
        }
    },
  watch:{
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
