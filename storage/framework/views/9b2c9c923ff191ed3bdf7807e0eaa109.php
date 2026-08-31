

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.edit_page')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('page.update', $page->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <input type="hidden" name="order" value="<?php echo e($page->order); ?>">
                        <div class="row align-items-end ni-page-meta-row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-3 mb-lg-2">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input id="title" name="page_title" type="text" class="form-control" value="<?php echo e($page->page_title); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-3 mb-lg-2">
                                    <label for="display_header_menu"><?php echo e(__('content.display_header_menu')); ?></label>
                                    <?php echo $__env->make('admin.components.select', [
                                        'name' => 'display_header_menu',
                                        'id' => 'display_header_menu',
                                        'value' => (string) old('display_header_menu', $page->display_header_menu),
                                        'options' => [
                                            '1' => __('content.yes'),
                                            '0' => __('content.no'),
                                            '2' => __('content.other'),
                                        ],
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-3 mb-lg-2">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status', $page->status),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <small class="form-text text-muted mt-0 mb-3"><?php echo e(__('content.if_you_choose_no')); ?> <?php echo e(__('content.if_you_choose_other')); ?></small>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote"><?php echo e(__('content.details')); ?><span class="text-red">*</span></label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"><?php echo html_entity_decode($page->desc); ?></textarea>
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

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>