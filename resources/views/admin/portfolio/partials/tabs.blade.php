@php
    $portfolioTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/portfolio-category/create'),
            'active' => request()->is('admin/portfolio-category/create')
                || request()->is('admin/portfolio-category/*/edit'),
        ],
        [
            'label' => __('content.portfolios'),
            'url' => url('admin/portfolio'),
            'active' => request()->is('admin/portfolio')
                || request()->is('admin/portfolio/create')
                || request()->is('admin/portfolio/*/edit')
                || request()->is('admin/portfolio-slider*')
                || request()->is('admin/portfolio-detail*'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Portfolio section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($portfolioTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
