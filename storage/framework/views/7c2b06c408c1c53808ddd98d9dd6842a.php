<?php
    $name = $name ?? 'image';
    $id = $id ?? $name;
    $label = $label ?? null;
    $hint = $hint ?? null;
    $preview = $preview ?? null;
    $required = ! empty($required);
    $accept = $accept ?? 'image/svg+xml,image/jpeg,image/png,image/webp,.svg,.jpg,.jpeg,.png,.webp';
?>

<div class="form-group">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label): ?>
        <label for="<?php echo e($id); ?>">
            <?php echo e($label); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($required): ?>
                <span class="text-red">*</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </label>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="ni-image-input" data-ni-image-input>
        <label class="ni-image-input__box" for="<?php echo e($id); ?>">
            <span class="ni-image-input__preview">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($preview): ?>
                    <img src="<?php echo e($preview); ?>" alt="preview">
                <?php else: ?>
                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>
            <span class="ni-image-input__meta">
                <span class="ni-image-input__title">Click to upload or drag & drop</span>
                <span class="ni-image-input__file" data-ni-image-filename>No file chosen</span>
            </span>
        </label>
        <input
            type="file"
            name="<?php echo e($name); ?>"
            id="<?php echo e($id); ?>"
            class="form-control-file"
            accept="<?php echo e($accept); ?>"
            <?php if($required): ?> required <?php endif; ?>
        >
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hint): ?>
        <small class="form-text text-muted"><?php echo e($hint); ?></small>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/image-input.blade.php ENDPATH**/ ?>