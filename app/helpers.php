<?php

use App\Models\Admin\Language;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2020
 * Time: 19:30
 */

if (! function_exists('getLanguage')) {
    // Get language for create data
    function getLanguage()
    {
        // Retrieve active langauage
        $language = Language::where('status', 1)->first();

        return $language;
    }
}

if (! function_exists('getSiteLanguage')) {
    // Get site Language
    function getSiteLanguage()
    {
        if (session()->has('language_id_from_dropdown')) {
            $language_id_from_dropdown = session()->get('language_id_from_dropdown');

            $language = Language::find($language_id_from_dropdown);

            return $language;
        }

        $language = Language::where('default_site_language', 1)->first();

        return $language;
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
