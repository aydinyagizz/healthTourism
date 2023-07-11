@extends('user.layout.userLayout')

@section('title')
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
                Frontend Home
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>




    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Frontend Home</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_home_form" action="{{ route('user.home.update') }}" class="form"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Logo</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                         style="background-image: url('assets/media/svg/files/blank-image.svg')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"

                                             @if($home && $home->logo)
                                                 style="background-image: url('data:image/jpeg;base64,{{ $home->logo }}')"
                                             @else
                                                 style="background-image: url('assets/media/svg/files/blank-image.svg')"
                                            @endif

                                        ></div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change logo">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="logo_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel logo">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                        <!--end::Cancel-->

                                        @if($home && $home->logo)
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove logo">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                            <!--end::Remove-->
                                        @endif
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Title</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">

                            <textarea name="title" id="title" cols="30" rows="2"
                                      class="form-control form-control-lg form-control-solid"
                                      placeholder="Title">{{ $home ? $home->title : '' }}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Description</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">

                            <textarea name="description" id="description" cols="30" rows="2"
                                      class="form-control form-control-lg form-control-solid"
                                      placeholder="Description">{{ $home ? $home->description : '' }}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>


                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Background Color</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="{{ ($home && $home->backgroundColor) ? 'col-lg-7' : 'col-lg-8' }} fv-row">
                                    <input type="color" name="color" id="color"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Color"
                                           value="{{ $home ?  $home->backgroundColor : '#000000' }}"/>


                                </div>

                                @if($home && $home->backgroundColor)
                                    <div class="col-lg-1 fv-row mt-6">
                                        <button class="btn btn-primary " type="button" id="clearColorButton">Remove
                                        </button>
                                    </div>
                                @endif
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <script>
                                // Boşalt butonuna tıklanınca input değerini boşaltan JavaScript kodu
                                $(document).ready(function () {
                                    // Boşalt butonuna tıklanınca input değerini boşaltan JavaScript kodu
                                    document.getElementById('clearColorButton').addEventListener('click', function () {
                                        document.getElementById('color').value = ' ';
                                    });

                                });
                            </script>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Background Image</label>
                                <!--end::Label-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                         style="background-image: url('assets/media/svg/files/blank-image.svg')">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px"

                                             @if($home && $home->image)
                                                 style="background-image: url('data:image/jpeg;base64,{{ $home->image }}')"
                                             @else
                                                 style="background-image: url('assets/media/svg/files/blank-image.svg')"
                                            @endif

                                        ></div>
                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change image">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="image_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                        <!--end::Cancel-->

                                        @if($home && $home->image)
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                            <!--end::Remove-->
                                        @endif
                                    </div>
                                    <!--end::Image input-->

                                    <!--begin::Hint-->
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Col-->
                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Watch Video Youtube link</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">

                                    <input type="text" name="video" id="video"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Watch Video Youtube link"
                                           value="{{ $home ? $home->video : '' }}"/>
                                </div>
                                <!--end::Col-->
                            </div>


                        </div>
                        <!--end::Card body-->

                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>

                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                Changes
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
