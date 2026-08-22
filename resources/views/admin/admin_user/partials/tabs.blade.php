@php
    $adminUserTabs = [
        [
            'label' => __('content.all_admin'),
            'url' => url('admin/admin-user'),
            'active' => request()->is('admin/admin-user')
                || request()->is('admin/admin-user/*/edit'),
        ],
        [
            'label' => __('content.add_admin_user'),
            'url' => url('admin/admin-user/create'),
            'active' => request()->is('admin/admin-user/create'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Admin user tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($adminUserTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
