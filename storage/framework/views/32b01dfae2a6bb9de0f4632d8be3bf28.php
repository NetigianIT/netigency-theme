

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row ni-dash-stats">

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/portfolio')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-folder-open"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.portfolios')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($portfolios_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/feature/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-star"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.features')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($features_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/work-process/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-briefcase"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.work_processes')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($work_processes_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/skill/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-code"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.skill')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($skills_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(route('testimonial.index')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comment-dots"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.testimonials')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($testimonials_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(route('team.index')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-users"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.teams')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($teams_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/blog')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file-alt"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.blogs')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($blogs_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/message')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-inbox"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.messages')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($messages_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/service')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-cogs"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.services')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($services_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/comment')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comments"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.comments')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($comments_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/slider/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-images"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.sliders')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($sliders_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/page')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file"></i></div>
                    <p class="ni-stat-card__label"><?php echo e(__('content.pages')); ?></p>
                    <span class="ni-stat-card__value"><?php echo e($pages_count); ?></span>
                </div>
            </a>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>