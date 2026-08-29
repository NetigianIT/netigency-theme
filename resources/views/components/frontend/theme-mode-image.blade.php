@php
    $darkSrc = $darkSrc ?? null;
    $lightSrc = $lightSrc ?? null;
    $alt = $alt ?? '';
    $titleAttr = $title ?? $alt;
    $extraClass = trim($class ?? '');
    $baseClass = trim('img-fluid theme-mode-img '.$extraClass);
    $resolvedDark = $darkSrc ?: $lightSrc;
    $resolvedLight = $lightSrc ?: $darkSrc;
@endphp

@if ($resolvedDark)
    <img
        src="{{ $resolvedDark }}"
        alt="{{ $alt }}"
        @if ($titleAttr !== '') title="{{ $titleAttr }}" @endif
        class="{{ $baseClass }} theme-mode-img--dark"
    >
@endif
@if ($resolvedLight)
    <img
        src="{{ $resolvedLight }}"
        alt="{{ $alt }}"
        @if ($titleAttr !== '') title="{{ $titleAttr }}" @endif
        class="{{ $baseClass }} theme-mode-img--light"
    >
@endif
