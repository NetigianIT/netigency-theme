<?php
    $contactTabs = [
        [
            'label' => __('content.contact_info'),
            'url' => url('admin/contact/create'),
            'active' => request()->is('admin/contact/create')
                || request()->is('admin/contact/*/edit'),
        ],
        [
            'label' => __('content.socials'),
            'url' => url('admin/social'),
            'active' => request()->is('admin/social')
                || request()->is('admin/social/create')
                || request()->is('admin/social/*/edit'),
        ],
        [
            'label' => __('content.quick_access_buttons'),
            'url' => url('admin/quick-access/create'),
            'active' => request()->is('admin/quick-access/create'),
        ],
        [
            'label' => __('content.messages'),
            'url' => url('admin/message'),
            'active' => request()->is('admin/message'),
        ],
    ];
?>

<nav class="ni-hero-tabs__track" aria-label="Contact section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $contactTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e($tab['active'] ? 'active' : ''); ?>" href="<?php echo e($tab['url']); ?>"><?php echo e($tab['label']); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/contact/partials/tabs.blade.php ENDPATH**/ ?>