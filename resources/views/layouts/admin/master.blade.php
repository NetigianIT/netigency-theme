@php
    $isAdminFragment = request()->boolean('admin_fragment') || request()->header('X-Admin-Fragment') === '1';
@endphp
@if ($isAdminFragment)
    @include('admin.alert.alert')
    @unless(trim($__env->yieldContent('hide_page_title')))
        @include('admin.components.page-title', [
            'pageTitle' => trim($__env->yieldContent('page_title')),
            'pageTabs' => trim($__env->yieldContent('page_tabs')),
            'pageActions' => trim($__env->yieldContent('page_actions')),
        ])
    @endunless
    @yield('content')
@else
<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <!-- Required meta tags -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $adminPath = request()->path();
        $isAdminDashboard = request()->routeIs('dashboard');
        $needsAdminEditor = true;
        $needsAdminTables = true;
        $needsAdminPickers = ! $isAdminDashboard && (str_contains($adminPath, 'create') || str_contains($adminPath, 'edit'));
        $needsAdminLightbox = isset($galleries);
        $adminIsRtl = session()->has('language_direction_from_dropdown')
            ? session()->get('language_direction_from_dropdown') == 1
            : (isset($language) && $language->direction == 1);
        $adminStyleHref = $adminIsRtl
            ? asset('assets/admin/side_menu/version_rtl/style.css')
            : asset('assets/admin/side_menu/style.css');
    @endphp

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    @if(isset($general_site_image))

        @if (!empty($general_site_image->favicon_image))
            <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
            <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
        @endif

    @else

        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />

    @endif

    <link rel="preload" href="{{ $adminStyleHref }}" as="style">
    <link rel="preload" href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>

