@extends('userFrontend_3.layout.userFrontend3Layout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero"
             style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>{!! ($home && $home->title) ? $home->title : 'Welcome to Impact' !!}</h2>
                    <p>{!! ($home && $home->description) ? $home->description : 'Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.' !!}</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#contact" class="btn-get-started">Get Started</a>


                        @if($home && $home->video)
                            <a href="{!! $home->video !!}"
                               class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        @endif


                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">

                    @if($home && $home->image)

                        <img
                            src="data:image/jpeg;base64,{{ $home->image }}"
                            alt="{{ $home->image }}" class="img-fluid"  data-aos="zoom-out" data-aos-delay="100" alt=""/>

                    @else
                        <img src="{{ asset('public/userFrontend_3/assets/img/hero-img.svg') }}" class="img-fluid" alt=""
                             data-aos="zoom-out" data-aos-delay="100">
                    @endif



                </div>
            </div>
        </div>


    </section>
    <!-- End Hero Section -->

    <main id="main">

        @if($about_us)
            <!-- ======= About Us Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>About Us</h2>
                    </div>

                    <div class="row gy-4">
                        {!! $about_us ? $about_us->content : '' !!}
                    </div>

                </div>
            </section>
            <!-- End About Us Section -->
        @endif

        <!-- ======= Clients Section ======= -->
        {{--        <section id="clients" class="clients">--}}
        {{--            <div class="container" data-aos="zoom-out">--}}

        {{--                <div class="clients-slider swiper">--}}
        {{--                    <div class="swiper-wrapper align-items-center">--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-1.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-2.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-3.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-4.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-5.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-6.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-7.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_3/assets/img/clients/client-8.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </section>--}}
        <!-- End Clients Section -->




        @if(count($services) > 0)
            <!-- ======= Our Services Section ======= -->
            <section id="services" class="services sections-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Our Services</h2>
                    </div>

                    <div class="row gy-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">

                        @foreach($services as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item  position-relative">
                                    <div class="icon">
                                        <i class="{!! $item->icon !!}"></i>
                                    </div>
                                    <h3>{{ $item->title }}</h3>
                                    {!! $item->content !!}
                                    {{--                            <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>--}}
                                </div>
                            </div>
                            <!-- End Service Item -->
                        @endforeach

                    </div>

                </div>
            </section>
            <!-- End Our Services Section -->
        @endif




        @if(count($pricing) > 0)
            <!-- ======= Pricing Section ======= -->
            <section id="pricing" class="pricing sections-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Pricing</h2>
                    </div>

                    <div class="row g-4 py-lg-5 justify-content-center" data-aos="zoom-out" data-aos-delay="100">

                        @foreach($pricing as $item)
                            <div class="col-lg-4">
                                <div class="pricing-item">
                                    <h3>{{ $item->title }}</h3>
                                    {{--                            <div class="icon">--}}
                                    {{--                                <i class="bi bi-box"></i>--}}
                                    {{--                            </div>--}}
                                    <h4><sup>$</sup>{{ $item->price }}<span> / {{ $item->price_suffix }}</span></h4>
                                    <ul>
                                        {!! $item->content !!}
                                    </ul>
                                    <div class="text-center"><a href="#contact" class="buy-btn">Buy Now</a></div>
                                </div>
                            </div>
                            <!-- End Pricing Item -->
                        @endforeach

                    </div>

                </div>
            </section>
            <!-- End Pricing Section -->

        @endif


        @if(count($faq) > 0)
            <!-- ======= Frequently Asked Questions Section ======= -->
            <section id="faq" class="faq">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4">

                        <div class="col-lg-4">
                            <div class="content px-xl-5">
                                <h3>Frequently Asked <strong>Questions</strong></h3>
                            </div>
                        </div>

                        <div class="col-lg-8">

                            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                                @foreach($faq as $item)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#faq-content-{{$item->id}}">
                                                <span class="num"> <i class="fa fa-question-circle"
                                                                      aria-hidden="true"></i></span>
                                                {{ $item->title }}
                                            </button>
                                        </h3>
                                        <div id="faq-content-{{$item->id}}" class="accordion-collapse collapse"
                                             data-bs-parent="#faqlist">
                                            <div class="accordion-body">
                                                {!! $item->content !!}
                                            </div>
                                        </div>
                                    </div><!-- # Faq item-->
                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <!-- End Frequently Asked Questions Section -->
        @endif


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact</h2>
                </div>

                <div class="row gx-lg-0 gy-4">

                    <div class="col-lg-4">

                        <div class="info-container d-flex flex-column align-items-center justify-content-center"
                             style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
                            <div class="info-item d-flex"
                                 style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>{!! $user->address !!}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex"
                                 style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex"
                                 style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>{{ $user->phone }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            {{--                            <div class="info-item d-flex">--}}
                            {{--                                <i class="bi bi-clock flex-shrink-0"></i>--}}
                            {{--                                <div>--}}
                            {{--                                    <h4>Open Hours:</h4>--}}
                            {{--                                    <p>Mon-Sat: 11AM - 23PM</p>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <!-- End Info Item -->
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="7" placeholder="Message"
                                          required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                        style="background: {!! ($home && $home->backgroundColor) ? $home->backgroundColor : '' !!}">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection

@section('js')
@endsection
