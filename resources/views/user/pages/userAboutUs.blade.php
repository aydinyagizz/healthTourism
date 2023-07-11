@extends('user.layout.userLayout')

@section('title')
    About Us
@endsection

@section('css')
    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

{{--    <script src="https://cdn.tiny.cloud/1/qi1czsjqzrlz1h5wjlfz99gbx6qyhbmzfz0zz9gtn68q6nsf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}


@endsection

@section('content')




    <div
        class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
        data-kt-swapper="true"
        data-kt-swapper-mode="prepend"
        data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

        <!--begin::Heading-->
        <h1 class="text-dark fw-bold mt-1 mb-1 fs-2">
            About Us <small class="text-muted fs-6 fw-normal ms-1"></small>
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
                About Us
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


                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">

                    </div>
                    <!--end::Card header-->

                    <form action="{{ route('user.about.us.update') }}" method="POST" id="">
                        @csrf


                        <div class="card-body pt-0">

                            <div class="mb-10 fv-row">

                                <label class="required form-label">Title</label>

                                <input type="text" name="title" class="form-control mb-2"
                                       placeholder="Title" value="{{ $about_us ? $about_us->title : '' }}"/>


                            </div>

                            <div>

                                <label class="required form-label">Content</label>

                                <textarea id="about_us_content" name="about_us_content" class="tox-target"
                                          required>{!!  $about_us ? $about_us->content : ''  !!}</textarea>


                            </div>



                            <div class="mb-10 fv-row d-flex justify-content-end mt-10">
                                @can('about us update')
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                     <span class="indicator-label">
                                                 Save Changes
                                                    </span>
                                    <span class="indicator-progress">
                                          Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                @endcan

                            </div>
                            <!--end::Card header-->
                        </div>

                    </form>


                </div>


            </div>

        </div>
    </div>
    <script>
        CKEDITOR.replaceAll();

    </script>

{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: 'textarea',--}}
{{--            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',--}}
{{--            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',--}}
{{--            tinycomments_mode: 'embedded',--}}
{{--            tinycomments_author: 'Author name',--}}
{{--            // mergetags_list: [--}}
{{--            //     { value: 'First.Name', title: 'First Name' },--}}
{{--            //     { value: 'Email', title: 'Email' },--}}
{{--            // ]--}}
{{--        });--}}
{{--    </script>--}}




@endsection

@section('js')
@endsection
