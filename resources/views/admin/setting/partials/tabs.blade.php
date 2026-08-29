@php
    $settingTabs = [
        [
            'label' => __('content.site_info'),
            'url' => url('admin/site-info/create'),
            'active' => request()->is('admin/site-info/create'),
        ],
        [
            'label' => __('content.site_images'),
            'url' => url('admin/site-image/create'),
            'active' => request()->is('admin/site-image/create'),
        ],
        [
            'label' => __('content.google_analytic'),
            'url' => url('admin/google-analytic/create'),
            'active' => request()->is('admin/google-analytic/create'),
        ],
        [
            'label' => __('content.seo'),
            'url' => url('admin/seo/create'),
            'active' => request()->is('admin/seo/create'),
        ],
        [
            'label' => __('content.particles_status'),
            'url' => url('admin/hero-particles/create'),
            'active' => request()->is('admin/hero-particles/create'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Settings section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($settingTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
