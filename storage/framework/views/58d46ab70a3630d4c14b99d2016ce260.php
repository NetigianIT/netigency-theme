<!DOCTYPE html>
<html dir="<?php if(session()->has('language_direction_from_dropdown')): ?> <?php if(session()->get('language_direction_from_dropdown') == 1): ?> <?php echo e(__('rtl')); ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?>" lang="<?php if(session()->has('language_code_from_dropdown')): ?><?php echo e(str_replace('_', '-', session()->get('language_code_from_dropdown'))); ?><?php else: ?><?php echo e(str_replace('_', '-',   $language->language_code)); ?><?php endif; ?>">
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
    <meta name="title" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta name="description" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">
    <meta name="keywords" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_keywords); ?> <?php endif; ?>">
    <meta name="author" content="Netigian IT">
    <meta property="fb:app_id" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->fb_app_id); ?> <?php endif; ?>">
    <meta property="og:title" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta property="og:url" content="<?php if(isset($general_seo)): ?><?php echo e(url()->current()); ?> <?php endif; ?>">
    <meta property="og:description" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">
    <meta property="og:image" content="<?php if(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta itemprop="image" content="<?php if(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php if(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta property="twitter:title" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta property="twitter:description" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Title -->
    <title><?php echo e(__('frontend.home')); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($general_seo)): ?> - <?php echo e($general_seo->site_name); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></title>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($general_site_image->favicon_image)): ?>
    <!-- Favicon -->
        <link href="<?php echo e(asset('uplods/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" />
<?php else: ?>
    <!-- Favicon -->
        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" />
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!--// Boostrap  //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/bootstrap.min.css')); ?>">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/magnific.popup.min.css')); ?>">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/animate.min.css')); ?>">
    <!--// Vegas Slider Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/vegas.slider.min.css')); ?>">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/owl.carousel.min.css')); ?>">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/owl.carousel.default.min.css')); ?>">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/fonts/font_awesome/css/all.css')); ?>">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/fonts/flat_icons/flaticon.css')); ?>">
    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <!--// Theme Color Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/default-color.css')); ?>" id="theme-color-toggle" />

    <!--// Color Option Css //-->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($color_option)): ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($color_option->color_option == 1): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/blue-color.css')); ?>">
        <?php elseif($color_option->color_option == 2): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/red-color.css')); ?>">
        <?php elseif($color_option->color_option == 3): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/yellow-color.css')); ?>">
        <?php elseif($color_option->color_option == 4): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/green-color.css')); ?>">
        <?php elseif($color_option->color_option == 5): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/pink-color.css')); ?>">
        <?php elseif($color_option->color_option == 6): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/turquose-color.css')); ?>">
        <?php elseif($color_option->color_option == 7): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/purple-color.css')); ?>">
        <?php elseif($color_option->color_option == 8): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/blue-color-2.css')); ?>">
        <?php elseif($color_option->color_option == 9): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/orange-color.css')); ?>">
        <?php elseif($color_option->color_option == 10): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/magenta-color.css')); ?>">
        <?php elseif($color_option->color_option == 11): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/skins/orange-color-2.css')); ?>">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!--// Dark / Light Mode //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/theme-mode.css')); ?>?v=77">
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
        .contact-section .contact-btn-left{
            width:100%!important;
            text-align:left!important;
        }
        .contact-section .contact-btn-left .primary-btn{
            width:100%!important;
            display:flex!important;
            justify-content:space-between!important;
            border-radius:10px!important;
            background:var(--ni-glass)!important;
            border:1px solid var(--ni-glass-border, rgba(21,191,134,.28))!important;
            box-shadow:var(--ni-glass-shadow)!important;
            backdrop-filter:blur(18px) saturate(140%);
            -webkit-backdrop-filter:blur(18px) saturate(140%);
        }
        .contact-section .contact-btn-left .primary-btn:hover{
            background:var(--ni-glass-hover)!important;
            transform:none!important;
        }
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($google_analytic)): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($google_analytic->google_analytic); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo e($google_analytic->google_analytic); ?>');
        </script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</head>
<body data-spy="scroll" data-target="#fixedNavbar" <?php if(session()->has('language_direction_from_dropdown')): ?> <?php if(session()->get('language_direction_from_dropdown') == 1): ?>  class="rtl-mode" <?php endif; ?> <?php elseif(isset($language)): ?> <?php if($language->direction == 1): ?> class="rtl-mode" <?php endif; ?>  <?php endif; ?> >

