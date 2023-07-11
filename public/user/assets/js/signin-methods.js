"use strict";

// Class definition
var KTAccountUserSigninMethods = function () {
    var signInForm;
    var signInMainEl;
    var signInEditEl;
    var passwordMainEl;
    var passwordEditEl;
    var signInChangeEmail;
    var signInCancelEmail;
    var passwordChange;
    var passwordCancel;

    // var toggleChangeEmail = function () {
    //     signInMainEl.classList.toggle('d-none');
    //     signInChangeEmail.classList.toggle('d-none');
    //     signInEditEl.classList.toggle('d-none');
    // }

    var toggleChangePassword = function () {
        passwordMainEl.classList.toggle('d-none');
        passwordChange.classList.toggle('d-none');
        passwordEditEl.classList.toggle('d-none');
    }

    // Private functions
    var initSettings = function () {
        // if (!signInMainEl) {
        //     return;
        // }

        // toggle UI
        // signInChangeEmail.querySelector('button').addEventListener('click', function () {
        //     toggleChangeEmail();
        // });
        //
        // signInCancelEmail.addEventListener('click', function () {
        //     toggleChangeEmail();
        // });

        passwordChange.querySelector('button').addEventListener('click', function () {
            toggleChangePassword();
        });

        passwordCancel.addEventListener('click', function () {
            toggleChangePassword();

        });
    }

    // var handleChangeEmail = function (e) {
    //     var validation;
    //
    //     if (!signInForm) {
    //         return;
    //     }
    //
    //     validation = FormValidation.formValidation(
    //         signInForm,
    //         {
    //             fields: {
    //                 email: {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'Email is required'
    //                         },
    //                         // emailAddress: {
    //                         //     message: 'The value is not a valid email address'
    //                         // },
    //                         regexp: {
    //                             regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
    //                             message: 'The value is not a valid email address',
    //                         },
    //                     }
    //                 },
    //
    //                 confirmemailpassword: {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'Password is required'
    //                         },
    //                         stringLength: {
    //                             min: 6,
    //                             max: 20,
    //                             message: 'The password must be more than 6 and less than 20 characters long'
    //                         },
    //                     }
    //                 }
    //             },
    //
    //             plugins: { //Learn more: https://formvalidation.io/guide/plugins
    //                 trigger: new FormValidation.plugins.Trigger(),
    //                 bootstrap: new FormValidation.plugins.Bootstrap5({
    //                     rowSelector: '.fv-row'
    //                 })
    //             }
    //         }
    //     );
    //
    //     signInForm.querySelector('#kt_signin_submit').addEventListener('click', function (e) {
    //         e.preventDefault();
    //         console.log('click');
    //
    //         validation.validate().then(function (status) {
    //             if (status == 'Valid') {
    //                 signInForm.submit();
    //
    //                 // swal.fire({
    //                 //     text: "Sent password reset. Please check your email",
    //                 //     icon: "success",
    //                 //     buttonsStyling: false,
    //                 //     confirmButtonText: "Ok, got it!",
    //                 //     customClass: {
    //                 //         confirmButton: "btn font-weight-bold btn-light-primary"
    //                 //     }
    //                 // }).then(function(){
    //                 //     signInForm.reset();
    //                 //     validation.resetForm(); // Reset formvalidation --- more info: https://formvalidation.io/guide/api/reset-form/
    //                 //     toggleChangeEmail();
    //                 // });
    //             } else {
    //                 // swal.fire({
    //                 //     text: "Sorry, looks like there are some errors detected, please try again.",
    //                 //     icon: "error",
    //                 //     buttonsStyling: false,
    //                 //     confirmButtonText: "Ok, got it!",
    //                 //     customClass: {
    //                 //         confirmButton: "btn font-weight-bold btn-light-primary"
    //                 //     }
    //                 // });
    //             }
    //         });
    //     });
    // }

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
                    currentpassword: {
                        validators: {
                            notEmpty: {
                                message: 'Current Password is required'
                            },
                            stringLength: {
                                min: 6,
                                max: 20,
                                message: 'The current password must be more than 6 and less than 20 characters long'
                            },
                        }
                    },

                    newpassword: {
                        validators: {
                            notEmpty: {
                                message: 'New Password is required'
                            },
                            stringLength: {
                                min: 6,
                                max: 20,
                                message: 'The new password must be more than 6 and less than 20 characters long'
                            },
                        }
                    },

                    confirmpassword: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm Password is required'
                            },
                            identical: {
                                compare: function() {
                                    return passwordForm.querySelector('[name="newpassword"]').value;
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
            e.preventDefault();
            console.log('click');

            validation.validate().then(function (status) {
                if (status == 'Valid') {

                    passwordForm.submit();

                    // swal.fire({
                    //     text: "Sent password reset. Please check your email",
                    //     icon: "success",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn font-weight-bold btn-light-primary"
                    //     }
                    // }).then(function(){
                    //     passwordForm.reset();
                    //     validation.resetForm(); // Reset formvalidation --- more info: https://formvalidation.io/guide/api/reset-form/
                    //     toggleChangePassword();
                    // });
                } else {
                    // swal.fire({
                    //     text: "Sorry, looks like there are some errors detected, please try again.",
                    //     icon: "error",
                    //     buttonsStyling: false,
                    //     confirmButtonText: "Ok, got it!",
                    //     customClass: {
                    //         confirmButton: "btn font-weight-bold btn-light-primary"
                    //     }
                    // });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
           // signInForm = document.getElementById('kt_signin_change_email');
           // signInMainEl = document.getElementById('kt_signin_email');
           // signInEditEl = document.getElementById('kt_signin_email_edit');
            passwordMainEl = document.getElementById('kt_signin_password');
            passwordEditEl = document.getElementById('kt_signin_password_edit');
           // signInChangeEmail = document.getElementById('kt_signin_email_button');
           // signInCancelEmail = document.getElementById('kt_signin_cancel');
            passwordChange = document.getElementById('kt_signin_password_button');
            passwordCancel = document.getElementById('kt_password_cancel');

            initSettings();
           // handleChangeEmail();
            handleChangePassword();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountUserSigninMethods.init();
});
