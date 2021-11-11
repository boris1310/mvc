<template>
  <div class="mx-auto text-center">
    <button  class="btn btn-outline-success mx-1" v-for="page in count" :value="page" :disabled="page==flag"  @click="changeSource(page)">
      <div v-if="flag==page" class="text-black">Текущая</div>
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