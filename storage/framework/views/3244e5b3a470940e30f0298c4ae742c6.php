

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.contact.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($quick_access)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form action="<?php echo e(route('quick-access.update', $quick_access->id)); ?>" method="POST">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media"><?php echo e(__('content.icon')); ?> <span class="text-red">*</span></label>
                                    <?php echo $__env->make('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media',
                                        'value' => $quick_access->social_media,
                                        'required' => true,
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link"><?php echo e(__('content.link')); ?></label>
                                    <input id="link" type="text" name="link" value="<?php echo e($quick_access->link); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status', $quick_access->status),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact"><?php echo e(__('content.icon')); ?> <span class="text-red">*</span></label>
                                    <?php echo $__env->make('admin.components.icon-select', [
                                        'name' => 'contact',
                                        'id' => 'contact',
                                        'value' => $quick_access->contact,
                                        'required' => true,
                                        'icons' => [
                                            'fas fa-envelope' => 'Email',
                                            'fas fa-phone' => 'Phone',
                                        ],
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone"><?php echo e(__('content.email_or_phone')); ?></label>
                                    <input id="email_or_phone" type="text" name="email_or_phone" value="<?php echo e($quick_access->email_or_phone); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status_phone',
                                        'id' => 'status_phone',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status_phone', $quick_access->status_phone),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('content.submit')); ?></button>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                                <!-- Include Alert Blade -->
                                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php else: ?>
                                    <form action="<?php echo e(route('quick-access.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="social_media"><?php echo e(__('content.icon')); ?> <span class="text-red">*</span></label>
                                    <?php echo $__env->make('admin.components.icon-select', [
                                        'name' => 'social_media',
                                        'id' => 'social_media_create',
                                        'required' => true,
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="link"><?php echo e(__('content.link')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="link" class="form-control" id="link" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status', '1'),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact"><?php echo e(__('content.icon')); ?> <span class="text-red">*</span></label>
                                    <?php echo $__env->make('admin.components.icon-select', [
                                        'name' => 'contact',
                                        'id' => 'contact_create',
                                        'required' => true,
                                        'icons' => [
                                            'fas fa-envelope' => 'Email',
                                            'fas fa-phone' => 'Phone',
                                        ],
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_or_phone"><?php echo e(__('content.email_or_phone')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="email_or_phone" class="form-control" id="email_or_phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status_phone',
                                        'id' => 'status_phone',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status_phone', '1'),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('content.submit')); ?></button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/contact/quick_access/create.blade.php ENDPATH**/ ?>