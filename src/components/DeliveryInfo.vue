<template>
  <div class="card w-100 p-3 bg-success p-2 text-dark bg-opacity-50">
    <h6>Информация о доставке</h6>
    <div class="my-3">
    <p>Имя получателя: {{ receiverName }}</p>
    <p>Город получателя: {{ receiverCity }}</p>
    <p>Адрес доставки: {{ receiverAddress }}</p>
    <p>Email получателя: {{ receiverEmail }}</p>
    <p>Телефон получателя: {{ receiverPhone }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name:'DeliveryInfo',
  data:()=>({
    receiverName:'',
    receiverCity:'',
    receiverAddress:'',
    receiverEmail:'',
    receiverPhone:'',
  }),
  props:{
    delivery:Number,
  },
  methods:{
      async getDeliveryInfoById(){
        const response = await fetch('/admin/getAddressById/'+this.delivery);
        const data = await response.json();
        this.receiverName = data.userName;
        this.receiverCity = data.city;
        this.receiverAddress = data.address;
        this.receiverEmail = data.email;
        this.receiverPhone = data.phone;
      }
  },
  mounted(){
      this.getDeliveryInfoById();
  }
}
</script>

<style scoped>

</style>