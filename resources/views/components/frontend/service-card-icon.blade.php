@props([
    'title' => '',
    'icon' => null,
    'image' => null,
    'useImage' => false,
])

@if (($useImage && !empty($image)) || !empty($icon))
    <div class="services-item-icon-wrap">
        @if ($useImage && !empty($image))
            <img src="{{ asset('uploads/img/service/'.$image) }}" alt="{{ $title }}" class="services-logo" loading="lazy" decoding="async">
        @elseif (!empty($icon))
            <span class="{{ $icon }}" aria-hidden="true"></span>
        @endif
    </div>
@endif
