@php
    $blogTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/category/create'),
            'active' => request()->is('admin/category/create')
                || request()->is('admin/category/*/edit'),
        ],
        [
            'label' => __('content.blogs'),
            'url' => url('admin/blog'),
            'active' => request()->is('admin/blog')
                || request()->is('admin/blog/create')
                || request()->is('admin/blog/*/edit'),
        ],
        [
            'label' => __('content.blog_paginate'),
            'url' => url('admin/blog-paginate/create'),
            'active' => request()->is('admin/blog-paginate/create'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Blog section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($blogTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
