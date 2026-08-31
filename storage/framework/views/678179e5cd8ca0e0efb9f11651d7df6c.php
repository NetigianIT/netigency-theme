
<?php
    $name = $name ?? 'status';
    $id = $id ?? $name;
    $onValue = isset($onValue) ? (string) $onValue : '1';
    $offValue = isset($offValue) ? (string) $offValue : '0';
    $onLabel = $onLabel ?? __('content.enable');
    $offLabel = $offLabel ?? __('content.disable');
    $label = $label ?? null;
    $help = $help ?? null;
    $compact = !empty($compact);
    $hideState = !empty($hideState);
    $toggleUrl = $toggleUrl ?? null;
    $current = isset($value) ? (string) $value : $onValue;
    $isOn = isset($checked) ? (bool) $checked : ($current === $onValue);
?>

<div
    class="ni-switch-row<?php echo e($compact ? ' ni-switch-row--compact' : ''); ?><?php echo e($hideState ? ' ni-switch-row--icon-only' : ''); ?>"
    data-ni-switch
    <?php if($toggleUrl): ?> data-ni-status-url="<?php echo e($toggleUrl); ?>" <?php endif; ?>
>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label || $help): ?>
        <div class="ni-switch-row__text">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($label): ?>
                <label class="ni-switch-row__label" for="<?php echo e($id); ?>"><?php echo e($label); ?></label>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($help): ?>
                <small class="form-text text-muted mb-0"><?php echo e($help); ?></small>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($toggleUrl)): ?>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($offValue); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <label class="ni-switch" title="<?php echo e($isOn ? $onLabel : $offLabel); ?>">
        <input
            type="checkbox"
            <?php if (! ($toggleUrl)): ?> name="<?php echo e($name); ?>" <?php endif; ?>
            id="<?php echo e($id); ?>"
            value="<?php echo e($onValue); ?>"
            data-ni-switch-input
            data-on-value="<?php echo e($onValue); ?>"
            data-off-value="<?php echo e($offValue); ?>"
            <?php echo e($isOn ? 'checked' : ''); ?>

        >
        <span class="ni-switch__track" aria-hidden="true">
            <span class="ni-switch__thumb"></span>
        </span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (! ($hideState)): ?>
            <span
                class="ni-switch__state"
                data-ni-switch-state
                data-on="<?php echo e($onLabel); ?>"
                data-off="<?php echo e($offLabel); ?>"
            ><?php echo e($isOn ? $onLabel : $offLabel); ?></span>
        <?php else: ?>
            <span
                class="sr-only"
                data-ni-switch-state
                data-on="<?php echo e($onLabel); ?>"
                data-off="<?php echo e($offLabel); ?>"
            ><?php echo e($isOn ? $onLabel : $offLabel); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </label>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/switch.blade.php ENDPATH**/ ?>