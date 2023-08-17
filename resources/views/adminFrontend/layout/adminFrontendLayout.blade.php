<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S22ED796P1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-S22ED796P1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title") | Holiday & Health Turkey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{--    <link rel="manifest" href="site.webmanifest">--}}
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/adminFrontend/assets/logo/HOLIDAYHEALTH.png') }}">--}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/adminFrontend/assets/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('public/adminFrontend/assets/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/adminFrontend/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/adminFrontend/assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/adminFrontend/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public/adminFrontend/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{ asset('public/adminFrontend/assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminFrontend/assets/css/style.css') }}">


    @yield('css')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>--}}

    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}



</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
{{--                <img src="{{ asset('public/adminFrontend/assets/img/logo/loder.jpg') }}" alt="">--}}
                <img src="{{ asset('public/adminFrontend/assets/logo/HOLIDAYHEALTH.png') }}" alt="">

            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('admin.frontend.index') }}"><img width="250px" src="{{ asset('public/adminFrontend/assets/logo/healthlogo.png') }}"
                                                 alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">

                                        <li><a @if(Route::is('admin.frontend.index'))  style="color: #FF3D1C" @else
                                                ''
                                            @endif href="{{ route('admin.frontend.index') }}">Home</a></li>
                                        <li><a @if(Route::is('admin.frontend.city'))  style="color: #FF3D1C" @else
                                                ''
                                            @endif href="{{ route('admin.frontend.city') }}">Cities</a></li>
                                        <li><a @if(Route::is('admin.frontend.diseases'))  style="color: #FF3D1C" @else
                                                ''
                                            @endif href="{{ route('admin.frontend.diseases') }}">Treatment</a></li>

                                        <li><a href="https://holidayhealthturkey.com/#aboutus">About Us</a></li>


{{--                                        <li><a @if(Route::is('admin.frontend.blog'))  style="color: #FF3D1C" @else--}}
{{--                                                ''--}}
{{--                                            @endif href="{{ route('admin.frontend.blog') }}">Blog</a></li>--}}



                                        <li class="add-list"><a href="{{ route('admin.frontend.offer') }}"><i
                                                    class="ti-plus"></i> Get An Offer</a></li>

                                        <li class="login"><a href="{{ route('login') }}">
                                                <i class="ti-user"></i> Agency Login</a>
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>


    @yield('content')


</main>
<footer>


    <style>

        .gt_float_switcher{
            background: #36cb61!important;
        }

    </style>

    <li style="background: black!important;" id="gtranslate_wrapper" class="add-list gtranslate_wrapper gtranslate_languages"></li>
    <script>window.gtranslateSettings = {"default_language":"en","languages":["en","fr","de","it","es","tr"],"wrapper_selector":".gtranslate_wrapper", 'background-color':"#000000"}</script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>


    <!-- Footer Start-->
    <div class="footer-area">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ route('admin.frontend.index') }}"><img width="250px"
                                            src="{{ asset('public/adminFrontend/assets/logo/healthlogo.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Link</h4>
                                <ul>
                                    <li><a href="{{ route('admin.frontend.index') }}">Home</a></li>
                                    <li><a href="{{ route('admin.frontend.city') }}">Cities</a></li>
                                    <li><a href="{{ route('admin.frontend.diseases') }}">Treatment</a></li>
                                    <li><a href="https://holidayhealthturkey.com/#aboutus">About Us</a></li>
{{--                                    <li><a href="#">Contact</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contracts</h4>
                                <ul>
                                    <li><a href="{{ route('admin.frontend.privacy.policy') }}">Privacy Policy</a></li>
                                    <li><a href="#">FAQ</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Download App</h4>

                               <p>Soon</p>

                                <ul>
                                    <li class="app-log"><a href="#"><img
                                                src="{{ asset('public/adminFrontend/assets/img/gallery/app-logo.png') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('public/adminFrontend/assets/img/gallery/app-logo2.png') }}"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                All rights reserved | This platform is made by <a
                                    href="https://buberka.com" target="_blank">Buberka</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


<!-- JS here -->


<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('public/adminFrontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('public/adminFrontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('public/adminFrontend/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('public/adminFrontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('public/adminFrontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Nice-select, sticky -->
<script src="{{ asset('public/adminFrontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('public/adminFrontend/assets/js/contact.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/mail-script.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('public/adminFrontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('public/adminFrontend/assets/js/main.js') }}"></script>


@yield('js')

</body>
</html>
