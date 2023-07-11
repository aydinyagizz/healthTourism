@extends('user.layout.userLayout')

@section('title')
    Config
@endsection

@section('css')
@endsection

@section('content')

    <div
        class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
        data-kt-swapper="true"
        data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

        <!--begin::Heading-->
        <h1 class="text-dark fw-bold mt-1 mb-1 fs-2">
            Config <small class="text-muted fs-6 fw-normal ms-1"></small>
        </h1>
        <!--end::Heading-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-semibold fs-base mb-1">
            {{--                    <li class="breadcrumb-item text-muted">--}}
            {{--                        <a href="index708f.html?page=index" class="text-muted text-hover-primary">--}}
            {{--                            Home </a>--}}
            {{--                    </li>--}}

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('user.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-dark">
                Config
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>



    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">

            <div id="kt_user_template" class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Change Template</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">


                    <form action="{{ route('user.config.template') }}" method="POST">
                        @csrf

                        <div class="fv-row mb-10">

                            <label class="fs-6 fw-semibold mb-2">
                                Discount Type
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                   title="Select a discount type that will be applied to this product"></i>
                            </label>

                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                 data-kt-buttons="true"
                                 data-kt-buttons-target="[data-kt-button='true']">

                                <div class="col">

                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $user->template == 1 ? 'active' : '' }} d-flex text-start p-6 "
                                        data-kt-button="true">

                            <span
                                class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio"
                                                                   name="template" value="1" {{ $user->template == 1 ? 'checked="checked"' : '' }}/>
                                                    </span>

                                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 d-block">Template 1</span>
                        </span>

                                    </label>

                                </div>


                                <div class="col">
                                    <!--begin::Option-->
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $user->template == 2 ? 'active' : '' }} d-flex text-start p-6"
                                        data-kt-button="true">
                                        <!--begin::Radio-->
                                        <span
                                            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                            <input class="form-check-input" type="radio"
                                                                   name="template" value="2" {{ $user->template == 2 ? 'checked="checked"' : '' }}/>
                                                    </span>
                                        <!--end::Radio-->

                                        <!--begin::Info-->
                                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 d-block">Template 2</span>
                        </span>
                                        <!--end::Info-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Option-->
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ $user->template == 3 ? 'active' : '' }} d-flex text-start p-6"
                                        data-kt-button="true">
                                        <!--begin::Radio-->
                                        <span
                                            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="template" value="3" {{ $user->template == 3 ? 'checked="checked"' : '' }}/>
                        </span>
                                        <!--end::Radio-->

                                        <!--begin::Info-->
                                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 d-block">Template 3</span>
                        </span>
                                        <!--end::Info-->
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>


                        <div class="{{ $user->template == 1 ? '' : 'd-none' }} mb-10 fv-row" id="kt_user_template_1">
                            template 1 fotoğrafı
                        </div>


                        <div class="{{ $user->template == 2 ? '' : 'd-none' }} mb-10 fv-row" id="kt_user_template_2">
                            template 2 fotoğrafı
                        </div>


                        <div class="{{ $user->template == 3 ? '' : 'd-none' }} mb-10 fv-row" id="kt_user_template_3">
                            template 3 fotoğrafı
                        </div>


                        <div class="d-flex flex-wrap gap-5 justify-content-end">
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </form>

                </div>
                <!--end::Card header-->
            </div>

        </div>
    </div>
@endsection

@section('js')
@endsection
