
<?php
    $details = collect($details ?? []);
?>

<div class="col-12" id="ni-details-section">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo e(__('content.details')); ?></h5>
            <button type="button" class="btn btn-sm btn-primary" id="ni-add-detail-row">
                + <?php echo e(__('content.add_detail')); ?>

            </button>
        </div>
        <div class="card-body">
            <div id="ni-details-list">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ni-detail-row border rounded p-3 mb-3">
                        <input type="hidden" name="details[<?php echo e($index); ?>][id]" value="<?php echo e($detail->id); ?>">
                        <div class="row align-items-end ni-detail-row__fields">
                            <div class="col-md">
                                <div class="form-group mb-md-0">
                                    <label><?php echo e(__('content.title')); ?></label>
                                    <input type="text" name="details[<?php echo e($index); ?>][title]" class="form-control" value="<?php echo e($detail->title); ?>">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group mb-md-0">
                                    <label><?php echo e(__('content.description')); ?></label>
                                    <input type="text" name="details[<?php echo e($index); ?>][desc]" class="form-control" value="<?php echo e($detail->desc); ?>">
                                </div>
                            </div>
                            <div class="col-md-auto ni-detail-row__order">
                                <div class="form-group mb-md-0">
                                    <label><?php echo e(__('content.order')); ?></label>
                                    <input type="number" name="details[<?php echo e($index); ?>][order]" class="form-control" value="<?php echo e($detail->order); ?>">
                                </div>
                            </div>
                            <div class="col-md-auto d-flex align-items-end pb-1">
                                <button type="button" class="btn btn-link text-danger ni-remove-detail-row p-0" title="<?php echo e(__('content.delete')); ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <small class="form-text text-muted"><?php echo e(__('content.add_detail')); ?> — <?php echo e(__('content.title')); ?>, <?php echo e(__('content.description')); ?>, <?php echo e(__('content.order')); ?></small>
        </div>
    </div>
</div>

<template id="ni-detail-row-template">
    <div class="ni-detail-row border rounded p-3 mb-3">
        <div class="row align-items-end ni-detail-row__fields">
            <div class="col-md">
                <div class="form-group mb-md-0">
                    <label><?php echo e(__('content.title')); ?></label>
                    <input type="text" name="details[__INDEX__][title]" class="form-control" value="">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group mb-md-0">
                    <label><?php echo e(__('content.description')); ?></label>
                    <input type="text" name="details[__INDEX__][desc]" class="form-control" value="">
                </div>
            </div>
            <div class="col-md-auto ni-detail-row__order">
                <div class="form-group mb-md-0">
                    <label><?php echo e(__('content.order')); ?></label>
                    <input type="number" name="details[__INDEX__][order]" class="form-control" value="0">
                </div>
            </div>
            <div class="col-md-auto d-flex align-items-end pb-1">
                <button type="button" class="btn btn-link text-danger ni-remove-detail-row p-0" title="<?php echo e(__('content.delete')); ?>">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
(function () {
    var list = document.getElementById('ni-details-list');
    var template = document.getElementById('ni-detail-row-template');
    var addBtn = document.getElementById('ni-add-detail-row');
    if (!list || !template || !addBtn) return;

    var nextIndex = list.querySelectorAll('.ni-detail-row').length;

    function addRow() {
        var html = template.innerHTML.replace(/__INDEX__/g, String(nextIndex++));
        list.insertAdjacentHTML('beforeend', html);
    }

    addBtn.addEventListener('click', function (e) {
        e.preventDefault();
        addRow();
    });

    list.addEventListener('click', function (e) {
        var btn = e.target.closest('.ni-remove-detail-row');
        if (!btn) return;
        e.preventDefault();
        var row = btn.closest('.ni-detail-row');
        if (row) row.remove();
    });

    if (nextIndex === 0) {
        addRow();
    }
})();
</script>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/details-repeater.blade.php ENDPATH**/ ?>