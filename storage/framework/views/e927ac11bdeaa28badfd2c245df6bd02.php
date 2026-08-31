<?php
    $adminRoleTabs = [
        [
            'label' => __('content.admin_roles'),
            'url' => url('admin/admin-role'),
            'active' => request()->is('admin/admin-role')
                || request()->is('admin/admin-role/*/edit'),
        ],
        [
            'label' => __('content.add_admin_role'),
            'url' => url('admin/admin-role/create'),
            'active' => request()->is('admin/admin-role/create'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Admin role tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $adminRoleTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/admin_role/partials/tabs.blade.php ENDPATH**/ ?>