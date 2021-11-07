<template>
  <div class="mx-auto text-center">
    <button  class="btn btn-outline-success mx-1" :value="page" v-for="page in count" @click="changeSource(page)">
      <div v-if="flag==page">Текущая</div>
      <div v-else>{{page}}</div>
    </button>
  </div>
</template>

<script>
export default {
  name:'Pagination',
  data:()=>({
    count:0,
    flag:1,
  }),

  methods:{
    async fetchPagination(){
      const response = await fetch('http://localhost:8888/Catalog/getPagination/');
      this.count = await response.json();
      if(this.count%8==0){
        this.count = this.count/8;
      }else{
        this.count = this.count%8;
      }
    },
    changeSource(value){
        this.$root.currentPage = value;
        this.flag = this.$root.currentPage;
        this.$root.fetchProducts(this.$root.source);
    }
  },

  mounted() {
    this.fetchPagination()
  }
}
</script>

<style scoped>

</style>