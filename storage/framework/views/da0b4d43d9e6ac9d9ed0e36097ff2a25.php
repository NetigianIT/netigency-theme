

<?php $__env->startSection('content'); ?>

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" <?php if($portfolio->breadcrumb_status == 1 && !empty($portfolio->custom_breadcrumb_image)): ?>  data-bg-image-path = "<?php echo e(asset('uploads/img/portfolio/breadcrumb/'.$portfolio->custom_breadcrumb_image)); ?>"
             <?php elseif(isset($breadcrumb)): ?> data-bg-image-path = "<?php echo e(asset('uploads/img/general/'.$breadcrumb->breadcrumb_image)); ?>"
             <?php else: ?> data-bg-image-path="<?php echo e(asset('uploads/img/dummy/1920x350.jpg')); ?>"
            <?php endif; ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1><?php echo e($portfolio->title); ?></h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('frontend.home')); ?></a>
                            </li>
                            <li class="active">
                                <?php echo e($portfolio->title); ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Portfolio Single Section Start //-->
    <section class="section portfolio-single-section" id="portfolio-single-page">
        <div class="container">
            <div class="row portfolio-single-row align-items-start">
                <div class="col-lg-8 portfolio-single-main">
                    <div class="portfolio-single-card">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($sliders) > 0): ?>
                            <div class="owl-carousel owl-theme portfolio-single-media" id="portfolioCarousel">
                               <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <img src="<?php echo e(asset('uploads/img/portfolio/slider/'.$slider->portfolio_image)); ?>" alt="image" class="img-fluid">
                                    </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="portfolio-single-inner">
                            <h4><?php echo e($portfolio->title); ?></h4>
                            <div class="author-meta">
                                <a href="#"><span class="far fa-calendar-alt"></span><?php echo e(Carbon\Carbon::parse($portfolio->created_at)->isoFormat('DD')); ?> <?php echo e(Carbon\Carbon::parse($portfolio->created_at)->isoFormat('MMMM')); ?> <?php echo e(Carbon\Carbon::parse($portfolio->created_at)->isoFormat('GGGG')); ?></a>
                                <a href="#"><span class="far fa-bookmark"></span><?php echo e($portfolio->category_name); ?></a>
                            </div>
                            <div class="portfolio-single-desc">
                                <p><?php echo html_entity_decode($portfolio->desc); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 portfolio-single-aside">
                    <div class="widget-sidebar">
                       <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($details) > 0): ?>
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title"><?php echo e(__('frontend.portfolio_details')); ?></h5>
                                <div class="sidebar-details-list">
                                    <ul>
                                       <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><h6><?php echo e($detail->title); ?><span><?php echo e($detail->desc); ?></span></h6></li>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                           <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title"><?php echo e(__('frontend.categories')); ?></h5>
                            <ul class="sidebar-category-list clearfix">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $portfolio_count_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio_count_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if($portfolio_count_category->portfolio_category->category_name == $portfolio->category_name): ?> active <?php endif; ?>">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($portfolio_count_category->portfolio_category->portfolio_category_slug)): ?>
                                            <a href="<?php echo e(url('portfolio/category/'.$portfolio_count_category->portfolio_category->portfolio_category_slug)); ?>"><?php echo e($portfolio_count_category->portfolio_category->category_name); ?><span class="category-count">(<?php echo e($portfolio_count_category->category_count); ?>)</span></a>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                           <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($recent_posts) > 0): ?>
                               <div class="sidebar-widgets">
                                   <h5 class="inner-header-title"><?php echo e(__('frontend.recent_posts')); ?></h5>
                                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="recent-post-item clearfix">
                                           <div class="recent-post-img mr-3">
                                               <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>">
                                                   <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($recent_post->blog_image)): ?>
                                                       <img src="<?php echo e(asset('uploads/img/blogs/'.$recent_post->blog_image)); ?>" class="img-fluid image-size-100" alt="blog image">
                                                   <?php else: ?>
                                                       <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" class="img-fluid image-size-100"  alt="blog image">
                                                   <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                               </a>
                                           </div>
                                           <div class="recent-post-body">
                                               <a href="<?php echo e(route('blog-page.show', ['slug' => $recent_post->slug])); ?>">
                                                   <h6 class="recent-post-title"><?php echo e($recent_post->title); ?></h6>
                                               </a>
                                               <p class="recent-post-date"><i class="far fa-calendar-alt"></i><?php echo e(Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD')); ?> <?php echo e(Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM')); ?> <?php echo e(Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG')); ?></p>
                                           </div>
                                       </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                               </div>
                           <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                           <div class="sidebar-widgets">
                               <h5 class="inner-header-title"><?php echo e(__('frontend.share')); ?></h5>
                               <ul class="sidebar-share clearfix">
                                   <li>
                                       <a href="<?php echo e($portfolio->getShareUrl('twitter')); ?>" target="_blank">
                                           <i class="fab fa-twitter"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="<?php echo e($portfolio->getShareUrl('whatsapp')); ?>" target="_blank">
                                           <i class="fab fa-whatsapp"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="<?php echo e($portfolio->getShareUrl('pinterest')); ?>" target="_blank">
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
    <!--// Portfolio Single Section End //-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/portfolio/show.blade.php ENDPATH**/ ?>