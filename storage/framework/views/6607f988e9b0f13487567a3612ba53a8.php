

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.videos.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin">
            <div class="card card-body">
                <form action="<?php echo e(route('video-item.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('content.category')); ?> <span class="text-red">*</span></label>
                                <?php
                                    $categoryOptions = collect($categories)->mapWithKeys(fn ($c) => [$c->id => $c->category_name])->all();
                                ?>
                                <?php echo $__env->make('admin.components.select', [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                    'value' => (string) old('category_id', ''),
                                    'required' => true,
                                    'options' => $categoryOptions,
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('content.video_url')); ?> <span class="text-red">*</span></label>
                                <input type="url" name="video_url" class="form-control" value="<?php echo e(old('video_url')); ?>" placeholder="https://www.youtube.com/watch?v=... or https://vimeo.com/..." required>
                                <small class="form-text text-muted"><?php echo e(__('content.video_url_help')); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('content.thumbnail')); ?> (<?php echo e(__('content.size')); ?> 1280 x 720)(.svg, .png, .jpg, .jpeg, .webp)</label>
                                <input type="file" name="thumbnail_image" class="form-control-file" accept=".svg,.png,.jpg,.jpeg,.webp">
                                <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__('content.order')); ?> <span class="text-red">*</span></label>
                                <input type="number" name="order" class="form-control" value="<?php echo e(old('order', 0)); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo e(__('content.description')); ?></label>
                                <textarea name="desc" class="form-control" rows="3"><?php echo e(old('desc')); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('content.submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/videos/item/create.blade.php ENDPATH**/ ?>