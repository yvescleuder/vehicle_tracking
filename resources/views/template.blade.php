<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - YC Rastreamento Veicular</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="rastreamento, veiculo, veicular, rastreio, moto, carro, rastreamento para carro, rastreamento para moto">
    <meta name="author" content="Yves Clêuder">
    <!-- Favicon icon -->
    <link rel="icon" href="\images\favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="\css\style.css">
    <link rel="stylesheet" type="text/css" href="\css\jquery.mCustomScrollbar.css">
    @yield('css')
</head>

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="javascript:;">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="/">
                        <img class="img-fluid" src="\images\logo.png" alt="Theme-Logo">
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>Yves Clêuder</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="/logout">
                                            <i class="feather icon-log-out"></i> Sair
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Menu de navegação</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                                    <span class="pcoded-mtext">Veículos</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li>
                                        <a href="{{ route('vehicle.create') }}">
                                            <span class="pcoded-mtext">Cadastrar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('vehicle.index') }}">
                                            <span class="pcoded-mtext">Listar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="pcoded-navigatio-lavel">Mapa</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                                    <span class="pcoded-mtext">Localização</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li>
                                        <a href="{{ route('view.location.day') }}">
                                            <span class="pcoded-mtext">Localização por dia</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/location/realtime">
                                            <span class="pcoded-mtext">Localização em Tempo real</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="pcoded-navigatio-lavel">Relatórios</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="{{ route('view.report.points') }}">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Relatório por pontos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('view.report.displacements') }}">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Relatório por deslocamentos</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                @yield('content');
            </div>
        </div>
    </div>
</div>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="\bower_components\modernizr\js\css-scrollbars.js"></script>

<!-- Google map js -->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">


</script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBV4P6EsMZwzaznHJdAGQcRBfpsFaZQGaY"></script>

<script src="\js\pcoded.min.js"></script>
<script src="\js\vartical-layout.min.js"></script>
<script src="\js\jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="\js\script.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
</script>
@yield('javascript')




</body>

</html>
