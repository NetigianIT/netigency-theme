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

        if ($targetId > 0) {
            $language = SiteCache::language($targetId);

            if ($language) {
                $needsSync = $sessionId !== (int) $language->id
                    || ! $request->session()->has('language_code_from_dropdown');

                if ($needsSync) {
                    SiteCache::applyLanguageSession($language);
                }
            }
        } elseif (! $request->session()->has('language_id_from_dropdown')) {
            $default = SiteCache::defaultSiteLanguage();

            if ($default) {
                SiteCache::applyLanguageSession($default);
            }
        }

        return $next($request);
    }
}
