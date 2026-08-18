

<?php $__env->startSection('page_actions'); ?>
    <form class="d-block ml-auto" action="<?php echo e(route('message.mark_all_read_update')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-bookmark"></i> <?php echo e(__('content.mark_all_as_read')); ?>

        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($messages) > 0): ?>
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <form onsubmit="return btnCheckListGet()" action="<?php echo e(route('message.destroy_checked')); ?>" method="POST">
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
                        <div class="table-responsive ni-messages-table">
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="<?php echo e(__('content.all')); ?>">
                                </th>
                                <th><?php echo e(__('content.name')); ?></th>
                                <th><?php echo e(__('content.email')); ?></th>
                                <th><?php echo e(__('content.subject')); ?></th>
                                <th><?php echo e(__('content.message')); ?></th>
                                <th><?php echo e(__('content.read_status')); ?></th>
                                <th class="all custom-width-action"><?php echo e(__('content.action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $desc = count($messages); $asc = 0; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="<?php echo e($message->id); ?>" onclick="showHideDeleteButton2(this)">
                                        <span class="ni-row-num"><?php echo e(++$asc); ?></span>
                                    </td>
                                    <td title="<?php echo e($message->name); ?>"><?php echo e(\Illuminate\Support\Str::limit($message->name, 36)); ?></td>
                                    <td title="<?php echo e($message->email); ?>"><?php echo e(\Illuminate\Support\Str::limit($message->email, 40)); ?></td>
                                    <td title="<?php echo e($message->subject); ?>"><?php echo e(\Illuminate\Support\Str::limit($message->subject, 48)); ?></td>
                                    <td title="<?php echo e($message->message); ?>"><?php echo e(\Illuminate\Support\Str::limit($message->message, 60)); ?></td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message->read === 0): ?>
                                            <span><?php echo e(__('content.unread')); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e(__('content.read')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div class="d-inline-flex align-items-center">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message->read == 0): ?>
                                                <form class="d-inline" action="<?php echo e(route('message.update', $message->id)); ?>" method="POST">
                                                    <?php echo method_field('PUT'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" data-toggle="tooltip" class="btn btn-primary mr-2 pt-2 pb-2 pr-3 pl-3" data-original-title="<?php echo e(__('content.mark')); ?>">
                                                        <i class="fas fa-bookmark"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo e($message->id); ?>">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo e($message->id); ?>" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="messageModalCenterTitle"><?php echo e(__('content.delete')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('content.close')); ?>">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <?php echo e(__('content.you_wont_be_able_to_revert_this')); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="<?php echo e(route('message.destroy', $message->id)); ?>" method="POST">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
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
                        </div>
                    <?php else: ?>
                        <span><?php echo e(__('content.not_yet_created')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/contact/message/index.blade.php ENDPATH**/ ?>