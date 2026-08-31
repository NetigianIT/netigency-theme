

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(route('feature.index')); ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> <?php echo e(__('content.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_feature')); ?></h4>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('feature.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'feature_image',
                                    'id' => 'feature_image',
                                    'label' => __('content.image').' ('.__('content.size').' 60 x 60)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'required' => true,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e(old('title')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stack"><?php echo e(__('content.stack')); ?> <span class="text-red">*</span></label>
                                    <select name="stack" class="form-control" id="stack" required>
                                        <option value="main" <?php if(old('stack') === 'main'): echo 'selected'; endif; ?>><?php echo e(__('content.main_stack')); ?></option>
                                        <option value="supporting" <?php if(old('stack', 'supporting') === 'supporting'): echo 'selected'; endif; ?>><?php echo e(__('content.supporting_stack')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="4"><?php echo e(old('desc')); ?></textarea>
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

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/feature/create.blade.php ENDPATH**/ ?>