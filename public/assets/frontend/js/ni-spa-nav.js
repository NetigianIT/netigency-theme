(function () {
    'use strict';

    var LOADING_CLASS = 'ni-spa-loading';

    function normalizePath(path) {
        return (path || '/').replace(/\/+$/, '') || '/';
    }

    function isFrontendNavLink(anchor) {
        if (!anchor || anchor.target === '_blank' || anchor.hasAttribute('download')) {
            return false;
        }

        if (anchor.hasAttribute('data-no-spa') || anchor.closest('[data-no-spa]')) {
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

            if (url.hash) {
                return false;
            }

            return url.pathname === '/'
                || url.pathname.indexOf('/services') === 0
                || url.pathname.indexOf('/service/') === 0
                || url.pathname.indexOf('/portfolio/') === 0
                || url.pathname.indexOf('/blogs') === 0
                || url.pathname.indexOf('/blog/') === 0
                || url.pathname.indexOf('/page/') === 0;
        } catch (error) {
            return false;
        }
    }

    function setLoading(isLoading) {
        document.body.classList.toggle(LOADING_CLASS, isLoading);
    }

    function reinitializePage() {
        if (window.jQuery && window.jQuery.fn.owlCarousel) {
            window.jQuery('.owl-carousel').each(function () {
                var $carousel = window.jQuery(this);
                if ($carousel.hasClass('owl-loaded')) {
                    $carousel.trigger('destroy.owl.carousel');
                    $carousel.removeClass('owl-loaded owl-hidden');
                    $carousel.find('.owl-stage-outer').children().unwrap();
                }
            });
        }

        if (typeof window.initNiSelect === 'function') {
            window.initNiSelect();
        }

        if (typeof window.WOW === 'function') {
            new window.WOW().init();
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
            var nextMain = doc.querySelector('.page-wrapper');
            var currentMain = document.querySelector('.page-wrapper');

            if (!nextMain || !currentMain) {
                window.location.href = url;
                return;
            }

            currentMain.innerHTML = nextMain.innerHTML;

            var nextTitle = doc.querySelector('title');
            if (nextTitle) {
                document.title = nextTitle.textContent;
            }

            if (pushState) {
                history.pushState({ niSpa: true }, '', url);
            }

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
        if (!isFrontendNavLink(anchor)) {
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
})();
