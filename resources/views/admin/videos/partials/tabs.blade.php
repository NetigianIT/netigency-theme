@php
    $videoTabs = [
        [
            'label' => __('content.categories'),
            'url' => url('admin/video-category/create'),
            'active' => request()->is('admin/video-category*'),
        ],
        [
            'label' => __('content.add_video'),
            'url' => url('admin/video-item/create'),
            'active' => request()->is('admin/video-item/create'),
        ],
        [
            'label' => __('content.videos'),
            'url' => url('admin/video-item'),
            'active' => request()->is('admin/video-item')
                || request()->is('admin/video-item/*/edit'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Videos section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($videoTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
