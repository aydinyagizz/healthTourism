@extends('admin.layout.adminLayout')

@section('title')
    User Detail
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

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.index') }}" class="text-muted text-hover-primary">
                    Dashboard </a>
            </li>

            <li class="breadcrumb-item text-muted">
                <a href="{{ route('admin.user.list') }}" class="text-muted text-hover-primary">
                    User List </a>
            </li>

            <li class="breadcrumb-item text-dark">
                View User Details
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>



    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">

        <div class=" container-xxl " id="kt_content_container">

            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->


                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if($user->user_image)

                                        <img
                                            src="data:image/jpeg;base64,{{ $user->user_image }}"
                                            alt="{{ $user->name }}" class="w-100"/>

                                    @else

                                        <img
                                            src="{{ asset('public/admin/assets/media/svg/avatars/blank.svg') }}"
                                            alt="{{ $user->name }}" class="w-100"/>

                                    @endif

                                    {{--                                    <img src="{{ asset('public/admin/assets/media/avatars/300-6.jpg') }}" alt="image"/>--}}
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $user->name }} </a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">User</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                            </div>
                            <!--end::User Info-->        <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                     href="#kt_user_view_details" role="button" aria-expanded="false"
                                     aria-controls="kt_user_view_details">
                                    Details
                                    <span class="ms-2 rotate-180">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
<span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
    fill="currentColor"/>
</svg>
</span>
                                        <!--end::Svg Icon-->                </span>
                                </div>

                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit user details">
                <a href="#" class="btn btn-sm btn-light-primary"
                   data-bs-toggle="modal"
                   data-bs-target="#kt_modal_update_details"

                >
                    Edit
                </a>
            </span>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600"><a href="#"
                                                                  class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Phone</div>
                                    <div class="text-gray-600">{!! $user->phone !!}
                                    </div>

                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Address</div>
                                    <div class="text-gray-600">{!! $user->address !!}
                                    </div>

                                    <div class="fw-bold mt-5">Web Site Name</div>
                                    <div class="text-gray-600">{!! $user->web_site_name !!}
                                    </div>

                                    <div class="fw-bold mt-5">Status</div>
                                    @if($user->status)
                                        <div class="text-gray-600"><div class="badge py-3 px-4 fs-7 badge-light-success">Active</div></div>

                                    @else
                                        <div class="text-gray-600"><div class="badge py-3 px-4 fs-7 badge-light-danger">Pending</div></div>
                                    @endif


                                    <div class="fw-bold mt-5">Last Login</div>
                                    <div
                                        class="text-gray-600">{{ $userLastLog ? $userLastLog->created_at : 'No logs found' }}</div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Connected Accounts-->

                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link text-active-primary pb-4"--}}
{{--                               href="{{ route('admin.user.detail', [$user->id]) }}">Overview</a>--}}
{{--                        </li>--}}


                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4"
                               href="{{ route('admin.user.detail', [$user->id]) }}">Security</a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                               href="{{ route('admin.user.detail.log', [$user->id]) }}">Logs</a>
                        </li>
                        <!--end:::Tab item-->


                    </ul>
                    <!--end:::Tabs-->

                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade " id="kt_user_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">User's Schedule</h2>
                                    </div>
                                    <!--end::Card title-->


                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body p-9 pt-4">


                                    kart içeriği


                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                            <!--begin::Tasks-->

                            <!--end::Tasks-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Profile</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5"
                                               id="kt_table_users_login_session">
                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                            <tr>
                                                <td>Email</td>
                                                <td>smith@kpmg.com</td>
                                                <td class="text-end">
                                                    <button type="button"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_update_email">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                                                               viewBox="0 0 24 24"
                                                                                               fill="none"
                                                                                               xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3"
      d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
      fill="currentColor"/>
<path
    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
    fill="currentColor"/>
</svg>
</span>
                                                        <!--end::Svg Icon-->                            </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td>******</td>
                                                <td class="text-end">
                                                    <button type="button"
                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_update_password">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3"><svg width="24" height="24"
                                                                                               viewBox="0 0 24 24"
                                                                                               fill="none"
                                                                                               xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3"
      d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
      fill="currentColor"/>
<path
    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
    fill="currentColor"/>
</svg>
</span>
                                                        <!--end::Svg Icon-->                            </button>
                                                </td>
                                            </tr>

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                            <!--begin::Card-->

                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Login Sessions</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5"
                                               id="kt_table_users_login_session">
                                            <!--begin::Table head-->
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th>Device</th>
                                                <th>IP Address</th>
                                                <th class="min-w-125px">Time</th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                            @foreach($logs as $item)
                                                <tr>
                                                    <!--begin::Status--->
                                                    <td>
                                                        {{ $item->user_agent }}
                                                    </td>
                                                    <!--end::Status--->

                                                    <!--begin::Amount--->
                                                    <td>
                                                        {{ $item->ip_address }}
                                                    </td>
                                                    <!--end::Amount--->

                                                    <!--begin::Date--->
                                                    <td>
                                                        {{ $item ? $item->getLastLoginAttribute() : '' }}
                                                    </td>
                                                    <!--end::Date--->

                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <!--end::Table body-->

                                        </table>
                                        <!--end::Table-->



                                    </div>
                                    <!--end::Table wrapper-->
                                    {{ $logs->links() }}
                                </div>
                                <!--end::Card body-->

                            </div>
                            <!--end::Card-->


                            <!--begin::Card-->

                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->


                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->


            </div>
            {{--                                TODO: Modal edit Başlangıcı    --}}

            <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('admin.user.update', [$user->id]) }}"  method="POST" enctype="multipart/form-data" id="kt_modal_update_user_form">
                           @csrf
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_update_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Update User Details</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
{{--                                     data-kt-users-modal-action_edit="close"--}}
data-bs-dismiss="modal" aria-label="Close"
                                >
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24"
                                                                           fill="none"
                                                                           xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
      fill="currentColor"/>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
