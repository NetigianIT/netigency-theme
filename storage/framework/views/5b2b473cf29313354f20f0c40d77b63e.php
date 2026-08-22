

<?php $__env->startSection('content'); ?>
<?php
    $shortDesc = $service->short_desc
        ?: ($service->meta_desc ?? null)
        ?: \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($service->desc)))), 160);

    $infoBar = collect($details ?? [])->take(4)->values();
    if ($infoBar->isEmpty()) {
        $infoBar = collect([
            (object) ['title' => 'Service', 'desc' => $service->title],
            (object) ['title' => 'Date', 'desc' => \Carbon\Carbon::parse($service->created_at)->format('F Y')],
            (object) ['title' => 'Status', 'desc' => ((int) $service->status === 1) ? 'Published' : 'Draft'],
            (object) ['title' => 'Type', 'desc' => 'Professional'],
        ]);
    }

    $relatedServices = collect($related_services ?? []);
    $sideItems = $relatedServices->isNotEmpty()
        ? $relatedServices
        : collect($recent_posts ?? []);
    $sideIsService = $relatedServices->isNotEmpty();
?>

    <section class="section page-content-offset ni-detail-page ni-detail-page--service" id="service-sidebar-page">
        <div class="container">
            <div class="ni-detail-hero">
                <div class="ni-detail-hero__text">
                    <h1 class="ni-detail-hero__title"><?php echo e($service->title); ?></h1>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($shortDesc)): ?>
                        <p class="ni-detail-hero__lead"><?php echo e($shortDesc); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="ni-detail-hero__actions">
                    <a class="ni-detail-btn ni-detail-btn--primary" href="<?php echo e(url('/#services')); ?>">
                        <span><?php echo e(__('frontend.services')); ?></span>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="ni-detail-back" href="<?php echo e(url('/#services')); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span>Back to Services</span>
                    </a>
                </div>
            </div>

            <div class="ni-detail-meta">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $infoBar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ni-detail-meta__item">
                        <span class="ni-detail-meta__label"><?php echo e($item->title); ?></span>
                        <span class="ni-detail-meta__value"><?php echo e($item->desc); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="row ni-detail-media">
                <div class="col-lg-7">
                    <div class="ni-detail-media__main">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->image_status == 'enable' && !empty($service->service_image)): ?>
                            <img src="<?php echo e(asset('uploads/img/service/'.$service->service_image)); ?>" alt="<?php echo e($service->title); ?>" class="img-fluid" fetchpriority="high" decoding="async">
                        <?php else: ?>
                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="<?php echo e($service->title); ?>" class="img-fluid">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service->icon)): ?>
                            <span class="ni-detail-service-icon <?php echo e($service->icon); ?>" aria-hidden="true"></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ni-detail-media__side">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sideItems->count() > 0): ?>
                            <div class="owl-carousel owl-theme ni-detail-side-carousel" id="serviceSideCarousel">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sideItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sideItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sideIsService): ?>
                                            <a class="ni-detail-side-card" href="<?php echo e(route('service-page.show', ['service_slug' => $sideItem->service_slug])); ?>">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($sideItem->service_image)): ?>
                                                    <img src="<?php echo e(asset('uploads/img/service/'.$sideItem->service_image)); ?>" alt="<?php echo e($sideItem->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="<?php echo e($sideItem->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <div class="ni-detail-side-card__overlay">
                                                    <span>Service</span>
                                                    <h4><?php echo e($sideItem->title); ?></h4>
                                                </div>
                                            </a>
                                        <?php else: ?>
                                            <a class="ni-detail-side-card" href="<?php echo e(route('blog-page.show', ['slug' => $sideItem->slug])); ?>">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($sideItem->blog_image)): ?>
                                                    <img src="<?php echo e(asset('uploads/img/blogs/'.$sideItem->blog_image)); ?>" alt="<?php echo e($sideItem->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="<?php echo e($sideItem->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                <div class="ni-detail-side-card__overlay">
                                                    <span>Recent</span>
                                                    <h4><?php echo e($sideItem->title); ?></h4>
                                                </div>
                                            </a>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="ni-detail-side-panel ni-detail-side-panel--empty">
                                <div class="ni-detail-wire">
                                    <span></span><span></span><span></span>
                                </div>
                                <p><?php echo e($service->title); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="ni-detail-body">
                <h2 class="ni-detail-body__title">
                    <i class="fas fa-cogs" aria-hidden="true"></i>
                    <span><?php echo e($service->title); ?></span>
                </h2>

                <div class="ni-detail-body__block">
                    <h3 class="ni-detail-body__label">Overview</h3>
                    <div class="ni-detail-body__content">
                        <?php echo html_entity_decode($service->desc); ?>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($details) > 0): ?>
                    <div class="ni-detail-body__block">
                        <h3 class="ni-detail-body__label"><?php echo e(__('frontend.service_details')); ?></h3>
                        <div class="ni-detail-service-list">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ni-detail-service-list__item">
                                    <h4><?php echo e($detail->title); ?></h4>
                                    <p><?php echo e($detail->desc); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="ni-detail-share">
                    <span class="ni-detail-share__label"><?php echo e(__('frontend.share')); ?></span>
                    <a href="<?php echo e($service->getShareUrl('twitter')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo e($service->getShareUrl('whatsapp')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="<?php echo e($service->getShareUrl('pinterest')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                </div>

                <div class="ni-detail-newsletter">
                    <div class="ni-detail-newsletter__icon"><i class="fa fa-envelope-open-text"></i></div>
                    <div class="ni-detail-newsletter__text">
                        <h5><?php echo e(__('frontend.subscribe_newsletter')); ?></h5>
                        <p>Receive the latest news updates</p>
                    </div>
                    <form class="ni-detail-newsletter__form" action="<?php echo e(route('subscribe-section.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="email" name="email" placeholder="<?php echo e(__('frontend.enter_email')); ?>" required>
                        <button type="submit" aria-label="Subscribe"><i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/service/show.blade.php ENDPATH**/ ?>