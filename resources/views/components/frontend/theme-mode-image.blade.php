@php
    $darkSrc = $darkSrc ?? null;
    $lightSrc = $lightSrc ?? null;
    $alt = $alt ?? '';
    $titleAttr = $title ?? $alt;
    $extraClass = trim($class ?? '');
    $baseClass = trim('img-fluid theme-mode-img theme-mode-img--single '.$extraClass);
    $resolvedDark = $darkSrc ?: $lightSrc;
    $resolvedLight = $lightSrc ?: $darkSrc;
    $priority = (bool) ($priority ?? false);
    $lazy = (bool) ($lazy ?? false);
    $width = (int) ($width ?? 560);
    $height = (int) ($height ?? 420);
@endphp

@if ($resolvedDark || $resolvedLight)
    <img
        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
        alt="{{ $alt }}"
        @if ($titleAttr !== '') title="{{ $titleAttr }}" @endif
        class="{{ $baseClass }}"
        width="{{ $width }}"
        height="{{ $height }}"
        decoding="async"
        @if ($priority) data-priority="high" @endif
        @if ($lazy) loading="lazy" @else loading="eager" @endif
        data-dark-src="{{ $resolvedDark }}"
        data-light-src="{{ $resolvedLight }}"
    >
    <script>
        (function (img) {
            if (!img || !img.dataset) {
                return;
            }

            var theme = document.documentElement.getAttribute('data-theme') || 'light';
            var src = theme === 'dark'
                ? (img.dataset.darkSrc || img.dataset.lightSrc)
                : (img.dataset.lightSrc || img.dataset.darkSrc);

            if (!src) {
                return;
            }

            img.src = src;

            if (img.dataset.priority === 'high' && 'fetchPriority' in img) {
                img.fetchPriority = 'high';
            }
        })(document.currentScript.previousElementSibling);
    </script>
@endif
