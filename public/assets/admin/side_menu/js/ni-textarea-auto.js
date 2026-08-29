(function () {
  "use strict";

  var SELECTOR = "textarea.ni-textarea-auto";

  function fit(el) {
    if (!el) return;
    el.style.height = "auto";
    el.style.height = Math.max(el.scrollHeight, 44) + "px";
  }

  function fitAll(root) {
    var scope = root && root.querySelectorAll ? root : document;
    scope.querySelectorAll(SELECTOR).forEach(fit);
  }

  function bind(el) {
    if (!el || el.getAttribute("data-ni-textarea-auto") === "1") return;
    el.setAttribute("data-ni-textarea-auto", "1");
    el.addEventListener("input", function () {
      fit(el);
    });
    fit(el);
  }

  function initNiTextareaAuto(root) {
    var scope = root && root.querySelectorAll ? root : document;
    scope.querySelectorAll(SELECTOR).forEach(bind);
  }

  window.initNiTextareaAuto = initNiTextareaAuto;

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      initNiTextareaAuto();
    });
  } else {
    initNiTextareaAuto();
  }
})();
