@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Home
@endsection

@section('css')
@endsection

@section('content')

    <style>

        @media only screen and (max-width: 600px) {
            .hero__caption span {
                font-size: 28px !important;
                margin-top: 30px !important;
            }
        }


        @media (min-width: 641px) {
            .location-img {
                width: 370px !important;
                height: 246px !important;
            }

            .img-diseases {
                width: 360px !important;
                height: 240px !important;
            }


            /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
        }

        @media (min-width: 961px) {
            .location-img {
                width: 370px !important;
                height: 246px !important;
            }

            .img-diseases {
                width: 360px !important;
                height: 240px !important;
            }

            /* tablet, landscape iPad, lo-res laptops ands desktops */
        }

        @media (min-width: 1025px) {
            .location-img {
                width: 370px !important;
                height: 246px !important;
            }

            .img-diseases {
                width: 360px !important;
                height: 240px !important;
            }

            /* big landscape tablets, laptops, and desktops */
        }

        @media (min-width: 1281px) {
            .location-img {
                width: 370px !important;
                height: 246px !important;
            }

            .img-diseases {
                width: 360px !important;
                height: 240px !important;
            }

            /* hi-res laptops and desktops */
        }


    </style>

    <!-- Hero Area Start-->
    <div class="slider-area hero-overly">
        <div class="single-slider hero-overly  slider-height d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <!-- Hero Caption -->
                        <div class="hero__caption">
                            <span style="font-family: 'Sulphur Point', sans-serif;" ;>Perfect Harmony of Health and Vacation</span>
                            <h1 style="font-size: 45px!important;">Just One Flight Away from Treatment and
                                Discoveries!</h1>
                        </div>
                        <!--Hero form -->

                        <style>
                            /* If you have a separate CSS file, add this there */
                            select#city_filter {
                                padding: 11px 19px 11px 30px;
                            }


                        </style>


                        <form class="search-box" action="{{ route('admin.frontend.diseases') }}" method="GET">

                            <div class="input-form">
                                <div class="select-form" style="width: 100%">
                                    <div class="select-itms">
                                        <select class="form-select form-control nice-select" name="city"
                                                id="city_filter">
                                            <option value="">City</option>
                                            @foreach($cityList as $item)
                                                <option
                                                    value="{{ $item->id }}" {{ request('city') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="select-form ">
                                <div class="select-itms">
                                    <select class="form-select form-control nice-select" name="category"
                                            id="category_filter">
                                        <option value="">Treatment Category</option>
                                        @foreach($categories as $item)
                                            <option
                                                value="{{ $item->id }}" {{ request('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="search-form">
                                <a href="#" onclick="submitForm()">Search</a>

                            </div>

                            <script>
                                function submitForm() {
                                    document.querySelector('.search-box').submit();
                                }
                            </script>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Hero Area End-->
    <!-- Popular Locations Start -->
    <div class="popular-location section-padding30">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Most visited places</span>
                        <h2>Featured Cities</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">

                @foreach($city as $item)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-location mb-30">
                            <div class="location-img">
                                @if($item->image)
                                    <img src="data:image/jpeg;base64,{{ $item->image }}"
                                         alt="{{ $item->name }}">
                                @else

                                    {{--                                <img src="{{ asset('public/admin/assets/media/svg/files/blank-image.svg') }}"--}}
                                    {{--                                     alt="{{ $item->name }}">--}}

                                    <img src="{{ asset('public/adminFrontend/assets/img/gallery/location1.png') }}"
                                         alt="{{ $item->name }}">
                                @endif
                            </div>
                            <div class="location-details mb-4">
                                <a href="{{ route('admin.frontend.city.detail',[$item->slug]) }}">
                                    <p>{{ $item->name }}</p></a>


                                @foreach(json_decode($item->districts) as $district)
                                    <span style="color: white" class="badge bg-secondary">#{{ $district }}</span>
                                @endforeach
                                <br>
                                {{--                            <a href="#" class="location-btn">65 <i class="ti-plus"></i> Location</a>--}}
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <!-- More Btn -->
            <div class="row justify-content-center">
                <div class="room-btn pt-20">
                    <a href="{{route('admin.frontend.city')}}" class="btn view-btn1">View All </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Locations End -->
    <!-- Services Area Start -->
    <div style="background-image: url('public/adminFrontend/assets/img/gallery/section_bg02.jpg'); color: white"
         class="services-area pt-150 pb-150 section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 text-center mb-80">
                        <span>Easy to explore</span>
                        <h2>How It Works</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6">
                    <div class="single-services text-center mb-50">
                        <div class="services-icon">
                            <span class="flaticon-list"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">1. Select Your City</a></h5>
                            {{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
                        </div>
                        <!-- Shpape -->
                        <img class="shape1 d-none d-lg-block"
                             src="{{ asset('public/adminFrontend/assets/img/icon/serices1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services text-center mb-50">
                        <div class="services-icon">
                            <span class="flaticon-problem"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">2. Choose Your Treatment</a></h5>
                            {{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
                        </div>
                        <img class="shape2 d-none d-lg-block"
                             src="{{ asset('public/adminFrontend/assets/img/icon/serices2.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-services text-center mb-50">
                        <div class="services-icon">
                            <span class="flaticon-respect"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">3. Get An Offer</a></h5>
                            {{--                            <p>incidid labore lore magna aliqua uisipsum suspendis loris.</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->
    <!-- Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>We are offering for you</span>
                        <h2>Featured Treatment</h2>
                    </div>
                </div>
            </div>

            <div class="listing-details-area">
                <div class="container">

                    <div class="row">


                        @foreach($diseases as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-listing mb-30">
                                    <div class="list-img">
                                        @if($item->image)
                                            <a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}"><img
                                                    class="img-diseases" src="data:image/jpeg;base64,{{ $item->image }}"
                                                    alt="{{ $item->title }}"></a>
                                        @else
                                            <a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}"><img
                                                    class="img-diseases"
                                                    src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                                    alt=""></a>
                                            {{--                                               <span>Open</span>--}}
                                        @endif
                                    </div>
                                    <div class="list-caption">
                                        <span><a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}">Detail</a></span>
                                        <h3>
                                            <a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}">{{ $item->title }}</a>
                                        </h3>
                                        {{--                                        <p>{!! $item->content ?  Str::limit($item->content, 100, '...') : '' !!} </p>--}}



                                        {{--                                <div class="list-footer">--}}
                                        {{--                                    @foreach($item->cities as $city)--}}
                                        {{--                                        <ul id="city">--}}

                                        {{--                                            <li>{{ $city->name }}</li>--}}


                                        {{--                                        </ul>--}}
                                        {{--                                    @endforeach--}}
                                        {{--                                </div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <!-- More Btn -->
                    <div class="row justify-content-center">
                        <div class="room-btn pt-20">
                            <a href="{{route('admin.frontend.diseases')}}" class="btn view-btn1">View All </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Categories Area End -->
    <!-- peoples-visit Start -->



    <style>
        .peoples-visit .single-visit.left-img::before {
            background-image: url('public/adminFrontend/assets/img/gallery/bg.jpg');
        }

    </style>


    <div class="peoples-visit dining-padding-top" id="aboutus">
        <!-- Single Left img -->
        <div class="single-visit left-img">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <div class="visit-caption">
                            <span>We are offering for you</span>
                            <h3>Every Month, Millions of People visit this site We’ve Built.</h3>
                            <p>Millions of people from all over the world both discover the unique beauties of Turkey
                                and benefit from health services at affordable costs.</p>
                            <!--Single Visit categories -->
                            <div class="visit-categories mb-40">
                                <div class="visit-location">
                                    <span class="flaticon-travel"></span>
                                </div>
                                <div class="visit-cap">
                                    <h4>Get the best offer for you</h4>
                                    <p>HOLIDAYHEALTHTURKEY.COM is a platform that allows you to quickly receive offers
                                        from all licensed health agencies in Turkey.
                                    </p>
                                </div>
                            </div>
                            <!--Single Visit categories -->
                            <div class="visit-categories">
                                <div class="visit-location">
                                    <span class="flaticon-work"></span>
                                </div>
                                <div class="visit-cap">
                                    <h4>Biggest Health Tourism Agencies listing</h4>
                                    <p>In Turkey, you can receive offers from a total of {{ $totalUser }} AGENCIES
                                        in {{ $totalCity }} different CITIES for a total of {{ $totalDiseases }}
                                        different TREATMENTS needs.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- peoples-visit End -->
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Our client testimonials</span>
                        <h2>What our users say?</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-11 col-md-11">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>I discovered this amazing platform that combines both vacation and medical
                                        treatment experiences in Turkey. Thanks to the health tourism agencies, I was
                                        able to fulfill my health needs while exploring the beauty of Turkey. Having
                                        access to health services while enjoying my vacation was an incredible
                                        experience. It made the dedicated time for my health even more valuable. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">
                                    <div class="founder-img">
                                        {{--                                        <img--}}
                                        {{--                                            src="{{ asset('public/adminFrontend/assets/img/testmonial/Homepage_testi.png') }}"--}}
                                        {{--                                            alt="">--}}
                                    </div>
                                    <div class="founder-text">
                                        <span>Emily Wilson</span>
                                        <p>Marketing Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>As someone interested in health tourism, this platform provided me with the
                                        opportunity to both vacation and receive medical services. Receiving treatment
                                        amidst Turkey's unique cultural heritage and natural beauty was a truly
                                        rejuvenating experience. The professionalism and service quality of the health
                                        tourism agencies ensured a seamless process. It's an ideal choice for combining
                                        vacation and health needs.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">
                                    <div class="founder-img">
                                        {{--                                        <img--}}
                                        {{--                                            src="{{ asset('public/adminFrontend/assets/img/testmonial/Homepage_testi.png') }}"--}}
                                        {{--                                            alt="">--}}
                                    </div>
                                    <div class="founder-text">
                                        <span>Alex Johnson</span>
                                        <p>Software Engineer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Subscribe Area Start -->

    <!-- Subscribe Area End -->
    <!-- Blog Ara Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our blog</span>
                        <h2>News and tips</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($blog as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-team mb-30">
                            <div class="team-img">

                                <a href="{{ route('admin.frontend.blog.detail', [$item->slug]) }}"><img style="width: 370px; height: 185px;" src="data:image/jpeg;base64,{{ $item->image }}"
                                                                                                         alt="{{ $item->name }}"></a>
                            </div>
                            <div class="team-caption">
                                <a href="{{ route('admin.frontend.category.blog', [$item->category_slug]) }}"><span>{{ $item->category_name }}</span></a>
                                <h3><a href="{{ route('admin.frontend.blog.detail', [$item->slug]) }}">{{ $item->title }}</a></h3>
                                <p>{{ $item->created_at->format('M d Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="room-btn pt-20">
                    <a href="{{route('admin.frontend.blog')}}" class="btn view-btn1">View All </a>
                </div>
            </div>


        </div>
    </div>
    <!-- Blog Ara End -->

@endsection

@section('js')
@endsection
