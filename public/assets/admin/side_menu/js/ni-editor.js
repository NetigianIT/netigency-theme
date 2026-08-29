(function () {
  "use strict";

  var SELECTOR = "#summernote, textarea.ni-editor";
  var TINYMCE_BASE = "https://cdn.jsdelivr.net/npm/tinymce@7.6.1";

  function isDark() {
    return document.documentElement.getAttribute("data-theme") === "dark";
  }

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute("content") : "";
  }

  function uploadUrl() {
    return window.NI_EDITOR_UPLOAD_URL || "/admin/editor/upload";
  }

  function uploadFile(file) {
    return new Promise(function (resolve, reject) {
      var formData = new FormData();
      formData.append("file", file, file.name || "upload");

      fetch(uploadUrl(), {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken(),
          "X-Requested-With": "XMLHttpRequest",
          Accept: "application/json"
        },
        credentials: "same-origin",
        body: formData
      })
        .then(function (response) {
          return response.json().then(function (json) {
            if (!response.ok || !json.location) {
              reject(json.message || json.error || "Upload failed");
              return;
            }
            resolve(json.location);
          });
        })
        .catch(function () {
          reject("Upload failed");
        });
    });
  }

  function destroyEditors() {
    if (!window.tinymce) return;
    window.tinymce.remove(SELECTOR);
  }

  function bindSaveOnSubmit() {
    if (document.documentElement.getAttribute("data-ni-editor-submit") === "1") return;
    document.documentElement.setAttribute("data-ni-editor-submit", "1");

    document.addEventListener(
      "submit",
      function () {
        if (window.tinymce) {
          window.tinymce.triggerSave();
        }
      },
      true
    );
  }

  function initNiEditor() {
    if (!window.tinymce) return;

    bindSaveOnSubmit();
    destroyEditors();

    if (!document.querySelector(SELECTOR)) return;

    window.tinymce.init({
      selector: SELECTOR,
      license_key: "gpl",
      base_url: TINYMCE_BASE,
      suffix: ".min",
      menubar: "file edit view insert format tools table help",
      plugins:
        "advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount codesample emoticons quickbars visualchars nonbreaking",
      toolbar:
        "undo redo | blocks fontsize | bold italic underline strikethrough | " +
        "forecolor backcolor | alignleft aligncenter alignright alignjustify | " +
        "bullist numlist outdent indent | link image media table codesample emoticons | " +
        "removeformat | code preview fullscreen",
      toolbar_mode: "sliding",
      quickbars_selection_toolbar: "bold italic underline | quicklink h2 h3 blockquote",
      quickbars_insert_toolbar: "quickimage quicktable",
      contextmenu: "link image table",
      height: 420,
      min_height: 320,
      branding: false,
      promotion: false,
      resize: true,
      image_title: true,
      image_caption: true,
      image_advtab: true,
      automatic_uploads: true,
      file_picker_types: "image media",
      paste_data_images: true,
      relative_urls: false,
      convert_urls: false,
      skin: isDark() ? "oxide-dark" : "oxide",
      content_css: isDark() ? "dark" : "default",
      content_style:
        "body { font-family: Inter, system-ui, -apple-system, Segoe UI, sans-serif; font-size: 15px; line-height: 1.7; padding: 12px 16px; }" +
        (isDark()
          ? " body { background: #171a21; color: #f3f4f6; }"
          : " body { background: #fff; color: #111827; }") +
        " img { max-width: 100%; height: auto; } table { border-collapse: collapse; width: 100%; } td, th { border: 1px solid #d1d5db; padding: 8px; }",
      images_upload_handler: function (blobInfo) {
        return uploadFile(blobInfo.blob());
      },
      file_picker_callback: function (callback, value, meta) {
        var input = document.createElement("input");
        input.type = "file";
        input.accept = meta.filetype === "image" ? "image/*" : "video/*,audio/*";
        input.onchange = function () {
          var file = input.files[0];
          if (!file) return;
          uploadFile(file)
            .then(function (url) {
              callback(url, { title: file.name });
            })
            .catch(function (error) {
              window.alert(error);
            });
        };
        input.click();
      },
      setup: function (editor) {
        editor.on("PreInit", function () {
          try {
            var win = editor.getWin && editor.getWin();
            if (win && typeof window.__niPatchTrustedHtml === "function") {
              window.__niPatchTrustedHtml(win);
            }
          } catch (e) {}
        });
        editor.on("init", function () {
          var el = editor.getElement();
          if (el) {
            el.removeAttribute("required");
          }
          try {
            var win = editor.getWin && editor.getWin();
            if (win && typeof window.__niPatchTrustedHtml === "function") {
              window.__niPatchTrustedHtml(win);
            }
          } catch (e) {}
        });
        editor.on("change keyup", function () {
          editor.save();
        });
      }
    });
  }

  window.initNiEditor = initNiEditor;
  window.destroyNiEditor = destroyEditors;

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNiEditor);
  } else {
    initNiEditor();
  }

  var observer = new MutationObserver(function () {
    if (!window.tinymce || !window.tinymce.editors || !window.tinymce.editors.length) return;
    var skin = isDark() ? "oxide-dark" : "oxide";
    if (window.__niEditorSkin === skin) return;
    window.__niEditorSkin = skin;
    initNiEditor();
  });

  observer.observe(document.documentElement, { attributes: true, attributeFilter: ["data-theme"] });
  window.__niEditorSkin = isDark() ? "oxide-dark" : "oxide";
})();
