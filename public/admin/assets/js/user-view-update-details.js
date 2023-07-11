"use strict";

// Class definition
var KTUsersUpdateDetails = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_details');
    const form = element.querySelector('#kt_modal_update_user_form');
    const modal = new bootstrap.Modal(element);



    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    // 'company_logo': {
                    //     extension: 'jpg,jpeg,png',
                    //     type: 'image/jpeg,image/png',
                    //     message: 'Please choose a png,jpg,jpeg file',
                    // },



                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Email is required'
                            },
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'The value is not a valid email address',
                            },
                        }
                    },


                    'phone': {
                        validators: {
                            notEmpty: {
                                message: 'Contact phone number is required'
                            },
                            integer: {
                                message: 'The phone number is not valid'
                            }
                        }
                    },
                    'address': {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            }
                        }
                    },
                    'web_site_name': {
                        validators: {
                            notEmpty: {
                                message: 'Web site name is required'
                            }
                        }
                    },






                    // timezone: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please select a timezone'
                    //         }
                    //     }
                    // },
                    // 'communication[]': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please select at least one communication method'
                    //         }
                    //     }
                    // },
                    // language: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Please select a language'
                    //         }
                    //     }
                    // },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),

                    submitButton: new FormValidation.plugins.SubmitButton(),


                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

    }


    // Init add schedule modal
    var initUpdateDetails = () => {

        // Close button handler
        const closeButton = element.querySelector('[data-kt-users-modal-action_edit="close"]');
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

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-users-modal-action_edit="cancel"]');
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
            // Prevent default button action
            e.preventDefault();

            // Show loading indication
            submitButton.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click
            submitButton.disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            setTimeout(function () {
                // Remove loading indication
                submitButton.removeAttribute('data-kt-indicator');

                // Enable button
                submitButton.disabled = false;

                form.submit();

                // // Show popup confirmation
                // Swal.fire({
                //     text: "Form has been successfully submitted!",
                //     icon: "success",
                //     buttonsStyling: false,
                //     confirmButtonText: "Ok, got it!",
                //     customClass: {
                //         confirmButton: "btn btn-primary"
                //     }
                // }).then(function (result) {
                //     if (result.isConfirmed) {
                //         modal.hide();
                //     }
                // });

                //form.submit(); // Submit form
            }, 2000);
        });
    }

    return {
        // Public functions
        init: function () {
            initValidation();
            initUpdateDetails();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateDetails.init();
});
