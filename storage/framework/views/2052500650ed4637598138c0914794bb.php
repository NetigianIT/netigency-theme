

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title"><?php echo e(__('content.add_service')); ?></h4>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                <!-- Include Alert Blade -->
                    <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php else: ?>
                    <form action="<?php echo e(route('service.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="row">
                          <div class="col-md-8">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                          <input id="title" name="title" type="text" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="summernote"><?php echo e(__('content.description')); ?></label>
                                          <textarea id="summernote" name="desc" class="form-control"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-12 height-card box-margin">
                                      <div id="accordion-">
                                          <div class="card mb-2">
                                              <div class="card-header bg-secondary">
                                                  <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                      <?php echo e(__('content.seo_optimization')); ?>

                                                  </a>
                                              </div>

                                              <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                  <div class="card-body">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="meta_desc"><?php echo e(__('content.meta_desc')); ?> </label>
                                                                  <input id="title" name="meta_desc" type="text" class="form-control">
                                                              </div>
                                                          </div>
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="meta_keyword"><?php echo e(__('content.meta_keyword')); ?> (<?php echo e(__('content.separate_with_commas')); ?>)</label>
                                                                  <textarea id="meta_keyword" name="meta_keyword" class="form-control"></textarea>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="card">
                                              <div class="card-header bg-secondary">
                                                  <a class="text-white" data-toggle="collapse" href="#accordion-2" aria-expanded="true">
                                                      <?php echo e(__('content.breadcrumb_customization')); ?>

                                                  </a>
                                              </div>
                                              <div id="accordion-2" class="collapse" data-parent="#accordion-" style="">
                                                  <div class="card-body">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="breadcrumb_status" class="col-form-label"><?php echo e(__('Do you want to use special breadcrumb for the page?')); ?></label>
                                                                  <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                      <option value="0" selected><?php echo e(__('content.select_your_option')); ?></option>
                                                                      <option value="1"><?php echo e(__('content.yes')); ?></option>
                                                                      <option value="0"><?php echo e(__('content.no')); ?></option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="custom_breadcrumb_image"><?php echo e(__('content.custom_breadcrumb_image')); ?> (<?php echo e(__('content.size')); ?> 1920 x 350) (.svg, .jpg, .jpeg, .png)</label>
                                                                  <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                  <small id="custom_breadcrumb_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_desc"><?php echo e(__('content.short_desc')); ?></label>
                                            <textarea id="short_desc" name="short_desc" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="d-block"><?php echo e(__('content.icon')); ?></label>
                                            <?php echo $__env->make('admin.components.icon-picker', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="image_status" class="col-form-label"><?php echo e(__('content.image_status')); ?> </label>
                                            <select class="form-control" name="image_status" id="image_status">
                                                <option value="enable" selected><?php echo e(__('content.select_your_option')); ?></option>
                                                <option value="enable"><?php echo e(__('content.enable')); ?></option>
                                                <option value="disable"><?php echo e(__('content.disable')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_image"><?php echo e(__('content.image')); ?> (<?php echo e(__('content.size')); ?> 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                            <input type="file" name="service_image" class="form-control-file" id="service_image">
                                            <small id="service_image" class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order"><?php echo e(__('content.order')); ?></label>
                                            <input type="number" name="order" class="form-control" id="order" value="0">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label"><?php echo e(__('content.status')); ?> </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" selected><?php echo e(__('content.select_your_option')); ?></option>
                                                <option value="1"><?php echo e(__('content.published')); ?></option>
                                                <option value="0"><?php echo e(__('content.draft')); ?></option>
                                            </select>
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
    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/service/create.blade.php ENDPATH**/ ?>