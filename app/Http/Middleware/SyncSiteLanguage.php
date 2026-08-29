<?php

namespace App\Http\Middleware;

use App\Support\SiteCache;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SyncSiteLanguage
{
    public const COOKIE = 'ni_language_id';

    /**
     * Keep session language in sync with the fast-switch cookie.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cookieId = (int) $request->cookie(self::COOKIE, 0);
        $sessionId = (int) $request->session()->get('language_id_from_dropdown', 0);
        $targetId = $cookieId > 0 ? $cookieId : $sessionId;

        $language = $targetId > 0 ? SiteCache::language($targetId) : null;

        // Unsupported locales (e.g. removed Bangla) fall back to English.
        if (! $language) {
            $language = SiteCache::defaultSiteLanguage();
        }

        if ($language) {
            $needsSync = $sessionId !== (int) $language->id
                || ! $request->session()->has('language_code_from_dropdown');

            if ($needsSync) {
                SiteCache::applyLanguageSession($language);
            }
        }

        return $next($request);
    }
}
