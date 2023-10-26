"use strict";
var KTDatatablesExtensionsResponsive = (function () {
    var initTable1 = function () {
        var table = $("#kt_datatable");
        // begin first table
        table.DataTable({
            responsive: true,
            order: [[0, "desc"]],
            columnDefs: [
                {
                    width: "275px",
                    targets: 1,
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
