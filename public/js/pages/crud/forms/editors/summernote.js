"use strict";
// Class definition

var KTSummernoteDemo = (function () {
    // Private functions

    var demos = function () {
        $(".summernote").summernote({
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                [
                    "fontsize",
                    [
                        "fontname",
                        "fontsize",
                        "fontsizeunit",
                        // "color",
                        // "forecolor",
                        // "backcolor",
                        // "bold",
                        // "italic",
                        // "underline",
                        // "strikethrough",
                        // "superscript",
                        // "subscript",
                        // "clear",
                    ],
                ],
                ["color", ["color"]],
                ["para", ["style", "ol", "ul", "paragraph", "height"]],
                // ["height", ["height"]],
                ["insert", ["picture", "link", "video", "table", "hr"]],
                ["view", ["fullscreen", "codeview", "undo", "redo", "help"]],
            ],
            styleTags: ["p", "h1", "h2", "h3", "h4", "h5"],
            height: 400,
            tabsize: 2,
        });
    };

    return {
        // public functions
        init: function () {
            demos();
        },
    };
})();

// Initialization
jQuery(document).ready(function () {
    KTSummernoteDemo.init();
});
