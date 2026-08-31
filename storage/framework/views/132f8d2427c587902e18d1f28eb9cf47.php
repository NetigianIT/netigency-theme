

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(route('testimonial.index')); ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> <?php echo e(__('content.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_testimonial')); ?></h4>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('testimonial.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'image_status',
                                        'id' => 'image_status',
                                        'label' => __('content.image_status'),
                                        'value' => (string) old('image_status', '1'),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                        'hideState' => true,
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'testimonial_image',
                                    'id' => 'testimonial_image',
                                    'label' => __('content.image').' ('.__('content.size').' 100 x 100)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('content.name')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job"><?php echo e(__('content.job')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="job" class="form-control" id="job" value="<?php echo e(old('job')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?> <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="4" required><?php echo e(old('desc')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="star" class="col-form-label"><?php echo e(__('content.star')); ?></label>
                                    <?php echo $__env->make('admin.components.select', [
                                        'name' => 'star',
                                        'id' => 'star',
                                        'value' => (string) old('star', '5'),
                                        'options' => [
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5',
                                        ],
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order"><?php echo e(__('content.order')); ?></label>
                                    <input type="number" name="order" class="form-control" id="order" value="<?php echo e(old('order', 0)); ?>" required>
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
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/testimonial/create.blade.php ENDPATH**/ ?>