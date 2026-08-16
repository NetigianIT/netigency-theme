(function () {
  "use strict";

  function closeAll(except) {
    document.querySelectorAll("[data-ni-icon-select].is-open").forEach(function (el) {
      if (except && el === except) return;
      el.classList.remove("is-open");
      var trigger = el.querySelector("[data-ni-icon-trigger]");
      var dropdown = el.querySelector("[data-ni-icon-dropdown]");
      if (trigger) trigger.setAttribute("aria-expanded", "false");
      if (dropdown) dropdown.hidden = true;
    });
  }

  function setValue(root, value, label) {
    var input = root.querySelector("[data-ni-icon-input]");
    var preview = root.querySelector("[data-ni-icon-preview]");
    var labelEl = root.querySelector("[data-ni-icon-label]");

    if (input) input.value = value || "";

    if (preview) {
      preview.classList.toggle("is-empty", !value);
      preview.innerHTML = value
        ? '<i class="' + value + '"></i>'
        : '<i class="fas fa-icons"></i>';
    }

    if (labelEl) labelEl.textContent = label || "";

    root.querySelectorAll("[data-ni-icon-option]").forEach(function (btn) {
      var selected = btn.getAttribute("data-value") === value;
      btn.classList.toggle("is-selected", selected);
      btn.setAttribute("aria-selected", selected ? "true" : "false");
    });
  }

  function initOne(root) {
    if (root.getAttribute("data-ni-ready") === "1") return;
    root.setAttribute("data-ni-ready", "1");

    var trigger = root.querySelector("[data-ni-icon-trigger]");
    var dropdown = root.querySelector("[data-ni-icon-dropdown]");
    var search = root.querySelector("[data-ni-icon-search]");
    var options = root.querySelectorAll("[data-ni-icon-option]");

    if (!trigger || !dropdown) return;

    trigger.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      var willOpen = !root.classList.contains("is-open");
      closeAll();
      if (willOpen) {
        root.classList.add("is-open");
        trigger.setAttribute("aria-expanded", "true");
        dropdown.hidden = false;
        if (search) {
          search.value = "";
          options.forEach(function (btn) {
            btn.hidden = false;
          });
          setTimeout(function () {
            search.focus();
          }, 0);
        }
      }
    });

    dropdown.addEventListener("click", function (e) {
      e.stopPropagation();
    });

    options.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        setValue(root, btn.getAttribute("data-value"), btn.getAttribute("data-label"));
        closeAll();
      });
    });

    if (search) {
      search.addEventListener("input", function () {
        var q = (search.value || "").toLowerCase().trim();
        options.forEach(function (btn) {
          var label = (btn.getAttribute("data-label") || "").toLowerCase();
          var value = (btn.getAttribute("data-value") || "").toLowerCase();
          btn.hidden = q !== "" && label.indexOf(q) === -1 && value.indexOf(q) === -1;
        });
      });

      search.addEventListener("click", function (e) {
        e.stopPropagation();
      });
    }
  }

  function initAll() {
    document.querySelectorAll("[data-ni-icon-select]").forEach(initOne);
  }

  document.addEventListener("click", function () {
    closeAll();
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeAll();
  });

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAll);
  } else {
    initAll();
  }
})();
