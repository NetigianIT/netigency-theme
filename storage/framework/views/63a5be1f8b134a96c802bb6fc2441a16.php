

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.admin_user.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_admin_user')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                <!-- Include Alert Blade -->
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('admin-user.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group form-group-default">
                                          <label for="role_id"><?php echo e(__('content.role_name')); ?> <span class="text-red">*</span></label>
                                          <?php
                                              $roleOptions = collect($admin_roles)->mapWithKeys(fn ($r) => [$r->id => $r->name])->all();
                                          ?>
                                          <?php echo $__env->make('admin.components.select', [
                                              'name' => 'role_id',
                                              'id' => 'role_id',
                                              'value' => (string) old('role_id', ''),
                                              'required' => true,
                                              'options' => $roleOptions,
                                          ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="name"><?php echo e(__('content.name')); ?> <span class="text-red">*</span></label>
                                          <input id="name" name="name" type="text" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="email"><?php echo e(__('content.email')); ?> <span class="text-red">*</span></label>
                                          <input id="email" name="email" type="email" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="password"><?php echo e(__('content.new_password')); ?> <span class="text-red">*</span></label>
                                          <input id="password" name="password" type="password" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="confirmPass"><?php echo e(__('content.confirm_password')); ?> <span class="text-red">*</span></label>
                                          <input id="confirmPass" name="password_confirmation" type="password" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group ">
                                          <label for="image"><?php echo e(__('content.image')); ?> (<?php echo e(__('content.size')); ?> 128x128)(.png, .jpg, .jpeg)</label>
                                          <input id="image" name="profile_photo_path" type="file" class="form-control-file">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary"><?php echo e(__('content.submit')); ?></button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/admin_user/create.blade.php ENDPATH**/ ?>