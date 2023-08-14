// Export işlemi için gerekli jQuery ve DataTables eklentilerini ekleyin

// Class definition
var KTUserOfferExport = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Tabloyu initialize etmek için kodları buraya yerleştirin

    }


    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Export';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: ':visible:not(:eq(0))' // Exclude the first column from export
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: ':visible:not(:eq(0))' // Exclude the first column from export
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle,
                    exportOptions: {
                        columns: ':visible:not(:eq(0))' // Exclude the first column from export
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle,
                    // exportOptions: {
                    //     format: {
                    //         body: function (data, row, column, node) {
                    //             // Exclude first column (index 0) from export
                    //             if (column === 0) {
                    //                 return "";
                    //             }
                    //             return data;
                    //         }
                    //     }
                    // }
                    exportOptions: {
                        columns: ':visible:not(:eq(0))' // Exclude the first column from export
                    },
                    // customize: function (doc) {
                    //     // Customize the PDF document here
                    //     // You can modify the styling, layout, etc.
                    //     // For example:
                    //     doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    // }

                }
            ]
        }).container().appendTo($('#kt_ecommerce_report_sales_export_menu_export'));




        // Hook dropdown menu click event to datatable export buttons
        const exportButtonsList = document.querySelectorAll('#kt_ecommerce_report_sales_export_menu_export [data-kt-ecommerce-export]');
        exportButtonsList.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-ecommerce-export');

                // Get the target export button
                const target = buttons.buttons().containers[0].querySelector('[data-kt-ecommerce-export="' + exportValue + '"]');

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }


    // var handleFilterDatatable = () => {
    //     // Select filter options
    //     const filterForm = document.querySelector('[data-kt-offers-table-filter="form"]');
    //     const filterButton = filterForm.querySelector('[data-kt-offers-table-filter="filter"]');
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
    //
    //
    // // Reset Filter
    // var handleResetForm = () => {
    //     // Select reset button
    //     const resetButton = document.querySelector('[data-kt-offers-table-filter="reset"]');
    //
    //     // Reset datatable
    //     resetButton.addEventListener('click', function () {
    //         // Select filter options
    //         const filterForm = document.querySelector('[data-kt-offers-table-filter="form"]');
    //         const selectOptions = filterForm.querySelectorAll('select');
    //
    //         // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
    //         selectOptions.forEach(select => {
    //             $(select).val('').trigger('change');
    //         });
    //
    //         // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
    //         datatable.search('').draw();
    //     });
    // }


    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_table_offers');

            if (!table) {
                return;
            }

            initDatatable();
            exportButtons();

            //   handleResetForm();
            //   handleFilterDatatable();
        }
    };
}();

// On document ready
$(document).ready(function () {
    KTUserOfferExport.init();
});
