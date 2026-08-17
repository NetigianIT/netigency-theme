<!DOCTYPE html>
<html dir="<?php if(session()->has('language_direction_from_dropdown')): ?> <?php if(session()->get('language_direction_from_dropdown') == 1): ?> <?php echo e(__('rtl')); ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?> <?php else: ?> <?php echo e(__('ltr')); ?> <?php endif; ?>" lang="<?php if(session()->has('language_code_from_dropdown')): ?><?php echo e(str_replace('_', '-', session()->get('language_code_from_dropdown'))); ?><?php else: ?><?php echo e(str_replace('_', '-',   $language->language_code)); ?><?php endif; ?>">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="<?php if(isset($blog)): ?> <?php echo e($blog->title); ?> <?php elseif(isset($service)): ?> <?php echo e($service->title); ?> <?php elseif(isset($portfolio->title)): ?> <?php echo e($portfolio->title); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta name="description" content="<?php if(isset($blog)): ?> <?php echo e($blog->meta_desc); ?> <?php elseif(isset($service)): ?> <?php echo e($service->meta_desc); ?> <?php elseif(isset($portfolio)): ?> <?php echo e($portfolio->meta_desc); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">
    <meta name="keywords" content="<?php if(isset($blog)): ?> <?php echo e($blog->meta_keyword); ?> <?php elseif(isset($service)): ?> <?php echo e($service->meta_keyword); ?> <?php elseif(isset($portfolio)): ?> <?php echo e($portfolio->meta_keyword); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_keywords); ?> <?php endif; ?> ">
    <meta name="author" content="Netigian IT">
    <meta property="fb:app_id" content="<?php if(isset($general_seo)): ?><?php echo e($general_seo->fb_app_id); ?> <?php endif; ?>">
    <meta property="og:title" content="<?php if(isset($blog)): ?> <?php echo e($blog->title); ?> <?php elseif(isset($service)): ?> <?php echo e($service->title); ?> <?php elseif(isset($portfolio->title)): ?> <?php echo e($portfolio->title); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:description" content="<?php if(isset($blog)): ?> <?php echo e($blog->meta_desc); ?> <?php elseif(isset($service)): ?> <?php echo e($service->meta_desc); ?> <?php elseif(isset($portfolio)): ?> <?php echo e($portfolio->meta_desc); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">
    <meta property="og:image" content="<?php if(!empty($blog->blog_image)): ?> <?php echo e(asset('uploads/img/blogs/thumbnail/'.$blog->blog_image)); ?> <?php elseif(!empty($service->service_image)): ?> <?php echo e(asset('uploads/img/service/'.$service->service_image)); ?> <?php elseif(!empty($portfolio->thumbnail_image)): ?> <?php elseif(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta itemprop="image" content="<?php if(!empty($blog->blog_image)): ?> <?php echo e(asset('uploads/img/blogs/thumbnail/'.$blog->blog_image)); ?> <?php elseif(!empty($service->service_image)): ?> <?php echo e(asset('uploads/img/service/'.$service->service_image)); ?> <?php elseif(!empty($portfolio->thumbnail_image)): ?> <?php elseif(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php if(!empty($blog->blog_image)): ?> <?php echo e(asset('uploads/img/blogs/thumbnail/'.$blog->blog_image)); ?> <?php elseif(!empty($service->service_image)): ?> <?php echo e(asset('uploads/img/service/'.$service->service_image)); ?> <?php elseif(!empty($portfolio->thumbnail_image)): ?> <?php elseif(!empty($general_site_image->favicon_image)): ?><?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?> <?php endif; ?>">
    <meta property="twitter:title" content="<?php if(isset($blog)): ?> <?php echo e($blog->title); ?> <?php elseif(isset($service)): ?> <?php echo e($service->title); ?> <?php elseif(isset($portfolio->title)): ?> <?php echo e($portfolio->title); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?>">
    <meta property="twitter:description" content="<?php if(isset($blog)): ?> <?php echo e($blog->meta_desc); ?> <?php elseif(isset($service)): ?> <?php echo e($service->meta_desc); ?> <?php elseif(isset($portfolio)): ?> <?php echo e($portfolio->meta_desc); ?> <?php elseif(isset($general_seo)): ?><?php echo e($general_seo->site_desc); ?> <?php endif; ?>">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!--Pinterest -->
    <meta name="p:domain_verify" content="2a746982a858a3c81ba075ac647402e5"/>

    <!-- Title -->
    <title><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($general_seo)): ?><?php echo e($general_seo->site_name); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($blog)): ?> <?php echo e($blog->title); ?> <?php elseif(isset($service)): ?> <?php echo e($service->title); ?> <?php elseif(isset($portfolio->title)): ?> <?php echo e($portfolio->title); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></title>

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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($general_site_image->favicon_image)): ?>
    <!-- Favicon -->
        <link href="<?php echo e(asset('uplods/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo e(asset('uploads/img/general/'.$general_site_image->favicon_image)); ?>" sizes="128x128" rel="shortcut icon" />
<?php else: ?>
    <!-- Favicon -->
        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="<?php echo e(asset('uploads/img/dummy/favicon.png')); ?>" sizes="128x128" rel="shortcut icon" />
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!--// Bootstrap  //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/bootstrap.min.css')); ?>">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/magnific.popup.min.css')); ?>">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/vendor/css/animate.min.css')); ?>">
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/theme-mode.css')); ?>?v=72">
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
        .header .nav-item .nav-link,.header-shrink .nav-item .nav-link{padding:8px 16px!important;line-height:24px!important}
        .header .navbar-brand{padding:0!important;margin:0!important;line-height:1!important;display:flex!important;align-items:center!important}
        .header .navbar-brand img{height:60px!important;max-height:60px!important;width:auto!important;max-width:none!important;object-fit:contain}
        @media (max-width:991.98px){.header .navbar{min-height:56px!important;height:56px!important;padding-top:4px!important;padding-bottom:4px!important}.header .navbar-brand img{height:48px!important;max-height:48px!important}}
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
                                <a class="nav-link menu-link" href="<?php echo e(url('/')); ?>"><?php echo e(__('frontend.home')); ?></a>
                            </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($section_arr['service_section'] ?? 0) == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?php echo e(url('/#services')); ?>"><?php echo e(__('frontend.services')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($section_arr['portfolio_section'] ?? 0) == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?php echo e(url('/#porfolio')); ?>"><?php echo e(__('frontend.portfolio')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($section_arr['blog_section'] ?? 0) == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link <?php echo e(request()->is('blogs*') ? 'active' : ''); ?>" href="<?php echo e(route('blog-page.index')); ?>"><?php echo e(__('frontend.blogs')); ?></a>
                            </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($section_arr['page_menu'] ?? 0) == 1): ?>
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

        <?php echo $__env->yieldContent('content'); ?>

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
                                                            <h6><?php echo e(__('frontend.address')); ?></h6>
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

</div>
<!--// Page Wrapper End //-->


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
<!--// Main Js //-->
<script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
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


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2WBM4S3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script src="<?php echo e(asset('assets/frontend/js/ni-select.js')); ?>?v=1"></script>
<script src="<?php echo e(asset('assets/frontend/js/ni-spa-nav.js')); ?>?v=1"></script>

</body>
</html><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/layouts/frontend/master.blade.php ENDPATH**/ ?>