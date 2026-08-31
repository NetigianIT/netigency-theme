

<?php $__env->startSection('page_actions'); ?>
    <a href="<?php echo e(url('admin/service/create')); ?>" class="btn btn-primary">+ <?php echo e(__('content.add_service')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($services) > 0): ?>
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                        <!-- Include Alert Blade -->
                            <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php else: ?>
                            <form onsubmit="return btnCheckListGet()" action="<?php echo e(route('service.destroy_checked')); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <input type="hidden" id="checked_lists" name="checked_lists" value="">

                            <!-- Modal -->
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
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="<?php echo e(__('content.all')); ?>">
                                </th>
                                <th><?php echo e(__('content.image')); ?></th>
                                <th><?php echo e(__('content.title')); ?></th>
                                <th class="all text-left"><?php echo e(__('content.status')); ?></th>
                                <th class="all custom-width-action"><?php echo e(__('content.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $desc = count($services); $asc=0; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input  name="check_list[]" type="checkbox" value="<?php echo e($service->id); ?>" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num"><?php echo e(++$asc); ?></span>
                                    </td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($service->service_image)): ?>
                                            <img class="image-size img-fluid" src="<?php echo e(asset('uploads/img/service/'.$service->service_image)); ?>" alt="service image">
                                        <?php else: ?>
                                            <img class="image-size img-fluid" src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="no image">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td><?php echo e($service->title); ?></td>
                                    <td class="text-left align-middle">
                                        <?php echo $__env->make('admin.components.switch', [
                                            'name' => 'status_'.$service->id,
                                            'id' => 'status_'.$service->id,
                                            'value' => (string) ($service->status ?? 0),
                                            'onLabel' => __('content.published'),
                                            'offLabel' => __('content.draft'),
                                            'compact' => true,
                                            'hideState' => true,
                                            'toggleUrl' => route('service.update_status', $service->id),
                                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="<?php echo e(route('service.edit', $service->id)); ?>" class="ni-action-icon mr-2" title="<?php echo e(__('content.edit')); ?>">
                                                <i class="fa fa-edit text-info font-18" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="ni-action-icon ni-action-delete" data-toggle="modal" data-target="#deleteModel<?php echo e($service->id); ?>" title="<?php echo e(__('content.delete')); ?>">
                                                <i class="fa fa-trash text-danger font-18" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                    <div class="modal fade" id="deleteModel<?php echo e($service->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($demo_mode == "on"): ?>
                                                    <!-- Include Alert Blade -->
                                                        <?php echo $__env->make('admin.demo_mode.demo-mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                                    <?php else: ?>
                                                        <form class="d-inline-block" action="<?php echo e(route('service.destroy', $service->id)); ?>" method="POST">
                                                            <?php echo method_field('DELETE'); ?>
                                                            <?php echo csrf_field(); ?>
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('content.cancel')); ?></button>
                                                    <button type="submit" class="btn btn-success"><?php echo e(__('content.yes_delete_it')); ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <span><?php echo e(__('content.not_yet_created')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/service/index.blade.php ENDPATH**/ ?>