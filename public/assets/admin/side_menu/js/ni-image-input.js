(function () {
  "use strict";

  function isImageFileInput(input) {
    if (!input || input.type !== "file") return false;
    if (input.closest(".ni-image-input")) return false;
    if (input.hasAttribute("data-no-image-input")) return false;

    var name = (input.getAttribute("name") || "").toLowerCase();
    var accept = (input.getAttribute("accept") || "").toLowerCase();

    if (name === "cv_file" || name.indexOf("cv_") === 0) return false;
    if (accept && accept.indexOf("image") === -1 && !/\.svg|\.jpe?g|\.png|\.gif|\.webp/.test(accept)) {
      return false;
    }

    return true;
  }

  function findPreviewSrc(input) {
    var group = input.closest(".form-group") || input.parentElement;
    var col = input.closest("[class*='col-']") || (group && group.parentElement);
    var scope = col || group || document;
    var img = scope.querySelector(".avatar-area img, .ni-image-preview");

    if (img && img.getAttribute("src") && img.getAttribute("src").indexOf("no-image") === -1) {
      return img.getAttribute("src");
    }

    return "";
  }

  function hideOldPreview(input) {
    var group = input.closest(".form-group");
    var col = input.closest("[class*='col-']");
    var scope = col || (group && group.parentElement);
    if (!scope) return;

    scope.querySelectorAll(".height-card.box-margin:has(.avatar-area), .avatar-area").forEach(function (el) {
      if (el.classList.contains("avatar-area") && el.closest(".ni-image-input")) return;
      if (el.classList.contains("avatar-area") && el.closest(".height-card")) return;
      el.style.display = "none";
    });
  }

  function wrapInput(input) {
    if (!isImageFileInput(input)) return;

    var previewSrc = findPreviewSrc(input);
    var wrap = document.createElement("div");
    wrap.className = "ni-image-input";
    wrap.setAttribute("data-ni-image-input", "");

    var box = document.createElement("label");
    box.className = "ni-image-input__box";
    if (input.id) box.setAttribute("for", input.id);

    var preview = document.createElement("span");
    preview.className = "ni-image-input__preview";

    if (previewSrc) {
      var img = document.createElement("img");
      img.src = previewSrc;
      img.alt = "preview";
      preview.appendChild(img);
    } else {
      preview.innerHTML = '<i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>';
    }

    var meta = document.createElement("span");
    meta.className = "ni-image-input__meta";
    meta.innerHTML =
      '<span class="ni-image-input__title">Click to upload or drag & drop</span>' +
      '<span class="ni-image-input__file" data-ni-image-filename>No file chosen</span>';

    box.appendChild(preview);
    box.appendChild(meta);

    input.parentNode.insertBefore(wrap, input);
    wrap.appendChild(box);
    wrap.appendChild(input);

    if (!input.getAttribute("accept")) {
      input.setAttribute("accept", "image/svg+xml,image/jpeg,image/png,image/webp,.svg,.jpg,.jpeg,.png,.webp");
    }

    hideOldPreview(input);
    bindInput(wrap);
  }

  function setPreview(root, src, name) {
    var preview = root.querySelector(".ni-image-input__preview");
    var fileLabel = root.querySelector("[data-ni-image-filename]");

    if (preview) {
      preview.innerHTML = "";
      if (src) {
        var img = document.createElement("img");
        img.src = src;
        img.alt = "preview";
        preview.appendChild(img);
      } else {
        preview.innerHTML = '<i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>';
      }
    }

    if (fileLabel) {
      fileLabel.textContent = name || "No file chosen";
    }

    root.classList.toggle("has-file", !!src);
  }

  function bindInput(root) {
    if (root.getAttribute("data-ni-ready") === "1") return;
    root.setAttribute("data-ni-ready", "1");

    var input = root.querySelector('input[type="file"]');
    if (!input) return;

    input.addEventListener("change", function () {
      var file = input.files && input.files[0];
      if (!file) {
        setPreview(root, "", "");
        return;
      }

      var reader = new FileReader();
      reader.onload = function (event) {
        setPreview(root, event.target.result, file.name);
      };
      reader.readAsDataURL(file);
    });

    ["dragenter", "dragover"].forEach(function (type) {
      root.addEventListener(type, function (event) {
        event.preventDefault();
        root.classList.add("is-dragover");
      });
    });

    ["dragleave", "drop"].forEach(function (type) {
      root.addEventListener(type, function (event) {
        event.preventDefault();
        root.classList.remove("is-dragover");
      });
    });

    root.addEventListener("drop", function (event) {
      var files = event.dataTransfer && event.dataTransfer.files;
      if (!files || !files.length) return;
      input.files = files;
      input.dispatchEvent(new Event("change", { bubbles: true }));
    });
  }

  function initNiImageInput() {
    document.querySelectorAll('input[type="file"].form-control-file').forEach(wrapInput);
    document.querySelectorAll("[data-ni-image-input]").forEach(bindInput);
  }

  window.initNiImageInput = initNiImageInput;

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNiImageInput);
  } else {
    initNiImageInput();
  }

  window.addEventListener("ni:page-loaded", initNiImageInput);
})();
