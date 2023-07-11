@extends('user.layout.userLayout')

@section('title')
    Pricing
@endsection

@section('css')
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
@endsection

@section('content')

    <div
        class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
        data-kt-swapper="true"
        data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

        <!--begin::Heading-->
        <h1 class="text-dark fw-bold mt-1 mb-1 fs-2">
            Pricing <small class="text-muted fs-6 fw-normal ms-1"></small>
        </h1>
        <!--end::Heading-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-semibold fs-base mb-1">
            {{--                                <li class="breadcrumb-item text-muted">--}}
            {{--                                    <a href="index708f.html?page=index" class="text-muted text-hover-primary">--}}
            {{--                                        Home </a>--}}
            {{--                                </li>--}}

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-dark">
                Pricing
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
                            <input type="text" data-kt-pricing-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search pricing"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-pricing-table-toolbar="base">
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
                                <div class="px-7 py-5" data-kt-pricing-table-filter="form">
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
                                                data-kt-menu-dismiss="true" data-kt-pricing-table-filter="reset">
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


                            @can('pricing create')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_pricing">
                                Add New Pricing
                            </button>
                            @endcan

                        </div>


                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-pricing-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-pricing-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-kt-pricing-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>
                        <!--end::Group actions-->


                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                </div>

                <!--begin::Card body-->
                <div class="card-body py-4  table-responsive">

                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_pricing">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                @can('pricing delete')
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_table_pricing .form-check-input"
                                           value=""/>
                                </div>
                                @endcan
                            </th>
                            <th class="min-w-125px">Title</th>
                            <th class="min-w-125px">Content</th>
                            <th class="min-w-125px">Price</th>
                            <th class="min-w-125px">Price Suffix</th>
                            <th class="min-w-125px">Status</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">

                        @foreach($pricing as $item)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    @can('pricing delete')
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}"/>
                                    </div>
                                    @endcan
                                </td>
                                <!--end::Checkbox-->

                                <!--begin::User--->
                                <td class=" align-items-center">


                                    <div class="flex-column">
                                        <a href="#" data-id="{{ $item->id }}"
                                           class="text-gray-800 text-hover-primary mb-1">{{ $item->title }} </a>
                                    </div>
                                    <!--begin::User details-->

                                </td>


                                <td>

                                    <div class="menu-item px-3">
                                        <a href="#" data-bs-toggle="modal"
                                           data-bs-target="#servicesDetail{{ $item->id }}"
                                           class="menu-link px-3">
                                            View
                                        </a>
                                    </div>

                                </td>

                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price_suffix }}</td>


                                <td>
                                    @if($item->status)
                                        <div class="badge py-3 px-4 fs-7 badge-light-success">Active</div>

                                    @else
                                        <div class="badge py-3 px-4 fs-7 badge-light-danger">Pending</div>
                                    @endif

                                </td>
                                <!--begin::Joined-->

                                <!--begin::Action--->
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


                                        <!--begin::Menu item-->
                                        @can('pricing update')
                                        <div class="menu-item px-3">
                                            <a href="#" data-bs-toggle="modal"
                                               data-bs-target="#blogCategoryEdit{{ $item->id }}"
                                               class="menu-link px-3">
                                                Edit
                                            </a>
                                        </div>
                                        @endcan
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        @can('pricing delete')
                                        <div class="menu-item px-3">

                                            <a href="#" class="menu-link px-3"
                                               data-kt-pricing-table-filter="delete_row">
                                                Delete
                                            </a>

                                        </div>
                                        @endcan

                                        @if (! (auth()->user()->can('pricing update') || auth()->user()->can('pricing delete')))
                                            <div class="menu-item ">
                                                <p class="text-center ">empty</p>
                                            </div>
                                        @endif
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action--->
                            </tr>



                            {{--                                TODO: Modal edit Başlangıcı    --}}

                            <div class="modal fade" id="blogCategoryEdit{{ $item->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{--                                                <h2 class="modal-title" id="exampleModalScrollableTitle">{{ $item->title }}</h2>--}}
                                            <h2 class="fw-bold">{{ $item->title }}</h2>

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

                                        <form action="{{ route('user.pricing.update', [$item->id]) }}"
                                              method="POST">
                                            @csrf

                                            <div class="modal-body">


                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold mb-2">Title</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                           placeholder="Title" name="title" id="title" required
                                                           value="{{ $item->title }}"/>


                                                </div>


                                                <div class="fv-row mb-7">
                                                    <label class="required fs-6 fw-semibold mb-2">Content</label>

                                                    {{--                                    <input type="text" class="form-control form-control-solid"--}}
                                                    {{--                                           placeholder="" name="services_content" id="services_content"/>--}}

                                                    <textarea name="pricing_content" id="pricing_content" cols="30"
                                                              rows="3">{{ $item->content }}</textarea>

                                                </div>


                                                <div class="row">
                                                    <div class="fv-row mb-7 col-md-6">
                                                        <label class="required fs-6 fw-semibold mb-2">Price</label>

                                                        <input type="number" class="form-control form-control-solid"
                                                               step="any"
                                                               placeholder="Price" name="price" id="price"
                                                               value="{{ $item->price }}"/>

                                                    </div>

                                                    <div class="fv-row mb-7 col-md-6">
                                                        <label class="required fs-6 fw-semibold mb-2">Price
                                                            Suffix</label>

                                                        <input type="text" class="form-control form-control-solid"
                                                               placeholder="Price Suffix" name="price_suffix"
                                                               id="price_suffix" value="{{ $item->price_suffix }}"/>

                                                    </div>
                                                </div>


                                                <div class="fv-row mb-7">
                                                    <label class="required fs-6 fw-semibold mb-2">Status</label>

                                                    <!--begin::Select2-->
                                                    <select name="status" required
                                                            data-dropdown-parent="#blogCategoryEdit{{ $item->id }}"
                                                            class="form-select mb-2"
                                                            data-control="select2"
                                                            data-hide-search="true"
                                                            data-placeholder="Select category"
                                                            id="status{{ $item->id }}">
                                                        @if($item->status)
                                                            <option value="1">Active</option>
                                                            <option value="0">Pending</option>
                                                        @else
                                                            <option value="0">Pending</option>
                                                            <option value="1">Active</option>
                                                        @endif

                                                    </select>
                                                    <!--end::Select2-->
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <button type="submit" class="btn btn-primary">
                                                    Update
                                                </button>

                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>





                            {{--                                TODO: Modal edit Bitişi     --}}






                            {{--                                TODO: Modal Detail Başlangıcı    --}}

                            <div class="modal fade" id="servicesDetail{{ $item->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{--                                                <h2 class="modal-title" id="exampleModalScrollableTitle">{{ $item->title }}</h2>--}}
                                            <h2 class="fw-bold">{{ $item->title }}</h2>

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


                                            {!! $item->content !!}


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
                    <!--end::Table-->    </div>
                <!--end::Card body-->

                <!--end::Card-->
            </div>


            <!--end::Container-->
        </div>
        {{--                            TODO: Add pricing modal start  --}}

        <div class="modal fade " id="kt_modal_add_pricing" tabindex="-1"
             aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('user.pricing.add') }} "
                          id="kt_modal_add_pricing_form"
                          data-kt-redirect-blog-category="">
                        @csrf
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Add Pricing</h2>


                            <div id="kt_modal_add_pricing_close"
                                 class="btn btn-icon btn-sm btn-active-icon-primary">

                                <span class="svg-icon svg-icon-1"><svg width="24" height="24"
                                                                       viewBox="0 0 24 24"
                                                                       fill="none"
                                                                       xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
      fill="currentColor"/>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
