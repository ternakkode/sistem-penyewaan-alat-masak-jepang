<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title') | Grillkop Probolinggo</title>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/rs-plugin/css/settings.css') }}" media="screen" />

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="{{ asset('frontend/js/modernizr.js') }}"></script>

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
    
</head>

<body>

    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="ldr"></div>
        </div>
    </div>

    <!-- Wrap -->
    <div id="wrap">

        <!-- header -->
        <header>
            <div class="sticky">
                <div class="container">

                    <!-- Logo -->
                    <div class="logo"> <a href="index.html"><img class="img-responsive" src="images/logo.png"
                                alt=""></a> </div>
                    <nav class="navbar ownmenu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle
                                    navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span>
                            </button>
                        </div>

                        <!-- NAV -->
                        <div class="collapse navbar-collapse" id="nav-open-btn">
                            <ul class="nav">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li> <a href="{{ url('/menu') }}">Menu </a> </li>
                                @if (!auth()->check())
                                    <li> <a href="{{ url('/login') }}">Masuk </a> </li>
                                    <li> <a href="{{ url('/register') }}">Registrasi </a> </li>
                                @else
                                    @if (auth()->user()->role->nama == 'Admin')
                                        <li> <a href="{{ url('/admin') }}">Panel Admin </a> </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                        @if (auth()->check())
                        <div class="nav-right">
                            <ul class="navbar-right">
                                <!-- USER INFO -->
                                <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button"><i class="icon-user"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6>Halo, {{ auth()->user()->nama }}</h6>
                                        </li>
                                        <li><a href="#">Order Saya</a></li>
                                        <li><a href="{{ url('logout') }}">Keluar</a></li>
                                    </ul>
                                </li>
                                <li class="user-basket"> <a href="{{ url('keranjang') }}"><i class="icon-basket-loaded"></i> </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                    </nav>
                </div>
            </div>
        </header>

        @yield('content')

        <footer style="padding-top:25px;padding-bottom:25px">
            <div class="rights" style="margin-top:0px">
                <p>© 2021 Grillkop Probolinggo. </p>
                <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
            </div>
        </footer>

    </div>
    <script src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/own-menu.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.lighter.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>