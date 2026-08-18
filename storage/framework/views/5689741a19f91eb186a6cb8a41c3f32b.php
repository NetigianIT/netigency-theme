

<?php $__env->startSection('content'); ?>

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

    <!--// Services Section Start //-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Include Alert Blade -->
                    <?php echo $__env->make('frontend.alert.alert-subscribe', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-detail-inner">
                        <p><?php echo html_entity_decode($page->desc); ?></p>
                    </div>
                </div>
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
                        <div class="sidebar-widgets">
                            <div class="subscribe-newsletter">
                                <div class="subscribe-newsletter-text">
                                    <div class="icon">
                                        <span class="fa fa-envelope-open-text"></span>
                                    </div>
                                    <h5><?php echo e(__('frontend.subscribe_newsletter')); ?></h5>
                                    <p>Receive the latest news updates</p>
                                    <form action="<?php echo e(route('subscribe-section.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-newsletter">
                                            <input type="text" name="email" placeholder="<?php echo e(__('frontend.enter_email')); ?>" required>
                                            <button><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Services Section End //-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/page/show.blade.php ENDPATH**/ ?>