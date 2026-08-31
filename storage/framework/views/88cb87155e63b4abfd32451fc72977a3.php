

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.setting.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($site_image)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form action="<?php echo e(route('site-image.update', $site_image->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="favicon_image"><?php echo e(__('content.favicon')); ?> (<?php echo e(__('content.size')); ?> 128 x 128) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="favicon_image" class="form-control-file" id="favicon_image">
                                    <small id="favicon_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_image->favicon_image)): ?>
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/general/'.$site_image->favicon_image)); ?>" alt="favicon image" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded w-25">
                                                        </a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_logo_image"><?php echo e(__('content.admin_logo')); ?> (<?php echo e(__('content.size')); ?> 328 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_logo_image" class="form-control-file" id="admin_logo_image">
                                    <small id="admin_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_image->admin_logo_image)): ?>
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/general/'.$site_image->admin_logo_image)); ?>" alt="logo image" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded w-25">
                                                        </a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_small_logo_image"><?php echo e(__('content.admin_small_logo')); ?> (<?php echo e(__('content.size')); ?> 112 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_small_logo_image" class="form-control-file" id="admin_small_logo_image">
                                    <small id="admin_small_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_image->admin_small_logo_image)): ?>
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/general/'.$site_image->admin_small_logo_image)); ?>" alt="logo image" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                       <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                                                <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded w-25">
                                                            </a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_white_logo_image"><?php echo e(__('content.site_white_logo')); ?> (<?php echo e(__('content.size')); ?> 148 x 50) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_white_logo_image" class="form-control-file" id="site_white_logo_image">
                                    <small id="site_white_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_image->site_white_logo_image)): ?>
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/general/'.$site_image->site_white_logo_image)); ?>" alt="logo image" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                       <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                                                <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded w-25">
                                                            </a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_colored_logo_image"><?php echo e(__('content.site_colored_logo')); ?> (<?php echo e(__('content.size')); ?> 148 x 50) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_colored_logo_image" class="form-control-file" id="site_colored_logo_image">
                                    <small id="site_colored_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($site_image->site_colored_logo_image)): ?>
                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.current_image')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/general/'.$site_image->site_colored_logo_image)); ?>" alt="logo image" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__('content.not_yet_created')); ?>">
                                                            <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image" class="rounded w-25">
                                                        </a>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
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
                                    <form action="<?php echo e(route('site-image.store')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="favicon_image"><?php echo e(__('content.favicon')); ?> (<?php echo e(__('content.size')); ?> 128 x 128) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="favicon_image" class="form-control-file" id="favicon_image">
                                    <small id="favicon_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_logo_image"><?php echo e(__('content.admin_logo')); ?> (<?php echo e(__('content.size')); ?> 328 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_logo_image" class="form-control-file" id="admin_logo_image">
                                    <small id="admin_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="admin_small_logo_image"><?php echo e(__('content.admin_small_logo')); ?> (<?php echo e(__('content.size')); ?> 112 x 96) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="admin_small_logo_image" class="form-control-file" id="admin_small_logo_image">
                                    <small id="admin_small_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_white_logo_image"><?php echo e(__('content.site_white_logo')); ?> (<?php echo e(__('content.size')); ?> 148 x 50) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_white_logo_image" class="form-control-file" id="site_white_logo_image">
                                    <small id="site_white_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_colored_logo_image"><?php echo e(__('content.site_colored_logo')); ?> (<?php echo e(__('content.size')); ?> 148 x 50) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="site_colored_logo_image" class="form-control-file" id="site_colored_logo_image">
                                    <small id="site_colored_logo_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
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

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/setting/site_image/create.blade.php ENDPATH**/ ?>