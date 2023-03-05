@extends('index')
{{-- Begin::For nav active --}}
@section('userManage-nav','here show')
@section('roleList-active','active')
{{-- End::For nav active --}}
@section('main')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
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
                            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Role List</h1>
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
                                <li class="breadcrumb-item ">Roles</li>
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
                <div id="kt_app_content_container" class="app-container container-fluid b">
                    <!--begin::Card-->
                    <div class="card shadow-sm border-gray-300">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
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
                                    <!--end::Svg Icon-->
                                   <form action="{{route('roleList')}}" method="GET">
                                        @csrf
                                        <input type="text" data-kt-customer-table-filter="search" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search  Roles" value="{{request('search')??''}}" />
                                   </form>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                @if(createPer('role'))
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <button type="button" class="btn btn-primary" id='addRole' data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                        Add Role
                                    </button>
                                </div>
                                @endif
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Modal - Add role-->
                        @if(createPer('role'))
                        <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Add a Role</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
                                    <div class="modal-body scroll-y mx-lg-5 my-7">
                                        {{-- <!--begin::Form-->id="kt_modal_add_role_form" --}}
                                        <form id="kt_modal_add_role_form" class="form" action="{{route('roleCreate')}}" method="POST">
                                            @csrf
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">
                                                        <span class="required">Role name</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" value="{{old('role_name',session('role_name'))}}" placeholder="Enter a role name" name="role_name" />
                                                    @error('role_name')
                                                        <span class="p-2 text-danger-emphasis">{{$message}}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                                    @if (session('permissionError'))
                                                        <span class="text-danger-emphasis required">{{session('permissionError')}}</span>

                                                    @endif
                                                    <!--end::Label-->
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">Administrator Access
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label class="form-check form-check-sm form-check-custom  me-9 user-select-none">
                                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                @foreach ($features as $feature)
                                                                 <!--begin::Table row-->
                                                                 <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800 text-capitalize">{{$feature->name}} </td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex flex-wrap user-select-none">
                                                                            @foreach ($feature->permissions as $permission)
                                                                                <!--begin::Checkbox-->
                                                                                <label class="form-check form-check-sm form-check-custom my-3 me-2">
                                                                                    <input class="form-check-input" @checked(old($feature->name.'_'.$permission->name)==$permission->id) type="checkbox" value="{{$permission->id}}" name="{{$feature->name}}_{{$permission->name}}" />
                                                                                    <span class="form-check-label">{{$permission->name}}</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                            @endforeach


                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                @endforeach

                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->

                                                    </div>


                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                                    <span class="indicator-label">Create Role</span>
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
                        <div class="card-body pt-0  user-select-none">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Role</th>
                                            <th class="min-w-70px">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-800">
                                        @if (count($roles)==0)
                                            <tr class=" text-center">
                                                <td colspan="2" class=" text-muted">
                                                    There is no data to show
                                                </td>
                                            </tr>
                                        @endif
                                        @foreach ($roles as $key=>$role)
                                            <tr>
                                                <!--begin::Name=-->
                                                <td>
                                                    <a href="#" class="text-gray-800 text-hover-primary mb-1 text-capitalize">
                                                        {{$role->name}}
                                                    </a>
                                                </td>
                                                <!--begin::Action=-->
                                                @if ($role->id!=1 && $role->name!='administrator')
                                                    @if(updatePer('role') || deletePer('role'))
                                                    <td class="">
                                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary border text-primary border-1 border-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0 text-primary table-row-dashed table-row-bordered gy-9">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->

                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            @if(updatePer('role'))
                                                            <div class="menu-item px-3">
                                                                <span type="button" class=" px-3  menu-link" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role_{{$key}}">Edit Role</span>
                                                            </div>
                                                            @endif
                                                            @if(deletePer('role'))
                                                                <div class="menu-item px-3">
                                                                    <form action="{{route('roleDelete',$role->id)}}" method="POST" >
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
                                                    @endif
                                                @endif
                                                <!--end::Action=-->
                                            </tr>

                                        @endforeach




                                    </tbody>

                                    <!--end::Table body-->
                                </table>

                            </div>
                             {{$roles->links()}}
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    @foreach ($roles as $key=>$role)
                        <!--begin::Modal - Update role-->
                        <div class="modal fade" id="kt_modal_update_role_{{$key}}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update Role</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
                                    <div class="modal-body scroll-y mx-5 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_role_form_{{$key}}" method="POST" class="form" action="{{route('roleUpdate',$role->id)}}">
                                           @csrf
                                            <!--begin::Scroll-->
                                            <input type="hidden" name="key" value="{{$key}}">
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll_{{$key}}" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll_{{$key}}" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">
                                                        <span class="required">Role name</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control " placeholder="Enter a role name" name="role_update_name_{{$key}}" value="{{$role->name}}" />
                                                    @error("role_update_name_$key")
                                                        <span class="text-danger-emphasis">{{$message}}</span>
                                                    @enderror
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                                    <!--end::Label-->
                                                    @if (session("permissionError_$key"))
                                                        <span class="text-danger-emphasis required">{{session("permissionError_$key")}}</span>

                                                    @endif
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">Administrator Access
                                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label class="form-check form-check-sm form-check-custom  me-9">
                                                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                                            <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--end::Table row-->

                                                                <!--begin::Table row-->
                                                                @foreach ($features as $feature)
                                                                 <!--begin::Table row-->
                                                                 <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800 text-capitalize">{{$feature->name}} </td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex flex-wrap user-select-none">
                                                                            @foreach ($feature->permissions as $permission)
                                                                                <!--begin::Checkbox-->
                                                                                <label class="form-check form-check-sm form-check-custom my-3 me-2">
                                                                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}" name="{{$feature->name}}_{{$permission->name}}"
                                                                                        @foreach ($role->roles_permissions as $p)
                                                                                            @checked($p->permissions_id==old($feature->name."_".$permission->name,$permission->id))
                                                                                        @endforeach

                                                                                    />
                                                                                    <span class="form-check-label">{{$permission->name}}</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                            @endforeach


                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                @endforeach
                                                                <!--end::Table row-->
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                                    <span class="indicator-label">Update Role</span>
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
                        <!--end::Modal - Update role-->
                    @endforeach
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
@section('javaScript')

