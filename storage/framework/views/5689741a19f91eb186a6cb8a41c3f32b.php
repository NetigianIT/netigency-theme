

<?php $__env->startSection('content'); ?>

    <?php
        $pageSlug = strtolower((string) ($page->page_slug ?? ''));
        $pageTitle = strtolower((string) ($page->page_title ?? ''));
        $isFaqPage = str_contains($pageSlug, 'faq')
            || str_contains($pageSlug, 'frequently-asked')
            || str_contains($pageTitle, 'faq');
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($isFaqPage)): ?>
        <!--// Breadcrumb Section Start //-->
        <section class="breadcrumb-section section" data-scroll-index="1" <?php if(isset($breadcrumb)): ?> data-bg-image-path = "<?php echo e(asset('uploads/img/general/'.$breadcrumb->breadcrumb_image)); ?>"
                 <?php else: ?> data-bg-image-path="<?php echo e(asset('uploads/img/dummy/1920x350.jpg')); ?>"
                 <?php endif; ?>>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb-inner">
                            <h1><?php echo e($page->page_title); ?></h1>
                            <ul class="breadcrumb-links">
                                <li>
                                    <a href="<?php echo e(url('/')); ?>"><?php echo e(__('frontend.home')); ?></a>
                                </li>
                                <li class="active">
                                    <?php echo e($page->page_title); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Breadcrumb Section end //-->
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!--// Page Content Start //-->
    <section class="section <?php echo e($isFaqPage ? 'page-faq-section' : ''); ?>">
        <div class="container">
            <div class="row">
                <div class="<?php echo e($isFaqPage ? 'col-lg-10 col-md-12 mx-auto' : 'col-lg-8 col-md-12'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isFaqPage): ?>
                        <div class="section-heading page-faq-heading">
                            <h1><?php echo e($page->page_title); ?></h1>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="services-detail-inner">
                        <p><?php echo html_entity_decode($page->desc); ?></p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($isFaqPage)): ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-sidebar">
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title"><?php echo e(__('frontend.share')); ?></h5>
                                <ul class="sidebar-share clearfix">
                                    <li>
                                        <a href="<?php echo e($page->getShareUrl('twitter')); ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e($page->getShareUrl('whatsapp')); ?>" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e($page->getShareUrl('pinterest')); ?>" target="_blank">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <!--// Page Content End //-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/page/show.blade.php ENDPATH**/ ?>