@extends('userFrontend_2.layout.userFrontend2Layout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>{!! ($home && $home->title) ? $home->title : 'Powerful Digital Solutions With Gp' !!}</h1>
                    <h2>{!! ($home && $home->description) ? $home->description : 'We are team of talented digital marketers' !!}</h2>
                </div>

            </div>


            {{--            <div class="d-flex justify-content-center justify-content-lg-start">--}}
            {{--                <a href="#contact" class="btn-get-started scrollto">Get Started</a>--}}
            {{--                <a href="https://www.youtube.com/watch?v=pHyXozlH5tc&amp;list=RDpHyXozlH5tc&amp;start_radio=1" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>--}}
            {{--            </div>--}}

            @if($home && $home->video)
                <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="col-xl-2 col-md-4">
                        <a href="{!! $home->video !!}" target="_blank" class="get-started-btn scrollto"><i
                                class="bi bi-play-circle"></i>&nbsp; &nbsp;Watch Video</a>
                    </div>

                </div>
            @endif


        </div>
    </section><!-- End Hero -->

    <main id="main">

        @if($about_us)
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            {{--                        <img src="{{ asset('public/userFrontend_2/assets/img/about.jpg') }}" class="img-fluid" alt="">--}}
                        </div>

                        <div class="section-title">
                            <h2>About Us</h2>
                            <p>Check our About Us</p>
                        </div>

                        <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                             data-aos-delay="100">
                            {!! $about_us ? $about_us->content : '' !!}
                        </div>
                    </div>

                </div>
            </section>
            <!-- End About Section -->
        @endif

        <!-- ======= Clients Section ======= -->
        {{--        <section id="clients" class="clients">--}}
        {{--            <div class="container" data-aos="zoom-in">--}}

        {{--                <div class="clients-slider swiper">--}}
        {{--                    <div class="swiper-wrapper align-items-center">--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-1.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-2.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-3.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-4.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-5.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-6.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-7.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                        <div class="swiper-slide"><img src="{{ asset('public/userFrontend_2/assets/img/clients/client-8.png') }}" class="img-fluid" alt=""></div>--}}
        {{--                    </div>--}}
        {{--                    <div class="swiper-pagination"></div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </section>--}}
        <!-- End Clients Section -->

        <!-- ======= Features Section ======= -->
        {{--        <section id="features" class="features">--}}
        {{--            <div class="container" data-aos="fade-up">--}}

        {{--                <div class="row">--}}
        {{--                    <div class="image col-lg-6" style='background-image: url("public/userFrontend_2/assets/img/features.jpg");' data-aos="fade-right"></div>--}}
        {{--                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">--}}
        {{--                        <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">--}}
        {{--                            <i class="bx bx-receipt"></i>--}}
        {{--                            <h4>Est labore ad</h4>--}}
        {{--                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>--}}
        {{--                        </div>--}}
        {{--                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">--}}
        {{--                            <i class="bx bx-cube-alt"></i>--}}
        {{--                            <h4>Harum esse qui</h4>--}}
        {{--                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>--}}
        {{--                        </div>--}}
        {{--                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">--}}
        {{--                            <i class="bx bx-images"></i>--}}
        {{--                            <h4>Aut occaecati</h4>--}}
        {{--                            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>--}}
        {{--                        </div>--}}
        {{--                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">--}}
        {{--                            <i class="bx bx-shield"></i>--}}
        {{--                            <h4>Beatae veritatis</h4>--}}
        {{--                            <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </section>--}}
        <!-- End Features Section -->

        @if(count($services) > 0)
            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Services</h2>
                        <p>Check our Services</p>
                    </div>

                    <div class="row justify-content-center">

                        @foreach($services as $item)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                                 data-aos-delay="100">
                                <div class="icon-box">
                                    <div class="icon"><i style="font-size: 20px;" class="{!! $item->icon !!}"></i></div>
                                    <h4><a href="">{{ $item->title }}</a></h4>
                                    {!! $item->content !!}
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
            <section id="pricing" class="portfolio">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Pricing</h2>
                        <p>Check our Pricing</p>
                    </div>


                    <div class="row text-center justify-content-center">
                        @foreach($pricing as $item)
                            <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                                 data-wow-delay="0.1s" data-wow-offset="0"
                                 style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <div class="pricing_design">
                                    <div class="single-pricing">
                                        <div class="price-head">
                                            <h2>{{ $item->title }}</h2>
                                            <h1>${{ $item->price }}</h1>
                                            <span>/{{ $item->price_suffix }}</span>
                                        </div>
                                        <ul>
                                            {!! $item->content !!}
                                        </ul>
                                        <div class="pricing-price">

                                        </div>
                                        <a href="#contact" class="price_btn">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <!--- END COL -->
                        @endforeach
                        {{--                            <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">--}}
                        {{--                                <div class="pricing_design">--}}
                        {{--                                    <div class="single-pricing">--}}
                        {{--                                        <div class="price-head">--}}
                        {{--                                            <h2>Personal</h2>--}}
                        {{--                                            <h1 class="price">$29</h1>--}}
                        {{--                                            <span>/Monthly</span>--}}
                        {{--                                        </div>--}}
                        {{--                                        <ul>--}}
                        {{--                                            <li><b>15</b> website</li>--}}
                        {{--                                            <li><b>50GB</b> Disk Space</li>--}}
                        {{--                                            <li><b>50</b> Email</li>--}}
                        {{--                                            <li><b>50GB</b> Bandwidth</li>--}}
                        {{--                                            <li><b>10</b> Subdomains</li>--}}
                        {{--                                            <li><b>Unlimited</b> Support</li>--}}
                        {{--                                        </ul>--}}
                        {{--                                        <div class="pricing-price">--}}

                        {{--                                        </div>--}}
                        {{--                                        <a href="#" class="price_btn">Order Now</a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        <!--- END COL -->

                    </div><!--- END ROW -->

                </div>
            </section><!-- End Portfolio Section -->
        @endif


        @if(count($faq) > 0)
            <!-- ======= Counts Section ======= -->
            <section id="faq" class="faq">
                <div class="container faq_area section_padding_130" data-aos="fade-up">

                    <div class="section-title">
                        {{--                    <h2>Frequently Asked Questions</h2>--}}
                        <h2>FAQ</h2>
                        <p>Check our Faq</p>
                    </div>

                    <div class="row justify-content-center faq_area section_padding_130">
                        <!-- FAQ Area-->
                        <div class="col-12 col-sm-10 col-lg-10">

                            <div class="accordion faq-accordian" id="faqAccordion">

                                @foreach($faq as $item)
                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s"
                                         style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="mb-0 collapsed" data-toggle="collapse"
                                                data-target="#collapseOne-{{$item->id}}" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ $item->title }}<span class="lni-chevron-up"></span></h6>
                                        </div>
                                        <div class="collapse" id="collapseOne-{{$item->id}}"
                                             aria-labelledby="headingOne" data-parent="#faqAccordion">
                                            <div class="card-body">
                                                {!! $item->content !!}

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{--                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">--}}
                                {{--                                        <div class="card-header" id="headingTwo">--}}
                                {{--                                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">The apps isn't installing?<span class="lni-chevron-up"></span></h6>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">--}}
                                {{--                                            <div class="card-body">--}}
                                {{--                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem facere deserunt sint animi sapiente vitae suscipit.</p>--}}
                                {{--                                                <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">--}}
                                {{--                                        <div class="card-header" id="headingThree">--}}
                                {{--                                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Contact form isn't working?<span class="lni-chevron-up"></span></h6>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">--}}
                                {{--                                            <div class="card-body">--}}
                                {{--                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem facere deserunt sint animi sapiente vitae suscipit.</p>--}}
                                {{--                                                <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                --}}
                            </div>
                            <!-- Support Button-->

                        </div>
                    </div>


                </div>
            </section>
            <!-- End Counts Section -->
        @endif



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                {{--                <div>--}}
                {{--                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>--}}
                {{--                </div>--}}

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>{!! $user->address !!}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $user->email }}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>{{ $user->phone }}</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

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
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                          required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection

@section('js')
@endsection
