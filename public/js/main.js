function getProduct() {
    $.ajax({
        url: 'http://localhost:8888/Basket/getProducts',
        dataType: "json",
        type: "get",
        success: function (data) {
            $(".modal-body").html('');
            for (var i = 0; i < data.length; i++) {
                $("<div class='text-center alert alert-primary w-75 mx-auto my-3 row'>" +
                    "<button class='btn-close unset' onclick='unset(" + data[i][0] + ")'></button>" +
                    "<img src='../../../public/img/sale.png' class='col-lg-3 col-md-4  w-25 col-sm-12 col'" +
                    " alt='item'>" +
                    "<div class='col-lg-8 col-md-7 col-sm-12'>" +
                    "<h3>" + data[i][1] + "</h3>" +
                    "<p>" + data[i][2] + "</p>" +
                    "<h4>" + data[i][3] + "</h4>" +
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

                $('.basket').each(function(i) {
                    for(let i=0;i<data.length;i++){
                        if(data[i][0] == $(this).val()){
                            $(this).children('img').prop('src','../../../public/img/success.png');
                            continue;
                        }
                    }
                });

        },

        error: function (data) {
            $('.basket').children('img').prop('src','../../../public/img/basket.png');
        }
    });
}

checkIcon();

$(".basket").click(function () {

    if($(this).children('img').prop('src')=='http://localhost:8888/public/img/success.png'){
        $(this).children('img').prop('src','../../../public/img/basket.png');
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


$('.showBasket').click(function () {
    $('#basket-modal').css('display', 'block');
    getProduct();
    checkIcon();
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
                $("<div class='text-center alert alert-primary w-75 mx-auto my-3 row'>" +
                    "<button class='btn-close unset' onclick='unset(" + data[i][0] + ")' value='1'></button>" +
                    "<img src='../../../public/img/sale.png' " +
                    "class='col-lg-3 col-md-4  w-25 col-sm-12 col'" +
                    " alt='item'>" +
                    "<div class='col-lg-8 col-md-7 col-sm-12'>" +
                    "<h3>" + data[i][1] + "</h3>" +
                    "<p>" + data[i][2] + "</p>" +
                    "<h4>" + data[i][3] + "</h4>" +
                    "</div>" +
                    "</div>").appendTo(".modal-body");
            }
        },

        error: function (data) {
            console.log('error');
        }
    });

    checkIcon();
}

$('.closeBasket').click(function () {
    $('.modal-body').html('');
    $('#basket-modal').css('display', 'none');
    checkIcon();
});

