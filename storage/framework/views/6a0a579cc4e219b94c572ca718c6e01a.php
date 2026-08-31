
<?php
    $name = $name ?? 'icon';
    $id = $id ?? $name;
    $value = $value ?? '';
    $required = $required ?? false;
    $placeholder = $placeholder ?? __('content.select_your_option');
    $uid = 'ni-icon-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $id) . '-' . substr(md5($name . $id . uniqid('', true)), 0, 6);

    if (!isset($icons) || !is_array($icons) || count($icons) === 0) {
        $icons = [
            'fab fa-facebook-f' => 'Facebook',
            'fab fa-twitter' => 'Twitter',
            'fab fa-google-plus-g' => 'Google Plus',
            'fab fa-youtube' => 'Youtube',
            'fab fa-instagram' => 'Instagram',
            'fab fa-vk' => 'VK',
            'fab fa-weibo' => 'Weibo',
            'fab fa-weixin' => 'WeChat',
            'fab fa-meetup' => 'Meetup',
            'fab fa-wikipedia-w' => 'Wikipedia',
            'fab fa-quora' => 'Quora',
            'fab fa-pinterest' => 'Pinterest',
            'fab fa-dribbble' => 'Dribbble',
            'fab fa-linkedin-in' => 'Linkedin',
            'fab fa-behance-square' => 'Behance',
            'fab fa-wordpress' => 'WordPress',
            'fab fa-blogger-b' => 'Blogger',
            'fab fa-whatsapp' => 'Whatsapp',
            'fab fa-telegram' => 'Telegram',
            'fab fa-skype' => 'Skype',
            'fab fa-amazon' => 'Amazon',
            'fab fa-stack-overflow' => 'Stack Overflow',
            'fab fa-stack-exchange' => 'Stack Exchange',
            'fab fa-github' => 'Github',
            'fab fa-android' => 'Android',
            'fab fa-vimeo-v' => 'Vimeo',
            'fab fa-tumblr' => 'Tumblr',
            'fab fa-vine' => 'Vine',
            'fab fa-twitch' => 'Twitch',
            'fab fa-flickr' => 'Flickr',
            'fab fa-yahoo' => 'Yahoo',
            'fab fa-reddit' => 'Reddit',
            'fas fa-rss' => 'Rss',
        ];
    }

    $selectedLabel = $icons[$value] ?? $placeholder;
    $selectedIcon = $value !== '' ? $value : '';
?>

<div class="ni-icon-select" data-ni-icon-select id="<?php echo e($uid); ?>">
    <input
        type="hidden"
        name="<?php echo e($name); ?>"
        id="<?php echo e($id); ?>"
        value="<?php echo e($value); ?>"
        <?php if($required): ?> required <?php endif; ?>
        data-ni-icon-input
    >

    <button
        type="button"
        class="ni-icon-select__trigger"
        data-ni-icon-trigger
        aria-haspopup="listbox"
        aria-expanded="false"
    >
        <span class="ni-icon-select__trigger-main">
            <span class="ni-icon-select__trigger-icon <?php if($selectedIcon === ''): ?> is-empty <?php endif; ?>" data-ni-icon-preview>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedIcon !== ''): ?>
                    <i class="<?php echo e($selectedIcon); ?>"></i>
                <?php else: ?>
                    <i class="fas fa-icons"></i>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>
            <span class="ni-icon-select__trigger-text" data-ni-icon-label><?php echo e($selectedLabel); ?></span>
        </span>
        <i class="ti-angle-down ni-icon-select__caret"></i>
    </button>

    <div class="ni-icon-select__dropdown" data-ni-icon-dropdown hidden>
        <div class="ni-icon-select__search-wrap">
                                    <input type="search" class="ni-icon-select__search" data-ni-icon-search placeholder="Search..." autocomplete="off">
        </div>
        <div class="ni-icon-select__grid" role="listbox" data-ni-icon-grid>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iconClass => $iconLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    type="button"
                    class="ni-icon-select__card <?php if($value === $iconClass): ?> is-selected <?php endif; ?>"
                    role="option"
                    data-ni-icon-option
                    data-value="<?php echo e($iconClass); ?>"
                    data-label="<?php echo e($iconLabel); ?>"
                    aria-selected="<?php echo e($value === $iconClass ? 'true' : 'false'); ?>"
                >
                    <span class="ni-icon-select__card-icon">
                        <i class="<?php echo e($iconClass); ?>"></i>
                    </span>
                    <span class="ni-icon-select__card-text"><?php echo e($iconLabel); ?></span>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/admin/components/icon-select.blade.php ENDPATH**/ ?>