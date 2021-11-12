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
<div id="google_translate_element" style="display:none;"></div>
<style type="text/css">
    body { top: 0px !important; }
   .skiptranslate { display: none !important; }
    .flag{
        width: 30px;
        border: 1px solid black;
        border-radius: 20%;
    }
    .list{
        list-style: none;
    }
</style>

<?php include 'App/View/Templates/' . $content_view; ?>

<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">ElectroStore</span>
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
<script>
    (function() {
        var d = "text/javascript"
            , e = "text/css"
            , f = "stylesheet"
            , g = "script"
            , h = "link"
            , k = "head"
            , l = "complete"
            , m = "UTF-8"
            , n = ".";

        function p(b) {
            var a = document.getElementsByTagName(k)[0];
            a || (a = document.body.parentNode.appendChild(document.createElement(k)));
            a.appendChild(b)
        }



        function _loadJs(b) {
            var a = document.createElement(g);
            a.type = d;
            a.charset = m;
            a.src = b;
            p(a)
        }


        function _loadCss(b) {
            var a = document.createElement(h);
            a.type = e;
            a.rel = f;
            a.charset = m;
            a.href = b;
            p(a)
        }

        function _isNS(b) {
            b = b.split(n);
            for (var a = window, c = 0; c < b.length; ++c)
                if (!(a = a[b[c]]))
                    return !1;
            return !0
        }

        function _setupNS(b) {
            b = b.split(n);
            for (var a = window, c = 0; c < b.length; ++c)
                a.hasOwnProperty ? a.hasOwnProperty(b[c]) ? a = a[b[c]] : a = a[b[c]] = {} : a = a[b[c]] || (a[b[c]] = {});
            return a
        }

        window.addEventListener && "undefined" == typeof document.readyState && window.addEventListener("DOMContentLoaded", function() {
            document.readyState = l
        }, !1);

        if (_isNS('google.translate.Element')) {
            return
        }



        (function() {
            var c = _setupNS('google.translate._const');
            c._cl = 'ru';
            c._cuc = 'googleTranslateElementInit';
            c._cac = '';
            c._cam = '';
            c._ctkk = eval('((function(){var a\x3d71640675;var b\x3d-12312877;return 406476+\x27.\x27+(a+b)})())');
            var h = 'translate.googleapis.com';
            var s = (true ? 'https' : window.location.protocol == 'https:' ? 'https' : 'http') + '://';
            var b = s + h;
            c._pah = h;
            c._pas = s;
            c._pbi = b + '/translate_static/img/te_bk.gif';
            c._pci = b + '/translate_static/img/te_ctrl3.gif';
            c._pli = b + '/translate_static/img/loading.gif';
            c._plla = h + '/translate_a/l';
            c._pmi = b + '/translate_static/img/mini_google.png';
            c._ps = b + '/translate_static/css/translateelement.css';
            c._puh = 'translate.google.com';
            _loadCss(c._ps);
            _loadJs(b + '/translate_static/js/element/main_ru.js');
        })();
    })();





    var cookie = get_cookie( 'googtrans' );
    if (cookie == null) {
        $('.translate .lang_ru').addClass('active')
    }else{
        var get_cook = cookie.split('/')[2];
        $('.translate .lang_'+get_cook).addClass('active');
    }

    function doGTranslate(lang_pair) {

        $('.translate li').click(function () {
            $('.translate li').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        if (lang_pair.value)
            lang_pair = lang_pair.value;
        //	if (lang_pair == '')
        //		return;

        var lang = lang_pair.split('|')[1];
        var teCombo;
        var sel = document.getElementsByTagName('select');
        for (var i = 0; i < sel.length; i++)
            if (sel[i].className == 'goog-te-combo')
                teCombo = sel[i];

        if (document.getElementById('google_translate_element') == null  || document.getElementById('google_translate_element').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
            setTimeout(function() {
                    doGTranslate(lang_pair)
                }
                , 500);

        }
        else {
            teCombo.value = lang;
            GTranslateFireEvent(teCombo, 'change')
        }
    };

    function GTranslateFireEvent(element, event) {
        try {
            if (document.createEventObject) {
                var evt = document.createEventObject();
                element.fireEvent('on' + event, evt)
            }
            else {
                var evt = document.createEvent('HTMLEvents');
                evt.initEvent(event, true, true);
                element.dispatchEvent(evt)
            }
        }
        catch (e) {}
    };



    function get_cookie ( cookie_name ) {
        var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

        if ( results )
            return ( unescape ( results[2] ) );
        else
            return null;
    }

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'ru'
        },'google_translate_element');
    };

</script>
</body>
</html>