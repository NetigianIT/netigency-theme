
<?php
    $name = $name ?? 'icon';
    $id = $id ?? $name;
    $value = $value ?? '';
    $buttonId = $buttonId ?? 'iconPickerBtn';
    $previewId = $previewId ?? 'icon-value';
    $hasValue = $value !== '';
?>

<div class="ni-fa-icon-picker ni-fa-icon-picker--dropdown" data-ni-fa-icon-picker>
    <input
        type="hidden"
        name="<?php echo e($name); ?>"
        class="form-control"
        id="<?php echo e($id); ?>"
        value="<?php echo e($value); ?>"
        data-ni-fa-icon-input
    >

    <button
        type="button"
        class="ni-fa-icon-picker__preview-row"
        data-ni-fa-icon-trigger
        aria-haspopup="listbox"
        aria-expanded="false"
    >
        <span class="ni-fa-icon-picker__preview-box">
            <i
                id="<?php echo e($previewId); ?>"
                class="<?php echo e($hasValue ? $value : 'fas fa-icons'); ?> <?php echo e($hasValue ? '' : 'is-empty'); ?>"
                data-ni-fa-icon-preview
            ></i>
        </span>
        <span
            class="ni-fa-icon-picker__preview-text"
            data-ni-fa-icon-label
            data-placeholder="<?php echo e(__('content.select_your_option')); ?>"
        >
            <?php echo e($hasValue ? $value : __('content.select_your_option')); ?>

        </span>
        <span class="ni-fa-icon-picker__caret" aria-hidden="true">
            <i class="fas fa-chevron-down"></i>
        </span>
    </button>

    <div class="ni-fa-icon-picker__panel" data-ni-fa-icon-panel hidden>
        <div
            id="<?php echo e($buttonId); ?>"
            class="icp ni-fa-icon-picker__host"
            data-placement="inline"
            <?php if($hasValue): ?> data-selected="<?php echo e($value); ?>" <?php endif; ?>
        ></div>
    </div>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/icon-picker.blade.php ENDPATH**/ ?>