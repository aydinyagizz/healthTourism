@extends('admin.layout.adminLayout')

@section('title')
    Disease Update
@endsection

@section('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js" integrity="sha512-UhysBLt7bspJ0yBkIxTrdubkLVd4qqE4Ek7k22ijq/ZAYe0aadTVXZzFSIwgC9VYnJabw7kg9UMBsiLC77LXyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <a href="{{ route('admin.index') }}" class="text-muted text-hover-primary">
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

                    <form class="form" method="POST" action="{{ route('admin.diseases.update',[$diseases->id]) }}"
                          {{--                          id="kt_modal_add_blog_form"--}}
                          data-kt-redirect-blog-category="" enctype="multipart/form-data">
                        @csrf


                        <div class="card-body pt-0">


                            <div class="fv-row mb-7 text-center">
                                <div class="image-input image-input-outline"
                                     data-kt-image-input="true"
                                     style="background-image: url('assets/media/svg/files/blank-image.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                         @if($diseases->image)
                                             style="background-image: url('data:image/jpeg;base64,{{ $diseases->image }}')"
                                         @else
                                             style="background-image: url('assets/media/sabit/blog.jpg')"
                                        @endif

                                    ></div>
                                    <!--end::Preview existing avatar-->

                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change"
                                        data-bs-toggle="tooltip"
                                        title="Change image">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="diseases_image"
                                               accept=".png, .jpg, .jpeg"/>

                                        <input type="hidden" name="avatar_remove"/>

                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel"
                                        data-bs-toggle="tooltip"
                                        title="Cancel image">
                                                                                                 <i class="bi bi-x fs-2"></i>
                                                                                        </span>
                                    <!--end::Cancel-->

                                    <!--begin::Remove-->
                                    @if($diseases->image)
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove"
                                            data-bs-toggle="tooltip"
                                            title="Remove image">
                                                                                                <i class="bi bi-x fs-2"></i>
                                                                                        </span>
                                    @endif
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                            </div>



                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Diseases Category</label>

                                <!--begin::Select2-->
                                <select name="diseases_category" required
                                        class="form-select mb-2"
                                        data-control="select2"
                                        data-hide-search="true"
                                        data-placeholder="Select category" id="diseases_category">
                                    <option value=""></option>
                                    @foreach($diseases_category as $item)

                                        @if($diseases->diseases_category_id == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif

                                    @endforeach
                                </select>
                                <!--end::Select2-->
                            </div>


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Title</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" required
                                       placeholder="Diseases Title" name="title" id="title" value="{{ $diseases ? $diseases->title : '' }}"/>


                            </div>


                            <div class="fv-row mb-7">
                                <!--begin::Input group-->
                                <!--begin::Label-->
                                <label class="form-label required">Cities</label>
                                <!--end::Label-->

                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" name="cities[]" id="cities"
                                        data-placeholder="Select an option" data-allow-clear="true"

                                        multiple="multiple">
{{--                                    @foreach($cities as $item)--}}
{{--                                        <option value="{{ $item->id }}">{{ $item->name }}</option>--}}
{{--                                    @endforeach--}}

                                    @foreach($cities as $city)
                                        @php $isSelected = in_array($city->id, $diseases->cities->pluck('id')->toArray()) @endphp
                                        <option value="{{ $city->id }}" @if($isSelected) selected @endif>{{ $city->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Status</label>

                                <!--begin::Select2-->
                                <select name="status" required
                                        class="form-select mb-2"
                                        data-control="select2"
                                        data-hide-search="true"
                                        data-placeholder="Select category"
                                        id="status{{ $diseases->id }}">
                                    @if($diseases->status)
                                        <option value="1">Active</option>
                                        <option value="0">Pending</option>
                                    @else
                                        <option value="0">Pending</option>
                                        <option value="1">Active</option>
                                    @endif

                                </select>
                                <!--end::Select2-->
                            </div>



                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Featured</label>

                                <!--begin::Select2-->
                                <select name="featured" required
                                        class="form-select mb-2"
                                        data-control="select2"
                                        data-hide-search="true"
                                        data-placeholder="Select category"
                                        id="featured{{ $diseases->id }}">
                                    @if($diseases->featured)
                                        <option value="1">Active</option>
                                        <option value="0">Pending</option>
                                    @else
                                        <option value="0">Pending</option>
                                        <option value="1">Active</option>
                                    @endif

                                </select>
                                <!--end::Select2-->
                            </div>





                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-semibold mb-2">Content</label>


                                    <textarea id="diseases_content" name="diseases_content"  style="visibility: visible;">{!! $diseases ? $diseases->content : '' !!}</textarea>


                            </div>

                            <div class="mb-10 fv-row d-flex justify-content-end mt-10">

                                <button type="reset" id="kt_modal_add_blog_cancel"
                                        class="btn btn-light me-3">
                                    Discard
                                </button>
                                <!--end::Button-->

                                <!--begin::Button-->
                                <button type="submit"
                                        {{--                                        id="kt_modal_add_blog_submit"--}}
                                        class="btn btn-primary">
                        <span class="indicator-label">
                            Submit
                        </span>
                                    <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                                </button>


                            </div>
                            <!--end::Card header-->
                        </div>

                    </form>


                </div>


            </div>

        </div>
    </div>





    <script>
        tinymce.init({
            selector: 'textarea[name="diseases_content"]',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | codesample code link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Aydın Yağız',
            codesample_languages: [
                { text: 'PHP', value: 'php' },
                { text: 'HTML/XML', value: 'html' },
                { text: 'CSS', value: 'css' },
                { text: 'JavaScript', value: 'javascript' },
                { text: 'C#', value: 'csharp' },
                { text: 'Java', value: 'java' },
                { text: 'Python', value: 'python' },
                { text: 'Ruby', value: 'ruby' },
                { text: 'Swift', value: 'swift' },
                { text: 'Kotlin', value: 'kotlin' },
                { text: 'Objective-C', value: 'objc' },
                { text: 'C++', value: 'cpp' },
                { text: 'C', value: 'c' },
                { text: 'SQL', value: 'sql' }
                // Diğer programlama dillerini buraya ekleyebilirsiniz
            ],

        });
    </script>


@endsection

@section('js')
@endsection
