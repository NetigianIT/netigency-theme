<?php
    $portfolioTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/portfolio-category/create'),
            'active' => request()->is('admin/portfolio-category/create')
                || request()->is('admin/portfolio-category/*/edit'),
        ],
        [
            'label' => __('content.portfolios'),
            'url' => url('admin/portfolio'),
            'active' => request()->is('admin/portfolio')
                || request()->is('admin/portfolio/create')
                || request()->is('admin/portfolio/*/edit')
                || request()->is('admin/portfolio-slider*')
                || request()->is('admin/portfolio-detail*'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Portfolio section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $portfolioTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/portfolio/partials/tabs.blade.php ENDPATH**/ ?>