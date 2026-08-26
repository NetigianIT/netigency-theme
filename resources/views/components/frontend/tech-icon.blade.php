@props([
    'title' => '',
    'type' => 'icon',
    'icon' => null,
    'featureImage' => null,
    'size' => 'main',
])

@php
    $logoFile = tech_logo_file($title);
    $sizeClass = $size === 'sub' ? 'tech-icon-wrap--sub' : 'tech-icon-wrap--main';
    $logoSlug = preg_replace('/[^a-z0-9]+/', '-', strtolower(trim($title)));
    $logoSlug = trim($logoSlug, '-');
@endphp

<div class="tech-icon-wrap {{ $sizeClass }}">
    @if ($type === 'icon' && $logoFile)
        <img src="{{ asset('assets/frontend/img/tech/'.$logoFile) }}" alt="{{ $title }}" class="tech-logo tech-logo--{{ $logoSlug }}" loading="lazy" decoding="async">
    @elseif ($type === 'icon' && !empty($icon))
        <div class="tech-fa-icon" aria-hidden="true">
            <span class="{{ $icon }}"></span>
        </div>
    @elseif ($type !== 'icon' && !empty($featureImage))
        <img src="{{ asset('uploads/img/features/'.$featureImage) }}" alt="{{ $title }}" class="tech-logo tech-logo--{{ $logoSlug }}" loading="lazy" decoding="async">
    @endif
</div>
