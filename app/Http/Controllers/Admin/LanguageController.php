<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Switch the visitor/admin UI between the fixed English and Bengali locales.
     *
     * @param  int  $language_id
     * @return \Illuminate\Http\Response
     */
    public function set_locale($language_id)
    {
        $language = \App\Support\SiteCache::language((int) $language_id);

        if (! $language || ! $language->isSupported()) {
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json(['ok' => false], 404);
            }

            return redirect()->back();
        }

        \App\Support\SiteCache::applyLanguageSession($language);
        \App\Support\SiteCache::warmLanguage((int) $language->id);

        app()->forgetInstance('translator');

        $cookie = \App\Support\SiteCache::languageCookie($language);

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'ok' => true,
                'language_id' => $language->id,
                'language_code' => $language->language_code,
                'redirect' => url()->previous() ?: url('/'),
            ])->cookie($cookie);
        }

        return redirect()->back()->cookie($cookie);
    }
}
