$(function() {

    "use strict";

    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    $(function(){
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    });

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/
    $(function(){
        $('form').on('submit', function () {
            $(this).find(':submit').attr('disabled', 'true');
        });
    });

    /* ----------------------------------------------------------------
              [ Fontawesome IconPicker Js — click dropdown ]
-----------------------------------------------------------------*/

    function closeNiFaIconPicker($root) {
        if (!$root || !$root.length) return;
        $root.removeClass("is-open");
        $root.find("[data-ni-fa-icon-trigger]").attr("aria-expanded", "false");
        $root.find("[data-ni-fa-icon-panel]").attr("hidden", "hidden");
    }

    function openNiFaIconPicker($root) {
        if (!$root || !$root.length) return;
        $("[data-ni-fa-icon-picker].is-open").each(function () {
            if (this !== $root[0]) {
                closeNiFaIconPicker($(this));
            }
        });
        $root.addClass("is-open");
        $root.find("[data-ni-fa-icon-trigger]").attr("aria-expanded", "true");
        $root.find("[data-ni-fa-icon-panel]").removeAttr("hidden");
    }

    function initNiFaIconPicker(btnSelector, inputSelector, previewSelector) {
        var $host = $(btnSelector);
        if (!$host.length || typeof $.fn.iconpicker !== "function") {
            return;
        }

        var $root = $host.closest("[data-ni-fa-icon-picker]");
        var $input = $(inputSelector);
        var $trigger = $root.find("[data-ni-fa-icon-trigger]");
        var $panel = $root.find("[data-ni-fa-icon-panel]");
        var selected = (($input.val() || "") + "").trim();

        $host.iconpicker({
            placement: "inline",
            hideOnSelect: false,
            selected: selected || false,
            defaultValue: false,
            inputSearch: true
        });

        $trigger.on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            if ($root.hasClass("is-open")) {
                closeNiFaIconPicker($root);
            } else {
                openNiFaIconPicker($root);
            }
        });

        $panel.on("click", function (e) {
            e.stopPropagation();
        });

        $host.on("iconpickerSelected", function (e) {
            var val = (e.iconpickerValue || "").trim();
            $input.val(val);

            var $preview = $(previewSelector);
            if ($preview.length) {
                $preview.attr("class", val ? val : "fas fa-icons is-empty");
            }

            var $label = $root.find("[data-ni-fa-icon-label]");
            if ($label.length) {
                $label.text(val || ($label.attr("data-placeholder") || ""));
            }

            closeNiFaIconPicker($root);
        });
    }

    initNiFaIconPicker("#iconPickerBtn", "#icon", "#icon-value");
    initNiFaIconPicker("#iconPickerBtn2", "#icon2", "#icon-value2");

    $(document).on("click.niFaIconPicker", function (e) {
        if ($(e.target).closest("[data-ni-fa-icon-picker]").length) {
            return;
        }
        $("[data-ni-fa-icon-picker].is-open").each(function () {
            closeNiFaIconPicker($(this));
        });
    });

    /* ----------------------------------------------------------------
           [ Fontawesome IconPicker Rtl Js ]
-----------------------------------------------------------------*/

    var hasRtl  = $('body').hasClass("rtl-version");

    if (hasRtl) {
        $(document).on("iconpickerShown iconpickerSelected", ".icp", function () {
            $(".iconpicker-search").attr("placeholder", "اكتب للتصفية");
        });
        $(".iconpicker-search").attr("placeholder", "اكتب للتصفية");
    }


});