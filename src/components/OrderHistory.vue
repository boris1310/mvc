<template>
  <div class="modal fade" id="orders" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">История заказов <span class="badge bg-danger">{{ orders.length }}</span> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div v-if="!$root.UserId" class="alert alert-primary text-center mx-auto py-3">
            <h4>Чтобы смотреть историю покупок - авторизируйтесь</h4>
          </div>
          <div v-else>
              <div class="card my-3 bg-success p-2 text-dark bg-opacity-25" v-for="order in orders">
                    <div v-if="getIdxs(order.Products)">
                    <h5 class="mx-auto my-3 text-center">Заказ №{{ order.idOrder }}</h5>
                      <table class="w-100 p-3 mx-auto table table-striped table-hover table-responsive-sm">
                        <thead>
                          <td colspan="3"><h6>Товары</h6></td>
                        </thead>
                        <tr class="bg-success text-light">
                          <td>
                          </td>
                          <td>
                            Наименование
                          </td>
                          <td>
                            Стоимость
                          </td>
                        </tr>
                      <order-products :products="getIdxs(order.Products)" />
                      </table>
            <div class="my-3 row">
                  <div class="col-sm-12 col-md-6 col-lg-6  p-3 d-flex">
                    <delivery-info :delivery="parseInt(order.addressId)" />
                  </div>

                  <div class="col-sm-12 col-md-6 col-lg-6  p-3 d-flex">
                    <div class="card w-100 p-3 bg-success p-2 text-dark bg-opacity-50">
                      <h6>Информация о доставке</h6>
                      <div class="my-3">
                        <p v-if="order.statusOrder == 'Добавлен'">Статус заказа: Выполняется</p>
                        <p v-else>Статус заказа: Доставлен</p>
                        <div v-if="order.statusPayment == 'Оплачен'">
                          <p >Статус оплаты: <span class="text-success"> {{ order.statusPayment }}</span></p>
                        </div>
                        <div v-else>
                          <p >Статус оплаты: <span class="text-danger"> {{ order.statusPayment }}</span></p>

                          <div class="alert alert-danger w-100 mx-auto">
                            Возникли проблемы с оплатой, мы свяжемся с Вами в ближайшее время и поможем решить эту проблему
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
                    </div>
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Скрыть</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import OrderProducts from './OrderProducts';
import DeliveryInfo from './DeliveryInfo';
export default {
  name:'OrderHistory',
  components:{ OrderProducts, DeliveryInfo },
  data:()=>({
    orders:[]
  }),
  methods:{
    async getHistoryByUserId(){
      const response = await fetch('/Order/getOrderForUser/'+this.$root.UserId);
      this.orders = await response.json();
      this.$root.history = this.orders.length;
    },
    getIdxs(Str){
      const regex = /\d\d/g;
      const result = Str.match(regex);
      return result;
    }
  },
  mounted(){
    setTimeout(i=>{
      this.getHistoryByUserId();
    },500);

  }

}
</script>

<style scoped>

</style>