<!--// Page Wrapper Start //-->
<div class="page-wrapper" id="wrapper">

    <!--// Header Start //-->
    <header class="header fixed-top" id="header">
        <div id="nav-menu-wrap">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($general_site_image->site_colored_logo_image)): ?>
                        <a class="navbar-brand" title="Home" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(asset('uploads/img/general/'.$general_site_image->site_white_logo_image)); ?>" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="<?php echo e(asset('uploads/img/general/'.$general_site_image->site_colored_logo_image)); ?>" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    <?php else: ?>
                        <a class="navbar-brand" title="Home" href="#">
                            <img src="<?php echo e(asset('uploads/img/dummy/white-logo.png')); ?>" alt="Logo White" class="img-fluid logo-transparent">
                            <img src="<?php echo e(asset('uploads/img/dummy/colored-logo.png')); ?>" alt="Logo Black" class="img-fluid logo-normal">
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                <a class="nav-link menu-link" href="#" data-scroll-nav="1"><?php echo e(__('frontend.home')); ?></a>
                            </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['about_us_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="2"><?php echo e(__('frontend.about_us')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['service_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="3"><?php echo e(__('frontend.services')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['skill_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="5"><?php echo e(__('frontend.technology')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['portfolio_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="4"><?php echo e(__('frontend.portfolio')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['blog_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?php echo e(route('blog-page.index')); ?>"><?php echo e(__('frontend.blogs')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['contact_section'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#" data-scroll-nav="7"><?php echo e(__('frontend.contact')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['page_menu'] == 1): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ($header_pages ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="nav-link menu-link <?php echo e(request()->routeIs('any-page.show') && request()->route('page_slug') === $header_page->page_slug ? 'active' : ''); ?>" href="<?php echo e(route('any-page.show', ['page_slug' => $header_page->page_slug])); ?>"><?php echo e($header_page->page_title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                        <ul class="navbar-nav header-nav-right">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($display_dropdowns) > 0): ?>
                                <?php
                                    $currentLangCode = session()->has('language_code_from_dropdown')
                                        ? session()->get('language_code_from_dropdown')
                                        : ($language->language_code ?? '');
                                ?>
                                <li class="nav-item d-flex align-items-center header-lang-item">
                                    <div class="lang-toggle" role="group" aria-label="Language">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $display_dropdowns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display_dropdown): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $langShort = strtoupper(explode('_', str_replace('-', '_', $display_dropdown->language_code))[0]);
                                                $isActiveLang = strcasecmp($display_dropdown->language_code, $currentLangCode) === 0;
                                            ?>
                                            <a href="<?php echo e(url('language/set-locale/'.$display_dropdown->id)); ?>"
                                               class="lang-toggle-btn<?php echo e($isActiveLang ? ' active' : ''); ?>"
                                               <?php if($isActiveLang): ?> aria-current="true" <?php endif; ?>
                                               title="<?php echo e($display_dropdown->language_name); ?>"><?php echo e($langShort); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('choose_version')): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->get('choose_version') == 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                        <section class="hero-banner mt-5" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1><?php echo e($fixed_content->title); ?></h1>
                                            <h2><?php echo e($fixed_content->desc); ?></h2>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                    <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image)): ?>
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                                <ul class="hero-social-list">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </section>
                    <?php else: ?>
                        <section class="hero-banner mt-5" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="<?php echo e(asset('uploads/img/general/demo-hero.png')); ?>" title="ajency image" class="img-fluid">
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
                        </section>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php elseif(session()->get('choose_version') == 1): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1><?php echo e($fixed_content->title); ?></h1>
                                            <h2><?php echo e($fixed_content->desc); ?></h2>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                    <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image)): ?>
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                                <ul class="hero-social-list">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                        </section>
                    <?php else: ?>
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="<?php echo e(asset('uploads/img/general/demo-hero.png')); ?>" title="HovyLee phone image" alt="HovyLee phone image" class="img-fluid">
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php elseif(session()->get('choose_version') == 2): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content) || count($sliders) > 0): ?>
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                                                <h1><?php echo e($fixed_content->title); ?></h1>
                                                <h2><?php echo e($fixed_content->desc); ?></h2>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                    <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                        <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                                <ul class="hero-social-list">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                        </section>
                    <?php else: ?>
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php else: ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content) || isset($video)): ?>
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($video->video_link)): ?>
                                <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                     data-property="{videoURL:'<?php echo e($video->video_link); ?>',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                                                <h1><?php echo e($fixed_content->title); ?></h1>
                                                <h2><?php echo e($fixed_content->desc); ?></h2>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                    <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                        <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                                <ul class="hero-social-list">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                        </section>
                    <?php else: ?>
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                 data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                            </div>
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homepage_version->choose_version == 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                    <section class="hero-banner" data-scroll-index="1">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1><?php echo e($fixed_content->title); ?></h1>
                                        <h2><?php echo e($fixed_content->desc); ?></h2>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                            <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image)): ?>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                            <ul class="hero-social-list">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                    </section>
                <?php else: ?>
                    <section class="hero-banner" data-scroll-index="1">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1>
                                            Introduce Our
                                            Creative Agency.
                                        </h1>
                                        <h2>
                                            Always new beginnings can move the business forward.A user experience is
                                            required before service.Now is a great opportunity to work with our and move
                                            your brand forward.
                                        </h2>
                                        <a href="#" class="white-btn">
                                            <span class="text">View Works</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                    <div class="hero-img">
                                        <div class="border-line-outer">
                                            <div class="border-line-inner">
                                                <img src="<?php echo e(asset('uploads/img/general/demo-hero.png')); ?>" title="ajency image" class="img-fluid">
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
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php elseif($homepage_version->choose_version == 1): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                    <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                        <div id="heroparticles"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1><?php echo e($fixed_content->title); ?></h1>
                                        <h2><?php echo e($fixed_content->desc); ?></h2>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                            <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image)): ?>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                            <ul class="hero-social-list">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                    </section>
                <?php else: ?>
                    <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                        <div id="heroparticles"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1>
                                            Introduce Our
                                            Creative Agency.
                                        </h1>
                                        <h2>
                                            Always new beginnings can move the business forward.A user experience is
                                            required before service.Now is a great opportunity to work with our and move
                                            your brand forward.
                                        </h2>
                                        <a href="#" class="white-btn">
                                            <span class="text">View Works</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                    <div class="hero-img">
                                        <div class="border-line-outer">
                                            <div class="border-line-inner">
                                                <img src="<?php echo e(asset('uploads/img/general/demo-hero.png')); ?>" title="HovyLee phone image" alt="HovyLee phone image" class="img-fluid">
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
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php elseif($homepage_version->choose_version == 2): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content) || count($sliders) > 0): ?>
                    <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                                            <h1><?php echo e($fixed_content->title); ?></h1>
                                            <h2><?php echo e($fixed_content->desc); ?></h2>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                    <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                            <ul class="hero-social-list">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                    </section>
                <?php else: ?>
                    <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1>
                                            Introduce Our
                                            Creative Agency.
                                        </h1>
                                        <h2>
                                            Always new beginnings can move the business forward.A user experience is
                                            required before service.Now is a great opportunity to work with our and move
                                            your brand forward.
                                        </h2>
                                        <a href="#" class="white-btn">
                                            <span class="text">View Works</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
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
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content) || isset($video)): ?>
                    <section class="hero-banner" id="hero_video" data-scroll-index="1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($video->video_link)): ?>
                            <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                 data-property="{videoURL:'<?php echo e($video->video_link); ?>',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="hero-overlay"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                                            <h1><?php echo e($fixed_content->title); ?></h1>
                                            <h2><?php echo e($fixed_content->desc); ?></h2>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->btn_name)): ?>
                                                <a href="<?php if(!empty($fixed_content->btn_link)): ?> <?php echo e($fixed_content->btn_link); ?> <?php else: ?> # <?php endif; ?>" class="white-btn">
                                                    <span class="text"><?php echo e($fixed_content->btn_name); ?></span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0): ?>
                            <ul class="hero-social-list">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>"><i class="<?php echo e($social->social_media); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a href="#" data-scroll-nav="2" class="scroll-down-btn"><?php echo e(__('frontend.scroll_down')); ?></a>
                    </section>
                <?php else: ?>
                    <section class="hero-banner" id="hero_video" data-scroll-index="1">
                        <div id="video-background" data-video-bg="true" class="player bg-overlay"
                             data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                        </div>
                        <div class="hero-overlay"></div>
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                    <div class="hero-inner">
                                        <h1>
                                            Introduce Our
                                            Creative Agency.
                                        </h1>
                                        <h2>
                                            Always new beginnings can move the business forward.A user experience is
                                            required before service.Now is a great opportunity to work with our and move
                                            your brand forward.
                                        </h2>
                                        <a href="#" class="white-btn">
                                            <span class="text">View Works</span>
                                            <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                        </a>
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
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!--// Hero Section End //-->

        <!--// About Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['about_us_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($about)): ?>
            <section class="section about-section" id="about" data-scroll-index="2">
                <div class="container">
                    <div class="row about-row align-items-stretch">
                        <div class="col-lg-7 about-media-col">
                            <div class="section-heading-left about-section-heading">
                                <h2><?php echo e($about->section_title ?: __('frontend.about_us')); ?></h2>
                            </div>
                            <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                <img src="<?php echo e(asset('uploads/img/about/'.$about->about_image)); ?>" alt="About image" title="About image" class="img-fluid">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($about->video_link)): ?>
                                    <a class="about-video-btn" href="<?php echo e($about->video_link); ?>" aria-label="Play about video"><i class="fa fa-play"></i></a>
                                    <div class="video-border-line"></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5 about-content-col">
                            <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                <h2><?php echo e($about->title); ?></h2>
                                <p><?php echo e($about->desc); ?></p>
                                <div class="row about-info-grid">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $info_lists->chunk((int) max(1, ceil($info_lists->count() / 2))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mb-resp-15">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $info_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="about-info-item">
                                                        <div class="text">
                                                            <h5><?php echo e($item->title); ?></h5>
                                                            <p><?php echo e($item->desc); ?></p>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section about-section" id="about" data-scroll-index="2">
                <div class="container">
                    <div class="row about-row align-items-stretch">
                        <div class="col-lg-7 about-media-col">
                            <div class="section-heading-left about-section-heading">
                                <h2><?php echo e(__('frontend.about_us')); ?></h2>
                            </div>
                            <div class="about-img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                <img src="<?php echo e(asset('uploads/img/about/demo-about.png')); ?>" alt="About image" title="About image" class="img-fluid">
                                <a class="about-video-btn" href="https://www.youtube.com/watch?v=YqQx75OPRa0" aria-label="Play about video"><i class="fa fa-play"></i></a>
                                <div class="video-border-line"></div>
                            </div>
                        </div>
                        <div class="col-lg-5 about-content-col">
                            <div class="about-inner wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                <h2>We are here with 10 years of user experience</h2>
                                <p>
                                    We prevent loss of time and indecision in our works.
                                    We offer the best solution to the projects we take and do.
                                    Most of our customers and brands express their satisfaction.
                                    By working with us, we can appeal to a large audience and grow your business.
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
                                                    <h5>Technologies :</h5>
                                                    <p>Java, Php, C#, Python, Flutter</p>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// About Section End //-->

        <!--// Resume Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['feature_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($feature_section) || count($features) > 0): ?>
            <section class="section pb-minus-76 bg-primary-light" id="myresume">
                <div class="container">
                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($feature_section)): ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section-heading-left">
                                    <span><?php echo e($feature_section->section_title); ?></span>
                                    <h2><?php echo e($feature_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                       <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="row">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.<?php echo e($loop->index); ?>s">
                                <div class="resume-item">
                                    <div class="body">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($feature->type == "icon"): ?>
                                           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($feature->icon)): ?>
                                                <div class="icon-outer-line">
                                                    <div class="icon-inner-line">
                                                        <span class="<?php echo e($feature->icon); ?>"></span>
                                                    </div>
                                                </div>
                                               <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php else: ?>
                                            <img src="<?php echo e(asset('uploads/img/features/'.$feature->feature_image)); ?>" class="mr-2 ml-2 img-fluid">
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="text">
                                            <h5><?php echo e($feature->title); ?></h5>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($feature->desc)): ?> <span><?php echo e($feature->desc); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section pb-minus-76 bg-primary-light" id="myresume">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading-left">
                                <span>Features</span>
                                <h2>Our Features</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fab fa-google"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Business Stratagy</h5>
                                        <span>A clear vision and solid determination are required for a strategy to not just stay in theory, but to put into practice.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fab fa-wordpress"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Website Development</h5>
                                        <span>Web developers, or 'devs', do this by using a variety of coding languages.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.3s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fab fa-dribbble"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Marketing & Reporting</h5>
                                        <span>Marketing reporting is the process of measuring progress, showing value, and identifying actionable steps to improve marketing performance and meet your goals.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fas fa-mobile-alt"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Mobile App Development</h5>
                                        <span>Mobile app development is the act or process by which a mobile app is developed for mobile devices, such as personal digital assistants, enterprise digital assistants or mobile phones.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fab fa-amazon"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Sales Manager</h5>
                                        <span>A sales manager is someone who is responsible for leading and guiding a team of sales people in an organization.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.6s">
                            <div class="resume-item">
                                <div class="body">
                                    <div class="icon-outer-line">
                                        <div class="icon-inner-line">
                                            <span class="fab fa-behance"></span>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h5>Graphic Designer</h5>
                                        <span>Graphic design is a craft where professionals create visual content to communicate messages.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Resume Section End //-->

        <!--// Services Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['service_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_section) || count($services) > 0): ?>
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_section)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <span><?php echo e($service_section->section_title); ?></span>
                                    <h2><?php echo e($service_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                       <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="row">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.<?php echo e($loop->index); ?>s">
                                <div class="services-item">
                                    <div class="body">
                                        <h4>0<?php echo e($loop->index + 1); ?> </h4>
                                        <h5><?php echo e($service->title); ?></h5>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service->short_desc)): ?> <p><?php echo e($service->short_desc); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <a href="<?php echo e(route('service-page.show', ['service_slug' => $service->service_slug])); ?>"><?php echo e(__('frontend.read_more')); ?> <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service->icon)): ?>
                                        <div class="icon">
                                            <span class="<?php echo e($service->icon); ?>"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                       </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section pb-minus-70" id="services" data-scroll-index="3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <span>Services</span>
                                <h2>Our Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>01</h4>
                                    <h5>Web Design</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fa fa-tablet"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>02</h4>
                                    <h5>Graphic Design</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fa fa-adjust"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>03</h4>
                                    <h5>UI/UX Design</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fab fa-uikit"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>04</h4>
                                    <h5>Content Writing</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fa fa-blog"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>05</h4>
                                    <h5>Scripts & Plugin</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fa fa-code"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
                            <div class="services-item">
                                <div class="body">
                                    <h4>06</h4>
                                    <h5>Digital Marketing</h5>
                                    <p>
                                        It is a long established fact that a reader will be
                                        distracted by the readable content of a page when
                                        looking at its layout.
                                    </p>
                                    <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                                <div class="icon">
                                    <span class="fa fa-bullhorn"></span>
                                </div>
                                <div class="icon-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Services Section End //-->

        <!--// Counter Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['counter_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($counter_section) || count($counters) > 0): ?>
            <section class="section counters-section pb-minus-70" id="counters">
                <div class="counters-section-bg" aria-hidden="true"></div>
                <div class="container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($counter_section)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="section-heading light counters-heading">
                                    <h2><?php echo e($counter_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="row justify-content-center counters-grid">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
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
                            ?>
                            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.<?php echo e($loop->index + 1); ?>s">
                                <div class="counter-item">
                                    <div class="counter-item-icon"><i class="<?php echo e($counterIcon); ?>" aria-hidden="true"></i></div>
                                    <div class="counter-item-value">
                                        <h3 class="counter"><?php echo e($counter->timer); ?></h3>
                                        <span class="counter-suffix">+</span>
                                    </div>
                                    <p><?php echo e($counter->title); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section counters-section pb-minus-70" id="counters">
                <div class="counters-section-bg" aria-hidden="true"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-heading light counters-heading">
                                <h2>More than 10,000 customers trusted me</h2>
                            </div>
                        </div>
                    </div>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Counter Section End //-->

        <!--// How I Work Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['work_process_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_process_section) || count($work_processes) > 0): ?>
            <section class="section bg-dark-blue pb-30">
                <div class="container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($work_process_section)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <span><?php echo e($work_process_section->section_title); ?></span>
                                    <h2><?php echo e($work_process_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php $i = 1; $t = 1; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $work_processes->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work_process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row ni-work-process-row">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $work_process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.<?php echo e($i++); ?>s">
                                            <div class="how-i-work-item">
                                                <div class="number">
                                                    <span>0<?php echo e($t++); ?></span>
                                                </div>
                                                <div class="number-border"></div>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->image_status == "enable" && !empty($item->work_process_image)): ?>
                                                    <div class="img">
                                                        <img src="<?php echo e(asset('uploads/img/work_process/'.$item->work_process_image)); ?>" class="img-fluid" alt="How i work">
                                                    </div>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <div class="text">
                                                    <h5><?php echo e($item->title); ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>
            </section>
         <?php else: ?>
            <section class="section bg-dark-blue pb-30">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <span>How Our Work</span>
                                <h2>Our prepare your projects in 3 stages</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row ni-work-process-row">
                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s">
                            <div class="how-i-work-item">
                                <div class="number">
                                    <span>01</span>
                                </div>
                                <div class="number-border"></div>
                                <div class="img">
                                    <img src="<?php echo e(asset('uploads/img/work_process/demo-process-01.png')); ?>" class="img-fluid" alt="How i work">
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
                                    <img src="<?php echo e(asset('uploads/img/work_process/demo-process-01.png')); ?>" class="img-fluid" alt="How i work">
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
                                    <img src="<?php echo e(asset('uploads/img/work_process/demo-process-01.png')); ?>" class="img-fluid" alt="How i work">
                                </div>
                                <div class="text">
                                    <h5>Design</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
         <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// How I Work Section End //-->

        <!--// Skills Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['skill_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($skill) || count($skill_info_lists) > 0): ?>
            <section class="section skills-section" id="technology" data-scroll-index="5">
                <div class="container">
                    <div class="row skills-row align-items-stretch">
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($skill)): ?>
                            <div class="col-lg-6 skills-media-col wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                <div class="skills-img">
                                    <img src="<?php echo e(asset('uploads/img/skill/'.$skill->skill_image)); ?>" alt="Software technology" title="Software technology" class="img-fluid">
                                </div>
                            </div>
                          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="col-lg-6 skills-content-col wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="skills-inner">
                               <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($skill)): ?>
                                    <h2><?php echo e($skill->title); ?></h2>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($skill->desc)): ?> <p><?php echo e($skill->desc); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                   <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div class="row skills-cards">
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $skill_info_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill_info_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-sm-6 skills-item-resp">
                                            <div class="skills-item">
                                                <div class="skills-item-text">
                                                    <h5><?php echo e($skill_info_list->title); ?></h5>
                                                </div>
                                                <div class="body">
                                                    <h2 class="counter"><?php echo e($skill_info_list->percent_rate); ?></h2>
                                                    <div class="skills-progress-bar">
                                                        <div class="skills-progress-value slideInLeft wow" data-percent="<?php echo e($skill_info_list->percent_rate); ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section skills-section" id="technology" data-scroll-index="5">
                <div class="container">
                    <div class="row skills-row align-items-stretch">
                        <div class="col-lg-6 skills-media-col wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                            <div class="skills-img">
                                <img src="<?php echo e(asset('uploads/img/skill/demo-skill.png')); ?>" alt="Software technology" title="Software technology" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6 skills-content-col wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Skills Section End //-->

        <!--// My Works Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['portfolio_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($portfolio_section) || count($portfolios) > 0): ?>
            <section class="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
                <div class="container">
                    <div class="row">
                       <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($portfolio_section)): ?>
                            <div class="col-md-6">
                                <div class="section-heading-left">
                                    <span><?php echo e($portfolio_section->section_title); ?></span>
                                    <h2><?php echo e($portfolio_section->title); ?></h2>
                                </div>
                            </div>
                           <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="col-md-6">
                            <div class="portfolio-filter">
                                <a href="#" data-portfolio-filter="*" class="current"><?php echo e(__('frontend.all')); ?></a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $portfolio_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#" data-portfolio-filter=".<?php echo e($portfolio_category->portfolio_category_slug); ?>"><?php echo e($portfolio_category->category_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 portfolio-item <?php echo e($portfolio->portfolio_category->portfolio_category_slug); ?>">
                                <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="<?php echo e(portfolio_image_url($portfolio->thumbnail_image)); ?>" alt="Portfolio image" class="img-fluid">
                                            <a href="<?php echo e(portfolio_image_url($portfolio->thumbnail_image)); ?>" class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                    <div class="body">
                                        <div class="portfolio-details">
                                            <span><?php echo e($portfolio->portfolio_category->category_name); ?></span>
                                            <h5><?php echo e($portfolio->title); ?></h5>
                                        </div>
                                        <a href="<?php echo e(route('portfolio-page.show', ['portfolio_slug' => $portfolio->portfolio_slug])); ?>" class="portfolio-link">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
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
                        <?php
                            $demoProjects = [
                                ['slug' => 'ecommerce', 'cat' => 'Ecommerce', 'title' => 'Nova Commerce', 'img' => 'demo-nova-commerce.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Pulse Finance', 'img' => 'demo-pulse-finance.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Atlas Trails', 'img' => 'demo-atlas-trails.png'],
                                ['slug' => 'ui-ux', 'cat' => 'UI / UX', 'title' => 'Verdant Care', 'img' => 'demo-verdant-care.png'],
                                ['slug' => 'ui-ux', 'cat' => 'UI / UX', 'title' => 'Studio Arc', 'img' => 'demo-studio-arc.png'],
                                ['slug' => 'web-app', 'cat' => 'Web App', 'title' => 'Beacon LMS', 'img' => 'demo-beacon-lms.png'],
                            ];
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $demoProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 portfolio-item <?php echo e($demo['slug']); ?>">
                                <div class="portfolio-item-inner">
                                    <div class="portfolio-item-img">
                                        <img src="<?php echo e(asset('uploads/img/portfolio/'.$demo['img'])); ?>" alt="<?php echo e($demo['title']); ?>" class="img-fluid">
                                        <a href="<?php echo e(asset('uploads/img/portfolio/'.$demo['img'])); ?>" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                    <div class="body">
                                        <div class="portfolio-details">
                                            <span><?php echo e($demo['cat']); ?></span>
                                            <h5><?php echo e($demo['title']); ?></h5>
                                        </div>
                                        <a href="#" class="portfolio-link">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// My Works End //-->

        <!--// Team Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['team_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($team_section) || count($teams) > 0): ?>
            <section class="section" id="team">
                <div class="container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($team_section)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <span><?php echo e($team_section->section_title); ?></span>
                                    <h2><?php echo e($team_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="row">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.<?php echo e($loop->index + 1); ?>s">
                                <div class="team-card">
                                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->team_image)): ?>
                                        <div class="img">
                                            <img src="<?php echo e(asset('uploads/img/teams/'.$team->team_image)); ?>" alt="Team image">
                                        </div>
                                       <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="body">
                                        <div class="text">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->name)): ?> <h5><?php echo e($team->name); ?></h5> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->job)): ?> <p><?php echo e($team->job); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <div class="social">
                                            <ul>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->link_2)): ?> <li><a href="<?php echo e($team->link_2); ?>"><i class="fab fa-facebook-f"></i></a></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->link_3)): ?> <li><a href="<?php echo e($team->link_3); ?>"><i class="fab fa-twitter"></i></a></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->link_4)): ?> <li><a href="<?php echo e($team->link_4); ?>"><i class="fab fa-instagram"></i></a></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($team->link_5)): ?> <li><a href="<?php echo e($team->link_5); ?>"><i class="fab fa-linkedin"></i></a></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                       </div>
                </div>
            </section>
        <?php else: ?>
            <section class="section" id="team">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <span>Team</span>
                                <h2>Our Team</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.1s">
                            <div class="team-card">
                                <div class="img">
                                    <img src="<?php echo e(asset('uploads/img/teams/demo-team-01.png')); ?>" alt="Team image">
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
                                    <img src="<?php echo e(asset('uploads/img/teams/demo-team-01.png')); ?>" alt="Team image">
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
                                    <img src="<?php echo e(asset('uploads/img/teams/demo-team-01.png')); ?>" alt="Team image">
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Team Section End //-->

        <!--// Testimonial Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['client_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($testimonial_section) || count($testimonials) > 0): ?>
            <section class="section pb-minus-76 bg-primary-light">
                <div class="container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($testimonial_section)): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-heading-left">
                                    <span><?php echo e($testimonial_section->section_title); ?></span>
                                    <h2><?php echo e($testimonial_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="owl-carousel owl-theme" id="testimonialCarousel">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="testimonial-item">
                                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($testimonial->image_status == 1 && !empty($testimonial->testimonial_image)): ?>
                                        <div class="img">
                                            <img src="<?php echo e(asset('uploads/img/testimonials/'.$testimonial->testimonial_image)); ?>" alt="Testimonial image" class="img-fluid">
                                        </div>
                                       <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="body">
                                        <h5><?php echo e($testimonial->name); ?></h5>
                                        <span><?php echo e($testimonial->job); ?></span>
                                        <p><?php echo e($testimonial->desc); ?></p>
                                        <div class="rating">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i <= 5; $i++): ?>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($i < 3): ?>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $testimonial->star; $i++): ?>
                                                        <i class="fa fa-star"></i>
                                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <?php else: ?>
                                                    <i class="far fa-star"></i>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                    <span class="quote-icon">
                                    <i class="fas fa-quote-right"></i>
                                </span>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
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
                                    <img src="<?php echo e(asset('uploads/img/testimonials/demo-client-01.png')); ?>" alt="Testimonial image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/testimonials/demo-client-01.png')); ?>" alt="Testimonial image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/testimonials/demo-client-01.png')); ?>" alt="Testimonial image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/testimonials/demo-client-01.png')); ?>" alt="Testimonial image" class="img-fluid">
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Testimonial Section End //-->

        <!--// Blog Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['blog_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($blog_section) || count($recent_posts) > 0): ?>
            <section class="section pb-minus-76" id="blog">
                <div class="container">
                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($blog_section)): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-heading-left">
                                    <span><?php echo e($blog_section->section_title); ?></span>
                                    <h2><?php echo e($blog_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                       <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="owl-carousel owl-theme" id="blogCarousel">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="blog-item">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($recent_post->blog_image)): ?>
                                        <div class="blog-img">
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>">
                                                <img src="<?php echo e(asset('uploads/img/blogs/'.$recent_post->blog_image)); ?>" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="blog-img">
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>">
                                                <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <a href="#"><span><i class="far fa-user"></i><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recent_post->type == "with_this_account"): ?> <?php echo e($recent_post->author_name); ?> <?php else: ?> <?php echo e(__('frontend.anonymous')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span></a>
                                            <a href="#"><span><i class="far fa-bookmark"></i><?php echo e($recent_post->category_name); ?></span></a>
                                        </div>
                                        <h5>
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>"><?php echo e($recent_post->title); ?></a>
                                        </h5>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($recent_post->short_desc)): ?> <p><?php echo e($recent_post->short_desc); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>" class="blog-link">
                                            <?php echo e(__('frontend.read_more')); ?>

                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
        <section class="section pb-minus-76" id="blog">
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
                                    <img src="<?php echo e(asset('uploads/img/dummy/600x400.jpg')); ?>" alt="Blog image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/dummy/600x400.jpg')); ?>" alt="Blog image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/dummy/600x400.jpg')); ?>" alt="Blog image" class="img-fluid">
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
                                    <img src="<?php echo e(asset('uploads/img/dummy/600x400.jpg')); ?>" alt="Blog image" class="img-fluid">
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
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Blog Section End //-->

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['contact_section'] == 1): ?>
        <!--// Contact Section Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($contact_section) || count($contacts) > 0): ?>
            <section class="section contact-section" id="contact" data-scroll-index="7">
                <div class="container">
                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($contact_section)): ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-heading">
                                    <span><?php echo e($contact_section->section_title); ?></span>
                                    <h2><?php echo e($contact_section->title); ?></h2>
                                </div>
                            </div>
                        </div>
                      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="row contact-layout align-items-stretch">
                        <div class="col-lg-5">
                            <div class="contact-info-list">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="contact-info-item">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($contact->icon)): ?>
                                            <div class="icon">
                                                <span class="<?php echo e($contact->icon); ?>"></span>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="body">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($contact->title)): ?> <h5><?php echo e($contact->title); ?></h5> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($contact->desc)): ?> <p><?php echo e($contact->desc); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php
                                    $contactHasPhone = collect($contacts)->contains(function ($item) {
                                        $blob = strtolower(($item->icon ?? '').' '.($item->title ?? '').' '.($item->desc ?? ''));
                                        return str_contains($blob, 'phone') || str_contains($blob, 'whatsapp') || str_contains($blob, 'fa-phone');
                                    });
                                    $phoneText = !empty(optional($site_info ?? null)->phone) ? $site_info->phone : '+880 1700-000000';
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $contactHasPhone): ?>
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="body">
                                            <h5><?php echo e(__('frontend.phone')); ?></h5>
                                            <p>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty(optional($site_info ?? null)->phone)): ?>
                                                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site_info->phone)); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($phoneText); ?></a>
                                                <?php else: ?>
                                                    <?php echo e($phoneText); ?>

                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form-card">
                            <div class="contact-form-wrap">
                                    <form class="js-contact-form" action="<?php echo e(route('message.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control"  name="name" placeholder="<?php echo e(__('frontend.name')); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-form-group">
                                                <input type="email" class="form-control" name="email" placeholder="<?php echo e(__('frontend.email')); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-form-group">
                                                <input type="text" class="form-control" name="subject" placeholder="<?php echo e(__('frontend.subject')); ?>" required>
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
                                                    <span class="text"><?php echo e(__('frontend.send_message')); ?></span>
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
        <?php else: ?>
            <section class="section contact-section" id="contact" data-scroll-index="7">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-heading">
                                <span>Contact Me</span>
                                <h2>Contact Us</h2>
                            </div>
                        </div>
                    </div>
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
                                    <h5><?php echo e(__('frontend.phone')); ?></h5>
                                    <p><?php echo e(!empty(optional($site_info ?? null)->phone) ? $site_info->phone : '+880 1700-000000'); ?></p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-form-card">
                            <div class="contact-form-wrap">
                                <form class="js-contact-form" action="<?php echo e(route('message.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
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
                            <!--        <h5><?php echo e(__('frontend.subscribe_newsletter')); ?></h5>-->
                            <!--        <p>Receive the latest news updates</p>-->
                            <!--        <form action="<?php echo e(route('subscribe-section.store')); ?>" method="POST">-->
                            <!--            <?php echo csrf_field(); ?>-->
                            <!--            <div class="form-newsletter">-->
                            <!--                <input type="text" name="email" placeholder="<?php echo e(__('frontend.enter_email')); ?>" required>-->
                            <!--                <button><i class="fa fa-arrow-right"></i></button>-->
                            <!--            </div>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Contact Section End //-->

        <!--//Google Map Section Start //-->
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($contact_section->map_iframe)): ?>
            <div class="google-map">
                <iframe src="<?php echo e($contact_section->map_iframe); ?>" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Google Map Section End //-->
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!--// Footer Start //-->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['footer_section'] == 1): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($socials) > 0 || isset($site_info) || count($footer_pages) > 0): ?>
            <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title"><?php echo e(__('frontend.about_us')); ?></h6>
                                    <div class="footer-social-links">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($social->social_media === 'fab fa-whatsapp'): ?>
                                                <?php continue; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <?php
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
                                            ?>
                                            <a href="<?php if(!empty($social->link)): ?> <?php echo e($social->link); ?> <?php else: ?> # <?php endif; ?>" target="_blank" rel="noopener noreferrer">
                                                <i class="<?php echo e($social->social_media); ?>"></i>
                                                <span><?php echo e($socialLabel); ?></span>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget footer-widget-pl">
                                    <h6 class="footer-title"><?php echo e(__('frontend.customer_relationship')); ?></h6>
                                    <ul class="footer-links">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $footer_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($footer_page->page_slug, ['services', 'works', 'recent-works', 'case-studys', 'presentation', 'presentations'])): ?>
                                                <?php continue; ?>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <li>
                                                <a href="<?php echo e(route('any-page.show', ['page_slug' => $footer_page->page_slug])); ?>">
                                                    <i class="fas fa-angle-right"></i>
                                                    <span><?php echo e($footer_page->page_title); ?></span>
                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 footer-widget-resp">
                                <div class="footer-widget">
                                    <h6 class="footer-title">Contact Info</h6>
                                    <div class="footer-contact-info-wrap">
                                        <ul class="footer-contact-info-list">
                                           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_info->address)): ?>
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>Address in Details</h6>
                                                        <p><?php echo e($site_info->address); ?></p>
                                                    </div>
                                                </li>
                                               <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_info->phone)): ?>
                                                <li>
                                                    <i class="fab fa-whatsapp"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>WhatsApp</h6>
                                                        <p>
                                                            <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $site_info->phone)); ?>" target="_blank" rel="noopener noreferrer" class="text-white"><?php echo e($site_info->phone); ?></a>
                                                        </p>
                                                    </div>
                                                </li>
                                               <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_info->email)): ?>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <div class="footer-contact-body">
                                                        <h6>Email</h6>
                                                        <p>
                                                            <a href="mailto:<?php echo e($site_info->email); ?>" class="text-white"><?php echo e($site_info->email); ?></a>
                                                        </p>
                                                    </div>
                                                </li>
                                               <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_info->copyright)): ?>
                    <div class="copyright">
                        <div class="container">
                            <p class="copyright-text"><?php echo e($site_info->copyright); ?></p>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </footer>
        <?php else: ?>
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
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!--// Footer End //-->
    </main>
    <!--// Main Area End //-->

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($quick_access_button) && $quick_access_button->status == 1): ?>
        <a href="<?php echo e($quick_access_button->link); ?>" class="scroll-whatsapp-btn" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<!--// Page Wrapper End //-->


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['color_option_sidebar'] == 1): ?>
<div id="colorOptionsSidebar">
    <div class="color-options-wrap">
        <button type="button" id="colorOptionsSidebarToggle">
            <i class="fa fa-cog fa-spin"></i>
        </button>
        <div class="color-options-list">
            <span class="color-options-item default" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/default-color.css')); ?>"></span>
            <span class="color-options-item blue" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/blue-color.css')); ?>"></span>
            <span class="color-options-item red" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/red-color.css')); ?>"></span>
            <span class="color-options-item yellow" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/yellow-color.css')); ?>"></span>
            <span class="color-options-item green" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/green-color.css')); ?>"></span>
            <span class="color-options-item pink" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/pink-color.css')); ?>"></span>
            <span class="color-options-item turquose" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/turquose-color.css')); ?>"></span>
            <span class="color-options-item purple" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/purple-color.css')); ?>"></span>
            <span class="color-options-item blue2" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/blue-color-2.css')); ?>"></span>
            <span class="color-options-item orange" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/orange-color.css')); ?>"></span>
            <span class="color-options-item magenta" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/magenta-color.css')); ?>"></span>
            <span class="color-options-item orange2" data-skins-css-path="<?php echo e(asset('assets/frontend/css/skins/orange-color-2.css')); ?>"></span>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<!--// #colorOptionsSidebar //-->

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($section_arr['rtl_sidebar'] == 1): ?>
<div id="rtlSidebar">
    <button type="button" id="rtlToggle">RTL</button>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<!--// #rtlSidebar //-->

