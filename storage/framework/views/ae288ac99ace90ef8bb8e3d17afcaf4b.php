

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.blog.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> <?php echo e(__('content.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_blog')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('blog.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input id="title" name="title" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category"><?php echo e(__('content.categories')); ?> <span class="text-red">*</span></label>
                                    <?php
                                        $categoryOptions = collect($categories)->mapWithKeys(fn ($c) => [$c->id => $c->category_name])->all();
                                    ?>
                                    <?php echo $__env->make('admin.components.select', [
                                        'name' => 'category_id',
                                        'id' => 'category',
                                        'value' => (string) old('category_id', ''),
                                        'required' => true,
                                        'options' => $categoryOptions,
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="summernote"><?php echo e(__('content.description')); ?></label>
                                    <textarea id="summernote" name="desc" class="form-control ni-editor"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="short_desc"><?php echo e(__('content.short_desc')); ?></label>
                                    <textarea id="short_desc" name="short_desc" class="form-control ni-textarea-auto" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tag"><?php echo e(__('content.tag')); ?> (<?php echo e(__('content.separate_with_commas')); ?>)</label>
                                    <textarea id="tag" name="tag" class="form-control ni-textarea-auto" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type" class="col-form-label"><?php echo e(__('content.author')); ?></label>
                                    <?php echo $__env->make('admin.components.select', [
                                        'name' => 'type',
                                        'id' => 'type',
                                        'value' => (string) old('type', 'with_this_account'),
                                        'options' => [
                                            'with_this_account' => __('content.with_this_account'),
                                            'anonymous' => __('content.anonymous'),
                                        ],
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <?php echo $__env->make('admin.components.image-input', [
                                    'name' => 'blog_image',
                                    'id' => 'blog_image',
                                    'label' => __('content.image').' ('.__('content.size').' 800 x 600)',
                                    'hint' => __('content.please_use_recommended_sizes'),
                                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'status',
                                        'id' => 'status',
                                        'label' => __('content.status'),
                                        'value' => (string) old('status', '1'),
                                        'onLabel' => __('content.published'),
                                        'offLabel' => __('content.draft'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                        </div>
                    </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/blog/post/create.blade.php ENDPATH**/ ?>