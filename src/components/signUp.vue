<template>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 v-if="action=='Entry'" class="modal-title" id="exampleModalLabel">Вход</h5>
          <h5 v-else class="modal-title" id="exampleModalLabel1">Регистрация</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div v-if="successAuth" class="modal-body">
          <div class="alert alert-success">Вы успешно вошли</div>
        </div>
        <div v-else class="modal-body">

          <div class="btn-group my-3 w-100" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" @click="entry" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-success" for="btnradio1">Вход</label>

            <input type="radio" class="btn-check" @click="register" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-success" for="btnradio3">Регистрация</label>
          </div>

          <form v-show="action=='Entry'">
            <div v-if="loginError" class="alert alert-danger w-100 mx-auto text-center">{{ loginError }}</div>
            <div class="mb-3">
              <label for="email1" class="col-form-label">Введите еmail</label>
              <input type="email" id="email1" class="form-control" v-model="email" placeholder="example@example.com" required>
            </div>
            <div class="mb-3">
              <label for="password1" class="col-form-label">Введите пароль</label>
              <input type="password" id="password1" class="form-control" v-model="password" placeholder="Пароль" required>
            </div>
          </form>

          <form v-show="action=='Register'">
            <div v-if="registerError" class="alert alert-danger w-100 mx-auto text-center">Произошла ошибка</div>
            <div class="mb-3">
              <label for="name" class="col-form-label">Введите имя</label>
              <input type="text" id="name" class="form-control" v-model="name" placeholder="Имя" required>
              <div class="text-danger my-1" v-if="!validName">Имя должно содержать 3-20 символов</div>
            </div>
            <div class="mb-3">
              <label for="emailReg" class="col-form-label">Введите еmail</label>
              <input type="email" id="emailReg" class="form-control" v-model="email" placeholder="example@example.com" required>
              <div class="text-danger my-1" v-if="!validEmail">Введите корректный Email</div>
            </div>
            <div class="mb-3">
              <label for="phone-mask" class="col-form-label">Введите номер телефона</label>
              <input type="phone" id="phone-mask" class="form-control" v-model="phone" placeholder="+380(xx)xxx-xx-xx" required>
              <div class="text-danger my-1" v-if="!validPhone">Введите корректный телефон</div>
            </div>
            <div class="mb-3">
              <label for="password" class="col-form-label">Введите пароль</label>
              <input type="password" id="password" class="form-control" v-model="password" placeholder="Пароль" required>
              <div class="text-danger my-1" v-if="!validPassword">Пароль должен содержать не менее 8 символов</div>
            </div>
            <div class="mb-3">
              <label for="password2" class="col-form-label">Повторите пароль</label>
              <input type="password" id="password2" class="form-control" v-model="password2" placeholder="Пароль" required>
              <div class="text-danger my-1" v-if="!validPassword2">Пароли не совпадают</div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button v-if="action=='Entry'" type="button" class="btn btn-success hide-btn" @click="signUp">
            <span v-if="successAuth">Закрыть</span>
            <span v-else>Войти</span>
          </button>
          <button v-else type="button" :disabled="!buttonSubmit" class="btn btn-success" @click="registerNewUser" data-bs-dismiss="modal">Зарегистрироваться</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"signUp",
  data:()=>({
    action:'Entry',
    name: '',
    email: '',
    phone: '',
    password: '',
    password2: '',
    validName:true,
    validEmail:true,
    validPhone:true,
    validPassword:true,
    validPassword2:true,
    registerError:false,
    loginError:null,
    successAuth:false,
    buttonSubmit: false,
  }),
  methods:{
    entry(){
      this.action='Entry';
    },
    register(){
      this.action='Register';
    },
    async signUp(){
      const response = await fetch('/User/signUp',{
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          email:this.email,
          password:this.password,
        }),
      });
      const data = await response.json();
      if (data.error) {
        this.loginError=data.error;
      }else{
        this.loginError=null;
        this.$root.UserId=data.id;
        this.$root.UserRole=data.role;
        this.$root.UserName=data.name;
        this.$root.UserMail=data.email;
        this.successAuth=true;
        $('.hide-btn').attr('data-bs-dismiss', 'modal');
      }
    },
    async registerNewUser(){
      const response = await fetch('/User/register',{
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          name:this.name,
          email:this.email,
          phone:this.phone,
          password:this.password,
        }),
      });
      const data = await response.json();
      if (Object.keys(data).length == 0) {
        this.registerError=true;
      }else{
        this.registerError=false;
        this.$root.UserId=data.id;
        this.$root.UserRole=data.role;
        this.$root.UserName=data.name;
        this.$root.UserMail=data.email;
      }

    },
  },
  watch:{
    name(newValue){
      this.validName = true;
      if(newValue.length<3){
        this.validName=false;
        this.buttonSubmit=false;
      }else if(newValue.length>10){
        this.validName=false;
        this.buttonSubmit=false;
      }else{
        this.validName=true;
        this.buttonSubmit=false;
      }
    },
    email(newValue){
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        this.validEmail = false;
        this.buttonSubmit=false;
      if(re.test(String(newValue).toLowerCase())){
        this.validEmail = true;
        this.buttonSubmit=false;
      }else{
        this.validEmail = false;
        this.buttonSubmit=false;
      }
    },
    phone(newValue){
      this.validPhone = true;
      this.buttonSubmit = false;
      const re = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
      if(re.test(String(newValue))){
        this.validPhone = true;
        this.buttonSubmit = false;
      }else{
        this.validPhone = false;
        this.buttonSubmit = false;
      }
    },
    password(newValue){
      this.validPassword = true;
      this.buttonSubmit=false;
      if(newValue.length<8){
        this.validPassword = false;
        this.buttonSubmit=false;
      }else{
        this.validPhone = true;
        this.buttonSubmit=false;
      }
    },
    password2(newValue){
      this.validPassword2 = true;
      this.buttonSubmit=false;
      if(newValue==this.password){
        this.validPassword2 = true;
        this.buttonSubmit=true;
      }else{
        this.validPassword2 = false;
        this.buttonSubmit=false;
      }
    }
  },



}
</script>

<style scoped>

</style>