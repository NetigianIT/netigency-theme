<?php

use App\Support\SiteCache;

if (! function_exists('getLanguage')) {
    // Admin content language follows the selected site locale (English).
    function getLanguage()
    {
        return getSiteLanguage();
    }
}

if (! function_exists('getSiteLanguage')) {
    // Get site Language (frontend + UI locale)
    function getSiteLanguage()
    {
        static $memo = null;

        if ($memo !== null) {
            return $memo;
        }

        if (session()->has('language_id_from_dropdown')) {
            $memo = SiteCache::language((int) session('language_id_from_dropdown'));

            if ($memo) {
                return $memo;
            }
        }

        $memo = SiteCache::defaultSiteLanguage();

        return $memo;
    }
}

if (! function_exists('portfolio_image_url')) {
    /**
     * Portfolio thumbnail URL with demo fallback when missing.
     */
    function portfolio_image_url($filename = null)
    {
        static $fallback = null;
        $fallback ??= asset('uploads/img/dummy/portfolio-demo.png');

        if (empty($filename)) {
            return $fallback;
        }

        static $exists = [];

        if (! array_key_exists($filename, $exists)) {
            $exists[$filename] = is_file(public_path('uploads/img/portfolio/'.$filename));
        }

        return $exists[$filename]
            ? asset('uploads/img/portfolio/'.$filename)
            : $fallback;
    }
}

if (! function_exists('theme_mode_image_urls')) {
    /**
     * Resolve dark/light image asset URLs with cross-fallback.
     *
     * @return array{dark: ?string, light: ?string}
     */
    function theme_mode_image_urls(?string $darkFile, ?string $lightFile, string $folder, ?string $demoDark = null, ?string $demoLight = null): array
    {
        $folder = trim($folder, '/').'/';

        $toUrl = static function (?string $file) use ($folder): ?string {
            if (empty($file)) {
                return null;
            }

            return asset('uploads/img/'.$folder.$file);
        };

        $dark = $toUrl($darkFile) ?: $toUrl($demoDark);
        $light = $toUrl($lightFile) ?: $toUrl($demoLight);

        return [
            'dark' => $dark ?: $light,
            'light' => $light ?: $dark,
        ];
    }
}

if (! function_exists('tech_logo_file')) {
    /**
     * Built-in tech stack logo filename for a feature title, if available.
     */
    function tech_logo_file(?string $title): ?string
    {
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

        return $techLogos[strtolower(trim((string) $title))] ?? null;
    }
}

if (! function_exists('csp_nonce')) {
    function csp_nonce(): string
    {
        return app()->bound('cspNonce') ? (string) app('cspNonce') : '';
    }
}

if (! function_exists('deferred_css')) {
    function deferred_css(string $url): string
    {
        $url = e($url);

        return '<link rel="preload" href="'.$url.'" as="style">'."\n"
            .'    <link rel="stylesheet" href="'.$url.'" media="print" data-media-all>';
    }
}

if (! function_exists('img_attrs')) {
    /**
     * Common responsive image attributes for frontend templates.
     */
    function img_attrs(bool $priority = false, ?int $width = null, ?int $height = null): string
    {
        $attrs = ['decoding="async"'];

        if ($priority) {
            $attrs[] = 'fetchpriority="high"';
            $attrs[] = 'loading="eager"';
        } else {
            $attrs[] = 'loading="lazy"';
        }

        if ($width) {
            $attrs[] = 'width="'.$width.'"';
        }

        if ($height) {
            $attrs[] = 'height="'.$height.'"';
        }

        return implode(' ', $attrs);
    }
}
