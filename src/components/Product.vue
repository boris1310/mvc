<template>
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3 py-3 d-flex">
        <div class="card py-3">
          <div  class="h-50 p-1" data-bs-toggle="modal" :data-bs-target="'#selector'+idProduct">
        <img class="card-img-top" :src="photo" :alt="name">
          </div>
        <div class="card-body">
          <div  data-bs-toggle="modal" :data-bs-target="'#selector'+idProduct">
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
            </div>
            <button @click="addCart(idProduct,name,photo,price)" :disabled="flag" class="btn btn-success buy w-100 shadow-none">
              <span v-if="flag">Уже в корзине</span>
              <span v-else>В корзину</span>
            </button>

        </div>
        </div>
    </div>

  <single-product
      :id="idProduct"
      :isCartProduct="flag"
  />

</template>

<script>
import SingleProduct from './SingleProduct';
export default {
    name: 'Product',
    data:()=>({
      flag:false
    }),
    components:{ SingleProduct },
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

<style scoped>
.card{
  padding: 8px;
}
.card:hover{
    padding: 6px;
    background: #f1f1f1;
}



</style>