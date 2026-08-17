

<?php $__env->startSection('content'); ?>

    <!-- Blog Grid Start -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($blogs) > 0): ?>
        <section class="section pb-minus-76 page-content-offset" id="blog">
            <div class="container">
                <div class="row">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="item">
                                <div class="blog-item">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($blog->blog_image)): ?>
                                        <div class="blog-img">
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $blog->slug])); ?>">
                                                <img src="<?php echo e(asset('uploads/img/blogs/'.$blog->blog_image)); ?>" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="blog-img">
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $blog->slug])); ?>">
                                                <img src="<?php echo e(asset('uploads/img/dummy/no-image.jpg')); ?>" alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <a href="#"><span><i class="far fa-user"></i><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($blog->type == "with_this_account"): ?> <?php echo e($blog->author_name); ?> <?php else: ?> <?php echo e(__('frontend.anonymous')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span></a>
                                            <a href="#"><span><i class="far fa-bookmark"></i><?php echo e($blog->category_name); ?></span></a>
                                        </div>
                                        <h5>
                                            <a href="<?php echo e(route('blog-page.show', ['slug' => $blog->slug])); ?>"><?php echo e($blog->title); ?></a>
                                        </h5>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($blog->short_desc)): ?> <p><?php echo e($blog->short_desc); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <a href="<?php echo e(route('blog-page.show', ['slug' => $blog->slug])); ?>" class="blog-link">
                                            <?php echo e(__('frontend.read_more')); ?>

                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                            <?php echo e($blogs->links()); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="section pb-minus-76 page-content-offset" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <?php echo e(__('frontend.updating')); ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- Blog Grid End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/blog/index.blade.php ENDPATH**/ ?>