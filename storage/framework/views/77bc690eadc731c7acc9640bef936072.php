<?php
    $adminUserTabs = [
        [
            'label' => __('content.all_admin'),
            'url' => url('admin/admin-user'),
            'active' => request()->is('admin/admin-user')
                || request()->is('admin/admin-user/*/edit'),
        ],
        [
            'label' => __('content.add_admin_user'),
            'url' => url('admin/admin-user/create'),
            'active' => request()->is('admin/admin-user/create'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Admin user tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $adminUserTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/admin_user/partials/tabs.blade.php ENDPATH**/ ?>