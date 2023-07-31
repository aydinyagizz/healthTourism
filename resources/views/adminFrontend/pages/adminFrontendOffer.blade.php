@extends('adminFrontend.layout.adminFrontendLayout')

@section('title')
    Get An Offer
@endsection

@section('css')



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>





@endsection

@section('content')

    <style>
        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }

        select.error{
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        [type="submit"], [type="reset"], button, html [type="button"] {
            margin-left: 0;
            border-radius: 0;
            /*background: black;*/
            color: white;
            /*border: none;*/
            font-weight: 300;
            /*padding: 10px 0;*/
            line-height: 1;
        }


    </style>

    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Get An Offer</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whole-wrap">
        <div class="container box_1170">


            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <h3 class="mb-30">Get An Offer</h3>

                        @if(session('message'))
{{--                            <div class="alert alert-info" role="alert">--}}
{{--                                {{ session('message') }}--}}
{{--                            </div>--}}

                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="alert alert-info alert-dismissible fade show" role="alert">
{{--                            Türkiye'de {{ $countDiseases }} farklı tedavi ihtiyacınız için {{ $countCity }}--}}
{{--                            adet şehirde toplam {{ $countUser }} acenteden teklif alabilirsiniz--}}

                            In Turkey, you can receive offers from a total of {{ $countUser }} agencies in {{ $countCity }} different cities for a total of {{ $countDiseases }} different treatment needs.

                        </div>



                        <form class="form" action="{{ route('admin.frontend.offer.post') }}" method="POST"
                              id="offerForm">
                            @csrf


                            <div class="input-group-icon mt-10">
                                <input type="text" name="name" id="name" placeholder="* Full Name"
                                       onfocus="this.placeholder = '* Full Name'"
                                       onblur="this.placeholder = '* Full Name'"
                                       required value="{{ old('name') }}"
                                       class="single-input single-input-accent">

                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <div class="input-group-icon mt-10">
                                <input type="email" name="email" id="email" placeholder="* Email address"
                                       onfocus="this.placeholder = '* Email address'"
                                       onblur="this.placeholder = '* Email address'"
                                       required value="{{ old('email') }}"
                                       class="single-input single-input-accent">

                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>


                            <div class="input-group-icon mt-10">

                                <input type="tel" name="phone" placeholder="* Phone"
                                       onfocus="this.placeholder = '* Phone'"
                                       onblur="this.placeholder = '* Phone'" required value="{{ old('phone') }}"
                                       class="single-input single-input-accent">

                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>



                            <div class="input-group-icon mt-10">

                                <div class="form-select" id="default-select">
                                    <select class="form-select form-control nice-select" name="country" id="country" required>
                                        <option value="">* Select Country</option>
                                        @foreach($country as $item)

                                            <option value="{{ $item->id }}" {{ old('country') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <span class="text-danger">{{ $errors->first('country') }}</span>









                                <div class="input-group-icon mt-10">

                                    <input type="text" name="city" id="city" placeholder="* City"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = '* City'" required value="{{ old('city') }}"
                                           class="single-input single-input-accent">

                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                </div>


                                <div class="input-group-icon mt-10">
                                    <input
                                        class="single-input single-input-accent" type="text"
                                        placeholder="Your Available Date Range" name="date_range" id="flatpickr"
                                        {{--                                                       value="{{ old('create_date') ? old('create_date') : (isset($latestAppointment) ? $latestAppointment->create_date : '') }}"--}}
                                        value="{{ old('date_range') }}"
                                        >
                                    <span class="text-danger">{{ $errors->first('date_range') }}</span>
                                </div>

                                <script>
                                    flatpickr("#flatpickr", {
                                        mode: "range",
                                        minDate: "today", // bugünden itibaren sadece gelecek tarihleri seçebilme
                                        dateFormat: "Y-m-d" // tarih formatını yıl-ay-gün olarak belirleme
                                    });

                                </script>




                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select class="form-select form-control nice-select" name="category" id="category" required>
                                            <option value="">* Select Category</option>
                                            @foreach($categories as $item)

                                                <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                </div>


                                <script>
                                    $(document).ready(function () {
                                        var selectedCategoryId = "{{ $categoryId }}"; // Şehir detay sayfasında seçilen şehrin ID'sini alalım
                                        $("#category").val(selectedCategoryId); // Select kutusunda ilgili şehri seçili olarak ayarlayalım
                                    });
                                </script>



                                <div class="input-group-icon mt-10">
                                    <div class="form-select" >
                                        <select class="form-select form-control nice-select" name="diseases" id="diseases" required>
                                            <option value="">* Select Diseases</option>

                                        </select>


                                    </div>
                                    <span class="text-danger">{{ $errors->first('diseases') }}</span>
                                </div>


                                <script>
                                    $(document).ready(function () {
                                        var selectedDiseasesId = "{{ $diseasesId }}"; // Şehir detay sayfasında seçilen şehrin ID'sini alalım
                                        $("#diseases").val(selectedDiseasesId); // Select kutusunda ilgili şehri seçili olarak ayarlayalım
                                    });
                                </script>





                                <div class="input-group-icon mt-10">
                                    <div class="form-select" id="default-select">
                                        <select class="form-select form-control nice-select" name="service_city" id="service_city" required>
                                            <option value="">* City Where You Will Be Served</option>

                                            @foreach($city as $item)

                                                <option value="{{ $item->id }}" {{ old('city') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                    <span class="text-danger">{{ $errors->first('service_city') }}</span>
                                </div>

                                <script>
                                    $(document).ready(function () {
                                        var selectedCityId = "{{ $cityId }}"; // Şehir detay sayfasında seçilen şehrin ID'sini alalım
                                        $("#service_city").val(selectedCityId); // Select kutusunda ilgili şehri seçili olarak ayarlayalım
                                    });
                                </script>


                                <script>
                                    function updateAgencyCount(selectedServiceCityId) {
                                        if (selectedServiceCityId !== '') {
                                            // AJAX isteği yapalım
                                            $.ajax({
                                                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                                                url: "{{route('fetch.get.agency.count')}}", // Bu URL'i, ilgili rotanızı ayarlayarak değiştirmeniz gerekebilir.
                                                type: 'POST',
                                                data: {
                                                    service_city_id: selectedServiceCityId,
                                                    _token: '{{ csrf_token() }}',
                                                },
                                                success: function (response) {
                                                    // AJAX isteği başarılı ise acente sayısını gösterelim
                                                    $("#agencyCountText").text(response.agencyCount);
                                                    $("#agencyCountInfo").show();
                                                },
                                                error: function (xhr, status, error) {
                                                    // AJAX isteği başarısız olursa hata mesajı verebiliriz
                                                    console.error(error);
                                                }
                                            });
                                        } else {
                                            // Şehir seçimi yapılmadıysa mesajı gizleyelim
                                            $("#agencyCountInfo").hide();
                                        }
                                    }

                                    $(document).ready(function () {
                                        // Şehir seçildiğinde
                                        $("#service_city").change(function () {
                                            var selectedServiceCityId =  $('#service_city').val();
                                            updateAgencyCount(selectedServiceCityId);
                                        });

                                        // Sayfa yüklendiğinde, varsa otomatik seçilen şehir için AJAX isteği yapalım
                                        var selectedServiceCityId = "{{ $cityId }}";

                                        updateAgencyCount(selectedServiceCityId);
                                    });
                                </script>




                            </div>



                            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert" id="agencyCountInfo" style="display: none;">
                                 Your request for a quote will be sent to <span id="agencyCountText"></span> agencies.
                            </div>




                            <div class="mt-10 mb-10">
                                <button id="offerButton" class="button rounded-0 primary-bg text-white  btn_1 boxed-btn"
                                        type="submit">
                                    Get an offer
                                </button>
                            </div>

                        </form>

                    </div>



                </div>
            </div>







{{--            <script>--}}
{{--                $(document).ready(function () {--}}
{{--                    // Şehir seçildiğinde--}}
{{--                    $('#service_city').on('change', function () {--}}
{{--                    // $("#service_city").change(function () {--}}
{{--                        var selectedServiceCityId = $('#service_city').val();--}}

{{--                        if (selectedServiceCityId !== '') {--}}
{{--                            // AJAX isteği yapalım--}}
{{--                            $.ajax({--}}
{{--                                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},--}}
{{--                                //url: '/get-agency-count', // Bu URL'i, ilgili rotanızı ayarlayarak değiştirmeniz gerekebilir.--}}
{{--                                url: "{{route('fetch.get.agency.count')}}",--}}
{{--                                type: 'POST',--}}
{{--                                data: {--}}
{{--                                    service_city_id: selectedServiceCityId,--}}
{{--                                    _token: '{{ csrf_token() }}',--}}
{{--                                },--}}
{{--                                success: function (response) {--}}
{{--                                    // AJAX isteği başarılı ise acente sayısını gösterelim--}}
{{--                                    $("#agencyCountText").text(response.agencyCount);--}}
{{--                                    $("#agencyCountInfo").show();--}}
{{--                                },--}}
{{--                                error: function (xhr, status, error) {--}}
{{--                                    // AJAX isteği başarısız olursa hata mesajı verebiliriz--}}
{{--                                    console.error(error);--}}
{{--                                }--}}
{{--                            });--}}
{{--                        } else {--}}
{{--                            // Şehir seçimi yapılmadıysa mesajı gizleyelim--}}
{{--                            $("#agencyCountInfo").hide();--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            </script>--}}









            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


            <script>
                $(document).ready(function () {
                    // Disease verilerini AJAX ile çek
                    function fetchDiseases(idCategory) {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                            url: "{{route('fetch-get-diseases')}}",
                            type: "POST",
                            data: {
                                idCategory: idCategory,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: 'json',
                            success: function (result) {
                                var selectElement = $("#diseases");
                                selectElement.empty();

                                if (result && result.diseases && result.diseases.length > 0) {
                                    $.each(result.diseases, function (key, value) {
                                        var option = '<option value="' + value.id + '"';
                                        // Eğer bu hastalık ID'si, old('diseases') değerine eşitse, "selected" özelliğini ekle
                                        if (value.id == '{!! old('diseases') !!}') {
                                            option += ' selected';
                                        }
                                        option += '>' + value.title + '</option>';
                                        selectElement.append(option);
                                    });
                                } else {
                                    selectElement.append('<option value="">No diseases found</option>');
                                }
                            }
                        });
                    }

                    $('#category').on('change', function () {
                        var idCategory = this.value;
                        fetchDiseases(idCategory);
                    });

                    // Sayfa yüklendiğinde seçili olan kategoriye göre hastalıkları getir
                    var selectedCategory = $('#category').val();
                    fetchDiseases(selectedCategory);
                });
            </script>

{{--            <script>--}}
{{--                $(document).ready(function () {--}}


{{--                    $('#category').on('change', function () {--}}

{{--                        var idCategory = this.value;--}}
{{--                        $("#diseases").html('');--}}



{{--                        $.ajax({--}}
{{--                            headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},--}}
{{--                            url: "{{route('fetch-get-diseases')}}",--}}
{{--                            type: "POST",--}}
{{--                            data: {--}}
{{--                                idCategory: idCategory,--}}
{{--                                _token: '{{csrf_token()}}'--}}
{{--                            },--}}
{{--                            dataType: 'json',--}}
{{--                            success: function (result) {--}}


{{--                                var selectElement = $("#diseases");--}}
{{--                                selectElement.empty(); // Önceki içeriği temizle--}}

{{--                                if (result && result.diseases && result.diseases.length > 0) {--}}
{{--                                   // selectElement.append('<option value="">* Select Diseases</option>');--}}
{{--                                    $.each(result.diseases, function (key, value) {--}}

{{--                                        selectElement.append('<option value="' + value.id + '">' + value.title + '</option>');--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    selectElement.append('<option value="">No diseases found</option>');--}}
{{--                                }--}}




{{--                            }--}}
{{--                        });--}}

{{--                    });--}}

{{--                });--}}
{{--            </script>--}}


@endsection

@section('js')

@endsection
