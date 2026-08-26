(function () {
  "use strict";

  function closeLengthMenus(except) {
    document.querySelectorAll(".ni-dt-length.is-open").forEach(function (el) {
      if (except && el === except) return;
      el.classList.remove("is-open", "is-dropup");
      var menu = el.querySelector(".ni-dt-length__menu");
      var trigger = el.querySelector(".ni-dt-length__trigger");
      if (menu) menu.hidden = true;
      if (trigger) trigger.setAttribute("aria-expanded", "false");
    });
  }

  function getFlipScroller(el) {
    var node = el.parentElement;
    while (node && node !== document.body) {
      var overflowY = window.getComputedStyle(node).overflowY;
      if (overflowY === "auto" || overflowY === "scroll" || overflowY === "overlay") {
        return node;
      }
      node = node.parentElement;
    }
    return null;
  }

  function placeLengthMenu(wrap, menu, trigger) {
    wrap.classList.remove("is-dropup");

    var gap = 8;
    var triggerRect = trigger.getBoundingClientRect();
    var menuHeight = menu.offsetHeight;
    var spaceBelow = window.innerHeight - triggerRect.bottom - gap;
    var spaceAbove = triggerRect.top - gap;
    var scroller = getFlipScroller(wrap);

    if (scroller) {
      var scrollerRect = scroller.getBoundingClientRect();
      spaceBelow = Math.min(spaceBelow, scrollerRect.bottom - triggerRect.bottom - gap);
      spaceAbove = Math.min(spaceAbove, triggerRect.top - scrollerRect.top - gap);
    }

    if (spaceBelow < menuHeight && spaceAbove > spaceBelow) {
      wrap.classList.add("is-dropup");
    }

    var table = wrap.closest(".dataTables_wrapper");
    if (!table) return;

    var tableRect = table.getBoundingClientRect();
    var menuRect = menu.getBoundingClientRect();
    var overflowRight = menuRect.right - tableRect.right;
    if (overflowRight > 0) {
      menu.style.right = overflowRight + "px";
    } else {
      menu.style.right = "0px";
    }
  }

  function enhanceLengthSelect(select) {
    if (!select || select.getAttribute("data-ni-dt-ready") === "1") return;
    select.setAttribute("data-ni-dt-ready", "1");

    var wrap = document.createElement("div");
    wrap.className = "ni-dt-length";

    var trigger = document.createElement("button");
    trigger.type = "button";
    trigger.className = "ni-dt-length__trigger";
    trigger.setAttribute("aria-haspopup", "listbox");
    trigger.setAttribute("aria-expanded", "false");
    trigger.innerHTML =
      '<span class="ni-dt-length__value">' + (select.value || "10") + "</span>" +
      '<i class="fas fa-chevron-down ni-dt-length__caret" aria-hidden="true"></i>';

    var menu = document.createElement("div");
    menu.className = "ni-dt-length__menu";
    menu.hidden = true;
    menu.setAttribute("role", "listbox");

    Array.prototype.forEach.call(select.options, function (opt) {
      var btn = document.createElement("button");
      btn.type = "button";
      btn.className = "ni-dt-length__option" + (opt.value === select.value ? " is-selected" : "");
      btn.setAttribute("role", "option");
      btn.setAttribute("data-value", opt.value);
      btn.innerHTML = '<span>' + opt.text + '</span><i class="fas fa-check" aria-hidden="true"></i>';
      menu.appendChild(btn);
    });

    wrap.appendChild(trigger);
    wrap.appendChild(menu);
    select.parentNode.insertBefore(wrap, select);
    wrap.appendChild(select);
    select.classList.add("ni-dt-length__native");
    stripLabelText(select.closest("label"));

    function setValue(value) {
      select.value = value;
      wrap.querySelector(".ni-dt-length__value").textContent = value;
      wrap.querySelectorAll(".ni-dt-length__option").forEach(function (btn) {
        btn.classList.toggle("is-selected", btn.getAttribute("data-value") === value);
      });
      select.dispatchEvent(new Event("change", { bubbles: true }));
    }

    trigger.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      var willOpen = !wrap.classList.contains("is-open");
      closeLengthMenus();
      if (willOpen) {
        wrap.classList.add("is-open");
        menu.hidden = false;
        trigger.setAttribute("aria-expanded", "true");
        placeLengthMenu(wrap, menu, trigger);
      }
    });

    menu.addEventListener("click", function (e) {
      var btn = e.target.closest(".ni-dt-length__option");
      if (!btn) return;
      e.preventDefault();
      setValue(btn.getAttribute("data-value"));
      closeLengthMenus();
    });
  }

  function stripLabelText(label) {
    if (!label) return;
    Array.prototype.slice.call(label.childNodes).forEach(function (node) {
      if (node.nodeType === 3) {
        node.textContent = "";
      }
    });
  }

  function enhanceSearchInput(input) {
    if (!input || input.getAttribute("data-ni-dt-ready") === "1") return;
    input.setAttribute("data-ni-dt-ready", "1");
    input.setAttribute("placeholder", "Search...");
    stripLabelText(input.closest("label"));

    var wrap = document.createElement("div");
    wrap.className = "ni-dt-search";
    wrap.innerHTML = '<i class="fas fa-search ni-dt-search__icon" aria-hidden="true"></i>';
    input.parentNode.insertBefore(wrap, input);
    wrap.appendChild(input);
  }

  function enhanceGlobalTableToolbar(container) {
    var wrap = container.closest(".ni-global-table");
    if (!wrap) return;

    var topRow = container.querySelector("div.row:has(.dataTables_filter):not(:has(.dataTables_paginate))");
    if (!topRow || topRow.getAttribute("data-ni-global-ready") === "1") return;
    topRow.setAttribute("data-ni-global-ready", "1");
    topRow.classList.add("ni-global-table__row");

    var titleText = wrap.getAttribute("data-table-title") || "";
    if (titleText) {
      var titleEl = document.createElement("div");
      titleEl.className = "ni-global-table__title";
      titleEl.textContent = titleText;
      topRow.insertBefore(titleEl, topRow.firstChild);
    }

    var controls = document.createElement("div");
    controls.className = "ni-global-table__controls";

    var filter = topRow.querySelector(".dataTables_filter");
    if (filter) {
      controls.appendChild(filter);
    }

    var addBtn = wrap.querySelector(".ni-global-table__add-source .btn, .ni-global-table__add-source a.btn");
    if (addBtn) {
      addBtn.classList.add("ni-dt-add");
      controls.appendChild(addBtn);
    }

    topRow.appendChild(controls);

    Array.prototype.forEach.call(topRow.querySelectorAll('[class*="col-"]'), function (col) {
      if (!col.querySelector(".dataTables_filter, #deleteChecked")) {
        col.style.display = "none";
      }
    });
  }

  function enhanceEmbeddedTableToolbar(container) {
    enhanceGlobalTableToolbar(container);
  }

  function bindBulkDeleteToToolbar(container) {
    var $del = window.jQuery("#deleteChecked");
    if (!$del.length) return;

    var $top = window.jQuery(container).find(".dataTables_filter").first().closest(".row");
    if ($top.find(".dataTables_paginate").length) {
      $top = window.jQuery();
    }
    if (!$top.length) {
      $top = window.jQuery(container).find("div.row").first();
    }
    if (!$top.length) return;

    var $parent = $del.parent();
    $del.addClass("ni-bulk-delete");
    $top.append($del);
    if (typeof window.syncBulkDeleteButton === "function") {
      window.syncBulkDeleteButton();
    } else {
      $del.removeClass("is-visible").css("display", "none");
    }

    if ($parent.length && window.jQuery.trim($parent.html()) === "") {
      $parent.remove();
    }
  }

  function getStandardDatatableOptions(onReady) {
    return {
      autoWidth: false,
      // Search on top. Info + pagination + entries filter stay under the table.
      dom:
        "<'row'<'col-sm-12'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p><'col-sm-12 col-md-4'l>>",
      columnDefs: [
        { targets: 0, orderable: false, className: "all" },
        { targets: -1, orderable: false, className: "all text-nowrap" }
      ],
      language: {
        search: "",
        searchPlaceholder: "Search...",
        lengthMenu: "_MENU_",
        paginate: {
          previous: "<i class='arrow_carrot-left'>",
          next: "<i class='arrow_carrot-right'>"
        }
      },
      initComplete: function () {
        var container = this.api().table().container();
        enhanceDataTableControls(container);
        if (typeof onReady === "function") {
          onReady(container);
        }
        bindBulkDeleteToToolbar(container);
      },
      drawCallback: function () {
        window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
      }
    };
  }

  function enhanceDataTableControls(container) {
    if (!container) return;
    container.querySelectorAll(".dataTables_length select").forEach(enhanceLengthSelect);
    container.querySelectorAll(".dataTables_filter input").forEach(enhanceSearchInput);
    moveLengthToFooter(container);
    moveAddButtonToToolbar(container);
  }

  function isAddAction(el) {
    if (!el || el.closest(".ni-hero-tabs__track")) return false;
    var text = (el.textContent || "").replace(/\s+/g, " ").trim();
    if (text.charAt(0) === "+") return true;
    var href = el.getAttribute("href") || "";
    if (href.indexOf("/create") !== -1) return true;
    var target = el.getAttribute("data-target") || "";
    if (target && /add|create|modal/i.test(target) && /add|create|\+/i.test(text)) return true;
    return false;
  }

  function moveAddButtonToToolbar(container) {
    var topRow = container.querySelector("div.row:has(.dataTables_filter):not(:has(.dataTables_paginate))");
    if (!topRow) return;

    var actions = topRow.querySelector(".ni-dt-toolbar-actions");
    if (!actions) {
      actions = document.createElement("div");
      actions.className = "ni-dt-toolbar-actions";
      topRow.appendChild(actions);
    }

    var candidates = [];
    document.querySelectorAll(".ni-page-title__actions .btn.btn-primary, .ni-page-title__actions a.btn.btn-primary").forEach(function (btn) {
      candidates.push(btn);
    });

    var card = container.closest(".card");
    if (card) {
      card.querySelectorAll(".btn.btn-primary, a.btn.btn-primary").forEach(function (btn) {
        if (btn.closest(".dataTables_wrapper, .modal, form")) return;
        candidates.push(btn);
      });
    }

    candidates.forEach(function (btn) {
      if (!isAddAction(btn)) return;
      if (btn.getAttribute("data-ni-moved") === "1") return;
      btn.setAttribute("data-ni-moved", "1");
      btn.classList.add("ni-dt-add");
      actions.appendChild(btn);
    });

    document.querySelectorAll(".ni-page-title__actions").forEach(function (wrap) {
      if (!wrap.querySelector(".btn, a.btn")) {
        wrap.classList.add("is-empty");
        wrap.style.display = "none";
      }
    });
  }

  function moveLengthToFooter(container) {
    var length = container.querySelector(".dataTables_length");
    var footer = container.querySelector("div.row:has(.dataTables_paginate)");
    if (!length || !footer) return;

    var del = length.querySelector("#deleteChecked");
    var topRow = container.querySelector("div.row:has(.dataTables_filter):not(:has(.dataTables_paginate))");
    if (del && topRow) {
      topRow.appendChild(del);
    }

    if (length.getAttribute("data-ni-moved") !== "1" && !footer.contains(length)) {
      footer.appendChild(length);
    }

    length.classList.add("ni-dt-length-footer");
    length.setAttribute("data-ni-moved", "1");
  }

  if (!window.__niDtLengthBound) {
    window.__niDtLengthBound = true;
    document.addEventListener("click", function () {
      closeLengthMenus();
    });
  }

  function destroyDataTables() {
    if (!window.jQuery || !window.jQuery.fn.DataTable) {
      return;
    }

    window.jQuery(".dataTable").each(function () {
      if (window.jQuery.fn.DataTable.isDataTable(this)) {
        window.jQuery(this).DataTable().destroy();
      }
    });
  }

  function initDataTables() {
    if (!window.jQuery || !window.jQuery.fn.DataTable) {
      return;
    }

    document.querySelectorAll(".ni-global-table[data-table-id]").forEach(function (wrap) {
      var tableId = wrap.getAttribute("data-table-id");
      if (!tableId || !window.jQuery("#" + tableId).length) return;
      if (window.jQuery.fn.DataTable.isDataTable("#" + tableId)) return;

      window.jQuery("#" + tableId).DataTable(getStandardDatatableOptions(function (container) {
        enhanceGlobalTableToolbar(container);
      }));
    });

    if (window.jQuery("#basic-datatable").length && !window.jQuery.fn.DataTable.isDataTable("#basic-datatable")) {
      window.jQuery("#basic-datatable").DataTable(getStandardDatatableOptions());
    }

    if (window.jQuery("#datatable-buttons").length) {
      var a = window.jQuery("#datatable-buttons").DataTable({
        lengthChange: false,
        buttons: ["copy", "print"],
        language: {
          paginate: {
            previous: "<i class='arrow_carrot-left'>",
            next: "<i class='arrow_carrot-right'>"
          }
        },
        drawCallback: function () {
          window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
      });

      if (window.jQuery.fn.dataTable && window.jQuery.fn.dataTable.Buttons) {
        a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
      }
    }

    if (window.jQuery("#alternative-page-datatable").length) {
      window.jQuery("#alternative-page-datatable").DataTable({
        pagingType: "full_numbers",
        drawCallback: function () {
          window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
      });
    }

    if (window.jQuery("#complex-header-datatable").length) {
      window.jQuery("#complex-header-datatable").DataTable({
        language: {
          paginate: {
            previous: "<i class='arrow_carrot-left'>",
            next: "<i class='arrow_carrot-right'>"
          }
        },
        drawCallback: function () {
          window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        },
        columnDefs: [{ visible: false, targets: -1 }]
      });
    }

    if (window.jQuery("#row-callback-datatable").length) {
      window.jQuery("#row-callback-datatable").DataTable({
        language: {
          paginate: {
            previous: "<i class='arrow_carrot-left'>",
            next: "<i class='arrow_carrot-right'>"
          }
        },
        drawCallback: function () {
          window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        },
        createdRow: function (row, data) {
          if (150000 < 1 * data[5].replace(/[\$,]/g, "")) {
            window.jQuery("td", row).eq(5).addClass("text-danger");
          }
        }
      });
    }

    if (window.jQuery("#state-saving-datatable").length) {
      window.jQuery("#state-saving-datatable").DataTable({
        stateSave: true,
        language: {
          paginate: {
            previous: "<i class='arrow_carrot-left'>",
            next: "<i class='arrow_carrot-right'>"
          }
        },
        drawCallback: function () {
          window.jQuery(".dataTables_paginate > .pagination").addClass("pagination-rounded");
        }
      });
    }
  }

  function boot() {
    destroyDataTables();
    initDataTables();
  }

  window.jQuery(document).ready(boot);
  window.addEventListener("ni:page-loaded", boot);
})();
