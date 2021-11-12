<template>
  <div class="modal fade" :id="'selector'+id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
       aria-labelledby="cartModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalTitle">
            {{ product.name }}
          </h5>
          <button type="button"  class="btn-close shadow-none" data-bs-dismiss="modal"  aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <img :src="product.photo" class="w-100" :alt="product.name">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-start">
              <h5 class="mt-1 mb-3">{{ product.name }}</h5>
              <div class="my-1">
              <h6>Описание:</h6>
              <p>{{ product.description }}</p>
              </div>

              <ul class="my-1">
                <li class="fs-6 my-1">Категория: {{ catName }}</li>
                <li class="fs-6 my-1">Производитель: {{ manName }}</li>
              </ul>

              <h6 class="mt-5">
                Стоимость:
                <span class="fs-3 text-success">{{ product.price }} грн.</span>
              </h6>



            </div>
            <div class="modal-footer text-end ">
                <button  class="btn btn-success" @click="addCart(product.idProduct,product.name,product.photo,product.price)" data-bs-dismiss="modal" v-if="!isCartProduct && flag">В корзину</button>
                <button disabled class="btn btn-danger" v-else>Уже в корзине</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:'SingleProduct',
  data:()=>({
    product:{},
    catName:'',
    manName:'',
    flag:true,
  }),
  props:{
    id:String,
    isCartProduct:Boolean
  },
  methods:{
    async fetchProduct(){
      const response = await fetch('/catalog/getProductById/'+this.id);
      this.product = await response.json();
      await this.getCategory();
      await this.getManufacturer();
    },
    getCategory(){
      this.$root.categories.map(i=>{
         if(this.product.CategoryId == i.idCategory){
           this.catName=i.cat_name;
         }
      });
    },
    getManufacturer(){
      this.$root.manufacturers.map(i=>{
        if(this.product.ManufacturerId == i.idmanufacturer){
          this.manName=i.name;
        }
      });
    },
    addCart(idProduct,name,photo,price){
      this.$root.addCart( idProduct, name, photo, price);
      this.flag = false;
    }
  },
  mounted(){
    this.fetchProduct();
  }
}
</script>

<style scoped>
ul{
  list-style: none;
}

.description{
  height:200px;
}

</style>