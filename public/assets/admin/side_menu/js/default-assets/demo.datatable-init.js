$(document).ready(function () {
  "use strict";

  $("#basic-datatable").DataTable({
    keys: true,
    autoWidth: false,
    columnDefs: [
      { targets: 0, orderable: false, className: "all" },
      { targets: -1, orderable: false, className: "all text-nowrap" }
    ],
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  var a = $("#datatable-buttons").DataTable({
    lengthChange: false,
    buttons: ["copy", "print"],
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  $("#selection-datatable").DataTable({
    select: { style: "multi" },
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

  $("#alternative-page-datatable").DataTable({
    pagingType: "full_numbers",
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  $("#scroll-vertical-datatable").DataTable({
    scrollY: "550px",
    scrollCollapse: true,
    paging: false,
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  $("#scroll-horizontal-datatable").DataTable({
    scrollX: true,
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });

  $("#complex-header-datatable").DataTable({
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    },
    columnDefs: [{ visible: false, targets: -1 }]
  });

  $("#row-callback-datatable").DataTable({
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    },
    createdRow: function (a, t, e) {
      if (150000 < 1 * t[5].replace(/[\$,]/g, "")) {
        $("td", a).eq(5).addClass("text-danger");
      }
    }
  });

  $("#state-saving-datatable").DataTable({
    stateSave: true,
    language: {
      paginate: {
        previous: "<i class='arrow_carrot-left'>",
        next: "<i class='arrow_carrot-right'>"
      }
    },
    drawCallback: function () {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
    }
  });
});