{{-- role delete confrim modal --}}
<script src="{{asset('assets/customJs/deleteConfirmAlert.js')}}"></script>
{{-- {{$role->id}} --}}

@foreach ($roles as $key=>$role)

    <script>
    // Class definition
    var KTUsersUpdatePermissions{{$key}} = function () {
        // Shared variables
        const element = document.getElementById('kt_modal_update_role_{{$key}}');
        const form = element.querySelector("#kt_modal_update_role_form_{{$key}}");
        const modal  = new bootstrap.Modal(element);

        @if (session("permissionError_".$key) || $errors->first("role_update_name_".$key));
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
        // Init add schedule modal
        var initUpdatePermissions = () => {

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'role_update_name_{{$key}}': {
                            validators: {
                                notEmpty: {
                                    message: 'Role name is required'
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
            cancleBtn(element,form,modal);

            // Submit button handler
            const submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');
                        if (status == 'Valid') {
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            return true;
                        } else {
                            e.preventDefault();
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
        const handleSelectAll = () => {
            // Define variables
            const selectAll = form.querySelector('#kt_roles_select_all');
            const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

            // Handle check state
            selectAll.addEventListener('change', e => {

                // Apply check state to all checkboxes
                allCheckboxes.forEach(c => {
                    c.checked = e.target.checked;
                });
            });
        }

        return {
            // Public functions
            init: function () {
                initUpdatePermissions();
                handleSelectAll();
            }
        };
    }();

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTUsersUpdatePermissions{{$key}}.init();
    });
    </script>
@endforeach
<script>
    // for add role
    "use strict";
    // Class definition
    var KTUsersAddRole = function () {
        // Shared variables

        const element = document.getElementById('kt_modal_add_role');
        const form = element.querySelector('#kt_modal_add_role_form');
        const modal = new bootstrap.Modal(element);
        // Init add schedule modal
        @if (session('permissionError') || $errors->first('role_name'));
            invalidModal(modal);
        @endif

        var initAddRole = () => {

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'role_name': {
                            validators: {
                                notEmpty: {
                                    message: 'Role name is required'
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
            cancleBtn(element,form,modal);

            // Submit button handler
            const submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                // e.preventDefault();
                console.log(e);
                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {
                        console.log('validated!');

                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            // Disable button to avoid multiple click
                            // e.currentTarget='role/create';
                            // submitButton.disabled = true;
                            return true;
                            // e.currentTarget='role/create';


                            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            // setTimeout(function () {
                            //     // Remove loading indication
                            //     submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                                // Show popup confirmation
                                Swal.fire({
                                    text: "Form has been successfully submitted!",
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
                            //     // Enable button
                            //     submitButton.disabled = false;

                            //     // Show popup confirmation
                            //     Swal.fire({
                            //         text: "Form has been successfully submitted!",
                            //         icon: "success",
                            //         buttonsStyling: false,
                            //         confirmButtonText: "Ok, got it!",
                            //         customClass: {
                            //             confirmButton: "btn btn-primary"
                            //         }
                            //     }).then(function (result) {
                            //         if (result.isConfirmed) {
                            //             modal.hide();
                            //         }
                            //     });

                            //     //form.submit(); // Submit form
                            // }, 2000);
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
        const handleSelectAll = () =>{
            // Define variables
            const selectAll = form.querySelector('#kt_roles_select_all');
            const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

            // Handle check state
            selectAll.addEventListener('change', e => {

                // Apply check state to all checkboxes
                allCheckboxes.forEach(c => {
                    c.checked = e.target.checked;
                });
            });
        }

        return {
            // Public functions
            init: function () {
                initAddRole();
                handleSelectAll();
            }
        };
    }();
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTUsersAddRole.init();
    });
//--------------------- functions -----------------------------
function invalidModal(modal) {
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
        }
//function for close Btn
function closeBtn(element,form,modal) {
        // Close button handler
        const closeButton=  element.querySelector('[data-kt-roles-modal-action="close"]');
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
    const cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
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

</script>

{{-- for success alerts --}}
<script src={{asset('assets/customJs/toaster.js')}}></script>
@if (session('success'))
<script>
        toastr.success("{{session('success')}}");
</script>
@endif

@endsection


