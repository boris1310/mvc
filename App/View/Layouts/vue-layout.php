<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Shop</title>
</head>
<body>


<?php include 'App/View/Templates/' . $content_view; ?>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">My Store.</span>
    </div>
</footer>

<script  src="../../../public/js/main.js"></script>
<script  src="https://unpkg.com/imask"></script>

<script  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    var phoneMask = IMask(
        document.getElementById('phone-mask'), {
            mask: '+{38(0}00)000-00-00'
        });
    var phone = IMask(
        document.getElementById('phone'), {
            mask: '+{38(0}00)000-00-00'
        });
    var cvv = IMask(
        document.getElementById('cvv'), {
            mask: '000'
        });
    var period = new IMask(
        document.getElementById('period'), {
        mask: '00/00',
    });
    var cart = new IMask(
        document.getElementById('cart'), {
            mask: '0000 0000 0000 0000',
        });
</script>
</body>
</html>