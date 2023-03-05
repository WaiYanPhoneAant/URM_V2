"use strict";

// Class definition
var KTAccountSettingsProfileDetails = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'First name is required'
                            }
                        }
                    },
                    // email: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Last name is required'
                    //         }
                    //     }
                    // },
                    // phone: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Company name is required'
                    //         }
                    //     }
                    // },
                    // gender: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Contact phone number is required'
                    //         }
                    //     }
                    // },

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );


    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {


            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    e.preventDefault=true;
                    console.log(e)
                    return true;
                    swal.fire({
                        text: "Thank you! You've updated your basic info",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });

                } else {
                    // e.preventDefault();
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_account_profile_details_form');

            if (!form) {
                return;
            }

            submitButton = form.querySelector('#kt_account_profile_details_submit');
            handleForm();
            initValidation();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
