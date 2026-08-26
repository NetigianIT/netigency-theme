/* -------------------------------------------------------------------
   All Functions                               
   ------------------------ /
 * 01.Preloader
 * 02.Header
 * 03.Counter Up
 * 04.Owl Carousel
 * 05.Background Image
 * 06.Magnific Popup
 * 07.Wow Js
 * 08.ScrollIt
 * 09.Contact Form
 * 10.Skillsbar
 * 11.My Works
 * 12.Bg Video
 * 13.Color Options
------------------------------------------------------------------- */

$( document ).ready( function() {
    // All Functions
    Filaous_PreLoader();
    Filaous_Header();
    Filaous_CounterUp();
    Filaous_Carousel();
    Filaous_BgImgPath();
    Filaous_MGFPopup();
    Filaous_WowJs();
    Filaous_ScrollIt();
    Filaous_SkillsBar();
    Filaous_MyWorks();
    Filaous_BgVideo();
    Filaous_Color_Options();
    Filaous_ClickSplash();
    Filaous_MouseTrail();
    Filaous_TechSparkles();
});

/* -------------------------------------------------------------------
 * 01.Preloader
------------------------------------------------------------------- */
function Filaous_PreLoader(){
    "use-scrict";

    // Variables
    let preloaderWrap = $( '#preloader-wrap' );
    let loaderInner = preloaderWrap.find( '.preloader-inner' );
 
    $( window ).ready(function(){
        loaderInner.fadeOut(); 
        preloaderWrap.delay(350).fadeOut( 'slow' );
    });   
}

