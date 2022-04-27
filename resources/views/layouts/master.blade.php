<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Kelulusan - {{ DB::table('settings')->latest()->first()->name_school }} </title>

    <!-- asset/PLUGINS CSS STYLE -->
    <!-- Bootstrap -->
    <link href="{{ asset('asset/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/themify-icons/themify-icons.css') }}">
    <!-- Owl Carousel -->
    <link href="{{ asset('asset/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" media="screen">
    <!-- Owl Carousel Theme -->
    <link href="{{ asset('asset/plugins/owl-carousel/assets/owl.theme.green.min.css') }}" rel="stylesheet"
        media="screen">
    <!-- Fancy Box -->
    <link href="{{ asset('asset/plugins/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet">
    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/aos/aos.css') }}">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <!-- FAVICON -->
    <link href="{{ asset('asset/images/favicon.png') }}" rel="shortcut icon">

    <script src="https://kit.fontawesome.com/b8d1f961b1.js" crossorigin="anonymous"></script>

    <style type="text/css">
        .navbar-brand{
            font-weight: bold;
            color: #007bff;
        }

        .text-title{
            color: #007bff;
            font-size: 2em;
            font-weight: 600;
        }

        .countdown {
           margin-top: 1em;
           margin-bottom: 2em;
        }

        .countdown div {
            text-align: center;
            border: 3px solid #007bff;
            border-radius: 8px;
            margin: 10px 10px;
            width: 200px;
            padding: 30px 0;
        }

        .countdown div h3 {
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .countdown div h4 {
            font-size: 16px;
            font-weight: 600;
            color: #007bff;
        }

        .img-logo {
            width: 40px;
            height: 40px;
        }

        @media (max-width: 575px) {
            .pro-block{
                padding: 10px 20px;
            }
            .img-logo{
                margin-left: 20px;
                margin-top: 10px;
                margin-bottom: 10px
            }
            .text-title{
                font-size: 1.3em;
            }

            .countdown {
                margin-top: .5em;
                margin-bottom: 1em;
            }

            .countdown div {
                width: 70px;
                padding: 10px 0;
                margin: 10px 8px;
            }

            .countdown div h3 {
                font-size: 28px;
                margin-bottom: 10px;
            }

            .countdown div h4 {
                font-size: 14px;
                font-weight: 500;
            }
        }

        footer{
            position: relative;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%
        }
    </style>

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


    <nav class="navbar main-nav navbar-expand-lg p-0">
        <div class="container">
            <a class="navbar-brand" href="/"><img  class="img-logo" src="https://sman48-jkt.sch.id/wp-content/uploads/2021/07/cropped-cropped-cropped-cropped-EXpbXvsS_400x400-removebg-preview-2-1.png" alt="logo"> &nbsp;&nbsp;&nbsp;{{
                DB::table('settings')->latest()->first()->name_school
                }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Route::is('welcome') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown dropdown-slide">
                            <a class="nav-link" href="#" data-toggle="dropdown">{{ Auth::user()->name }}
                                <span><i class="ti-angle-down"></i></span>
                            </a>
                            <!-- Dropdown list -->
                            <div class="dropdown-menu">
                                <a href="{{ route('home') }}" class="dropdown-item">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



    <!--====  End of Testimonial  ====-->

    <!--============================
=            Footer            =
=============================-->

    <footer>
        <div class="text-center bg-dark py-2">
            <small class="text-light">Copyright &copy; E - Kelulusan {{ DB::table('settings')->latest()->first()->year }}</small class="text-secondary">
        </div>
    </footer>


    <!-- JAVASCRIPTS -->
    <script src="{{ asset('asset/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/syotimer/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/aos/aos.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="{{ asset('asset/plugins/google-map/gmap.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('js')
</body>

</html>