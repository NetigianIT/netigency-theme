@props([
    'title' => '',
    'type' => 'icon',
    'icon' => null,
    'featureImage' => null,
    'size' => 'main',
])

@php
    $techLogos = [
        'laravel' => 'laravel.svg',
        'vue.js' => 'vuejs.svg',
        'vuejs' => 'vuejs.svg',
        'php' => 'php.svg',
        'node.js' => 'nodejs.svg',
        'nodejs' => 'nodejs.svg',
        'mysql' => 'mysql.svg',
        'react.js' => 'react.svg',
        'react' => 'react.svg',
        'redis' => 'redis.svg',
        'livewire' => 'livewire.svg',
        'ci/cd' => 'cicd.svg',
        'cicd' => 'cicd.svg',
        'deploy' => 'deploy.svg',
        'cursor' => 'cursor.svg',
        'primevue' => 'primevue.svg',
        'primereact' => 'primereact.svg',
        'reactvue' => 'primereact.svg',
        'nuxt.js' => 'nuxt.svg',
        'nuxt' => 'nuxt.svg',
        'next.js' => 'nextjs.svg',
        'nextjs' => 'nextjs.svg',
        'next' => 'nextjs.svg',
        'zustand' => 'zustand.svg',
        'redux' => 'redux.svg',
        'vuex' => 'vuex.svg',
        'pinia' => 'pinia.svg',
        'typescript' => 'typescript.svg',
        'ts' => 'typescript.svg',
    ];

    $logoFile = $techLogos[strtolower(trim($title))] ?? null;
    $sizeClass = $size === 'sub' ? 'tech-icon-wrap--sub' : 'tech-icon-wrap--main';
@endphp

<div class="tech-icon-wrap {{ $sizeClass }}">
    @if ($type === 'icon' && $logoFile)
        <img src="{{ asset('assets/frontend/img/tech/'.$logoFile) }}" alt="{{ $title }}" class="tech-logo" loading="lazy" decoding="async">
    @elseif ($type === 'icon' && !empty($icon))
        <div class="tech-fa-icon" aria-hidden="true">
            <span class="{{ $icon }}"></span>
        </div>
    @elseif ($type !== 'icon' && !empty($featureImage))
        <img src="{{ asset('uploads/img/features/'.$featureImage) }}" alt="{{ $title }}" class="tech-logo" loading="lazy" decoding="async">
    @endif
</div>
