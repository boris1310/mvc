<template>
  <tr class="bg-light" v-for="item in items">
    <td><img :src="item.photo" width="100" :alt="item.name"></td>
    <td>{{ item.name }}</td>
    <td>{{ item.price }} грн.</td>
  </tr>
    <tr class="bg-success text-light">
      <td></td>
      <td>Количество</td>
      <td>Cумма</td>
    </tr>
  <tr >
    <td>Итого:</td>
    <td>{{ totalCount }} ед.</td>
    <td>{{ totalPrice }} грн.</td>
  </tr>


</template>

<script>
export default {
  name:'OrderProducts',
  props:{
    products:Array,
  },
  data:()=>({
    items:[],
    totalPrice:0,
    totalCount:0,
  }),
  methods:{
     fetchProductByIdxs(){
       if(this.products){
         this.products.map(async i=>{
           const response = await fetch('/Order/getProductsById/'+parseInt(i));
           const item = await response.json();
           item.map(product=>{
             this.items.push(item[0]);
             this.totalPrice += parseInt(item[0]['price']);
             this.totalCount++;
           });
         });
       }else{

       }

    }
  },
  mounted(){
    this.fetchProductByIdxs();
  }

}
</script>

<style scoped>

</style>