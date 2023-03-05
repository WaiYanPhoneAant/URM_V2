    // user update validation
    var KTUsersAddUser = function () {
        // Shared variables

        const element = document.getElementById("kt_modal_add_transaction");
        const form = element.querySelector("#kt_modal_add_transaction_form");
        const total_amt=element.querySelector('#total_amount').value;
        // Init add schedule modal
        var initAddUser = () => {

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            var validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        transaction_type: {
                            validators: {
                                notEmpty: { message: "Transaction type is required" },
                            },
                        },
                        sender: {
                            validators: {
                                notEmpty: { message: "Sender Field is required" },
                            },
                        },
                        receiver: {
                            validators: {
                                notEmpty: { message: "Receiver Field is required" },
                            },
                        },
                        transfer_currency: {
                            validators: {
                                notEmpty: { message: "Transfer Currency Field is required" },
                            },
                        },

                        receive_currency: {
                            validators: {
                                notEmpty: { message: "Receive Currency Field is required" },
                            },
                        },
                        exchange_rate: {
                            validators: {
                                notEmpty: { message: "Exchange Rate Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        transfer_amount: {
                            validators: {
                                notEmpty: { message: "Transfer Amount Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        service_fee: {
                            validators: {
                                notEmpty: { message: "Service Fee Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        total_amount: {
                            validators: {
                                notEmpty: { message: "Total Amount Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        paid_amount: {
                            validators: {
                                notEmpty: { message: "Paid Amount Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },

                        change_amount: {
                            validators: {
                                notEmpty: { message: "Change Amount Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        rx_amount: {
                            validators: {
                                notEmpty: { message: "Receive Amount Field is required" },
                                numeric:{message:'The value is not a number'}
                            },
                        },
                        withdrawl_method: {
                            validators: {
                                notEmpty: { message: "Withdrawl Method Field is required" },
                            },
                        },
                        status: {
                            validators: {
                                notEmpty: { message: "Status Field is required" },
                            },
                        },
                        agent: {
                            validators: {
                                notEmpty: { message: "Agent Field is required" },
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
            $(form.querySelector('[name="sender"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('sender');
            });
            $(form.querySelector('[name="receiver"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('receiver');
            });
            $(form.querySelector('[name="transfer_currency"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('transfer_currency');
            });
            $(form.querySelector('[name="receive_currency"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('receive_currency');
            });
            $(form.querySelector('[name="withdrawl_method"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('withdrawl_method');
            });
            $(form.querySelector('[name="status"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('status');
            });
            $(form.querySelector('[name="agent"]')).on('change', function () {
                // Revalidate the field when an option is chosen
                validator.revalidateField('agent');
            });
            // Submit button handler
            const submitButton = element.querySelector('[data-kt-transaction-modal-action="submit"]');
            submitButton.addEventListener('click', function (e) {
                if (validator) {

                    validator.validate().then(function (status) {
                        if (status == 'Valid') {
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