<!-- Fonts -->
    <link href="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    @if ($needsAdminPickers)
        {!! deferred_css(asset('assets/admin/side_menu/vendor/fontawesome-free/css/fontawesome-iconpicker.min.css')) !!}
        {!! deferred_css(asset('assets/admin/side_menu/css/bootstrap-datepicker.min.css')) !!}
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/color-picker-bootstrap.css')) !!}
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/form-picker.css')) !!}
    @endif

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ $adminStyleHref }}">

    @if ($needsAdminLightbox)
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/new/ekko-lightbox.min.css')) !!}
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/new/lightbox.min.css')) !!}
    @endif

    @if ($needsAdminTables)
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/datatables.bootstrap4.css')) !!}
        {!! deferred_css(asset('assets/admin/side_menu/css/default-assets/responsive.bootstrap4.css')) !!}
    @endif

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/vendor/toastr/toastr-modern.css') }}?v=3">

    <style>
        /* Always keep admin sidebar expanded (no icon-only collapse) */
        .navbar-toggler[data-toggle="minimize"] {
            display: none !important;
        }

        /* Hamburger only on tablet/mobile â€” high specificity */
        .navbar .top-navbar-area .nav-item.ni-menu-toggle-item {
            display: none !important;
        }

        @media (max-width: 1199.98px) {
            .navbar .top-navbar-area .nav-item.ni-menu-toggle-item {
                display: flex !important;
                align-items: center !important;
            }
        }

        /* Hide empty navbar brand slot â€” logo lives in sidebar */
        .navbar .navbar-brand-wrapper {
            display: none !important;
        }

        /* Sidebar logo â€” same height as top nav */
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

        /* Sidebar menu â€” left/right inset from edges */
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

        /* Submenu â€” same tight gap as main items */
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

        /* Kill indigo (#5867dd) â€” match green primary everywhere */
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

        /* Full-height sidebar â€” desktop only (offcanvas below xl) */
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
                width: 6px;
                height: 6px;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu)::-webkit-scrollbar-track {
                background: transparent;
            }

            .sidebar-fixed .sidebar .nav:not(.sub-menu)::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 8px;
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu) {
                scrollbar-color: rgba(107, 114, 128, 0.45) transparent;
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu)::-webkit-scrollbar-thumb {
                background-color: rgba(107, 114, 128, 0.45);
            }

            .sidebar-fixed .sidebar:hover .nav:not(.sub-menu)::-webkit-scrollbar-thumb:hover {
                background-color: rgba(107, 114, 128, 0.7);
            }

            .sidebar-fixed .sidebar .ps__rail-y {
                opacity: 0 !important;
                width: 6px !important;
                background: transparent !important;
                transition: opacity 0.2s ease;
            }

            .sidebar-fixed .sidebar:hover .ps__rail-y,
            .sidebar-fixed .sidebar .ps__rail-y:hover {
                opacity: 1 !important;
            }

            .sidebar-fixed .sidebar .ps__thumb-y {
                background-color: rgba(107, 114, 128, 0.45) !important;
                width: 6px !important;
                border-radius: 8px !important;
            }

            .sidebar-fixed .sidebar .ps__rail-y:hover > .ps__thumb-y,
            .sidebar-fixed .sidebar .ps__thumb-y:hover {
                background-color: rgba(107, 114, 128, 0.7) !important;
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
    <link rel="stylesheet" href="{{ asset('assets/admin/side_menu/css/theme-mode.css') }}?v=121">

</head>

<body class="sidebar-fixed @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) rtl-version @endif @elseif (isset($language)) @if ($language->direction == 1) rtl-version @endif  @endif">

<!-- ======================================
******* Main Page Wrapper **********
======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    @php
        $adminLogo = optional($general_site_image ?? null)->admin_logo_image;
        $siteWhiteLogo = optional($general_site_image ?? null)->site_white_logo_image;
        $siteColoredLogo = optional($general_site_image ?? null)->site_colored_logo_image;
        $sidebarLogo = $adminLogo ?: ($siteWhiteLogo ?: ($siteColoredLogo ?: null));
        // Root-relative path so logo loads from current host (APP_URL may point at production)
        $sidebarLogoSrc = $sidebarLogo
            ? '/uploads/img/general/'.$sidebarLogo
            : '/uploads/img/dummy/white-logo.png';
    @endphp
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" aria-hidden="true"></div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" aria-label="Toggle sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <div class="d-flex align-items-center flex-grow-1 overflow-hidden">
                <div class="ni-admin-search-wrap" id="niAdminSearchWrap">
                    <div class="ni-admin-search-field">
                        <i class="fas fa-search ni-admin-search-icon" aria-hidden="true"></i>
                        <input type="search" id="niAdminSearchInput" class="form-control" placeholder="Search menu..." autocomplete="off">
                        <button type="button" class="ni-admin-search-clear" id="niAdminSearchClear" hidden aria-label="Clear search">
                            <i class="fas fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="ni-admin-search-results" id="niAdminSearchResults" hidden></div>
                </div>
            </div>
            <ul class="top-navbar-area navbar-nav navbar-nav-right">
                <li class="nav-item d-flex align-items-center">
                    <button type="button" class="admin-theme-toggle" data-theme-toggle aria-label="Toggle color mode">
                        <i class="fas fa-moon theme-icon-dark" aria-hidden="true"></i>
                        <i class="fas fa-sun theme-icon-light" aria-hidden="true"></i>
                    </button>
                </li>

                @if (count($display_dropdowns) > 0)
                    @php
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
                    @endphp
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ url('language/set-locale/'.$nextLang->id) }}"
                           class="ni-lang-toggle"
                           data-language-id="{{ $nextLang->id }}"
                           title="{{ __('content.languages') }}: {{ $currentLang->language_name }} â†’ {{ $nextLang->language_name }}"
                           aria-label="Switch language to {{ $nextLang->language_name }}">
                            <i class="fas fa-globe" aria-hidden="true"></i>
                            <span class="ni-lang-toggle__code">{{ $langShort }}</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="{{ url('admin/message') }}" data-toggle="dropdown" aria-label="Messages" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-envelope"></i>
                        @if (($general_unread_message_count ?? 0) > 0)
                            <span class="count">{{ $general_unread_message_count > 99 ? '99+' : $general_unread_message_count }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list ni-notify-dropdown rounded-sm" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal dropdown-header ni-notify-header">{{ __('content.messages') }}</p>

                        <div class="ni-notify-body">
                            @can('contact check')
                                @forelse (($general_recent_messages ?? collect()) as $notifyMessage)
                                    <a href="{{ url('admin/message') }}" class="dropdown-item preview-item d-flex align-items-start ni-notify-item {{ (int) $notifyMessage->read === 0 ? 'is-unread' : '' }}">
                                        <div class="notification-thumbnail">
                                            <div class="preview-icon bg-primary">
                                                <i class="fas fa-envelope mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="notification-item-content">
                                            <h6>{{ $notifyMessage->name ?: $notifyMessage->email }}</h6>
                                            <p class="mb-0">{{ \Illuminate\Support\Str::limit($notifyMessage->subject ?: $notifyMessage->message, 60) }}</p>
                                        </div>
                                    </a>
                                @empty
                                    <div class="dropdown-item ni-notify-empty">No messages</div>
                                @endforelse
                            @endcan
                        </div>

                        @can('contact check')
                            <div class="ni-notify-footer">
                                <a href="{{ url('admin/message') }}" class="ni-notify-count">
                                    {{ __('content.messages') }} ({{ $general_unread_message_count ?? 0 }})
                                </a>
                                @if (($general_unread_message_count ?? 0) > 0)
                                    <form action="{{ route('message.mark_all_read_update') }}" method="POST" class="ni-notify-mark-form">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="ni-notify-mark-btn">
                                            {{ __('content.mark_all_as_read') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endcan
                    </div>
                </li>

                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="{{ url('admin/profile/edit') }}" data-toggle="dropdown" id="profileDropdown" aria-label="Account menu" aria-haspopup="true" aria-expanded="false">
                        @php
                            $defaultAvatar = asset('uploads/img/dummy/128x128.jpg');
                            $profilePhoto = Auth::user()->profile_photo_path;
                            $profilePath = $profilePhoto ? public_path('uploads/img/profile/'.$profilePhoto) : null;
                            $profileSrc = ($profilePath && file_exists($profilePath)) ? asset('uploads/img/profile/'.$profilePhoto) : $defaultAvatar;
                        @endphp
                        <img src="{{ $profileSrc }}" class="img-profile rounded-circle" alt="{{ Auth::user()->name }} profile photo" width="40" height="40" data-fallback="{{ $defaultAvatar }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="{{ url('admin/profile/edit') }}" class="dropdown-item"><i class="fas fa-user profile-icon" aria-hidden="true"></i> {{ __('content.profile') }}</a>
                        <a href="{{ url('admin/profile/change-password') }}" class="dropdown-item"><i class="fas fa-unlock-alt profile-icon" aria-hidden="true"></i> {{ __('content.change_password') }}</a>

                        <!-- Authentication -->
                        <a class="dropdown-item" href="{{ route('logout') }}" data-logout>
                            <i class="fas fa-sign-out-alt profile-icon" aria-hidden="true"></i>
                            {{ __('content.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                            @csrf
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
                <a href="{{ url('dashboard') }}" title="Dashboard">
                    <img src="{{ $sidebarLogoSrc }}" class="admin-sidebar-logo" alt="Netigian IT" width="210" height="52"
                         data-fallback-class="is-fallback">
                    <span class="ni-sidebar-brand-text">Netigian IT</span>
                </a>
                <button type="button" class="ni-sidebar-close d-xl-none" data-dismiss="offcanvas" aria-label="Close menu">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <ul class="nav">
                <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <i class="fas fa-home menu-icon"></i>
                        <span class="menu-title">{{ __('content.dashboard') }}</span>
                    </a>
                </li>
                @can('banner check')
                    <li class="nav-item {{ (request()->is('admin/fixed-content/create')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/fixed-content/create') }}">
                            <i class="fas fa-image menu-icon"></i>
                            <span class="menu-title">{{ __('content.hero_section') }}</span>
                        </a>
                    </li>
                @endcan
                @can('about us check')
                <li class="nav-item  {{ (request()->is('admin/about/create') ||
                                         request()->is('admin/info-list/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/about/create') }}">
                        <i class="fas fa-building menu-icon"></i>
                        <span class="menu-title">{{ __('content.about') }}</span>
                    </a>
                </li>
                @endcan
                @can('features check')
                <li class="nav-item  {{ request()->is('admin/feature*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('feature.index') }}">
                        <i class="fas fa-gift menu-icon"></i>
                        <span class="menu-title">{{ __('content.features') }}</span>
                    </a>
                </li>
                @endcan
                @can('services check')
                    <li class="nav-item {{ (request()->is('admin/service*') || request()->is('admin/service-detail*') || request()->is('admin/service-paginate*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/service') }}">
                            <i class="fas fa-cogs menu-icon"></i>
                            <span class="menu-title">{{ __('content.services') }}</span>
                        </a>
                    </li>
                @endcan
                @can('counters check')
                <li class="nav-item  {{ (request()->is('admin/counter/create') ||
                                         request()->is('admin/counter/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/counter/create') }}">
                        <i class="fas fa-hourglass-start menu-icon"></i>
                        <span class="menu-title">{{ __('content.counters') }}</span>
                    </a>
                </li>
                @endcan
                @can('work processes check')
                <li class="nav-item  {{ (request()->is('admin/work-process/create') ||
                                         request()->is('admin/work-process/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/work-process/create') }}">
                        <i class="fas fa-project-diagram menu-icon"></i>
                        <span class="menu-title">{{ __('content.work_processes') }}</span>
                    </a>
                </li>
                @endcan
                @can('skill check')
                <li class="nav-item  {{ (request()->is('admin/skill/*') ||
                                         request()->is('admin/skill-info-list') ||
                                         request()->is('admin/skill-info-list/*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('skill.create') }}">
                        <i class="fas fa-code menu-icon"></i>
                        <span class="menu-title">{{ __('content.skill') }}</span>
                    </a>
                </li>
                @endcan
                @can('portfolio check')
                    <li class="nav-item {{ (request()->is('admin/portfolio*') || request()->is('admin/portfolio-category*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/portfolio') }}" data-ni-match="/admin/portfolio,/admin/portfolio-category,/admin/portfolio-slider,/admin/portfolio-detail">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span class="menu-title">{{ __('content.portfolios') }}</span>
                        </a>
                    </li>
                @endcan
                @can('teams check')
                <li class="nav-item {{ request()->is('admin/team*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('team.index') }}" data-ni-match="/admin/team">
                        <i class="fas fa-user-friends menu-icon"></i>
                        <span class="menu-title">{{ __('content.teams') }}</span>
                    </a>
                </li>
                @endcan
                @can('testimonials check')
                <li class="nav-item  {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('testimonial.index') }}">
                        <i class="fas fa-quote-right menu-icon"></i>
                        <span class="menu-title">{{ __('content.testimonials') }}</span>
                    </a>
                </li>
                @endcan
                @can('blogs check')
                    <li class="nav-item {{ (request()->is('admin/blog*') || request()->is('admin/category*') || request()->is('admin/blog-paginate*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/blog') }}" data-ni-match="/admin/blog,/admin/category,/admin/blog-paginate">
                            <i class="fab fa-blogger-b menu-icon"></i>
                            <span class="menu-title">{{ __('content.blogs') }}</span>
                        </a>
                    </li>
                @endcan
                @can('videos check')
                    <li class="nav-item {{ (request()->is('admin/video-item*') || request()->is('admin/video-category*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/video-item') }}" data-ni-match="/admin/video-item,/admin/video-category">
                            <i class="fas fa-video menu-icon"></i>
                            <span class="menu-title">{{ __('content.videos') }}</span>
                        </a>
                    </li>
                @endcan
                @can('contact check')
                    <li class="nav-item {{ (request()->is('admin/contact/create') ||
                                            request()->is('admin/contact/*/edit') ||
                                            request()->is('admin/message') ||
                                            request()->is('admin/quick-access/create') ||
                                            request()->is('admin/social') ||
                                            request()->is('admin/social/create') ||
                                            request()->is('admin/social/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/contact/create') }}" data-ni-match="/admin/contact,/admin/social,/admin/quick-access,/admin/message">
                            <i class="fas fa-map-marked menu-icon"></i>
                            <span class="menu-title">{{ __('content.contact') }}</span>
                        </a>
                    </li>
                @endcan

                @can('pages check')
                    <li class="nav-item {{ (request()->is('admin/page') ||
                                            request()->is('admin/page/create') ||
                                            request()->is('admin/page/*/edit')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/page') }}">
                            <i class="fas fa-file-alt menu-icon"></i>
                            <span class="menu-title">{{ __('content.pages') }}</span>
                        </a>
                    </li>
                @endcan

                @hasrole ('super-admin')
                <li class="nav-item {{ (request()->is('admin/admin-role') ||
                                        request()->is('admin/admin-role/create') ||
                                        request()->is('admin/admin-role/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/admin-role') }}">
                        <i class="fas fa-user-lock menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_role_manage') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('admin/admin-user') ||
                                        request()->is('admin/admin-user/create') ||
                                        request()->is('admin/admin-user/*/edit')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/admin-user') }}">
                        <i class="fas fa-users menu-icon"></i>
                        <span class="menu-title">{{ __('content.admin_manage') }}</span>
                    </a>
                </li>
                @endhasrole
                @can('settings check')
                    <li class="nav-item {{ (request()->is('admin/site-info/create') ||
                                            request()->is('admin/site-image/create') ||
                                            request()->is('admin/google-analytic/create') ||
                                            request()->is('admin/seo/create') ||
                                            request()->is('admin/hero-particles/create')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/site-info/create') }}" data-ni-match="/admin/site-info,/admin/site-image,/admin/google-analytic,/admin/seo,/admin/hero-particles">
                            <i class="fas fa-fw fa-cog menu-icon"></i>
                            <span class="menu-title">{{ __('content.settings') }}</span>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    @unless(trim($__env->yieldContent('hide_page_title')))
                        @include('admin.components.page-title', [
                            'pageTitle' => trim($__env->yieldContent('page_title')),
                            'pageTabs' => trim($__env->yieldContent('page_tabs')),
                            'pageActions' => trim($__env->yieldContent('page_actions')),
                        ])
                    @endunless
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Plugins Js -->
<script src="{{ asset('assets/admin/side_menu/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/vendor/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/bundle.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/fullscreen.js') }}"></script>
<script src="{{ asset('assets/admin/side_menu/js/canvas.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/collapse.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/settings.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/template.js') }}" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/default-assets/active.js') }}" defer></script>

