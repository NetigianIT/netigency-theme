(function () {
  var STORAGE_KEY = 'theme';

  function getStoredTheme() {
    try {
      return localStorage.getItem(STORAGE_KEY);
    } catch (e) {
      return null;
    }
  }

  function resolveTheme() {
    var stored = getStoredTheme();
    if (stored === 'dark' || stored === 'light') {
      return stored;
    }
    try {
      return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    } catch (e) {
      return 'light';
    }
  }

  function syncThemeImages() {
    var theme = document.documentElement.getAttribute('data-theme') || 'light';
    var images = document.querySelectorAll('.theme-mode-img--single');

    for (var i = 0; i < images.length; i++) {
      var img = images[i];
      var src = theme === 'dark'
        ? (img.dataset.darkSrc || img.dataset.lightSrc)
        : (img.dataset.lightSrc || img.dataset.darkSrc);

      if (src && img.getAttribute('src') !== src) {
        img.src = src;
      }
    }
  }

  function applyTheme(theme) {
    var next = theme === 'dark' ? 'dark' : 'light';
    document.documentElement.setAttribute('data-theme', next);
    document.documentElement.classList.toggle('dark', next === 'dark');
    try {
      localStorage.setItem(STORAGE_KEY, next);
    } catch (e) {}
    syncThemeImages();
    var toggles = document.querySelectorAll('[data-theme-toggle]');
    for (var i = 0; i < toggles.length; i++) {
      toggles[i].setAttribute(
        'aria-label',
        next === 'dark' ? 'Switch to light mode' : 'Switch to dark mode'
      );
    }
  }

  function toggleTheme() {
    var current = document.documentElement.getAttribute('data-theme') || resolveTheme();
    applyTheme(current === 'dark' ? 'light' : 'dark');
  }

  applyTheme(resolveTheme());

  document.addEventListener('DOMContentLoaded', function () {
    applyTheme(resolveTheme());
    var toggles = document.querySelectorAll('[data-theme-toggle]');
    for (var i = 0; i < toggles.length; i++) {
      toggles[i].addEventListener('click', function (e) {
        e.preventDefault();
        toggleTheme();
      });
    }
  });

  window.NetigianTheme = {
    apply: applyTheme,
    toggle: toggleTheme,
    current: function () {
      return document.documentElement.getAttribute('data-theme') || 'light';
    }
  };
})();
