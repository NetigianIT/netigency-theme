(function () {
  "use strict";

  var COOKIE = "ni_language_id";

  function setLanguageCookie(id) {
    var maxAge = 60 * 60 * 24 * 365;
    document.cookie = COOKIE + "=" + encodeURIComponent(String(id)) +
      "; path=/; max-age=" + maxAge + "; SameSite=Lax";
  }

  function switchLanguage(url, languageId) {
    if (languageId) {
      setLanguageCookie(languageId);
    }

    document.body.classList.add("ni-spa-loading");

    var headers = {
      "X-Requested-With": "XMLHttpRequest",
      "Accept": "application/json"
    };

    fetch(url, {
      method: "GET",
      credentials: "same-origin",
      headers: headers,
      redirect: "manual"
    }).then(function (res) {
      if (res.ok) {
        return res.json().catch(function () { return { ok: true }; });
      }
      return { ok: true };
    }).catch(function () {
      return { ok: true };
    }).then(function () {
      window.location.reload();
    });
  }

  document.addEventListener("click", function (event) {
    var link = event.target.closest("a[href*='/language/set-locale/'], a.ni-lang-toggle");
    if (!link) return;
    if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;

    var href = link.getAttribute("href");
    if (!href) return;

    var match = href.match(/\/language\/set-locale\/(\d+)/);
    var languageId = match ? match[1] : (link.getAttribute("data-language-id") || "");

    event.preventDefault();
    event.stopPropagation();
    switchLanguage(href, languageId);
  }, true);
})();