/* -------------------------------------------------------------------
 * 02.Header
------------------------------------------------------------------- */
function Filaous_Header() {
    "use-strict";

    // Variables
    let header          = $( '.header' );
    let logoTransparent = $( '.logo-transparent' );
    let scrollTopBtn    = $( '.scroll-top-btn' );
    let scrollPhoneBtn  = $( '.scroll-phone-btn' );
    let scrollFacebookBtn  = $( '.scroll-facebook-btn' );
    let logoNormal      = $( '.logo-normal' );
    let windowWidth     = $( window ).innerWidth();
    let scrollTop       = $( window ).scrollTop();
    let $dropdown       = $( '.dropdown' );
    let $dropdownToggle = $( '.dropdown-toggle' );
    let $dropdownMenu   = $( '.dropdown-menu' );
    let showClass       = 'show';

    $( '.menu-link' ).on( 'click', function(){
        $( '#fixedNavbar' ).collapse( 'hide' );
    });

    // When Window On Scroll
    $( window ).on( 'scroll', function(){
        let scrollTop = $( this ).scrollTop();

        if( scrollTop > 85 ) {
            logoTransparent.hide();
            logoNormal.show();
            header.addClass( 'header-shrink' );
            scrollTopBtn.addClass( 'active' );
            scrollPhoneBtn.addClass( 'active' );
            scrollFacebookBtn.addClass( 'active' );
        }else {
            logoTransparent.show();
            logoNormal.hide();
            header.removeClass( 'header-shrink' );
            scrollTopBtn.removeClass( 'active' );
            scrollPhoneBtn.removeClass( 'active' );
            scrollFacebookBtn.removeClass( 'active' );
        }
    });

    // The same process is done without page scroll to prevent errors.
    if( scrollTop > 85 ) {
        logoTransparent.hide();
        logoNormal.show();
        header.addClass( 'header-shrink' );
        scrollTopBtn.addClass( 'active' );
        scrollPhoneBtn.addClass( 'active' );
        scrollFacebookBtn.addClass( 'active' );
    }else {
        logoTransparent.show();
        logoNormal.hide();
        header.removeClass( 'header-shrink' );
        scrollTopBtn.removeClass( 'active' );
        scrollPhoneBtn.removeClass( 'active' );
        scrollFacebookBtn.removeClass( 'active' );
    }

    // Window On Resize Hover Dropdown
    $( window ).on( 'resize', function() {
        let windowWidth  = $( this ).innerWidth();

        if ( windowWidth > 991 ) {
            $dropdown.hover(
                function() {
                    let hasShowClass  =  $( this ).hasClass( showClass );
                    if( hasShowClass!==true ){
                        $( this ).addClass( showClass );
                        $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                        $( this ).find( $dropdownMenu ).addClass( showClass );
                    }
                },
                function() {
                    $( this ).removeClass( showClass);
                    $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                    $( this ).find( $dropdownMenu ).removeClass( showClass );
                }
            );
        }else {
            $dropdown.off( 'mouseenter mouseleave' );
            header.find( '.main-menu' ).collapse( 'hide' );
        }
    });
    // The same process is done without page scroll to prevent errors.
    if ( windowWidth > 991 ) {
        $dropdown.hover(
            function() {
                const $this = $( this );

                var hasShowClass  = $this.hasClass( showClass );

                if( hasShowClass!==true ){
                    $this.addClass( showClass);
                    $this.find ( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                    $this.find( $dropdownMenu ).addClass( showClass );
                }
            },
            function() {
                const $this = $( this );
                $this.removeClass( showClass );
                $this.find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                $this.find( $dropdownMenu ).removeClass( showClass );
            }
        );
    }else {
        $dropdown.off( 'mouseenter mouseleave' );
    }
}

/* -------------------------------------------------------------------
 * 03.Counter Up
------------------------------------------------------------------- */
function Filaous_CounterUp() {
    "use-strict";

    // Variables
    let counterItem     = $( '.counter' );

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}

/* -------------------------------------------------------------------
 * 04.Owl Carousel
------------------------------------------------------------------- */
function Filaous_Carousel(){
    "use-strict";

    // Variables
    let blogCarousel            = $( '#blogCarousel');
    let testimonialCarousel     = $( '#testimonialCarousel');
    let portfolioCarousel       = $( '#portfolioCarousel');
    let portfolioSideCarousel   = $( '#portfolioSideCarousel');
    let blogSideCarousel        = $( '#blogSideCarousel');
    let serviceSideCarousel     = $( '#serviceSideCarousel');

    testimonialCarousel.owlCarousel({
        loop:true,
        margin:30,
        dots:false,
        nav:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            900:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });
    blogCarousel.owlCarousel({
        loop:true,
        margin:30,
        dots:false,
        nav:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    portfolioCarousel.owlCarousel({
        loop:true,
        margin:20,
        dots:false,
        nav:true,
        smartSpeed:1000,
        navText: [ "<span class='fa fa-arrow-left'></span>","<span class='fa fa-arrow-right'></span>" ],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    if (portfolioSideCarousel.length && portfolioSideCarousel.find('.item').length) {
        portfolioSideCarousel.owlCarousel({
            items: 1,
            loop: portfolioSideCarousel.find('.item').length > 1,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4200,
            smartSpeed: 550
        });
    }

    if (blogSideCarousel.length && blogSideCarousel.find('.item').length) {
        blogSideCarousel.owlCarousel({
            items: 1,
            loop: blogSideCarousel.find('.item').length > 1,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4200,
            smartSpeed: 550
        });
    }

    if (serviceSideCarousel.length && serviceSideCarousel.find('.item').length) {
        serviceSideCarousel.owlCarousel({
            items: 1,
            loop: serviceSideCarousel.find('.item').length > 1,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 4200,
            smartSpeed: 550
        });
    }
}

/* -------------------------------------------------------------------
 * 05.Background Image Path
------------------------------------------------------------------- */
function Filaous_BgImgPath(){
    "use-scrict";

    // Variables
    let dataBgItem         = $( '*[data-bg-image-path]' );

    dataBgItem.each( function() {
        let imgPath        = $( this ).attr( 'data-bg-image-path' );
        $( this).css( 'background-image', 'url(' + imgPath + ')' );
    });
}

/* -------------------------------------------------------------------
 * 06.Magnific Popup
------------------------------------------------------------------- */
function Filaous_MGFPopup(){
    "use-scrict";

    // Variables
    let youtubePopup = $( '.about-video-btn' );
    let designProcessPopup = $( '.design-process-video-btn' );

    function youtubeEmbedId(url) {
        if (!url) return null;
        var short = url.match(/youtu\.be\/([^?&#]+)/);
        if (short) return short[1];
        var watch = url.match(/[?&]v=([^&]+)/);
        if (watch) return watch[1];
        var embed = url.match(/youtube\.com\/embed\/([^?&#]+)/);
        return embed ? embed[1] : null;
    }

    youtubePopup.each(function () {
        var href = $(this).attr('href') || '';
        var id = youtubeEmbedId(href);
        if (id) {
            $(this).attr('href', 'https://www.youtube.com/watch?v=' + id);
        }
    });

    youtubePopup.magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        iframe: {
            markup: '<div class="mfp-iframe-scaler">'+
                      '<div class="mfp-close"></div>'+
                      '<iframe class="mfp-iframe" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>'+
                    '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: youtubeEmbedId,
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                },
                youtu_be: {
                    index: 'youtu.be/',
                    id: youtubeEmbedId,
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                }
            }
        }
    });
    designProcessPopup.magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
}

/* -------------------------------------------------------------------
 * 07.Wow Js
------------------------------------------------------------------- */
function Filaous_WowJs(){
    "use-scrict";

    var wow = new WOW(
            {
            boxClass:     'wow',     
            animateClass: 'animated',
            offset:       0,         
            mobile:       true,      
            live:         true       
        }
    )
    wow.init();
}

/* -------------------------------------------------------------------
 * 08.ScrollIt
------------------------------------------------------------------- */
function Filaous_ScrollIt() {
    "use-strict";

    var spyLocked = false;
    var spyTimer = null;
    var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function headerOffset() {
        var header = document.querySelector('.header');
        return header ? Math.round(header.getBoundingClientRect().height) + 12 : 96;
    }

    function setActiveNav(index) {
        document.querySelectorAll('[data-scroll-nav]').forEach(function (link) {
            link.classList.toggle('active', String(link.getAttribute('data-scroll-nav')) === String(index));
        });
    }

    function sectionByIndex(index) {
        return document.querySelector('[data-scroll-index="' + index + '"]');
    }

    function scrollToIndex(index) {
        var section = sectionByIndex(index);
        if (!section) {
            return;
        }

        if (window.jQuery) {
            window.jQuery('html, body').stop(true, false);
        }

        spyLocked = true;
        setActiveNav(index);

        var top = section.getBoundingClientRect().top + window.pageYOffset - headerOffset();
        if (top < 0) {
            top = 0;
        }

        window.scrollTo({
            top: top,
            behavior: prefersReduced ? 'auto' : 'smooth'
        });

        window.clearTimeout(spyTimer);
        spyTimer = window.setTimeout(function () {
            spyLocked = false;
        }, 900);
    }

    document.addEventListener('click', function (event) {
        var trigger = event.target.closest('[data-scroll-nav], [data-scroll-goto]');
        if (!trigger) {
            return;
        }

        event.preventDefault();
        var index = trigger.getAttribute('data-scroll-nav') || trigger.getAttribute('data-scroll-goto');
        scrollToIndex(index);
    });

    window.addEventListener('scrollend', function () {
        spyLocked = false;
    });

    var ticking = false;
    window.addEventListener('scroll', function () {
        if (spyLocked || ticking) {
            return;
        }

        ticking = true;
        window.requestAnimationFrame(function () {
            ticking = false;
            var offset = headerOffset();
            var current = null;
            document.querySelectorAll('[data-scroll-index]').forEach(function (section) {
                var rect = section.getBoundingClientRect();
                if (rect.top <= offset && rect.bottom > offset) {
                    current = section.getAttribute('data-scroll-index');
                }
            });
            if (current !== null) {
                setActiveNav(current);
            }
        });
    }, { passive: true });
}

/* -------------------------------------------------------------------
 * 10.Skills Bar
------------------------------------------------------------------- */
function Filaous_SkillsBar(){
    "use-strict";

    var skillsItem = $( '.skills-item' );
    var ringCircumference = 2 * Math.PI * 42;

    skillsItem.each(function(){
        var $value = $( this ).find( '.skills-progress-value' );
        var skillPercent = parseFloat( $value.attr( 'data-percent' ) ) || 0;

        if ( $value.is( 'circle' ) ) {
            var offset = ringCircumference * ( 1 - ( Math.min( Math.max( skillPercent, 0 ), 100 ) / 100 ) );
            $value.css({
                'stroke-dasharray': ringCircumference,
                'stroke-dashoffset': offset
            });
            return;
        }

        $value.css( 'width', skillPercent + '%' );
    });
}

/* ------------------------------------------------------------------- */
/* 11.My Works
/* ------------------------------------------------------------------- */
function Filaous_MyWorks() {
    "use-strict";

    // Variables 
    let galleryWrapper     = $( '#portfolio-masonry-wrap' );
    let portfolioFilterBtn = $( '.portfolio-filter a' );
    let portfolioGrid      = $('.portfolio-grid');

    // Portfolio Masonary Gallery
    galleryWrapper.imagesLoaded(function() {
        let grid = galleryWrapper.isotope({
            itemSelector: '.portfolio-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.portfolio-item',
            }
        });

        // filter items on button click
        portfolioFilterBtn.on( 'click', function(event) {
            let filterValue = $(this).attr( 'data-portfolio-filter' );
            grid.isotope({
                filter: filterValue
            });
            event.preventDefault();
        });
    });

    // filter items on button click
    portfolioFilterBtn.on( 'click', function(event) {
        portfolioFilterBtn.removeClass( 'current' );
        $(this).addClass( 'current' );
        event.preventDefault();
    });

    //  Portfolio Gallery Popup */
    portfolioGrid.magnificPopup({
        delegate: '.portfolio-zoom-link',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
/* -------------------------------------------------------------------
 * 12.Bg Video
------------------------------------------------------------------- */
function Filaous_BgVideo() {
    "use-strict";

    var hasVideoBg = $("#video-background").attr("data-video-bg");

    if(hasVideoBg) {
        $("#video-background").mb_YTPlayer();
    }
}
/* ------------------------------------------------------------------- */
/* 13.Color Options
/* ------------------------------------------------------------------- */
function Filaous_Color_Options(){
    "use-strict";

    var toggleLinkTag = $('#theme-color-toggle');
    var colorOptionsSidebarToggle = $('#colorOptionsSidebarToggle');
    var rtlSidebar = $('#rtlSidebar');
    var rtlToggle = $('#rtlToggle');
    var colorOptions = $('.color-options-list');
    var colorOptionsWrap = $('.color-options-wrap');
    var optionsItem = colorOptions.find('span');

    optionsItem.first().addClass("active");

    colorOptionsSidebarToggle.on("click",function(){
        colorOptionsWrap.toggleClass("active");
    });

    optionsItem.each(function(){
        var itemBgData = $(this).attr("data-bg-color");
        $(this).css('background-color', itemBgData);
    });

    optionsItem.on('click',function(){
        var bgActiveColor = $(this).css("background-color");
        var itemSrcData = $(this).attr("data-skins-css-path");
        optionsItem.removeClass("active");
        $(this).addClass("active");
        colorOptionsSidebarToggle.css("background-color",bgActiveColor);
        rtlToggle.css("background-color",bgActiveColor);
        toggleLinkTag.attr("href", itemSrcData);
    });

    var activeBgColor = optionsItem.first().css("background-color");

    rtlToggle.css("background-color", activeBgColor);

    // Rtl Toggle
    rtlToggle.on("click",function() {

        if ( colorOptionsWrap.hasClass("active")){
            colorOptionsWrap.toggleClass("active");
        }
        if($(this).text() == "RTL"){
            $(this).text("LTR").removeClass('rtl-mode').addClass("rtl-mode");
            $('body').removeClass("rtl-mode").addClass("rtl-mode");
        }else {
            rtlSidebar.removeClass("rtl-mode").addClass("ltr-mode");
            $(this).text("RTL").removeClass('rtl-mode').addClass("ltr-mode");
            $('body').removeClass("rtl-mode");
        }
    });
}

/* -------------------------------------------------------------------
 * Click splash / glass-shatter
------------------------------------------------------------------- */
function Filaous_ClickSplash() {
    "use strict";

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    var skipTags = {
        INPUT: 1,
        TEXTAREA: 1,
        SELECT: 1,
        OPTION: 1
    };
    var colors = ['#15bf86', '#23e0a3', '#8ef0d0', '#ffffff', '#0d8f63'];
    var burstCount = 0;

    document.addEventListener('pointerdown', function (event) {
        if (event.pointerType === 'mouse' && event.button !== 0) {
            return;
        }
        if (skipTags[event.target.tagName]) {
            return;
        }

        spawnBurst(event.clientX, event.clientY);
    }, { passive: true });

    function spawnBurst(x, y) {
        if (burstCount > 5) {
            return;
        }
        burstCount += 1;

        var wrap = document.createElement('div');
        wrap.className = 'ni-click-fx';
        wrap.style.left = x + 'px';
        wrap.style.top = y + 'px';

        [1, 2, 3].forEach(function (i) {
            var ring = document.createElement('span');
            ring.className = 'ni-click-fx__ring ni-click-fx__ring--' + i;
            ring.style.setProperty('--ring-scale', String(6 + i * 2.4));
            wrap.appendChild(ring);
        });

        var count = 22 + Math.floor(Math.random() * 8);
        for (var i = 0; i < count; i += 1) {
            var dot = document.createElement('span');
            var isShard = i % 3 === 0;
            var angle = (Math.PI * 2 * i) / count + (Math.random() - 0.5) * 0.5;
            var dist = 48 + Math.random() * 96;
            var dx = Math.cos(angle) * dist;
            var dy = Math.sin(angle) * dist + 36 + Math.random() * 58;
            var size = isShard ? 5 + Math.random() * 7 : 3 + Math.random() * 6;

            dot.className = 'ni-click-fx__dot' + (isShard ? ' is-shard' : '');
            dot.style.setProperty('--dx', dx.toFixed(1) + 'px');
            dot.style.setProperty('--dy', dy.toFixed(1) + 'px');
            dot.style.setProperty('--rot', (Math.random() * 520 - 260).toFixed(0) + 'deg');
            dot.style.setProperty('--size', size.toFixed(1) + 'px');
            dot.style.setProperty('--life', (620 + Math.random() * 280) + 'ms');
            dot.style.setProperty('--dot-color', colors[i % colors.length]);
            wrap.appendChild(dot);
        }

        document.body.appendChild(wrap);

        window.setTimeout(function () {
            wrap.remove();
            burstCount = Math.max(0, burstCount - 1);
        }, 980);
    }
}

/* -------------------------------------------------------------------
 * Mouse trail — tiny particles follow cursor
------------------------------------------------------------------- */
function Filaous_MouseTrail() {
    "use strict";

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    if (window.matchMedia && !window.matchMedia('(pointer: fine)').matches) {
        return;
    }

    var colors = ['#15bf86', '#23e0a3', '#8ef0d0', '#ffffff', '#0d8f63'];
    var lastX = -9999;
    var lastY = -9999;
    var active = 0;
    var maxActive = 36;
    var minDist = 12;
    var pending = false;
    var lastEvent = null;

    document.addEventListener('pointermove', function (event) {
        if (event.pointerType !== 'mouse') {
            return;
        }

        lastEvent = event;

        if (pending) {
            return;
        }

        pending = true;
        window.requestAnimationFrame(function () {
            pending = false;
            if (!lastEvent) {
                return;
            }

            var x = lastEvent.clientX;
            var y = lastEvent.clientY;
            var dx = x - lastX;
            var dy = y - lastY;
            var dist = Math.sqrt(dx * dx + dy * dy);

            if (dist < minDist) {
                return;
            }

            lastX = x;
            lastY = y;
            spawnTrail(x, y, dx, dy, dist);
        });
    }, { passive: true });

    function spawnTrail(x, y, dx, dy, dist) {
        if (active >= maxActive) {
            return;
        }

        var count = dist > 28 ? 2 : 1;

        for (var i = 0; i < count; i += 1) {
            if (active >= maxActive) {
                break;
            }

            active += 1;

            var dot = document.createElement('span');
            var size = 2 + Math.random() * 4;
            var spread = 10;
            var offsetX = (Math.random() - 0.5) * spread;
            var offsetY = (Math.random() - 0.5) * spread;
            var speed = dist || 1;
            var driftX = (dx / speed) * (6 + Math.random() * 16) + (Math.random() - 0.5) * 6;
            var driftY = (dy / speed) * (6 + Math.random() * 16) + (Math.random() - 0.5) * 6;
            var life = 420 + Math.random() * 380;

            dot.className = 'ni-cursor-trail';
            dot.style.left = (x + offsetX) + 'px';
            dot.style.top = (y + offsetY) + 'px';
            dot.style.setProperty('--size', size.toFixed(1) + 'px');
            dot.style.setProperty('--drift-x', driftX.toFixed(1) + 'px');
            dot.style.setProperty('--drift-y', driftY.toFixed(1) + 'px');
            dot.style.setProperty('--life', life.toFixed(0) + 'ms');
            dot.style.setProperty('--dot-color', colors[Math.floor(Math.random() * colors.length)]);

            document.body.appendChild(dot);

            window.setTimeout(function () {
                dot.remove();
                active = Math.max(0, active - 1);
            }, life + 40);
        }
    }
}

/* -------------------------------------------------------------------
 * Tech icons — sparkle trail while hovering / moving mouse
------------------------------------------------------------------- */
function Filaous_TechSparkles() {
    "use strict";

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    if (window.matchMedia && !window.matchMedia('(pointer: fine)').matches) {
        return;
    }

    var colors = ['#15bf86', '#23e0a3', '#8ef0d0', '#ffffff', '#0d8f63'];
    var lastX = -9999;
    var lastY = -9999;
    var active = 0;
    var maxActive = 28;
    var minDist = 10;

    $(document).on('mousemove', '#myresume .tech-item', function (event) {
        var x = event.clientX;
        var y = event.clientY;
        var dx = x - lastX;
        var dy = y - lastY;
        var dist = Math.sqrt(dx * dx + dy * dy);

        if (dist < minDist) {
            return;
        }

        lastX = x;
        lastY = y;

        var count = dist > 28 ? 3 : 2;
        for (var i = 0; i < count; i += 1) {
            if (active >= maxActive) {
                break;
            }

            active += 1;

            var spark = document.createElement('span');
            var size = 3 + Math.random() * 5;
            var offsetX = (Math.random() - 0.5) * 14;
            var offsetY = (Math.random() - 0.5) * 14;
            var driftX = (Math.random() - 0.5) * 28;
            var driftY = (Math.random() - 0.5) * 28 - 8;
            var life = 380 + Math.random() * 320;
            var isStar = i === 0 && Math.random() > 0.55;

            spark.className = 'ni-tech-spark' + (isStar ? ' is-star' : '');
            spark.style.left = (x + offsetX) + 'px';
            spark.style.top = (y + offsetY) + 'px';
            spark.style.setProperty('--size', size.toFixed(1) + 'px');
            spark.style.setProperty('--dx', driftX.toFixed(1) + 'px');
            spark.style.setProperty('--dy', driftY.toFixed(1) + 'px');
            spark.style.setProperty('--life', life.toFixed(0) + 'ms');
            spark.style.setProperty('--dot-color', colors[Math.floor(Math.random() * colors.length)]);

            document.body.appendChild(spark);

            (function (el, lifeMs) {
                window.setTimeout(function () {
                    el.remove();
                    active = Math.max(0, active - 1);
                }, lifeMs + 40);
            })(spark, life);
        }
    });

    $(document).on('mouseleave', '#myresume .tech-item', function () {
        lastX = -9999;
        lastY = -9999;
    });
}