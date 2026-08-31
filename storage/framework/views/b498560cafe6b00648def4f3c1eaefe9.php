<?php
    $blogTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/category/create'),
            'active' => request()->is('admin/category/create')
                || request()->is('admin/category/*/edit'),
        ],
        [
            'label' => __('content.blogs'),
            'url' => url('admin/blog'),
            'active' => request()->is('admin/blog')
                || request()->is('admin/blog/create')
                || request()->is('admin/blog/*/edit'),
        ],
        [
            'label' => __('content.blog_paginate'),
            'url' => url('admin/blog-paginate/create'),
            'active' => request()->is('admin/blog-paginate/create'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Blog section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $blogTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/blog/partials/tabs.blade.php ENDPATH**/ ?>