<!--// JQuery //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/jquery.min.js')); ?>"></script>
<!--// Popper //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/popper.min.js')); ?>"></script>
<!--// Bootstrap //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/bootstrap.min.js')); ?>"></script>
<!--// Images Loaded Js //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/images.loaded.min.js')); ?>"></script>
<!--// Wow Js //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/wow.min.js')); ?>"></script>
<!--// Magnific Popup //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/magnific.popup.min.js')); ?>"></script>
<!--// Waypoint Js //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/waypoint.min.js')); ?>"></script>
<!--// Counter Up Js //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/counter.up.min.js')); ?>"></script>
<!--// JQuery Easing Functions //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/jquery.easing.min.js')); ?>"></script>
<!--// Owl Carousel //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/owl.carousel.min.js')); ?>"></script>
<!--// Form Validate //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/validate.min.js')); ?>"></script>
<!--// Form Validate //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/custom.select.plugin.js')); ?>"></script>
<!--// Scroll It //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/scrollit.min.js')); ?>"></script>
<!--// Isotope Js //-->
<script src="<?php echo e(asset('assets/frontend/vendor/js/isotope.min.js')); ?>"></script>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homepage_version->choose_version == 1 || session()->get('choose_version') == 1): ?>
    <!--// Particles Js //-->
    <script src="<?php echo e(asset('assets/frontend/vendor/js/particles.js')); ?>"></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homepage_version->choose_version == 2 || session()->get('choose_version') == 2): ?>
    <!--// Zepto //-->
    <script src="<?php echo e(asset('assets/frontend/vendor/js/zepto.min.js')); ?>"></script>
    <!--// Vegas Slider //-->
    <script src="<?php echo e(asset('assets/frontend/vendor/js/vegas.slider.min.js')); ?>"></script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homepage_version->choose_version == 3 || session()->get('choose_version') == 3): ?>
    <!--// MB Youtube Player //-->
    <script src="<?php echo e(asset('assets/frontend/vendor/js/jquery.mb-ytb.min.js')); ?>"></script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<!--// Main Js //-->
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/ni-contact-form.js')); ?>?v=2"></script>
<!--// Dark / Light Mode //-->
<script src="<?php echo e(asset('assets/frontend/js/theme-mode.js')); ?>"></script>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('language_direction_from_dropdown')): ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->get('language_direction_from_dropdown') == 1): ?>

        <!-- Theme Main Js  -->
        <script src="<?php echo e(asset('assets/frontend/js/rtl-mode.js')); ?>"></script>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php elseif(isset($language)): ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($language->direction == 1): ?>

        <!-- Theme Main Js  -->
        <script src="<?php echo e(asset('assets/frontend/js/rtl-mode.js')); ?>"></script>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<!-- Vegas Slider  -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($homepage_version->choose_version == 2 || session()->get('choose_version') == 2): ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($sliders) > 0): ?>

    <script>
        jQuery(document).ready(function() {
            jQuery("#heroSliderContainer").vegas({
                slides: [
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(count($sliders) == 1): ?>

                    {
                        src: "<?php echo e(asset('uploads/img/sliders/'.$slider->slider_image)); ?>"
                    },
                    {
                        src: "<?php echo e(asset('uploads/img/sliders/'.$slider->slider_image)); ?>"
                    },

                        <?php endif; ?>

                    {
                        src: "<?php echo e(asset('uploads/img/sliders/'.$slider->slider_image)); ?>"
                    },

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                overlay: true,
                transition: 'fade2',
                animation: 'kenburnsUpLeft'
            });
        });
    </script>

<?php else: ?>

    <script>
        jQuery(document).ready(function() {
            jQuery("#heroSliderContainer").vegas({
                slides: [

                    {
                        src: "<?php echo e(asset('uploads/img/dummy/1920x1080.jpg')); ?>"
                    },

                    {
                        src: "<?php echo e(asset('uploads/img/dummy/1920x1080.jpg')); ?>"
                    },

                ],
                overlay: true,
                transition: 'fade2',
                animation: 'kenburnsUpLeft'
            });
        });
    </script>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


</body>
</html><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/home/index.blade.php ENDPATH**/ ?>