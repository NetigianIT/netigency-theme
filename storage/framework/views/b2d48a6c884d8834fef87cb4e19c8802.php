

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(route('skill.info_list')); ?>" class="btn btn-primary"><?php echo e(__('content.information_list')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif(isset($skill)): ?>
                    <form action="<?php echo e(route('skill.update', $skill->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($skill->title); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"><?php echo e($skill->desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'skill_image',
                                    'id' => 'skill_image',
                                    'label' => __('content.thumbnail_dark').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'preview' => !empty($skill->skill_image)
                                        ? asset('uploads/img/skill/'.$skill->skill_image)
                                        : null,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'skill_image_light',
                                    'id' => 'skill_image_light',
                                    'label' => __('content.thumbnail_light').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.image_light_help'),
                                    'preview' => !empty($skill->skill_image_light)
                                        ? asset('uploads/img/skill/'.$skill->skill_image_light)
                                        : null,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                    <form action="<?php echo e(route('skill.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'skill_image',
                                    'id' => 'skill_image',
                                    'label' => __('content.thumbnail_dark').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                    'required' => true,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'skill_image_light',
                                    'id' => 'skill_image_light',
                                    'label' => __('content.thumbnail_light').' ('.__('content.size').' 480 x 600)',
                                    'hint' => __('content.image_light_help'),
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/skill/create.blade.php ENDPATH**/ ?>