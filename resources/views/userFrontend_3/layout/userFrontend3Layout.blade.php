<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Impact Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>

    <!-- Favicons -->
    @if($home && $home->logo)
        <link rel="icon" type="image/x-icon" href="data:image/jpeg;base64,{{ $home->logo }}"/>
    @endif
{{--    <link href="{{ asset('public/userFrontend_3/assets/img/favicon.png') }}" rel="icon">--}}
{{--    <link href="{{ asset('public/userFrontend_3/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">--}}

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/userFrontend_3/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/userFrontend_3/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/userFrontend_3/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/userFrontend_3/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/userFrontend_3/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('public/userFrontend_3/assets/css/main.css') }}" rel="stylesheet">

    @yield('css')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
              integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- =======================================================
    * Template Name: Impact
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{ $user->email }}</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $user->phone }}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">


            @foreach($social_media as $item)
                @if($item->icon == 'fa-facebook')
                    <a href="{!! $item->link !!}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                @elseif($item->icon == 'fa-instagram')
                    <a href="{!! $item->link !!}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                @elseif($item->icon == 'fa-twitter')
                    <a href="{!! $item->link !!}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                @elseif($item->icon == 'fa-linkedin')
                    <a href="{!! $item->link !!}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                @elseif($item->icon == 'fa-youtube')
                    <a href="{!! $item->link !!}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                @else
                @endif
            @endforeach


        </div>
    </div>
</section><!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ route('user.frontend.index', [$user->slug]) }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->

            @if($home && $home->logo)
{{--                <a href="{{ route('user.frontend.index', [$user->slug]) }}" class="logo me-auto me-lg-0">--}}
                    <img
                        src="data:image/jpeg;base64,{{ $home->logo }}"
                        alt="{{ $home->logo }}" class="img-fluid animated"/>
{{--                </a>--}}

            @else
                <h1><span></span></h1>
            @endif



        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="#hero">Home</a></li>
               @if($about_us) <li><a href="#about">About</a></li>@endif
                @if(count($services)>0)<li><a href="#services">Services</a></li>@endif
                @if(count($pricing)>0)<li><a href="#pricing">Pricing</a></li>@endif
                @if(count($faq)>0)<li><a href="#faq">Faq</a></li>@endif
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
<!-- End Header -->



@yield('content')



<!-- ======= Footer ======= -->
<footer id="footer" class="footer" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-12 footer-info">

                <h4>Our Social Networks</h4>
                <div class="social-links d-flex mt-4">

                    @foreach($social_media as $item)
                        @if($item->icon == 'fa-facebook')
                            <a href="{!! $item->link !!}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        @elseif($item->icon == 'fa-instagram')
                            <a href="{!! $item->link !!}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        @elseif($item->icon == 'fa-twitter')
                            <a href="{!! $item->link !!}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        @elseif($item->icon == 'fa-linkedin')
                            <a href="{!! $item->link !!}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        @elseif($item->icon == 'fa-youtube')
                            <a href="{!! $item->link !!}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                        @else
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="col-lg-3 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>

                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                   {!! $user->address !!}
                    <br><br>
                    <strong>Phone:</strong> {{ $user->phone }}<br>
                    <strong>Email:</strong> {{ $user->phone }}<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader" style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('public/userFrontend_3/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/userFrontend_3/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('public/userFrontend_3/assets/js/main.js') }}"></script>

@yield('js')

</body>

</html>
