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
            Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
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
                User Edit
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>




    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">



            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->

                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form action="{{ route('user.edit.profile.detail') }}" method="POST" id="kt_account_user_profile_details_form" class="form" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Image</label>
                                <!--end::Label-->

                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                         style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                        <!--begin::Preview existing avatar-->


                                        <div class="image-input-wrapper w-125px h-125px"
                                             @if($user->user_image)
                                             style="background-image: url('data:image/jpeg;base64,{{ $user->user_image }}')"
                                            @else
                                                 style="background-image: url('assets/media/svg/avatars/blank.svg')"
                                            @endif

                                        ></div>

                                        <!--end::Preview existing avatar-->

                                        <!--begin::Label-->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file" name="user_image" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Cancel-->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                        <!--end::Cancel-->

                                        <!--begin::Remove-->
                                        @if($user->user_image)
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                        </span>
                                        @endif
                                        <!--end::Remove-->
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
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="name" id="name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Full name" value="{{ $user->name }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Contact Phone</span>

                                </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone" id="phone"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="Phone number" value="{{ $user->phone }}"/>
                                </div>
                            </div>


                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Address</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea placeholder="Address" class="form-control form-control-lg form-control-solid" name="address" id="address" cols="30" rows="2">{{ $user->address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Web Site Name</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="web_site_name" id="web_site_name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                   placeholder="Full name" value="{{ $user->web_site_name }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!--end::Card body-->

                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">

                            <button type="submit" class="btn btn-primary" id="kt_account_user_profile_details_submit">Save
                                Changes
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>










            <div class="card  mb-5 mb-xl-10"   >
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Sign-in Method</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Content-->
                <div id="kt_account_settings_signin_method" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Email Address-->

{{--                        <div class="d-flex flex-wrap align-items-center">--}}
{{--                           --}}
{{--                            <div id="kt_signin_email">--}}
{{--                                <div class="fs-6 fw-bold mb-1">Email Address</div>--}}
{{--                                <div class="fw-semibold text-gray-600">{{ $user->email }}</div>--}}
{{--                            </div>--}}
{{--                           --}}
{{--                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">--}}

{{--                                <form action="{{ route('user.edit.email') }}" method="POST" id="kt_signin_change_email" class="form" novalidate="novalidate">--}}
{{--                                   @csrf--}}
{{--                                    <div class="row mb-6">--}}
{{--                                        <div class="col-lg-6 mb-4 mb-lg-0">--}}
{{--                                            <div class="fv-row mb-0">--}}
{{--                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>--}}
{{--                                                <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="{{ $user->email }}" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="fv-row mb-0">--}}
{{--                                                <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>--}}
{{--                                                <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" placeholder="Confirm Password"/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <button id="kt_signin_submit" type="button" class="btn btn-primary  me-2 px-6">Update Email</button>--}}
{{--                                        <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}

{{--                            </div>--}}



{{--                            <div id="kt_signin_email_button" class="ms-auto">--}}
{{--                                <button class="btn btn-light btn-active-light-primary">Change Email</button>--}}
{{--                            </div>--}}
{{--                           --}}
{{--                        </div>--}}

                        <!--end::Email Address-->

                        <!--begin::Separator-->
{{--TODO: aradaki çizgi için kapatıldı email fonksiyonu açılınca burasıda açılacak--}}
{{--                        <div class="separator separator-dashed my-6"></div>--}}

                        <!--end::Separator-->

                        <!--begin::Password-->
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <!--begin::Label-->
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Password</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Edit-->
                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form action="{{ route('user.edit.password') }}" method="POST" id="kt_signin_change_password" class="form" novalidate="novalidate">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid " name="currentpassword" id="currentpassword" placeholder="Current Password"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid " name="newpassword" id="newpassword" placeholder="New Password"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                                <input type="password" class="form-control form-control-lg form-control-solid " name="confirmpassword" id="confirmpassword" placeholder="Confirm New Password"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-text mb-5">Password must be at least 6 character and contain symbols</div>

                                    <div class="d-flex">
                                        <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->

                            <!--begin::Action-->
                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Password-->


        </div>
    </div>

@endsection

@section('js')
@endsection
