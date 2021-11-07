function getProduct() {
    $.ajax({
        url: 'http://localhost:8888/Basket/getProducts',
        dataType: "json",
        type: "get",
        success: function (data) {
            $(".modal-body").html('');
            for (var i = 0; i < data.length; i++) {
                var src = '';
                if (data[i][6] == null || data[i][6] == '') {
                    src = '../../../public/img/notfound.png';
                } else {
                    src = '../../../' + data[i][6];
                }
                $("<div class='card my-3 w-50 mx-auto hover-card'>" +

                    "<div class='float-end mx-3'>" +
                    "<button class='btn-close float-end unset my-3' onclick='unset(" + data[i][0] + ")'></button>" +
                    "</div>" +
                    "<div class='row mx-auto'>" +
                    "<div  class='col-5 px-3 mb-5 ml-3'>" +
                    "<img width='100%' src='" + src + "'" +
                    " alt='item'>" +
                    "</div>" +

                    "<div class='col-6 my-3 mx-3'>" +
                    "<h5><span class='fs-6'>Наименование: </span>" + data[i][1] + "</h5>" +
                    "<div>Описание:</div>"+
                    "<div class='overflow-auto h-50'>" + data[i][2] + "</div>" +
                    "<h5 class='my-3'><span class='fs-6'>Цена: </span>" + data[i][3] + "</h5>" +
                    "</div>" +
                    "</div>" +
                    "</div>").appendTo(".modal-body");
            }
            $('.basket-length').html(data.length);

        },
        error: function (data) {
            console.log('error');
        }
    });
}

getProduct();

function checkIcon() {
    $.ajax({
        url: 'http://localhost:8888/Basket/getProducts',
        dataType: "json",
        type: "get",

        success: function (data) {

            $('.basket').each(function (i) {
                for (let i = 0; i < data.length; i++) {
                    if (data[i][0] == $(this).val()) {
                        $(this).children('img').prop('src', '../../../public/img/success.png');
                        continue;
                    }
                }
            });

        },

        error: function (data) {
            $('.basket').children('img').prop('src', '../../../public/img/basket.png');
        }
    });
}

checkIcon();

$(".basket").click(function () {

    if ($(this).children('img').prop('src') == 'http://localhost:8888/public/img/success.png') {
        $(this).children('img').prop('src', '../../../public/img/basket.png');
    }
    $.ajax({
        url: 'http://localhost:8888/Basket/index/' + $(this).val(),
        dataType: "json",
        type: "get",

        success: function (data) {
            $(".basket-length").html(data.length);
            console.log(data);
        },

        error: function (data) {
            console.log('error');
        }
    })

    checkIcon();

});

const fullPrice =async() => {
    const response = await fetch('http://localhost:8888/Basket/getProducts');
    const products = await response.json();

    var fullprice=0;
    for(let i=0;i<products.length;i++){
        fullprice = fullprice+Number(products[i]['price']);
    }

    document.getElementById('price').innerHTML=fullprice;
    //return fullprice;
}


$('.showBasket').click(function () {
    $('#basket-modal').css('display', 'block');
    getProduct();
    checkIcon();
    fullPrice().catch((e)=>{
        document.getElementById('price').innerHTML=0;
    });

});

const unset = function (params) {
    $(".modal-body").html('');
    $.ajax({
        url: 'http://localhost:8888/Basket/index/' + params,
        dataType: "json",
        type: "get",

        success: function (data) {

            $(".basket-length").html(data.length);

        },

        error: function (data) {
            console.log('error');
        }
    });

    $.ajax({
        url: 'http://localhost:8888/Basket/getProducts',
        dataType: "json",
        type: "get",

        success: function (data) {
            $(".modal-body").html('');

            for (var i = 0; i < data.length; i++) {
                var src = '';
                if (data[i][6] == null || data[i][6] == '') {
                    src = '../../../public/img/notfound.png';
                } else {
                    src = '../../../' + data[i][6];
                }
                $("<div class='card my-3 w-50 mx-auto hover-card'>" +

                    "<div class='float-end mx-3'>" +
                    "<button class='btn-close float-end unset my-3' onclick='unset(" + data[i][0] + ")'></button>" +
                    "</div>" +
                    "<div class='row mx-auto'>" +
                    "<div  class='col-5 px-3 mb-5 ml-3'>" +
                    "<img width='100%' src='" + src + "'" +
                    " alt='item'>" +
                    "</div>" +

                    "<div class='col-6 my-3 mx-3'>" +
                    "<h5><span class='fs-6'>Наименование: </span>" + data[i][1] + "</h5>" +
                    "<div>Описание:</div>"+
                    "<div class='overflow-auto h-50'>" + data[i][2] + "</div>" +
                    "<h5 class='my-3'><span class='fs-6 price'>Цена: </span>" + data[i][3] + "</h5>" +
                    "</div>" +
                    "</div>" +
                    "</div>").appendTo(".modal-body");
            }
        },

        error: function (data) {
            console.log('error');
        }
    });

    checkIcon();
    fullPrice().catch((e)=>{
        document.getElementById('price').innerHTML=0;
    });
}

$('.closeBasket').click(function () {
    $('.modal-body').html('');
    $('#basket-modal').css('display', 'none');
    checkIcon();
    fullPrice().catch((e)=>{
        document.getElementById('price').innerHTML=0;
    });
});


