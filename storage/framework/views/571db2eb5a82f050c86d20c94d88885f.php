

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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($seo)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form action="<?php echo e(route('seo.update', $seo->id)); ?>" method="POST">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_name"><?php echo e(__('content.site_name')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="site_name" class="form-control" id="site_name" value="<?php echo e($seo->site_name); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_desc"><?php echo e(__('content.site_desc')); ?> <span class="text-red">*</span></label>
                                    <textarea name="site_desc" class="form-control" id="site_desc" rows="3" required><?php echo e($seo->site_desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_keywords"><?php echo e(__('content.site_keywords')); ?> (<?php echo e(__('content.separate_with_commas')); ?>) <span class="text-red">*</span></label>
                                    <textarea name="site_keywords" class="form-control" id="site_keywords" rows="3" required><?php echo e($seo->site_keywords); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id" data-toggle="tooltip" title="<?php echo e(__('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.')); ?>">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id" value="<?php echo e($seo->fb_app_id); ?>">
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
                                    <form action="<?php echo e(route('seo.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_name"><?php echo e(__('content.site_name')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="site_name" class="form-control" id="site_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_desc"><?php echo e(__('content.site_desc')); ?> <span class="text-red">*</span></label>
                                    <textarea name="site_desc" class="form-control" id="site_desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="site_keywords"><?php echo e(__('content.site_keywords')); ?> (<?php echo e(__('content.separate_with_commas')); ?>) <span class="text-red">*</span></label>
                                    <textarea name="site_keywords" class="form-control" id="site_keywords" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fb_app_id"  data-toggle="tooltip" title="<?php echo e(__('In order to use Facebook Insights you must add the app ID to your page. Insights lets you view analytics for traffic to your site from Facebook. Find the app ID in your App Dashboard.')); ?>">fb_app_id</label>
                                    <input type="text" name="fb_app_id" class="form-control" id="fb_app_id">
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
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/setting/seo/create.blade.php ENDPATH**/ ?>