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
                                    <small class="form-text text-muted"><?php echo e(__('content.hero_title_help')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_1"><?php echo e(__('content.animated_title')); ?> 1</label>
                                    <input type="text" name="animated_title_1" class="form-control" id="animated_title_1" value="<?php echo e($fixed_content->animated_title_1); ?>" maxlength="120" placeholder="Web Products.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_2"><?php echo e(__('content.animated_title')); ?> 2</label>
                                    <input type="text" name="animated_title_2" class="form-control" id="animated_title_2" value="<?php echo e($fixed_content->animated_title_2); ?>" maxlength="120" placeholder="Mobile Apps.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_3"><?php echo e(__('content.animated_title')); ?> 3</label>
                                    <input type="text" name="animated_title_3" class="form-control" id="animated_title_3" value="<?php echo e($fixed_content->animated_title_3); ?>" maxlength="120" placeholder="Business Software.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_4"><?php echo e(__('content.animated_title')); ?> 4</label>
                                    <input type="text" name="animated_title_4" class="form-control" id="animated_title_4" value="<?php echo e($fixed_content->animated_title_4); ?>" maxlength="120" placeholder="Digital Solutions.">
                                    <small class="form-text text-muted"><?php echo e(__('content.animated_titles_help')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?> <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required><?php echo e($fixed_content->desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_name"><?php echo e(__('content.btn_name')); ?></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="<?php echo e($fixed_content->btn_name); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_link"><?php echo e(__('content.btn_link')); ?></label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="<?php echo e($fixed_content->btn_link); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_status"><?php echo e(__('content.image_status')); ?></label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="1" <?php echo e($fixed_content->image_status == 1 ? 'selected' : ''); ?>><?php echo e(__('content.enable')); ?></option>
                                        <option value="0" <?php echo e($fixed_content->image_status == 0 ? 'selected' : ''); ?>><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="particles_status"><?php echo e(__('content.particles_status')); ?></label>
                                    <select class="form-control" name="particles_status" id="particles_status">
                                        <option value="1" <?php echo e(($fixed_content->particles_status ?? 1) == 1 ? 'selected' : ''); ?>><?php echo e(__('content.enable')); ?></option>
                                        <option value="0" <?php echo e(($fixed_content->particles_status ?? 1) == 0 ? 'selected' : ''); ?>><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image"><?php echo e(__('content.thumbnail_dark')); ?> (<?php echo e(__('content.size')); ?> 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->thumbnail_image)): ?>
                                        <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image)); ?>" alt="dark mode hero" class="rounded ni-image-preview">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded ni-image-preview">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image_light"><?php echo e(__('content.thumbnail_light')); ?> (<?php echo e(__('content.size')); ?> 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image_light" class="form-control-file" id="thumbnail_image_light">
                                    <small class="form-text text-muted"><?php echo e(__('content.image_light_help')); ?></small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($fixed_content->thumbnail_image_light)): ?>
                                        <img src="<?php echo e(asset('uploads/img/general/'.$fixed_content->thumbnail_image_light)); ?>" alt="light mode hero" class="rounded ni-image-preview">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded ni-image-preview">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                    <small class="form-text text-muted"><?php echo e(__('content.hero_title_help')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_1"><?php echo e(__('content.animated_title')); ?> 1</label>
                                    <input type="text" name="animated_title_1" class="form-control" id="animated_title_1" maxlength="120" placeholder="Web Products.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_2"><?php echo e(__('content.animated_title')); ?> 2</label>
                                    <input type="text" name="animated_title_2" class="form-control" id="animated_title_2" maxlength="120" placeholder="Mobile Apps.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_3"><?php echo e(__('content.animated_title')); ?> 3</label>
                                    <input type="text" name="animated_title_3" class="form-control" id="animated_title_3" maxlength="120" placeholder="Business Software.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="animated_title_4"><?php echo e(__('content.animated_title')); ?> 4</label>
                                    <input type="text" name="animated_title_4" class="form-control" id="animated_title_4" maxlength="120" placeholder="Digital Solutions.">
                                    <small class="form-text text-muted"><?php echo e(__('content.animated_titles_help')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?> <span class="text-red">*</span></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_name"><?php echo e(__('content.btn_name')); ?></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_link"><?php echo e(__('content.btn_link')); ?></label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_status"><?php echo e(__('content.image_status')); ?></label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="1" selected><?php echo e(__('content.enable')); ?></option>
                                        <option value="0"><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="particles_status"><?php echo e(__('content.particles_status')); ?></label>
                                    <select class="form-control" name="particles_status" id="particles_status">
                                        <option value="1" selected><?php echo e(__('content.enable')); ?></option>
                                        <option value="0"><?php echo e(__('content.disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image"><?php echo e(__('content.thumbnail_dark')); ?> (<?php echo e(__('content.size')); ?> 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image" class="form-control-file" id="thumbnail_image">
                                    <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thumbnail_image_light"><?php echo e(__('content.thumbnail_light')); ?> (<?php echo e(__('content.size')); ?> 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="thumbnail_image_light" class="form-control-file" id="thumbnail_image_light">
                                    <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
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