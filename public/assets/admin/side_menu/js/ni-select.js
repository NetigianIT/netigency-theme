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
      clearActive(el);
    });
  }

  function getOptions(root) {
    return Array.prototype.slice.call(root.querySelectorAll("[data-ni-select-option]:not([disabled])"));
  }

  function clearActive(root) {
    root.querySelectorAll(".ni-select__option.is-active").forEach(function (btn) {
      btn.classList.remove("is-active");
    });
  }

  function setActive(root, optionBtn) {
    clearActive(root);
    if (optionBtn) {
      optionBtn.classList.add("is-active");
      optionBtn.focus();
    }
  }

  function openSelect(root) {
    var trigger = root.querySelector("[data-ni-select-trigger]");
    var dropdown = root.querySelector("[data-ni-select-dropdown]");
    if (!trigger || !dropdown) return;
    closeAll();
    root.classList.add("is-open");
    trigger.setAttribute("aria-expanded", "true");
    dropdown.hidden = false;

    var selected = root.querySelector("[data-ni-select-option].is-selected:not([disabled])");
    var first = getOptions(root)[0];
    setActive(root, selected || first);
  }

  function setFromOption(root, optionBtn) {
    if (!optionBtn || optionBtn.disabled) return;

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

  function moveActive(root, direction) {
    var options = getOptions(root);
    if (!options.length) return;
    var current = root.querySelector(".ni-select__option.is-active");
    var index = current ? options.indexOf(current) : -1;
    var next = index + direction;
    if (next < 0) next = options.length - 1;
    if (next >= options.length) next = 0;
    setActive(root, options[next]);
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
      if (root.classList.contains("is-open")) {
        closeAll();
        trigger.focus();
      } else {
        openSelect(root);
      }
    });

    trigger.addEventListener("keydown", function (e) {
      if (e.key === "ArrowDown" || e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        if (!root.classList.contains("is-open")) openSelect(root);
        else if (e.key === "ArrowDown") moveActive(root, 1);
      }
    });

    dropdown.addEventListener("click", function (e) {
      e.stopPropagation();
    });

    dropdown.addEventListener("keydown", function (e) {
      if (e.key === "ArrowDown") {
        e.preventDefault();
        moveActive(root, 1);
      } else if (e.key === "ArrowUp") {
        e.preventDefault();
        moveActive(root, -1);
      } else if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        var active = root.querySelector(".ni-select__option.is-active");
        if (active) {
          setFromOption(root, active);
          closeAll();
          trigger.focus();
        }
      } else if (e.key === "Escape") {
        e.preventDefault();
        closeAll();
        trigger.focus();
      } else if (e.key === "Tab") {
        closeAll();
      }
    });

    options.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        setFromOption(root, btn);
        closeAll();
        trigger.focus();
      });

      btn.addEventListener("mouseenter", function () {
        if (!btn.disabled) setActive(root, btn);
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
        '<span class="ni-select__option-text"></span><i class="fas fa-check ni-select__check" aria-hidden="true"></i>';
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

  if (window.jQuery) {
    jQuery(document).on("draw.dt", function () {
      enhanceAll();
    });
  }

  window.NiSelect = { enhanceAll: enhanceAll, enhance: enhanceNativeSelect };
  window.initNiSelect = function () {
    enhanceAll();
  };
})();
