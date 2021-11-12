<template>
    <div class="container-fluid">
      <div class="card my-5 shadow">
        <div class="card-body">
          <div class="row">

            <div v-if="!products.length">
              <div class="p-3 mx-auto alert alert-primary text-center">В этой категории пока нет товаров</div>
            </div>

            <product v-else

                v-for="product in products"
                :key="product"
                :idProduct="product.idProduct"
                :CategoryId="product.CategoryId"
                :ManufacturerId="product.ManufacturerId"
                :name="product.name"
                :price="product.price"
                :photo="product.photo"

            />


          </div>
        </div>
      </div>
    </div>
</template>

<script>

import Product from './Product'

export default {
    name: 'ProductList',
    components: { Product },
    props: {
      products: Array,
    }
}

</script>