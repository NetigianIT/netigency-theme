<?php
    $videoTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/video-category/create'),
            'active' => request()->is('admin/video-category*'),
        ],
        [
            'label' => __('content.add_video'),
            'url' => url('admin/video-item/create'),
            'active' => request()->is('admin/video-item/create'),
        ],
        [
            'label' => __('content.videos'),
            'url' => url('admin/video-item'),
            'active' => request()->is('admin/video-item')
                || request()->is('admin/video-item/*/edit'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Videos section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $videoTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/videos/partials/tabs.blade.php ENDPATH**/ ?>