<?php

use App\Models\Admin\Language;
use App\Support\SiteCache;

if (! function_exists('getLanguage')) {
    // Get language for create data (admin content language)
    function getLanguage()
    {
        static $memo = null;

        if ($memo !== null) {
            return $memo;
        }

        $memo = SiteCache::activeDataLanguage();

        return $memo;
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
        $fallback = 'uploads/img/dummy/portfolio-demo.png';

        if (! empty($filename) && file_exists(public_path('uploads/img/portfolio/' . $filename))) {
            return asset('uploads/img/portfolio/' . $filename);
        }

        return asset($fallback);
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
