@extends('user.layout.userLayout')

@section('title')
    Home
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

            {{--                    <li class="breadcrumb-item text-muted">--}}
            {{--                        <a href="index708f.html?page=index" class="text-muted text-hover-primary">--}}
            {{--                        Dashboards </a>--}}
            {{--                    </li>--}}

            {{--                    <li class="breadcrumb-item text-dark">--}}
            {{--                        Logistics--}}
            {{--                    </li>--}}

        </ul>
        <!--end::Breadcrumb-->
    </div>


    user ındex
@endsection

@section('js')
@endsection
