@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')



        <!-- Hero Start-->
        <div class="hero-area3 hero-overly2 d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-cap text-center pt-50 pb-20">
                            <h2>Our Listing</h2>
                        </div>
                        <!--Hero form -->
                        <form action="#" class="search-box search-box2">
                            <div class="input-form">
                                <input type="text" placeholder="What are you looking for?">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select name="select" id="select1">
                                        <option value="">All Catagories</option>
                                        <option value="">Catagories One</option>
                                        <option value="">Catagories Two</option>
                                        <option value="">Catagories Three</option>
                                        <option value="">Catagories Four</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Search box -->
                            <div class="search-form">
                                <a href="#">Search</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Hero End -->
        <!-- listing Area Start -->
        <div class="listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <h4>Advanced Filter</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- input -->
                                <div class="input-form">
                                    <input type="text" placeholder="What are you finding?">
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items1">
                                    <select name="select1">
                                        <option value="">Choose categories</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="select2">
                                        <option value="">Location</option>
                                        <option value="">Dhaka</option>
                                        <option value="">Mirpur</option>
                                        <option value="">Dannondi</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-140 pb-20">
                                    <label class="container">Full Time
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Ratings
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="select2">
                                        <option value="">Area (km)</option>
                                        <option value="">Dhaka- 1km</option>
                                        <option value="">Dinajpur- 2km</option>
                                        <option value="">Chittagong - 3km</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                            </div>

                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Price range</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <!-- <div id="slider-range"></div> -->
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <div class="price_text">
                                                    <p>Price :</p>
                                                </div>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Range Slider End -->
                                <a href="#" class="btn list-btn mt-20">Reset</a>
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-8 col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count mb-35">
                                    <span>{{ count($city) }} Listings are available</span>
                                </div>
                            </div>
                        </div>
                        <!-- listing Details Stat-->
                        <div class="popular-location ">
                            <div class="container ">

                                <div class="row d-flex justify-content-center">



                                    @foreach($city as $item)

                                            <div class="col-lg-6 ">

                                            <div class="single-location mb-30">
                                                <div class="location-img">
                                                    @if($item->image)
                                                        <img src="data:image/jpeg;base64,{{ $item->image }}"
                                                             alt="{{ $item->name }}">
                                                    @else

                                                        {{--                                <img src="{{ asset('public/admin/assets/media/svg/files/blank-image.svg') }}"--}}
                                                        {{--                                     alt="{{ $item->name }}">--}}

                                                        <img src="{{ asset('public/adminFrontend/assets/img/gallery/location1.png') }}" alt="{{ $item->name }}">
                                                    @endif
                                                </div>
                                                <div class="location-details mb-4">
                                                    <a href="#" ><p>{{ $item->name }}</p></a>


                                                    @foreach(json_decode($item->districts) as $district)
                                                        <span style="color: white" class="badge bg-secondary">#{{ $district }}</span>
                                                    @endforeach
                                                    <br>
                                                    {{--                            <a href="#" class="location-btn">65 <i class="ti-plus"></i> Location</a>--}}
                                                    <a href="#" ></a>
                                                </div>
                                            </div>
                                            </div>
                                    @endforeach



                                </div>

                            </div>
                        </div>



                        <!-- listing Details End -->
                        <!--Pagination Start  -->


                        <div class="pagination-area pt-70 text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-wrap d-flex justify-content-center">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-start" >


                                                    <li class="page-item">{!! $city->links() !!}</li>




                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>









{{--                        <div class=" pt-70 text-center">--}}
{{--                            <div class="container">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-12">--}}
{{--                                        <div class="single-wrap d-flex justify-content-center">--}}
{{--                                            <nav aria-label="Page navigation example">--}}
{{--                                                <ul class="pagination justify-content-start">--}}

{{--                                                    {!! $city->links() !!}--}}

{{--                                                </ul>--}}
{{--                                            </nav>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}





                        <!--Pagination End  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- listing-area Area End -->




@endsection

@section('js')
@endsection
