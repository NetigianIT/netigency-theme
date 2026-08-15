(function($) {
  'use strict';
  $(function() {
    var $sidebar = $('.sidebar-offcanvas');
    var $backdrop = $('#niSidebarBackdrop');
    var $body = $('body');

    function openSidebar() {
      $sidebar.addClass('active');
      $backdrop.addClass('is-visible');
      $body.addClass('ni-sidebar-open');
    }

    function closeSidebar() {
      $sidebar.removeClass('active');
      $backdrop.removeClass('is-visible');
      $body.removeClass('ni-sidebar-open');
    }

    function toggleSidebar() {
      if ($sidebar.hasClass('active')) {
        closeSidebar();
      } else {
        openSidebar();
      }
    }

    $('[data-toggle="offcanvas"]').on('click', function(e) {
      e.preventDefault();
      toggleSidebar();
    });

    $(document).on('click', '[data-dismiss="offcanvas"]', function(e) {
      e.preventDefault();
      closeSidebar();
    });

    $backdrop.on('click', function() {
      closeSidebar();
    });

    $(document).on('keydown', function(e) {
      if (e.key === 'Escape' && $sidebar.hasClass('active')) {
        closeSidebar();
      }
    });

    // Close after navigating within the drawer (not collapse toggles)
    $sidebar.on('click', 'a.nav-link[href]:not([data-toggle="collapse"]):not([href="#"])', function() {
      if (window.matchMedia('(max-width: 1199px)').matches) {
        closeSidebar();
      }
    });
  });
})(jQuery);
