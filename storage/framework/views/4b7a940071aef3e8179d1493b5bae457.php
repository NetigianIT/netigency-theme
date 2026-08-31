<?php
    $settingTabs = [
        [
            'label' => __('content.site_info'),
            'url' => url('admin/site-info/create'),
            'active' => request()->is('admin/site-info/create'),
        ],
        [
            'label' => __('content.site_images'),
            'url' => url('admin/site-image/create'),
            'active' => request()->is('admin/site-image/create'),
        ],
        [
            'label' => __('content.google_analytic'),
            'url' => url('admin/google-analytic/create'),
            'active' => request()->is('admin/google-analytic/create'),
        ],
        [
            'label' => __('content.seo'),
            'url' => url('admin/seo/create'),
            'active' => request()->is('admin/seo/create'),
        ],
        [
            'label' => __('content.particles_status'),
            'url' => url('admin/hero-particles/create'),
            'active' => request()->is('admin/hero-particles/create'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Settings section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $settingTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/setting/partials/tabs.blade.php ENDPATH**/ ?>