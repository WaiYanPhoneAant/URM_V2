@section('userManage-nav','here show')
@extends('index')
@section('main')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                    <!--begin::Toolbar wrapper-->
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">View User Details</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">User Management</li>

                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="{{route('userList')}}" class="text-muted text-hover-primary">User List</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    View Users
                                </li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Summary-->
                                    <!--begin::User Info-->
                                    <div class="d-flex flex-center justify-content-center align-items-center flex-column py-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-100px symbol-circle mb-7">
                                            <div id="pfTxt" class="symbol-label fs-3 bg-light-primary text-primary text-uppercase">{{substr($user->name,0,1)}}</div>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <a href="#"class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3"  ><span id="nameTxt">{{$user->name}}</span></a>
                                        <!--end::Name-->
                                        <!--begin::Position-->
                                        <div class="mb-9">
                                            <!--begin::Badge-->
                                            <div class="badge badge-lg badge-light-primary d-inline text-capitalize" id="role_show">{{$user->role->name??'not found role'}}</div>
                                            <!--begin::Badge-->
                                        </div>
                                        <!--end::Position-->
                                    </div>
                                    <!--end::User Info-->
                                    <!--end::Summary-->
                                    <!--begin::Details toggle-->
                                    <div class="d-flex flex-stack fs-4 py-3">
                                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span></div>
                                        @if (updatePer('user')  || Auth::user()->id==$user->id)
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit user details">
                                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                                            </span>
                                        @endif
                                    </div>
                                    <!--end::Details toggle-->
                                    <div class="separator"></div>
                                    <!--begin::Details content-->
                                    <div id="kt_user_view_details" class="collapse show">
                                        <div class="pb-5 fs-6">
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">Is Active?</div>
                                                <div id="activeTxt">
                                                    <div class="badge {{$user->is_active==1?"badge-light-primary":'badge-light-danger'}} fw-bold">{{$user->is_active==1?"Active":'Inactive'}}</div>
                                                </div>

                                                <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bold mt-5">Phone</div>
                                            <div id="phoneTxt" class="text-gray-600">{{$user->phone}}</div>
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bold mt-5">Email</div>
                                            <div class="text-gray-600">
                                                <a id="emailTxt" href="#" class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                            </div>
                                            <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">gender</div>
                                                <div id="genderTxt" class="text-gray-600">{{$user->gender}}</div>
                                                <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bold mt-5">address</div>
                                            <div id="addressTxt" class="text-gray-600">{{$user->address}}</div>
                                        </div>
                                    </div>
                                    <!--end::Details content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Connected Accounts-->

                            <!--end::Connected Accounts-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_user_detail">Profile Detail</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                @if (deletePer('user')   || Auth::user()->id==$user->id)
                                <li class="nav-item ms-auto">
                                    <!--begin::Action menu-->
                                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-2 me-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <form action="{{route('userDelete',$user->id)}}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <span class="delete-confirm menu-link text-danger px-5">Delete</span>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Menu-->
                                </li>
                                @endif
                                <!--end:::Tab item-->
                            </ul>
                            <!--end:::Tabs-->
                            <!--begin:::Tab content-->
                            <div class="tab-content" id="myTabContent">
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade  show active" id="kt_user_view_user_detail" role="tabpanel">
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
                                                <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                                    <!--begin::Table body-->
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>Username</td>
                                                            <td id="dusername">{{$user->username}}</td>
                                                            @if (updatePer('user')   || Auth::user()->id==$user->id)
                                                                <td class="text-end">
                                                                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_username">
                                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>******</td>
                                                            @if (updatePer('user')   || Auth::user()->id==$user->id)
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Role</td>
                                                            <td class="text-capitalize" id='role_update_show'>{{$user->role->name??'not found role'}}</td>
                                                            @if (updatePer('user') )
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
                                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </td>
                                                            @endif
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
                                </div>
                                <!--end:::Tab pane-->
                            </div>
                            <!--end:::Tab content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Modals-->
                    @if (updatePer('user') || Auth::user()->id==$user->id)
                        <!--begin::Modal - Update user details-->
                        <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Form-->
                                    <form class="form" action="#" id="kt_modal_update_user_form" autocomplete="off" >
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_update_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Update User Details</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body py-10 px-lg-17" id="kt_modal_update_body">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::User toggle-->
                                                <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">User Information
                                                <span class="ms-2 rotate-180">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span></div>
                                                <!--end::User toggle-->
                                                <!--begin::User form-->
                                                <div id="kt_modal_update_user_user_info" class="collapse show">

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2 required">Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" id="name" value="{{$user->name}}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">
                                                            <span class="required">Phone</span>

                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="" id="phone" name="phone" value="{{$user->phone}}" />
                                                        <span id="phoneError" class="text-danger-emphasis d-block mt-2"></span>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">
                                                            <span>Email</span>

                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" class="form-control form-control-solid" placeholder="" id="email" name="email" value="{{$user->email}}" />
                                                        <span id="emailError" class="text-danger-emphasis d-block mt-2"></span>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->


                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">
                                                            <span>Gender</span>
                                                        </label>
                                                        <select id="gender" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true" data-dropdown-parent="#kt_modal_update_body">
                                                            <option></option>
                                                            <option value="male" @selected(old('gender',$user->gender)=="male")>male</option>
                                                            <option value="female" @selected(old('gender',$user->gender)=="female")>female</option>

                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold mb-2">
                                                            <span>Address</span>
                                                        </label>


                                                        <textarea id="address" class="form-control" name="address" id="" cols="30" rows="10" maxlength="255">{{$user->address}}</textarea>
                                                        <span class="fs-6 text-muted">Chars must be 255 or less</span>

                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <div class="form-check form-check-custom form-check-success form-check-solid">
                                                            <input {{Auth::user()->id==$user->id?'disabled ':''}}class="form-check-input" id="active" type="checkbox" value="" {{$user->is_active==1?"checked":''}} />
                                                            <label class="form-check-label user-select-none text-dark fs-5" for="active" >
                                                                Is Active?
                                                            </label>
                                                        </div>
                                                    </div>



                                                </div>
                                                <!--end::User form-->

                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                        <!--end::Modal body-->
                                        <!--begin::Modal footer-->
                                        <div class="modal-footer flex-center">
                                            <!--begin::Button-->
                                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Update</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Modal footer-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
                        <!--end::Modal - Update user details-->

                        <!--begin::Modal - Update email-->
                        <div class="modal fade" id="kt_modal_update_username" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update Username</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_username_form" name="usernameUpdate" class="form" action="#" autocomplete="off" >

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Username</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="" name="username" id="username" value="{{$user->username}}" />
                                                <span id="usernameError" class="text-danger-emphasis d-block mt-2"></span>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="usernameSubmit">
                                                    <span class="indicator-label">Update</span>
                                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        <!--end::Modal - Update email-->
                        <!--begin::Modal - Update password-->
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
                                            <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_password_form" class="form" action="#" autocomplete="off" >
                                            <!--begin::Input group=-->
                                            {{-- <div class="fv-row mb-10">
                                                <label class="required form-label fs-6 mb-2">Current Password</label>
                                                <input class="form-control form-control-lg " type="password" placeholder="" name="current_password" id="current_password" autocomplete="off" />
                                                <span class=" text-danger-emphasis d-block mt-2" id="currPwErr"></span>
                                            </div> --}}
                                            <!--end::Input group=-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                <!--begin::Wrapper-->
                                                <div class="mb-1">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold fs-6 mb-2">New Password</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input wrapper-->
                                                    <div class="position-relative mb-3">
                                                        <input class="form-control form-control-lg " type="password" placeholder="" name="new_password" id="new_password" autocomplete="off" />
                                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                            <i class="bi bi-eye-slash fs-2"></i>
                                                            <i class="bi bi-eye fs-2 d-none"></i>
                                                        </span>
                                                    </div> <span class=" text-danger-emphasis d-block my-2" id="newPwErr"></span>
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
                                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Input group=-->
                                            <!--begin::Input group=-->
                                            <div class="fv-row mb-10">
                                                <label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>
                                                <input class="form-control form-control-lg " type="password" placeholder="" name="confirm_password" id="confirm_password" autocomplete="off" />
                                                <span class=" text-danger-emphasis d-block mt-2" id="confirmPwErr"></span>
                                            </div>
                                            <!--end::Input group=-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        <!--end::Modal - Update password-->
                        <!--begin::Modal - Update role-->
                        @if (updatePer('user'))
                        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update User Role</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_role_form" class="form" action="#" autocomplete="off" >
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-5">
                                                    <span class="required">Select a user role</span>
                                                </label>
                                                <!--end::Label-->
                                                @foreach ($roles as $role)
                                                    <!--begin::Input row-->
                                                    <div class="d-flex">
                                                        <!--begin::Radio-->
                                                        <div class="form-check form-check-custom ">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input me-3" value="{{$role->id}}" name="user_role" type="radio"  id="kt_modal_update_role_option_0_{{$role->id}}"  @checked($user->role->id==$role->id) />
                                                            <!--end::Input-->
                                                            <!--begin::Label-->
                                                            <label class="form-check-label" for="kt_modal_update_role_option_0_{{$role->id}}">
                                                                <div class="fw-bold text-gray-800 text-capitalize">{{$role->name}}</div>

                                                            </label>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Radio-->
                                                    </div>
                                                    <!--end::Input row-->
                                                    <div class='separator separator-dashed my-5'></div>
                                                @endforeach


                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        @endif
                        <!--end::Modal - Update role-->
                    @endif
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->

