@php
    $heroTabs = [
        [
            'label' => __('content.fixed_content'),
            'url' => url('admin/fixed-content/create'),
            'active' => request()->is('admin/fixed-content/create'),
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
