@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Home
@endsection

@section('css')
@endsection

@section('content')

    <style>


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
                            <span>Perfect Harmony of Health and Vacation</span>
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
                                        <option value="">Diseases Category</option>
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
    <div class="services-area pt-150 pb-150 section-bg" data-background="assets/img/gallery/section_bg02.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 text-center mb-80">
                        <span>Easy to explore</span>
                        <h2 style="color: black">How It Works</h2>
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
                            <h5 style="color: black"><a style="color: black" href="#">1. Select Your City</a></h5>
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
                            <h5 style="color: black"><a style="color: black" href="#">2. Choose Your Disease</a></h5>
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
                            <h5 style="color: black"><a style="color: black" href="#">3. Get An Offer</a></h5>
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
                        <h2>Featured Diseases</h2>
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
    <div class="peoples-visit dining-padding-top">
        <!-- Single Left img -->
        <div class="single-visit left-img">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8">
                        <div class="visit-caption">
                            <span>We are offering for you</span>
                            <h3>Every Month, Millions of People
                                visit this site We’ve Built.</h3>
                            <p>Unlike what its name implies, dry cleaning is not actually a 'dry' process. Clothes are
                                soaked in a different solvent.</p>
                            <!--Single Visit categories -->
                            <div class="visit-categories mb-40">
                                <div class="visit-location">
                                    <span class="flaticon-travel"></span>
                                </div>
                                <div class="visit-cap">
                                    <h4>Great places in the world</h4>
                                    <p>Unlike what its name implies, dry cleaning is not actu process. Clothes soaked
                                        differentent.
                                    </p>
                                </div>
                            </div>
                            <!--Single Visit categories -->
                            <div class="visit-categories">
                                <div class="visit-location">
                                    <span class="flaticon-work"></span>
                                </div>
                                <div class="visit-cap">
                                    <h4>Biggest category listing</h4>
                                    <p>Unlike what its name implies, dry cleaning is not actu process. Clothes soaked
                                        differentent.
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
                        <h2>What our client say</h2>
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
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore
                                        mas. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">
                                    <div class="founder-img">
                                        <img
                                            src="{{ asset('public/adminFrontend/assets/img/testmonial/Homepage_testi.png') }}"
                                            alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Oliva jems</span>
                                        <p>UIX designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan lacus vel facilisis por incididunt ut labore et dolore
                                        mas. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center mb-30">
                                    <div class="founder-img">
                                        <img
                                            src="{{ asset('public/adminFrontend/assets/img/testmonial/Homepage_testi.png') }}"
                                            alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Oliva jems</span>
                                        <p>UIX designer</p>
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

    <!-- Blog Ara End -->

@endsection

@section('js')
@endsection
