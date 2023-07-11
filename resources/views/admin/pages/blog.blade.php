@extends('admin.layout.adminLayout')

@section('title')
    Blog
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
            Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
        </h1>
        <!--end::Heading-->

        <!--begin::Breadcrumb-->
        <ul class="breadcrumb fw-semibold fs-base mb-1">
{{--            <li class="breadcrumb-item text-muted">--}}
{{--                <a href="index708f.html?page=index" class="text-muted text-hover-primary">--}}
{{--                    Home </a>--}}
{{--            </li>--}}

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-dark">
                Blogs
            </li>

        </ul>

    </div>



    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">

        <div class=" container-xxl " id="kt_content_container">

            <div class="card">

                <div class="card-header border-0 pt-6">

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
                            <input type="text" data-kt-blog-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search blog"/>
                        </div>

                    </div>

                    <div class="card-toolbar">

                        <div class="d-flex justify-content-end" data-kt-blog-table-toolbar="base">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_blog_modal">
                                Add New Blog
                            </button>

                        </div>


                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-blog-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-blog-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-kt-blog-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>


                    </div>


                    <div class="card-body py-4 table-responsive">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 "
                               id="kt_table_blog">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0 ">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#kt_table_blog .form-check-input"
                                               value=""/>
                                    </div>
                                </th>
                                <th class="min-w-125px">Blog</th>
                                <th class="min-w-125px">Category</th>

                                <th class="min-w-125px">Status</th>

                                <th class="min-w-125px">Created Date</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>

                            <tbody class="text-gray-600 fw-semibold">

                            @foreach($blog as $item)
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}"/>
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->

                                    <!--begin::User--->
                                    <td class="d-flex align-items-center">


                                        <div class="d-flex">
                                            <!--begin::Thumbnail-->
                                            <a href="#" data-id="{{ $item->id }}" class="symbol symbol-70px"
                                               data-bs-toggle="modal"
                                               data-bs-target="#exampleModalScrollable{{ $item->id }}">
                                                @if($item->image)
                                                    <img src="data:image/jpeg;base64,{{ $item->image }}"
                                                         alt="{{ $item->title }}">
                                                @else
                                                    <img src="{{ asset('admin/assets/media/sabit/blog.jpg') }}"
                                                         alt="{{ $item->title }}">
                                                @endif

                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">

                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                   data-kt-ecommerce-category-filter="category_name"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#exampleModalScrollable{{ $item->id }}">{{ $item->title }}</a>

                                                {{--                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"--}}
                                                {{--                                                   data-kt-ecommerce-category-filter="category_name"--}}
                                                {{--                                                   data-bs-toggle="modal"--}}
                                                {{--                                                   data-bs-target="#exampleModalScrollable{{ $item->id }}">{{ $item->title }}</div>--}}

                                                <!--begin::Description-->
                                                <div
                                                    class="text-muted fs-7 fw-bold">{!! $item->content ?  Str::limit($item->content, 50, '...') : '' !!}</div>
                                                <!--end::Description-->
                                            </div>
                                        </div>

                                    </td>

                                    <td>{{ $item->category_name }}</td>


                                    <td>
                                        @if($item->status)
                                            <div class="badge py-3 px-4 fs-7 badge-light-success">Active</div>

                                        @else
                                            <div class="badge py-3 px-4 fs-7 badge-light-danger">Pending</div>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $item->created_at }}
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
                                            <div class="menu-item px-3">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#blogEdit{{ $item->id }}"
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                   data-kt-blog-table-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action--->
                                </tr>




                                {{--                                TODO: Modal Başlangıcı    --}}

                                <div class="modal fade" id="exampleModalScrollable{{ $item->id }}" tabindex="-1"
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
                                            <div class="modal-body">


                                                <div class="fv-row mb-7 text-center">
                                                    <div class="text-center mb-7">
                                                        @if($item->image)
                                                            <img class="" style="max-width: 300px"
                                                                 src="data:image/jpeg;base64,{{ $item->image }}"
                                                                 alt="{{ $item->title }}">
                                                        @else
                                                            <img class="" style="max-width: 300px"
                                                                 src="{{ asset('admin/assets/media/sabit/blog.jpg') }}"
                                                                 alt="{{ $item->title }}">
                                                        @endif
                                                    </div>

                                                    <div
                                                        class="badge badge-light-success">{{ $item->category_name }}</div>
                                                </div>

                                                <div class="fv-row mb-7 text-center">
                                                    {!! $item->content !!}
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--                                TODO: Modal Bitişi     --}}





                                {{--                                TODO: Modal update Başlangıcı    --}}

                                <div class="modal fade" id="blogEdit{{ $item->id }}" tabindex="-1"
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

                                            <form action="{{ route('admin.blog.update', [$item->id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-body">


                                                    <div class="fv-row mb-7 text-center">
                                                        <div class="image-input image-input-outline"
                                                             data-kt-image-input="true"
                                                             style="background-image: url('assets/media/svg/files/blank-image.svg')">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                 @if($item->image)
                                                                 style="background-image: url('data:image/jpeg;base64,{{ $item->image }}')"
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
                                                                <input type="file" name="blog_image"
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
                                                            @if($item->image)
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
                                                        <label class="required fs-6 fw-semibold mb-2">Blog
                                                            Category</label>

                                                        <!--begin::Select2-->
                                                        <select name="blog_category" required
                                                                class="form-select mb-2"
                                                                data-control="select2"
                                                                data-hide-search="true"
                                                                data-placeholder="Select category"
                                                                id="blog_category{{ $item->id }}">
                                                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                                            @foreach($blog_category as $items)
                                                                @if ($items->id != $item->category_id)
                                                                <option
                                                                    value="{{ $items->id }}">{{ $items->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <!--end::Select2-->
                                                    </div>


                                                    <div class="fv-row mb-7">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>

                                                        <!--begin::Select2-->
                                                        <select name="status" required
                                                                class="form-select mb-2"
                                                                data-control="select2"
                                                                data-hide-search="true"
                                                                data-placeholder="Select category" id="status{{ $item->id }}">
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




                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold mb-2">Title</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control "
                                                               required
                                                               placeholder="Blog Title" name="title" id="title"
                                                               value="{{ $item->title }}"/>


                                                    </div>

                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fs-6 fw-semibold mb-2">Content</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        {{--                                    <input type="text" class="form-control form-control-solid"--}}
                                                        {{--                                           placeholder="AdminBlog Content" name="content" id="content"/>--}}

                                                        <div class="card-body">
                                                        <textarea id="" name="blog_content"
                                                                  required>{!! $item->content !!}</textarea>
                                                        </div>


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


                                {{--                                TODO: Modal update Bitişi     --}}

                            @endforeach

                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>

                </div>

            </div>

        </div>


        {{--                            TODO: Add blog modal start  --}}

        <div class="modal fade " id="kt_modal_add_blog_modal" tabindex="-1"
             aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered mw-650px">

                <div class="modal-content">

                    <form class="form" method="POST" action="{{ route('admin.blog.add') }} "
                          id="kt_modal_add_blog_form"
                          data-kt-redirect-blog-category="" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Add a Customer</h2>


                            <div id="kt_modal_add_blog_close"
                                 class="btn btn-icon btn-sm btn-active-icon-primary">

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


                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll"
                                 data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                 data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                 data-kt-scroll-offset="300px">


                                <div class="fv-row mb-7 text-center">

                                    <label class="d-block fw-semibold fs-6 mb-5">Image</label>

                                    <style>

                                        .image-input-placeholder {

                                            background-image: url('assets/media/svg/files/blank-image.svg');
                                        !important;
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('assets/media/svg/files/blank-image-dark.svg') !important;
                                        }
                                    </style>

                                    <div style="margin-left: 15px"
                                         class="image-input image-input-outline image-input-empty image-input-placeholder "
                                         data-kt-image-input="true">

                                        <div class="image-input-wrapper w-125px h-125px"></div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change blog image">
                                            <i class="bi bi-pencil-fill fs-7"></i>


                                            <input type="file" name="blog_image" accept=".png, .jpg, .jpeg"/>

                                            <input type="hidden" name="avatar_remove"/>

                                        </label>


                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>


                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                                                <i class="bi bi-x fs-2"></i>
                                                            </span>

                                    </div>


                                    <div class="form-text"><span
                                            class="text-danger">{{ $errors->first('blog_image') }}</span></div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>


                                </div>


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Blog Category</label>

                                    <!--begin::Select2-->
                                    <select name="blog_category" required
                                            class="form-select mb-2"
                                            data-control="select2"
                                            data-hide-search="true"
                                            data-placeholder="Select category" id="blog_category">
                                        <option value=""></option>
                                        @foreach($blog_category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                           placeholder="Blog Title" name="title" id="title"/>


                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Content</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    {{--                                    <input type="text" class="form-control form-control-solid"--}}
                                    {{--                                           placeholder="AdminBlog Content" name="content" id="content"/>--}}

                                    <div class="card-body">
                                        <textarea id="blog_content" name="blog_content" required></textarea>
                                    </div>


                                </div>


                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Modal body-->

                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_blog_cancel"
                                    class="btn btn-light me-3">
                                Discard
                            </button>
                            <!--end::Button-->

                            <!--begin::Button-->
                            <button type="submit" id="kt_modal_add_blog_submit"
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

        {{--                            TODO: Add blog modal end  --}}


        <input type="hidden" id="delete-url-blog" value="{{ route('admin.blog.delete') }}">

    </div>

    {{--    <script>--}}
    {{--        CKEDITOR.replace('blog_content');--}}

    {{--    </script>--}}
    <script>
        CKEDITOR.replaceAll();

    </script>
@endsection

@section('js')
@endsection
