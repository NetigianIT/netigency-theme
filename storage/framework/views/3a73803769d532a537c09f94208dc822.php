<?php
    $darkSrc = $darkSrc ?? null;
    $lightSrc = $lightSrc ?? null;
    $alt = $alt ?? '';
    $titleAttr = $title ?? $alt;
    $extraClass = trim($class ?? '');
    $baseClass = trim('img-fluid theme-mode-img '.$extraClass);
    $resolvedDark = $darkSrc ?: $lightSrc;
    $resolvedLight = $lightSrc ?: $darkSrc;
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedDark): ?>
    <img
        src="<?php echo e($resolvedDark); ?>"
        alt="<?php echo e($alt); ?>"
        <?php if($titleAttr !== ''): ?> title="<?php echo e($titleAttr); ?>" <?php endif; ?>
        class="<?php echo e($baseClass); ?> theme-mode-img--dark"
    >
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedLight): ?>
    <img
        src="<?php echo e($resolvedLight); ?>"
        alt="<?php echo e($alt); ?>"
        <?php if($titleAttr !== ''): ?> title="<?php echo e($titleAttr); ?>" <?php endif; ?>
        class="<?php echo e($baseClass); ?> theme-mode-img--light"
    >
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/components/frontend/theme-mode-image.blade.php ENDPATH**/ ?>