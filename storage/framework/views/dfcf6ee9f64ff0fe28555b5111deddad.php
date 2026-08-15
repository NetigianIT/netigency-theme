<?php
    $toastrSuccess = Session::get('success');
    $toastrWarning = Session::get('warning');
    $toastrError = Session::get('error');
    $toastrValidationErrors = ($errors ?? null) && $errors->any() ? $errors->all() : [];
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($toastrSuccess || $toastrWarning || $toastrError || count($toastrValidationErrors)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof toastr === 'undefined') {
                return;
            }

            toastr.options = {
                closeButton: true,
                newestOnTop: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                preventDuplicates: true,
                showDuration: 300,
                hideDuration: 300,
                timeOut: 4200,
                extendedTimeOut: 1600,
                showEasing: 'swing',
                hideEasing: 'linear',
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut'
            };

            <?php if($toastrSuccess): ?>
                toastr.success(<?php echo json_encode(__($toastrSuccess), 15, 512) ?>);
            <?php endif; ?>

            <?php if($toastrWarning): ?>
                toastr.warning(<?php echo json_encode(__($toastrWarning), 15, 512) ?>);
            <?php endif; ?>

            <?php if($toastrError): ?>
                toastr.error(<?php echo json_encode(__($toastrError), 15, 512) ?>);
            <?php endif; ?>

            <?php if(count($toastrValidationErrors)): ?>
                <?php $__currentLoopData = $toastrValidationErrors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $validationError): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    toastr.error(<?php echo json_encode(__($validationError), 15, 512) ?>);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        });
    </script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/alert/alert.blade.php ENDPATH**/ ?>