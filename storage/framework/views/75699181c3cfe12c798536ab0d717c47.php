

<?php $__env->startSection('content'); ?>

    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($pages) > 0): ?>
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th><?php echo e(__('content.title')); ?></th>
                                <th><?php echo e(__('content.order')); ?></th>
                                <th><?php echo e(__('content.status')); ?></th>
                                <th><?php echo e(__('content.display_header_menu')); ?></th>
                                <th class="all custom-width-action"><?php echo e(__('content.action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $asc = 0; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><span class="ni-row-num"><?php echo e(++$asc); ?>.</span> <?php echo e($page->page_title); ?></td>
                                    <td><?php echo e($page->order); ?></td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->status == 0): ?>
                                            <span class="badge badge-pill badge-danger"><?php echo e(__('content.disable')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-success"><?php echo e(__('content.enable')); ?></span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page->display_header_menu == 0): ?>
                                            <span class="badge badge-pill badge-danger"><?php echo e(__('content.no')); ?></span>
                                        <?php elseif($page->display_header_menu == 1): ?>
                                            <span class="badge badge-pill badge-success"><?php echo e(__('content.yes')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-success"><?php echo e(__('content.other')); ?></span>
                                            <input type="text" value="<?php echo e(url('/'.$page->page_slug)); ?>" id="copyLink<?php echo e($page->id); ?>">
                                            <button class="btn btn-success" onclick="copyLink(<?php echo e($page->id); ?>)"><?php echo e(__('Copy Link')); ?></button>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('page.edit', $page->id)); ?>" class="mr-2">
                                            <i class="fa fa-edit text-info font-18"></i>
                                        </a>
                                    </td>
                                </tr>
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

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/page/index.blade.php ENDPATH**/ ?>