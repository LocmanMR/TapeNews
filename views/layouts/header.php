<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">

    <link href="/template/css/main.css" rel="stylesheet">

</head><!--/head-->

<body>
<div class="page-wrapper">


    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +7-926-761-**-**</a></li>
                                <li><a href="https://vk.com/israfilovr"><i class="fa fa-envelope"></i> israfilov.ruslan2018@</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://ru-ru.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/discover"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/news"><img src="/template/images/home/logo1.png" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if (User::isGuest()): ?>
                                    <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                    <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>
                                <?php else: ?>
                                    <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                    <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/news">Новости</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->

    </header><!--/header-->