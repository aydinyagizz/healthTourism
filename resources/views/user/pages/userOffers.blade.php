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
                            {{--                                                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"--}}
                            {{--                                                                data-kt-menu-placement="bottom-end">--}}
                            {{--                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->--}}
                            {{--                                                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"--}}
                            {{--                                                                                                   fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                            <path--}}
                            {{--                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"--}}
                            {{--                                fill="currentColor"/>--}}
                            {{--                            </svg>--}}
                            {{--                            </span>--}}
                            {{--                                                            <!--end::Svg Icon-->        Filter--}}
                            {{--                                                        </button>--}}
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="px-7 py-5" data-kt-offers-table-filter="form">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Role:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Select option" data-allow-clear="true"
                                                data-kt-user-table-filter="role" data-hide-search="true">
                                            <option></option>
                                            <option value="sirket 2">sirket 2</option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                                data-placeholder="Select option" data-allow-clear="true"
                                                data-kt-user-table-filter="two-step" data-hide-search="true">
                                            <option></option>
                                            <option value="Enabled">Enabled</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                data-kt-menu-dismiss="true" data-kt-offers-table-filter="reset">
                                            Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                                data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Content-->
                            </div>
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


                            <th class="min-w-125px">User Name</th>
                            <th class="min-w-125px">User Phone</th>
                            <th class="min-w-125px">User Country</th>
                            <th class="min-w-125px">Disease</th>
                            <th class="min-w-125px">Service City</th>
                            <th class="min-w-125px">User Email</th>
                            <th class="min-w-125px">City</th>
                            <th class="min-w-125px">Date Range</th>
                            <th class="min-w-125px">Disease Category</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">

                        @foreach($offers as $item)
                            <tr>
                                <!--begin::Checkbox-->
                                {{--                                TODO: burası düzenlenecek--}}

                                <!--end::Checkbox-->

                                <!--begin::User--->
                                <td class=" align-items-center">


                                    <div class="flex-column">
                                        <a href="#" data-id="{{ $item->id }}"
                                           class="text-gray-800 text-hover-primary mb-1">{{ $item->name }} </a>
                                    </div>
                                    <!--begin::User details-->

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


                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        Actions
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


                                        <div class="menu-item px-3">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="method" type="radio"
                                                       value="1" id="kt_ecommerce_add_category_automation_1"
                                                       checked="checked">İşleme alınmadı

                                            </div>
                                        </div>


                                        <div class="menu-item px-3">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="method" type="radio"
                                                       value="1" id="kt_ecommerce_add_category_automation_1"
                                                       checked="checked">Görüşülüyor

                                            </div>
                                        </div>

                                        <div class="menu-item px-3">
                                            <div class="form-check form-check-custom form-check-solid">

                                                <input class="form-check-input me-3" name="method" type="radio"
                                                       value="1" id="kt_ecommerce_add_category_automation_1"
                                                       checked="checked">Onay

                                            </div>
                                        </div>

                                        <div class="menu-item px-3">
                                            <div class="form-check form-check-custom form-check-solid">

                                                <input class="form-check-input me-3" name="method" type="radio"
                                                       value="1" id="kt_ecommerce_add_category_automation_1"
                                                       checked="checked">Red

                                            </div>
                                        </div>





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

                                        @if (! (auth()->user()->can('services update') || auth()->user()->can('services delete')))
                                            <div class="menu-item ">
                                                <p class="text-center ">empty</p>
                                            </div>
                                        @endif

                                    </div>
                                    <!--end::Menu-->
                                </td>
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
