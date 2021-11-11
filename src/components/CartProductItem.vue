<template>
    <tbody>
        <!-- cartProduct -->
        <ProductItem
            v-for="product in $root.cartProduct"
            :key="product"
            :idProduct="parseInt(product.idProduct)"
            :name="product.name"
            :price="parseInt(product.price)"
            :image="product.image"
            :count="parseInt(product.count)"
        />
    </tbody>
    <tfoot>
    <tr class="fw-bold px-4">
        <td class="text-end">
        Итого:
        </td>
        <td class="text-center">{{$root.count}}</td>
        <td class="text-end">{{$root.price}} грн</td>
    </tr>
    </tfoot>
    
</template>

<script>
import ProductItem from './ProductItem'

export default ({
    name: 'CartProductItem',
    components: { ProductItem },
})
</script>