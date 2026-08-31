

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($about)): ?>
                    <form action="<?php echo e(route('about.update', $about->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($about->title); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"><?php echo e($about->desc); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link"><?php echo e(__('content.video_link')); ?></label>
                                    <input type="text" name="video_link" class="form-control" id="video_link" value="<?php echo e($about->video_link); ?>">
                                    <small id="video_link" class="form-text text-muted"><?php echo e(__('content.youtube_supported')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image"><?php echo e(__('content.thumbnail_dark')); ?> (<?php echo e(__('content.size')); ?> 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image">
                                    <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($about->about_image)): ?>
                                        <img src="<?php echo e(asset('uploads/img/about/'.$about->about_image)); ?>" alt="dark mode about" class="rounded w-50">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image_light"><?php echo e(__('content.thumbnail_light')); ?> (<?php echo e(__('content.size')); ?> 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image_light" class="form-control-file" id="about_image_light">
                                    <small class="form-text text-muted"><?php echo e(__('content.image_light_help')); ?></small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($about->about_image_light)): ?>
                                        <img src="<?php echo e(asset('uploads/img/about/'.$about->about_image_light)); ?>" alt="light mode about" class="rounded w-50">
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
                    <form action="<?php echo e(route('about.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><?php echo e(__('content.title')); ?> <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc"><?php echo e(__('content.description')); ?></label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link"><?php echo e(__('content.video_link')); ?></label>
                                    <input type="text" name="video_link" class="form-control" id="video_link">
                                    <small id="video_link" class="form-text text-muted"><?php echo e(__('content.youtube_supported')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image"><?php echo e(__('content.thumbnail_dark')); ?> (<?php echo e(__('content.size')); ?> 480 x 600) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image" required>
                                    <small class="form-text text-muted"><?php echo e(__('content.please_use_recommended_sizes')); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image_light"><?php echo e(__('content.thumbnail_light')); ?> (<?php echo e(__('content.size')); ?> 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image_light" class="form-control-file" id="about_image_light">
                                    <small class="form-text text-muted"><?php echo e(__('content.image_light_help')); ?></small>
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

    <div class="row ni-info-list-gap">
        <div class="col-12">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <?php if (isset($component)) { $__componentOriginal40ba01397e5b298bd2e3af52a27db57d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40ba01397e5b298bd2e3af52a27db57d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.global-table','data' => ['title' => __('content.information_list'),'tableId' => 'basic-datatable','hasRecords' => count($info_lists) > 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.global-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('content.information_list')),'table-id' => 'basic-datatable','has-records' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(count($info_lists) > 0)]); ?>
                         <?php $__env->slot('add', null, []); ?> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ <?php echo e(__('content.add_info')); ?></button>
                         <?php $__env->endSlot(); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($info_lists) > 0): ?>
                            <div>
                                <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                    <i class="fa fa-trash text-danger font-18"></i>
                                </a>
                            </div>
                            <form onsubmit="return btnCheckListGet()" action="<?php echo e(route('about.destroy_checked')); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="checked_lists" name="checked_lists" value="">

                                <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCheckedModalCenterTitle"><?php echo e(__('content.delete')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('content.close')); ?>">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <?php echo e(__('content.delete_selected')); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('content.cancel')); ?></button>
                                                <button onclick="btnCheckListGet()" type="submit" class="btn btn-success"><?php echo e(__('content.yes_delete_it')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="<?php echo e(__('content.all')); ?>">
                                    </th>
                                    <th><?php echo e(__('content.description')); ?></th>
                                    <th><?php echo e(__('content.order')); ?></th>
                                    <th class="all custom-width-action"><?php echo e(__('content.action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $asc = 0; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $info_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <input name="check_list[]" type="checkbox" value="<?php echo e($info_list->id); ?>" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num"><?php echo e(++$asc); ?></span>
                                        </td>
                                        <td><?php echo e($info_list->desc); ?></td>
                                        <td><?php echo e($info_list->order); ?></td>
                                        <td>
                                            <div>
                                                <a href="<?php echo e(route('about.edit_info_list', $info_list->id)); ?>" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <form class="d-inline-block" action="<?php echo e(route('about.destroy_info_list', $info_list->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <span data-toggle="modal" data-target="#deleteModel<?php echo e($info_list->id); ?>">
                                                        <a type="button" href="javascript:void(0)">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                    </span>
                                                    <div class="modal fade" id="deleteModel<?php echo e($info_list->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('content.delete')); ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('content.close')); ?>">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <?php echo e(__('content.you_wont_be_able_to_revert_this')); ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('content.cancel')); ?></button>
                                                                    <button type="submit" class="btn btn-success"><?php echo e(__('content.yes_delete_it')); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </tbody>
                            </table>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40ba01397e5b298bd2e3af52a27db57d)): ?>
<?php $attributes = $__attributesOriginal40ba01397e5b298bd2e3af52a27db57d; ?>
<?php unset($__attributesOriginal40ba01397e5b298bd2e3af52a27db57d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40ba01397e5b298bd2e3af52a27db57d)): ?>
<?php $component = $__componentOriginal40ba01397e5b298bd2e3af52a27db57d; ?>
<?php unset($__componentOriginal40ba01397e5b298bd2e3af52a27db57d); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- end row -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel"><?php echo e(__('content.add_new')); ?></h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('about.store_info_list')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
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
                                    <input type="text" name="desc" class="form-control" id="desc" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order"><?php echo e(__('content.order')); ?></label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted"><?php echo e(__('content.required_fields')); ?></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(__('content.submit')); ?></button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/about/create.blade.php ENDPATH**/ ?>