@extends('App.User.profile.profileHeader.header')
@section('title','Overview')
@section('security','active')
@section('content')

	<!--begin::Sign-in Method-->
    <div class="card mb-5 mb-xl-10">
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
                <div class="d-flex flex-wrap align-items-center">
                    <!--begin::Label-->
                    <div id="kt_signin_username">
                        <div class="fs-6 fw-bold mb-1">Username</div>
                        <div class="fw-semibold text-gray-600">{{$user->username}}</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_username_edit" class="flex-row-fluid d-none">
                        <!--begin::Form-->
                        <form id="kt_signin_change_username" class="form" novalidate="novalidate" method="POST" action="{{route('userProfileNameUpdate',$user->id)}}">
                            @csrf
                            <div class="row mb-6">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <div class="fv-row mb-0">
                                        <label for="username" class="form-label fs-6 fw-bold mb-3">Enter New Username</label>
                                        <input type="username" class="form-control form-control-lg" id="username" placeholder="Username" name="username" value="{{old('username',$user->username)}}" />
                                    </div>
                                    @error('username')
                                        <span class="text-danger-emphasis py-2">{{$message}}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="fv-row mb-0">
                                        <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                        <input type="password" class="form-control form-control-lg" name="confirmemailpassword" id="confirmemailpassword" />
                                    </div>
                                </div> --}}
                            </div>
                            <div class="d-flex">
                                <button type="submit" id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Username</button>
                                <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_username_button" class="ms-auto">
                        <button class="btn btn-light btn-active-light-primary" id="change_username">Change Username</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Email Address-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
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
                        <form id="kt_signin_change_password" class="form" novalidate="novalidate" action="{{route('userProfilePwUpdate',$user->id)}}" method="POST">
                            @csrf
                            <div class="row mb-1">
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                                        <input type="password" class="form-control form-control-lg" name="currentPw" id="currentpassword" />
                                    </div>
                                    @if ($errors->pw->first('currentPw'))
                                        <span class="text-danger-emphasis py-2">{{$errors->pw->first('currentPw')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                                        <input type="password" class="form-control form-control-lg" name="newPw" id="newpassword" />
                                    </div>
                                    @if ($errors->pw->first('newPw'))
                                        <span class="text-danger-emphasis py-2">{{$errors->pw->first('newPw')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="fv-row mb-0">
                                        <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg" name="confirmPw" id="confirmpassword" />
                                    </div>
                                   @if ($errors->pw->first('confirmPw'))
                                        <span class="text-danger-emphasis py-2">{{$errors->pw->first('confirmPw')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                            <div class="d-flex">
                                <button type="submit" id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                        <button  class="btn btn-light btn-active-light-primary" id="reset_pw_btn">Reset Password</button>
                    </div>
                    <!--end::Action-->
                </div>
                <!--end::Password-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Content-->
    </div>
	<!--end::Sign-in Method-->

@endsection
@section('javaScriptSub')
<script>

    signInForm = document.getElementById('kt_signin_change_username');
    signInMainEl = document.getElementById('kt_signin_username');
    signInEditEl = document.getElementById('kt_signin_username_edit');
    passwordMainEl = document.getElementById('kt_signin_password');
    passwordEditEl = document.getElementById('kt_signin_password_edit');
    signInChangeUsername = document.getElementById('kt_signin_username_button');
    signInCancelUsername = document.getElementById('kt_signin_cancel');
    passwordChange = document.getElementById('kt_signin_password_button');
    passwordCancel = document.getElementById('kt_password_cancel');
    var toggleChangeUsername = function () {
        signInMainEl.classList.toggle('d-none');
        signInChangeUsername.classList.toggle('d-none');
        signInEditEl.classList.toggle('d-none');
    }
    var toggleChangePassword = function () {
        passwordMainEl.classList.toggle('d-none');
        passwordChange.classList.toggle('d-none');
        passwordEditEl.classList.toggle('d-none');
    }
    @error('username')
        toggleChangeUsername();
    @enderror
    @if ($errors->pw->all() || session('error'))
        toggleChangePassword();
    @endif
</script>

@endsection
