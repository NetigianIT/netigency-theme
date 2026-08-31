

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(route('team.index')); ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> <?php echo e(__('content.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_team')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('team.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo e(__('content.name')); ?> <span class="text-red">*</span></label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="job"><?php echo e(__('content.job')); ?></label>
                                            <input type="text" name="job" class="form-control" id="job" value="<?php echo e(old('job')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_2">Facebook</label>
                                            <input type="text" name="link_2" class="form-control" id="link_2" value="<?php echo e(old('link_2')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_3">Twitter</label>
                                            <input type="text" name="link_3" class="form-control" id="link_3" value="<?php echo e(old('link_3')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_4">Instagram</label>
                                            <input type="text" name="link_4" class="form-control" id="link_4" value="<?php echo e(old('link_4')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_5">Linkedin</label>
                                            <input type="text" name="link_5" class="form-control" id="link_5" value="<?php echo e(old('link_5')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order"><?php echo e(__('content.order')); ?></label>
                                            <input type="number" name="order" class="form-control" id="order" value="<?php echo e(old('order', 0)); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="team_image"><?php echo e(__('content.image')); ?> (<?php echo e(__('content.size')); ?> 200 x 200) (.svg, .jpg, .jpeg, .png)</label>
                                            <input type="file" name="team_image" class="form-control-file" id="team_image">
                                            <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="form-text text-muted"><?php echo e(__('content.required_fields')); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary col-12"><?php echo e(__('content.submit')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/team/create.blade.php ENDPATH**/ ?>