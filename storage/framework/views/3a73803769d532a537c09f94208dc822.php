<?php
    $darkSrc = $darkSrc ?? null;
    $lightSrc = $lightSrc ?? null;
    $alt = $alt ?? '';
    $titleAttr = $title ?? $alt;
    $extraClass = trim($class ?? '');
    $baseClass = trim('img-fluid theme-mode-img theme-mode-img--single '.$extraClass);
    $resolvedDark = $darkSrc ?: $lightSrc;
    $resolvedLight = $lightSrc ?: $darkSrc;
    $priority = (bool) ($priority ?? false);
    $lazy = (bool) ($lazy ?? false);
    $width = (int) ($width ?? 560);
    $height = (int) ($height ?? 420);
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($resolvedDark || $resolvedLight): ?>
    <img
        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
        alt="<?php echo e($alt); ?>"
        <?php if($titleAttr !== ''): ?> title="<?php echo e($titleAttr); ?>" <?php endif; ?>
        class="<?php echo e($baseClass); ?>"
        width="<?php echo e($width); ?>"
        height="<?php echo e($height); ?>"
        decoding="async"
        <?php if($priority): ?> data-priority="high" <?php endif; ?>
        <?php if($lazy): ?> loading="lazy" <?php else: ?> loading="eager" <?php endif; ?>
        data-dark-src="<?php echo e($resolvedDark); ?>"
        data-light-src="<?php echo e($resolvedLight); ?>"
    >
    <script>
        (function (img) {
            if (!img || !img.dataset) {
                return;
            }

            var theme = document.documentElement.getAttribute('data-theme') || 'light';
            var src = theme === 'dark'
                ? (img.dataset.darkSrc || img.dataset.lightSrc)
                : (img.dataset.lightSrc || img.dataset.darkSrc);

            if (!src) {
                return;
            }

            img.src = src;

            if (img.dataset.priority === 'high' && 'fetchPriority' in img) {
                img.fetchPriority = 'high';
            }
        })(document.currentScript.previousElementSibling);
    </script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/components/frontend/theme-mode-image.blade.php ENDPATH**/ ?>