@endsection


{{-- modals --}}
@section('javaScript')




{{-- axios link --}}
<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
<script>
"use strict";


@if(updatePer('user') || Auth::user()->id==$user->id)
    // on document ready
    KTUtil.onDOMContentLoaded(function () {
        // update user name form
        updateUsername.init();
        // update password form
        KTUsersUpdatePassword.init();
        //update profile detail
        KTUsersUpdateDetails.init();
        //update role
        KTUsersUpdateRole.init();
    });

@endif
    // ----------------------Begin::username update-------------------------
    var updateUsername = function () {
        // Shared variables
        const element = document.getElementById('kt_modal_update_username');
        const form = element.querySelector('#kt_modal_update_username_form');
        const modal = new bootstrap.Modal(element);

        // Init add schedule modal
        var inputUsername = () => {

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'username': {
                            validators: {
                                notEmpty: {
                                    message: 'Username is required'
                                }
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );

            // Close button handler
            closeBtn(element,form,modal);


            // Cancel button handler
            cancleBtn(element,form,modal)


            // Submit button handler
            const submitButton = element.querySelector('[data-kt-users-modal-action="usernameSubmit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();

                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');

                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');

                            // Disable button to avoid multiple click
                            submitButton.disabled = true;

                            const username=document.querySelector('#username').value;
                            const usernameError=document.querySelector('#usernameError');
                            const displayUsername=document.querySelector('#dusername')
                            axios({
                                method: 'post',
                                url: '/user/username/update/',
                                data: {
                                    id:{{$user->id}},
                                    username: username,
                                }
                            }).then(function (response) {
                                if(response.data.status=='success'){
                                    usernameError.textContent='';
                                    displayUsername.textContent=username;

                                    setTimeout(function () {
                                        // Remove loading indication
                                        modal.hide();
                                        submitButton.removeAttribute('data-kt-indicator');

                                        // Enable button
                                        submitButton.disabled = false;

                                        // Show popup confirmation
                                        Swal.fire({
                                            text: "Username Successfully Updated!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                modal.hide();
                                            }
                                        });

                                        //form.submit(); // Submit form
                                    }, 1000);
                                }else if(response.data.status=='false'){
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'off');

                                // Disable button to avoid multiple click
                                submitButton.disabled = false;
                                    usernameError.textContent=response.data.message.username[0];

                                }
                            });

                        }
                    });
                }
            });
        }

        return {
            // Public functions
            init: function () {
                inputUsername();
            }
        };
    }();
    // ----------------------End::username update-------------------------



    // ----------------------Begin::password update-------------------------
    var KTUsersUpdatePassword = function () {
        // Shared variables
        const element = document.getElementById('kt_modal_update_password');
        const form = element.querySelector('#kt_modal_update_password_form');
        const modal = new bootstrap.Modal(element);
        // Init add schedule modal
        var initUpdatePassword = () => {
            //validation
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        // 'current_password': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: 'Current password is required'
                        //         }
                        //     }
                        // },
                        'new_password': {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                },
                                callback: {
                                    message: 'Please enter valid password',
                                    callback: function (input) {
                                        if (input.value.length > 0) {
                                            return validatePassword();
                                        }
                                    }
                                }
                            }
                        },
                        'confirm_password': {
                            validators: {
                                notEmpty: {
                                    message: 'The password confirmation is required'
                                },
                                identical: {
                                    compare: function () {
                                        return form.querySelector('[name="new_password"]').value;
                                    },
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );
            // Close button handler
            closeBtn(element,form,modal);
            // Cancel button handler
            cancleBtn(element,form,modal)
            // Submit button handler
            const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();
                // let currentPw=document.querySelector('#current_password').value;
                let newPw=document.querySelector('#new_password').value;
                let confrimPw=document.querySelector('#confirm_password').value;
                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');

                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            // Disable button to avoid multiple click
                            submitButton.disabled = true;
                            axios({
                                method: 'post',
                                url:'/user/password/update',
                                data: {
                                    id:{{$user->id}},
                                    // currentPw: currentPw,
                                    newPw:newPw,
                                    confrimPw:confrimPw,
                                }
                            }).then(function (response) {
                                // const currPwErr=document.querySelector('#currPwErr');
                                const newPwErr=document.querySelector('#newPwErr');
                                const confirmPwErr=document.querySelector('#confirmPwErr');
                                if(response.data.status=='success'){
                                    console.log(response);
                                    formClear();
                                    setTimeout(function () {
                                        // currPwErr.textContent='';
                                        newPwErr.textContent='';
                                        confirmPwErr.textContent="";
                                        modal.hide();
                                        // Remove loading indication
                                        submitButton.removeAttribute('data-kt-indicator');

                                        // Enable button
                                        submitButton.disabled = false;

                                        // Show popup confirmation
                                        Swal.fire({
                                            text: "Password Successfully Updated!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                modal.hide();
                                            }
                                        });

                                        //form.submit(); // Submit form
                                    }, 1000);
                                @if ($user->id==Auth::user()->id)
                                    location.reload();
                                @endif
                                }else if(response.data.status=='false'){
                                    formClear();
                                    // currPwErr.textContent=response.data.message['current password']??'';
                                    newPwErr.textContent=response.data.message['new password']??'';
                                    confirmPwErr.textContent=response.data.message['confirm password'];

                                    // Remove loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show popup confirmation
                                }
                            })
                        }
                    });
                }

                function formClear() {
                    // document.querySelector('#current_password').value='';
                    document.querySelector('#new_password').value='';
                    document.querySelector('#confirm_password').value='';
                }
            });
        }

        return {
            // Public functions
            init: function () {
                initUpdatePassword();
            }
        };
    }();
    // ----------------------End::password update-------------------------


    // ----------------------Begin::user data update-------------------------
    // Class definition
    var KTUsersUpdateDetails = function () {
        // Shared variables
        const element = document.getElementById('kt_modal_update_details');
        const form = element.querySelector('#kt_modal_update_user_form');
        const modal = new bootstrap.Modal(element);
        // Init add schedule modal
        var initUpdateDetails = () => {
            // Close button handler
            closeBtn(element,form,modal);
            // Cancel button handler
            cancleBtn(element,form,modal);

            //require validation
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'name': {
                            validators: {
                                notEmpty: {
                                    message: 'Name is required'
                                }
                            }
                        },
                        'phone': {
                            validators: {
                                notEmpty: {
                                    message: 'Phone is required'
                                },
                            }
                        },
                        'email':{
                            validators:{
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                            }
                        },

                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );

            // Submit button handler
            const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();


                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');
                        const name=document.querySelector('#name').value;
                        const email=document.querySelector('#email').value;
                        const phone=document.querySelector('#phone').value;
                        const gender=document.querySelector('#gender').value;
                        const active=document.querySelector('#active').checked?'1':'0';
                        const address=document.querySelector('#address').value;
                        if (status == 'Valid') {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            submitButton.disabled = true;

                                axios({
                                    method: 'post',
                                    url:'/user/update/details',
                                    data: {
                                        id:{{$user->id}},
                                        name,
                                        email,
                                        phone,
                                        gender,
                                        active,
                                        address
                                    }
                                }).then(function (response) {

                                    if(response.data.status=='success'){
                                    setTimeout(function () {
                                        modal.hide();
                                        // Remove loading indication
                                        submitButton.removeAttribute('data-kt-indicator');

                                        // Enable button
                                        submitButton.disabled = false;

                                        // Show popup confirmation
                                        Swal.fire({
                                            text: "User data has been successfully updated!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                modal.hide();
                                            }
                                        });

                                        //form.submit(); // Submit form
                                    }, 1000);
                                    document.querySelector('#emailTxt').textContent=email;
                                    document.querySelector('#phoneTxt').textContent=phone;
                                    document.querySelector('#genderTxt').textContent=gender;
                                    document.querySelector('#nameTxt').textContent=`${name}`;
                                    document.querySelector('#addressTxt').textContent=address;
                                    document.querySelector('#pfTxt').textContent=name.substring(0,1);
                                    document.querySelector('#activeTxt').innerHTML=active==1
                                                                                    ?'<div class="badge badge-light-primary" fw-bold">Active</div>'
                                                                                    :'<div class="badge badge-light-danger" fw-bold">Inactive</div>'
                                }else if(response.data.status=='false'){
                                    const phoneErr=document.querySelector('#phoneError');
                                    const emailError=document.querySelector('#emailError');
                                    phoneErr.textContent=response.data.message['phone number']
                                    emailError.textContent=response.data.message['email']
                                    // Remove loading indication
                                    submitButton.removeAttribute('data-kt-indicator');

                                    // Enable button
                                    submitButton.disabled = false;

                                    // Show popup confirmation
                                }


                            })


                        }
                    });
                }



            });
        }

        return {
            // Public functions
            init: function () {
                initUpdateDetails();
            }
        };
    }();
    // ----------------------End::user data update-------------------------


    // ----------------------Begin::role update-------------------------
    // Class definition
    var KTUsersUpdateRole = function () {
        // Shared variables
        const element = document.getElementById('kt_modal_update_role');
        const form = element.querySelector('#kt_modal_update_role_form');
        const modal = new bootstrap.Modal(element);

        // Init add schedule modal
        var initUpdateRole = () => {

            // Close button handler
            closeBtn(element,form,modal);

            // Cancel button handler
            cancleBtn(element,form,modal)

            // Submit button handler
            const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {

                // Prevent default button action
                e.preventDefault();

                // Show loading indication
                submitButton.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                submitButton.disabled = true;
                const role_show=document.querySelector('#role_show');
                const role_update_show=document.querySelector('#role_update_show');
                const role_input = [...document.getElementsByName('user_role')];
                const result=role_input.filter(check);
                function check(e) {
                    return e.checked;
                }
                const role_id=result[0].value;
                const role_label=result[0].labels[0].outerText
                axios({
                    method: 'post',
                    url:'/user/update/role',
                    data: {
                        id:{{$user->id}},
                        role_id
                    }
                }).then(function (response) {
                    if(response.data.status=='success'){
                        role_show.textContent=role_update_show.textContent=role_label;
                        setTimeout(function () {
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation
                            Swal.fire({
                                text: "Role has been successfully updated!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    modal.hide();
                                }
                            });

                            //form.submit(); // Submit form
                        }, 1000);
                    }

                })

            });
        }

        return {
            // Public functions
            init: function () {
                initUpdateRole();
            }
        };
    }();
    // ----------------------End::role update-------------------------



    //--------------------- functions -----------------------------
    //function for close Btn
    function closeBtn(element,form,modal) {
            // Close button handler
            const closeButton=  element.querySelector('[data-kt-users-modal-action="close"]');
            closeButton.addEventListener('click', e => {
                e.preventDefault();

                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide(); // Hide modal
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Your form has not been cancelled!.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                    }
                });
            });
    }

    //function for cancle Btn
    function cancleBtn(element,form,modal) {
        const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
            cancelButton.addEventListener('click', e => {
                e.preventDefault();

                Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide(); // Hide modal
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Your form has not been cancelled!.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                    }
                });
            });
    }

    $('#address').maxlength({
        warningClass: "badge badge-warning text-black",
        limitReachedClass: "badge badge-success"
    });

</script>
{{--delete  confrim alert --}}
<script src="{{asset('assets/customJs/deleteConfirmAlert.js')}}"></script>
<!--end::Custom Javascript-->
@endsection
