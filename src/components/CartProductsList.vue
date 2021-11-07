<template>
    <table class="table cart-table">
        <thead>
            <tr>
            <th scope="col">Наименование</th>
            <th scope="col" class="text-center">Количество</th>
            <th scope="col" class="text-center">Цена</th>
            <th scope="col"></th>
            </tr>
        </thead>

        <CartProductItem />
        
    
    </table>
</template>

<script>
    import CartProductItem from './CartProductItem'

    export default ({
        name: 'CartProductsList',
        components: { CartProductItem },
    })
</script>