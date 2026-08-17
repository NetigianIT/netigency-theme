@php
    $heroTabs = [
        [
            'label' => __('content.fixed_content'),
            'url' => url('admin/fixed-content/create'),
            'active' => request()->is('admin/fixed-content/create'),
        ],
        [
            'label' => __('content.sliders'),
            'url' => url('admin/slider/create'),
            'active' => request()->is('admin/slider/create') || request()->is('admin/slider/*/edit'),
        ],
        [
            'label' => __('content.video'),
            'url' => url('admin/video/create'),
            'active' => request()->is('admin/video/create'),
        ],
        [
            'label' => __('content.homepage_versions'),
            'url' => url('admin/homepage-version/create'),
            'active' => request()->is('admin/homepage-version/create'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Hero section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($heroTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
