@extends('userFrontend.layout.userFrontendLayout')

@section('title')
    Home
@endsection

@section('css')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" defer></script>

@endsection

@section('content')

    <section id="hero" class="d-flex align-items-center"
             style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                     data-aos="fade-up" data-aos-delay="200">
                    <h1>{!! ($home && $home->title) ? $home->title : 'Better Solutions For Your Business' !!}</h1>

                    <h2>{!! ($home && $home->description) ? $home->description : 'We are team of talented designers making websites with Bootstrap' !!}</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#contact" class="btn-get-started scrollto">Get Started</a>
                        @if($home && $home->video)
                            <a href="{!! $home->video !!}" class="glightbox btn-watch-video"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    @if($home && $home->image)

                        <img
                            src="data:image/jpeg;base64,{{ $home->image }}"
                            alt="{{ $home->image }}" class="img-fluid animated"/>

                    @else
                        <img src="{{ asset('userFrontend/assets/img/hero-img.png') }}" class="img-fluid animated"
                             alt="">
                    @endif
                </div>
            </div>
        </div>

    </section>








    {{--<div class="bd-example">--}}
    {{--    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background-color: #100f0f !important;">--}}

    {{--        <div class="carousel-inner"  >--}}
    {{--            <div class="carousel-item active">--}}
    {{--                <img  style="opacity: 0.5;" src="{{ asset('public/frontend/assets/img/gallery/best_pricingbg.jpg') }}" class="d-block w-100" alt="...">--}}
    {{--                <div class="carousel-caption d-none d-md-block">--}}
    {{--                    <h5>First slide label</h5>--}}
    {{--                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </div>--}}
    {{--</div>--}}

    {{--    <style>--}}


    {{--        .bottom-left {--}}
    {{--            position: absolute;--}}
    {{--            bottom: 8px;--}}
    {{--            left: 16px;--}}
    {{--        }--}}

    {{--        .top-left {--}}
    {{--            position: absolute;--}}
    {{--            top: 8px;--}}
    {{--            left: 16px;--}}
    {{--        }--}}

    {{--        .top-right {--}}
    {{--            position: absolute;--}}
    {{--            top: 8px;--}}
    {{--            right: 16px;--}}
    {{--        }--}}

    {{--        .bottom-right {--}}
    {{--            position: absolute;--}}
    {{--            bottom: 8px;--}}
    {{--            right: 16px;--}}
    {{--        }--}}

    {{--        .centered {--}}
    {{--            position: absolute;--}}
    {{--            top: 50%;--}}
    {{--            left: 50%;--}}
    {{--            transform: translate(-50%, -50%);--}}
    {{--        }--}}
    {{--    </style>--}}

    {{--    <style>--}}

    {{--        .video-background-holder {--}}
    {{--            position: relative;--}}

    {{--            /*height: calc(100vh - 72px);*/--}}

    {{--            width: 100%;--}}
    {{--            overflow: hidden;--}}
    {{--        }--}}

    {{--        .video-background-holder video {--}}
    {{--            color: red;--}}
    {{--            position: absolute;--}}
    {{--            top: 50%;--}}

    {{--            left: 50%;--}}
    {{--            max-width: 100%!important;--}}
    {{--            /*max-height: 100%!important;*/--}}

    {{--            height: auto;--}}
    {{--            z-index: 0;--}}
    {{--            -ms-transform: translateX(-50%) translateY(-50%);--}}
    {{--            -moz-transform: translateX(-50%) translateY(-50%);--}}
    {{--            -webkit-transform: translateX(-50%) translateY(-50%);--}}
    {{--            transform: translateX(-50%) translateY(-50%);--}}
    {{--        }--}}

    {{--        @media (max-width: 991px){--}}
    {{--            #hero {--}}
    {{--                height: 360px!important;--}}
    {{--            }--}}
    {{--        }--}}

    {{--        @media only screen and (max-width: 600px) {--}}




    {{--            .video-background-holder video {--}}

    {{--                /*color: red;*/--}}
    {{--                position: absolute;--}}

    {{--                top: 58%;--}}
    {{--                left: 50%;--}}
    {{--                /*min-width: 100%;*/--}}
    {{--                /*min-height: 99%;*/--}}
    {{--                /*width: auto;*/--}}
    {{--                /*height: auto;*/--}}
    {{--                z-index: 0;--}}
    {{--                -ms-transform: translateX(-50%) translateY(-50%);--}}
    {{--                -moz-transform: translateX(-50%) translateY(-50%);--}}
    {{--                -webkit-transform: translateX(-50%) translateY(-50%);--}}
    {{--                transform: translateX(-50%) translateY(-50%);--}}
    {{--            }--}}

    {{--            .video-background-holder {--}}
    {{--                position: relative;--}}

    {{--                overflow: hidden;--}}
    {{--            }--}}

    {{--            .slider-active{--}}
    {{--                /*height: 250px!important;*/--}}
    {{--            }--}}
    {{--        }--}}

    {{--        .video-background-content {--}}
    {{--            position: relative;--}}
    {{--            z-index: 2;--}}
    {{--        }--}}

    {{--        .video-background-overlay {--}}
    {{--            position: absolute;--}}
    {{--            top: 0;--}}
    {{--            left: 0;--}}
    {{--            /*height: 100%;*/--}}
    {{--            /*width: 100%;*/--}}

    {{--            opacity: 0.5;--}}
    {{--            z-index: 1;--}}
    {{--        }--}}



    {{--        code {--}}
    {{--            padding: 0 0.15rem;--}}
    {{--            /*background: #f5f5f5;*/--}}
    {{--            border-radius: 0.2rem;--}}
    {{--        }--}}

    {{--        .scroll-down {--}}
    {{--            /*height: 60px;*/--}}
    {{--            /*width: 30px;*/--}}
    {{--            /*border: 2px solid black;*/--}}
    {{--            position: absolute;--}}
    {{--            left: 50%;--}}
    {{--            /*bottom: 40px;*/--}}
    {{--            border-radius: 50px;--}}
    {{--            cursor: pointer;--}}
    {{--        }--}}

    {{--        .scroll-down::before,--}}
    {{--        .scroll-down::after {--}}
    {{--            content: "";--}}
    {{--            position: absolute;--}}
    {{--            /*top: 20%;*/--}}
    {{--            /*left: 50%;*/--}}
    {{--            /*height: 10px;*/--}}
    {{--            /*width: 10px;*/--}}
    {{--            transform: translate(-50%, -100%) rotate(45deg);--}}
    {{--            border: 2px solid white;--}}
    {{--            border-top: transparent;--}}
    {{--            border-left: transparent;--}}
    {{--            animation: scroll-down 1s ease-in-out infinite;--}}
    {{--        }--}}

    {{--        .scroll-down::before {--}}
    {{--            top: 30%;--}}
    {{--            animation-delay: 0.3s;--}}

    {{--        }--}}

    {{--        @keyframes scroll-down {--}}
    {{--            0% {--}}

    {{--                opacity: 0;--}}
    {{--            }--}}
    {{--            30% {--}}
    {{--                opacity: 1;--}}
    {{--            }--}}
    {{--            60% {--}}
    {{--                opacity: 1;--}}
    {{--            }--}}
    {{--            100% {--}}
    {{--                top: 90%;--}}
    {{--                opacity: 0;--}}
    {{--            }--}}
    {{--        }--}}

    {{--        #hero{--}}
    {{--            height: 100vh;--}}
    {{--        }--}}

    {{--        #detach-button-host{--}}
    {{--            display: none!important;--}}
    {{--        }--}}

    {{--    </style>--}}

    {{--    <div class="" >--}}
    {{--        @if($frontend->slider_image)--}}

    {{--            <div class="slider-area " >--}}
    {{--                <div class="slider-active">--}}
    {{--                    <div class="video-background-holder" id="hero">--}}
    {{--                        <div class="video-background-overlay"></div>--}}
    {{--                        <video style="width: 1110px!important;  margin-top: 45px" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
    {{--                            <source src="{{ asset('public/acente/slider/'.$frontend->slider_image) }}"--}}
    {{--                                    type="video/mp4">--}}
    {{--                        </video>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        @else--}}
    {{--            --}}
    {{--            <div class="slider-area " >--}}
    {{--                <div class="slider-active">--}}
    {{--                    <div class="video-background-holder" id="hero">--}}
    {{--                        <div class="video-background-overlay"></div>--}}
    {{--                        <video style="width: 1110px!important;  margin-top: 45px" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
    {{--                            <source src="{{ asset('public/acente/slider/default.mp4') }}"--}}
    {{--                                    type="video/mp4">--}}
    {{--                        </video>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--        --}}
    {{--    </div>--}}









    <main id="main">

        {{--                <section id="clients" class="clients section-bg">--}}
        {{--                    <div class="container">--}}

        {{--                        <div class="row" data-aos="zoom-in">--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-1.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">--}}
        {{--                                <img src="{{ asset('public/userFrontend/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">--}}
        {{--                            </div>--}}

        {{--                        </div>--}}

        {{--                    </div>--}}
        {{--                </section>--}}

        @if($about_us)
            <!-- ======= About Us Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>About Us</h2>
                    </div>

                    <div class="row content">
                        {!! $about_us ? $about_us->content : '' !!}

                    </div>

                </div>
            </section>
            <!-- End About Us Section -->
        @endif


        @if(count($services) > 0)
            <!-- ======= Services Section ======= -->
            <section id="services" class="services section-bg tex">

                <div class="container" data-aos="fade-up">


                    <div class="section-title">
                        <h2>Services</h2>
                    </div>

                    <div class="row justify-content-center">

                        @foreach($services as $item)
                            <div class="col-xl-3  align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                                 data-aos-delay="400">
                                <div class="icon-box mt-4">
                                    <div class="icon"><i class="{{ $item->icon }}"></i></div>
                                    <h2> {{ $item->title }} </h2>
                                    <p> {!! $item->content !!} </p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </section>
            <!-- End Services Section -->
        @endif


        @if(count($pricing) > 0)
            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Pricing</h2>
                    </div>

                    <div class="row mt-4 justify-content-center">
                        @foreach($pricing as $item)
                            <div style="margin-top: 10px; margin-bottom: 10px;" class="col-lg-4 mt-4 mb-4 mt-lg-0"
                                 data-aos="fade-up" data-aos-delay="200">
                                <div class="box featured">
                                    <h3>{{ $item->title }}</h3>
                                    <h4><sup>$</sup>{{ $item->price }}<span>{{ $item->price_suffix }} </span></h4>

                                    {!! $item->content !!}

                                    <a href="#contact" class="buy-btn">Get Started</a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </section><!-- End Pricing Section -->
        @endif


        @if(count($faq) > 0)
            <!-- ======= Frequently Asked Questions Section ======= -->
            <section id="faq" class="faq section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Frequently Asked Questions</h2>
                    </div>

                    <div class="faq-list">
                        <ul>
                            @foreach($faq as $item)
                                <li data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-help-circle icon-help"></i>
                                    <a data-bs-toggle="collapse" data-bs-target="#faq-list-{{$item->id}}"
                                       class="collapsed">
                                        {{ $item->title }}
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="faq-list-{{$item->id}}" class="collapse" data-bs-parent=".faq-list">
                                        {!! $item->content !!}
                                    </div>
                                </li>

                            @endforeach


                        </ul>
                    </div>

                </div>
            </section><!-- End Frequently Asked Questions Section -->

        @endif

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p> {!! $user->address !!} </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <a href="mailto: {{ $user->email }} "><p> {{ $user->email }} </p>
                                </a>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <a href="tel:{{ $user->phone }}"><p> {{ $user->phone }} </p></a>
                            </div>

                            {{--                            <iframe--}}
                            {{--                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"--}}
                            {{--                                frameborder="0" style="border:0; width: 100%; height: 290px;"--}}
                            {{--                                allowfullscreen></iframe>--}}
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="" method="post"
                              role="form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="form-group text-center">
                                <div class="cf-turnstile" data-sitekey="0x4AAAAAAAEVsNnQi_gRAdmM"
                                     data-callback="javascriptCallback"></div>
                            </div>


                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

        <script>
            window.onloadTurnstileCallback = function () {
                turnstile.render('.econtact_form', {
                    sitekey: '0x4AAAAAAAEVsNnQi_gRAdmM',
                    callback: function (token) {
                        console.log(`Challenge Success ${token}`);
                    },
                });
            };
        </script>


    </main><!-- End #main -->

@endsection

@section('js')
@endsection
