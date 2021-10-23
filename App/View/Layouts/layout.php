<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Shop 123</title>
</head>
<body>

<?php require_once 'App/View/inc/header.php'; ?>

<?php include 'App/View/Templates/' . $content_view; ?>

<?php require_once 'App/View/inc/footer.php'; ?>

<div class="results">
123
</div>

<script>

    $(".basket").click(function (){

        if($(this).children('img').prop('src')=='http://localhost:8888/public/img/basket.png'){
            $(this).children('img').prop('src','../../../public/img/success.png');
        }else{
            $(this).children('img').prop('src','../../../public/img/basket.png');
        }

        $.ajax({
            url: 'http://localhost:8888/Basket/index/'+$(this).val(),
            dataType: "json",
            type: "get",

            success: function(data) {
                $('.results').html(data);
                $("#basket-length").html(data.length);

            },

            error: function (data){
                console.log('error');
            }
        })

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>