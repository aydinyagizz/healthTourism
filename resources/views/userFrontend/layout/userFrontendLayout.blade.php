<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    {{--    <link href="{{ asset('frontend/acenteFrontend/assets/img/favicon.png') }}" rel="icon">--}}
    {{--    <link href="{{ asset('frontend/acenteFrontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">--}}
    @if($home && $home->logo)
    <link rel="icon" type="image/x-icon" href="data:image/jpeg;base64,{{ $home->logo }}"/>
    @endif


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('userFrontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
          rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('userFrontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('userFrontend/assets/css/style.css') }}" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
            crossorigin="anonymous"></script>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @yield('css')







    {{--    <style>--}}
    {{--        /*.modal-open .modal{*/--}}
    {{--        /*    overflow-x : auto;*/--}}
    {{--        /*    overflow-y : auto;*/--}}
    {{--        /*}*/--}}
    {{--        .modal-backdrop.show body {--}}

    {{--            /*opacity: 1 !important;*/--}}

    {{--            background-color: #000000 !important;--}}
    {{--            opacity: 0.2 !important;--}}
    {{--            filter: alpha(opacity=60) !important;--}}

    {{--        }--}}


    {{--        /*.contact .php-email-form{*/--}}
    {{--        /*    background-color:#000000 !important;*/--}}
    {{--        /*    opacity:0.3 !important;*/--}}
    {{--        /*    filter:alpha(opacity=60) !important;*/--}}
    {{--        /*}*/--}}

    {{--        .modal-open {--}}
    {{--            overflow: auto !important;--}}

    {{--        }--}}

    {{--        .modal-backdrop {--}}
    {{--            z-index: -1 !important;--}}
    {{--            background-color: #000000 !important;--}}
    {{--            opacity: 0.2 !important;--}}
    {{--            filter: alpha(opacity=60) !important;--}}
    {{--        }--}}

    {{--        .modal {--}}
    {{--            /*overflow-x: auto !important;*/--}}
    {{--            /*overflow-y: auto !important;*/--}}
    {{--            height: auto !important;--}}
    {{--            overflow: auto !important;--}}
    {{--            /*display: block !important;*/--}}

    {{--        }--}}

    {{--        /* Important part */--}}
    {{--        .modal-dialog {--}}
    {{--            overflow-y: auto !important;--}}

    {{--            /*overflow-y: initial !important;*/--}}
    {{--        }--}}

    {{--        .modal-body {--}}
    {{--            /*height: 80vh;*/--}}
    {{--            /*overflow-y: auto;*/--}}
    {{--            max-height: calc(100vh - 200px);--}}
    {{--            overflow-y: auto;--}}
    {{--        }--}}

    {{--        .whatsapp-icon {--}}
    {{--            position: fixed;--}}
    {{--            bottom: 10px;--}}
    {{--            left: 10px;--}}
    {{--            /*right: 20px; !* İkonun sağdan 20 piksel mesafede kalmasını sağlar *!*/--}}
    {{--            z-index: 9999; /* İkonun sayfada en üstte kalmasını sağlar */--}}

    {{--        }--}}

    {{--        /*bu eklendi*/--}}
    {{--        /*.fixed-top{*/--}}
    {{--        /*    background-color: white;*/--}}
    {{--        /*}*/--}}

    {{--        /*.navbar a, .navbar a:focus {*/--}}
    {{--        /*    color: #37517E;*/--}}
    {{--        /*}*/--}}
    {{--        /*.navbar .getstarted{*/--}}
    {{--        /*    color: #37517E;*/--}}
    {{--        /*}*/--}}

    {{--        /*.header-scrolled .navbar a {*/--}}
    {{--        /*     color: white;*/--}}

    {{--        /*}*/--}}

    {{--        /*#header .logo a {*/--}}
    {{--        /*    color:#47b2e4;*/--}}
    {{--        /*}*/--}}

    {{--        /*@media only screen and (max-width: 600px) {*/--}}
    {{--        /*    .fixed-top .mobile-nav-toggle {*/--}}
    {{--        /*        color: #47b2e4;*/--}}
    {{--        /*     }*/--}}

    {{--        /*    .header-scrolled .navbar a {*/--}}
    {{--        /*        color: #302626;*/--}}
    {{--        /*    }*/--}}

    {{--        /*}*/--}}


    {{--        .fixed-top {--}}
    {{--            background-color: white;--}}
    {{--        }--}}

    {{--        #header.header-scrolled, #header.header-inner-pages {--}}
    {{--            background: white;--}}
    {{--        }--}}

    {{--        .navbar a, .navbar a:focus {--}}
    {{--            color: #37517E;;--}}
    {{--        }--}}

    {{--        .navbar-brand{--}}
    {{--            color: #37517E;;--}}
    {{--        }--}}

    {{--        .navbar-brand:hover{--}}
    {{--            color: #37517E;--}}
    {{--        }--}}

    {{--        @media only screen and (max-width: 600px) {--}}
    {{--            .fixed-top .mobile-nav-toggle {--}}
    {{--                color: #37517E;--}}
    {{--            }--}}

    {{--            /*.header-scrolled .navbar a {*/--}}
    {{--            /*    color: #302626;*/--}}
    {{--            /*}*/--}}

    {{--            .navbar-mobile .bi-x{--}}
    {{--                color: white;--}}
    {{--            }--}}


    {{--        }--}}

    {{--    </style>--}}


</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="#">
                @if($home && $home->logo)

                    <img
                        src="data:image/jpeg;base64,{{ $home->logo }}"
                        alt="{{ $home->logo }}" class="img-fluid animated"/>

                @else
                @endif

{{--                <img--}}
{{--                    src=""--}}
{{--                    alt="">--}}

                {{--                <div class="col-md-4" style="font-size: 16px">{{ $user->company_name }}</div>--}}

                <div style="font-size: 16px" class="navbar-brand ps-lg-2"></div>

            </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active " href="#hero">Home</a></li>
                @if($about_us)
                    <li><a class="nav-link scrollto " href="#about">About</a></li>
                @endif
                @if(count($services)>0)
                    <li><a class="nav-link scrollto " href="#services">Services</a></li>
                @endif
                @if(count($pricing)>0)
                    <li><a class="nav-link scrollto " href="#pricing">Pricing</a></li>
                @endif
                @if(count($faq)>0)
                    <li><a class="nav-link scrollto " href="#faq">FAQ</a></li>
                @endif

                <li><a class="nav-link scrollto " href="#contact">Contact</a></li>


                {{--                <li class="dropdown "><a style="border: 2px solid #37517E; color: #37517E; background-color: white" class="getstarted scrollto"--}}
                {{--                                         href="javascript:void(0);"><span>Sign In/Sign Up</span> <i--}}
                {{--                            class="bi bi-chevron-down"></i></a>--}}
                {{--                    <ul>--}}
                {{--                        <li><a href="">Employer Sign In/Sign Up</a></li>--}}


                {{--                        <li><a href="">Professional Sign In/Sign Up</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->


@yield('content')


{{--@if($user->phone)--}}
{{--    <div class="whatsapp-icon">--}}
{{--        <a href="https://wa.me/{{ $user->phone }}" target="_blank">--}}
{{--            <img style="max-width: 80px" src="{{ asset('acente/img/WhatsApp.png') }}" alt="WhatsApp">--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endif--}}

<!-- ======= Footer ======= -->
<footer id="footer" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">


    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    {{--                    <h3>{{ $user->company_name}}</h3>--}}
                    <p>
                        {!! $user->address !!} <br>
                        <strong>Phone:</strong> {{ $user->phone }} <br>
                        <strong>Email:</strong> {{ $user->email }} <br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Pricing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#faq">Faqs</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>

                    <div class="social-links mt-3">
                        @foreach($social_media as $item)
                            @if($item->icon == 'fa-facebook')
                                <a href="{!! $item->link !!}" target="_blank" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                            @elseif($item->icon == 'fa-instagram')
                                <a href="{!! $item->link !!}" target="_blank" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                            @elseif($item->icon == 'fa-twitter')
                                <a href="{!! $item->link !!}" target="_blank" class="twitter"><i
                                        class="bx bxl-twitter"></i></a>
                            @elseif($item->icon == 'fa-linkedin')
                                <a href="{!! $item->link !!}" target="_blank" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            @elseif($item->icon == 'fa-youtube')
                                <a href="{!! $item->link !!}" target="_blank" class="youtube"><i
                                        class="bx bxl-youtube"></i></a>
                            @else
                            @endif
                        @endforeach

{{--                        <a href="" target="_blank" class="twitter"><i--}}
{{--                                class="bx bxl-twitter"></i></a>--}}
{{--                        <a href="" target="_blank" class="facebook"><i--}}
{{--                                class="bx bxl-facebook"></i></a>--}}
{{--                        <a href="" target="_blank" class="instagram"><i--}}
{{--                                class="bx bxl-instagram"></i></a>--}}
{{--                        <a href="" target="_blank" class="linkedin"><i--}}
{{--                                class="bx bxl-linkedin"></i></a>--}}
{{--                            <a href="" target="_blank" class="youtube"><i--}}
{{--                                    class="bx bxl-youtube"></i></a>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix" >
        <div class="copyright" >
            © Copyright <a
                href="https://ayas.ca/index2.html" target="_blank">Ayas Technology Consulting
                Inc.</a> All Rights Reserved. | Powered By Aytemp
            {{--            &copy; Copyright <strong><span>Aytemp</span></strong>. All Rights Reserved Ayas Technology Consulting Inc.--}}
        </div>
        {{--        <div class="credits">--}}
        {{--            Designed by <a href="#">Ayas Technology Consulting Inc.</a>--}}
        {{--        </div>--}}
    </div>
</footer><!-- End Footer -->


<div id="preloader" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="{{ asset('userFrontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('userFrontend/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('userFrontend/assets/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<script src="{{ asset("userFrontend/assets/js/vendor/jquery-1.12.4.min.js") }}"></script>
<script src="{{ asset("userFrontend/assets/js/popper.min.js") }}"></script>
<script src="{{ asset("userFrontend/assets/js/jquery.slicknav.min.js") }}"></script>


@yield('js')
</body>

</html>
