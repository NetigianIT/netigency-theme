(function () {
  "use strict";

  function closeAll(except) {
    document.querySelectorAll(".ni-select.is-open").forEach(function (el) {
      if (except && el === except) return;
      el.classList.remove("is-open");
      var trigger = el.querySelector("[data-ni-select-trigger]");
      var dropdown = el.querySelector("[data-ni-select-dropdown]");
      if (trigger) trigger.setAttribute("aria-expanded", "false");
      if (dropdown) dropdown.hidden = true;
    });
  }

  function setFromOption(root, optionBtn) {
    var native = root.querySelector("[data-ni-select-native], select.ni-select__native, select");
    var labelEl = root.querySelector("[data-ni-select-label]");
    var valueWrap = root.querySelector(".ni-select__value");
    var value = optionBtn.getAttribute("data-value");
    var textEl = optionBtn.querySelector(".ni-select__option-text");
    var label = optionBtn.getAttribute("data-label") || (textEl ? textEl.textContent.trim() : "");
    var icon = optionBtn.getAttribute("data-ni-icon");

    if (native) {
      native.value = value;
      native.dispatchEvent(new Event("change", { bubbles: true }));
    }

    if (labelEl) labelEl.textContent = label;

    if (valueWrap) {
      var oldIcon = valueWrap.querySelector(".ni-select__value-icon");
      if (oldIcon) oldIcon.remove();
      if (icon) {
        var i = document.createElement("i");
        i.className = icon + " ni-select__value-icon";
        i.setAttribute("aria-hidden", "true");
        valueWrap.insertBefore(i, valueWrap.firstChild);
      }
    }

    root.querySelectorAll("[data-ni-select-option]").forEach(function (btn) {
      var selected = btn === optionBtn;
      btn.classList.toggle("is-selected", selected);
      btn.setAttribute("aria-selected", selected ? "true" : "false");
    });
  }

  function bindRoot(root) {
    if (root.getAttribute("data-ni-ready") === "1") return;
    root.setAttribute("data-ni-ready", "1");

    var trigger = root.querySelector("[data-ni-select-trigger]");
    var dropdown = root.querySelector("[data-ni-select-dropdown]");
    var options = root.querySelectorAll("[data-ni-select-option]");

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
      }
    });

    dropdown.addEventListener("click", function (e) {
      e.stopPropagation();
    });

    options.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        setFromOption(root, btn);
        closeAll();
      });
    });
  }

  function shouldSkip(select) {
    if (!select || select.tagName !== "SELECT") return true;
    if (select.multiple) return true;
    if (select.size && Number(select.size) > 1) return true;
    if (select.closest(".ni-select")) return true;
    if (select.closest(".ni-icon-select")) return true;
    if (select.hasAttribute("data-ni-native")) return true;
    if (select.classList.contains("ni-select__native")) return true;
    if (select.closest(".dataTables_length")) return true;
    if (select.closest(".dataTables_filter")) return true;
    return false;
  }

  function enhanceNativeSelect(select) {
    if (shouldSkip(select)) return;
    if (select.getAttribute("data-ni-enhanced") === "1") return;
    select.setAttribute("data-ni-enhanced", "1");

    var options = Array.prototype.slice.call(select.options);
    var selected = select.options[select.selectedIndex];
    var selectedValue = selected ? selected.value : "";
    var selectedLabel = selected ? selected.textContent.trim() : "";

    var wrap = document.createElement("div");
    wrap.className = "ni-select";
    wrap.setAttribute("data-ni-select", "");

    select.classList.add("ni-select__native");
    select.setAttribute("data-ni-select-native", "");
    select.setAttribute("tabindex", "-1");
    select.setAttribute("aria-hidden", "true");

    select.parentNode.insertBefore(wrap, select);
    wrap.appendChild(select);

    var trigger = document.createElement("button");
    trigger.type = "button";
    trigger.className = "ni-select__trigger";
    trigger.setAttribute("data-ni-select-trigger", "");
    trigger.setAttribute("aria-haspopup", "listbox");
    trigger.setAttribute("aria-expanded", "false");
    trigger.innerHTML =
      '<span class="ni-select__value"><span data-ni-select-label></span></span>' +
      '<i class="fas fa-chevron-down ni-select__caret"></i>';
    trigger.querySelector("[data-ni-select-label]").textContent = selectedLabel || "Select";

    var dropdown = document.createElement("div");
    dropdown.className = "ni-select__dropdown";
    dropdown.setAttribute("data-ni-select-dropdown", "");
    dropdown.hidden = true;

    var list = document.createElement("div");
    list.className = "ni-select__list";
    list.setAttribute("role", "listbox");
    list.setAttribute("data-ni-select-list", "");

    options.forEach(function (opt) {
      if (opt.disabled && opt.value === "" && options.length > 1) {
        // keep placeholder as first visual option only if selected empty
      }
      var btn = document.createElement("button");
      btn.type = "button";
      btn.className = "ni-select__option" + (opt.selected ? " is-selected" : "");
      btn.setAttribute("role", "option");
      btn.setAttribute("data-ni-select-option", "");
      btn.setAttribute("data-value", opt.value);
      btn.setAttribute("data-label", opt.textContent.trim());
      btn.setAttribute("aria-selected", opt.selected ? "true" : "false");
      if (opt.disabled && opt.value === "") {
        btn.disabled = true;
        btn.classList.add("is-placeholder");
      }
      btn.innerHTML =
        '<span class="ni-select__option-text"></span><i class="fas fa-check ni-select__check"></i>';
      btn.querySelector(".ni-select__option-text").textContent = opt.textContent.trim();
      list.appendChild(btn);
    });

    dropdown.appendChild(list);
    wrap.appendChild(trigger);
    wrap.appendChild(dropdown);

    bindRoot(wrap);
  }

  function enhanceAll(scope) {
    var root = scope || document;
    root.querySelectorAll("select").forEach(enhanceNativeSelect);
    root.querySelectorAll("[data-ni-select]").forEach(bindRoot);
  }

  document.addEventListener("click", function () {
    closeAll();
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeAll();
  });

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      enhanceAll();
    });
  } else {
    enhanceAll();
  }

  // DataTables / AJAX re-draws
  if (window.jQuery) {
    jQuery(document).on("draw.dt", function () {
      enhanceAll();
    });
  }

  window.NiSelect = { enhanceAll: enhanceAll, enhance: enhanceNativeSelect };
})();
