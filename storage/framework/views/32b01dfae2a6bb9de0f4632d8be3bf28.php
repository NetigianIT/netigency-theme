

<?php $__env->startSection('hide_page_title', true); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.alert.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="row ni-dash-stats">

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/portfolio')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-folder-open"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.portfolios')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($portfolios_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/feature/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-star"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.features')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($features_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/work-process/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-briefcase"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.work_processes')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($work_processes_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/skill/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-code"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.skill')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($skills_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/testimonial/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comment-dots"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.testimonials')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($testimonials_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/team/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-users"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.teams')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($teams_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/blog')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file-alt"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.blogs')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($blogs_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/message')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-inbox"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.messages')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($messages_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/service')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-cogs"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.services')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($services_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/counter/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-hourglass-start"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.counters')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($counters_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/subscribe/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-at"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.subscribers')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($subscribers_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/comment')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-comments"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.comments')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($comments_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/slider/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-images"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.sliders')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($sliders_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/page')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-file"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.pages')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($pages_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/category/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-th-large"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.categories')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($categories_count); ?></span>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="<?php echo e(url('admin/social/create')); ?>" class="ni-stat-card card box-margin">
                <div class="card-body">
                    <div class="ni-stat-card__icon"><i class="fas fa-share-alt"></i></div>
                    <h6 class="ni-stat-card__label"><?php echo e(__('content.socials')); ?></h6>
                    <span class="ni-stat-card__value"><?php echo e($socials_count); ?></span>
                </div>
            </a>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>