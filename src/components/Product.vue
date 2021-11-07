<template>
    <div class="col-3 py-3 d-flex">
        <div class="card py-3">
          <div style="height: 200px;">
        <img class="card-img-top" :src="photo" :alt="name">
          </div>
        <div class="card-body">
            <h6 class="card-title">
                {{ name }}
            </h6>
            <p class="card-subtitle mt-2 mb-3">
            Computer & Accessories
            </p>
            <h5 class="fs-5 text-success">
            {{price}} грн
            </h5>
            <p class="mt-3">
            Stock:
            <strong class="text-success">Available</strong>
            </p>
            <button @click="$root.addCart(id, name, photo, price)" class="btn btn-success w-100 shadow-none">
            Add to cart
            </button>
        </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Product',
    props: {
        id: String,
        name: String,
        photo: String,
        price: String,
    }
}

</script>