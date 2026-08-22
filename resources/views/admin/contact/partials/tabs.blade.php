@php
    $contactTabs = [
        [
            'label' => __('content.contact_info'),
            'url' => url('admin/contact/create'),
            'active' => request()->is('admin/contact/create')
                || request()->is('admin/contact/*/edit'),
        ],
        [
            'label' => __('content.socials'),
            'url' => url('admin/social'),
            'active' => request()->is('admin/social')
                || request()->is('admin/social/create')
                || request()->is('admin/social/*/edit'),
        ],
        [
            'label' => __('content.quick_access_buttons'),
            'url' => url('admin/quick-access/create'),
            'active' => request()->is('admin/quick-access/create'),
        ],
        [
            'label' => __('content.messages'),
            'url' => url('admin/message'),
            'active' => request()->is('admin/message'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Contact section tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($contactTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