</svg>

</span>
                                    <!--end::Svg Icon-->                    </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll"
                                     data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                     data-kt-scroll-max-height="auto"
                                     data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                     data-kt-scroll-wrappers="#kt_modal_update_user_scroll"
                                     data-kt-scroll-offset="300px">

                                    <div class="fv-row mb-7 text-center mt-4">
                                        <div class="image-input image-input-outline"
                                             data-kt-image-input="true"
                                             style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                 @if($user->user_image)
                                                     style="background-image: url('data:image/jpeg;base64,{{ $user->user_image }}')"
                                                 @else
                                                     style="background-image: url('../assets/media/svg/avatars/blank.svg')"
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
                                            @if($user->user_image)
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
                                               value="{{ $user->name }}"/>
                                    </div>


                                    <div class="row">


                                        <div class="col-md-6 fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="tel" class="form-control form-control-solid"
                                                   placeholder="Phone" name="phone" id="phone" required
                                                   value="{{ $user->phone }}"/>
                                        </div>

                                        <div class="col-md-6 fv-row mb-7">
                                            <label class="required fs-6 fw-semibold mb-2 ">Web Site
                                                Name</label>
                                            <input type="text" class="form-control form-control-solid"
                                                   placeholder="Web Site Name" name="web_site_name"
                                                   id="web_site_name" required
                                                   value="{{ $user->web_site_name }}"/>
                                        </div>
                                    </div>


                                    <div class=" fv-row mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Address</label>
                                        <textarea class="form-control form-control-solid"
                                                  placeholder="Address" name="address" id="address"
                                                  cols="30"
                                                  rows="1">{{ $user->address ? $user->address : '' }}</textarea>
                                    </div>


                                    <div class="fv-row mb-7">
                                        <label class="required fs-6 fw-semibold mb-2">Status</label>

                                        <!--begin::Select2-->
                                        <select data-dropdown-parent="#kt_modal_update_details" name="status" required
                                                class="form-select mb-2"
                                                data-control="select2"
                                                data-hide-search="true"
                                                data-placeholder="Select category"
                                                id="status{{ $user->id }}">
                                            @if($user->status)
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
                                <!--end::Scroll-->
                            </div>

                            <div class="modal-footer flex-center">




                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                                    <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                                </button>


                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>

            {{--                                TODO: Modal edit Bitişi     --}}
        </div>


    </div>



    {{--    TODO: update email modal start--}}

    <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update Email Address</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
      fill="currentColor"/>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
</svg>

</span>
                        <!--end::Svg Icon-->                </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_update_email_form" class="form" action="#">
                        <!--begin::Notice-->

                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4"><svg width="24" height="24"
                                                                                           viewBox="0 0 24 24"
                                                                                           fill="none"
                                                                                           xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"/>
<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
</svg>
</span>
                            <!--end::Svg Icon-->        <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 ">
                                <!--begin::Content-->
                                <div class=" fw-semibold">

                                    <div class="fs-6 text-gray-700 ">Please note that a valid email address is required
                                        to complete the email verification.
                                    </div>
                                </div>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--end::Notice-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold form-label mb-2">
                                <span class="required">Email Address</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="" name="profile_email"
                                   value="smith@kpmg.com"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                Discard
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                                <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    {{--    TODO: update email modal end--}}

    {{--    TODO: update password modal start--}}

    <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update Password</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
      fill="currentColor"/>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"/>
</svg>

</span>
                        <!--end::Svg Icon-->                </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_update_password_form" class="form" action="#">

                        <!--begin::Input group--->
                        <div class="fv-row mb-10">
                            <label class="required form-label fs-6 mb-2">Current Password</label>

                            <input class="form-control form-control-lg form-control-solid" type="password"
                                   placeholder="" name="current_password" autocomplete="off"/>
                        </div>
                        <!--end::Input group--->

                        <!--begin::Input group-->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold fs-6 mb-2">
                                    New Password
                                </label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                           placeholder="" name="new_password" autocomplete="off"/>

                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>

                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Hint-->
                            <div class="text-muted">
                                Use 8 or more characters with a mix of letters, numbers & symbols.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group--->

                        <!--begin::Input group--->
                        <div class="fv-row mb-10">
                            <label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>

                            <input class="form-control form-control-lg form-control-solid" type="password"
                                   placeholder="" name="confirm_password" autocomplete="off"/>
                        </div>
                        <!--end::Input group--->

                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                                Discard
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                                <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    {{--    TODO: update password modal end--}}

@endsection

@section('js')
@endsection