@if ($needsAdminLightbox)
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/ekko-lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/lightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/light-box-active.js') }}" defer></script>
@endif

@if ($needsAdminTables)
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/jquery.datatables.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/datatables.bootstrap4.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/datatable-responsive.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/responsive.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/demo.datatable-init.js') }}?v=17" defer></script>
@endif

@if ($needsAdminPickers)
    <script src="{{ asset('assets/admin/side_menu/js/bootstrap-colorpicker.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/colorpicker-bootstrap.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/default-assets/form-picker.js') }}" defer></script>
@endif

@if ($needsAdminEditor)
    <script src="https://cdn.jsdelivr.net/npm/tinymce@7.6.1/tinymce.min.js" referrerpolicy="origin" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/ni-editor.js') }}?v=7" defer></script>
@endif

<script>
    window.NI_EDITOR_UPLOAD_URL = "{{ route('admin.editor.upload') }}";
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof toastr !== 'undefined') {
            toastr.options = {
                closeButton: true,
                newestOnTop: true,
                progressBar: false,
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
        if (window.jQuery) {
            window.jQuery(document).on('show.bs.modal', '.modal', function () {
                if (this.parentNode !== document.body) {
                    document.body.appendChild(this);
                }
            });
        }
    });
    function showHideTypeDiv() {
        var optionsRadios1 = document.getElementById("optionsRadios1");
        var optionsRadios2 = document.getElementById("optionsRadios2");
        var iconType = document.getElementById("icon-type");
        var imageType = document.getElementById("image-type");
        if (!optionsRadios1 || !optionsRadios2 || !iconType || !imageType) return;
        iconType.style.display = optionsRadios1.checked ? "block" : "none";
        imageType.style.display = optionsRadios2.checked ? "block" : "none";
    }

    function copyImageLink(id) {
        var copyText = document.getElementById("copyImageLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        if (typeof toastr !== 'undefined') {
            toastr.success("{{ __('content.copied_text') }}" + ": " + copyText.value, "{{ __('Success') }}");
        } else {
            alert("{{ __('content.copied_text') }}" + ":" + copyText.value);
        }
    }

    function copyLink(id) {
        var copyText = document.getElementById("copyLink"+id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        if (typeof toastr !== 'undefined') {
            toastr.success("{{ __('content.copied_text') }}" + ": " + copyText.value, "{{ __('Success') }}");
        } else {
            alert("{{ __('content.copied_text') }}" + ":" + copyText.value);
        }
    }

    function showHideMetaTag() {
        var x = document.getElementById("meta-tag");
        $('#meta-tag').slideToggle("slow");
    }

    // Delete checked list.
    function syncBulkDeleteButton() {
        var btn = document.getElementById("deleteChecked");
        if (!btn) return;

        var checkboxes = document.getElementsByName("check_list[]");
        var anyChecked = false;
        var allChecked = checkboxes.length > 0;
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked) {
                anyChecked = true;
            } else {
                allChecked = false;
            }
        }

        btn.classList.toggle("is-visible", anyChecked);
        btn.style.display = anyChecked ? "inline-flex" : "none";

        var checkAll = document.getElementById("check_all");
        if (checkAll) {
            checkAll.checked = allChecked;
        }
    }

    function showHideDeleteButton(source) {
        var checkboxes = document.getElementsByName("check_list[]");
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
        syncBulkDeleteButton();
    }

    function showHideDeleteButton2(source) {
        syncBulkDeleteButton();
    }

    function collectCheckedListIds() {
        var selected = [];
        var seen = {};
        var nodes = document.querySelectorAll("input[name='check_list[]']:checked");
        for (var i = 0; i < nodes.length; i++) {
            var value = (nodes[i].value || "").trim();
            if (!value || seen[value]) continue;
            seen[value] = true;
            selected.push(value);
        }
        return selected;
    }

    // Get checkbox list (must return comma-separated string for Laravel)
    function btnCheckListGet() {
        var selected = collectCheckedListIds();
        var field = document.getElementById("checked_lists");
        if (!field) {
            return false;
        }
        field.value = selected.join(",");
        return selected.length > 0;
    }

    window.syncBulkDeleteButton = syncBulkDeleteButton;
    window.showHideDeleteButton = showHideDeleteButton;
    window.showHideDeleteButton2 = showHideDeleteButton2;
    window.btnCheckListGet = btnCheckListGet;
    window.collectCheckedListIds = collectCheckedListIds;

    // Reliable bulk-delete submit (works even when inline handlers are skipped)
    document.addEventListener("submit", function (event) {
        var form = event.target;
        if (!form || form.tagName !== "FORM") return;
        var field = form.querySelector("#checked_lists, input[name='checked_lists']");
        if (!field) return;

        var selected = collectCheckedListIds();
        field.value = selected.join(",");
        if (!selected.length) {
            event.preventDefault();
            event.stopPropagation();
        }
    }, true);

    function setDeleteConfirmLoading(btn) {
        if (!btn || btn.dataset.niLoading === "1") return;
        btn.dataset.niLoading = "1";
        btn.disabled = true;
        btn.classList.add("is-loading");
        btn.setAttribute("aria-busy", "true");
        if (!btn.dataset.niOriginalHtml) {
            btn.dataset.niOriginalHtml = btn.innerHTML;
        }
        btn.innerHTML = '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>';
    }

    function findDeleteModalFromForm(form, submitter) {
        if (submitter) {
            var fromSubmitter = submitter.closest(".modal");
            if (fromSubmitter) return fromSubmitter;
        }
        var nested = form.querySelector('.modal[id*="delete"], .modal[id*="Delete"]');
        if (nested) return nested;
        return form.closest(".modal");
    }

    // Spinner on "Yes, delete it!" then toast shows after redirect (session flash)
    document.addEventListener("submit", function (event) {
        var form = event.target;
        if (!form || form.tagName !== "FORM" || event.defaultPrevented) return;

        var modal = findDeleteModalFromForm(form, event.submitter);
        if (!modal) return;
        var modalId = (modal.id || "").toLowerCase();
        if (modalId.indexOf("delete") === -1) return;

        var field = form.querySelector("#checked_lists, input[name='checked_lists']");
        if (field && !collectCheckedListIds().length) return;

        var btn = event.submitter;
        if (!btn || btn.type !== "submit") {
            btn = form.querySelector('button[type="submit"].btn-success') ||
                modal.querySelector('button[type="submit"].btn-success');
        }
        setDeleteConfirmLoading(btn);
    }, true);

