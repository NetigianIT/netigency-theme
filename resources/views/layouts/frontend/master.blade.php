<!DOCTYPE html>
<html dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif" lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($blog)) {{ $blog->meta_keyword }} @elseif (isset($service)) {{ $service->meta_keyword }} @elseif (isset($portfolio)) {{ $portfolio->meta_keyword }} @elseif (isset($general_seo)){{ $general_seo->site_keywords }} @endif ">
    <meta name="author" content="Netigian IT">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/'.$blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/'.$service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!--Pinterest -->
    <meta name="p:domain_verify" content="2a746982a858a3c81ba075ac647402e5"/>

    <!-- Title -->
    <title>@if (isset($general_seo)){{ $general_seo->site_name }} @endif @if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @endif</title>

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

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128" rel="shortcut icon" />
@else
    <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
@endif

    <!--// Bootstrap  //-->
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
            padding:32px 28px!important;
            border-radius:12px!important;
        }
        @media (max-width:767.98px){
            .contact-form-wrap{padding:24px 18px!important}
        }
        .contact-form-wrap .contact-form-group .form-control,
        .contact-form-wrap .contact-form-group .form-control:focus{
            background:transparent!important;
            background-color:transparent!important;
            box-shadow:none!important;
            border:1px solid rgba(255,255,255,.18)!important;
            height:auto!important;
            min-height:56px!important;
            padding:16px 18px!important;
            line-height:1.5!important;
            box-sizing:border-box!important;
            border-radius:8px!important;
        }
        .contact-form-wrap .contact-form-group textarea.form-control,
        .contact-form-wrap .contact-form-group textarea.form-control:focus{
            min-height:160px!important;
            padding:18px 18px!important;
            resize:vertical!important;
            border-radius:8px!important;
        }
        html[data-theme="light"] .contact-form-wrap .contact-form-group .form-control,
        html[data-theme="light"] .contact-form-wrap .contact-form-group .form-control:focus{
            border-color:rgba(0,0,0,.12)!important;
        }
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:hover,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:focus,
        .contact-form-wrap .contact-form-group input.form-control:-webkit-autofill:active,
        .contact-form-wrap .contact-form-group input.form-control:autofill{
            -webkit-text-fill-color:var(--ni-text,#f3f4f6)!important;
            caret-color:var(--ni-text,#f3f4f6);
            transition:background-color 99999s ease-in-out 0s,color 99999s ease-in-out 0s;
            -webkit-box-shadow:0 0 0 1000px rgba(7,12,10,.28) inset!important;
            box-shadow:0 0 0 1000px rgba(7,12,10,.28) inset!important;
            background:transparent!important;
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
        .contact-section .contact-btn-left .primary-btn{
            border-radius:20px!important;
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
        .contact-section .contact-btn-left .primary-btn:hover .icon{
            background:transparent!important;
        }
        .contact-section .contact-btn-left .primary-btn:hover .icon i{
            background:linear-gradient(135deg, rgba(35,224,163,.28) 0%, #23e0a3 50%, #ffffff 100%)!important;
        }
        .contact-section .contact-btn-left .primary-btn,
        .contact-section .contact-btn-left .primary-btn:hover,
        .contact-section .contact-btn-left .primary-btn:disabled{
            cursor:pointer!important;
        }
        .contact-section .contact-btn-left .primary-btn.is-loading .icon i{
            display:none!important;
        }
        .contact-section .contact-btn-left .primary-btn .contact-btn-spinner{
            width:22px;height:22px;border:2px solid rgba(21,191,134,.25);border-top-color:#15bf86;border-radius:50%;display:none;animation:ni-contact-spin .7s linear infinite;flex-shrink:0;
        }
        .contact-section .contact-btn-left .primary-btn.is-loading .contact-btn-spinner{display:block}
        @keyframes ni-contact-spin{to{transform:rotate(360deg)}}
        #counters.counters-section,
        .counters-section{
            background-color:var(--ni-page-bg,#0b0f0d)!important;
            background-image:none!important;
        }
        html[data-theme="light"] #counters.counters-section,
        html[data-theme="light"] .counters-section{
            background-color:var(--ni-section-bg,#f4faf7)!important;
        }
        .counters-section-bg{display:none!important}
        /* Compact nav; bigger logo inside the same bar height */
        .header,.header-shrink{padding:0!important}
        .header .navbar{min-height:68px!important;height:68px!important;align-items:center!important;padding-top:4px!important;padding-bottom:4px!important}
        .header .nav-item .nav-link,.header-shrink .nav-item .nav-link{padding:8px 10px!important;line-height:24px!important}
        .header .navbar-brand{padding:0!important;margin:0!important;line-height:1!important;display:flex!important;align-items:center!important}
        .header .navbar-brand img{height:60px!important;max-height:60px!important;width:auto!important;max-width:none!important;object-fit:contain}
        @media (max-width:991.98px){.header .navbar{min-height:56px!important;height:56px!important;padding-top:4px!important;padding-bottom:4px!important}.header .navbar-brand img{height:48px!important;max-height:48px!important}}
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
        
        
        
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M2WBM4S3');</script>
<!-- End Google Tag Manager -->

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2855647867917114');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2855647867917114&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

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
                                <a class="nav-link menu-link" href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            @if (($section_arr['about_us_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('/#about') }}">{{ __('frontend.about_us') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['service_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('/#services') }}">{{ __('frontend.services') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['skill_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('/#technology') }}">{{ __('frontend.technology') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['portfolio_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('/#porfolio') }}">{{ __('frontend.portfolio') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['blog_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ request()->is('blogs*') ? 'active' : '' }}" href="{{ route('blog-page.index') }}">{{ __('frontend.blogs') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['contact_section'] ?? 0) == 1)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ url('/#contact') }}">{{ __('frontend.contact') }}</a>
                            </li>
                            @endif
                            @if (($section_arr['page_menu'] ?? 0) == 1)
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

        @yield('content')

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
                                                            <h6>{{ __('frontend.address') }}</h6>
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

</div>
<!--// Page Wrapper End //-->


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


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2WBM4S3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script src="{{ asset('assets/frontend/js/ni-select.js') }}?v=1"></script>
<script src="{{ asset('assets/frontend/js/ni-spa-nav.js') }}?v=1"></script>

</body>
</html>