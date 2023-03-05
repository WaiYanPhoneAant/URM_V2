"use strict";

// Class definition
var KTAccountSettingsSigninMethods = function () {
    var signInForm;
    var signInMainEl;
    var signInEditEl;
    var passwordMainEl;
    var passwordEditEl;
    var signInChangeUsername;
    var signInCancelUsername;
    var passwordChange;
    var passwordCancel;

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

    // Private functions
    var initSettings = function () {
        if (!signInMainEl) {
            return;
        }

        // toggle UI
        signInChangeUsername.querySelector('button').addEventListener('click', function () {
            toggleChangeUsername();
        });

        signInCancelUsername.addEventListener('click', function () {
            toggleChangeUsername();
        });

        passwordChange.querySelector('button').addEventListener('click', function () {
            toggleChangePassword();
        });

        passwordCancel.addEventListener('click', function () {
            toggleChangePassword();
        });
    }

    var handleChangeEmail = function (e) {
        var validation;

        if (!signInForm) {
            return;
        }

        validation = FormValidation.formValidation(
            signInForm,
            {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
                            },

                        }
                    },

                    // confirmemailpassword: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Password is required'
                    //         }
                    //     }
                    // }
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        signInForm.querySelector('#kt_signin_submit').addEventListener('click', function (e) {

            console.log('click');

            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    e.preventDefault=true;
                    console.log(e)
                    return true;
                    swal.fire({
                        text: "Sent password reset. Please check your email",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function () {
                        signInForm.reset();
                        validation.resetForm(); // Reset formvalidation --- more info: https://formvalidation.io/guide/api/reset-form/
                        toggleChangeUsername();
                    });
                } else {
                    e.preventDefault();
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    var handleChangePassword = function (e) {
        var validation;

        // form elements
        var passwordForm = document.getElementById('kt_signin_change_password');

        if (!passwordForm) {
            return;
        }

        validation = FormValidation.formValidation(
            passwordForm,
            {
                fields: {
                    currentPw: {
                        validators: {
                            notEmpty: {
                                message: 'Current Password is required'
                            }
                        }
                    },

                    newPw: {
                        validators: {
                            notEmpty: {
                                message: 'New Password is required'
                            }
                        }
                    },

                    confirmPw: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm Password is required'
                            },
                            identical: {
                                compare: function() {
                                    return passwordForm.querySelector('[name="newPw"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        passwordForm.querySelector('#kt_password_submit').addEventListener('click', function (e) {

            console.log('click');

            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    e.preventDefault=true;
                    return true;
                    swal.fire({
                        text: "Sent password reset. Please check your email",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function(){
                        passwordForm.reset();
                        validation.resetForm(); // Reset formvalidation --- more info: https://formvalidation.io/guide/api/reset-form/
                        toggleChangePassword();
                    });
                } else {
                    e.preventDefault();
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            signInForm = document.getElementById('kt_signin_change_username');
            signInMainEl = document.getElementById('kt_signin_username');
            signInEditEl = document.getElementById('kt_signin_username_edit');
            passwordMainEl = document.getElementById('kt_signin_password');
            passwordEditEl = document.getElementById('kt_signin_password_edit');
            signInChangeUsername = document.getElementById('kt_signin_username_button');
            signInCancelUsername = document.getElementById('kt_signin_cancel');
            passwordChange = document.getElementById('kt_signin_password_button');
            passwordCancel = document.getElementById('kt_password_cancel');

            initSettings();
            handleChangeEmail();
            handleChangePassword();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsSigninMethods.init();
});
