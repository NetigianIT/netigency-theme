

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.videos.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_actions'); ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ <?php echo e(__('content.add_category')); ?></button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($categories) > 0): ?>
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <form onsubmit="return btnCheckListGet()" action="<?php echo e(route('video-category.destroy_checked')); ?>" method="POST">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="checked_lists" name="checked_lists" value="">
                            <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo e(__('content.delete')); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body text-center"><?php echo e(__('content.delete_selected')); ?></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('content.cancel')); ?></button>
                                            <button type="submit" class="btn btn-success"><?php echo e(__('content.yes_delete_it')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th><input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)"></th>
                                <th><?php echo e(__('content.category_name')); ?></th>
                                <th><?php echo e(__('content.order')); ?></th>
                                <th><?php echo e(__('content.status')); ?></th>
                                <th class="all custom-width-action"><?php echo e(__('content.action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="<?php echo e($category->id); ?>" onclick="showHideDeleteButton2(this)">
                                        <span class="ni-row-num"><?php echo e($loop->iteration); ?></span>
                                    </td>
                                    <td><?php echo e($category->category_name); ?></td>
                                    <td><?php echo e($category->order); ?></td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->status == 0): ?>
                                            <span class="badge badge-danger"><?php echo e(__('content.disable')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-success"><?php echo e(__('content.enable')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('video-category.edit', $category->id)); ?>" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModel<?php echo e($category->id); ?>"><i class="fa fa-trash text-danger font-18"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModel<?php echo e($category->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <form action="<?php echo e(route('video-category.destroy', $category->id)); ?>" method="POST">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo e(__('content.delete')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body text-center"><?php echo e(__('content.you_wont_be_able_to_revert_this')); ?></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('content.cancel')); ?></button>
                                                    <button type="submit" class="btn btn-success"><?php echo e(__('content.yes_delete_it')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p><?php echo e(__('content.not_yet_created')); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?php echo e(route('video-category.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('content.add_category')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo e(__('content.category_name')); ?> <span class="text-red">*</span></label>
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('content.order')); ?> <span class="text-red">*</span></label>
                            <input type="number" name="order" class="form-control" value="0" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__('content.status')); ?></label>
                            <select name="status" class="form-control">
                                <option value="1"><?php echo e(__('content.enable')); ?></option>
                                <option value="0"><?php echo e(__('content.disable')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('content.submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/videos/category/create.blade.php ENDPATH**/ ?>