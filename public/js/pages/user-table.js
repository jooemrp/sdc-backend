"use strict";
var KTDatatablesExtensionsResponsive = (function () {
    var initTable1 = function () {
        var table = $("#kt_datatable");

        // begin first table
        table.DataTable({
            order: [[0, "desc"]],
            responsive: true,

            columnDefs: [
                {
                    width: "100px",
                    targets: 1,
                },
                {
                    width: "200px",
                    targets: 2,
                },
            ],
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initTable1();
        },
    };
})();

jQuery(document).ready(function () {
    KTDatatablesExtensionsResponsive.init();
});
