

<?php $__env->startSection('page_actions'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form action="<?php echo e(route('fixed-content.update', $fixed_content->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($fixed_content->title); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?> <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required><?php echo e($fixed_content->desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name"><?php echo e(__('content.btn_name')); ?></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="<?php echo e($fixed_content->btn_name); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link"><?php echo e(__('content.btn_link')); ?></label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="<?php echo e($fixed_content->btn_link); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_status" class="col-form-label"><?php echo e(__('content.image_status')); ?></label>
                                    <select class="form-control" name="status" id="image_status">
                                        <option value="1" selected><?php echo e(__('content.select_your_option')); ?></option>
                                        <option value="1" <?php echo e($fixed_content->image_status == 1 ? 'selected' : ''); ?>><?php echo e(__('content.enable')); ?></option>
                                        <option value="0" <?php echo e($fixed_content->image_status == 0 ? 'selected' : ''); ?>><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail_image"><?php echo e(__('content.thumbnail')); ?> (<?php echo e(__('content.size')); ?> 354 x 354) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small id="thumbnail_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->thumbnail_image)): ?>
                                        <a class="d-block" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                            <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="banner image" class="rounded ni-image-preview">
                                        </a>
                                    <?php else: ?>
                                        <a class="d-block" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded ni-image-preview">
                                        </a>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <!--end col-->
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
                                    <form action="<?php echo e(route('fixed-content.store')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?> <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name"><?php echo e(__('content.btn_name')); ?></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link"><?php echo e(__('content.btn_link')); ?></label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_status" class="col-form-label"><?php echo e(__('content.image_status')); ?> </label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="1" selected><?php echo e(__('content.select_your_option')); ?></option>
                                        <option value="1"><?php echo e(__('content.enable')); ?></option>
                                        <option value="0"><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="thumbnail_image"><?php echo e(__('content.thumbnail')); ?> (<?php echo e(__('content.size')); ?> 354 x 354) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small id="thumbnail_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
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
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/banner/fixed_content/create.blade.php ENDPATH**/ ?>