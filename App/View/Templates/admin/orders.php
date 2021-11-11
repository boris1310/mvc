
<h5 class="text-center mt-5 mb-3 mx-auto">Текущие заказы</h5>

<table class="table table-striped table-hover table-bordered border-dark">
    <tr class="bg-primary text-light">
        <td>№</td>
        <td>Пользователь №</td>
        <td>Индексы товаров</td>
        <td>Индекс адресса</td>
        <td>Cтатус заказа</td>
        <td>Cтатус оплаты</td>
        <td>Дата заказа</td>
    </tr>
    <?php
    foreach ($data as $order){
        if($order['statusPayment']=="Ждет оплаты"){
            echo '<tr class="bg-danger bg-gradient" onclick="showInfo('.$order['idOrder'].')" data-bs-toggle="modal" data-bs-target="#exampleModal">';
        }else{
            echo '<tr onclick="showInfo('.$order['idOrder'].')" data-bs-toggle="modal" data-bs-target="#exampleModal">';
        }
        echo '<td>'.$order['idOrder'].'</td>';
        echo '<td>'.$order['userId'].'</td>';
        echo '<td>'.preg_replace('/"/','',trim(trim($order['Products'],']'),'[')).'</td>';
        echo '<td>'.$order['addressId'].'</td>';
        echo '<td>'.$order['statusOrder'].'</td>';
        echo '<td>'.$order['statusPayment'].'</td>';
        echo '<td>'.$order['created_at'].'</td>';
        echo '</tr>';
    }
    ?>
</table>

<div class="mx-auto w-75 text-center">
    <div class="row" id="pages">

    </div>
</div>

<script>

    async function getPagination(){
        const response = await fetch('/admin/getOrderPagination');
        const pag = await response.json();
        if(pag%20){
            var count=Math.ceil(pag/20);
        }else{
            var count=pag/20;
        }

        const currentUrl = document.location.pathname;
        var currentPage = currentUrl.replace('/admin/orders/', '');

        if(!currentPage){
            currentPage = 1;
        }

        for (let i=1;i<=count;i++){
            let pagination = document.createElement('div');
            pagination.classList.add('col-1');
            if(currentPage==i){
                pagination.innerHTML = '<a class="btn btn-primary text-center py-1 px-3" href="/admin/orders/'+i+'">'+i+'</a>';
            }else{
                pagination.innerHTML = '<a class="btn btn-outline-primary text-center py-1 px-3" href="/admin/orders/'+i+'">'+i+'</a>';
            }

            document.getElementById('pages').append(pagination);
        }

    }


    getPagination();
