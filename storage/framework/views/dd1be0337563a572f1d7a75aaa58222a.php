<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'subtitle' => null,
    'align' => 'left',
    'light' => false,
    'dots' => false,
    'colClass' => 'col-lg-6',
    'rowClass' => '',
    'headingClass' => '',
    'navSlotId' => null,
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
    'title',
    'subtitle' => null,
    'align' => 'left',
    'light' => false,
    'dots' => false,
    'colClass' => 'col-lg-6',
    'rowClass' => '',
    'headingClass' => '',
    'navSlotId' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $headingBaseClass = $align === 'center' ? 'section-heading' : 'section-heading-left';
    $headingClasses = trim($headingBaseClass.' '.($light ? 'light ' : '').$headingClass);
    $rowClasses = trim('row align-items-center '.($dots ? 'ni-heading-dots ' : '').$rowClass);
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($navSlotId)): ?>
<div class="<?php echo e($rowClasses); ?>">
    <div class="col-12">
        <div class="ni-section-head">
            <div class="<?php echo e($headingClasses); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($subtitle)): ?>
                    <span><?php echo e($subtitle); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <h2><?php echo e($title); ?></h2>
            </div>
            <div class="section-carousel-nav" id="<?php echo e($navSlotId); ?>"></div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="<?php echo e($rowClasses); ?>">
    <div class="<?php echo e($colClass); ?>">
        <div class="<?php echo e($headingClasses); ?>">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($subtitle)): ?>
                <span><?php echo e($subtitle); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <h2><?php echo e($title); ?></h2>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/components/frontend/section-title.blade.php ENDPATH**/ ?>