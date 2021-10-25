function getProduct() {
    $.ajax({
        url: 'http://localhost:8888/Basket/getProducts',
        dataType: "json",
        type: "get",
        success: function (data) {
            $(".modal-body").html('');
            for (var i = 0; i < data.length; i++) {
                var src = '';
                if(data[i][6]==null || data[i][6]==''){
                    src='../../../public/img/notfound.png';
                }else{
                    src='../../../'+data[i][6];
                }
                $("<div class='card my-3 mx-auto d-flex justify-content-center flex-row w-75'>" +

                    "<div class='text-end float-end'>"+
                    "<button class='btn-close unset my-3' onclick='unset(" + data[i][0] + ")'></button>" +
                    "</div>"+

                    "<div  class='p-2'>"+
                    "<img width='100%' src='"+src+"'" +
                    " alt='item'>" +
                    "</div>"+

                    "<div class='p-2 my-5 ml-5'>" +
                    "<h5>" + data[i][1] + "</h5>" +
                    "<p>" + data[i][2] + "</p>" +
                    "<h5>" + data[i][3] + "</h5>" +
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
                var src = '';
                if(data[i][6]==null || data[i][6]==''){
                    src='../../../public/img/notfound.png';
                }else{
                    src='../../../'+data[i][6];
                }
                $("<div class='card my-3 mx-auto d-flex justify-content-center flex-row w-75'>" +

                    "<div class='text-end float-end'>"+
                    "<button class='btn-close unset my-3' onclick='unset(" + data[i][0] + ")'></button>" +
                    "</div>"+

                    "<div  class='p-2'>"+
                    "<img width='100%' src='"+src+"'" +
                    " alt='item'>" +
                    "</div>"+

                    "<div class='p-2 my-5 ml-5'>" +
                    "<h5>" + data[i][1] + "</h5>" +
                    "<p>" + data[i][2] + "</p>" +
                    "<h5>" + data[i][3] + "</h5>" +
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

