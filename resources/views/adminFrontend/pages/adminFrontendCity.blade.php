@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Cities
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
                            <h2>Cities</h2>
                        </div>
                        <!--Hero form -->

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

                        <form action="{{ route('admin.frontend.city') }}" method="GET">
                        <div class="category-listing mb-50">
                            <div class="single-listing">


                                <div class="select-job-items1">
                                    <label for="city_filter">City:</label>
                                    <select  class="form-select form-control nice-select" name="city" id="city_filter">
                                        <option value="">City</option>
                                        @foreach($cityList as $item)
                                            <option value="{{ $item->id }}" {{ request('city') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="select-job-items2">
                                    <label for="category_filter">Diseases Category:</label>
                                    <select  class="form-select form-control nice-select" name="category" id="category_filter">
                                        <option value="">Diseases Category</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}" {{ request('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>



                            </div>

                            <div class="single-listing">

                                <button id="filterButton" class="btn list-btn mt-20">Filter</button>
                                <a href="{{ route('admin.frontend.city') }}" id="resetButton" class="btn list-btn mt-20">Reset</a>

                            </div>

                        </div>
                        </form>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-8 col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="count mb-35">
                                    <span>{{ $totalCity->count() }} Listings are available</span>
                                </div>
                            </div>
                        </div>


                        @if(count($city) < 1)
                            <div  class="alert alert-warning ">No results found</div>
                        @endif



                        <!-- listing Details Stat-->
                        <div class="popular-location ">
                            <div class="container ">

                                <div class="row d-flex ">



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
                                                    <a href="{{ route('admin.frontend.city.detail',[$item->slug]) }}" ><p>{{ $item->name }}</p></a>


                                                    @foreach(json_decode($item->districts) as $district)
                                                        @php
                                                            $trimmedDistrict = trim($district);
                                                        @endphp
                                                        <span style="color: white" class="badge bg-secondary">#{{ $trimmedDistrict }}</span>
                                                    @endforeach
                                                    <br>


                                                    <ul>
                                                        @foreach($item->diseases as $disease)

                                                            <li style="color: white">{{ $disease->title }}</li>
                                                        @endforeach
                                                    </ul>


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


                                                    <li class="page-item"> {{ $city->appends(request()->except('page'))->links() }}</li>




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
