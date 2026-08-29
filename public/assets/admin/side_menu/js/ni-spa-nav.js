(function () {
    'use strict';

    var LOADING_CLASS = 'ni-spa-loading';

    function normalizePath(path) {
        return (path || '/').replace(/\/+$/, '') || '/';
    }

    function isAdminNavLink(anchor) {
        if (!anchor || anchor.target === '_blank' || anchor.hasAttribute('download')) {
            return false;
        }

        if (anchor.hasAttribute('data-no-spa') || anchor.closest('[data-no-spa]')) {
            return false;
        }

        if (anchor.getAttribute('data-toggle') || anchor.getAttribute('data-bs-toggle')) {
            return false;
        }

        var href = anchor.getAttribute('href');
        if (!href || href.charAt(0) === '#') {
            return false;
        }

        try {
            var url = new URL(href, window.location.origin);
            if (url.origin !== window.location.origin) {
                return false;
            }

            return url.pathname === '/dashboard'
                || url.pathname.indexOf('/admin/') === 0;
        } catch (error) {
            return false;
        }
    }

    function setLoading(isLoading) {
        document.body.classList.toggle(LOADING_CLASS, isLoading);
    }

    function pathFromHref(href) {
        try {
            return normalizePath(new URL(href, window.location.origin).pathname);
        } catch (error) {
            return '';
        }
    }

    function matchScore(linkPath, current, matchPrefixes) {
        if (!linkPath || linkPath === '#') {
            return 0;
        }

        if (linkPath === current) {
            return 10000 + linkPath.length;
        }

        if (linkPath === '/dashboard') {
            return 0;
        }

        if (matchPrefixes && matchPrefixes.length) {
            for (var i = 0; i < matchPrefixes.length; i++) {
                var prefix = normalizePath(matchPrefixes[i]);
                if (!prefix) continue;
                if (current === prefix || current.indexOf(prefix + '/') === 0 || current.indexOf(prefix + '-') === 0) {
                    return 800 + prefix.length;
                }
            }
        }

        if (current.indexOf(linkPath + '/') === 0) {
            return 500 + linkPath.length;
        }

        if (linkPath.slice(-7) === '/create') {
            var base = linkPath.slice(0, -7);
            if (base && current.indexOf(base + '/') === 0) {
                return 100 + base.length;
            }
        }

        return 0;
    }

    function clearSidebarActive() {
        document.querySelectorAll('#sidebar .nav-link.active').forEach(function (link) {
            link.classList.remove('active');
        });
        document.querySelectorAll('#sidebar .nav-item.active').forEach(function (item) {
            item.classList.remove('active');
        });
        document.querySelectorAll('#sidebar .collapse.show').forEach(function (panel) {
            panel.classList.remove('show');
        });
        document.querySelectorAll('#sidebar .nav-link[data-toggle="collapse"]').forEach(function (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
        });
    }

    function updateSidebarActive(pathname) {
        var current = normalizePath(pathname);
        var best = null;

        document.querySelectorAll('#sidebar .nav-link').forEach(function (link) {
            var href = link.getAttribute('href');
            if (!href || href.charAt(0) === '#') {
                return;
            }

            var linkPath = pathFromHref(href);
            var matchAttr = link.getAttribute('data-ni-match') || '';
            var matchPrefixes = matchAttr.split(',').map(function (part) {
                return part.trim();
            }).filter(Boolean);
            var score = matchScore(linkPath, current, matchPrefixes);
            if (score > 0 && (!best || score > best.score)) {
                best = { link: link, score: score };
            }
        });

        clearSidebarActive();

        if (!best) {
            return;
        }

        best.link.classList.add('active');
        var item = best.link.closest('.nav-item');
        if (item) {
            item.classList.add('active');
        }

        var panel = best.link.closest('.collapse');
        if (panel) {
            panel.classList.add('show');
            var parentItem = panel.parentElement;
            if (parentItem && parentItem.classList.contains('nav-item')) {
                parentItem.classList.add('active');
                var toggle = parentItem.querySelector(':scope > .nav-link[data-toggle="collapse"]');
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'true');
                }
            }
        }
    }

    function updateQuickLinks(pathname) {
        var current = normalizePath(pathname);
        document.querySelectorAll('#niQuickLinks a').forEach(function (link) {
            var href = link.getAttribute('href');
            if (!href || href.charAt(0) === '#') {
                return;
            }

            var linkPath = pathFromHref(href);
            var section = linkPath.replace(/\/create$/, '');
            var isActive = current === section
                || current.indexOf(section + '/') === 0
                || current.indexOf(section + '-') === 0;
            link.classList.toggle('active', isActive);
        });
    }

    function updateActiveMenus(pathname) {
        updateSidebarActive(pathname);
        updateQuickLinks(pathname);
    }

    function reinitializePage() {
        if (typeof window.destroyNiEditor === 'function') {
            window.destroyNiEditor();
        }

        if (window.jQuery && window.jQuery.fn.DataTable) {
            window.jQuery('.dataTable').each(function () {
                if (window.jQuery.fn.DataTable.isDataTable(this)) {
                    window.jQuery(this).DataTable().destroy();
                }
            });
        }

        if (typeof window.initNiImageInput === 'function') {
            window.initNiImageInput();
        }

        if (typeof window.initNiNumberInput === 'function') {
            window.initNiNumberInput();
        }

        if (typeof window.initNiSelect === 'function') {
            window.initNiSelect();
        }

        if (typeof window.initNiIconSelect === 'function') {
            window.initNiIconSelect();
        }

        if (typeof window.initNiTextareaAuto === 'function') {
            window.initNiTextareaAuto();
        }

        if (typeof window.initNiEditor === 'function') {
            window.initNiEditor();
            if (!window.tinymce || !window.tinymce.editors || !window.tinymce.editors.length) {
                window.setTimeout(function () {
                    if (typeof window.initNiEditor === 'function') {
                        window.initNiEditor();
                    }
                }, 120);
            }
        }

        window.dispatchEvent(new CustomEvent('ni:page-loaded'));
    }

    async function navigateTo(url, pushState) {
        setLoading(true);

        try {
            var response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-NI-SPA': '1'
                },
                credentials: 'same-origin'
            });

            if (!response.ok) {
                window.location.href = url;
                return;
            }

            var html = await response.text();
            var doc = new DOMParser().parseFromString(html, 'text/html');
            var nextContent = doc.querySelector('.main-panel .content-wrapper');
            var currentContent = document.querySelector('.main-panel .content-wrapper');

            if (typeof window.destroyNiEditor === 'function') {
                window.destroyNiEditor();
            }

            if (!nextContent || !currentContent) {
                window.location.href = url;
                return;
            }

            currentContent.innerHTML = nextContent.innerHTML;

            var nextTitle = doc.querySelector('title');
            if (nextTitle) {
                document.title = nextTitle.textContent;
            }

            if (pushState) {
                history.pushState({ niSpa: true }, '', url);
            }

            updateActiveMenus(new URL(url, window.location.origin).pathname);
            window.scrollTo({ top: 0, behavior: 'smooth' });
            reinitializePage();
        } catch (error) {
            window.location.href = url;
        } finally {
            setLoading(false);
        }
    }

    document.addEventListener('click', function (event) {
        var anchor = event.target.closest('a');
        if (!isAdminNavLink(anchor)) {
            return;
        }

        if (event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
            return;
        }

        event.preventDefault();
        navigateTo(anchor.href, true);
    });

    window.addEventListener('popstate', function (event) {
        if (!event.state || !event.state.niSpa) {
            return;
        }

        navigateTo(window.location.href, false);
    });

    updateActiveMenus(window.location.pathname);
})();
