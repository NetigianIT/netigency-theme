@php
    $adminRoleTabs = [
        [
            'label' => __('content.admin_roles'),
            'url' => url('admin/admin-role'),
            'active' => request()->is('admin/admin-role')
                || request()->is('admin/admin-role/*/edit'),
        ],
        [
            'label' => __('content.add_admin_role'),
            'url' => url('admin/admin-role/create'),
            'active' => request()->is('admin/admin-role/create'),
        ],
    ];
@endphp

<nav class="ni-hero-tabs__track" aria-label="Admin role tabs">
    <ul class="nav nav-pills ni-hero-tabs__nav">
        @foreach ($adminRoleTabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ $tab['active'] ? 'active' : '' }}" href="{{ $tab['url'] }}">{{ $tab['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
