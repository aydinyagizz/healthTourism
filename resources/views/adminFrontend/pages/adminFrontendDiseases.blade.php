@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Treatment
@endsection

@section('css')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')


    <style>


        @media (min-width: 641px) {

            .img-diseases {
                width: 355px !important;
                height: 247px !important;
            }



            /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
        }
        @media (min-width: 961px) {


            .img-diseases {
                width: 355px !important;
                height: 247px !important;
            }

            /* tablet, landscape iPad, lo-res laptops ands desktops */
        }

        @media (min-width: 1025px) {


            .img-diseases {
                width: 355px !important;
                height: 247px !important;
            }

            /* big landscape tablets, laptops, and desktops */
        }

        @media (min-width: 1281px) {


            .img-diseases {
                width: 355px !important;
                height: 247px !important;
            }

            /* hi-res laptops and desktops */
        }


    </style>

    <!-- Hero Start-->
    <div class="hero-area3 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="hero-cap text-center pt-50 pb-20">
                        <h2>Treatment</h2>
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
{{--                    <form id="filterForm" action="{{ route('adminFrontend.filterResults') }}" method="GET">--}}
                    <form action="{{ route('admin.frontend.diseases') }}" method="GET">
                    <div class="category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">


                            <div class="select-job-items1">
                                <label for="city_filter">City:</label>
                                <select class="form-select form-control nice-select" name="city" id="city_filter">
                                    <option value="">City</option>
                                    @foreach($city as $item)
                                        <option value="{{ $item->id }}" {{ request('city') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="select-job-items2">
                                <label for="category_filter">Treatment Category:</label>
                                <select class="form-select form-control nice-select" name="category" id="category_filter">
                                    <option value="">Treatment Category</option>
                                    @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ request('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>

                        <div class="single-listing">

                            <button id="filterButton" class="btn list-btn mt-20">Filter</button>
                            <a href="{{ route('admin.frontend.diseases') }}" id="resetButton" class="btn list-btn mt-20">Reset</a>

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
                                <span>{{ $totalDiseases->count() }} Listings are available</span>
                            </div>
                        </div>
                    </div>


                    @if(count($diseases) < 1)
                    <div  class="alert alert-warning ">No results found</div>
                        @endif


                    <!-- listing Details Stat-->
                    <div class="listing-details-area">
                        <div class="container">
                            <div class="row">





                                @foreach($diseases as $item)
                                    <div class="col-lg-6 ">
                                        <div class="single-listing mb-30">
                                            <div class="list-img">
                                                @if($item->image)
                                                    <a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}"><img class="img-diseases" src="data:image/jpeg;base64,{{ $item->image }}"
                                                                                                                                alt="{{ $item->title }}"></a>
                                                @else
                                                    <a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}"><img
                                                        src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                                        alt=""></a>
                                                    {{--                                               <span>Open</span>--}}
                                                @endif
                                            </div>
                                            <div class="list-caption">
                                                <span><a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}">Detail</a></span>
                                                <h3><a href="{{ route('admin.frontend.diseases.detail', [$item->slug]) }}">{{ $item->title }}</a></h3>
{{--                                                <p>{!! $item->content ?  Str::limit($item->content, 50, '...') : '' !!} </p>--}}


                                                {{--                                                <div class="list-footer">--}}

                                                <hr>
                                                    <ul class="blog-info-link ">
                                                    @foreach($item->cities as $city)

                                                         <li ><a style="color: #FF3D1C" href="{{ route('admin.frontend.city.detail', [$city->slug]) }}">#{{ $city->name }}</a></li>



                                                    @endforeach
                                                        </ul>



{{--                                                </div>--}}
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
                                            <ul class="pagination justify-content-start">
                                                <li class="page-item">{{ $diseases->appends(request()->except('page'))->links() }}</li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Pagination End  -->
                </div>
            </div>
        </div>
    </div>
    <!-- listing-area Area End -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-59ME28E+WSOm+RRT0EkDnzUBfl3xE3gLFY4mqe3M8pkIDTzcnSgGLJWmFF+7P9qifbYUfIhWqrb+/Mcf6kHvw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#city_filter, #disease_filter').on('change', function () {--}}
{{--                updateResults();--}}
{{--            });--}}

