
<?php
    $name = $name ?? 'select';
    $id = $id ?? $name;
    $value = isset($value) ? (string) $value : '';
    $required = $required ?? false;
    $placeholder = $placeholder ?? __('content.select_your_option');
    $options = $options ?? [];
    $uid = 'ni-sel-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $id) . '-' . substr(md5($name . $id . uniqid('', true)), 0, 6);

    $normalized = [];
    foreach ($options as $key => $opt) {
        if (is_array($opt)) {
            $normalized[] = [
                'value' => (string) ($opt['value'] ?? ''),
                'label' => $opt['label'] ?? '',
                'icon' => $opt['icon'] ?? null,
            ];
        } else {
            $normalized[] = [
                'value' => (string) $key,
                'label' => $opt,
                'icon' => null,
            ];
        }
    }

    $selectedLabel = $placeholder;
    $selectedIcon = null;
    foreach ($normalized as $opt) {
        if ($value !== '' && $opt['value'] === $value) {
            $selectedLabel = $opt['label'];
            $selectedIcon = $opt['icon'];
            break;
        }
    }
?>

<div class="ni-select" data-ni-select id="<?php echo e($uid); ?>">
    <select
        name="<?php echo e($name); ?>"
        id="<?php echo e($id); ?>"
        class="ni-select__native"
        data-ni-select-native
        <?php if($required): ?> required <?php endif; ?>
        tabindex="-1"
        aria-hidden="true"
    >
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($value === ''): ?>
            <option value="" selected disabled><?php echo e($placeholder); ?></option>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $normalized; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($opt['value']); ?>" <?php if($value !== '' && $opt['value'] === $value): ?> selected <?php endif; ?>>
                <?php echo e($opt['label']); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </select>

    <button type="button" class="ni-select__trigger" data-ni-select-trigger aria-haspopup="listbox" aria-expanded="false">
        <span class="ni-select__value">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedIcon): ?>
                <i class="<?php echo e($selectedIcon); ?> ni-select__value-icon"></i>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <span data-ni-select-label><?php echo e($selectedLabel); ?></span>
        </span>
        <i class="fas fa-chevron-down ni-select__caret"></i>
    </button>

    <div class="ni-select__dropdown" data-ni-select-dropdown hidden>
        <div class="ni-select__list" role="listbox" data-ni-select-list>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $normalized; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    type="button"
                    class="ni-select__option <?php if($value !== '' && $opt['value'] === $value): ?> is-selected <?php endif; ?>"
                    role="option"
                    data-ni-select-option
                    data-value="<?php echo e($opt['value']); ?>"
                    data-label="<?php echo e($opt['label']); ?>"
                    <?php if($opt['icon']): ?> data-ni-icon="<?php echo e($opt['icon']); ?>" <?php endif; ?>
                    aria-selected="<?php echo e(($value !== '' && $opt['value'] === $value) ? 'true' : 'false'); ?>"
                >
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($opt['icon']): ?>
                        <span class="ni-select__option-icon"><i class="<?php echo e($opt['icon']); ?>" aria-hidden="true"></i></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <span class="ni-select__option-text"><?php echo e($opt['label']); ?></span>
                    <i class="fas fa-check ni-select__check" aria-hidden="true"></i>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/select.blade.php ENDPATH**/ ?>