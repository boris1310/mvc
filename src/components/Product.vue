<template>
    <div class="col-3 py-3 d-flex">
        <div class="card py-3">
          <div style="height: 200px;">
        <img class="card-img-top" :src="photo" :alt="name">
          </div>
        <div class="card-body">
            <h6 class="card-title">
                {{ name }}
            </h6>
            <div class="my-3" v-for="category in $root.categories">
              <div v-if="category.idCategory==CategoryId">Категория: {{ category.cat_name }}</div>
            </div>
            <div class="my-3" v-for="manufacturer in $root.manufacturers">
              <div v-if="manufacturer.idmanufacturer==ManufacturerId">Производитель: {{ manufacturer.name }}</div>
            </div>

            <h5 class="fs-5 text-success">
            {{price}} грн
            </h5>


            <button @click="addCart(idProduct,name,photo,price)" :disabled="flag" class="btn btn-success w-100 shadow-none">
              <span v-if="flag">Уже в корзине</span>
              <span v-else>В корзину</span>
            </button>
        </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Product',
    data:()=>({
      flag:false
    }),
    props: {
        idProduct: String,
        name: String,
        photo: String,
        CategoryId:String,
        ManufacturerId:String,
        price: String,
    },
    methods:{
      checkInCart(){
        this.$root.cartProduct.map(i=> {
            if(this.idProduct==i.idProduct){
              this.flag = true;
            }
        });
      },
      addCart(idProduct,name,photo,price){
        this.$root.addCart( idProduct, name, photo, price);
        this.flag = true;
      }
    },
  mounted(){
    this.checkInCart();
  }

}


</script>