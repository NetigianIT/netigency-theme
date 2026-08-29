<?php
    $footerPageLinks = collect($footer_pages ?? [])->values();
    $footerPagesCol1 = $footerPageLinks->take(4);
    $footerPagesCol2 = $footerPageLinks->slice(4, 4)->values();
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerPagesCol1->isNotEmpty()): ?>
    <div class="col-6 col-md-6 col-lg-3 footer-widget-resp">
        <div class="footer-widget footer-widget-pl">
            <h6 class="footer-title"><?php echo e(__('frontend.customer_relationship')); ?></h6>
            <ul class="footer-links">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $footerPagesCol1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('any-page.show', ['page_slug' => $footer_page->page_slug])); ?>">
                            <i class="fas fa-angle-right"></i>
                            <span><?php echo e($footer_page->page_title); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($footerPagesCol2->isNotEmpty()): ?>
    <div class="col-6 col-md-6 col-lg-3 footer-widget-resp">
        <div class="footer-widget footer-widget-pl">
            <h6 class="footer-title"><?php echo e(__('frontend.useful_links')); ?></h6>
            <ul class="footer-links">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $footerPagesCol2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('any-page.show', ['page_slug' => $footer_page->page_slug])); ?>">
                            <i class="fas fa-angle-right"></i>
                            <span><?php echo e($footer_page->page_title); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/frontend/partials/footer-page-columns.blade.php ENDPATH**/ ?>