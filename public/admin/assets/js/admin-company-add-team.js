"use strict";

var KTModalCustomersAddTeamAdmin = function () {
    var modalList;
    var formList;
    var submitButtonList;
    var cancelButtonList;
    var closeButtonList;
    var validatorList = [];


    var handleForm = function (form, validator, submitButton, modal, cancelButton, closeButton) {

        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Customer name is required'
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




//         submitButton.addEventListener('click', function (e) {
//             e.preventDefault();
//             if (validator) {
//                 validator.validate().then(function (status) {
//                     console.log('validated!');
//
//                     if (status == 'Valid') {
//                         submitButton.setAttribute('data-kt-indicator', 'on');
//
//                         submitButton.disabled = true;
//
//                         //setTimeout(function() {
//                         //     submitButton.removeAttribute('data-kt-indicator');
//
//
//
//                             // Swal.fire({
//                             //     text: "Form has been successfully submitted!",
//                             //     icon: "success",
//                             //     buttonsStyling: false,
//                             //     confirmButtonText: "Ok, got it!",
//                             //     customClass: {
//                             //         confirmButton: "btn btn-primary"
//                             //     }
//                             // }).then(function (result) {
//                             //     if (result.isConfirmed) {
//                             //         // Hide modal
//                             //         modal.hide();
//                             //
//                             //         // Enable submit button after loading
//                             //         submitButton.disabled = false;
//                             //
//                             //         // Redirect to customers list page
//                             //         window.location = form.getAttribute("data-kt-redirect");
//                             //     }
//                             // });
//
//
//
//                             //modal.hide();
//                             submitButton.disabled = false;
//                             window.location = form.getAttribute("data-kt-redirect");
//
//                         //}, 2000);
//                     } else {
// alert('else');
//                     }
//                 });
//             }
//         });

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();
            form.reset(); // Reset form
            modal.hide(); // Hide modal

        });

        closeButton.addEventListener('click', function(e){
            e.preventDefault();

            form.reset(); // Reset form
            modal.hide(); // Hide modal

        })
    }

    return {

        init: function () {
            modalList = document.querySelectorAll('[id^="kt_modal_add_customer_team"]');
            formList = document.querySelectorAll('[id^="kt_modal_add_customer_form_team"]');
            submitButtonList = document.querySelectorAll('[id^="kt_modal_add_customer_submit"]');
            cancelButtonList = document.querySelectorAll('[id^="kt_modal_add_customer_cancel"]');
            closeButtonList = document.querySelectorAll('[id^="kt_modal_add_customer_close"]');

            for (var i = 0; i < modalList.length; i++) {
                var modal = new bootstrap.Modal(modalList[i]);

                var form = formList[i];
                var submitButton = submitButtonList[i];
                var cancelButton = cancelButtonList[i];
                var closeButton = closeButtonList[i];
                var validator = validatorList[i];
                handleForm(form, validator, submitButton, modal, cancelButton, closeButton);
            }

        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTModalCustomersAddTeamAdmin.init();
});

