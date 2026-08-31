

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.setting.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($site_info)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form action="<?php echo e(route('site-info.update', $site_info->id)); ?>" method="POST">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc"><?php echo e(__('content.short_desc')); ?></label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc" value="<?php echo e($site_info->short_desc); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright"><?php echo e(__('content.copyright')); ?></label>
                                    <input type="text" name="copyright" class="form-control" id="copyright" value="<?php echo e($site_info->copyright); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address"><?php echo e(__('content.address')); ?></label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?php echo e($site_info->address); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_map_link"><?php echo e(__('content.address_map_link')); ?></label>
                                    <input type="text" name="address_map_link" class="form-control" id="address_map_link" value="<?php echo e($site_info->address_map_link); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"><?php echo e(__('content.email')); ?></label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?php echo e($site_info->email); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone"><?php echo e(__('content.phone')); ?></label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo e($site_info->phone); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted"><?php echo e(__('content.required_fields')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('content.submit')); ?></button>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                                <!-- Include Alert Blade -->
                                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php else: ?>
                                    <form action="<?php echo e(route('site-info.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_desc"><?php echo e(__('content.short_desc')); ?></label>
                                    <input type="text" name="short_desc" class="form-control" id="short_desc">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="copyright"><?php echo e(__('content.copyright')); ?></label>
                                    <input type="text" name="copyright" class="form-control" id="copyright">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address"><?php echo e(__('content.address')); ?></label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_map_link"><?php echo e(__('content.address_map_link')); ?></label>
                                    <input type="text" name="address_map_link" class="form-control" id="address_map_link">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"><?php echo e(__('content.email')); ?></label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone"><?php echo e(__('content.phone')); ?></label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted"><?php echo e(__('content.required_fields')); ?></small>
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
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/setting/site_info/create.blade.php ENDPATH**/ ?>