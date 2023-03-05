@extends('index')

{{-- Begin::For nav active --}}
@section('userManage-nav','here show')
@section('user-active','active')
{{-- End::For nav active --}}
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
                            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Users List</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    User Management
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item ">
                                    User List
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
            <div id="kt_app_content" class="app-content flex-column-fluid ">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6 ">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <form action="{{route('userList')}}" method="GET">
                                        @csrf
                                        <input type="text" data-kt-customer-table-filter="search" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search  Roles" value="{{request('search')??''}}" />
                                    </form>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end " data-kt-user-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter</button>
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
                                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                                            <form action="{{route('userList')}}" method="GET"  autocomplete="off" >
                                                @csrf
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <label class="form-label fs-6 fw-semibold">Role:</label>
                                                    <select name="filter_role" class="form-select  fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                        <option></option>
                                                        @foreach ($roles as $role)
                                                            <option {{request('filter_role')? request('filter_role')==$role->name?'selected':'' :''}} value="{{$role->name}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{route('userList')}}" type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</a>
                                                    <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Filter-->
                                    <!--begin::Export-->
                                    <button type="button" class="d-none btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                            <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Export</button>
                                    <!--end::Export-->
                                    <!--begin::Add user-->
                                    @if (createPer('user'))
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Add User</button>
                                    @endif
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                                @if (createPer('user'))
                                <!--begin::Modal - Add user-->
                                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_add_user_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">Add User</h2>
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
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="kt_add_user_body">
                                                <!--begin::Form-->
                                                <form id="kt_modal_add_user_form" class="form" method="POST" action={{route('userCreate')}} autocomplete="off" >
                                                    @csrf
                                                    <!--begin::Scroll-->
                                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="name" class="form-control  mb-3 mb-lg-0" placeholder="Full name" value="{{old('name')}}" />
                                                            <!--end::Input-->
                                                            @error('name')
                                                                <span class="text-danger-emphasis">{{$message}}</span>

                                                            @enderror
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-2">User Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="user_name" class="form-control  mb-3 mb-lg-0" placeholder="User name" value="{{old('user_name')}}"  />
                                                            <!--end::Input-->
                                                            @error('user_name')
                                                            <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class=" fw-semibold fs-6 mb-2 required">Phone</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="user_phone" class="form-control  mb-3 mb-lg-0" placeholder="" value="{{old('user_phone')}}"/>
                                                            <!--end::Input-->
                                                            @error('user_phone')
                                                            <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                            <!--begin::Wrapper-->
                                                            <div class="mb-1">
                                                                <!--begin::Label-->
                                                                <label class="form-label fw-semibold fs-6 mb-2 required"> Password</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input wrapper-->
                                                                <div class="position-relative mb-3">
                                                                    <input class="form-control form-control-lg " type="password" placeholder="" name="password" autocomplete="off" />
                                                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
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
                                                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                                            <!--end::Hint-->
                                                            @error('password')
                                                            <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--end::Input group=-->
                                                        <!--begin::Input group=-->
                                                        <div class="fv-row mb-10">
                                                            <label class="form-label fw-semibold fs-6 mb-2 required">Confirm New Password</label>
                                                            <input class="form-control form-control-lg " type="password" placeholder="" name="confirm_password" autocomplete="off" />
                                                            @error('confirm_password')
                                                            <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--end::Input group=-->
                                                        <div class="fv-row mb-7" >
                                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                            <select name="role" class="form-select " data-control="select2" data-placeholder="Select Role" data-dropdown-parent="#kt_add_user_body"  data-hide-search="true">
                                                                <option></option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{$role->id}}" @selected(old('role')==$role->id)>{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class=" fw-semibold fs-6 mb-2">Email</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="email" name="user_email" class="form-control  mb-3 mb-lg-0"  value="{{old('user_email')}}" placeholder=""  />
                                                            <!--end::Input-->
                                                            @error('user_email')
                                                            <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Input group-->

                                                        <div class="fv-row mb-7" >
                                                            <label class="fs-6 fw-semibold mb-2">
                                                                <span>Gender</span>
                                                            </label>
                                                            <select name="user_gender" class="form-select " data-control="select2" data-placeholder="Select Gender" data-hide-search="true" data-dropdown-parent="#kt_add_user_body">
                                                                <option></option>
                                                                <option value="male" {{old('user_gender')=='male'?'selected':''}}>male</option>
                                                                <option value="female" {{old('user_gender')=='female'?'selected':''}}>female</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input group-->

                                                        <div class="fv-row mb-10">
                                                            <label class="form-label fw-semibold fs-6 mb-2">Address</label>
                                                            <textarea name="address" class="form-control form-control-lg " id="" cols="30" rows="10"></textarea>
                                                            @error('address')
                                                                <span class="text-danger-emphasis">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <!--begin::Input group-->
                                                            {{-- <div class="fv-row mb-7" >
                                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                            <select name="role" class="form-select " data-control="select2" data-placeholder="Select Role" data-dropdown-parent="#kt_modal_add_user" tabindex="-1">
                                                                <option></option>
                                                                @foreach ($roles as $role)
                                                                    <option value="{{$role->id}}" @selected(old('role'))>{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div> --}}
                                                        {{-- <div class="mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                                            <!--end::Label-->
                                                            <!--begin::Roles-->
                                                            @foreach ($roles as $role)
                                                                <!--begin::Input row-->
                                                                <div class="d-flex fv-row flex-column">
                                                                    <!--begin::Radio-->
                                                                    <div class="form-check form-check-custom user-select-none mb-1">
                                                                        <!--begin::Input-->
                                                                        <input class="form-check-input me-3 " {{old('role')==$role->id?'checked':''}}  name="role" type="radio" value="{{$role->id}}" id="kt_modal_update_role_option_0_{{$role->id}}"  />
                                                                        <!--end::Input-->
                                                                        <!--begin::Label-->
                                                                        <label class="form-check-label " for="kt_modal_update_role_option_0_{{$role->id}}">
                                                                            <div class="fw-bold text-gray-800">{{$role->name}}</div>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <!--end::Radio-->
                                                                </div>
                                                                <div class='separator separator-dashed my-5'></div>
                                                            @endforeach
                                                            <!--end::Input row-->
                                                            <!--end::Roles-->
                                                        </div> --}}
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Scroll-->
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
                                <!--end::Modal - Add user-->
                                @endif
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th></th>
                                            <th class="min-w-125px">User</th>
                                            <th class="min-w-125px">Role</th>
                                            <th class="min-w-125px">Phone</th>
                                            <th class="min-w-125px">Is Active?</th>
                                            @if (deletePer('user') || updatePer('user'))
                                                <th class="text-end min-w-100px">Actions</th>
                                            @endif
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        @if (count($users)==0)
                                            <tr class=" text-center">
                                                <td colspan="4" class=" text-muted">
                                                    There is no data to show
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                     @if (isOnline($user->id))
                                                        <span class="text-success fs-1">●</span>
                                                    @else
                                                        <span class="text-gray-500 fs-1">●</span>
                                                    @endif
                                                </td>
                                                <!--begin::User=-->
                                                <td class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="{{route('userView',$user->id)}}">
                                                            <div class="symbol-label">
                                                                <a href="{{route('userView',$user->id)}}">
                                                                    <div class="symbol-label fs-3 bg-light-primary text-primary text-uppercase">{{substr($user->name,0,1)}}</div>
                                                                </a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        <a href="{{route('userView',$user->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$user->name}} {!! $user->name==Auth::user()->name?"<div class='badge badge-lg badge-light-success d-inline text-capitalize'>You</div>":'' !!}</a>
                                                        <span>{{$user->email}}</span>
                                                    </div>
                                                    <!--begin::User details-->
                                                </td>
                                                <td class="text-capitalize">{{$user->role->name??'not found role'}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>
                                                    <div class="badge {{$user->is_active?"badge-light-primary":'badge-light-danger'}} fw-bold">{{$user->is_active?"Active":'Inactive'}}</div>
                                                </td>
                                                @if (deletePer('user') || updatePer('user'))
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <!--begin::Menu-->

                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        @if (updatePer('user') || viewPer('user'))
                                                            <div class="menu-item px-3">
                                                                <a href="{{route('userView',$user->id)}}" class="menu-link px-3">
                                                                {{viewPer('user')? 'View' :''}}
                                                                    {{viewPer('user') && updatePer('user')? '&' :''}}
                                                                {{updatePer('user')? 'Edit' :''}}
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        @if (deletePer('user'))
                                                            <div class="menu-item px-3">
                                                                <form action="{{route('userDelete',$user->id)}}" method="POST" >
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <span class="delete-confirm px-3 text-danger menu-link">Delete</span>
                                                                </form>
                                                            </div>
                                                        @endif
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            @endif
                                            <!--end::Table row-->
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                            {{$users->links()}}
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection
@section('javaScript')

{{--delete  confrim alert --}}
<script src="{{asset('assets/customJs/deleteConfirmAlert.js')}}"></script>
<script>

// user update validation
var KTUsersAddUser = function () {
    // Shared variables

    const element = document.getElementById("kt_modal_add_user");
    const form = element.querySelector("#kt_modal_add_user_form");
    const modal = new bootstrap.Modal(element);
    // Init add schedule modal
    @if ($errors->any())
        Swal.fire({
            text: "Sorry, looks like there are some errors detected, please try again.",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton:
                    "btn btn-primary",
            },
        }).then(function (result) {
                if(result.isConfirmed){
                    modal.show();
                }
            });;

    @endif
    var initAddUser = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    user_name: {
                        validators: {
                            notEmpty: { message: "Full name is required" },
                        },
                    },
                    user_phone: {
                        validators: {
                            notEmpty: { message: "User's phone is required" },
                        },
                    },
                    name: {
                        validators: {
                            notEmpty: { message: "Full name is required" },
                        },
                    },
                    role: {
                        validators: {
                            notEmpty: { message: "At least one role must be specified" },
                        },
                    },
                    password: {
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
                    confirm_password: {
                        validators: {
                            notEmpty: {
                                message:
                                    "The password confirmation is required",
                            },
                            identical: {
                                compare: function () {

                                    return form.querySelector(
                                        '[name="password"]'
                                    ).value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                        },
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
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to close?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, close it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    console.log('im cancle');
                    modal.hide(); // Hide modal
                }
            });
        });

        // Cancel button handler
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

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        // Disable button to avoid multiple click
                        e.currentTarget=true;
                        return true;
                    } else {
                        e.preventDefault();
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });


    }
    // Select all handler
    return {
        // Public functions
        init: function () {
            initAddUser();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});


</script>
{{-- toaster alert --}}
<script src={{asset('assets/customJs/toaster.js')}}></script>

{{-- To show success message --}}
@if (session('success'))
<script>
        toastr.success("{{session('success')}}");
</script>
@endif
@endsection
