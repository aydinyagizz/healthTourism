@extends('user.layout.userLayout')

@section('title')
    Offers
@endsection

@section('css')

@endsection

@section('content')

    <style>
        .icon-list {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .icon-list-item {
            flex-basis: 25%;
            text-align: center;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .icon-list-item i {
            font-size: 24px;
        }

        .icon-list-item.selected {
            background-color: #00b2ff;
        }
    </style>

    {{--    <style>--}}
    {{--        .icon-list-update {--}}
    {{--            display: flex;--}}
    {{--            flex-wrap: wrap;--}}
    {{--            list-style: none;--}}
    {{--            padding: 0;--}}
    {{--            margin: 0;--}}
    {{--        }--}}

    {{--        .icon-list-update {--}}
    {{--            flex-basis: 25%;--}}
    {{--            text-align: center;--}}
    {{--            margin-bottom: 10px;--}}
    {{--            cursor: pointer;--}}
    {{--        }--}}

    {{--        .icon-list-update i {--}}
    {{--            font-size: 24px;--}}
    {{--        }--}}
    {{--        .icon-list-update .selected {--}}
    {{--            background-color: #00b2ff;--}}
    {{--        }--}}
    {{--    </style>--}}

    <div
        class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
        data-kt-swapper="true"
        data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

        <!--begin::Heading-->
        <h1 class="text-dark fw-bold mt-1 mb-1 fs-2">
            Offers <small class="text-muted fs-6 fw-normal ms-1"></small>
        </h1>
        <!--end::Heading-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-semibold fs-base mb-1">
            {{--                                <li class="breadcrumb-item text-muted">--}}
            {{--                                    <a href="index708f.html?page=index" class="text-muted text-hover-primary">--}}
            {{--                                        Home </a>--}}
            {{--                                </li>--}}

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('user.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-dark">
                Offers
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>







    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
      fill="currentColor"/>
<path
    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
    fill="currentColor"/>
</svg>
</span>
                            <input type="text" data-kt-offers-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search offers"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-offers-table-toolbar="base">


                            <!--begin::Filter-->
                            {{--                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
                            {{--                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->--}}
                            {{--                                <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>--}}
                            {{--</svg>--}}
                            {{--</span>--}}
                            {{--                                <!--end::Svg Icon-->        Filter--}}
                            {{--                            </button>--}}


                            <div class=" mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" data-placeholder="Category"
                                         data-kt-offers-table-filter="category" id="category_filter">
                                    <option></option>
                                    <option value="all">All Category</option>
                                    @foreach($offers as $item)
                                    <option value="{{ $item->disease_category_name }}">{{ $item->disease_category_name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>


                            <!--begin::Export dropdown-->
                            <button id="exportButton" type="button" class="btn btn-light-primary"
                                    data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end" data-kt-menu="export-menu">


                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                       fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)"
      fill="currentColor"/>
<path
    d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
    fill="currentColor"/>
<path opacity="0.3"
      d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
      fill="currentColor"/>
</svg>
</span>
                                <!--end::Svg Icon-->    Export Report
                            </button>
                            <!--begin::Menu-->
                            {{--



                            {{--                            <div id="kt_ecommerce_report_sales_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4 row" data-kt-menu="true">--}}
                            <div id="kt_ecommerce_report_sales_export_menu_export"
                                 class="menu menu-sub menu-sub-dropdown  w-300px w-md-325px"
                                 data-kt-menu="true">


                            </div>


                            <!--begin::Menu 1-->

                            {{--                            TODO: filtreleme modalı--}}
                            {{--                            <div id="kt_ecommerce_report_sales_filter_menu" class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">--}}
                            {{--                                <!--begin::Header-->--}}
                            {{--                                <div class="px-7 py-5">--}}
                            {{--                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>--}}
                            {{--                                </div>--}}
                            {{--                                <!--end::Header-->--}}

                            {{--                                <!--begin::Separator-->--}}
                            {{--                                <div class="separator border-gray-200"></div>--}}
                            {{--                                <!--end::Separator-->--}}

                            {{--                                <!--begin::Content-->--}}
                            {{--                                <div class="px-7 py-5" data-kt-offers-table-filter="form">--}}
                            {{--                                    <!--begin::Input group-->--}}
                            {{--                                    <div class="mb-10">--}}
                            {{--                                        <label class="form-label fs-6 fw-semibold">Role:</label>--}}
                            {{--                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"--}}
                            {{--                                                data-placeholder="Select option" data-allow-clear="true"--}}
                            {{--                                                data-kt-offers-table-filter="role" data-hide-search="true">--}}
                            {{--                                            <option></option>--}}
                            {{--                                            <option value="sirket 2">sirket 2</option>--}}
                            {{--                                            <option value="Analyst">Analyst</option>--}}
                            {{--                                            <option value="Developer">Developer</option>--}}
                            {{--                                            <option value="Support">Support</option>--}}
                            {{--                                            <option value="Trial">Trial</option>--}}
                            {{--                                        </select>--}}
                            {{--                                    </div>--}}
                            {{--                                    <!--end::Input group-->--}}

                            {{--                                    <!--begin::Input group-->--}}
                            {{--                                    <div class="mb-10">--}}
                            {{--                                        <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>--}}
                            {{--                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"--}}
                            {{--                                                data-placeholder="Select option" data-allow-clear="true"--}}
                            {{--                                                data-kt-offers-table-filter="two-step" data-hide-search="true">--}}
                            {{--                                            <option></option>--}}
                            {{--                                            <option value="Enabled">Enabled</option>--}}
                            {{--                                        </select>--}}
                            {{--                                    </div>--}}
                            {{--                                    <!--end::Input group-->--}}

                            {{--                                    <!--begin::Actions-->--}}
                            {{--                                    <div class="d-flex justify-content-end">--}}
                            {{--                                        <button type="reset"--}}
                            {{--                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"--}}
                            {{--                                                data-kt-menu-dismiss="true" data-kt-offers-table-filter="reset">--}}
                            {{--                                            Reset--}}
                            {{--                                        </button>--}}
                            {{--                                        <button type="submit" class="btn btn-primary fw-semibold px-6"--}}
                            {{--                                                data-kt-menu-dismiss="true" data-kt-offers-table-filter="filter">Apply--}}
                            {{--                                        </button>--}}
                            {{--                                    </div>--}}
                            {{--                                    <!--end::Actions-->--}}
                            {{--                                </div>--}}
                            {{--                                <!--end::Content-->--}}
                            {{--                            </div>--}}
                            <!--end::Menu 1-->
                            <!--end::Filter-->


                        </div>


                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-offers-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-offers-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger"
                                    data-kt-offers-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>
                        <!--end::Group actions-->


                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                </div>
                <!--begin::Card body-->
                <div class="card-body py-4 table-responsive">


                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_offers">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">


                            {{--                            TODO: burası düzenlenecek--}}

                            <th class="min-w-100px">Actions</th>
                            <th class="min-w-125px">User Name</th>
                            <th class="min-w-125px">User Phone</th>
                            <th class="min-w-125px">User Country</th>
                            <th class="min-w-125px">Treatment</th>
                            <th class="min-w-125px">Service City</th>
                            <th class="min-w-125px">User Email</th>
                            <th class="min-w-125px">City</th>
                            <th class="min-w-125px">Date Range</th>
                            <th class="min-w-125px">Treatment Category</th>

                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">

                        @foreach($offers as $item)

                            <tr>
                                {{--                                TODO: burası düzenlenecek--}}


                                <td class="">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                        @if(empty($userOfferStatuses[$item->id]) || $userOfferStatuses[$item->id] === 'unprocessed')
                                            <div class="symbol-label">
                                                <i style="font-size: 20px; margin-left: 6px;" class="fa fa-minus" aria-hidden="true"></i>
                                            </div>
                                        @elseif($userOfferStatuses[$item->id] === 'under_review')
                                            <div class="symbol-label">
                                                <i style="font-size: 20px; margin-left: 6px;" class="fa fa-clock" aria-hidden="true"></i>
                                            </div>

                                        @elseif($userOfferStatuses[$item->id] === 'approved')
                                            <div class="symbol-label">
                                                <i style="font-size: 20px; margin-left: 6px;" class="fa fa-check-circle"></i>
                                            </div>

                                        @elseif($userOfferStatuses[$item->id] === 'rejected')
                                            <div class="symbol-label">

                                                <i style="font-size: 20px; margin-left: 6px;" class="fa fa-times-circle" aria-hidden="true"></i>
                                            </div>

                                        @endif



                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                                                   viewBox="0 0 24 24" fill="none"
                                                                                   xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
    fill="currentColor"/>
</svg>
</span>
                                        <!--end::Svg Icon-->                    </a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">

                                        <style>
                                            .px-3 {
                                                padding-right: 4.75rem !important;
                                                /*padding-left: 0.75rem !important;*/
                                            }
                                        </style>

                                        <form action="{{ route('offer.update-status', [$item->id]) }}" method="POST">
                                            @csrf


                                            <div class="menu-item px-3">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3 text-right"
                                                           name="status" type="radio"
                                                           value="unprocessed"
                                                           id="kt_ecommerce_add_category_automation_1"
                                                        {{ empty($userOfferStatuses[$item->id]) || $userOfferStatuses[$item->id] === 'unprocessed' ? 'checked' : '' }}>Unprocessed

                                                </div>
                                            </div>


                                            <div class="menu-item px-3">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="status"
                                                           type="radio"
                                                           value="under_review"
                                                           id="kt_ecommerce_add_category_automation_1"
                                                        {{ $userOfferStatuses[$item->id] === 'under_review' ? 'checked' : '' }}>Under Review

                                                </div>
                                            </div>

                                            <div class="menu-item px-3">
                                                <div class="form-check form-check-custom form-check-solid">

                                                    <input class="form-check-input me-3" name="status"
                                                           type="radio"
                                                           value="approved" id="kt_ecommerce_add_category_automation_1"
                                                        {{ $userOfferStatuses[$item->id] === 'approved' ? 'checked' : '' }}>Approved

                                                </div>
                                            </div>

                                            <div class="menu-item px-3">
                                                <div class="form-check form-check-custom form-check-solid">

                                                    <input class="form-check-input me-3" name="status"
                                                           type="radio"
                                                           value="rejected" id="kt_ecommerce_add_category_automation_1"
                                                        {{ $userOfferStatuses[$item->id] === 'rejected' ? 'checked' : '' }}>Rejected

                                                </div>
                                            </div>


                                            <div class="menu-item px-3">
                                                <button class="btn btn-primary btn-sm mt-2" type="submit">Save</button>
                                            </div>


                                        </form>


                                        {{--                                        <script>--}}
                                        {{--                                            function updateOfferStatus() {--}}
                                        {{--                                                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}
                                        {{--                                                const offerId = {{ $item->id }};--}}
                                        {{--                                                const status = document.querySelector('input[name="status"]:checked').value;--}}

                                        {{--                                                fetch(`{{ route('offer.update-status', ['id' => $item->id]) }}`, {--}}
                                        {{--                                                    method: 'POST',--}}
                                        {{--                                                    headers: {--}}
                                        {{--                                                        'Content-Type': 'application/json',--}}
                                        {{--                                                        'X-CSRF-TOKEN': token--}}
                                        {{--                                                    },--}}
                                        {{--                                                    body: JSON.stringify({status: status})--}}
                                        {{--                                                })--}}
                                        {{--                                                    .then(response => response.json())--}}
                                        {{--                                                    .then(data => {--}}
                                        {{--                                                        // İsteğin başarılı bir şekilde tamamlandığını burada işleyebilirsiniz--}}
                                        {{--                                                        console.log(data);--}}

                                        {{--                                                        // Success mesajını göster--}}
                                        {{--                                                        const successMessage = document.getElementById('successMessage');--}}
                                        {{--                                                        successMessage.style.display = 'block';--}}
                                        {{--                                                    })--}}
                                        {{--                                                    .catch(error => {--}}
                                        {{--                                                        // İsteğin hata ile sonuçlandığını burada işleyebilirsiniz--}}
                                        {{--                                                        console.error(error);--}}
                                        {{--                                                    });--}}
                                        {{--                                            }--}}
                                        {{--                                        </script>--}}


                                        {{--                                        <button class="btn btn-primary btn-sm mt-2" onclick="updateOfferStatus({{ $item->id }}, document.querySelector('input[name=\'status_{{ $item->id }}\']:checked').value)">Gönder</button>--}}

                                        {{--                                        <button class="btn btn-primary btn-sm mt-2" onclick="updateOfferStatus({{ $item->id }}, document.querySelector('input[name=\'status_{{ $item->id }}\']:checked').value)">--}}
                                        {{--                                            Gönder--}}
                                        {{--                                        </button>--}}





                                        {{--                                        @can('services update')--}}
                                        {{--                                            <!--begin::Menu item-->--}}
                                        {{--                                            <div class="menu-item px-3">--}}
                                        {{--                                                <a href="#" data-bs-toggle="modal"--}}
                                        {{--                                                   data-bs-target="#blogCategoryEdit{{ $item->id }}"--}}
                                        {{--                                                   class="menu-link px-3">--}}
                                        {{--                                                    Edit--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        @endcan--}}
                                        <!--end::Menu item-->


                                        <!--end::Menu item-->

                                        {{--                                        @if (! (auth()->user()->can('services update') || auth()->user()->can('services delete')))--}}
                                        {{--                                            <div class="menu-item ">--}}
                                        {{--                                                <p class="text-center ">empty</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        @endif--}}

                                    </div>
                                    <!--end::Menu-->
                                </td>


                                <td class=" align-items-center">


                                    <div class="flex-column">
                                        {{ $item->name }}

                                    </div>


                                </td>







                                <td>
                                    {{ $item->phone }}
                                    {{--                                    <div class="menu-item px-3">--}}
                                    {{--                                        <a href="#" data-bs-toggle="modal"--}}
                                    {{--                                           data-bs-target="#offersDetail{{ $item->id }}"--}}
                                    {{--                                           class="menu-link px-3">--}}
                                    {{--                                            View--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}

                                </td>


                                <td>
                                    {{ $item->country_name }}
                                </td>

                                <td>{{ $item->disease_title }}</td>

                                <td>{{ $item->city_name }}</td>

                                <td>{{ $item->email }}</td>


                                <td>{{ $item->city }}</td>

                                <td>
                                    @if($item->date_range_start && $item->date_range_end)
                                        {{ $item->date_range_start }} to {{ $item->date_range_end }}
                                    @elseif($item->date_range_start)
                                        {{ $item->date_range_start }}
                                    @else
                                        Not specified
                                    @endif

                                </td>


                                <td>{{ $item->disease_category_name }}</td>



                                <!--end::Action--->
                            </tr>







                            {{--                                TODO: Modal Detail Başlangıcı    --}}

                            <div class="modal fade" id="offersDetail{{ $item->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{--                                                <h2 class="modal-title" id="exampleModalScrollableTitle">{{ $item->title }}</h2>--}}
                                            <h2 class="fw-bold">{{ $item->name }}</h2>

                                            <div
                                                class="btn btn-icon btn-sm btn-active-icon-primary close"
                                                data-bs-dismiss="modal" aria-label="Close">

                                <span class="svg-icon svg-icon-1">
                                    <svg width="24" height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                              transform="rotate(-45 6 17.3137)"
                                              fill="currentColor"/>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
                                    </svg>

                                </span>
                                            </div>


                                        </div>


                                        <div class="modal-body">


                                            {!! $item->name !!}


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Close
                                            </button>


                                        </div>


                                    </div>
                                </div>
                            </div>





                            {{--                                TODO: Modal detail Bitişi     --}}

                        @endforeach


                        </tbody>
                        <!--end::Table body-->
                    </table>


                </div>
                <!--end::Card body-->

            </div>


            <!--end::Container-->
        </div>

    </div>

@endsection

@section('js')
@endsection
