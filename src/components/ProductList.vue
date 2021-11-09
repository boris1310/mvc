<template>
    <div class="container">
      <div class="card my-5 shadow">
        <div class="card-body">
          <div class="row">

            <product

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