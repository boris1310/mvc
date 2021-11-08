<template>
  <div class="card my-5 shadow p-3">
    <h5 class="text-center">Категории:</h5>
    <ul>
      <li class="list" v-for="category in categories"><a @click="changeSourceByCategory(category.idCategory)">{{category.cat_name}}</a><span class="badge bg-danger text-end float-end">{{ $root.countItemsCat[category.idCategory] }}</span></li>
    </ul>
    <h5 class="text-center">Производители:</h5>
    <ul>
      <li class="list" v-for="manufacturer in manufacturers"><a @click="changeSourceByManufacturer(manufacturer.idmanufacturer)">{{manufacturer.name}}</a><span class="badge bg-danger text-end float-end">{{ $root.countItemsMan[manufacturer.idmanufacturer] }}</span></li>
    </ul>
  </div>
</template>

<script>
import Pagination from "./Pagination";
export default ({
  name: 'Sidebar',
  props: {

    categories: Array,
    manufacturers: Array,

  },
  methods:{
    changeSourceByCategory(idCategory){

          this.$root.currentPage = '1';
          this.$root.source='http://localhost:8888/Catalog/getAll/cat_'+idCategory+'/?page=';
          this.$root.fetchProducts();
          this.$root.fetchPagination();
      },
    changeSourceByManufacturer(idmanufacturer){

          this.$root.currentPage = '1';
          this.$root.source='http://localhost:8888/Catalog/getAll/man_'+idmanufacturer+'/?page=';
          this.$root.fetchProducts();
          this.$root.fetchPagination();
    },

  },

})
</script>

<style scoped>
.list{
  list-style: none;
}
</style>