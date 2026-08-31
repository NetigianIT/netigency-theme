<?php
    $meta = \App\Support\AdminPageTitle::resolve();

    if (! empty($pageTitle)) {
        $meta['title'] = $pageTitle;
    }

    $pageActions = $pageActions ?? '';
    $pageTabs = $pageTabs ?? '';
?>

<div class="ni-page-title card box-margin">
    <div class="card-body ni-page-title__body">
        <h2 class="ni-page-title__title mb-0"><?php echo e($meta['title']); ?></h2>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(strlen(trim(strip_tags($pageActions))) > 0): ?>
            <div class="ni-page-title__actions">
                <?php echo $pageActions; ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(strlen(trim(strip_tags($pageTabs))) > 0): ?>
            <div class="ni-page-title__tabs">
                <?php echo $pageTabs; ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/page-title.blade.php ENDPATH**/ ?>