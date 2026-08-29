

<?php $__env->startSection('content'); ?>
<?php
    $activeCategorySlug = isset($category) ? $category->category_slug : null;
?>

    <section class="section pb-minus-76 page-content-offset" id="videos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-4">
                    <h1 class="ni-videos-title"><?php echo e(__('frontend.videos')); ?></h1>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($category)): ?>
                        <p class="ni-videos-subtitle"><?php echo e($category->category_name); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($categories) > 0): ?>
                <div class="ni-videos-filter portfolio-filter mb-4">
                    <a href="<?php echo e(route('video-page.index')); ?>" class="<?php echo e($activeCategorySlug === null ? 'current' : ''); ?>"><?php echo e(__('frontend.all')); ?></a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('video-page.category', ['category_slug' => $cat->category_slug])); ?>"
                           class="<?php echo e($activeCategorySlug === $cat->category_slug ? 'current' : ''); ?>">
                            <?php echo e($cat->category_name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($videos) > 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryId => $categoryVideos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $groupCategory = $categories->firstWhere('id', $categoryId)
                            ?? ($categoryVideos->first()?->category ?? null);
                    ?>
                    <div class="ni-videos-group mb-5">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeCategorySlug === null && $groupCategory): ?>
                            <h3 class="ni-videos-group__title"><?php echo e($groupCategory->category_name ?? ($categoryVideos->first()->category_name ?? '')); ?></h3>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="row">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categoryVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <article class="ni-video-card">
                                        <div class="ni-video-card__media">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($video->embedUrl()): ?>
                                                <iframe
                                                    src="<?php echo e($video->embedUrl()); ?>"
                                                    title="<?php echo e($video->title); ?>"
                                                    loading="lazy"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen
                                                ></iframe>
                                            <?php elseif($video->thumbnailUrl()): ?>
                                                <a href="<?php echo e($video->video_url); ?>" target="_blank" rel="noopener noreferrer">
                                                    <img src="<?php echo e($video->thumbnailUrl()); ?>" alt="<?php echo e($video->title); ?>" class="img-fluid" loading="lazy">
                                                </a>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <div class="ni-video-card__body">
                                            <h5 class="ni-video-card__title"><?php echo e($video->title); ?></h5>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($video->desc)): ?>
                                                <p class="ni-video-card__desc"><?php echo e($video->desc); ?></p>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <span class="ni-video-card__provider"><?php echo e(ucfirst($video->provider)); ?></span>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <p><?php echo e(__('frontend.updating')); ?></p>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/videos/index.blade.php ENDPATH**/ ?>