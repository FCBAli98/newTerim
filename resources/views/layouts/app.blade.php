<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/Bootstrap/css/Bootstrap.css')}}">
    <link href="<?= asset('public/employee/css/font-awesome.css') ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/mehnat.css')}}"/>
{{--    <link rel="stylesheet" href="{{asset('css/defaultStyles.css')}}"/>--}}

    <title>Document</title>
    <style>

    </style>
</head>
<body>

<div id="mainWrap">
    <!-- start #header-->
    <div id="header" class="header">
        <div class="mainContainer">
            <div class="header">
                <div class="logo">
                    <a href="/"><img src="/logo-uz.svg" alt=""/></a>
                </div>
                <div class="headerRight">
                    {{--                    <?php if (!Yii::$app->user->identity): ?>--}}
                    <a href="/site/login" class="btn btn-link enterStaff"><i class="glyphicon glyphicon-user"></i>
                        Ходимлар учун кириш</a>
                    {{--                    <?php endif; ?>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- end #header-->
    <!-- start #content-->
    <div id="content">
        <div style="margin-top: 30px;">
            <div class="mainContainer minContainer500">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- end #content-->
</div>

<div id="footer">
    <div class="mainContainer">
        <div class="left"> {{date('Y')}} « Ўзбекистон Республикаси Бандлик ва меҳнат муносабатлари вазирлиги » «
            MEHNAT.UZ Ахборот компьютер маркази »
        </div>
        <div class="right ml-auto">
            <img src="/employee/images/tel-icon.svg" alt="" width="20" height="20">
            Техник саволлар учун <b>+998 (71) 202-15-05 (206)</b>
            <img src="/employee/images/tel-icon.svg" alt="" width="20" height="20">
            Тел. номер <b>+998 (71) 200 06 02</b>
        </div>
    </div>
</div>

<script src="Bootstrap/js/jquery-3.3.1.slim.min.js"></script>
<script src="Bootstrap/js/popper.min.js"></script>
<script src="Bootstrap/js/bootstrap.js"></script><script src="Bootstrap/js/jquery-3.3.1.slim.min.js"></script>
</body>
</html>
