"use strict";
var KTDatatablesExtensionsResponsive = (function () {
    var initTable1 = function () {
        var table = $("#kt_datatable");
        // begin first table
        table.DataTable({
            responsive: true,
            order: [[0, "desc"]],
            processing: true,
            serverSide: true,
            ajax: {
                url: "admin/drugs/table",
            },
            columns: [
                {
                    data: "id",
                    name: "id",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "name",
                    name: "name",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "class",
                    name: "class",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "subClass",
                    name: "subClass",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "manufacturer",
                    name: "manufacturer",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "indication",
                    name: "indication",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "contraindication",
                    name: "contraindication",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "precautions",
                    name: "precautions",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "adverse_reactions",
                    name: "adverse_reactions",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "interactions",
                    name: "interactions",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "administration",
                    name: "administration",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "administration_extra",
                    name: "administration_extra",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "classification",
                    name: "classification",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "pregnancy_category",
                    name: "pregnancy_category",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "created_at",
                    name: "created_at",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
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
