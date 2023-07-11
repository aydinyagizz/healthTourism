"use strict";

var KTUsersList = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_users');
    var datatable;
    var toolbarBase;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initUserTable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            //const lastLogin = dateRow[3].innerText.toLowerCase(); // Get last login time
            let timeCount = 0;
            let timeFormat = 'minutes';

            // Determine date & time format -- add more formats when necessary
            // if (lastLogin.includes('yesterday')) {
            //     timeCount = 1;
            //     timeFormat = 'days';
            // } else if (lastLogin.includes('mins')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'minutes';
            // } else if (lastLogin.includes('hours')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'hours';
            // } else if (lastLogin.includes('days')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'days';
            // } else if (lastLogin.includes('weeks')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'weeks';
            // }

            // const realDate = moment().subtract(timeCount, timeFormat).format();
            //
            // dateRow[4].setAttribute('data-order', realDate);
            //
            // const joinedDate = moment(dateRow[4].innerHTML, "DD MMM YYYY, LT").format();
            // dateRow[4].setAttribute('data-order', joinedDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            //"autoWidth": true,
            "pageLength": 10,
            //"lengthChange": true,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                // TODO: tabloda sayısını eklediğimiz değere göre düzelt
                { orderable: false, targets: 6 }, // Disable ordering on column 6 (actions)
            ],
           // columns: [
           //      { data: 'content', name: 'content',   width: '30%',
           //          render: function(data, type, row) {
           //              return data.length > 50 ? data.substr(0, 50) + '...' : data;
           //          }
           //      },
           //
           //  ]


        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            initToggleToolbar();
            handleDeleteRows();
            toggleToolbars();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-users-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    // var handleFilterDatatable = () => {
    //     // Select filter options
    //     const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
    //     const filterButton = filterForm.querySelector('[data-kt-user-table-filter="filter"]');
    //     const selectOptions = filterForm.querySelectorAll('select');
    //
    //     // Filter datatable on submit
    //     filterButton.addEventListener('click', function () {
    //         var filterString = '';
    //
    //         // Get filter values
    //         selectOptions.forEach((item, index) => {
    //             if (item.value && item.value !== '') {
    //                 if (index !== 0) {
    //                     filterString += ' ';
    //                 }
    //
    //                 // Build filter value options
    //                 filterString += item.value;
    //             }
    //         });
    //
    //         // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
    //         datatable.search(filterString).draw();
    //     });
    // }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-users-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Select filter options
            const filterForm = document.querySelector('[data-kt-users-table-filter="form"]');
            const selectOptions = filterForm.querySelectorAll('select');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }


    // Delete subscirption
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-users-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get user name
                const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[0].innerText;

                // TODO: company list tablosunda tekli silme işlemi burada olacak

                const userId = parent.querySelectorAll('td')[1].querySelectorAll('a')[0].getAttribute('data-id');
                //TODO: idsini aldık ajax ile silme işlemi kaldı.

                // console.log('user ıd ' + userId);


                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + userName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + userName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }


                        }).then(function () {
                            //TODO: company tekli silme işlemi için



                            // Remove current row
                            datatable.row($(parent)).remove().draw();



                            $.ajaxSetup({
                                headers: {
                                    //meta'daki değeri 'X-CSRF-TOKEN' a atıyoruz.
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var deleteUrl = document.getElementById('delete-url-users').value;

                            $.ajax({
                                url: deleteUrl,
                                type: 'POST',
                                data: { userId: userId},
                                success: function(response){
                                    // Silme işlemi tamamlandıktan sonra yapılacaklar
                                   // alert("Silme tamam!");

                                },
                                error: function(xhr) {
                                    // Hata durumunda yapılacaklar
                                    alert("Silme işlemi başarısız oldu!");
                                }
                            });



                        }).then(function () {
                            // Detect checked checkboxes
                            toggleToolbars();
                        });
                    } else if (result.dismiss === 'cancel') {
                        // Swal.fire({
                        //     text: customerName + " was not deleted.",
                        //     icon: "error",
                        //     buttonsStyling: false,
                        //     confirmButtonText: "Ok, got it!",
                        //     customClass: {
                        //         confirmButton: "btn fw-bold btn-primary",
                        //     }
                        // });
                    }
                });
            })
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Toggle selected action toolbar
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        // Select elements
        toolbarBase = document.querySelector('[data-kt-users-table-toolbar="base"]');
        toolbarSelected = document.querySelector('[data-kt-users-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-users-table-select="selected_count"]');
        const deleteSelected = document.querySelector('[data-kt-users-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                text: "Are you sure you want to delete selected categories?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        text: "You have deleted all selected customers!.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    }).then(function () {
                        // Remove all selected customers
                        var IDs = [];
                        checkboxes.forEach(c => {
                            if (c.checked) {
                            //if (c.value) {

                                //TODO: idleri array içerisine attık
                                IDs.push(c.value);
                                //TODO: burada sime işleminde tablodan kaldırılıyor. bizde buradan veritabanından sileceğiz
                                datatable.row($(c.closest('tbody tr'))).remove().draw();

                                //console.log('c harfi ' + c.value);

                                if(IDs.length > 0){


                                    $.ajaxSetup({
                                        headers: {
                                            //meta'daki değeri 'X-CSRF-TOKEN' a atıyoruz.
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    var deleteUrl = document.getElementById('delete-url-users').value;

                                    $.ajax({
                                        url: deleteUrl,
                                        type: 'POST',
                                        data: { IDs: IDs},
                                        success: function(response){
                                            // Silme işlemi tamamlandıktan sonra yapılacaklar
                                            //alert("Silme tamam!");

                                        },
                                        error: function(xhr) {
                                            // Hata durumunda yapılacaklar
                                            alert("Silme işlemi başarısız oldu!");
                                        }
                                    });

                                }

                            }

                        });
                        //TODO: idleri burada yazdırdık. ajax için Toplu silme işlemi burada olacak
                        //console.log('ids ' + IDs);


                        // Remove header checked box
                        const headerCheckbox = table.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                    }).then(function () {
                        toggleToolbars(); // Detect checked checkboxes
                        initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    return {
        // Public functions
        init: function () {
            if (!table) {
                return;
            }

            initUserTable();
            initToggleToolbar();
            handleSearchDatatable();
            handleResetForm();
            handleDeleteRows();
           // handleFilterDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});
