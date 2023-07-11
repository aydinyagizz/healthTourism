"use strict";

// Class definition
var KTAccountSettingsProfileDetails = function () {
    // Private variables
    var form= document.getElementById('kt_account_profile_details_form');
    var submitButton;
    var validation;

    // Private functions
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
                    'company_name': {
                        validators: {
                            notEmpty: {
                                message: 'Company name is required'
                            }
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
                    'country': {
                        validators: {
                            notEmpty: {
                                message: 'Please select a country'
                            }
                        }
                    },

                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The password must be more than 6 and less than 30 characters long'
                            },
                            callback: {
                                message: 'Please enter valid password',
                                callback: function(input) {
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
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
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

        // // Select2 validation integration
        // $(form.querySelector('[name="country"]')).on('change', function() {
        //     // Revalidate the color field when an option is chosen
        //     validation.revalidateField('country');
        // });
        //
        // $(form.querySelector('[name="language"]')).on('change', function() {
        //     // Revalidate the color field when an option is chosen
        //     validation.revalidateField('language');
        // });
        //
        // $(form.querySelector('[name="timezone"]')).on('change', function() {
        //     // Revalidate the color field when an option is chosen
        //     validation.revalidateField('timezone');
        // });
    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status == 'Valid') {



                    // // Show loading indication
                    // submitButton.setAttribute('kt_account_profile_details_submit', 'on');
                    //
                    // // Disable button to avoid multiple click
                    // submitButton.disabled = true;
                    // form.submit();

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


            initValidation();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
