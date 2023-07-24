<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield("title") </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {{--    <link rel="manifest" href="site.webmanifest">--}}
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}

</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('public/adminFrontend/assets/img/logo/loder.jpg') }}" alt="">
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
                                <a href="#"><img src="{{ asset('public/adminFrontend/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">

                                        <li><a @if(Route::is('admin.frontend.index'))  style="color: #FF3D1C" @else '' @endif href="{{ route('admin.frontend.index') }}">Home</a></li>
                                        <li ><a  @if(Route::is('admin.frontend.city'))  style="color: #FF3D1C" @else '' @endif href="{{ route('admin.frontend.city') }}">Cities</a></li>
                                        <li ><a  @if(Route::is('admin.frontend.diseases'))  style="color: #FF3D1C" @else '' @endif href="{{ route('admin.frontend.diseases') }}">Diseases</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a @if(Route::is('admin.frontend.category'))  style="color: #FF3D1C" @else '' @endif href="{{ route('admin.frontend.category') }}">Catagories</a></li>
                                        <li><a href="listing.html">Listing</a></li>
                                        <li><a href="#" @if(Route::is('admin.frontend.blog'))  style='color: #FF3D1C' @else '' @endif>Page</a>
                                            <ul class="submenu">
                                                <li><a @if(Route::is('admin.frontend.blog'))  style='color: #FF3D1C' @else '' @endif href="{{ route('admin.frontend.blog') }}">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="listing_details.html">Listing details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li class="add-list"><a href="listing_details.html"><i class="ti-plus"></i> add
                                                Listing</a></li>
                                        <li class="login"><a href="#">
                                                <i class="ti-user"></i> Sign in or Register</a>
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
                                    <a href="#"><img src="{{ asset('public/adminFrontend/assets/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Link</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Listing</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Categories</h4>
                                <ul>
                                    <li><a href="#">Reasonable Hotel</a></li>
                                    <li><a href="#">Popular Restaurant</a></li>
                                    <li><a href="#">Easy Shopping</a></li>
                                    <li><a href="#">Night Life</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Download App</h4>
                                <ul>
                                    <li class="app-log"><a href="#"><img src="{{ asset('public/adminFrontend/assets/img/gallery/app-logo.png') }}"
                                                                         alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/adminFrontend/assets/img/gallery/app-logo2.png') }}" alt=""></a></li>
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
                                All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                    aria-hidden="true"></i> by <a
                                    href="#" target="_blank">Colorlib</a>
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
