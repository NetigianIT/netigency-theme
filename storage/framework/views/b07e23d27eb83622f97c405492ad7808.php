

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0"><?php echo e(__('content.comments')); ?></h6>
                        <div>
                            <form class="d-block  ml-auto" action="<?php echo e(route('comment-section.mark_all_approval_update')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="btn btn-primary mb-3ine">
                                    <i class="fas fa-bookmark"></i> <?php echo e(__('content.mark_all_as_approval')); ?>

                                </button>
                            </form>
                            </div>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($comments) > 0): ?>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th><?php echo e(__('content.name')); ?></th>
                                <th><?php echo e(__('content.email')); ?></th>
                                <th><?php echo e(__('content.comment')); ?></th>
                                <th><?php echo e(__('content.approval_status')); ?></th>
                                <th class="all text-center"><?php echo e(__('content.action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('blog/'.$comment->blog->slug)); ?>" target="_blank" class="d-inline-block text-truncate ni-comment-cell" title="<?php echo e($comment->name); ?>"><?php echo e($comment->name); ?></a>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate ni-comment-cell" title="<?php echo e($comment->email); ?>"><?php echo e($comment->email); ?></span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate ni-comment-cell" title="<?php echo e($comment->comment); ?>"><?php echo e($comment->comment); ?></span>
                                    </td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->approval == 0): ?>
                                            <span><?php echo e(__('content.pending_approval')); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e(__('content.approval')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div class="d-inline-flex align-items-center">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->approval == 0): ?>
                                                <form class="d-inline" action="<?php echo e(route('comment-section.update', $comment->id)); ?>" method="POST">
                                                    <?php echo method_field('PUT'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" data-toggle="tooltip" class="btn btn-link p-0 mr-2 ni-action-icon ni-action-approve" data-original-title="<?php echo e(__('content.mark')); ?>">
                                                        <i class="fas fa-bookmark font-18"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            <a href="#" class="ni-action-icon ni-action-delete" data-toggle="modal" data-target="#deleteModal<?php echo e($comment->id); ?>" title="<?php echo e(__('content.delete')); ?>">
                                                <i class="fa fa-trash font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo e($comment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                                <form class="d-inline-block" action="<?php echo e(route('comment-section.destroy', $comment->id)); ?>" method="POST">
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
                    <?php else: ?>
                        <span><?php echo e(__('content.not_yet_created')); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/comment/index.blade.php ENDPATH**/ ?>