</script>

<!-- Custom JS -->
<script src="{{ asset('assets/admin/side_menu/js/custom.js') }}?v=5"></script>
<script src="{{ asset('assets/frontend/js/theme-mode.js') }}"></script>
<script src="{{ asset('assets/frontend/js/language-switch.js') }}?v=1" defer></script>
<script>
(function () {
    var wrap = document.getElementById('niAdminSearchWrap');
    var input = document.getElementById('niAdminSearchInput');
    var clearBtn = document.getElementById('niAdminSearchClear');
    var results = document.getElementById('niAdminSearchResults');
    if (!wrap || !input || !results) return;

    var menuIndex = null;

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

    input.addEventListener('input', function () {
        renderResults(input.value);
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            input.value = '';
            hideResults();
            syncClear();
            input.blur();
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
        if (wrap.contains(e.target)) return;
        hideResults();
    });
})();
</script>

<!-- Icon Picker JS -->
@if ($needsAdminPickers)
    <script src="{{ asset('assets/admin/side_menu/vendor/fontawesome-free/js/fontawesome-iconpicker.min.js') }}" defer></script>
@endif
<script src="{{ asset('assets/admin/side_menu/js/ni-image-input.js') }}?v=1" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/ni-number-input.js') }}?v=1" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/ni-icon-select.js') }}?v=1" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/ni-select.js') }}?v=4" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/ni-switch.js') }}?v=2" defer></script>
<script src="{{ asset('assets/admin/side_menu/js/ni-textarea-auto.js') }}?v=1" defer></script>
    <script src="{{ asset('assets/admin/side_menu/js/ni-spa-nav.js') }}?v=8" defer></script>

</body>

</html>
@endif

