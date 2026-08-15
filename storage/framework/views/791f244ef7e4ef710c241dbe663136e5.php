<!DOCTYPE html>
<html dir="<?php if(session()->has('language_direction_from_dropdown')): ?> <?php if(session()->get('language_direction_from_dropdown') == 1): ?> <?php echo e(__('rtl')); ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?>" lang="<?php if(session()->has('language_code_from_dropdown')): ?><?php echo e(str_replace('_', '-', session()->get('language_code_from_dropdown'))); ?><?php else: ?><?php echo e(str_replace('_', '-',   $language->language_code)); ?><?php endif; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <script>
        (function () {
            try {
                var stored = localStorage.getItem('theme');
                var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                var theme = stored || (prefersDark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme === 'dark' ? 'dark' : 'light');
                document.documentElement.classList.toggle('dark', theme === 'dark');
            } catch (e) {}
        })();
    </script>

    <!-- Favicon -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($general_site_image)): ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($general_site_image->favicon_image)): ?>
            <link href="<?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
            <link href="<?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" />
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php else: ?>

        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" />

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<!-- Fonts -->
    <link href="<?php echo e(asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/side_menu/vendor/fontawesome-free/css/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/color-picker-bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/form-picker.css')); ?>">



    <!-- Master Stylesheet CSS -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('language_direction_from_dropdown')): ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->get('language_direction_from_dropdown') == 1): ?>

            <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/version_rtl/style.css')); ?>">

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->get('language_direction_from_dropdown') == 0): ?>

            <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/style.css')); ?>">

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php elseif(isset($language)): ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($language->direction == 0): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/style.css')); ?>">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/version_rtl/style.css')); ?>">

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<!-- Light box CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/new/ekko-lightbox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/new/lightbox.min.css')); ?>">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/datatables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/default-assets/responsive.bootstrap4.css')); ?>">

    <!-- Summer note Css -->
    <link href="<?php echo e(asset('assets/admin/side_menu/css/summernote-bs4.min.css')); ?>" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/vendor/toastr/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/vendor/toastr/toastr-modern.css')); ?>">

    <style>
        /* Always keep admin sidebar expanded (no icon-only collapse) */
        .navbar-toggler[data-toggle="minimize"] {
            display: none !important;
        }

        /* Hamburger only on tablet/mobile — high specificity */
        .navbar .top-navbar-area .nav-item.ni-menu-toggle-item {
            display: none !important;
        }

        @media (max-width: 1199.98px) {
            .navbar .top-navbar-area .nav-item.ni-menu-toggle-item {
                display: flex !important;
                align-items: center !important;
            }
        }

        /* Hide empty navbar brand slot — logo lives in sidebar */
        .navbar .navbar-brand-wrapper {
            display: none !important;
        }

        /* Sidebar logo — same height as top nav */
        .ni-sidebar-brand {
            display: flex !important;
            align-items: center;
            justify-content: center;
            min-height: 52px !important;
            height: 52px !important;
            padding: 0 14px !important;
            margin: 0;
            border-bottom: 1px solid var(--ni-border, #2a2f3a);
            background: var(--ni-sidebar, #12151c);
            flex-shrink: 0;
            box-sizing: border-box;
        }

        .ni-sidebar-brand a {
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .ni-sidebar-brand img,
        .ni-sidebar-brand .admin-sidebar-logo {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            height: 52px !important;
            max-height: 52px !important;
            width: auto !important;
            max-width: 210px !important;
            object-fit: contain !important;
        }

        .navbar,
        .navbar .navbar-menu-wrapper {
            min-height: 52px !important;
            height: 52px !important;
        }

        .ni-sidebar-brand-text {
            display: none;
            color: #15bf86;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .ni-sidebar-brand.is-fallback .admin-sidebar-logo {
            display: none !important;
        }

        .ni-sidebar-brand.is-fallback .ni-sidebar-brand-text {
            display: block !important;
        }

        /* Sidebar menu — left/right inset from edges */
        .sidebar .nav:not(.sub-menu) > .nav-item {
            margin-bottom: 2px !important;
        }

        .sidebar .nav:not(.sub-menu) > .nav-item > .nav-link {
            margin: 0 14px !important;
            padding: 8px 12px !important;
            border-radius: 10px;
        }

        .sidebar .nav .nav-item .sidebar-menu-title {
            padding: 0.5rem 1.65rem 0.25rem !important;
        }

        /* Submenu — same tight gap as main items */
        .sidebar .nav.sub-menu {
            padding: 2px 12px 2px 28px !important;
            margin: 0 !important;
        }

        .sidebar .nav.sub-menu .nav-item {
            margin-bottom: 2px !important;
            background: transparent !important;
        }

        .sidebar .nav.sub-menu .nav-item .nav-link {
            padding: 7px 12px 7px 16px !important;
            line-height: 1.35 !important;
            min-height: 34px !important;
            display: flex !important;
            align-items: center !important;
            border-radius: 0 !important;
            margin: 0 0 0 8px !important;
            white-space: normal !important;
            height: auto !important;
            color: var(--ni-muted, #9ca3af) !important;
            background: transparent !important;
        }

        /* Kill indigo (#5867dd) — match green primary everywhere */
        .sidebar .nav .nav-item .nav-link .menu-title,
        .sidebar .nav .nav-item .nav-link i,
        .sidebar .nav .nav-item .nav-link i.menu-icon,
        .sidebar .nav .nav-item .nav-link i.ti-angle-right {
            color: var(--ni-muted, #9ca3af) !important;
        }

        .sidebar .nav .nav-item:hover > .nav-link,
        .sidebar .nav .nav-item.active > .nav-link,
        .sidebar .nav .nav-item:hover > .nav-link .menu-title,
        .sidebar .nav .nav-item.active > .nav-link .menu-title,
        .sidebar .nav .nav-item:hover > .nav-link i,
        .sidebar .nav .nav-item.active > .nav-link i,
        .sidebar .nav .nav-item:hover > .nav-link i.menu-icon,
        .sidebar .nav .nav-item.active > .nav-link i.menu-icon,
        .sidebar .nav .nav-item:hover > .nav-link i.ti-angle-right,
        .sidebar .nav .nav-item.active > .nav-link i.ti-angle-right,
        .sidebar .nav.sub-menu .nav-item .nav-link:hover,
        .sidebar .nav.sub-menu .nav-item .nav-link.active {
            color: #15bf86 !important;
        }

        /* Main menu soft bg only */
        .sidebar .nav:not(.sub-menu) > .nav-item:hover > .nav-link,
        .sidebar .nav:not(.sub-menu) > .nav-item.active > .nav-link {
            background: rgba(21, 191, 134, 0.16) !important;
        }

        .sidebar .nav.sub-menu .nav-item .nav-link:hover,
        .sidebar .nav.sub-menu .nav-item .nav-link.active {
            background: transparent !important;
        }

        /* Full-height sidebar — desktop only (offcanvas below xl) */
        @media (min-width: 1200px) {
            .navbar.fixed-top {
                left: 255px;
                right: 0;
                width: auto;
                padding-left: 0;
            }

            .navbar .navbar-menu-wrapper {
                width: 100% !important;
                margin-left: 0;
                border-bottom: 1px solid var(--ni-border, #e6ebef);
                box-shadow: none !important;
            }

            .sidebar-fixed .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                width: 255px;
                height: 100vh;
                max-height: 100vh;
                padding-top: 0;
                overflow: hidden;
                z-index: 1030;
                border-right: 1px solid var(--ni-border, #e6ebef);
                display: flex;
                flex-direction: column;
                transform: none !important;
            }

            .ni-sidebar-backdrop,
            .ni-sidebar-close {
                display: none !important;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu) {
                height: calc(100vh - 52px);
                max-height: calc(100vh - 52px);
                overflow-y: auto;
                overflow-x: hidden;
                margin-bottom: 0 !important;
                padding-bottom: 8px !important;
                scrollbar-gutter: stable;
                scrollbar-width: thin;
                scrollbar-color: transparent transparent;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu)::-webkit-scrollbar {
                width: 4px;
                height: 4px;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu)::-webkit-scrollbar-track {
                background: transparent;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu)::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 4px;
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu) {
                scrollbar-color: #6b7280 transparent;
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu)::-webkit-scrollbar-thumb {
                background-color: #6b7280;
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu)::-webkit-scrollbar-thumb:hover {
                background-color: #9ca3af;
            }

            .sidebar-fixed .sidebar .ps__rail-y {
                opacity: 0 !important;
                width: 4px !important;
                background: transparent !important;
            }

            .sidebar-fixed .sidebar:hover .ps__rail-y,
            .sidebar-fixed .sidebar .ps__rail-y:hover {
                opacity: 1 !important;
            }

            .sidebar-fixed .sidebar .ps__thumb-y {
                background-color: #6b7280 !important;
                width: 4px !important;
                border-radius: 4px !important;
            }

            .sidebar-fixed .main-panel {
                margin-left: 255px;
            }

            body.rtl-version .navbar.fixed-top {
                left: 0;
                right: 255px;
            }

            body.rtl-version .sidebar-fixed .sidebar {
                left: auto;
                right: 0;
                border-right: none;
                border-left: 1px solid var(--ni-border, #e6ebef);
            }

            body.rtl-version .sidebar-fixed .main-panel {
                margin-left: 0;
                margin-right: 255px;
            }
        }

    </style>

    <!-- Dark / Light Mode -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/side_menu/css/theme-mode.css')); ?>?v=51">

</head>

<body class="sidebar-fixed <?php if(session()->has('language_direction_from_dropdown')): ?> <?php if(session()->get('language_direction_from_dropdown') == 1): ?> rtl-version <?php endif; ?> <?php elseif(isset($language)): ?> <?php if($language->direction == 1): ?> rtl-version <?php endif; ?>  <?php endif; ?>">

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    <?php
        $adminLogo = optional($general_site_image ?? null)->admin_logo_image;
        $siteWhiteLogo = optional($general_site_image ?? null)->site_white_logo_image;
        $siteColoredLogo = optional($general_site_image ?? null)->site_colored_logo_image;
        $sidebarLogo = $adminLogo ?: ($siteWhiteLogo ?: ($siteColoredLogo ?: null));
        // Root-relative path so logo loads from current host (APP_URL may point at production)
        $sidebarLogoSrc = $sidebarLogo
            ? '/uploads/img/general/'.$sidebarLogo
            : '/uploads/img/dummy/white-logo.png';
    ?>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" aria-hidden="true"></div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <div class="d-flex align-items-center flex-grow-1 overflow-hidden">
                <button type="button" class="ni-top-search" id="niAdminSearchToggle" aria-label="Search menu" title="Search menu">
                    <i class="fas fa-search"></i>
                </button>
                <div class="ni-admin-search-wrap" id="niAdminSearchWrap" hidden>
                    <div class="ni-admin-search-field">
                        <input type="search" id="niAdminSearchInput" class="form-control form-control-sm" placeholder="Search menu..." autocomplete="off">
                        <button type="button" class="ni-admin-search-clear" id="niAdminSearchClear" hidden aria-label="Clear search">
                            <i class="fas fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="ni-admin-search-results" id="niAdminSearchResults" hidden></div>
                </div>
                <ul class="ni-quick-links" id="niQuickLinks">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('portfolio check')): ?>
                        <li><a href="<?php echo e(url('admin/portfolio')); ?>" class="<?php echo e(request()->is('admin/portfolio*') ? 'active' : ''); ?>"><i class="fas fa-briefcase"></i> <span><?php echo e(__('content.portfolios')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('features check')): ?>
                        <li><a href="<?php echo e(url('admin/feature/create')); ?>" class="<?php echo e(request()->is('admin/feature*') ? 'active' : ''); ?>"><i class="fas fa-star"></i> <span><?php echo e(__('content.features')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('services check')): ?>
                        <li><a href="<?php echo e(url('admin/service')); ?>" class="<?php echo e(request()->is('admin/service*') ? 'active' : ''); ?>"><i class="fas fa-people-carry"></i> <span><?php echo e(__('content.services')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs check')): ?>
                        <li><a href="<?php echo e(url('admin/blog')); ?>" class="<?php echo e(request()->is('admin/blog*') ? 'active' : ''); ?>"><i class="fab fa-blogger-b"></i> <span><?php echo e(__('content.blogs')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonials check')): ?>
                        <li><a href="<?php echo e(url('admin/testimonial/create')); ?>" class="<?php echo e(request()->is('admin/testimonial*') ? 'active' : ''); ?>"><i class="fas fa-quote-right"></i> <span><?php echo e(__('content.testimonials')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact check')): ?>
                        <li><a href="<?php echo e(url('admin/message')); ?>" class="<?php echo e(request()->is('admin/message*') ? 'active' : ''); ?>"><i class="fas fa-inbox"></i> <span><?php echo e(__('content.messages')); ?></span></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(url('/')); ?>" target="_blank"><i class="fas fa-external-link-alt"></i> <span><?php echo e(__('content.site')); ?></span></a></li>
                </ul>
            </div>
            <ul class="top-navbar-area navbar-nav navbar-nav-right">
                <li class="nav-item d-flex align-items-center">
                    <button type="button" class="admin-theme-toggle" data-theme-toggle aria-label="Toggle color mode">
                        <i class="fas fa-moon theme-icon-dark" aria-hidden="true"></i>
                        <i class="fas fa-sun theme-icon-light" aria-hidden="true"></i>
                    </button>
                </li>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($display_dropdowns) > 0): ?>
                    <?php
                        $currentLangCode = session('language_code_from_dropdown', optional($language ?? null)->language_code);
                        $langList = $display_dropdowns->values();
                        $currentLangIndex = $langList->search(function ($lang) use ($currentLangCode) {
                            return strcasecmp($lang->language_code, (string) $currentLangCode) === 0;
                        });
                        if ($currentLangIndex === false) {
                            $currentLangIndex = 0;
                        }
                        $currentLang = $langList[$currentLangIndex];
                        $nextLang = $langList[($currentLangIndex + 1) % $langList->count()];
                        $langShort = strtoupper(substr($currentLang->language_code, 0, 2));
                    ?>
                    <li class="nav-item d-flex align-items-center">
                        <a href="<?php echo e(url('language/set-locale/'.$nextLang->id)); ?>"
                           class="ni-lang-toggle"
                           title="<?php echo e(__('content.languages')); ?>: <?php echo e($currentLang->language_name); ?> → <?php echo e($nextLang->language_name); ?>"
                           aria-label="Switch language to <?php echo e($nextLang->language_name); ?>">
                            <i class="fas fa-globe" aria-hidden="true"></i>
                            <span class="ni-lang-toggle__code"><?php echo e($langShort); ?></span>
                        </a>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="far fa-envelope"></i>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($general_unread_message_count ?? 0) > 0): ?>
                            <span class="count"><?php echo e($general_unread_message_count > 99 ? '99+' : $general_unread_message_count); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list ni-notify-dropdown rounded-sm" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal dropdown-header ni-notify-header"><?php echo e(__('content.messages')); ?></p>

                        <div class="ni-notify-body">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact check')): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = ($general_unread_messages ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notifyMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <a href="<?php echo e(url('admin/message')); ?>" class="dropdown-item preview-item d-flex align-items-start ni-notify-item">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon bg-primary">
                                                <i class="fas fa-envelope mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="notification-item-content">
                                            <h6><?php echo e($notifyMessage->name ?: $notifyMessage->email); ?></h6>
                                            <p class="mb-0"><?php echo e(\Illuminate\Support\Str::limit($notifyMessage->subject ?: $notifyMessage->message, 60)); ?></p>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="dropdown-item ni-notify-empty">No new messages</div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact check')): ?>
                            <div class="ni-notify-footer">
                                <a href="<?php echo e(url('admin/message')); ?>" class="ni-notify-count">
                                    <?php echo e(__('content.messages')); ?> (<?php echo e($general_unread_message_count ?? 0); ?>)
                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($general_unread_message_count ?? 0) > 0): ?>
                                    <form action="<?php echo e(route('message.mark_all_read_update')); ?>" method="POST" class="ni-notify-mark-form">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="ni-notify-mark-btn">
                                            <?php echo e(__('content.mark_all_as_read')); ?>

                                        </button>
                                    </form>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <?php
                            $defaultAvatar = asset('uploads/img/dummy/128x128.jpg');
                            $profilePhoto = Auth::user()->profile_photo_path;
                            $profilePath = $profilePhoto ? public_path('uploads/img/profile/'.$profilePhoto) : null;
                            $profileSrc = ($profilePath && file_exists($profilePath)) ? asset('uploads/img/profile/'.$profilePhoto) : $defaultAvatar;
                        ?>
                        <img src="<?php echo e($profileSrc); ?>" class="img-profile rounded-circle" alt="profile image" onerror="this.onerror=null;this.src='<?php echo e($defaultAvatar); ?>';">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="<?php echo e(url('admin/profile/edit')); ?>" class="dropdown-item"><i class="fas fa-user profile-icon" aria-hidden="true"></i> <?php echo e(__('content.profile')); ?></a>
                        <a href="<?php echo e(url('admin/profile/change-password')); ?>" class="dropdown-item"><i class="fas fa-unlock-alt profile-icon" aria-hidden="true"></i> <?php echo e(__('content.change_password')); ?></a>

                        <!-- Authentication -->
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt profile-icon" aria-hidden="true"></i>
                            <?php echo e(__('content.logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>

                    </div>
                </li>
                <li class="nav-item align-items-center ni-menu-toggle-item">
                    <button class="navbar-toggler navbar-toggler-right ni-menu-burger" type="button" data-toggle="offcanvas" aria-label="Open menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="ni-sidebar-backdrop" id="niSidebarBackdrop" aria-hidden="true"></div>
    <div class="container-fluid page-body-wrapper">
        <!-- Side Menu area -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" aria-label="Admin menu">
            <div class="ni-sidebar-brand" id="niSidebarBrand">
                <a href="<?php echo e(url('dashboard')); ?>" title="Dashboard">
                    <img src="<?php echo e($sidebarLogoSrc); ?>" class="admin-sidebar-logo" alt="Netigian IT" width="210" height="52"
                         onerror="this.closest('.ni-sidebar-brand').classList.add('is-fallback');">
                    <span class="ni-sidebar-brand-text">Netigian IT</span>
                </a>
                <button type="button" class="ni-sidebar-close d-xl-none" data-dismiss="offcanvas" aria-label="Close menu">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <ul class="nav">
                <li class="nav-item <?php echo e((request()->is('dashboard')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('dashboard')); ?>">
                        <i class="fas fa-home menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.dashboard')); ?></span>
                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/fixed-content/create') ||
                                            request()->is('admin/slider/create') ||
                                            request()->is('admin/slider/*/edit') ||
                                            request()->is('admin/video/create') ||
                                            request()->is('admin/homepage-version/create')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#advanced" aria-expanded="false" aria-controls="advanced">
                            <i class="fas fa-desktop menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.banner')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/fixed-content/create') ||
                                                 request()->is('admin/slider/create') ||
                                                 request()->is('admin/slider/*/edit') ||
                                                 request()->is('admin/video/create') ||
                                            request()->is('admin/homepage-version/create')) ? 'show' : ''); ?>" id="advanced">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/fixed-content/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/fixed-content/create')); ?>"><?php echo e(__('content.fixed_content')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/slider/create') || request()->is('admin/slider/*/edit')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/slider/create')); ?>"><?php echo e(__('content.sliders')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/video/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/video/create')); ?>"><?php echo e(__('content.video')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/homepage-version/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/homepage-version/create')); ?>"><?php echo e(__('content.homepage_versions')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('about us check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/about/create') ||
                                         request()->is('admin/info-list/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/about/create')); ?>">
                        <i class="fas fa-building menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.about')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('features check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/feature/create') ||
                                         request()->is('admin/feature/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/feature/create')); ?>">
                        <i class="fas fa-gift menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.features')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('services check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/service') ||
                                            request()->is('admin/service/create') ||
                                            request()->is('admin/service/*/edit') ||
                                             request()->is('admin/service-detail/*/create') ||
                                            request()->is('admin/service-detail/*/*/edit') ||
                                            request()->is('admin/service-paginate/create') ||
                                            request()->is('admin/service-background-image/create')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
                            <i class="fas fa-cogs menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.services')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/service') ||
                                                  request()->is('admin/service/create') ||
                                                  request()->is('admin/service/*/edit') ||
                                                   request()->is('admin/service-detail/*/create') ||
                                            request()->is('admin/service-detail/*/*/edit') ||
                                                  request()->is('admin/service-paginate/create') ||
                                                  request()->is('admin/service-background-image/create')) ? 'show' : ''); ?>" id="services">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/service/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/service/create')); ?>"><?php echo e(__('content.add_service')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/service')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/service')); ?>"><?php echo e(__('content.services')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/service-paginate/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/service-paginate/create')); ?>"><?php echo e(__('content.service_paginate')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('counters check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/counter/create') ||
                                         request()->is('admin/counter/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/counter/create')); ?>">
                        <i class="fas fa-hourglass-start menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.counters')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('work processes check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/work-process/create') ||
                                         request()->is('admin/work-process/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/work-process/create')); ?>">
                        <i class="fas fa-pen-alt menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.work_processes')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('skill check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/skill/create') ||
                                         request()->is('admin/skill-info-list/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/skill/create')); ?>">
                        <i class="fas fa-tools menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.skill')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('portfolio check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/portfolio') ||
                                            request()->is('admin/portfolio/create') ||
                                            request()->is('admin/portfolio/*/edit') ||
                                            request()->is('admin/portfolio-category/create') ||
                                            request()->is('admin/portfolio-category/*/edit') ||
                                                  request()->is('admin/portfolio-slider/*/create') ||
                                                  request()->is('admin/portfolio-slider/*/*/edit') ||
                                                  request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#portfolios" aria-expanded="false" aria-controls="portfolios">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.portfolios')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/portfolio') ||
                                                  request()->is('admin/portfolio/create') ||
                                                  request()->is('admin/portfolio/*/edit') ||
                                                  request()->is('admin/portfolio-category/create') ||
                                                  request()->is('admin/portfolio-category/*/edit') ||
                                                  request()->is('admin/portfolio-slider/*/create') ||
                                                  request()->is('admin/portfolio-slider/*/*/edit') ||
                                                  request()->is('admin/portfolio-detail/*/create') ||
                                                  request()->is('admin/portfolio-detail/*/*/edit')) ? 'show' : ''); ?>" id="portfolios">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/portfolio-category/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/portfolio-category/create')); ?>"><?php echo e(__('content.categories')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/portfolio/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/portfolio/create')); ?>"><?php echo e(__('content.add_portfolio')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/portfolio')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/portfolio')); ?>"><?php echo e(__('content.portfolios')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teams check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/team/create') ||
                                         request()->is('admin/team/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/team/create')); ?>">
                        <i class="fas fa-user-friends menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.teams')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonials check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/testimonial/create') ||
                                         request()->is('admin/testimonial/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/testimonial/create')); ?>">
                        <i class="fas fa-quote-right menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.testimonials')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/blog') ||
                                            request()->is('admin/blog/create') ||
                                            request()->is('admin/blog/*/edit') ||
                                            request()->is('admin/category/create') ||
                                            request()->is('admin/category/*/edit') ||
                                            request()->is('admin/blog-paginate/create')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                            <i class="fab fa-blogger-b menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.blogs')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/blog') ||
                                                  request()->is('admin/blog/create') ||
                                                  request()->is('admin/blog/*/edit') ||
                                                  request()->is('admin/category/create') ||
                                                  request()->is('admin/category/*/edit') ||
                                                  request()->is('admin/blog-paginate/create')) ? 'show' : ''); ?>" id="blogs">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/category/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/category/create')); ?>"><?php echo e(__('content.categories')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/blog/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/blog/create')); ?>"><?php echo e(__('content.add_blog')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/blog')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/blog')); ?>"><?php echo e(__('content.blogs')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/blog-paginate/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/blog-paginate/create')); ?>"><?php echo e(__('content.blog_paginate')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/contact/create') ||
                                            request()->is('admin/contact/*/edit') ||
                                            request()->is('admin/message') ||
                                            request()->is('admin/quick-access/create') ||
                                            request()->is('admin/social/create') ||
                                            request()->is('admin/social/*/edit')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
                            <i class="fas fa-map-marked menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.contact')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/contact/create') ||
                                                 request()->is('admin/contact/*/edit') ||
                                                 request()->is('admin/quick-access/create') ||
                                                 request()->is('admin/message') ||
                                                 request()->is('admin/social/create') ||
                                                 request()->is('admin/social/*/edit')) ? 'show' : ''); ?>" id="contact">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/contact/create') ||
                                                                             request()->is('admin/contact/*/edit')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/contact/create')); ?>"><?php echo e(__('content.contact_info')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/social/create') ||
                                                                             request()->is('admin/social/*/edit')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/social/create')); ?>"><?php echo e(__('content.socials')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/quick-access/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/quick-access/create')); ?>"><?php echo e(__('content.quick_access_buttons')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/message')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/message')); ?>"><?php echo e(__('content.messages')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/page') ||
                                            request()->is('admin/page/create') ||
                                            request()->is('admin/page/*/edit')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('admin/page')); ?>">
                            <i class="fas fa-file-alt menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.pages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('external url check')): ?>
                <li class="nav-item  <?php echo e((request()->is('admin/external-url/create')) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(url('admin/external-url/create')); ?>">
                        <i class="fas fa-external-link-square-alt menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.external_url')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('uploads check')): ?>
                    <li class="nav-item  <?php echo e((request()->is('admin/photo/create') ||
                                             request()->is('admin/photo/*/edit')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('admin/photo/create')); ?>">
                            <i class="fas fa-cloud-upload-alt menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.uploads')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribe check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/subscribe/create')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#subscribers" aria-expanded="false" aria-controls="subscribers">
                            <i class="fas fa-at menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.subscribers')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/subscribe/create')) ? 'show' : ''); ?>" id="subscribers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/subscribe/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/subscribe/create')); ?>"><?php echo e(__('content.subscribers')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('hasrole', 'super-admin')): ?>
                <li class="nav-item <?php echo e((request()->is('admin/admin-role') ||
                                        request()->is('admin/admin-role/create') ||
                                        request()->is('admin/admin-role/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" data-toggle="collapse" href="#admin_roles" aria-expanded="false" aria-controls="admin_roles">
                        <i class="fas fa-user-lock menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.admin_role_manage')); ?></span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse <?php echo e((request()->is('admin/admin-role') ||
                                        request()->is('admin/admin-role/create') ||
                                        request()->is('admin/admin-role/*/edit')) ? 'show' : ''); ?>" id="admin_roles">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/admin-role/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/admin-role/create')); ?>"><?php echo e(__('content.add_admin_role')); ?></a></li>
                            <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/admin-role')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/admin-role')); ?>"><?php echo e(__('content.admin_roles')); ?></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?php echo e((request()->is('admin/admin-user') ||
                                        request()->is('admin/admin-user/create') ||
                                        request()->is('admin/admin-user/*/edit')) ? 'active' : ''); ?>">
                    <a class="nav-link" data-toggle="collapse" href="#admins" aria-expanded="false" aria-controls="admins">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-title"><?php echo e(__('content.admin_manage')); ?></span>
                        <i class="ti-angle-right"></i>
                    </a>
                    <div class="collapse <?php echo e((request()->is('admin/admin-user') ||
                                        request()->is('admin/admin-user/create') ||
                                        request()->is('admin/admin-user/*/edit')) ? 'show' : ''); ?>" id="admins">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/admin-user/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/admin-user/create')); ?>"><?php echo e(__('content.add_admin_user')); ?></a></li>
                            <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/admin-user')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/admin-user')); ?>"><?php echo e(__('content.all_admin')); ?></a></li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/site-info/create') ||
                                            request()->is('admin/site-image/create') ||
                                            request()->is('admin/breadcrumb/create') ||
                                            request()->is('admin/section/create') ||
                                            request()->is('admin/color-option/create') ||
                                            request()->is('admin/google-analytic/create') ||
                                            request()->is('admin/seo/create')) ? 'active' : ''); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                            <i class="fas fa-fw fa-cog menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.settings')); ?></span>
                            <i class="ti-angle-right"></i>
                        </a>
                        <div class="collapse <?php echo e((request()->is('admin/site-info/create') ||
                                                 request()->is('admin/site-image/create') ||
                                                 request()->is('admin/breadcrumb/create') ||
                                                 request()->is('admin/section/create') ||
                                                 request()->is('admin/color-option/create') ||
                                                 request()->is('admin/google-analytic/create') ||
                                                 request()->is('admin/seo/create')) ? 'show' : ''); ?>" id="settings">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/site-info/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/site-info/create')); ?>"><?php echo e(__('content.site_info')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/site-image/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/site-image/create')); ?>"><?php echo e(__('content.site_images')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/google-analytic/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/google-analytic/create')); ?>"><?php echo e(__('content.google_analytic')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/breadcrumb/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/breadcrumb/create')); ?>"><?php echo e(__('content.breadcrumb')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/section/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/section/create')); ?>"><?php echo e(__('content.sections')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/color-option/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/color-option/create')); ?>"><?php echo e(__('content.color_option')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link <?php echo e((request()->is('admin/seo/create')) ? 'active' : ''); ?>" href="<?php echo e(url('admin/seo/create')); ?>"><?php echo e(__('content.seo')); ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language check')): ?>
                    <li class="nav-item  <?php echo e((request()->is('admin/language/create') ||
                                            request()->is('admin/language/*/edit') ||
                                            request()->is('admin/language-keyword-for-adminpanel/create/*') ||
                                            request()->is('admin/language/*/edit') ||
                                            request()->is('admin/language/*/edit')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('admin/language/create')); ?>">
                            <i class="fas fa-language menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.languages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clear cache check')): ?>
                    <li class="nav-item <?php echo e((request()->is('admin/clear-cache')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('admin/clear-cache')); ?>">
                            <i class="fab fa-cloudscale menu-icon"></i>
                            <span class="menu-title"><?php echo e(__('content.optimizer')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! (trim($__env->yieldContent('hide_page_title')))): ?>
                        <?php echo $__env->make('admin.components.page-title', [
                            'pageTitle' => trim($__env->yieldContent('page_title')),
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="processedLanguageModal" tabindex="-1" role="dialog" aria-labelledby="processedLanguageModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="processedLanguageModalLabel"><?php echo e(__('content.which_language')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('language.update_processed_language')); ?>" method="POST">
                        <?php echo method_field('PATCH'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language_id"><?php echo e(__('content.languages')); ?></label>
                                    <select class="form-control" name="language_id" id="language_id" required>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang->id); ?>" <?php echo e($lang->status == 1 ? 'selected' : ''); ?>><?php echo e($lang->language_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php unset($lang); ?>
                                    </select>
                                    <small id="language_id" class="form-text text-muted"><?php echo e(__('content.reminding')); ?></small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('content.submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>


<!-- Plugins Js -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/vendor/toastr/toastr.min.js')); ?>"></script>
<script>
    if (typeof toastr !== 'undefined') {
        toastr.options = {
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            showDuration: 300,
            hideDuration: 300,
            timeOut: 4200,
            extendedTimeOut: 1600,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
    }
</script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/fullscreen.js')); ?>"></script>

<!-- Active JS -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/canvas.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/collapse.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/settings.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/template.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/active.js')); ?>" defer></script>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($galleries)): ?>
    <!-- Light box JS -->
    <script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/ekko-lightbox.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/lightbox.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/light-box-active.js')); ?>" defer></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<!-- Datatable JS -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/jquery.datatables.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/datatables.bootstrap4.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/datatable-responsive.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/responsive.bootstrap4.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/demo.datatable-init.js')); ?>" defer></script>

<!-- Datepicker JS -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/colorpicker-bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/side_menu/js/default-assets/form-picker.js')); ?>"></script>



<!-- Summer note scripts -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/summernote-bs4.min.js')); ?>"></script>
<script>
    $('#summernote').summernote({
        placeholder: '<?php echo e(__('content.description')); ?>',
        tabsize: 2,
        height: 100
    });

    // Summernote code view saving
    $('.note-codable').on('blur', function() {
        var codeviewHtml        = $(this).val();
        var $summernoteTextarea = $(this).closest('.note-editor').siblings('textarea');

        $summernoteTextarea.val(codeviewHtml);
    });

    // For type selection. enum('type', ['icon', 'image'])
    function showHideTypeDiv() {
        var optionsRadios1 = document.getElementById("optionsRadios1");
        var optionsRadios2 = document.getElementById("optionsRadios2");
        var iconType = document.getElementById("icon-type");
        var imageType = document.getElementById("image-type");
        iconType.style.display = optionsRadios1.checked ? "block" : "none";
        imageType.style.display = optionsRadios2.checked ? "block" : "none";
    }

    function copyImageLink(id) {
        var copyText = document.getElementById("copyImageLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        if (typeof toastr !== 'undefined') {
            toastr.success("<?php echo e(__('content.copied_text')); ?>" + ": " + copyText.value);
        } else {
            alert("<?php echo e(__('content.copied_text')); ?>" + ":" + copyText.value);
        }
    }

    function copyLink(id) {
        var copyText = document.getElementById("copyLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        if (typeof toastr !== 'undefined') {
            toastr.success("<?php echo e(__('content.copied_text')); ?>" + ": " + copyText.value);
        } else {
            alert("<?php echo e(__('content.copied_text')); ?>" + ":" + copyText.value);
        }
    }

    function showHideMetaTag() {
        var x = document.getElementById("meta-tag");
        $('#meta-tag').slideToggle("slow");
    }

    // Delete checked list.
    function showHideDeleteButton(source) {
        var check_all = document.getElementById("check_all");
        deleteChecked.style.display = check_all.checked ? "inline" : "none";

        checkboxes = document.getElementsByName('check_list[]');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function showHideDeleteButton2(source) {
        deleteChecked.style.display = source.checked ? "inline": "inline";
    }

    // Get checkbox list
    function btnCheckListGet() {
        //Create an Array.
        var selected = new Array();

        //Reference the CheckBoxes and insert the checked CheckBox value in Array.
        $("#basic-datatable input[type=checkbox]:checked").each(function () {
            selected.push(this.value);
        });

        //Display the selected CheckBox values.
        if (selected.length > 0) {
            selected.join(",");
        }

        return document.getElementById("checked_lists").value = selected;
    }



</script>

<!-- Custom JS -->
<script src="<?php echo e(asset('assets/admin/side_menu/js/custom.js')); ?>"></script>
<!-- Dark / Light Mode -->
<script src="<?php echo e(asset('assets/frontend/js/theme-mode.js')); ?>"></script>
<script>
(function () {
    var toggle = document.getElementById('niAdminSearchToggle');
    var wrap = document.getElementById('niAdminSearchWrap');
    var input = document.getElementById('niAdminSearchInput');
    var clearBtn = document.getElementById('niAdminSearchClear');
    var results = document.getElementById('niAdminSearchResults');
    var quickLinks = document.getElementById('niQuickLinks');
    if (!toggle || !wrap || !input || !results) return;

    var menuIndex = null;

    function closeSearch() {
        wrap.setAttribute('hidden', '');
        toggle.removeAttribute('hidden');
        if (quickLinks) quickLinks.style.display = '';
        input.value = '';
        syncClear();
        hideResults();
    }

    function openSearch() {
        wrap.removeAttribute('hidden');
        toggle.setAttribute('hidden', '');
        if (quickLinks) quickLinks.style.display = 'none';
        input.focus();
    }

    function syncClear() {
        if (!clearBtn) return;
        if (input.value.trim()) {
            clearBtn.removeAttribute('hidden');
        } else {
            clearBtn.setAttribute('hidden', '');
        }
    }

    function hideResults() {
        results.setAttribute('hidden', '');
        results.innerHTML = '';
    }

    function getMenuItems() {
        if (menuIndex) return menuIndex;
        var seen = {};
        var items = [];
        document.querySelectorAll('#sidebar .nav-link').forEach(function (link) {
            var href = (link.getAttribute('href') || '').trim();
            if (!href || href === '#' || href.charAt(0) === '#') return;
            if (seen[href]) return;
            var text = (link.textContent || '').replace(/\s+/g, ' ').trim();
            if (!text) return;
            seen[href] = true;
            var icon = link.querySelector('i');
            items.push({
                href: href,
                text: text,
                iconHtml: icon ? icon.outerHTML : '<i class="fas fa-link" aria-hidden="true"></i>'
            });
        });
        menuIndex = items;
        return items;
    }

    function renderResults(query) {
        var q = (query || '').toLowerCase().trim();
        syncClear();
        if (!q) {
            hideResults();
            return;
        }

        var matches = getMenuItems().filter(function (item) {
            return item.text.toLowerCase().indexOf(q) !== -1;
        });

        if (!matches.length) {
            results.innerHTML = '<div class="ni-admin-search-empty">No results</div>';
            results.removeAttribute('hidden');
            return;
        }

        results.innerHTML = matches.map(function (item) {
            return '<a href="' + item.href + '">' + item.iconHtml + '<span>' + item.text + '</span></a>';
        }).join('');
        results.removeAttribute('hidden');
    }

    toggle.addEventListener('click', function () {
        if (wrap.hasAttribute('hidden')) {
            openSearch();
        } else {
            closeSearch();
        }
    });

    input.addEventListener('input', function () {
        renderResults(input.value);
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeSearch();
        }
    });

    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            input.value = '';
            hideResults();
            syncClear();
            input.focus();
        });
    }

    document.addEventListener('click', function (e) {
        if (wrap.hasAttribute('hidden')) return;
        if (wrap.contains(e.target) || toggle.contains(e.target)) return;
        closeSearch();
    });
})();
</script>

<!-- Icon Picker JS -->
<script src="<?php echo e(asset('assets/admin/side_menu/vendor/fontawesome-free/js/fontawesome-iconpicker.min.js')); ?>"> </script>

</body>

</html><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>