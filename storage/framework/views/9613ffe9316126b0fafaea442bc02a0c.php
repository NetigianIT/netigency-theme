

<?php $__env->startSection('page_tabs'); ?>
    <?php echo $__env->make('admin.setting.partials.tabs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Include Alert Blade -->
    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fixed_content)): ?>
                    <form action="<?php echo e(route('hero-particles.update', $fixed_content->id)); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-8 col-lg-6">
                                <div class="form-group mb-3">
                                    <?php echo $__env->make('admin.components.switch', [
                                        'name' => 'particles_status',
                                        'id' => 'particles_status',
                                        'label' => __('content.particles_status'),
                                        'help' => __('content.particles_status_help'),
                                        'value' => (string) old('particles_status', $fixed_content->particles_status ?? 1),
                                        'onLabel' => __('content.enable'),
                                        'offLabel' => __('content.disable'),
                                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('content.submit')); ?></button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning mb-0" role="alert">
                        <?php echo e(__('content.hero_content_required_for_particles')); ?>

                        <a href="<?php echo e(route('fixed-content.create')); ?>" class="alert-link"><?php echo e(__('content.fixed_content')); ?></a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/setting/particles/create.blade.php ENDPATH**/ ?>