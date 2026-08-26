<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => '',
    'type' => 'icon',
    'icon' => null,
    'featureImage' => null,
    'size' => 'main',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => '',
    'type' => 'icon',
    'icon' => null,
    'featureImage' => null,
    'size' => 'main',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $logoFile = tech_logo_file($title);
    $sizeClass = $size === 'sub' ? 'tech-icon-wrap--sub' : 'tech-icon-wrap--main';
    $logoSlug = preg_replace('/[^a-z0-9]+/', '-', strtolower(trim($title)));
    $logoSlug = trim($logoSlug, '-');
?>

<div class="tech-icon-wrap <?php echo e($sizeClass); ?>">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'icon' && $logoFile): ?>
        <img src="<?php echo e(asset('assets/frontend/img/tech/'.$logoFile)); ?>" alt="<?php echo e($title); ?>" class="tech-logo tech-logo--<?php echo e($logoSlug); ?>" loading="lazy" decoding="async">
    <?php elseif($type === 'icon' && !empty($icon)): ?>
        <div class="tech-fa-icon" aria-hidden="true">
            <span class="<?php echo e($icon); ?>"></span>
        </div>
    <?php elseif($type !== 'icon' && !empty($featureImage)): ?>
        <img src="<?php echo e(asset('uploads/img/features/'.$featureImage)); ?>" alt="<?php echo e($title); ?>" class="tech-logo tech-logo--<?php echo e($logoSlug); ?>" loading="lazy" decoding="async">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/components/frontend/tech-icon.blade.php ENDPATH**/ ?>