</svg>

</span>
                            </div>

                        </div>


                        <!--begin::Modal body-->
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll"
                                 data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                 data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                 data-kt-scroll-offset="300px">


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Title</label>

                                    <input type="text" class="form-control form-control-solid"
                                           placeholder="Title" name="title" id="title"/>

                                </div>


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Content</label>

                                    {{--                                    <input type="text" class="form-control form-control-solid"--}}
                                    {{--                                           placeholder="" name="services_content" id="services_content"/>--}}

                                    <textarea class="form-control form-control-solid" name="pricing_content"
                                              id="pricing_content" cols="30"
                                              rows="2"></textarea>

                                </div>

                                <div class="row">
                                    <div class="fv-row mb-7 col-md-6">
                                        <label class="required fs-6 fw-semibold mb-2">Price</label>

                                        <input type="number" class="form-control form-control-solid"
                                               placeholder="Price" name="price" id="price"/>

                                    </div>

                                    <div class="fv-row mb-7 col-md-6">
                                        <label class="required fs-6 fw-semibold mb-2">Price Suffix</label>

                                        <input type="text" class="form-control form-control-solid"
                                               placeholder="Price Suffix" name="price_suffix" id="price_suffix"/>

                                    </div>
                                </div>


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Status</label>

                                    <select data-dropdown-parent="#kt_modal_add_pricing" name="status" required
                                            class="form-select mb-2"
                                            data-control="select2"
                                            data-hide-search="true"
                                            data-placeholder="Select status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Pending</option>

                                    </select>
                                    <!--end::Select2-->
                                </div>


                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Modal body-->

                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_pricing_cancel"
                                    class="btn btn-light me-3">
                                Discard
                            </button>
                            <!--end::Button-->

                            <!--begin::Button-->
                            <button type="submit" id="kt_modal_add_pricing_submit"
                                    class="btn btn-primary">
                        <span class="indicator-label">
                            Submit
                        </span>
                                <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->
                    </form>
                    <!--end::Form-->


                </div>
            </div>
        </div>

        {{--                            TODO: Add pricing modal end  --}}
    </div>





    <input type="hidden" id="delete-url-user-pricing" value="{{ route('user.pricing.delete') }}">


    <script>
        CKEDITOR.replaceAll();

    </script>

@endsection

@section('js')
@endsection
