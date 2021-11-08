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
    flag:1,
  }),

  props:{
   count:Number,
  },

  methods:{

    changeSource(value){

        this.$root.currentPage = value;
        this.flag = this.$root.currentPage;
        this.$root.fetchProducts(this.$root.source);
    }
  },
}
</script>

<style scoped>

</style>