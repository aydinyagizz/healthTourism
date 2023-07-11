@extends('admin.layout.adminLayout')

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

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-dark">
                Users
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
                            <input type="text" data-kt-users-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search user"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-users-table-toolbar="base">
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
                                <div class="px-7 py-5" data-kt-users-table-filter="form">
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
                                                data-kt-menu-dismiss="true" data-kt-users-table-filter="reset">
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


                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_users">
                                Add New User
                            </button>


                        </div>


                        <div class="d-flex justify-content-end align-items-center d-none"
                             data-kt-users-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-users-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-kt-users-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>
                        <!--end::Group actions-->


                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body py-4  table-responsive">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target="#kt_table_users .form-check-input"
                                               value=""/>
                                    </div>
                                </th>
                                <th class="min-w-125px">User</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="min-w-125px">Address</th>
                                <th class="min-w-125px">Web Site Name</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">

                            @foreach($users as $item)
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
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('admin.user.detail',[$item->id]) }}" data-id="{{ $item->id }}"
{{--                                               data-bs-toggle="modal"--}}
{{--                                               data-bs-target="#userEdit{{ $item->id }}"--}}
                                            >
                                                @if($item->user_image)
                                                    <div class="symbol-label">
                                                        <img
                                                            src="data:image/jpeg;base64,{{ $item->user_image }}"
                                                            alt="{{ $item->name }}" class="w-100"/>
                                                    </div>
                                                @else
                                                    <div class="symbol-label">
                                                        <img
                                                            src="{{ asset('public/admin/assets/media/svg/avatars/blank.svg') }}"
                                                            alt="{{ $item->name }}" class="w-100"/>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <!--end::Avatar-->

                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('admin.user.detail',[$item->id]) }}"
{{--                                               data-bs-toggle="modal"--}}
{{--                                               data-bs-target="#userEdit{{ $item->id }}"--}}
                                               class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                            <span>{{ $item->email }}</span>
                                        </div>
                                        <!--begin::User details-->

                                    </td>


                                    <td>

                                        {{ $item->phone }}

                                    </td>

                                    <td>{{ $item->address }}</td>

                                    <td>{{ $item->web_site_name }}</td>


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
                                            <div class="menu-item px-3">
                                                <a href="{{ route('admin.user.detail',[$item->id]) }}"
{{--                                                   data-bs-toggle="modal"--}}
{{--                                                   data-bs-target="#userEdit{{ $item->id }}"--}}
                                                   class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                   data-kt-users-table-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action--->
                                </tr>


                                {{--                                TODO: Modal edit Başlangıcı    --}}

                                <div class="modal fade modal-trigger" id="userEdit{{ $item->id }}" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{--                                                <h2 class="modal-title" id="exampleModalScrollableTitle">{{ $item->title }}</h2>--}}
                                                <h2 class="fw-bold">{{ $item->name }}</h2>

                                                <div
                                                    class="btn btn-icon btn-sm btn-active-icon-primary close" id="userEditCancel"
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

                                            <form action="{{ route('admin.user.update', [$item->id]) }}"
                                                  method="POST" enctype="multipart/form-data" >
                                                @csrf

                                                <div class="modal-body">


                                                    <div class="fv-row mb-7 text-center">
                                                        <div class="image-input image-input-outline"
                                                             data-kt-image-input="true"
                                                             style="background-image: url('assets/media/svg/files/blank-image.svg')">
                                                            <!--begin::Preview existing avatar-->
                                                            <div class="image-input-wrapper w-125px h-125px"
                                                                 @if($item->user_image)
                                                                     style="background-image: url('data:image/jpeg;base64,{{ $item->user_image }}')"
                                                                 @else
                                                                     style="background-image: url('assets/media/svg/files/blank-image.svg')"
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
                                                                <input type="file" name="user_image"
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
                                                            @if($item->user_image)
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



                                                        <div class=" fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fs-6 fw-semibold mb-2">Full
                                                                Name</label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid"
                                                                   placeholder="Full Name" name="name" id="name"
                                                                   required
                                                                   value="{{ $item->name }}"/>
                                                        </div>




                                                    <div class="row">



                                                            <div class="col-md-6 fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                                                <!--end::Label-->

                                                                <!--begin::Input-->
                                                                <input type="tel" class="form-control form-control-solid"
                                                                       placeholder="Phone" name="phone" id="phone" required
                                                                       value="{{ $item->phone }}"/>
                                                            </div>

                                                        <div class="col-md-6 fv-row mb-7">
                                                            <label class="required fs-6 fw-semibold mb-2 ">Web Site
                                                                Name</label>
                                                            <input type="text" class="form-control form-control-solid"
                                                                   placeholder="Web Site Name" name="web_site_name"
                                                                   id="web_site_name" required
                                                                   value="{{ $item->web_site_name }}"/>
                                                        </div>
                                                    </div>


                                                    <div class=" fv-row mb-7">
                                                        <label class="required fs-6 fw-semibold mb-2">Address</label>
                                                        <textarea class="form-control form-control-solid"
                                                                  placeholder="Address" name="address" id="address"
                                                                  cols="30"
                                                                  rows="1">{{ $item->address ? $item->address : '' }}</textarea>
                                                    </div>


                                                    <div class="fv-row mb-7">
                                                        <label class="required fs-6 fw-semibold mb-2">Status</label>

                                                        <!--begin::Select2-->
                                                        <select data-dropdown-parent="#userEdit{{ $item->id }}" name="status" required
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
                </div>
                <!--end::Card--></div>


            <!--end::Container-->                </div>


        {{--                            TODO: Add users modal start  --}}

        <div class="modal fade " id="kt_modal_add_users" tabindex="-1"
             aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('admin.user.add') }} "
                          id="kt_modal_add_users_form" enctype="multipart/form-data"
                          data-kt-redirect-users="">
                        @csrf
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Add User</h2>


                            <div id="kt_modal_add_users_close"
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


                                            <input type="file" name="user_image" accept=".png, .jpg, .jpeg"/>

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
                                            class="text-danger">{{ $errors->first('user_image') }}</span></div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>


                                </div>


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Full Name</label>
                                    <input type="text" class="form-control form-control-solid"
                                           placeholder="Full Name" name="name" id="name"/>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Email</label>
                                    <input type="email" class="form-control form-control-solid"
                                           placeholder="Email" name="email" id="email"/>
                                </div>


                                <div class=" row fv-row mb-7">
                                    <div class=" mb-6" data-kt-password-meter="true">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Password</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-md-12 fv-row position-relative mb-3">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           type="password" id="password"
                                                           placeholder="Password" name="password" autocomplete="off"/>

                                                    <span
                                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                                </div>
                                                <!--end::Col-->

                                            </div>
                                            <div class="d-flex align-items-center mb-3"
                                                 data-kt-password-meter-control="highlight">
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                                <div
                                                    class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                            </div>
                                            <div class="text-muted">
                                                Use 6 or more characters with a mix of letters, numbers & symbols.
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>


                                    <div class=" mb-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Confirm Password</label>
                                        <!--end::Label-->

                                        <!--begin::Col-->
                                        <div class="">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-md-12 fv-row">
                                                    <input class="form-control form-control-lg form-control-solid"
                                                           type="password"
                                                           placeholder="Confirm Password" name="confirm_password"
                                                           id="confirm_password"
                                                           autocomplete="off"/></div>
                                                <!--end::Col-->

                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                </div>


                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                    <input type="tel" class="form-control form-control-solid"
                                           placeholder="Phone" name="phone" id="phone"/>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Address</label>
                                    <textarea placeholder="Address" class="form-control form-control-solid"
                                              name="address" id="address" cols="30" rows="2"></textarea>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">Web Site Name</label>
                                    <input type="text" class="form-control form-control-solid"
                                           placeholder="Web Site Name" name="web_site_name" id="web_site_name"/>
                                </div>


                                {{--                                <div class=" row fv-row mb-7">--}}
                                {{--                                    <!--begin::Label-->--}}
                                {{--                                    <label class="required fs-6 fw-semibold mb-2">Country</label>--}}
                                {{--                                    <!--end::Label-->--}}

                                {{--                                    <!--begin::Col-->--}}
                                {{--                                    <div class=" fv-row">--}}
                                {{--                                        <select data-dropdown-parent="#kt_modal_add_users" id="country" name="country"  aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-semibold">--}}
                                {{--                                            <option value="">Select a Country...</option>--}}
                                {{--                                            <option data-kt-flag="flags/afghanistan.svg" value="AF">Afghanistan</option>--}}
                                {{--                                            <option data-kt-flag="flags/aland-islands.svg" value="AX">Aland Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/albania.svg" value="AL">Albania</option>--}}
                                {{--                                            <option data-kt-flag="flags/algeria.svg" value="DZ">Algeria</option>--}}
                                {{--                                            <option data-kt-flag="flags/american-samoa.svg" value="AS">American Samoa</option>--}}
                                {{--                                            <option data-kt-flag="flags/andorra.svg" value="AD">Andorra</option>--}}
                                {{--                                            <option data-kt-flag="flags/angola.svg" value="AO">Angola</option>--}}
                                {{--                                            <option data-kt-flag="flags/anguilla.svg" value="AI">Anguilla</option>--}}
                                {{--                                            <option data-kt-flag="flags/antigua-and-barbuda.svg" value="AG">Antigua and Barbuda</option>--}}
                                {{--                                            <option data-kt-flag="flags/argentina.svg" value="AR">Argentina</option>--}}
                                {{--                                            <option data-kt-flag="flags/armenia.svg" value="AM">Armenia</option>--}}
                                {{--                                            <option data-kt-flag="flags/aruba.svg" value="AW">Aruba</option>--}}
                                {{--                                            <option data-kt-flag="flags/australia.svg" value="AU">Australia</option>--}}
                                {{--                                            <option data-kt-flag="flags/austria.svg" value="AT">Austria</option>--}}
                                {{--                                            <option data-kt-flag="flags/azerbaijan.svg" value="AZ">Azerbaijan</option>--}}
                                {{--                                            <option data-kt-flag="flags/bahamas.svg" value="BS">Bahamas</option>--}}
                                {{--                                            <option data-kt-flag="flags/bahrain.svg" value="BH">Bahrain</option>--}}
                                {{--                                            <option data-kt-flag="flags/bangladesh.svg" value="BD">Bangladesh</option>--}}
                                {{--                                            <option data-kt-flag="flags/barbados.svg" value="BB">Barbados</option>--}}
                                {{--                                            <option data-kt-flag="flags/belarus.svg" value="BY">Belarus</option>--}}
                                {{--                                            <option data-kt-flag="flags/belgium.svg" value="BE">Belgium</option>--}}
                                {{--                                            <option data-kt-flag="flags/belize.svg" value="BZ">Belize</option>--}}
                                {{--                                            <option data-kt-flag="flags/benin.svg" value="BJ">Benin</option>--}}
                                {{--                                            <option data-kt-flag="flags/bermuda.svg" value="BM">Bermuda</option>--}}
                                {{--                                            <option data-kt-flag="flags/bhutan.svg" value="BT">Bhutan</option>--}}
                                {{--                                            <option data-kt-flag="flags/bolivia.svg" value="BO">Bolivia, Plurinational State of</option>--}}
                                {{--                                            <option data-kt-flag="flags/bonaire.svg" value="BQ">Bonaire, Sint Eustatius and Saba</option>--}}
                                {{--                                            <option data-kt-flag="flags/bosnia-and-herzegovina.svg" value="BA">Bosnia and Herzegovina</option>--}}
                                {{--                                            <option data-kt-flag="flags/botswana.svg" value="BW">Botswana</option>--}}
                                {{--                                            <option data-kt-flag="flags/brazil.svg" value="BR">Brazil</option>--}}
                                {{--                                            <option data-kt-flag="flags/british-indian-ocean-territory.svg" value="IO">British Indian Ocean Territory</option>--}}
                                {{--                                            <option data-kt-flag="flags/brunei.svg" value="BN">Brunei Darussalam</option>--}}
                                {{--                                            <option data-kt-flag="flags/bulgaria.svg" value="BG">Bulgaria</option>--}}
                                {{--                                            <option data-kt-flag="flags/burkina-faso.svg" value="BF">Burkina Faso</option>--}}
                                {{--                                            <option data-kt-flag="flags/burundi.svg" value="BI">Burundi</option>--}}
                                {{--                                            <option data-kt-flag="flags/cambodia.svg" value="KH">Cambodia</option>--}}
                                {{--                                            <option data-kt-flag="flags/cameroon.svg" value="CM">Cameroon</option>--}}
                                {{--                                            <option data-kt-flag="flags/canada.svg" value="CA">Canada</option>--}}
                                {{--                                            <option data-kt-flag="flags/cape-verde.svg" value="CV">Cape Verde</option>--}}
                                {{--                                            <option data-kt-flag="flags/cayman-islands.svg" value="KY">Cayman Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/central-african-republic.svg" value="CF">Central African Republic</option>--}}
                                {{--                                            <option data-kt-flag="flags/chad.svg" value="TD">Chad</option>--}}
                                {{--                                            <option data-kt-flag="flags/chile.svg" value="CL">Chile</option>--}}
                                {{--                                            <option data-kt-flag="flags/china.svg" value="CN">China</option>--}}
                                {{--                                            <option data-kt-flag="flags/christmas-island.svg" value="CX">Christmas Island</option>--}}
                                {{--                                            <option data-kt-flag="flags/cocos-island.svg" value="CC">Cocos (Keeling) Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/colombia.svg" value="CO">Colombia</option>--}}
                                {{--                                            <option data-kt-flag="flags/comoros.svg" value="KM">Comoros</option>--}}
                                {{--                                            <option data-kt-flag="flags/cook-islands.svg" value="CK">Cook Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/costa-rica.svg" value="CR">Costa Rica</option>--}}
                                {{--                                            <option data-kt-flag="flags/ivory-coast.svg" value="CI">Côte d'Ivoire</option>--}}
                                {{--                                            <option data-kt-flag="flags/croatia.svg" value="HR">Croatia</option>--}}
                                {{--                                            <option data-kt-flag="flags/cuba.svg" value="CU">Cuba</option>--}}
                                {{--                                            <option data-kt-flag="flags/curacao.svg" value="CW">Curaçao</option>--}}
                                {{--                                            <option data-kt-flag="flags/czech-republic.svg" value="CZ">Czech Republic</option>--}}
                                {{--                                            <option data-kt-flag="flags/denmark.svg" value="DK">Denmark</option>--}}
                                {{--                                            <option data-kt-flag="flags/djibouti.svg" value="DJ">Djibouti</option>--}}
                                {{--                                            <option data-kt-flag="flags/dominica.svg" value="DM">Dominica</option>--}}
                                {{--                                            <option data-kt-flag="flags/dominican-republic.svg" value="DO">Dominican Republic</option>--}}
                                {{--                                            <option data-kt-flag="flags/ecuador.svg" value="EC">Ecuador</option>--}}
                                {{--                                            <option data-kt-flag="flags/egypt.svg" value="EG">Egypt</option>--}}
                                {{--                                            <option data-kt-flag="flags/el-salvador.svg" value="SV">El Salvador</option>--}}
                                {{--                                            <option data-kt-flag="flags/equatorial-guinea.svg" value="GQ">Equatorial Guinea</option>--}}
                                {{--                                            <option data-kt-flag="flags/eritrea.svg" value="ER">Eritrea</option>--}}
                                {{--                                            <option data-kt-flag="flags/estonia.svg" value="EE">Estonia</option>--}}
                                {{--                                            <option data-kt-flag="flags/ethiopia.svg" value="ET">Ethiopia</option>--}}
                                {{--                                            <option data-kt-flag="flags/falkland-islands.svg" value="FK">Falkland Islands (Malvinas)</option>--}}
                                {{--                                            <option data-kt-flag="flags/fiji.svg" value="FJ">Fiji</option>--}}
                                {{--                                            <option data-kt-flag="flags/finland.svg" value="FI">Finland</option>--}}
                                {{--                                            <option data-kt-flag="flags/france.svg" value="FR">France</option>--}}
                                {{--                                            <option data-kt-flag="flags/french-polynesia.svg" value="PF">French Polynesia</option>--}}
                                {{--                                            <option data-kt-flag="flags/gabon.svg" value="GA">Gabon</option>--}}
                                {{--                                            <option data-kt-flag="flags/gambia.svg" value="GM">Gambia</option>--}}
                                {{--                                            <option data-kt-flag="flags/georgia.svg" value="GE">Georgia</option>--}}
                                {{--                                            <option data-kt-flag="flags/germany.svg" value="DE">Germany</option>--}}
                                {{--                                            <option data-kt-flag="flags/ghana.svg" value="GH">Ghana</option>--}}
                                {{--                                            <option data-kt-flag="flags/gibraltar.svg" value="GI">Gibraltar</option>--}}
                                {{--                                            <option data-kt-flag="flags/greece.svg" value="GR">Greece</option>--}}
                                {{--                                            <option data-kt-flag="flags/greenland.svg" value="GL">Greenland</option>--}}
                                {{--                                            <option data-kt-flag="flags/grenada.svg" value="GD">Grenada</option>--}}
                                {{--                                            <option data-kt-flag="flags/guam.svg" value="GU">Guam</option>--}}
                                {{--                                            <option data-kt-flag="flags/guatemala.svg" value="GT">Guatemala</option>--}}
                                {{--                                            <option data-kt-flag="flags/guernsey.svg" value="GG">Guernsey</option>--}}
                                {{--                                            <option data-kt-flag="flags/guinea.svg" value="GN">Guinea</option>--}}
                                {{--                                            <option data-kt-flag="flags/guinea-bissau.svg" value="GW">Guinea-Bissau</option>--}}
                                {{--                                            <option data-kt-flag="flags/haiti.svg" value="HT">Haiti</option>--}}
                                {{--                                            <option data-kt-flag="flags/vatican-city.svg" value="VA">Holy See (Vatican City State)</option>--}}
                                {{--                                            <option data-kt-flag="flags/honduras.svg" value="HN">Honduras</option>--}}
                                {{--                                            <option data-kt-flag="flags/hong-kong.svg" value="HK">Hong Kong</option>--}}
                                {{--                                            <option data-kt-flag="flags/hungary.svg" value="HU">Hungary</option>--}}
                                {{--                                            <option data-kt-flag="flags/iceland.svg" value="IS">Iceland</option>--}}
                                {{--                                            <option data-kt-flag="flags/india.svg" value="IN">India</option>--}}
                                {{--                                            <option data-kt-flag="flags/indonesia.svg" value="ID">Indonesia</option>--}}
                                {{--                                            <option data-kt-flag="flags/iran.svg" value="IR">Iran, Islamic Republic of</option>--}}
                                {{--                                            <option data-kt-flag="flags/iraq.svg" value="IQ">Iraq</option>--}}
                                {{--                                            <option data-kt-flag="flags/ireland.svg" value="IE">Ireland</option>--}}
                                {{--                                            <option data-kt-flag="flags/isle-of-man.svg" value="IM">Isle of Man</option>--}}
                                {{--                                            <option data-kt-flag="flags/israel.svg" value="IL">Israel</option>--}}
                                {{--                                            <option data-kt-flag="flags/italy.svg" value="IT">Italy</option>--}}
                                {{--                                            <option data-kt-flag="flags/jamaica.svg" value="JM">Jamaica</option>--}}
                                {{--                                            <option data-kt-flag="flags/japan.svg" value="JP">Japan</option>--}}
                                {{--                                            <option data-kt-flag="flags/jersey.svg" value="JE">Jersey</option>--}}
                                {{--                                            <option data-kt-flag="flags/jordan.svg" value="JO">Jordan</option>--}}
                                {{--                                            <option data-kt-flag="flags/kazakhstan.svg" value="KZ">Kazakhstan</option>--}}
                                {{--                                            <option data-kt-flag="flags/kenya.svg" value="KE">Kenya</option>--}}
                                {{--                                            <option data-kt-flag="flags/kiribati.svg" value="KI">Kiribati</option>--}}
                                {{--                                            <option data-kt-flag="flags/north-korea.svg" value="KP">Korea, Democratic People's Republic of</option>--}}
                                {{--                                            <option data-kt-flag="flags/kuwait.svg" value="KW">Kuwait</option>--}}
                                {{--                                            <option data-kt-flag="flags/kyrgyzstan.svg" value="KG">Kyrgyzstan</option>--}}
                                {{--                                            <option data-kt-flag="flags/laos.svg" value="LA">Lao People's Democratic Republic</option>--}}
                                {{--                                            <option data-kt-flag="flags/latvia.svg" value="LV">Latvia</option>--}}
                                {{--                                            <option data-kt-flag="flags/lebanon.svg" value="LB">Lebanon</option>--}}
                                {{--                                            <option data-kt-flag="flags/lesotho.svg" value="LS">Lesotho</option>--}}
                                {{--                                            <option data-kt-flag="flags/liberia.svg" value="LR">Liberia</option>--}}
                                {{--                                            <option data-kt-flag="flags/libya.svg" value="LY">Libya</option>--}}
                                {{--                                            <option data-kt-flag="flags/liechtenstein.svg" value="LI">Liechtenstein</option>--}}
                                {{--                                            <option data-kt-flag="flags/lithuania.svg" value="LT">Lithuania</option>--}}
                                {{--                                            <option data-kt-flag="flags/luxembourg.svg" value="LU">Luxembourg</option>--}}
                                {{--                                            <option data-kt-flag="flags/macao.svg" value="MO">Macao</option>--}}
                                {{--                                            <option data-kt-flag="flags/madagascar.svg" value="MG">Madagascar</option>--}}
                                {{--                                            <option data-kt-flag="flags/malawi.svg" value="MW">Malawi</option>--}}
                                {{--                                            <option data-kt-flag="flags/malaysia.svg" value="MY">Malaysia</option>--}}
                                {{--                                            <option data-kt-flag="flags/maldives.svg" value="MV">Maldives</option>--}}
                                {{--                                            <option data-kt-flag="flags/mali.svg" value="ML">Mali</option>--}}
                                {{--                                            <option data-kt-flag="flags/malta.svg" value="MT">Malta</option>--}}
                                {{--                                            <option data-kt-flag="flags/marshall-island.svg" value="MH">Marshall Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/martinique.svg" value="MQ">Martinique</option>--}}
                                {{--                                            <option data-kt-flag="flags/mauritania.svg" value="MR">Mauritania</option>--}}
                                {{--                                            <option data-kt-flag="flags/mauritius.svg" value="MU">Mauritius</option>--}}
                                {{--                                            <option data-kt-flag="flags/mexico.svg" value="MX">Mexico</option>--}}
                                {{--                                            <option data-kt-flag="flags/micronesia.svg" value="FM">Micronesia, Federated States of</option>--}}
                                {{--                                            <option data-kt-flag="flags/moldova.svg" value="MD">Moldova, Republic of</option>--}}
                                {{--                                            <option data-kt-flag="flags/monaco.svg" value="MC">Monaco</option>--}}
                                {{--                                            <option data-kt-flag="flags/mongolia.svg" value="MN">Mongolia</option>--}}
                                {{--                                            <option data-kt-flag="flags/montenegro.svg" value="ME">Montenegro</option>--}}
                                {{--                                            <option data-kt-flag="flags/montserrat.svg" value="MS">Montserrat</option>--}}
                                {{--                                            <option data-kt-flag="flags/morocco.svg" value="MA">Morocco</option>--}}
                                {{--                                            <option data-kt-flag="flags/mozambique.svg" value="MZ">Mozambique</option>--}}
                                {{--                                            <option data-kt-flag="flags/myanmar.svg" value="MM">Myanmar</option>--}}
                                {{--                                            <option data-kt-flag="flags/namibia.svg" value="NA">Namibia</option>--}}
                                {{--                                            <option data-kt-flag="flags/nauru.svg" value="NR">Nauru</option>--}}
                                {{--                                            <option data-kt-flag="flags/nepal.svg" value="NP">Nepal</option>--}}
                                {{--                                            <option data-kt-flag="flags/netherlands.svg" value="NL">Netherlands</option>--}}
                                {{--                                            <option data-kt-flag="flags/new-zealand.svg" value="NZ">New Zealand</option>--}}
                                {{--                                            <option data-kt-flag="flags/nicaragua.svg" value="NI">Nicaragua</option>--}}
                                {{--                                            <option data-kt-flag="flags/niger.svg" value="NE">Niger</option>--}}
                                {{--                                            <option data-kt-flag="flags/nigeria.svg" value="NG">Nigeria</option>--}}
                                {{--                                            <option data-kt-flag="flags/niue.svg" value="NU">Niue</option>--}}
                                {{--                                            <option data-kt-flag="flags/norfolk-island.svg" value="NF">Norfolk Island</option>--}}
                                {{--                                            <option data-kt-flag="flags/northern-mariana-islands.svg" value="MP">Northern Mariana Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/norway.svg" value="NO">Norway</option>--}}
                                {{--                                            <option data-kt-flag="flags/oman.svg" value="OM">Oman</option>--}}
                                {{--                                            <option data-kt-flag="flags/pakistan.svg" value="PK">Pakistan</option>--}}
                                {{--                                            <option data-kt-flag="flags/palau.svg" value="PW">Palau</option>--}}
                                {{--                                            <option data-kt-flag="flags/palestine.svg" value="PS">Palestinian Territory, Occupied</option>--}}
                                {{--                                            <option data-kt-flag="flags/panama.svg" value="PA">Panama</option>--}}
                                {{--                                            <option data-kt-flag="flags/papua-new-guinea.svg" value="PG">Papua New Guinea</option>--}}
                                {{--                                            <option data-kt-flag="flags/paraguay.svg" value="PY">Paraguay</option>--}}
                                {{--                                            <option data-kt-flag="flags/peru.svg" value="PE">Peru</option>--}}
                                {{--                                            <option data-kt-flag="flags/philippines.svg" value="PH">Philippines</option>--}}
                                {{--                                            <option data-kt-flag="flags/poland.svg" value="PL">Poland</option>--}}
                                {{--                                            <option data-kt-flag="flags/portugal.svg" value="PT">Portugal</option>--}}
                                {{--                                            <option data-kt-flag="flags/puerto-rico.svg" value="PR">Puerto Rico</option>--}}
                                {{--                                            <option data-kt-flag="flags/qatar.svg" value="QA">Qatar</option>--}}
                                {{--                                            <option data-kt-flag="flags/romania.svg" value="RO">Romania</option>--}}
                                {{--                                            <option data-kt-flag="flags/russia.svg" value="RU">Russian Federation</option>--}}
                                {{--                                            <option data-kt-flag="flags/rwanda.svg" value="RW">Rwanda</option>--}}
                                {{--                                            <option data-kt-flag="flags/st-barts.svg" value="BL">Saint Barthélemy</option>--}}
                                {{--                                            <option data-kt-flag="flags/saint-kitts-and-nevis.svg" value="KN">Saint Kitts and Nevis</option>--}}
                                {{--                                            <option data-kt-flag="flags/st-lucia.svg" value="LC">Saint Lucia</option>--}}
                                {{--                                            <option data-kt-flag="flags/sint-maarten.svg" value="MF">Saint Martin (French part)</option>--}}
                                {{--                                            <option data-kt-flag="flags/st-vincent-and-the-grenadines.svg" value="VC">Saint Vincent and the Grenadines</option>--}}
                                {{--                                            <option data-kt-flag="flags/samoa.svg" value="WS">Samoa</option>--}}
                                {{--                                            <option data-kt-flag="flags/san-marino.svg" value="SM">San Marino</option>--}}
                                {{--                                            <option data-kt-flag="flags/sao-tome-and-prince.svg" value="ST">Sao Tome and Principe</option>--}}
                                {{--                                            <option data-kt-flag="flags/saudi-arabia.svg" value="SA">Saudi Arabia</option>--}}
                                {{--                                            <option data-kt-flag="flags/senegal.svg" value="SN">Senegal</option>--}}
                                {{--                                            <option data-kt-flag="flags/serbia.svg" value="RS">Serbia</option>--}}
                                {{--                                            <option data-kt-flag="flags/seychelles.svg" value="SC">Seychelles</option>--}}
                                {{--                                            <option data-kt-flag="flags/sierra-leone.svg" value="SL">Sierra Leone</option>--}}
                                {{--                                            <option data-kt-flag="flags/singapore.svg" value="SG">Singapore</option>--}}
                                {{--                                            <option data-kt-flag="flags/sint-maarten.svg" value="SX">Sint Maarten (Dutch part)</option>--}}
                                {{--                                            <option data-kt-flag="flags/slovakia.svg" value="SK">Slovakia</option>--}}
                                {{--                                            <option data-kt-flag="flags/slovenia.svg" value="SI">Slovenia</option>--}}
                                {{--                                            <option data-kt-flag="flags/solomon-islands.svg" value="SB">Solomon Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/somalia.svg" value="SO">Somalia</option>--}}
                                {{--                                            <option data-kt-flag="flags/south-africa.svg" value="ZA">South Africa</option>--}}
                                {{--                                            <option data-kt-flag="flags/south-korea.svg" value="KR">South Korea</option>--}}
                                {{--                                            <option data-kt-flag="flags/south-sudan.svg" value="SS">South Sudan</option>--}}
                                {{--                                            <option data-kt-flag="flags/spain.svg" value="ES">Spain</option>--}}
                                {{--                                            <option data-kt-flag="flags/sri-lanka.svg" value="LK">Sri Lanka</option>--}}
                                {{--                                            <option data-kt-flag="flags/sudan.svg" value="SD">Sudan</option>--}}
                                {{--                                            <option data-kt-flag="flags/suriname.svg" value="SR">Suriname</option>--}}
                                {{--                                            <option data-kt-flag="flags/swaziland.svg" value="SZ">Swaziland</option>--}}
                                {{--                                            <option data-kt-flag="flags/sweden.svg" value="SE">Sweden</option>--}}
                                {{--                                            <option data-kt-flag="flags/switzerland.svg" value="CH">Switzerland</option>--}}
                                {{--                                            <option data-kt-flag="flags/syria.svg" value="SY">Syrian Arab Republic</option>--}}
                                {{--                                            <option data-kt-flag="flags/taiwan.svg" value="TW">Taiwan, Province of China</option>--}}
                                {{--                                            <option data-kt-flag="flags/tajikistan.svg" value="TJ">Tajikistan</option>--}}
                                {{--                                            <option data-kt-flag="flags/tanzania.svg" value="TZ">Tanzania, United Republic of</option>--}}
                                {{--                                            <option data-kt-flag="flags/thailand.svg" value="TH">Thailand</option>--}}
                                {{--                                            <option data-kt-flag="flags/togo.svg" value="TG">Togo</option>--}}
                                {{--                                            <option data-kt-flag="flags/tokelau.svg" value="TK">Tokelau</option>--}}
                                {{--                                            <option data-kt-flag="flags/tonga.svg" value="TO">Tonga</option>--}}
                                {{--                                            <option data-kt-flag="flags/trinidad-and-tobago.svg" value="TT">Trinidad and Tobago</option>--}}
                                {{--                                            <option data-kt-flag="flags/tunisia.svg" value="TN">Tunisia</option>--}}
                                {{--                                            <option data-kt-flag="flags/turkey.svg" value="TR">Turkey</option>--}}
                                {{--                                            <option data-kt-flag="flags/turkmenistan.svg" value="TM">Turkmenistan</option>--}}
                                {{--                                            <option data-kt-flag="flags/turks-and-caicos.svg" value="TC">Turks and Caicos Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/tuvalu.svg" value="TV">Tuvalu</option>--}}
                                {{--                                            <option data-kt-flag="flags/uganda.svg" value="UG">Uganda</option>--}}
                                {{--                                            <option data-kt-flag="flags/ukraine.svg" value="UA">Ukraine</option>--}}
                                {{--                                            <option data-kt-flag="flags/united-arab-emirates.svg" value="AE">United Arab Emirates</option>--}}
                                {{--                                            <option data-kt-flag="flags/united-kingdom.svg" value="GB">United Kingdom</option>--}}
                                {{--                                            <option data-kt-flag="flags/united-states.svg" value="US">United States</option>--}}
                                {{--                                            <option data-kt-flag="flags/uruguay.svg" value="UY">Uruguay</option>--}}
                                {{--                                            <option data-kt-flag="flags/uzbekistan.svg" value="UZ">Uzbekistan</option>--}}
                                {{--                                            <option data-kt-flag="flags/vanuatu.svg" value="VU">Vanuatu</option>--}}
                                {{--                                            <option data-kt-flag="flags/venezuela.svg" value="VE">Venezuela, Bolivarian Republic of</option>--}}
                                {{--                                            <option data-kt-flag="flags/vietnam.svg" value="VN">Vietnam</option>--}}
                                {{--                                            <option data-kt-flag="flags/virgin-islands.svg" value="VI">Virgin Islands</option>--}}
                                {{--                                            <option data-kt-flag="flags/yemen.svg" value="YE">Yemen</option>--}}
                                {{--                                            <option data-kt-flag="flags/zambia.svg" value="ZM">Zambia</option>--}}
                                {{--                                            <option data-kt-flag="flags/zimbabwe.svg" value="ZW">Zimbabwe</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </div>--}}
                                {{--                                    <!--end::Col-->--}}
                                {{--                                </div>--}}


                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Modal body-->

                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="reset" id="kt_modal_add_users_cancel"
                                    class="btn btn-light me-3">
                                Discard
                            </button>
                            <!--end::Button-->

                            <!--begin::Button-->
                            <button type="submit" id="kt_modal_add_users_submit"
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

        {{--                            TODO: Add users modal end  --}}


        <input type="hidden" id="delete-url-users" value="{{ route('admin.user.delete') }}">

@endsection

@section('js')
@endsection
