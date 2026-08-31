(function () {
  "use strict";

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute("content") : "";
  }

  function sync(input) {
    if (!input) return;
    var root = input.closest("[data-ni-switch]") || input.closest(".ni-switch");
    var wrap = input.closest(".ni-switch");
    var state =
      (root && root.querySelector("[data-ni-switch-state]")) ||
      (wrap && wrap.querySelector(".ni-switch__state"));
    if (!state) return;

    var label = input.checked
      ? state.getAttribute("data-on") || "On"
      : state.getAttribute("data-off") || "Off";
    state.textContent = label;
    if (wrap) wrap.setAttribute("title", label);
  }

  function toggleRemote(input) {
    var root = input.closest("[data-ni-status-url]");
    if (!root) return Promise.resolve(true);

    var url = root.getAttribute("data-ni-status-url");
    if (!url) return Promise.resolve(true);

    input.disabled = true;
    root.classList.add("is-loading");

    return fetch(url, {
      method: "PATCH",
      headers: {
        "X-CSRF-TOKEN": csrfToken(),
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        status: input.checked
          ? input.getAttribute("data-on-value") || "1"
          : input.getAttribute("data-off-value") || "0",
      }),
    })
      .then(function (res) {
        if (!res.ok) throw new Error("status update failed");
        return res.json().catch(function () {
          return {};
        });
      })
      .then(function () {
        return true;
      })
      .catch(function () {
        input.checked = !input.checked;
        sync(input);
        return false;
      })
      .finally(function () {
        input.disabled = false;
        root.classList.remove("is-loading");
      });
  }

  function bind(input) {
    if (!input || input.getAttribute("data-ni-switch-ready") === "1") return;
    input.setAttribute("data-ni-switch-ready", "1");
    input.addEventListener("change", function () {
      sync(input);
      if (input.closest("[data-ni-status-url]")) {
        toggleRemote(input);
      }
    });
    sync(input);
  }

  function enhanceAll(scope) {
    var root = scope || document;
    root.querySelectorAll("[data-ni-switch-input], .ni-switch input[type='checkbox']").forEach(bind);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      enhanceAll();
    });
  } else {
    enhanceAll();
  }

  window.NiSwitch = { enhanceAll: enhanceAll };
  window.initNiSwitch = function () {
    enhanceAll();
  };

  if (window.jQuery) {
    jQuery(document).on("draw.dt", function () {
      enhanceAll();
    });
  }
})();
