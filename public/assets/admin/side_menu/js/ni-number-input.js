(function () {
  "use strict";

  var SVG_UP =
    '<svg viewBox="0 0 12 8" aria-hidden="true"><path d="M1.2 6.2 6 1.8l4.8 4.4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  var SVG_DOWN =
    '<svg viewBox="0 0 12 8" aria-hidden="true"><path d="M1.2 1.8 6 6.2l4.8-4.4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';

  function isNumberInput(input) {
    if (!input || input.tagName !== "INPUT") return false;
    if ((input.getAttribute("type") || "").toLowerCase() !== "number") return false;
    if (input.closest(".ni-number")) return false;
    if (input.closest(".tox, .tox-tinymce")) return false;
    if (input.hasAttribute("data-no-number-ui")) return false;
    return true;
  }

  function parseStep(input) {
    var step = input.step;
    if (!step || step === "any") return 1;
    var n = parseFloat(step);
    return isNaN(n) || n === 0 ? 1 : n;
  }

  function decimalPlaces(n) {
    var s = String(n);
    if (s.indexOf("e-") !== -1) {
      return parseInt(s.split("e-")[1], 10) || 0;
    }
    var i = s.indexOf(".");
    return i === -1 ? 0 : s.length - i - 1;
  }

  function clamp(input, value) {
    var min = input.min === "" ? null : parseFloat(input.min);
    var max = input.max === "" ? null : parseFloat(input.max);
    if (min !== null && !isNaN(min) && value < min) value = min;
    if (max !== null && !isNaN(max) && value > max) value = max;
    return value;
  }

  function bump(input, dir) {
    if (input.disabled || input.readOnly) return;

    var step = parseStep(input);
    var current = parseFloat(input.value);
    if (isNaN(current)) current = 0;

    var next = clamp(input, current + dir * step);
    var places = Math.max(decimalPlaces(step), decimalPlaces(current));
    input.value = places ? next.toFixed(places) : String(next);
    input.dispatchEvent(new Event("input", { bubbles: true }));
    input.dispatchEvent(new Event("change", { bubbles: true }));
  }

  function bindHold(btn, input, dir) {
    var timer = null;
    var delay = null;

    function stop() {
      if (delay) window.clearTimeout(delay);
      if (timer) window.clearInterval(timer);
      delay = null;
      timer = null;
      document.removeEventListener("mouseup", stop);
      document.removeEventListener("touchend", stop);
      document.removeEventListener("touchcancel", stop);
    }

    function start(e) {
      e.preventDefault();
      input.focus();
      bump(input, dir);
      delay = window.setTimeout(function () {
        timer = window.setInterval(function () {
          bump(input, dir);
        }, 70);
      }, 380);
      document.addEventListener("mouseup", stop);
      document.addEventListener("touchend", stop);
      document.addEventListener("touchcancel", stop);
    }

    btn.addEventListener("mousedown", start);
    btn.addEventListener("touchstart", start, { passive: false });
    btn.addEventListener("mouseleave", stop);
  }

  function wrapInput(input) {
    var wrap = document.createElement("div");
    wrap.className = "ni-number";

    var spinners = document.createElement("div");
    spinners.className = "ni-number__spinners";

    var up = document.createElement("button");
    up.type = "button";
    up.className = "ni-number__btn";
    up.setAttribute("tabindex", "-1");
    up.setAttribute("aria-label", "Increase");
    up.innerHTML = SVG_UP;

    var down = document.createElement("button");
    down.type = "button";
    down.className = "ni-number__btn";
    down.setAttribute("tabindex", "-1");
    down.setAttribute("aria-label", "Decrease");
    down.innerHTML = SVG_DOWN;

    if (input.disabled || input.readOnly) {
      up.disabled = true;
      down.disabled = true;
    }

    spinners.appendChild(up);
    spinners.appendChild(down);

    input.parentNode.insertBefore(wrap, input);
    wrap.appendChild(input);
    wrap.appendChild(spinners);

    bindHold(up, input, 1);
    bindHold(down, input, -1);
  }

  function initNiNumberInput() {
    document.querySelectorAll('input[type="number"]').forEach(function (input) {
      if (isNumberInput(input)) wrapInput(input);
    });
  }

  window.initNiNumberInput = initNiNumberInput;

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNiNumberInput);
  } else {
    initNiNumberInput();
  }

  window.addEventListener("ni:page-loaded", initNiNumberInput);
})();
