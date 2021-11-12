<template>
  <div class="mt-5 shadow bg-light py-3 row mx-0">
    <div class="col-lg-12 col-md-6 col-6 mx-0">
      <h5 class="text-center">Категории:</h5>
      <ul>
        <li class="list" v-for="category in categories"><a @click="changeSourceByCategory(category.idCategory)">{{category.cat_name}} <span class="badge bg-danger text-end float-end">{{ $root.countItemsCat[category.idCategory] }}</span></a></li>
      </ul>
    </div>
    <div class="col-lg-12 col-md-6 col-6 mx-0">
      <h5 class="text-center">Производители:</h5>
      <ul>
        <li class="list" v-for="manufacturer in manufacturers"><a @click="changeSourceByManufacturer(manufacturer.idmanufacturer)">{{manufacturer.name}} <span class="badge bg-danger text-end float-end">{{ $root.countItemsMan[manufacturer.idmanufacturer] }}</span></a></li>
      </ul>
    </div>
  </div>
</template>

<script>

export default ({
  name: 'Sidebar',
  props: {

    categories: Array,
    manufacturers: Array,

  },
  methods:{
    changeSourceByCategory(idCategory){

          this.$root.currentPage = '1';
          this.$root.source='/Catalog/getAll/cat_'+idCategory+'/?page=';
          this.$root.fetchProducts();
          this.$root.fetchPagination();
      },
    changeSourceByManufacturer(idmanufacturer){

          this.$root.currentPage = '1';
          this.$root.source='/Catalog/getAll/man_'+idmanufacturer+'/?page=';
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

.list:hover{
  color:forestgreen;
  padding: 1px;
}


</style>