{{--            function updateResults() {--}}
{{--                const cityId = $('#city_filter').val();--}}
{{--                const diseaseId = $('#disease_filter').val();--}}

{{--                // Ajax isteği gönder--}}
{{--                $.ajax({--}}
{{--                    url: '{{ route("adminFrontend.filterResults") }}',--}}
{{--                    method: 'GET',--}}
{{--                    data: {city: cityId, disease: diseaseId},--}}
{{--                    dataType: 'json',--}}
{{--                    success: function (data) {--}}
{{--                        if(data.length > 0){--}}


{{--                        const listingDetailsArea = $('.listing-details-area .container .row');--}}
{{--                        listingDetailsArea.empty();--}}

{{--                        $.each(data, function (index, item) {--}}
{{--                            const colDiv = $('<div></div>').addClass('col-lg-6');--}}
{{--                            const singleListing = $('<div></div>').addClass('single-listing mb-30');--}}
{{--                            const listImg = $('<div></div>').addClass('list-img');--}}

{{--                            if (item.image) {--}}
{{--                                listImg.append($('<img>').attr('src', 'data:image/jpeg;base64,' + item.image).attr('alt', item.title));--}}
{{--                            } else {--}}
{{--                                listImg.append($('<img>').attr('src', '{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}').attr('alt', ''));--}}
{{--                            }--}}

{{--                            const listCaption = $('<div></div>').addClass('list-caption');--}}
{{--                            listCaption.append($('<span></span>').text('Open'));--}}
{{--                            listCaption.append($('<h3></h3>').append($('<a></a>').attr('href', '#').text(item.title)));--}}
{{--                            listCaption.append($('<p></p>').html(item.content ? item.content.substring(0, 50) + '...' : ''));--}}
{{--                            const listFooter = $('<div></div>').addClass('list-footer');--}}

{{--                            $.each(item.cities, function (index, city) {--}}
{{--                                listFooter.append($('<ul></ul>').append($('<li></li>').text(city.name)));--}}
{{--                            });--}}

{{--                            listCaption.append(listFooter);--}}
{{--                            singleListing.append(listImg);--}}
{{--                            singleListing.append(listCaption);--}}
{{--                            colDiv.append(singleListing);--}}
{{--                            listingDetailsArea.append(colDiv);--}}
{{--                        });--}}



{{--                            $('#noResultsMessage').addClass('d-none');--}}

{{--                        } else{--}}
{{--                            $('#noResultsMessage').removeClass('d-none');--}}
{{--                         //   $('#resultsContainer').empty();--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}



{{--    TODO: çalışan--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#city_filter, #disease_filter').on('change', function () {--}}
{{--                updateResults();--}}
{{--            });--}}

{{--            function updateResults() {--}}
{{--                const cityId = $('#city_filter').val();--}}
{{--                const diseaseId = $('#disease_filter').val();--}}

{{--                // Ajax isteği gönder--}}
{{--                $.ajax({--}}
{{--                    url: '{{ route("adminFrontend.filterResults") }}',--}}
{{--                    method: 'GET',--}}
{{--                    data: {city: cityId, disease: diseaseId},--}}
{{--                    dataType: 'json',--}}
{{--                    success: function (data) {--}}
{{--                        const listingDetailsArea = $('.listing-details-area .container .row');--}}
{{--                        listingDetailsArea.empty();--}}

{{--                        if (data.length > 0) {--}}
{{--                            $.each(data, function (index, item) {--}}
{{--                                const colDiv = $('<div></div>').addClass('col-lg-6');--}}
{{--                                const singleListing = $('<div></div>').addClass('single-listing mb-30');--}}
{{--                                const listImg = $('<div></div>').addClass('list-img');--}}

{{--                                if (item.image) {--}}
{{--                                    listImg.append($('<img>').attr('src', 'data:image/jpeg;base64,' + item.image).attr('alt', item.title));--}}
{{--                                } else {--}}
{{--                                    listImg.append($('<img>').attr('src', '{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}').attr('alt', ''));--}}
{{--                                }--}}

{{--                                const listCaption = $('<div></div>').addClass('list-caption');--}}
{{--                                listCaption.append($('<span></span>').text('Open'));--}}
{{--                                listCaption.append($('<h3></h3>').append($('<a></a>').attr('href', '#').text(item.title)));--}}
{{--                                listCaption.append($('<p></p>').html(item.content ? item.content.substring(0, 50) + '...' : ''));--}}
{{--                                const listFooter = $('<div></div>').addClass('list-footer');--}}

{{--                                $.each(item.cities, function (index, city) {--}}
{{--                                    listFooter.append($('<ul></ul>').append($('<li></li>').text(city.name)));--}}
{{--                                });--}}

{{--                                listCaption.append(listFooter);--}}
{{--                                singleListing.append(listImg);--}}
{{--                                singleListing.append(listCaption);--}}
{{--                                colDiv.append(singleListing);--}}
{{--                                listingDetailsArea.append(colDiv);--}}
{{--                            });--}}

{{--                            $('#noResultsMessage').addClass('d-none');--}}
{{--                        } else {--}}
{{--                            // Sonuç yoksa "Sonuç bulunamadı" mesajını göster--}}
{{--                            $('#noResultsMessage').removeClass('d-none');--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}



{{--    <script>--}}
{{--        --}}
{{--        $(document).ready(function () {--}}
{{--            $('#city_filter, #disease_filter').on('change', function () {--}}
{{--                updateResults();--}}
{{--            });--}}

{{--            function updateResults() {--}}
{{--                const cityId = $('#city_filter').val();--}}
{{--                const diseaseId = $('#disease_filter').val();--}}

{{--                // Ajax isteği gönder--}}
{{--                $.ajax({--}}
{{--                    url: '{{ route("adminFrontend.filterResults") }}',--}}
{{--                    method: 'GET',--}}
{{--                    data: {city: cityId, disease: diseaseId},--}}
{{--                    dataType: 'json',--}}
{{--                    success: function (data) {--}}
{{--                        const listingDetailsArea = $('.listing-details-area .container .row');--}}
{{--                        listingDetailsArea.empty();--}}

{{--                        if (data.length > 0) {--}}
{{--                            $.each(data, function (index, item) {--}}
{{--                                const colDiv = $('<div></div>').addClass('col-lg-6');--}}
{{--                                const singleListing = $('<div></div>').addClass('single-listing mb-30');--}}
{{--                                const listImg = $('<div></div>').addClass('list-img');--}}

{{--                                if (item.image) {--}}
{{--                                    listImg.append($('<img>').attr('src', 'data:image/jpeg;base64,' + item.image).attr('alt', item.title));--}}
{{--                                } else {--}}
{{--                                    listImg.append($('<img>').attr('src', '{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}').attr('alt', ''));--}}
{{--                                }--}}

{{--                                const listCaption = $('<div></div>').addClass('list-caption');--}}
{{--                                listCaption.append($('<span></span>').text('Open'));--}}
{{--                                listCaption.append($('<h3></h3>').append($('<a></a>').attr('href', '#').text(item.title)));--}}
{{--                                listCaption.append($('<p></p>').html(item.content ? item.content.substring(0, 50) + '...' : ''));--}}



{{--                                // Şehirlerin listesi varsa oluşturulur, yoksa mesaj gösterilir--}}
{{--                                if (item.cities.length > 0) {--}}
{{--                                    const listFooter = $('<div></div>').addClass('list-footer');--}}
{{--                                    const cityList = $('#city');--}}


{{--                                    $.each(item.cities, function (index, city) {--}}


{{--                                        cityList.append($('<li></li>').text(city.name));--}}
{{--                                    });--}}
{{--                                    listFooter.append(cityList);--}}
{{--                                    listCaption.append(listFooter);--}}
{{--                                } else {--}}
{{--                                    listCaption.append($('<div></div>').text('No cities found.'));--}}
{{--                                }--}}

{{--                                singleListing.append(listImg);--}}
{{--                                singleListing.append(listCaption);--}}
{{--                                colDiv.append(singleListing);--}}
{{--                                listingDetailsArea.append(colDiv);--}}
{{--                            });--}}

{{--                            $('#noResultsMessage').addClass('d-none');--}}
{{--                        } else {--}}
{{--                            // Sonuç yoksa "Sonuç bulunamadı" mesajını göster--}}
{{--                            $('#noResultsMessage').removeClass('d-none');--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}



{{-- TODO: ayrı sayfada filtreleme için --}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#filterButton').on('click', function () {--}}
{{--                updateResults();--}}
{{--            });--}}

{{--            $('#resetButton').on('click', function () {--}}
{{--                // Formu resetlemek için form elemanına ulaşıp reset() metodunu çağırıyoruz--}}
{{--                $('#filterForm')[0].reset();--}}

{{--                // Sonuçları sıfırla--}}
{{--                $('.listing-details-area .container .row').empty();--}}
{{--                $('#noResultsMessage').addClass('d-none');--}}
{{--            });--}}

{{--            function updateResults() {--}}
{{--                const formData = $('#filterForm').serialize();--}}

{{--                $.ajax({--}}
{{--                    url: '{{ route("adminFrontend.filterResults") }}',--}}
{{--                    method: 'GET',--}}
{{--                    data: formData,--}}
{{--                    dataType: 'html',--}}
{{--                    success: function (data) {--}}
{{--                        // Yenilenen içeriği sayfaya ekleyin--}}
{{--                        $('.listing-details-area .container .row').html(data);--}}

{{--                        // Sonuç yoksa "Sonuç bulunamadı" mesajını göster--}}
{{--                        if (data.trim() === '') {--}}
{{--                            $('#noResultsMessage').removeClass('d-none');--}}
{{--                        } else {--}}
{{--                            $('#noResultsMessage').addClass('d-none');--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        console.error(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            // Filtreleme yapıldığında seçilenleri select alanlarında göster
            const cityFilter = '{{ request('city') }}';
            const categoryFilter = '{{ request('category') }}';

            if (cityFilter) {
                $('#city_filter').val(cityFilter);
            }

            if (categoryFilter) {
                $('#category_filter').val(categoryFilter);
            }
        });
    </script>
@endsection

@section('js')
@endsection
