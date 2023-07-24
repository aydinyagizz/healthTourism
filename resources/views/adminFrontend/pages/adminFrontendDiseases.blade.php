@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Diseases
@endsection

@section('css')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

                            <form >
                            <div class="select-job-items1">
                                <label for="city_filter">Şehir:</label>
                                <select name="city_filter" id="city_filter">
                                    <option value="">Choose categories</option>
                                    @foreach($city as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="select-job-items2">
                                <label for="disease_filter">Hastalık:</label>
                                <select name="disease_filter" id="disease_filter">
                                    <option value="">Hastalık</option>
                                    @foreach($diseases as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            </form>

                        </div>

                        <div class="single-listing">
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
                                <span>{{ count($diseases) }} Listings are available</span>
                            </div>
                        </div>
                    </div>


                    <div id="noResultsMessage" class="alert alert-warning d-none">Sonuç bulunamadı.</div>



                    <!-- listing Details Stat-->
                    <div class="listing-details-area">
                        <div class="container">
                            <div class="row">





                                @foreach($diseases as $item)
                                    <div class="col-lg-6 ">
                                        <div class="single-listing mb-30">
                                            <div class="list-img">
                                                @if($item->image)
                                                    <img src="data:image/jpeg;base64,{{ $item->image }}"
                                                         alt="{{ $item->title }}">
                                                @else
                                                    <img
                                                        src="{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}"
                                                        alt="">
                                                    {{--                                               <span>Open</span>--}}
                                                @endif
                                            </div>
                                            <div class="list-caption">
                                                <span>Open</span>
                                                <h3><a href="#">{{ $item->title }}</a></h3>
                                                <p>{!! $item->content ?  Str::limit($item->content, 50, '...') : '' !!} </p>
                                                <div class="list-footer">
                                                    @foreach($item->cities as $city)
                                                        <ul id="city">

                                                            <li>{{ $city->name }}</li>


                                                        </ul>
                                                    @endforeach
                                                </div>
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
                                                {{ $diseases->links() }}
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



    <script>
        {{--$(document).ready(function () {--}}
        {{--    $('#city_filter, #disease_filter').on('change', function () {--}}
        {{--        updateResults();--}}
        {{--    });--}}

        {{--    function updateResults() {--}}
        {{--        const cityId = $('#city_filter').val();--}}
        {{--        const diseaseId = $('#disease_filter').val();--}}

        {{--        // Ajax isteği gönder--}}
        {{--        $.ajax({--}}
        {{--            url: '{{ route("adminFrontend.filterResults") }}',--}}
        {{--            method: 'GET',--}}
        {{--            data: {city: cityId, disease: diseaseId},--}}
        {{--            dataType: 'json',--}}
        {{--            success: function (data) {--}}
        {{--                const listingDetailsArea = $('.listing-details-area .container .row');--}}
        {{--                listingDetailsArea.empty();--}}

        {{--                if (data.length > 0) {--}}
        {{--                    $.each(data, function (index, item) {--}}
        {{--                        const colDiv = $('<div></div>').addClass('col-lg-6');--}}
        {{--                        const singleListing = $('<div></div>').addClass('single-listing mb-30');--}}
        {{--                        const listImg = $('<div></div>').addClass('list-img');--}}

        {{--                        if (item.image) {--}}
        {{--                            listImg.append($('<img>').attr('src', 'data:image/jpeg;base64,' + item.image).attr('alt', item.title));--}}
        {{--                        } else {--}}
        {{--                            listImg.append($('<img>').attr('src', '{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}').attr('alt', ''));--}}
        {{--                        }--}}

        {{--                        const listCaption = $('<div></div>').addClass('list-caption');--}}
        {{--                        listCaption.append($('<span></span>').text('Open'));--}}
        {{--                        listCaption.append($('<h3></h3>').append($('<a></a>').attr('href', '#').text(item.title)));--}}
        {{--                        listCaption.append($('<p></p>').html(item.content ? item.content.substring(0, 50) + '...' : ''));--}}
        {{--                        const listFooter = $('<div></div>').addClass('list-footer');--}}


        {{--                        $.each(item.cities, function (index, city) {--}}

        {{--                            alert(city.name);--}}
        {{--                            listFooter.append($('<ul></ul>').append($('<li></li>').text(city.name)));--}}
        {{--                        });--}}

        {{--                        listCaption.append(listFooter);--}}
        {{--                        singleListing.append(listImg);--}}
        {{--                        singleListing.append(listCaption);--}}
        {{--                        colDiv.append(singleListing);--}}
        {{--                        listingDetailsArea.append(colDiv);--}}
        {{--                    });--}}

        {{--                    $('#noResultsMessage').addClass('d-none');--}}
        {{--                } else {--}}
        {{--                    // Sonuç yoksa "Sonuç bulunamadı" mesajını göster--}}
        {{--                    const noResultsMessage = $('<div></div>').addClass('col-lg-12 mt-4').attr('id', 'noResultsMessage').text('Sonuç bulunamadı.');--}}
        {{--                    listingDetailsArea.append(noResultsMessage);--}}
        {{--                }--}}
        {{--            },--}}
        {{--            error: function (error) {--}}
        {{--                console.error(error);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--});--}}


        $(document).ready(function () {
            $('#city_filter, #disease_filter').on('change', function () {
                updateResults();
            });

            function updateResults() {
                const cityId = $('#city_filter').val();
                const diseaseId = $('#disease_filter').val();

                // Ajax isteği gönder
                $.ajax({
                    url: '{{ route("adminFrontend.filterResults") }}',
                    method: 'GET',
                    data: {city: cityId, disease: diseaseId},
                    dataType: 'json',
                    success: function (data) {
                        const listingDetailsArea = $('.listing-details-area .container .row');
                        listingDetailsArea.empty();

                        if (data.length > 0) {
                            $.each(data, function (index, item) {
                                const colDiv = $('<div></div>').addClass('col-lg-6');
                                const singleListing = $('<div></div>').addClass('single-listing mb-30');
                                const listImg = $('<div></div>').addClass('list-img');

                                if (item.image) {
                                    listImg.append($('<img>').attr('src', 'data:image/jpeg;base64,' + item.image).attr('alt', item.title));
                                } else {
                                    listImg.append($('<img>').attr('src', '{{ asset('public/adminFrontend/assets/img/gallery/list1.png') }}').attr('alt', ''));
                                }

                                const listCaption = $('<div></div>').addClass('list-caption');
                                listCaption.append($('<span></span>').text('Open'));
                                listCaption.append($('<h3></h3>').append($('<a></a>').attr('href', '#').text(item.title)));
                                listCaption.append($('<p></p>').html(item.content ? item.content.substring(0, 50) + '...' : ''));



                                // Şehirlerin listesi varsa oluşturulur, yoksa mesaj gösterilir
                                if (item.cities.length > 0) {
                                    const listFooter = $('<div></div>').addClass('list-footer');
                                    const cityList = $('#city');

                                    alert(item.cities);
                                    $.each(item.cities, function (index, city) {


                                        cityList.append($('<li></li>').text(city.name));
                                    });
                                    listFooter.append(cityList);
                                    listCaption.append(listFooter);
                                } else {
                                    listCaption.append($('<div></div>').text('No cities found.'));
                                }

                                singleListing.append(listImg);
                                singleListing.append(listCaption);
                                colDiv.append(singleListing);
                                listingDetailsArea.append(colDiv);
                            });

                            $('#noResultsMessage').addClass('d-none');
                        } else {
                            // Sonuç yoksa "Sonuç bulunamadı" mesajını göster
                            $('#noResultsMessage').removeClass('d-none');
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        });







    </script>





@endsection

@section('js')
@endsection
