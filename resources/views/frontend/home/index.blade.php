<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)){{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="Netigian IT">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
@else
    <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

    <!--// Boostrap  //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/animate.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font_awesome/css/all.css') }}">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flat_icons/flaticon.css') }}">
    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--// Theme Color Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/default-color.css') }}" id="theme-color-toggle" />

    <!--// Color Option Css //-->
@isset ($color_option)

        @if ($color_option->color_option == 1)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/blue-color.css') }}">
        @elseif ($color_option->color_option == 2)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/red-color.css') }}">
        @elseif ($color_option->color_option == 3)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/yellow-color.css') }}">
        @elseif ($color_option->color_option == 4)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/green-color.css') }}">
        @elseif ($color_option->color_option == 5)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/pink-color.css') }}">
        @elseif ($color_option->color_option == 6)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/turquose-color.css') }}">
        @elseif ($color_option->color_option == 7)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/purple-color.css') }}">
        @elseif ($color_option->color_option == 8)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/blue-color-2.css') }}">
        @elseif ($color_option->color_option == 9)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/orange-color.css') }}">
        @elseif ($color_option->color_option == 10)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/magenta-color.css') }}">
        @elseif ($color_option->color_option == 11)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/orange-color-2.css') }}">
        @endif

    @endisset

    <!--// Dark / Light Mode //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-mode.css') }}?v=103">
    <style>
        .hero-social-list{display:none!important}
        .contact-form-wrap{
            padding:0!important;
            border-radius:0!important;
            background:transparent!important;
            box-shadow:none!important;
        }
        @media (max-width:767.98px){
            .contact-form-wrap{padding:0!important}
        }
        .contact-form-wrap .contact-form-group .form-control,
        .contact-form-wrap .contact-form-group .form-control:focus{
            background:var(--ni-glass)!important;
            background-color:transparent!important;
            border:1px solid var(--ni-glass-border, rgba(21,191,134,.28))!important;
            box-shadow:var(--ni-glass-shadow)!important;
            backdrop-filter:blur(18px) saturate(140%);
            -webkit-backdrop-filter:blur(18px) saturate(140%);
            height:auto!important;
            min-height:58px!important;
            padding:16px 20px!important;
            line-height:1.5!important;
            box-sizing:border-box!important;
            border-radius:20px!important;
            color:var(--ni-text,#f3f4f6)!important;
        }
        .contact-form-wrap .contact-form-group .form-control:focus{
            border-color:rgba(21,191,134,.5)!important;
        }
        .contact-form-wrap .contact-form-group textarea.form-control,
        .contact-form-wrap .contact-form-group textarea.form-control:focus{
            min-height:156px!important;
            padding:18px 20px!important;
            resize:vertical!important;
            border-radius:20px!important;
        }
        html[data-theme="light"] .contact-form-wrap .contact-form-group .form-control,
        html[data-theme="light"] .contact-form-wrap .contact-form-group .form-control:focus{
            color:var(--ni-text,#111827)!important;
            border-color:var(--ni-glass-border, rgba(21,191,134,.28))!important;
        }
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:hover,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:focus,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:active,
        .contact-form-wrap .contact-form-group input.form-control:autofill{
            -webkit-text-fill-color:var(--ni-text,#f3f4f6)!important;
            caret-color:var(--ni-text,#f3f4f6);
            border:1px solid var(--ni-glass-border, rgba(21,191,134,.28))!important;
            transition:background-color 99999s ease-in-out 0s,color 99999s ease-in-out 0s;
            -webkit-box-shadow:0 0 0 1000px rgba(7,12,10,.28) inset!important;
            box-shadow:0 0 0 1000px rgba(7,12,10,.28) inset!important;
            background:var(--ni-glass)!important;
            background-color:transparent!important;
        }
        html[data-theme="light"] .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill,
        html[data-theme="light"] .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:hover,
        html[data-theme="light"] .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:focus,
        html[data-theme="light"] .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:active,
        html[data-theme="light"] .contact-form-wrap .contact-form-group input.form-control:autofill{
            -webkit-text-fill-color:var(--ni-text,#111827)!important;
            caret-color:var(--ni-text,#111827);
            -webkit-box-shadow:0 0 0 1000px rgba(255,255,255,.08) inset!important;
            box-shadow:0 0 0 1000px rgba(255,255,255,.08) inset!important;
        }
        .contact-section .contact-btn-left{
            width:100%!important;
            text-align:left!important;
        }
        .contact-section .contact-btn-left .primary-btn{
            width:100%!important;
            display:flex!important;
            justify-content:space-between!important;
            border-radius:20px!important;
            background:var(--ni-glass)!important;
            border:1px solid var(--ni-glass-border, rgba(21,191,134,.28))!important;
            box-shadow:var(--ni-glass-shadow)!important;
            backdrop-filter:blur(18px) saturate(140%);
            -webkit-backdrop-filter:blur(18px) saturate(140%);
        }
        .contact-section .contact-btn-left .primary-btn .text{
            padding-left:24px!important;
        }
        .contact-section .contact-btn-left .primary-btn .icon{
            padding:4px 16px 4px 20px!important;
            border:none!important;
            background:transparent!important;
            box-shadow:none!important;
            position:relative!important;
        }
        .contact-section .contact-btn-left .primary-btn .icon::before{
            content:"";
            position:absolute;
            left:0;
            top:10px;
            bottom:10px;
            width:1px;
            background:linear-gradient(180deg, transparent 0%, rgba(21,191,134,.85) 50%, transparent 100%);
        }
        .contact-section .contact-btn-left .primary-btn .icon i{
            width:42px!important;
            height:42px!important;
            border-radius:0!important;
            font-size:0!important;
            background:linear-gradient(135deg, rgba(35,224,163,.12) 0%, #15bf86 52%, rgba(142,240,208,.9) 100%)!important;
            -webkit-mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 11h11.17l-3.58-3.59L13 6l6 6-6 6-1.41-1.41L15.17 13H4v-2z'/%3E%3C/svg%3E") center / 18px 18px no-repeat;
            mask:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M4 11h11.17l-3.58-3.59L13 6l6 6-6 6-1.41-1.41L15.17 13H4v-2z'/%3E%3C/svg%3E") center / 18px 18px no-repeat;
            -webkit-background-clip:unset!important;
            background-clip:unset!important;
        }
        .contact-section .contact-btn-left .primary-btn .icon i::before,
        .contact-section .contact-btn-left .primary-btn .icon i::after{
            display:none!important;
        }
        .contact-section .contact-btn-left .primary-btn:hover{
            background:var(--ni-glass-hover)!important;
            transform:none!important;
        }
        .contact-section .contact-btn-left .primary-btn:hover .icon{
            background:transparent!important;
        }
        .contact-section .contact-btn-left .primary-btn:hover .icon i{
            background:linear-gradient(135deg, rgba(35,224,163,.28) 0%, #23e0a3 50%, #ffffff 100%)!important;
        }
        .contact-section .contact-btn-left .primary-btn,
        .contact-section .contact-btn-left .primary-btn:hover,
        .contact-section .contact-btn-left .primary-btn:disabled,
        .contact-section .contact-btn-left .primary-btn .icon,
        .contact-section .contact-btn-left .primary-btn .text{
            cursor:pointer!important;
        }
        .contact-section .contact-btn-left .primary-btn.is-loading .icon i{
            display:none!important;
        }
        .contact-section .contact-btn-left .primary-btn .contact-btn-spinner{
            width:22px;
            height:22px;
            border:2px solid rgba(21,191,134,.25);
            border-top-color:#15bf86;
            border-radius:50%;
            display:none;
            animation:ni-contact-spin .7s linear infinite;
            flex-shrink:0;
        }
        .contact-section .contact-btn-left .primary-btn.is-loading .contact-btn-spinner{
            display:block;
        }
        @keyframes ni-contact-spin{
            to{transform:rotate(360deg)}
        }
        .contact-field-error{
            display:none;
            margin-top:8px;
            padding:0 4px;
            font-size:13px;
            line-height:1.4;
            color:#ff6b6b;
        }
        .contact-field-error.is-visible{display:block}
        .contact-form-group .form-control.is-invalid,
        .contact-form-group .form-control.is-invalid:focus{
            border-color:rgba(255,107,107,.7)!important;
        }
        .contact-form-status{
            display:none;
            margin-top:12px;
            font-size:14px;
            line-height:1.4;
        }
        .contact-form-status.is-visible{display:block}
        .contact-form-status.is-success{color:#15bf86}
        .contact-form-status.is-error{color:#ff6b6b}
        .counters-section-bg{display:none!important}
        /* Taller nav; bigger logo inside the same bar height */
        .header,.header-shrink{padding:0!important}
        .header .navbar{min-height:84px!important;height:84px!important;align-items:center!important;padding-top:4px!important;padding-bottom:4px!important}
        .header .nav-item .nav-link,.header-shrink .nav-item .nav-link{padding:10px 10px!important;line-height:28px!important;white-space:nowrap}
        .header .navbar-brand{padding:0!important;margin:0!important;line-height:1!important;display:flex!important;align-items:center!important}
        .header .navbar-brand img{height:76px!important;max-height:76px!important;width:auto!important;max-width:none!important;object-fit:contain}
        @media (max-width:991.98px){.header .navbar{min-height:64px!important;height:64px!important;padding-top:4px!important;padding-bottom:4px!important}.header .navbar-brand img{height:56px!important;max-height:56px!important}}
        .header .navbar-brand img.logo-normal{display:none!important}
        .header .navbar-brand img.logo-transparent{display:block!important}
    </style>

@if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body data-spy="scroll" data-target="#fixedNavbar" @if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif @elseif (isset($language)) @if ($language->direction == 1) class="rtl-mode" @endif  @endif >

<!--// Page Wrapper Start //-->
<div class="page-wrapper" id="wrapper">

    <!--// Header Start //-->
    <header class="header fixed-top" id="header">
        <div id="nav-menu-wrap">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    @if (!empty($general_site_image->site_colored_logo_image))
                        <a class="navbar-brand" title="Home" href="{{ url('/') }}">
                            <img src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    @else
                        <a class="navbar-brand" title="Home" href="#">
                            <img src="{{ asset('uploads/img/dummy/white-logo.png') }}" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="{{ asset('uploads/img/dummy/colored-logo.png') }}" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar"
                            aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                    </button>
                    <div class="collapse navbar-collapse main-menu" id="fixedNavbar">
                        <ul class="navbar-nav header-nav-center">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="1">{{ __('frontend.home') }}</a>
                            </li>
                            @if ($section_arr['about_us_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="2">{{ __('frontend.about_us') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['service_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="3">{{ __('frontend.services') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['skill_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="5">{{ __('frontend.technology') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['portfolio_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="4">{{ __('frontend.portfolio') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['blog_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="6">{{ __('frontend.blogs') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['contact_section'] == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="7">{{ __('frontend.contact') }}</a>
                            </li>
                            @endif
                            @if ($section_arr['page_menu'] == 1)
                                @foreach (($header_pages ?? []) as $header_page)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link {{ request()->routeIs('any-page.show') && request()->route('page_slug') === $header_page->page_slug ? 'active' : '' }}" href="{{ route('any-page.show', ['page_slug' => $header_page->page_slug]) }}">{{ $header_page->page_title }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="navbar-nav header-nav-right">
                            @if (count($display_dropdowns) > 0)
                                @php
                                    $currentLangCode = session()->has('language_code_from_dropdown')
                                        ? session()->get('language_code_from_dropdown')
                                        : ($language->language_code ?? '');
                                @endphp
                                <li class="nav-item d-flex align-items-center header-lang-item">
                                    <div class="lang-toggle" role="group" aria-label="Language">
                                        @foreach ($display_dropdowns as $display_dropdown)
                                            @php
                                                $langShort = strtoupper(explode('_', str_replace('-', '_', $display_dropdown->language_code))[0]);
                                                $isActiveLang = strcasecmp($display_dropdown->language_code, $currentLangCode) === 0;
                                            @endphp
                                            <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}"
                                               class="lang-toggle-btn{{ $isActiveLang ? ' active' : '' }}"
                                               @if ($isActiveLang) aria-current="true" @endif
                                               title="{{ $display_dropdown->language_name }}">{{ $langShort }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item d-flex align-items-center header-theme-item">
                                <button type="button" class="theme-mode-toggle" data-theme-toggle aria-label="Toggle color mode">
                                    <i class="fas fa-moon theme-icon-dark" aria-hidden="true"></i>
                                    <i class="fas fa-sun theme-icon-light" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--// Header End  //-->

    <!--// Main Area Start //-->
    <main class="main-area">

        <!--// Hero Section Start //-->
        @isset ($fixed_content)
            <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                <div id="heroparticles"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                            <div class="hero-inner">
                                <h1>{{ $fixed_content->title }}</h1>
                                <h2>{{ $fixed_content->desc }}</h2>
                                @if (!empty($fixed_content->btn_name))
                                    <a href="#porfolio" data-scroll-nav="4" class="white-btn">
                                        <span class="text">{{ $fixed_content->btn_name }}</span>
                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if ($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image))
                            <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                <div class="hero-img">
                                    <div class="border-line-outer">
                                        <div class="border-line-inner">
                                            <img src="{{ asset('uploads/img/general/'.$fixed_content->thumbnail_image) }}" alt="image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if (count($socials) > 0)
                    <ul class="hero-social-list">
                        @foreach ($socials as $social)
                            <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i class="{{ $social->social_media }}"></i></a></li>
                        @endforeach
                    </ul>
                @endif
                <a href="#" data-scroll-nav="2" class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
            </section>
        @else
            <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                <div id="heroparticles"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                            <div class="hero-inner">
                                <h1>
                                    We Build Modern Web Products.
                                </h1>
                                <h2>
                                    Custom websites, ecommerce platforms, CRM, HRM, POS, and business software — engineered with Laravel, Vue.js, PHP, Node.js, and React.
                                </h2>
                                <a href="#porfolio" data-scroll-nav="4" class="white-btn">
                                    <span class="text">View Works</span>
                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                            <div class="hero-img">
                                <div class="border-line-outer">
                                    <div class="border-line-inner">
                                        <img src="{{ asset('uploads/img/general/demo-hero.png') }}" title="HovyLee phone image" alt="HovyLee phone image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="hero-social-list">
                    <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                </ul>
                <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
            </section>
        @endisset
        <!--// Hero Section End //-->

        <!--// About Section Start //-->
        @if ($section_arr['about_us_section'] == 1)
        @if (isset($about))
            <section class="section about-section" id="about" data-scroll-index="2">
                <div class="container">
                    <x-frontend.section-title
                        :title="$about->section_title ?: __('frontend.about_us')"
                        col-class="col-12"
                        heading-class="about-section-heading"
                        :dots="true" />
                    <div class="row about-row align-items-stretch">
                        <div class="col-lg-6 about-media-col">
                            <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                <img src="{{ asset('uploads/img/about/'.$about->about_image) }}" alt="About image" title="About image" class="img-fluid">
                                @if (!empty($about->video_link))
                                    <a class="about-video-btn" href="{{ $about->video_link }}" aria-label="Play demo video">
                                        <span class="about-video-btn__ring" aria-hidden="true"></span>
                                        <span class="about-video-btn__icon" aria-hidden="true"></span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 about-content-col">
                            <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                <h2>{{ $about->title }}</h2>
                                <p>{{ $about->desc }}</p>
                                <div class="row about-info-grid">
                                    @foreach ($info_lists->chunk((int) max(1, ceil($info_lists->count() / 2))) as $info_list)
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mb-resp-15">
                                                @foreach ($info_list as $item)
                                                    <li class="about-info-item">
                                                        <div class="text">
                                                            <h5>{{ $item->title }}</h5>
                                                            <p>{{ $item->desc }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="section about-section" id="about" data-scroll-index="2">
                <div class="container">
                    <x-frontend.section-title
                        :title="__('frontend.about_us')"
                        col-class="col-12"
                        heading-class="about-section-heading"
                        :dots="true" />
                    <div class="row about-row align-items-stretch">
                        <div class="col-lg-6 about-media-col">
                            <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                <img src="{{ asset('uploads/img/about/demo-about.png') }}" alt="About image" title="About image" class="img-fluid">
                                <a class="about-video-btn" href="https://www.youtube.com/watch?v=YqQx75OPRa0" aria-label="Play demo video">
                                    <span class="about-video-btn__ring" aria-hidden="true"></span>
                                    <span class="about-video-btn__icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 about-content-col">
                            <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                <h2>We craft scalable web solutions with 5+ years of experience</h2>
                                <p>
                                    We design and develop custom websites, ecommerce stores, CRM, HRM, POS, and business platforms with clean code, modern UI, and reliable performance.
                                </p>
                                <div class="row about-info-grid">
                                    <div class="col-md-6 col-sm-6">
                                        <ul class="mb-resp-15">
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Company Name :</h5>
                                                    <p>Netigian IT</p>
                                                </div>
                                            </li>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Country :</h5>
                                                    <p>United States</p>
                                                </div>
                                            </li>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Freelance :</h5>
                                                    <p>Available</p>
                                                </div>
                                            </li>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Email :</h5>
                                                    <p>contact@netigianit.com</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <ul>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Services :</h5>
                                                    <p>Ecommerce, Portfolio, Agency, CRM, HRM, POS</p>
                                                </div>
                                            </li>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Languages :</h5>
                                                    <p>English, Deutch, Arabic</p>
                                                </div>
                                            </li>
                                            <li class="about-info-item">
                                                <div class="text">
                                                    <h5>Address :</h5>
                                                    <p>Etowah, TN 37331 United States</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// About Section End //-->

        <!--// Resume Section Start //-->
        @if ($section_arr['feature_section'] == 1)
        @if (isset($feature_section) || count($features) > 0)
            <section class="section pb-minus-76 bg-primary-light" id="myresume">
                <div class="container">
                   @isset ($feature_section)
                        <x-frontend.section-title
                            :title="$feature_section->title"
                            :subtitle="$feature_section->section_title"
                            :dots="true" />
                       @endisset
                    <div class="row tech-grid tech-grid--main">
                        @foreach (($main_features ?? $features) as $feature)
                            <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->index }}s">
                                <div class="resume-item resume-item--main">
                                    <div class="body">
                                        <x-frontend.tech-icon
                                            :title="$feature->title"
                                            :type="$feature->type"
                                            :icon="$feature->icon"
                                            :feature-image="$feature->feature_image"
                                            size="main" />
                                        <div class="text">
                                            <h5>{{ $feature->title }}</h5>
                                            @if (!empty($feature->desc)) <span>{{ $feature->desc }}</span> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if (isset($sub_features) && count($sub_features) > 0)
                        <div class="tech-sub-stack">
                            <p class="tech-sub-stack__label">Supporting Stack</p>
                            <div class="row tech-grid tech-grid--sub">
                                @foreach ($sub_features as $feature)
                                    <div class="tech-sub-col wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.{{ min($loop->index, 5) }}s">
                                        <div class="resume-item resume-item--sub">
                                            <div class="body">
                                                <x-frontend.tech-icon
                                                    :title="$feature->title"
                                                    :type="$feature->type"
                                                    :icon="$feature->icon"
                                                    :feature-image="$feature->feature_image"
                                                    size="sub" />
                                                <div class="text">
                                                    <h5>{{ $feature->title }}</h5>
                                                    @if (!empty($feature->desc)) <span>{{ $feature->desc }}</span> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        @else
            <section class="section pb-minus-76 bg-primary-light" id="myresume">
                <div class="container">
                    <x-frontend.section-title
                        title="Our Features"
                        subtitle="Features"
                        :dots="true" />
                    <div class="row tech-grid tech-grid--main">
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="Laravel" type="icon" size="main" />
                                    <div class="text">
                                        <h5>Laravel</h5>
                                        <span>Secure Laravel backends, admin panels, and business web apps built for scalability and maintainability.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="Vue.js" type="icon" size="main" />
                                    <div class="text">
                                        <h5>Vue.js</h5>
                                        <span>Fast Vue.js frontends with reusable components, smooth interactions, and clean interface architecture.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.3s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="PHP" type="icon" size="main" />
                                    <div class="text">
                                        <h5>PHP</h5>
                                        <span>Custom PHP development for websites, APIs, and server-side logic with stable, production-ready code.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="Node.js" type="icon" size="main" />
                                    <div class="text">
                                        <h5>Node.js</h5>
                                        <span>Node.js APIs and real-time services for modern full-stack web products and integrations.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="MySQL" type="icon" size="main" />
                                    <div class="text">
                                        <h5>MySQL</h5>
                                        <span>Optimized MySQL database design for secure storage, efficient queries, and scalable web applications.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.6s">
                            <div class="resume-item resume-item--main">
                                <div class="body">
                                    <x-frontend.tech-icon title="React.js" type="icon" size="main" />
                                    <div class="text">
                                        <h5>React.js</h5>
                                        <span>React.js dashboards and web interfaces with modular components, responsive layouts, and smooth user flows.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tech-sub-stack">
                        <p class="tech-sub-stack__label">Supporting Stack</p>
                        <div class="row tech-grid tech-grid--sub">
                            @php
                                $demoSubFeatures = [
                                    ['title' => 'Redis', 'desc' => 'In-memory caching and queues for faster APIs and real-time performance.'],
                                    ['title' => 'CI/CD', 'desc' => 'Automated testing and deployment pipelines for stable releases.'],
                                    ['title' => 'Deploy', 'desc' => 'Cloud and VPS deployment with Docker and zero-downtime strategy.'],
                                    ['title' => 'Cursor', 'desc' => 'AI-assisted development workflow for faster coding and debugging.'],
                                    ['title' => 'PrimeVue', 'desc' => 'Vue UI component library for dashboards, forms, and rich admin interfaces.'],
                                    ['title' => 'PrimeReact', 'desc' => 'React UI component library for production-ready dashboards and app layouts.'],
                                    ['title' => 'Next.js', 'desc' => 'React framework for SSR, routing, and scalable production frontends.'],
                                    ['title' => 'Zustand', 'desc' => 'Lightweight React state management with a simple, scalable store API.'],
                                    ['title' => 'Redux', 'desc' => 'Predictable React state container for complex application data flows.'],
                                    ['title' => 'Pinia', 'desc' => 'Modern Vue store for typed, modular, and maintainable state.'],
                                ];
                            @endphp
                            @foreach ($demoSubFeatures as $demoFeature)
                                <div class="tech-sub-col wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.{{ min($loop->index, 5) }}s">
                                    <div class="resume-item resume-item--sub">
                                        <div class="body">
                                            <x-frontend.tech-icon :title="$demoFeature['title']" type="icon" size="sub" />
                                            <div class="text"><h5>{{ $demoFeature['title'] }}</h5><span>{{ $demoFeature['desc'] }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Resume Section End //-->

        <!--// Services Section Start //-->
        @if ($section_arr['service_section'] == 1)
        @if (isset($service_section) || count($services) > 0)
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                   @isset ($service_section)
                        <x-frontend.section-title
                            :title="$service_section->title"
                            :subtitle="$service_section->section_title"
                            align="center"
                            :dots="true" />
                       @endisset
                    <div class="row services-grid">
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->index }}s">
                                <div class="services-item">
                                    <div class="services-item-media">
                                        <x-frontend.service-card-icon
                                            :title="$service->title"
                                            :icon="$service->icon"
                                            :image="$service->service_image"
                                            :use-image="$service->image_status === 'enable'" />
                                    </div>
                                    <div class="body">
                                        <h5>{{ $service->title }}</h5>
                                        @if (!empty($service->short_desc)) <p>{{ $service->short_desc }}</p> @endif
                                        <a href="{{ route('service-page.show', ['service_slug' => $service->service_slug]) }}">{{ __('frontend.read_more') }} <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       </div>
                </div>
            </section>
        @else
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                    <x-frontend.section-title
                        title="Our Services"
                        subtitle="Services"
                        align="center"
                        :dots="true" />
                    <div class="row services-grid">
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="Ecommerce" icon="fas fa-shopping-cart" image="demo-service-01.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>Ecommerce</h5>
                                    <p>Scalable online stores with product management, secure checkout, and conversion-focused shopping experiences.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="Portfolio" icon="fas fa-briefcase" image="demo-service-02.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>Portfolio</h5>
                                    <p>Modern portfolio websites designed to showcase your projects, skills, and personal brand beautifully.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="Agency" icon="fas fa-building" image="demo-service-03.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>Agency</h5>
                                    <p>Professional agency websites that present your services, team, and case studies with a strong digital presence.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="CRM" icon="fas fa-users" image="demo-service-04.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>CRM</h5>
                                    <p>Custom CRM systems to manage leads, customers, sales pipelines, and business relationships in one place.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="HRM" icon="fas fa-user-tie" image="demo-service-05.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>HRM</h5>
                                    <p>HRM platforms for attendance, payroll, recruitment, and employee management with streamlined workflows.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="services-item-media">
                                    <x-frontend.service-card-icon title="POS" icon="fas fa-cash-register" image="demo-service-06.png" :use-image="true" />
                                </div>
                                <div class="body">
                                    <h5>POS</h5>
                                    <p>Point of sale systems for billing, inventory, sales tracking, and smooth in-store or retail operations.</p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Services Section End //-->

        <!--// Counter Section Start //-->
        @if ($section_arr['counter_section'] == 1)
        @if (isset($counter_section) || count($counters) > 0)
            <section class="section counters-section pb-minus-70" id="counters">
                <div class="counters-section-bg" aria-hidden="true"></div>
                <div class="container">
                    @isset ($counter_section)
                        <x-frontend.section-title
                            :title="$counter_section->title"
                            align="center"
                            light="true"
                            col-class="col-lg-8"
                            heading-class="counters-heading"
                            :dots="true" />
                    @endisset
                    <div class="row justify-content-center counters-grid">
                        @foreach ($counters as $counter)
                            @php
                                $counterTitle = strtolower($counter->title ?? '');
                                $counterIcon = 'fas fa-chart-line';
                                if (str_contains($counterTitle, 'client') || str_contains($counterTitle, 'customer')) {
                                    $counterIcon = 'fas fa-users';
                                } elseif (str_contains($counterTitle, 'project')) {
                                    $counterIcon = 'fas fa-check-circle';
                                } elseif (str_contains($counterTitle, 'coffee')) {
                                    $counterIcon = 'fas fa-mug-hot';
                                } elseif (str_contains($counterTitle, 'award') || str_contains($counterTitle, 'win')) {
                                    $counterIcon = 'fas fa-trophy';
                                } elseif (str_contains($counterTitle, 'year') || str_contains($counterTitle, 'experience')) {
                                    $counterIcon = 'fas fa-briefcase';
                                }
                            @endphp
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.{{ $loop->index + 1 }}s">
                                <div class="counter-item">
                                    <div class="counter-item-icon"><i class="{{ $counterIcon }}" aria-hidden="true"></i></div>
                                    <div class="counter-item-value">
                                        <h3 class="counter">{{ $counter->timer }}</h3>
                                        <span class="counter-suffix">+</span>
                                    </div>
                                    <p>{{ $counter->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section counters-section pb-minus-70" id="counters">
                <div class="counters-section-bg" aria-hidden="true"></div>
                <div class="container">
                    <x-frontend.section-title
                        title="More than 10,000 customers trusted me"
                        align="center"
                        light="true"
                        col-class="col-lg-8"
                        heading-class="counters-heading"
                        :dots="true" />
                    <div class="row justify-content-center counters-grid">
                        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                            <div class="counter-item">
                                <div class="counter-item-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                                <div class="counter-item-value">
                                    <h3 class="counter">36</h3>
                                    <span class="counter-suffix">+</span>
                                </div>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="counter-item">
                                <div class="counter-item-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></div>
                                <div class="counter-item-value">
                                    <h3 class="counter">48</h3>
                                    <span class="counter-suffix">+</span>
                                </div>
                                <p>Project Completed</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                            <div class="counter-item">
                                <div class="counter-item-icon"><i class="fas fa-mug-hot" aria-hidden="true"></i></div>
                                <div class="counter-item-value">
                                    <h3 class="counter">21</h3>
                                    <span class="counter-suffix">+</span>
                                </div>
                                <p>Cups Of Coffee</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Counter Section End //-->

        <!--// How I Work Section Start //-->
        @if ($section_arr['work_process_section'] == 1)
        @if (isset($work_process_section) || count($work_processes) > 0)
            <section class="section bg-dark-blue pb-30">
                <div class="container">
                    @isset ($work_process_section)
                        <x-frontend.section-title
                            :title="$work_process_section->title"
                            :subtitle="$work_process_section->section_title"
                            align="center"
                            :dots="true" />
                        @endisset
                        @php $i = 1; $t = 1; @endphp
                        @foreach ($work_processes->chunk(3) as $work_process)
                            <div class="row ni-work-process-row">
                            @foreach ($work_process as $item)
                                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.{{ $i++ }}s">
                                            <div class="how-i-work-item">
                                                <div class="number">
                                                    <span>0{{ $t++ }}</span>
                                                </div>
                                                <div class="number-border"></div>
                                                @if ($item->image_status == "enable" && !empty($item->work_process_image))
                                                    <div class="img">
                                                        <img src="{{ asset('uploads/img/work_process/'.$item->work_process_image) }}" class="img-fluid" alt="How i work">
                                                    </div>
                                                @endif
                                                <div class="text">
                                                    <h5>{{ $item->title }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                 @endforeach
                            </div>
                        @endforeach

                </div>
            </section>
         @else
            <section class="section bg-dark-blue pb-30">
                <div class="container">
                    <x-frontend.section-title
                        title="Our prepare your projects in 3 stages"
                        subtitle="How Our Work"
                        align="center"
                        :dots="true" />
                    <div class="row ni-work-process-row">
                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s">
                            <div class="how-i-work-item">
                                <div class="number">
                                    <span>01</span>
                                </div>
                                <div class="number-border"></div>
                                <div class="img">
                                    <img src="{{ asset('uploads/img/work_process/demo-process-01.png') }}" class="img-fluid" alt="How i work">
                                </div>
                                <div class="text">
                                    <h5>Thinking</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s">
                            <div class="how-i-work-item">
                                <div class="number">
                                    <span>02</span>
                                </div>
                                <div class="number-border"></div>
                                <div class="img">
                                    <img src="{{ asset('uploads/img/work_process/demo-process-01.png') }}" class="img-fluid" alt="How i work">
                                </div>
                                <div class="text">
                                    <h5>Research</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.6s">
                            <div class="how-i-work-item">
                                <div class="number">
                                    <span>03</span>
                                </div>
                                <div class="number-border"></div>
                                <div class="img">
                                    <img src="{{ asset('uploads/img/work_process/demo-process-01.png') }}" class="img-fluid" alt="How i work">
                                </div>
                                <div class="text">
                                    <h5>Design</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
         @endif
         @endif
        <!--// How I Work Section End //-->

        <!--// Skills Section Start //-->
        @if ($section_arr['skill_section'] == 1)
        @if (isset($skill) || count($skill_info_lists) > 0)
            <section class="section skills-section" id="technology" data-scroll-index="5">
                <div class="container">
                    <div class="row skills-row align-items-stretch">
                      @isset ($skill)
                            <div class="col-lg-5 skills-media-col wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                <div class="skills-img">
                                    <img src="{{ asset('uploads/img/skill/'.$skill->skill_image) }}" alt="Software technology" title="Software technology" class="img-fluid">
                                </div>
                            </div>
                          @endisset
                        <div class="col-lg-7 skills-content-col wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="skills-inner">
                               @isset ($skill)
                                    <h2>{{ $skill->title }}</h2>
                                    @if (!empty($skill->desc)) <p>{{ $skill->desc }}</p> @endif
                                   @endisset
                                <div class="row skills-cards">
                                  @foreach ($skill_info_lists as $skill_info_list)
                                        <div class="col-md-6 col-sm-6 skills-item-resp">
                                            <div class="skills-item">
                                                <div class="skills-item-text">
                                                    <h5>{{ $skill_info_list->title }}</h5>
                                                </div>
                                                <div class="body">
                                                    <h2 class="counter">{{ $skill_info_list->percent_rate }}</h2>
                                                    <div class="skills-progress-bar">
                                                        <div class="skills-progress-value slideInLeft wow" data-percent="{{ $skill_info_list->percent_rate }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="section skills-section" id="technology" data-scroll-index="5">
                <div class="container">
                    <div class="row skills-row align-items-stretch">
                        <div class="col-lg-5 skills-media-col wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="skills-img">
                                <img src="{{ asset('uploads/img/skill/demo-skill.png') }}" alt="Software technology" title="Software technology" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-7 skills-content-col wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="skills-inner">
                                <h2>Our specialize in frameworks UI for years</h2>
                                <p>
                                    A front end library is being released every day and it is requested
                                    to master these technologies.I also follow the market every day and
                                    follow the updates of new frontend frameworks and programming frameworks.
                                    It is easier for me to keep up with new technologies in projects
                                </p>
                                <div class="row skills-cards">
                                    <div class="col-md-6 col-sm-6 skills-item-resp">
                                        <div class="skills-item">
                                            <div class="skills-item-text">
                                                <h5>Design</h5>
                                            </div>
                                            <div class="body">
                                                <h2 class="counter">80</h2>
                                                <div class="skills-progress-bar">
                                                    <div class="skills-progress-value slideInLeft wow" data-percent="80"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 skills-item-resp">
                                        <div class="skills-item">
                                            <div class="skills-item-text">
                                                <h5>Coding</h5>
                                            </div>
                                            <div class="body">
                                                <h2 class="counter">90</h2>
                                                <div class="skills-progress-bar">
                                                    <div class="skills-progress-value slideInLeft wow" data-percent="90"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Skills Section End //-->

        <!--// My Works Start //-->
        @if ($section_arr['portfolio_section'] == 1)
        @if (isset($portfolio_section) || count($portfolios) > 0)
            <section class="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
                <div class="container">
                    <div class="row">
                       @isset ($portfolio_section)
                            <div class="col-md-6">
                                <div class="section-heading-left">
                                    <span>{{ $portfolio_section->section_title }}</span>
                                    <h2>{{ $portfolio_section->title }}</h2>
                                </div>
                            </div>
                           @endisset
                        <div class="col-md-6">
                            <div class="portfolio-filter">
                                <a href="#" data-portfolio-filter="*" class="current">{{ __('frontend.all') }}</a>
                                @foreach ($portfolio_categories as $portfolio_category)
                                    <a href="#" data-portfolio-filter=".{{ $portfolio_category->portfolio_category_slug }}">{{ $portfolio_category->category_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                        @foreach ($portfolios as $portfolio)
                            <div class="col-md-6 col-lg-4 portfolio-item {{ $portfolio->portfolio_category->portfolio_category_slug }}">
                                <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ portfolio_image_url($portfolio->thumbnail_image) }}" alt="Portfolio image" class="img-fluid">
                                            <a href="{{ portfolio_image_url($portfolio->thumbnail_image) }}" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                    <div class="body">
                                        <div class="portfolio-details">
                                            <span>{{ $portfolio->portfolio_category->category_name }}</span>
                                            <h5>{{ $portfolio->title }}</h5>
                                        </div>
                                        <a href="{{ route('portfolio-page.show', ['portfolio_slug' => $portfolio->portfolio_slug]) }}" class="portfolio-link">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-heading-left">
                                <span>Portfolio</span>
                                <h2>Selected Projects</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-filter">
                                <a href="#" data-portfolio-filter="*" class="current">All</a>
                                <a href="#" data-portfolio-filter=".ecommerce">Ecommerce</a>
                                <a href="#" data-portfolio-filter=".web-app">Web App</a>
                                <a href="#" data-portfolio-filter=".ui-ux">UI / UX</a>
                            </div>
                        </div>
                    </div>
                    <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                        @php
                            $demoProjects = [
                                ['slug' => 'ecommerce', 'cat' => 'Ecommerce', 'title' => 'Nova Commerce', 'img' => 'demo-nova-commerce.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Pulse Finance', 'img' => 'demo-pulse-finance.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Atlas Trails', 'img' => 'demo-atlas-trails.png'],
                                ['slug' => 'ui-ux', 'cat' => 'UI / UX', 'title' => 'Verdant Care', 'img' => 'demo-verdant-care.png'],
                                ['slug' => 'ui-ux', 'cat' => 'UI / UX', 'title' => 'Studio Arc', 'img' => 'demo-studio-arc.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Beacon LMS', 'img' => 'demo-beacon-lms.png'],
                            ];
                        @endphp
                        @foreach ($demoProjects as $demo)
                            <div class="col-md-6 col-lg-4 portfolio-item {{ $demo['slug'] }}">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <img src="{{ asset('uploads/img/portfolio/'.$demo['img']) }}" alt="{{ $demo['title'] }}" class="img-fluid">
                                        <a href="{{ asset('uploads/img/portfolio/'.$demo['img']) }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="portfolio-details">
                                            <span>{{ $demo['cat'] }}</span>
                                            <h5>{{ $demo['title'] }}</h5>
                                        </div>
                                        <a href="#" class="portfolio-link">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// My Works End //-->

        <!--// Team Section Start //-->
        @if ($section_arr['team_section'] == 1)
        @if (isset($team_section) || count($teams) > 0)
            <section class="section" id="team">
                <div class="container">
                    @isset ($team_section)
                        <x-frontend.section-title
                            :title="$team_section->title"
                            :subtitle="$team_section->section_title"
                            align="center"
                            :dots="true" />
                        @endisset
                    <div class="row">
                        @foreach ($teams as $team)
                            <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.{{ $loop->index + 1 }}s">
                                <div class="team-card">
                                   @if (!empty($team->team_image))
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/teams/'.$team->team_image) }}" alt="Team image">
                                        </div>
                                       @endif
                                    <div class="body">
                                        <div class="text">
                                            @if (!empty($team->name)) <h5>{{ $team->name }}</h5> @endif
                                            @if (!empty($team->job)) <p>{{ $team->job }}</p> @endif
                                        </div>
                                        <div class="social">
                                            <ul>
                                                @if (!empty($team->link_2)) <li><a href="{{ $team->link_2 }}"><i class="fab fa-facebook-f"></i></a></li> @endif
                                                @if (!empty($team->link_3)) <li><a href="{{ $team->link_3 }}"><i class="fab fa-twitter"></i></a></li> @endif
                                                @if (!empty($team->link_4)) <li><a href="{{ $team->link_4 }}"><i class="fab fa-instagram"></i></a></li> @endif
                                                @if (!empty($team->link_5)) <li><a href="{{ $team->link_5 }}"><i class="fab fa-linkedin"></i></a></li> @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       </div>
                </div>
            </section>
        @else
            <section class="section" id="team">
                <div class="container">
                    <x-frontend.section-title
                        title="Team Member"
                        subtitle="Our Team"
                        align="center"
                        :dots="true" />
                    <div class="row">
                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                            <div class="team-card">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/teams/demo-team-01.png') }}" alt="Team image">
                                </div>
                                <div class="body">
                                    <div class="text">
                                        <h5>George Avenue</h5>
                                        <p>Web Designer</p>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.2s">
                            <div class="team-card">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/teams/demo-team-01.png') }}" alt="Team image">
                                </div>
                                <div class="body">
                                    <div class="text">
                                        <h5>Dominick A. Gray</h5>
                                        <p>App Developer</p>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="team-card">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/teams/demo-team-01.png') }}" alt="Team image">
                                </div>
                                <div class="body">
                                    <div class="text">
                                        <h5>Michael L. Lloyd</h5>
                                        <p>UI Designer</p>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Team Section End //-->

        <!--// Testimonial Section Start //-->
        @if ($section_arr['client_section'] == 1)
        @if (isset($testimonial_section) || count($testimonials) > 0)
            <section class="section pb-minus-76 bg-primary-light">
                <div class="container">
                    @isset ($testimonial_section)
                        <x-frontend.section-title
                            :title="$testimonial_section->title"
                            :subtitle="$testimonial_section->section_title"
                            col-class="col-md-6" />
                        @endisset
                    <div class="owl-carousel owl-theme" id="testimonialCarousel">
                        @foreach ($testimonials as $testimonial)
                            <div class="item">
                                <div class="testimonial-item">
                                   @if ($testimonial->image_status == 1 && !empty($testimonial->testimonial_image))
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/testimonials/'.$testimonial->testimonial_image) }}" alt="Testimonial image" class="img-fluid">
                                        </div>
                                       @endif
                                    <div class="body">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <span>{{ $testimonial->job }}</span>
                                        <p>{{ $testimonial->desc }}</p>
                                        <div class="rating">
                                            @for ($i = 0; $i <= 5; $i++)
                                                @if ($i < 3)
                                                    @for ($i = 0; $i < $testimonial->star; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="section pb-minus-76 bg-primary-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section-heading-left">
                                <span>Testimonial</span>
                                <h2>Our Clients</h2>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme" id="testimonialCarousel">
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/testimonials/demo-client-01.png') }}" alt="Testimonial image" class="img-fluid">
                                </div>
                                <div class="body">
                                    <h5>Jeff N. Hood</h5>
                                    <span>Envato Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/testimonials/demo-client-01.png') }}" alt="Testimonial image" class="img-fluid">
                                </div>
                                <div class="body">
                                    <h5>James E. Nelson</h5>
                                    <span>Envato Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/testimonials/demo-client-01.png') }}" alt="Testimonial image" class="img-fluid">
                                </div>
                                <div class="body">
                                    <h5>Wallace Chuck</h5>
                                    <span>Envato Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img">
                                    <img src="{{ asset('uploads/img/testimonials/demo-client-01.png') }}" alt="Testimonial image" class="img-fluid">
                                </div>
                                <div class="body">
                                    <h5>Nitin Khajotia</h5>
                                    <span>Envato Customer</span>
                                    <p>
                                        It is a long established fact that a reader will be distracted
                                        by the readable content of a page when looking at its layout.
                                    </p>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    @endif
        <!--// Testimonial Section End //-->

        <!--// Blog Section Start //-->
        @if ($section_arr['blog_section'] == 1)
        @if (isset($blog_section) || count($recent_posts) > 0)
            <section class="section pb-minus-76" id="blog" data-scroll-index="6">
                <div class="container">
                   @isset ($blog_section)
                        <x-frontend.section-title
                            :title="$blog_section->title"
                            :subtitle="$blog_section->section_title"
                            col-class="col-md-6" />
                       @endisset
                    <div class="owl-carousel owl-theme" id="blogCarousel">
                        @foreach ($recent_posts as $recent_post)
                            <div class="item">
                                <div class="blog-item">
                                    @if (!empty($recent_post->blog_image))
                                        <div class="blog-img">
                                            <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    @else
                                        <div class="blog-img">
                                            <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <a href="#"><span><i class="far fa-user"></i>@if ($recent_post->type == "with_this_account") {{ $recent_post->author_name }} @else {{ __('frontend.anonymous') }} @endif</span></a>
                                            <a href="#"><span><i class="far fa-bookmark"></i>{{ $recent_post->category_name }}</span></a>
                                        </div>
                                        <h5>
                                            <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">{{ $recent_post->title }}</a>
                                        </h5>
                                        @if (!empty($recent_post->short_desc)) <p>{{ $recent_post->short_desc }}</p> @endif
                                        <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}" class="blog-link">
                                            {{ __('frontend.read_more') }}
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </section>
        @else
        <section class="section pb-minus-76" id="blog" data-scroll-index="6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-heading-left">
                            <span>Blogs</span>
                            <h2>Our Blogs</h2>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme" id="blogCarousel">
                    <div class="item">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                </a>
                            </div>
                            <div class="blog-body">
                                <div class="blog-meta">
                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                </div>
                                <h5>
                                    <a href="#">
                                        How To Create A Design Brief
                                    </a>
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be distracted [..]
                                </p>
                                <a href="#" class="blog-link">
                                    Read More
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                </a>
                            </div>
                            <div class="blog-body">
                                <div class="blog-meta">
                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                </div>
                                <h5>
                                    <a href="#">
                                        Work On The Latest UI Design Models
                                    </a>
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be distracted [..]
                                </p>
                                <a href="#" class="blog-link">
                                    Read More
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                </a>
                            </div>
                            <div class="blog-body">
                                <div class="blog-meta">
                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                    <a href="#"><span><i class="far fa-bookmark"></i>Design</span></a>
                                </div>
                                <h5>
                                    <a href="#">
                                        The Golden Rule Between Unique Design
                                    </a>
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be distracted [..]
                                </p>
                                <a href="#" class="blog-link">
                                    Read More
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}" alt="Blog image" class="img-fluid">
                                </a>
                            </div>
                            <div class="blog-body">
                                <div class="blog-meta">
                                    <a href="#"><span><i class="far fa-user"></i>By Admin</span></a>
                                    <a href="#"><span><i class="far fa-bookmark"></i>Wordpress</span></a>
                                </div>
                                <h5>
                                    <a href="#">
                                        How to set up a Wordpress website ?
                                    </a>
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be distracted [..]
                                </p>
                                <a href="#" class="blog-link">
                                    Read More
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endif
        <!--// Blog Section End //-->

        @if ($section_arr['contact_section'] == 1)
        <!--// Contact Section Start //-->
        @if (isset($contact_section) || count($contacts) > 0)
            <section class="section contact-section" id="contact" data-scroll-index="7">
                <div class="container">
                  @isset ($contact_section)
                        <x-frontend.section-title
                            :title="$contact_section->title"
                            :subtitle="$contact_section->section_title"
                            align="center"
                            col-class="col-lg-7"
                            :dots="true" />
                      @endisset
                    <div class="row contact-layout align-items-stretch">
                        <div class="col-lg-5">
                            <div class="contact-info-list">
                                @foreach ($contacts as $contact)
                                    <div class="contact-info-item">
                                        @if (!empty($contact->icon))
                                            <div class="icon">
                                                <span class="{{ $contact->icon }}"></span>
                                            </div>
                                        @endif
                                        <div class="body">
                                            @if (!empty($contact->title)) <h5>{{ $contact->title }}</h5> @endif
                                            @if (!empty($contact->desc)) <p>{{ $contact->desc }}</p> @endif
                                        </div>
                                    </div>
                                @endforeach
                                @php
                                    $contactHasPhone = collect($contacts)->contains(function ($item) {
                                        $blob = strtolower(($item->icon ?? '').' '.($item->title ?? '').' '.($item->desc ?? ''));
                                        return str_contains($blob, 'phone') || str_contains($blob, 'whatsapp') || str_contains($blob, 'fa-phone');
                                    });
                                    $phoneText = !empty(optional($site_info ?? null)->phone) ? $site_info->phone : '+880 1700-000000';
                                @endphp
                                @if (! $contactHasPhone)
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="body">
                                            <h5>{{ __('frontend.phone') }}</h5>
                                            <p>
                                                @if (!empty(optional($site_info ?? null)->phone))
                                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_info->phone) }}" target="_blank" rel="noopener noreferrer">{{ $phoneText }}</a>
                                                @else
                                                    {{ $phoneText }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form-card">
                            <div class="contact-form-wrap">
                                    <form class="js-contact-form" action="{{ route('message.store') }}" method="POST" novalidate>
                                        @csrf
                                        <x-frontend.contact-form-guard />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control"  name="name" placeholder="{{ __('frontend.name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="email" class="form-control" name="email" placeholder="{{ __('frontend.email') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control" name="subject" placeholder="{{ __('frontend.subject') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-group">
                                                <textarea name="message" class="form-control" cols="20" rows="6" placeholder="Your Message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-btn-left">
                                                <button type="submit" class="primary-btn">
                                                    <span class="text">{{ __('frontend.send_message') }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="section contact-section" id="contact" data-scroll-index="7">
                <div class="container">
                    <x-frontend.section-title
                        title="Contact Us"
                        subtitle="Contact Me"
                        align="center"
                        col-class="col-lg-7"
                        :dots="true" />
                    <div class="row contact-layout align-items-stretch">
                        <div class="col-lg-5">
                            <div class="contact-info-list">
                            <div class="contact-info-item">
                                <div class="icon">
                                    <span class="fa fa-map-marker-alt"></span>
                                </div>
                                <div class="body">
                                    <h5>Address</h5>
                                    <p>Sonadanga, Khulna, Bangladesh</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <span class="fas fa-envelope-open-text"></span>
                                </div>
                                <div class="body">
                                    <h5>Email</h5>
                                    <p>contact@netigianit.com</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="body">
                                    <h5>{{ __('frontend.phone') }}</h5>
                                    <p>{{ !empty(optional($site_info ?? null)->phone) ? $site_info->phone : '+880 1700-000000' }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form-card">
                            <div class="contact-form-wrap">
                                <form class="js-contact-form" action="{{ route('message.store') }}" method="POST" novalidate>
                                    @csrf
                                    <x-frontend.contact-form-guard />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control" name="name" id="contactName" placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="email" class="form-control" name="email" id="contactEmail" placeholder="Your Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control" name="subject" id="contactPhone" placeholder="Subject" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-group">
                                                <textarea name="message" id="contactMessage" class="form-control"  placeholder="Your Message *" cols="20" rows="6" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-btn-left">
                                                <button type="submit" id="contactBtn" class="primary-btn">
                                                    <span class="text">Send Message</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
                            <!--            <div class="subscribe-newsletter">-->
                            <!--    <div class="subscribe-newsletter-text">-->
                            <!--        <div class="icon">-->
                            <!--            <span class="fa fa-envelope-open-text"></span>-->
                            <!--        </div>-->
                            <!--        <h5>{{ __('frontend.subscribe_newsletter') }}</h5>-->
                            <!--        <p>Receive the latest news updates</p>-->
                            <!--        <form action="{{ route('subscribe-section.store') }}" method="POST">-->
                            <!--            @csrf-->
                            <!--            <div class="form-newsletter">-->
                            <!--                <input type="text" name="email" placeholder="{{ __('frontend.enter_email') }}" required>-->
                            <!--                <button><i class="fa fa-arrow-right"></i></button>-->
                            <!--            </div>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
    @endif
        <!--// Contact Section End //-->

        <!--//Google Map Section Start //-->
      @if (!empty($contact_section->map_iframe))
            <div class="google-map">
                <iframe src="{{ $contact_section->map_iframe }}" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          @endif
        <!--// Google Map Section End //-->
        @endif

        <!--// Footer Start //-->
        @if ($section_arr['footer_section'] == 1)
        @if (count($socials) > 0 || isset($site_info) || count($footer_pages) > 0)
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">{{ __('frontend.about_us') }}</h6>
                                    <div class="footer-social-links">
                                        @foreach ($socials as $social)
                                            @if ($social->social_media === 'fab fa-whatsapp')
                                                @continue
                                            @endif
                                            @php
                                                $socialLabels = [
                                                    'fab fa-facebook-f' => 'Facebook',
                                                    'fab fa-facebook' => 'Facebook',
                                                    'fab fa-youtube' => 'YouTube',
                                                    'fab fa-linkedin-in' => 'LinkedIn',
                                                    'fab fa-linkedin' => 'LinkedIn',
                                                    'fab fa-instagram' => 'Instagram',
                                                    'fab fa-twitter' => 'Twitter',
                                                    'fab fa-x-twitter' => 'X',
                                                ];
                                                $socialLabel = $socialLabels[$social->social_media] ?? ucwords(str_replace(['fab fa-', '-f', '-in'], '', $social->social_media));
                                            @endphp
                                            <a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif" target="_blank" rel="noopener noreferrer">
                                                <i class="{{ $social->social_media }}"></i>
                                                <span>{{ $socialLabel }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget footer-widget-pl">
                                    <h6 class="footer-title">{{ __('frontend.customer_relationship') }}</h6>
                                    <ul class="footer-links">
                                        @foreach ($footer_pages as $footer_page)
                                            @if (in_array($footer_page->page_slug, ['services', 'works', 'recent-works', 'case-studys', 'presentation', 'presentations']))
                                                @continue
                                            @endif
                                            <li>
                                                <a href="{{ route('any-page.show', ['page_slug' => $footer_page->page_slug]) }}">
                                                    <i class="fas fa-angle-right"></i>
                                                    <span>{{ $footer_page->page_title }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Contact Info</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                           @if (!empty($site_info->address))
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>Address in Details</h6>
                                                        <p>{{ $site_info->address }}</p>
                                                    </div>
                                                </li>
                                               @endif
                                           @if (!empty($site_info->phone))
                                                <li>
                                                    <i class="fab fa-whatsapp"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>WhatsApp</h6>
                                                        <p>
                                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_info->phone) }}" target="_blank" rel="noopener noreferrer" class="text-white">{{ $site_info->phone }}</a>
                                                        </p>
                                                    </div>
                                                </li>
                                               @endif
                                           @if (!empty($site_info->email))
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>Email</h6>
                                                        <p>
                                                            <a href="mailto:{{ $site_info->email }}" class="text-white">{{ $site_info->email }}</a>
                                                        </p>
                                                    </div>
                                                </li>
                                               @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty($site_info->copyright))
                    <div class="copyright">
                        <div class="container">
                            <p class="copyright-text">{{ $site_info->copyright }}</p>
                        </div>
                    </div>
                @endif
            </footer>
        @else
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">About Us</h6>
                                    <div class="footer-social-links">
                                        <a href="javascript:void(0)">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="fab fa-youtube"></i>
                                            <span>YouTube</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget footer-widget-pl">
                                    <h6 class="footer-title">Customer relationship</h6>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>Delivery and Returns</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>Product review</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>User agreement</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>Privacy Policy</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>Distance Selling Agreement</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><i class="fas fa-angle-right"></i><span>Frequently Asked Questions</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Contact Info</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <div class="footer-contact-body">
                                                    <h6>Address:</h6>
                                                    <p>
                                                        1395 Nixon Avenue Etowah, TN 37331
                                                        <br>United States
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fab fa-whatsapp"></i>
                                                <div class="footer-contact-body">
                                                    <h6>WhatsApp</h6>
                                                    <p><a href="javascript:void(0)" class="text-white">+1 422-200-5555</a></p>
                                                </div>
                                            </li>
                                            <li>
                                                <i class="fas fa-envelope"></i>
                                                <div class="footer-contact-body">
                                                    <h6>Email</h6>
                                                    <p><a href="mailto:contact@netigianit.com" class="text-white">contact@netigianit.com</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p class="copyright-text">© Copyright 2024. Powered By Netigian IT</p>
                    </div>
                </div>
            </footer>
    @endif
    @endif
        <!--// Footer End //-->
    </main>
    <!--// Main Area End //-->

    @if (isset($quick_access_button) && $quick_access_button->status == 1)
        <a href="{{ $quick_access_button->link }}" class="scroll-whatsapp-btn" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif

</div>
<!--// Page Wrapper End //-->


@if ($section_arr['color_option_sidebar'] == 1)
<div id="colorOptionsSidebar">
    <div class="color-options-wrap">
        <button type="button" id="colorOptionsSidebarToggle">
            <i class="fa fa-cog fa-spin"></i>
        </button>
        <div class="color-options-list">
            <span class="color-options-item default" data-skins-css-path="{{ asset('assets/frontend/css/skins/default-color.css') }}"></span>
            <span class="color-options-item blue" data-skins-css-path="{{ asset('assets/frontend/css/skins/blue-color.css') }}"></span>
            <span class="color-options-item red" data-skins-css-path="{{ asset('assets/frontend/css/skins/red-color.css') }}"></span>
            <span class="color-options-item yellow" data-skins-css-path="{{ asset('assets/frontend/css/skins/yellow-color.css') }}"></span>
            <span class="color-options-item green" data-skins-css-path="{{ asset('assets/frontend/css/skins/green-color.css') }}"></span>
            <span class="color-options-item pink" data-skins-css-path="{{ asset('assets/frontend/css/skins/pink-color.css') }}"></span>
            <span class="color-options-item turquose" data-skins-css-path="{{ asset('assets/frontend/css/skins/turquose-color.css') }}"></span>
            <span class="color-options-item purple" data-skins-css-path="{{ asset('assets/frontend/css/skins/purple-color.css') }}"></span>
            <span class="color-options-item blue2" data-skins-css-path="{{ asset('assets/frontend/css/skins/blue-color-2.css') }}"></span>
            <span class="color-options-item orange" data-skins-css-path="{{ asset('assets/frontend/css/skins/orange-color.css') }}"></span>
            <span class="color-options-item magenta" data-skins-css-path="{{ asset('assets/frontend/css/skins/magenta-color.css') }}"></span>
            <span class="color-options-item orange2" data-skins-css-path="{{ asset('assets/frontend/css/skins/orange-color-2.css') }}"></span>
        </div>
    </div>
</div>
@endif
<!--// #colorOptionsSidebar //-->

@if ($section_arr['rtl_sidebar'] == 1)
<div id="rtlSidebar">
    <button type="button" id="rtlToggle">RTL</button>
</div>
@endif
<!--// #rtlSidebar //-->

<!--// JQuery //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.min.js') }}"></script>
<!--// Popper //-->
<script src="{{ asset('assets/frontend/vendor/js/popper.min.js') }}"></script>
<!--// Bootstrap //-->
<script src="{{ asset('assets/frontend/vendor/js/bootstrap.min.js') }}"></script>
<!--// Images Loaded Js //-->
<script src="{{ asset('assets/frontend/vendor/js/images.loaded.min.js') }}"></script>
<!--// Wow Js //-->
<script src="{{ asset('assets/frontend/vendor/js/wow.min.js') }}"></script>
<!--// Magnific Popup //-->
<script src="{{ asset('assets/frontend/vendor/js/magnific.popup.min.js') }}"></script>
<!--// Waypoint Js //-->
<script src="{{ asset('assets/frontend/vendor/js/waypoint.min.js') }}"></script>
<!--// Counter Up Js //-->
<script src="{{ asset('assets/frontend/vendor/js/counter.up.min.js') }}"></script>
<!--// JQuery Easing Functions //-->
<script src="{{ asset('assets/frontend/vendor/js/jquery.easing.min.js') }}"></script>
<!--// Owl Carousel //-->
<script src="{{ asset('assets/frontend/vendor/js/owl.carousel.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('assets/frontend/vendor/js/validate.min.js') }}"></script>
<!--// Form Validate //-->
<script src="{{ asset('assets/frontend/vendor/js/custom.select.plugin.js') }}"></script>
<!--// Scroll It //-->
<script src="{{ asset('assets/frontend/vendor/js/scrollit.min.js') }}"></script>
<!--// Isotope Js //-->
<script src="{{ asset('assets/frontend/vendor/js/isotope.min.js') }}"></script>


<!--// Particles Js //-->
<script src="{{ asset('assets/frontend/vendor/js/particles.js') }}"></script>

<!--// Main Js //-->
<script src="{{ asset('assets/frontend/js/main.js') }}?v=82"></script>
<script src="{{ asset('assets/frontend/js/ni-contact-form.js') }}?v=3"></script>
<!--// Dark / Light Mode //-->
<script src="{{ asset('assets/frontend/js/theme-mode.js') }}"></script>

@if (session()->has('language_direction_from_dropdown'))

    @if(session()->get('language_direction_from_dropdown') == 1)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/js/rtl-mode.js') }}"></script>

    @endif


@elseif (isset($language))

    @if ($language->direction == 1)

        <!-- Theme Main Js  -->
        <script src="{{ asset('assets/frontend/js/rtl-mode.js') }}"></script>

    @endif

@endif


</body>
</html>