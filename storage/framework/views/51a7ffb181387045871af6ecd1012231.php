<?php
    $meta = \App\Support\AdminPageTitle::resolve();

    if (! empty($pageTitle)) {
        $meta['title'] = $pageTitle;
    }
?>

<div class="ni-page-title card box-margin">
    <div class="card-body">
        <h2 class="ni-page-title__title mb-0"><?php echo e($meta['title']); ?></h2>
    </div>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/page-title.blade.php ENDPATH**/ ?>