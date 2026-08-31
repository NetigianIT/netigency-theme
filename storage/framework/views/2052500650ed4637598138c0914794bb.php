

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_service')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('service.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <input type="hidden" name="order" value="0">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input id="title" name="title" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="summernote"><?php echo e(__('content.description')); ?></label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'service_image',
                                    'id' => 'service_image',
                                    'label' => __('content.image').' ('.__('content.size').' 800 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>

                            <?php echo $__env->make('admin.components.details-repeater', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <div class="col-12">
                                <h5 class="mb-3 mt-2"><?php echo e(__('content.seo_optimization')); ?></h5>
                                <div class="form-group">
                                    <label for="meta_desc"><?php echo e(__('content.meta_desc')); ?></label>
                                    <input id="meta_desc" name="meta_desc" type="text" class="form-control" value="<?php echo e(old('meta_desc')); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword"><?php echo e(__('content.meta_keyword')); ?> (<?php echo e(__('content.separate_with_commas')); ?>)</label>
                                    <textarea id="meta_keyword" name="meta_keyword" class="form-control"><?php echo e(old('meta_keyword')); ?></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('content.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/service/create.blade.php ENDPATH**/ ?>