</script>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title orderId" id="exampleModalLabel">Подробная информация</h5>
                <button type="button" class="btn-close" onclick="clearShowed()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row p-3">
                <div class="col-md-6 col-lg-6 col-12 p-3">
                    <div class="alert alert-primary">
                        <h6>Информация о заказе:</h6>
                        <div id="idOrder"></div>
                        <div id="statusOrder"></div>
                        <div id="statusPayment"></div>
                        <div id="created_at"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-12 p-3">
                    <div class="alert alert-primary">
                        <h6>Информация о заказе:</h6>
                        <div id="idUser"></div>
                        <div id="name"></div>
                        <div id="email"></div>
                        <div id="phone"></div>
                        <div id="register_at"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-12 p-3">
                    <div class="alert alert-primary">
                    <h6>Информация о товарах:</h6>
                    <table class="table table-hover bg-light table-bordered table-striped" id="productTable">
                        <tr class="bg-success">
                        <td>№</td>
                        <td>Фото</td>
                        <td>Наименование</td>
                        <td>Стоимость</td>
                        <td>Дата добавления</td>
                        </tr>
                    </table>

                    <table class="w-100 table table-hover table-striped table-bordered text-light bg-primary">
                        <tr>
                            <td></td>
                            <td class="text-light">Количество</td>
                            <td class="text-light">Сумма</td>
                        </tr>
                        <tr>
                            <td>Итого</td>
                            <td id="totalCount"></td>
                            <td id="totalPrice"></td>
                        </tr>
                    </table>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-12 p-3">
                    <div class="alert alert-primary">
                        <h6>Информация о доставке:</h6>
                        <div id="idAddress"></div>
                        <div id="city"></div>
                        <div id="address"></div>
                        <div id="userName"></div>
                        <div id="emailAddr"></div>
                        <div id="phoneAddr"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="clearShowed()" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function getUserByUserId(id){
        const response = await fetch('/admin/getUserByUserId/'+id);
        const user = await response.json();
        document.getElementById('idUser').innerHTML='ID пользователя: '+user[0]['idUser'];
        document.getElementById('name').innerHTML='Имя пользователя: '+user[0]['name'];
        document.getElementById('email').innerHTML='Email пользователя: '+user[0]['email'];
        document.getElementById('phone').innerHTML='Телефон пользователя: '+user[0]['phone'];
        document.getElementById('register_at').innerHTML='Дата регистрации: '+user[0]['created_at'];
    }

    async function getProductsByOrderId(id){
        const response = await fetch('/admin/getProductsByOrderId/'+id);
        const products = await response.json();
        let totalCount = 0;
        let totalPrice = 0;
        products.map(i=>{
            let row = document.createElement('tr');
            row.classList='unset';
            row.innerHTML = '<td>'+i.idProduct+'</td>'+
                            '<td><img src="../../'+i.photo+'" width="100px" alt=""></td>'+
                            '<td>'+i.name+'</td>'+
                            '<td>'+i.price+'</td>'+
                            '<td>'+i.created_at+'</td>';
            document.getElementById('productTable').append(row);
            totalCount++;
            totalPrice += parseInt(i.price);
        });
        document.getElementById('totalCount').innerHTML=totalCount+' ед.';
        document.getElementById('totalPrice').innerHTML=totalPrice+' грн';
    }

    async function getAddressById(id){
        const response = await fetch('/admin/getAddressById/'+id);
        const address = await response.json();
        document.getElementById('idAddress').innerHTML='Индекс адреса: '+address.id;
        document.getElementById('city').innerHTML='Город: '+address.city;
        document.getElementById('address').innerHTML='Адрес: '+address.address;
        document.getElementById('userName').innerHTML='ФИО получателя: '+address.userName;
        document.getElementById('emailAddr').innerHTML='Email получателя: '+address.email;
        document.getElementById('phoneAddr').innerHTML='Номер получателя: '+address.phone;
    }

    async function showInfo(id){
        const  response = await fetch('/Admin/getOrderById/'+id);
        const  order = await  response.json();
        document.getElementById('idOrder').innerHTML='Номер заказа: '+order[0]['idOrder'];
        document.getElementById('statusOrder').innerHTML='Cтатус заказа: '+order[0]['statusOrder'];
        if(order[0]['statusPayment']!=='Оплачен'){
            document.getElementById('statusPayment').innerHTML='Статус оплаты: <span class="text-danger">'+order[0]['statusPayment']+'</span>';
        }else{
            document.getElementById('statusPayment').innerHTML='Статус оплаты: '+order[0]['statusPayment'];
        }
        document.getElementById('created_at').innerHTML='Заказ добавлен: '+order[0]['created_at'];
        getUserByUserId(order[0]['userId']);
        getProductsByOrderId(id);
        getAddressById(order[0]['addressId']);
    }

    function clearShowed(){
        document.getElementById('idUser').innerHTML='';
        document.getElementById('name').innerHTML='';
        document.getElementById('email').innerHTML='';
        document.getElementById('phone').innerHTML='';
        document.getElementById('register_at').innerHTML='';
        document.getElementById('created_at').innerHTML='';
        document.getElementById('statusPayment').innerHTML='';
        document.getElementById('statusOrder').innerHTML='';
        document.getElementById('idOrder').innerHTML='';
        document.getElementById('idAddress').innerHTML='';
        document.getElementById('city').innerHTML='';
        document.getElementById('address').innerHTML='';
        document.getElementById('userName').innerHTML='';
        document.getElementById('emailAddr').innerHTML='';
        document.getElementById('phoneAddr').innerHTML='';
        document.location.reload();
    }

</script>
