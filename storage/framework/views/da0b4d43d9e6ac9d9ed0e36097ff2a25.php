

<?php $__env->startSection('content'); ?>
<?php
    $detailMap = collect($details ?? [])->keyBy(function ($item) {
        return strtolower(trim((string) $item->title));
    });

    $pickDetail = function (array $keys) use ($detailMap) {
        foreach ($keys as $key) {
            if ($detailMap->has($key) && filled($detailMap[$key]->desc)) {
                return trim((string) $detailMap[$key]->desc);
            }
        }
        return null;
    };

    $githubUrl = $pickDetail(['github', 'github url', 'github link', 'repo', 'repository']);
    $projectUrl = $pickDetail(['project url', 'live url', 'live demo', 'demo', 'url', 'link', 'website', 'live']);
    $videoUrl = $pickDetail(['video', 'youtube', 'video url', 'youtube url']);
    $techRaw = $pickDetail(['tech stack', 'tech', 'technology', 'technologies', 'tags', 'stack']);
    $techTags = $techRaw
        ? array_values(array_filter(array_map('trim', preg_split('/[,|\/]+/', $techRaw))))
        : [];

    $skipKeys = ['github', 'github url', 'github link', 'repo', 'repository', 'project url', 'live url', 'live demo', 'demo', 'url', 'link', 'website', 'live', 'video', 'youtube', 'video url', 'youtube url', 'tech stack', 'tech', 'technology', 'technologies', 'tags', 'stack'];
    $infoBar = collect($details ?? [])
        ->reject(fn ($item) => in_array(strtolower(trim((string) $item->title)), $skipKeys, true))
        ->take(4)
        ->values();

    if ($infoBar->isEmpty()) {
        $infoBar = collect([
            (object) ['title' => 'Client', 'desc' => 'Guest'],
            (object) ['title' => 'Date', 'desc' => \Carbon\Carbon::parse($portfolio->created_at)->format('F Y')],
            (object) ['title' => 'Category', 'desc' => $portfolio->category_name],
            (object) ['title' => 'Services', 'desc' => $portfolio->category_name],
        ]);
    }

    $youtubeId = null;
    if (!empty($videoUrl) && preg_match('/(?:youtu\.be\/|v=|embed\/)([A-Za-z0-9_-]{6,})/', $videoUrl, $m)) {
        $youtubeId = $m[1];
    }

    $shortDesc = $portfolio->meta_desc
        ?: \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($portfolio->desc)))), 160);

    $backUrl = url('/#porfolio');
?>

    <section class="section page-content-offset ni-detail-page ni-detail-page--portfolio" id="portfolio-single-page">
        <div class="container">
            <div class="ni-detail-hero">
                <div class="ni-detail-hero__text">
                    <h1 class="ni-detail-hero__title"><?php echo e($portfolio->title); ?></h1>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($shortDesc)): ?>
                        <p class="ni-detail-hero__lead"><?php echo e($shortDesc); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="ni-detail-hero__actions">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($githubUrl)): ?>
                        <a class="ni-detail-btn ni-detail-btn--ghost" href="<?php echo e($githubUrl); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github" aria-hidden="true"></i>
                            <span>GitHub</span>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($projectUrl)): ?>
                        <a class="ni-detail-btn ni-detail-btn--primary" href="<?php echo e($projectUrl); ?>" target="_blank" rel="noopener noreferrer">
                            <span>View Project</span>
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <a class="ni-detail-back" href="<?php echo e($backUrl); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span>Back to Portfolio</span>
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
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($youtubeId): ?>
                            <div class="ni-detail-video">
                                <iframe
                                    src="https://www.youtube.com/embed/<?php echo e($youtubeId); ?>?rel=0"
                                    title="<?php echo e($portfolio->title); ?> video"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    loading="lazy"></iframe>
                            </div>
                        <?php elseif(count($sliders) > 0): ?>
                            <img src="<?php echo e(asset('uploads/img/portfolio/slider/'.$sliders->first()->portfolio_image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid" fetchpriority="high" decoding="async">
                        <?php elseif(!empty($portfolio->thumbnail_image)): ?>
                            <img src="<?php echo e(asset('uploads/img/portfolio/'.$portfolio->thumbnail_image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid" fetchpriority="high" decoding="async">
                        <?php else: ?>
                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ni-detail-media__side">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($sliders) > 1 || (count($sliders) === 1 && $youtubeId)): ?>
                            <div class="owl-carousel owl-theme ni-detail-side-carousel" id="portfolioSideCarousel">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$youtubeId && $loop->first): ?>
                                        <?php continue; ?>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="item">
                                        <img src="<?php echo e(asset('uploads/img/portfolio/slider/'.$slider->portfolio_image)); ?>" alt="<?php echo e($portfolio->title); ?> gallery" class="img-fluid" loading="lazy" decoding="async">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php elseif(count($sliders) === 1): ?>
                            <div class="ni-detail-side-panel">
                                <img src="<?php echo e(asset('uploads/img/portfolio/slider/'.$sliders->first()->portfolio_image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid" loading="lazy" decoding="async">
                            </div>
                        <?php else: ?>
                            <div class="ni-detail-side-panel ni-detail-side-panel--empty">
                                <div class="ni-detail-wire">
                                    <span></span><span></span><span></span>
                                </div>
                                <p><?php echo e($portfolio->category_name); ?></p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="ni-detail-body">
                <h2 class="ni-detail-body__title">
                    <i class="fas fa-globe" aria-hidden="true"></i>
                    <span><?php echo e($portfolio->title); ?></span>
                </h2>

                <div class="ni-detail-body__block">
                    <h3 class="ni-detail-body__label">Overview</h3>
                    <div class="ni-detail-body__content">
                        <?php echo html_entity_decode($portfolio->desc); ?>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($techTags) > 0): ?>
                    <div class="ni-detail-body__block">
                        <h3 class="ni-detail-body__heading">
                            <i class="fas fa-tools" aria-hidden="true"></i>
                            <span>Tech Stack</span>
                        </h3>
                        <p class="ni-detail-body__stack-text"><?php echo e(implode(', ', $techTags)); ?></p>
                    </div>
                    <div class="ni-detail-tags">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $techTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="ni-detail-tag"><?php echo e($tag); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php elseif(!empty($portfolio->category_name)): ?>
                    <div class="ni-detail-tags">
                        <span class="ni-detail-tag"><?php echo e($portfolio->category_name); ?></span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="ni-detail-share">
                    <span class="ni-detail-share__label">Share</span>
                    <a href="<?php echo e($portfolio->getShareUrl('twitter')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo e($portfolio->getShareUrl('whatsapp')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="<?php echo e($portfolio->getShareUrl('pinterest')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/portfolio/show.blade.php ENDPATH**/ ?>